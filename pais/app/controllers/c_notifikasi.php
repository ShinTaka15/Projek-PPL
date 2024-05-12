<?php

class c_notifikasi extends Controller {

    public function showPesan()
    {
        $this->view('user/pesan');
        $this->view('template/sidebar');
    }

    public function showStokPakan()
    {
        
    }
}