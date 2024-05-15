<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Kolam | PAIS</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/penjadwalan.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <style>
    .custom-card {
        width: 680px;
        height: 480px;
    }

    .custom-card-child {
        height: 350px;
    }
    </style>
</head>

<body>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="container pt-3 ms-5">
            <h1 class="text-white">Penjadwalan</h1>
            <p class="text-white fs-4">Pakan Ikan Otomatis</p>
        </div>
        <!-- 34344A  primary color-->
        <div class="container mt-2">
            <div class="d-flex justify-content-center">
                <div class="card custom-card" style="background-color: #d9dada">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-start">Kolam <?php  echo $data['kolam'][0]['id_kolam']; ?></h3>
                        <!-- <div class="form-check form-switch text-center align-content-center">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                checked />
                        </div> -->
                    </div>
                    <div class="card-body">
                        <h3 class="fw-bold ms-3"><?php  echo $data['kolam'][0]['nama_kolam']; ?></h3>
                        <!-- Isi konten card disini -->
                        <div class="card custom-card-child"
                            style="background-color: #34344a; overflow-y: auto; max-height: 350px;">
                            <div class="card-body" id="reloadcard">
                                <?php require_once 'widget/cardJadwal.php'?>
                            </div>
                        </div>

                        <!-- Tombol + -->
                        <button
                            class="btn text-white position-absolute start-50 translate-middle-x bottom-0 mb-n2 rounded-5"
                            style="background-color: #726948; padding: 1rem 1.8rem" data-bs-toggle="modal"
                            data-bs-target="#tambahMODAL">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once 'widget/create.php'
    ?>
    <div class="" id="reloadcardupdate">
        <?php
     require_once 'widget/update.php'
    ?>
    </div>




    <script src="../public/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>