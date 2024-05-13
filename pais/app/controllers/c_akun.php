<?php

class c_akun extends Controller {

    public function showAkun()
    {
        $akunModel = $this->model('m_akun');

        $data['id'] = $akunModel->getDataAkun($_GET['params']);

        $this->view('user/akun', $data);
        $this->view('template/sidebar');
    }

}
