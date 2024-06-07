#include <ArduinoJson.h>
#include <HTTPClient.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <RTClib.h>
#include <ESP32Servo.h>
#include "WiFi.h"

// Wifi Credentials
const char* ssid = "Redmi 9C"; //choose your wireless ssid
const char* password = "orabondo"; //put your wireless password here.

// Server IP
const char* serverIP = "http://192.168.72.27"; // Alamat IP server

// Servo
Servo myServo;
int servoPin = 12;

// RTC
RTC_DS3231 rtc;
char daysOfTheWeek[7][12] = {"Ahad", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"};
int jam, menit, detik;
int tanggal, bulan, tahun;
String hari;

// LCD
LiquidCrystal_I2C lcd(0x27, 16, 2);

const int trigPin = 2; // Pin trigger sensor ultrasonik
const int echoPin = 4; // Pin echo sensor ultrasonik

// Data jadwal dari server
struct Jadwal {
  int jam;
  int menit;
  int idTakaran;
  int jumlahTakaran;
  bool isActive;
};
Jadwal jadwal[5]; // Array untuk menyimpan data jadwal, misalnya maksimal 5 jadwal

// Variabel untuk penjadwalan pengiriman pesan
DateTime lastMessageSentTime;

void setup() {
  lcd.begin();
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Initializing...");

  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);
  delay(1000);
  WiFi.mode(WIFI_STA);
  Wire.begin();
  
  if (!rtc.begin()) {
    Serial.println("Couldn't find RTC");
    Serial.flush();
    while (1);
  }  
  rtc.adjust(DateTime(F(__DATE__), F(__TIME__)));
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);

  myServo.attach(servoPin, 500, 2500);
  myServo.write(0);
 
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println("Connecting to WiFi..");
  }
 
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("Connected to the WiFi network");
  } else {
    Serial.println("Failed to connect to WiFi");
  }

  lastMessageSentTime = rtc.now(); // Initialize lastMessageSentTime with current time
}

void loop() {
  static unsigned long lastUpdateTime = 0;
  unsigned long currentTime = millis();
  
  if (currentTime - lastUpdateTime >= 1000) { // update every 1 second
    lastUpdateTime = currentTime;
    getDataFromServer();
    updateDisplay();
    checkSchedules();
    checkUltrasonicSensor();
  }

  // Coba kode dibawah apabila delay
  // Ambil data dari server setiap 20 detik
  // if (currentTime - lastDataFetchTime >= dataFetchInterval) {
  //   lastDataFetchTime = currentTime;
  //   getDataFromServer();
  // }
}

void updateDisplay() {
  DateTime now = rtc.now();
  jam = now.hour();
  menit = now.minute();
  detik = now.second();
  tanggal = now.day();
  bulan = now.month();
  tahun = now.year();
  hari = daysOfTheWeek[now.dayOfTheWeek()];
  
  long distance = getUltrasonicDistance(); // Mendapatkan jarak dari sensor ultrasonik

  Serial.println(String() + "Current Date: " + hari + ", " + tanggal + "-" + bulan + "-" + tahun);
  Serial.println(String() + "Current Time: " + jam + ":" + menit + ":" + detik + " Distance: " + distance + "cm");
  Serial.println();
  
  lcd.setCursor(0, 0);
  lcd.print(String() + tanggal + "-" + bulan + "-" + tahun + "     ");
  lcd.setCursor(0, 1);
  lcd.print(String(jam) + ":" + (menit < 10 ? "0" + String(menit) : String(menit)) + ":" + (detik < 10 ? "0" + String(detik) : String(detik)) + "  " + String(distance) + " " + "cm");
}

long getUltrasonicDistance() {
  long duration, distance;
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);

  duration = pulseIn(echoPin, HIGH);
  distance = duration * 0.034 / 2;

  return distance;
}

