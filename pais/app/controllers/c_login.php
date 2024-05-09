<?php

class c_login extends Controller {

    public function showLogin() {
        
    }

    public function processLogin($username, $password) {
        $loginModel = new LoginModel();

        // Memeriksa kredensial menggunakan model
        $isValid = $loginModel->checkCredentials($username, $password);

        // Jika kredensial valid, lanjutkan ke halaman selanjutnya
        if ($isValid) {
            header("Location: ../view/dashboard.php");
            exit;
        } else {
            // Jika kredensial tidak valid, tampilkan pesan kesalahan
            header("Location: ../view/login.php?error=true");
            exit;
        }
    }

    public function showError() {
        // Tampilkan pesan error dengan JavaScript
        echo "<script>document.getElementById('popup').style.display = 'block';</script>";
    }
}

    // Ambil input dari form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['email'];
        $password = $_POST['password'];

        // Buat instance dari controller dan panggil method processLogin
        $loginController = new LoginController();
        $loginController->processLogin($username, $password);

}