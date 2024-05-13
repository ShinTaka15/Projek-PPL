<?php 

class m_akun {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataAkun($id) {
        $selectQuery = "SELECT * FROM user WHERE id_user = $id";
        $this->db->query($selectQuery);
        $this->db->execute();
        return $this->db->single();
    }
}
