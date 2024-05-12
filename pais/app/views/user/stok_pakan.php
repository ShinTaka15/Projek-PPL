
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Pakan | PAIS</title><link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/stok_pakan.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <style>
        .custom-card {
            width: 700px;
            height: 500px;
            border-radius: 20px;
        }

        .custom-card-child {
            width: 550px;
            height: 350px;
            border-radius: 20px;
            margin: auto;
        }
    </style>
</head>
<body>
    <!-- Main content -->
    <div class="main-content">
        <!-- Tabel Pesan -->
        <div class="container mt-2">
            <div class="d-flex justify-content-center" style="padding-top: 100px;">
                <div class="card custom-card" style="background-color: #d9dada">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-start">Kolam 1</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="fw-bold ms-3">Nila Hitam</h3>
                        <!-- Isi konten card disini -->
                        <div class="card custom-card-child"
                            style="background-color: #34344a; overflow-y: auto; max-height: 350px;">
                            <div class="card-body">
                                <p class="text-white fw-normal fs-5">Persediaan stok pakan pada alat pakan otomatis :</p>
                                <div class="box-container" style="margin-top: 50px;">
                                    <div class="label-box">
                                        <h4 class="text-white">Persentase</h4>
                                        <div class="box">
                                            <p class="text-white">30 %</p>
                                        </div>
                                    </div>
                                    <div class="label-box">
                                        <h4 class="text-white">Jumlah Pakan</h4>
                                        <div class="box" style="display: flex;">
                                            <i class="bi bi-plus-slash-minus text-white" style="padding-right: 15px;"></i>
                                            <p class="text-white">300 gram</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
