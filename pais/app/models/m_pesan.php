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

    public function insertPesan($message) {
        $insertQuery = "INSERT INTO notifikasi (pesan, id_user) VALUES (:pesan, 1)";
        $this->db->query($insertQuery);
        $this->db->bind(':pesan', $message);
        return $this->db->execute();
    }

    public function isPesanExist($message) {
        $selectQuery = "SELECT COUNT(*) as count FROM notifikasi WHERE pesan = :pesan";
        $this->db->query($selectQuery);
        $this->db->bind(':pesan', $message);
        $this->db->execute();
        $result = $this->db->single();
        return $result['count'] > 0;
    }
}
