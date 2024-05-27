<?php

class c_jadwal_kolam extends Controller {
    
    public function jadwal_kolam()
    {
        $userId = 1;
        $jadwalKolam = $this->model('m_jadwal');
        $userModel = $this->model('m_user');
        
        $data['kolam'] = $userModel->getDataKolamByid($_GET['params']);
        
        $data['jadwal'] = $jadwalKolam->getDataJadwal($_GET['params']);
        $data['params'] = $_GET['params'];
        $idKolam = $_GET['params'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data yang dikirimkan melalui POST
            
            $action = $_POST['action'];
            
        
            if ($action == "create") {
                $waktu = $_POST['waktu'];
                $idTakaran = $_POST['id'];
                $result = $jadwalKolam->addJadwal( $waktu, $idKolam,$idTakaran,$userId);
                $response = array(
                    "status" => $result,
                );
                
                // Mengubah array menjadi format JSON
                echo( json_encode($response)); 
                return  json_encode($response) ;
            } else if($action == "updateToggle"){
                $jadwalId = $_POST['id_jadwal'];
                $isToggleOn = $_POST['is_active'];
                $result = $jadwalKolam->updateIsActive( $jadwalId, $isToggleOn);
                $response = array(
                    "status" => $result,
                );
                
                // Mengubah array menjadi format JSON
                echo( json_encode($response)); 
                return  json_encode($response) ;
            } else if($action == "updateData"){
                $waktuUpdate = $_POST['waktuUpdate'];
                $id_takaran = $_POST['id_takaran'];
                $id_jadwal = $_POST['id_jadwal'];

                $result = $jadwalKolam->updateData( $waktuUpdate, $id_takaran, $id_jadwal);
                $response = array(
                    "status" => $result,
                );
                
                // Mengubah array menjadi format JSON
                echo( json_encode($response)); 
                return  json_encode($response) ;
            } 
            
        }
        
        foreach ($data['jadwal'] as &$jadwal) {
            // Mendapatkan data takaran berdasarkan id_takaran dari masing-masing jadwal
            $takaran = $jadwalKolam->getDataTakaran($jadwal['id_takaran']);
    
            // Menambahkan informasi takaran ke dalam array jadwal
            $jadwal['takaran'] = $takaran;
        }

        $data['takaranAll'] = $jadwalKolam->getDataTakaranAll();
        unset($jadwal); 

        $pesanModel = $this->model('m_pesan');
        $data['unread_count'] = $pesanModel->countUnread();

        // Memuat view dengan data yang telah diproses
        $this->view('user/jadwal_kolam', $data);  
        $this->view('template/sidebar', $data);
    }

    public function cardJadwal()
    {        
        $jadwalKolam = $this->model('m_jadwal');
        
        $data['jadwal'] = $jadwalKolam->getDataJadwal($_GET['params']);
        
        foreach ($data['jadwal'] as &$jadwal) {
            // Mendapatkan data takaran berdasarkan id_takaran dari masing-masing jadwal
            $takaran = $jadwalKolam->getDataTakaran($jadwal['id_takaran']);
    
            // Menambahkan informasi takaran ke dalam array jadwal
            $jadwal['takaran'] = $takaran;
        }
        unset($jadwal); 
        $this->view('user/widget/cardJadwal', $data);

    }

    public function cardUpdate()
    {        
        $userId = 1;
        $jadwalKolam = $this->model('m_jadwal');
        $userModel = $this->model('m_user');
        
        $data['kolam'] = $userModel->getDataKolamByid($_GET['params']);
        
        $data['jadwal'] = $jadwalKolam->getDataJadwal($_GET['params']);
        $data['params'] = $_GET['params'];
        $idKolam = $_GET['params'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data yang dikirimkan melalui POST
            
            $action = $_POST['action'];
            
        
            if ($action == "create") {
                $waktu = $_POST['waktu'];
                $idTakaran = $_POST['id'];
                $result = $jadwalKolam->addJadwal( $waktu, $idKolam,$idTakaran,$userId);
                $response = array(
                    "status" => $result,
                );
                
                // Mengubah array menjadi format JSON
                echo( json_encode($response)); 
                return  json_encode($response) ;
            } else if($action == "updateToggle"){
                $jadwalId = $_POST['jadwalId'];
                $isToggleOn = $_POST['isToggleOn'];
                $result = $jadwalKolam->updateIsActive( $jadwalId, $isToggleOn);
                $response = array(
                    "status" => $result,
                );
                
                // Mengubah array menjadi format JSON
                echo( json_encode($response)); 
                return  json_encode($response) ;
                
            }
            
        }
        
        foreach ($data['jadwal'] as &$jadwal) {
            // Mendapatkan data takaran berdasarkan id_takaran dari masing-masing jadwal
            $takaran = $jadwalKolam->getDataTakaran($jadwal['id_takaran']);
    
            // Menambahkan informasi takaran ke dalam array jadwal
            $jadwal['takaran'] = $takaran;
        }

        $data['takaranAll'] = $jadwalKolam->getDataTakaranAll();
        unset($jadwal); 
        $this->view('user/widget/update', $data);

    }

    public function getJadwalJson()
    {
        if (isset($_GET['params'])) {
            $jadwalKolam = $this->model('m_jadwal');
            $data['jadwal'] = $jadwalKolam->getDataJadwal($_GET['params']);
            foreach ($data['jadwal'] as &$jadwal) {
                $takaran = $jadwalKolam->getDataTakaran($jadwal['id_takaran']);
                $jadwal['takaran'] = $takaran;
            }
            unset($jadwal);
            echo json_encode($data['jadwal']);
        } else {
            echo json_encode([]);
        }
    }

    public function getUnreadCount()
    {
        $pesanModel = $this->model('m_pesan');
        $unreadCount = $pesanModel->countUnread();
        echo json_encode(['unread_count' => $unreadCount]);
    }
}
