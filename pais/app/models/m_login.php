<?php 

class m_login{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataAkun($id){
        $selectQuery = "SELECT * FROM jadwal WHERE id_kolam=$id";
        $this->db->query($selectQuery);
        $this->db->execute();
        return $this->db->single();
    }
}