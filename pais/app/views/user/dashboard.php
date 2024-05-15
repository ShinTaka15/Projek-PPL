<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | PAIS</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/dashboard.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
    .custom-card {
        width: 200px;
        height: 200px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="container pt-5 mx-5 mb-5">
            <div class="container">
                <h1 class="text-white">Selamat Datang di Website PAIS</h1>
                <p class="text-white fs-4">Pakan Ikan Otomatis</p>
            </div>
        </div>

        <div class="container text-center">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <div class="d-flex justify-content-center">
                        <div class="card custom-card"
                            onclick="location.href='?controller=c_penjadwalan&method=showPenjadwalan'">
                            <div class=" card-body d-flex align-items-center justify-content-center p-0">
                                <img src="<?= BASEURL; ?>/images/penjadwalan.jpeg" class="card-img-top rounded-2" style="width: 100%; height: auto;">
                            </div>
                            <div class="card-footer card-img-overlay">
                                <h5 class="card-title d-flex align-items-center justify-content-center">PENJADWALAN</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex justify-content-center">
                        <div class="card custom-card"
                            onclick="location.href='?controller=c_notifikasi&method=showPesan'">
                            <div class=" card-body d-flex align-items-center justify-content-center p-0">
                                <img src="<?= BASEURL; ?>/images/pesan.jpeg" class="card-img-top rounded-2" style="width: 100%; height: auto;">
                            </div>
                            <div class="card-footer card-img-overlay">
                                <h5 class="card-title d-flex align-items-center justify-content-center">PESAN</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASEURL; ?>/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
