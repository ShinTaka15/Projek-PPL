<?php

class c_penjadwalan extends Controller{

    public function showPenjadwalan()
    {
        $userModel = $this->model('m_user');
        
        $data['kolam'] = $userModel->getDataKolam();
        
        $this->view('user/penjadwalan',$data); 
        $this->view('template/sidebar');
    }

}