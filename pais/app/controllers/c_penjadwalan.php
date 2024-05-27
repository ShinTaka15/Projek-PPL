<?php

class c_penjadwalan extends Controller{

    public function showPenjadwalan()
    {
        $userModel = $this->model('m_user');
        
        $data['kolam'] = $userModel->getDataKolam();
        
        $pesanModel = $this->model('m_pesan');
        $data['unread_count'] = $pesanModel->countUnread();

        $this->view('user/penjadwalan',$data); 
        $this->view('template/sidebar', $data);
    }
    
    public function getUnreadCount()
    {
        $pesanModel = $this->model('m_pesan');
        $unreadCount = $pesanModel->countUnread();
        echo json_encode(['unread_count' => $unreadCount]);
    }

}