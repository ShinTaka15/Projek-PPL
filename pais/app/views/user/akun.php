<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Akun</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/akun.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="container mt-5 mx-5 mb-5">
            <h1 class="text-white">Selamat Datang, Suhadi</h1>
            <p class="text-white fs-4">Pakan Ikan Otomatis</p>
            <div class="login-container">
                <div class="form-field">
                    <i class="bi bi-person-circle" style="font-size: 100px; width: 100px; height: 100px;"></i>
                </div>
                <div class="form-field">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" value="Suhadi" readonly>
                </div>
                <div class="form-field">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" value="password" readonly>
                </div>
                <button class="login-button">EDIT</button>
            </div>
        </div>
    </div>

    <!-- sidebar -->
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px">
        <div class="logo">
            <img src="images/logo_ikan.png" alt="" />
            <p class="fs-4 fw-bolder text-start">PAIS</p>
        </div>
        <hr />
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="?controller=user&method=dashboard" class="nav-link link-dark" aria-current="page">
                    <i class="bi bi-house"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="?controller=user&method=akun" class="nav-link link-dark">
                    <i class="bi bi-person"></i>
                    Akun
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="bi bi-file-earmark"></i>
                    Pelaporan
                </a>
            </li>
            <li>
                <a href="?controller=user&method=penjadwalan" class="nav-link link-dark">
                    <i class="bi bi-calendar2"></i>
                    Penjadwalan
                </a>
            </li>
            <li class="parent">
                <a href="#" class="nav-link link-dark">
                    <i class="bi bi-bell"></i>
                    Notifikasi
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li><a href="#" class="link-dark rounded">Pesan</a></li>
                    <li><a href="#" class="link-dark rounded">Stok Pakan</a></li>
                </ul>
            </li>
        </ul>
        <hr />
    </div>
</body>

<script>
const sidebar = document.querySelector('.sidebar');

sidebar.addEventListener('click', (event) => {
    const clickedItem = event.target.closest('.parent');
    if (clickedItem) {
        clickedItem.classList.toggle('active');
    }
});
</script>
</html>
