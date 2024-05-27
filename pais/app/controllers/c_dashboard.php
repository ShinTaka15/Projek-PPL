<?php

class c_dashboard extends Controller {

    public function showDashboard()
    {
        $pesanModel = $this->model('m_pesan');
        $data['unread_count'] = $pesanModel->countUnread();

        $this->view('user/dashboard');
        $this->view('template/sidebar_dashboard', $data);
    }

    public function getUnreadCount()
    {
        $pesanModel = $this->model('m_pesan');
        $unreadCount = $pesanModel->countUnread();
        echo json_encode(['unread_count' => $unreadCount]);
    }
}
