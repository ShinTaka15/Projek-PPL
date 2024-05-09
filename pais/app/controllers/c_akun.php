<?php

class c_akun extends Controller {

    public function showAkun()
    {
        $this->view('user/akun');
        $this->view('template/sidebar');
    }

    public function setDataAkun()
    {
        
    }
}