void checkUltrasonicSensor() {
  long distance = getUltrasonicDistance();

  if (distance > 12) {
    lcd.setCursor(0, 0); // Set kursor di baris 0 kolom 0
    lcd.print(String() + "Pakan Habis" + "      "); // Tampilkan pesan "Pakan Akan"
    lcd.setCursor(0, 1); // Set kursor di baris 1 kolom 0
    lcd.print("Segera Isi        "); // Tampilkan pesan "Habis"
    sendNotificationIfNeeded(); // Kirim pesan jika pakan habis
  }
}

void checkSchedules() {
  DateTime now = rtc.now();
  int currentHour = now.hour();
  int currentMinute = now.minute();
  int currentSecond = now.second();

  // Pengecekan Jadwal
  for (int i = 0; i < sizeof(jadwal) / sizeof(jadwal[0]); i++) {
    if (jadwal[i].isActive && jadwal[i].jam == currentHour && jadwal[i].menit == currentMinute) {
      int scheduleTimeInSeconds = jadwal[i].jam * 3600 + jadwal[i].menit * 60;
      int currentTimeInSeconds = currentHour * 3600 + currentMinute * 60 + currentSecond;
      if (abs(scheduleTimeInSeconds - currentTimeInSeconds) <= 2) {
        kasihPakan(jadwal[i].idTakaran);
      }
    }
  }
}

void kasihPakan(int idTakaran) {
  int jumlahGerakan = 0;
  if (idTakaran == 1) {
    jumlahGerakan = 3;
  } else if (idTakaran == 2) {
    jumlahGerakan = 5;
  }

  for (int i = 1; i <= jumlahGerakan; i++) {
    myServo.write(90);
    delay(500);
    myServo.write(0);
    delay(500);
  }
}

void getDataFromServer() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    // http.setTimeout(10000); // Timeout after 10 seconds
    http.begin(String(serverIP) + "/Projek-PPL/pais/public/?controller=c_jadwal_kolam&method=getJadwalJson&params=1");
    int httpCode = http.GET();

    if (httpCode > 0) {
      String payload = http.getString();
      Serial.println("Received payload:");
      Serial.println(payload);

      StaticJsonDocument<2048> doc;
      DeserializationError error = deserializeJson(doc, payload);
      if (error) {
        Serial.print("deserializeJson() failed: ");
        Serial.println(error.c_str());
        return;
      }

      int i = 0;
      for (JsonObject obj : doc.as<JsonArray>()) {
        const char* waktu = obj["waktu"];
        int id_kolam = obj["id_kolam"];
        int id_takaran = obj["id_takaran"];
        int id_user = obj["id_user"];
        bool is_active = obj["is_active"];

        JsonObject takaran = obj["takaran"];
        const char* takaran_nama = takaran["nama"];
        int takaran_jumlah = takaran["jumlah"];

        String waktuStr = String(waktu);
        int separatorIndex = waktuStr.indexOf(':');
        jadwal[i].jam = waktuStr.substring(0, separatorIndex).toInt();
        jadwal[i].menit = waktuStr.substring(separatorIndex + 1).toInt();
        jadwal[i].idTakaran = id_takaran;
        jadwal[i].jumlahTakaran = takaran_jumlah;
        jadwal[i].isActive = is_active;
        i++;
      }
    } else {
      Serial.println("Error on HTTP request");
    }
    http.end();
  }
}

void sendNotificationIfNeeded() {
  DateTime now = rtc.now();
  TimeSpan interval = now - lastMessageSentTime;

  // Delay pengiriman tiap pesan
  if (interval.totalseconds() >= 3600) { // 1 hour = 3600 seconds
    kirimPesan();
    lastMessageSentTime = now;
  } else {
    Serial.println("Not sending message, 1-hour interval not yet passed.");
  }
}

void kirimPesan() {
  if(WiFi.status()== WL_CONNECTED) {
    HTTPClient http;
    http.begin(String(serverIP) + "/Projek-PPL/pais/public/?controller=c_notifikasi&method=addPesan");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    String message = "Segera isi kembali pakan! Stok hampir habis.";
    String postData = "pesan=" + message;

    int httpCode = http.POST(postData);
    String payload = http.getString();

    Serial.println(postData);
    Serial.println(payload);
    Serial.println("Berhasil mengirimkan data.");

    http.end();
  }
}
