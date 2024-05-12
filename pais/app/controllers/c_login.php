<?php

class c_login extends Controller {

    public function showLogin() {
        $this->view('user/login');
    }

    public function processLogin($username, $password) {
        $loginModel = $this->model('m_login');

        // Memeriksa kredensial menggunakan model
        $isValid = $loginModel->getDataAkun($username, $password);

        // Jika kredensial valid, lanjutkan ke halaman selanjutnya
        if ($isValid) {
            header("Location:?controller=c_dashboard&method=showDashboard");
            exit;
        } else {
            // Jika kredensial tidak valid, tampilkan pesan kesalahan
            header("Location:?controller=c_login&method=showLogin?error=true");
            exit;
        }
    }

    public function showError() {
        // Tampilkan pesan error dengan JavaScript
        echo "<script>document.getElementById('popup').style.display = 'block';</script>";
    }
}

    // Ambil input dari form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['email'];
        $password = $_POST['password'];

        // Buat instance dari controller dan panggil method processLogin
        $loginController = new c_login();
        $loginController->processLogin($username, $password);

}