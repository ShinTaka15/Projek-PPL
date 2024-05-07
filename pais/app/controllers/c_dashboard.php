<?php

class c_dashboard extends Controller {

    public function showDashboard()
    {
        $this->view('user/dashboard');
        $this->view('template/sidebar');
    }
}