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

    public function sendDataAkun($username, $password, $id_user) {
        $id_user = (int) $id_user;

        $updateQuery = "UPDATE user SET username = :username , password = :password WHERE id_user = :id_user";
        $this->db->query($updateQuery);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':id_user', $id_user, PDO::PARAM_INT); // Mengikat $id_user sebagai integer

        $this->db->execute();
        return 1;
    }
}
