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
}
