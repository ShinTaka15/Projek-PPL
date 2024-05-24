<?php 

class m_jadwal{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataJadwal($id){
        $selectQuery = "SELECT * FROM jadwal WHERE id_kolam=$id";
        $this->db->query($selectQuery);
        $this->db->execute();
        return $this->db->all();
    }

    public function getDataTakaran($id){
        // Query untuk mengambil data takaran berdasarkan id
        $selectQuery = "SELECT * FROM takaran WHERE id_takaran = :id";
        
        // Bind parameter
        $this->db->query($selectQuery);
        $this->db->bind(':id', $id);
        
        // Eksekusi query
        $this->db->execute();
        
        // Mengembalikan hasil dalam bentuk array
        return $this->db->single(); // Karena kita hanya ingin satu baris hasil
    }

    public function getDataTakaranAll(){
        $selectQuery = "SELECT * FROM takaran";
        $this->db->query($selectQuery);
        
        $this->db->execute();
        return $this->db->all();
    }

    public function addJadwal($waktu, $idKolam, $idTakaran, $userId){
        // Query untuk menambahkan jadwal baru
        $insertQuery = "INSERT INTO jadwal (waktu, is_active, id_kolam, id_takaran, id_user) VALUES (:waktu, 1, :idKolam, :idTakaran, :userId)";
        
        // Bind parameter
        $this->db->query($insertQuery);
        $this->db->bind(':waktu', $waktu);
        $this->db->bind(':idKolam', $idKolam);
        $this->db->bind(':idTakaran', $idTakaran);
        $this->db->bind(':userId', $userId);
        $this->db->execute();
        // Eksekusi query
        return 1;
    }

    public function updateIsActive( $jadwalId, $isToggleOn){
        $updateQuery = "UPDATE jadwal SET is_active = $isToggleOn WHERE id_jadwal = $jadwalId";
        $this->db->query($updateQuery);
        $this->db->execute();

        return 1;
    }

    public function updateData($waktuUpdate, $id_takaran, $id_jadwal){
        // Konversi $id_takaran dan $id_jadwal ke integer
        $id_takaran = (int) $id_takaran;
        $id_jadwal = (int) $id_jadwal;
    
        $updateQuery = "UPDATE jadwal SET waktu = :waktuUpdate, id_takaran = :id_takaran WHERE id_jadwal = :id_jadwal";
        
        $this->db->query($updateQuery);
        $this->db->bind(':waktuUpdate', $waktuUpdate);
        $this->db->bind(':id_takaran', $id_takaran, PDO::PARAM_INT); // Mengikat $id_takaran sebagai integer
        $this->db->bind(':id_jadwal', $id_jadwal, PDO::PARAM_INT); // Mengikat $id_jadwal sebagai integer
        
        $this->db->execute();
    
        return 1;
    }
}
