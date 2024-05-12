<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/pesan.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
        .custom-card {
            width: 800px;
            height: 600px;
        }
    
        .custom-card-child {
            height: 500px;
        }
        </style>
</head>
<body>
    <!-- Main content -->
    <div class="main-content">
        <!-- Tabel Pesan -->
        <div class="container mt-2">
            <div class="d-flex justify-content-center" style="padding-top: 50px;">
                <div class="card custom-card" style="background-color: #d9dada">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-start" style="font-size: 36px; font-weight: 500;">Pesan</h3>
                    </div>
                    <div class="card-body">
                        <!-- Isi Pesan -->
                        <div class="card custom-card-child"
                            style="background-color: #FFFFFF; overflow-y: auto; max-height: 500px;">
                            <div class="card-body" id="reloadcard">
                                <div class="d-flex justify-content-between ms-3 me-3">
                                    <h5 class="text-black">Segera isi kembali pakan, stok hampir habis</h5>
                                    <div class="row text-white">
                                        <div class="col-auto">
                                            <h5 class="text-black d-inline-block me-2">
                                                19 Mei
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- Divider -->
                                <hr class="text-black">
                                <div class="d-flex justify-content-between ms-3 me-3">
                                    <h5 class="text-black">Segera isi kembali pakan, stok hampir habis</h5>
                                    <div class="row text-white">
                                        <div class="col-auto">
                                            <h5 class="text-black d-inline-block me-2">
                                                19 Mei
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- Divider -->
                                <hr class="text-black">
                                <div class="d-flex justify-content-between ms-3 me-3">
                                    <h5 class="text-black">Segera isi kembali pakan, stok hampir habis</h5>
                                    <div class="row text-white">
                                        <div class="col-auto">
                                            <h5 class="text-black d-inline-block me-2">
                                                19 Mei
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- Divider -->
                                <hr class="text-black">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
