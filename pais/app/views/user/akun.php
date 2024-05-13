<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Akun | PAIS</title>
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
        <div class="container mt-5 mx-5 ">
            <div class="container">
                <h1 class="text-white">Selamat Datang, Suhadi</h1>
                <p class="text-white fs-4">Pakan Ikan Otomatis</p>
            </div>
            <?php if(isset($data['id'])): ?>
            <div class="login-container">
                <div class="form-field">
                    <i class="bi bi-person-circle" style="font-size: 100px; width: 100px; height: 100px;"></i>
                </div>
                <div class="form-field">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" value="<?php echo $data['id']['username']; ?>" readonly>
                </div>
                <div class="form-field">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" value="<?php echo $data['id']['password']; ?>" readonly>
                </div>
                <button class="login-button">EDIT</button>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
</body>
</html>
