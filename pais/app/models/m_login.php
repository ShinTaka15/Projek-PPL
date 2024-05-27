<?php 

class m_login {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataAkun($username, $password){
        $selectQuery = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $this->db->query($selectQuery);
        $this->db->execute();
        return $this->db->single();
    }
}
