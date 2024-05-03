<?php 

class m_user{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getDataKolam(){
        $selectQuery = "SELECT * FROM kolam";
        $this->db->query($selectQuery);
        
        $this->db->execute();
        return $this->db->all();
    }

    public function createKolam($nama_kolam){
        $this->db->query("INSERT INTO kolam(nama_kolam) VALUES (:nama_kolam)");
        $this->db->bind(':nama_kolam',$nama_kolam);
        if ($this->db->execute()) {
            return true;
        } else{
            return false;
        }
    }
    
    public function getDataKolamByid($id){
        $this->db->query("SELECT * FROM kolam WHERE id_kolam = $id");
        $this->db->execute();
        return $this->db->all();
    }

    public function getDataPenjadwalan($idKolam){
        
    }
}