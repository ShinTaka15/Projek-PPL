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
        $insertQuery = "INSERT INTO notifikasi (pesan, id_user, is_read, tanggal) VALUES (:pesan, 1, 0, CURRENT_TIMESTAMP)";
        $this->db->query($insertQuery);
        $this->db->bind(':pesan', $message);
        return $this->db->execute();
    }

    public function countUnread() {
        $query = "SELECT COUNT(*) as unread_count FROM notifikasi WHERE is_read = 0";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->single()['unread_count'];
    }

    public function markAllAsRead() {
        $query = "UPDATE notifikasi SET is_read = 1 WHERE is_read = 0";
        $this->db->query($query);
        return $this->db->execute();
    }
}
