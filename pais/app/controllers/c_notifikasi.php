<?php

class c_notifikasi extends Controller {

    public function showPesan()
    {
        $pesanModel = $this->model('m_pesan');
        $data['notifikasi'] = $pesanModel->getPesan();

        $this->view('user/pesan', $data);
        $this->view('template/sidebar');
    }

    public function showStokPakan()
    {
        $this->view('user/stok_pakan');
        $this->view('template/sidebar');
    }
}