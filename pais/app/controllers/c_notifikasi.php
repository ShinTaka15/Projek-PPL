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

    public function addPesan()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['pesan'])) {
                $message = $_POST['pesan'];
                $pesanModel = $this->model('m_pesan');

                // Periksa apakah pesan sudah ada
                if (!$pesanModel->isPesanExist($message)) {
                    $pesanModel->insertPesan($message);
                }

                header('Location:?controller=c_notifikasi&method=showPesan');
                exit();
            }
        }
    }
}
