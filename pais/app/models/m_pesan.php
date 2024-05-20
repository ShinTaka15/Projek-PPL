<?php 

class m_pesan {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPesan() {
        $selectQuery = "SELECT * FROM notifikasi";
        $this->db->query($selectQuery);
        $this->db->execute();
        return $this->db->all();
    }

    // public function insertPesan($message) {
    //     $insertQuery = "INSERT INTO notifikasi (message) VALUES (:message)";
    //     $this->db->query($insertQuery);
    //     $this->db->bind(':message', $message);
    //     return $this->db->execute();
    // }
}
