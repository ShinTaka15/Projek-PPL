<?php

class c_akun extends Controller {

    public function showAkun()
    {
        $akunModel = $this->model('m_akun');

        $data['id'] = $akunModel->getDataAkun($_GET['params']);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data yang dikirimkan melalui POST
            $action = $_POST['action'];
        
            if ($action == "updateData") {
                $id_user = $_POST['userId'];
                $username = $_POST['username'];
                $password = $_POST['password'];
        
                $result = $akunModel->sendDataAkun($username, $password, $id_user);
                $response = array(
                    "status" => $result,
                );
        
                // Mengubah array menjadi format JSON
                echo json_encode($response);
                return json_encode($response);
            }
        }
        
        $pesanModel = $this->model('m_pesan');
        $data['unread_count'] = $pesanModel->countUnread();

        $this->view('user/akun', $data);
        $this->view('template/sidebar', $data);
    }

    public function getUnreadCount()
    {
        $pesanModel = $this->model('m_pesan');
        $unreadCount = $pesanModel->countUnread();
        echo json_encode(['unread_count' => $unreadCount]);
    }

}
