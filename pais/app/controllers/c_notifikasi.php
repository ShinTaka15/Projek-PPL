<?php

class c_notifikasi extends Controller {

    public function showPesan()
    {
        $pesanModel = $this->model('m_pesan');
        $data['notifikasi'] = $pesanModel->getPesan();
        $data['unread_count'] = $pesanModel->countUnread();

        // Mark all messages as read when the messages are viewed
        $pesanModel->markAllAsRead();

        $this->view('user/pesan', $data);
        $this->view('template/sidebar', $data);
    }

    public function showStokPakan()
    {
        $this->view('user/stok_pakan');
        $this->view('template/sidebar');
    }

    public function addPesan()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['pesan'])) {
                $message = $_POST['pesan'];
                $pesanModel = $this->model('m_pesan');
                $pesanModel->insertPesan($message);

                header('Location:?controller=c_notifikasi&method=showPesan');
                exit();
            }
        }
    }

    public function getUnreadCount()
    {
        $pesanModel = $this->model('m_pesan');
        $unreadCount = $pesanModel->countUnread();
        echo json_encode(['unread_count' => $unreadCount]);
    }
}
