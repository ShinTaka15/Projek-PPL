<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Kolam</title>
    <link rel="icon" type="image/x-icon" href="../public/images/logo_ikan.png" />
    <link rel="stylesheet" href="../public/css/penjadwalan.css" />
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
                        <div class="form-check form-switch text-center align-content-center">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                checked />
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="fw-bold ms-3"><?php  echo $data['kolam'][0]['nama_kolam']; ?></h3>
                        <!-- Isi konten card disini -->
                        <div class="card custom-card-child"
                            style="background-color: #34344a; overflow-y: auto; max-height: 350px;">
                            <div class="card-body" id="reloadcard">
                                <?php 
                                    $jadwalCount = count($data['jadwal']);
                                    $showScroll = $jadwalCount > 3 ? "overflow-y: auto;" : "";
                                ?>

                                <?php foreach ($data['jadwal'] as $jadwal): ?>
                                <div class="d-flex justify-content-between ms-3 me-3">
                                    <h1 class="text-white fw-bold"><?php echo $jadwal['waktu']; ?></h1>
                                    <div class="row text-white fw-bold">
                                        <div class="col-auto">
                                            <h1 class="d-inline-block me-2">
                                                <?php echo $jadwal['takaran']['jumlah_takaran']; ?>
                                            </h1>
                                            <h3 class="d-inline-block">GRAM</h3>
                                        </div>

                                        <div class="col-auto mt-3 " style="cursor:pointer ;" data-bs-toggle="modal"
                                            data-bs-target="#editMODAL<?php echo $jadwal['id_jadwal']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Divider -->
                                <hr class="text-white">
                                <?php endforeach; ?>
                                <!-- Edit Button -->
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

<!-- Widget Tambah Data Jadwal -->
<div class="modal fade" id="tambahMODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-5">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penjadwalan</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Kolom kiri -->
                    <div class="col align-items-center">
                        <div class="form-group">
                            <input type="time" class="form-control fs-5 px-5 text-center fw-medium" id="waktu" />
                        </div>
                    </div>
                    <hr class="d-sm-none" />
                    <!-- Kolom kanan -->
                    <div class="col align-items-center">
                        <?php foreach ($data['takaranAll'] as $takaran): 
                            ?>
                        <div class="form-check">
                            <input class="form-check-input fs-5" style="font-size: 2rem" type="radio" name="gram"
                                id="inputTakaran" value="<?php echo $takaran['id_takaran']; ?>" />
                            <label class="form-check-label fs-5" style="font-size: 2.5rem"
                                for="gram<?php echo $takaran['jumlah_takaran']; ?>"><?php echo $takaran['jumlah_takaran']; ?>
                                Gram </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn text-white fs-5" style="background-color: #c78130"
                    data-bs-dismiss="modal" id="pusher">KEMBALI</button>
                <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal"
                    id="createData">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<!-- Widget Ubah Data Jadwal -->
<div class="" id="reloadcardupdate">
    <?php foreach ($data['jadwal'] as $jadwal): ?>
    <div class="modal fade" id="editMODAL<?php echo $jadwal['id_jadwal']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Penjadwalan</h5>
                </div>
                <div class="modal-body">
                    <!-- Baris pertama container -->
                    <div class="container mb-3 rounded-4" style="background-color: #f2e7ed">
                        <div class="d-flex justify-content-between align-items-center text-center">
                            <div class=" d-flex align-items-center justify-content-center">
                                <div class="form-check form-switch d-inline-block me-3">
                                    <input class="form-check-input toggle-switch" type="checkbox"
                                        id="toggleSwitch<?php echo $jadwal['id_jadwal']; ?>"
                                        <?php if ($jadwal['is_active'] == 1): ?> checked <?php endif; ?> />
                                    <label class="form-check-label"
                                        for="toggleSwitch<?php echo $jadwal['id_jadwal']; ?>"></label>

                                </div>
                                <input type="time" id="waktu<?php echo $jadwal['id_jadwal']; ?>"
                                    class="form-control fw-semibold fs-4 <?php if ($jadwal['is_active'] == 0): ?> text-secondary <?php endif; ?>"
                                    value="<?php echo $jadwal['waktu']; ?>" <?php if ($jadwal['is_active'] == 0): ?>
                                    readonly <?php endif; ?> />
                            </div>
                            <div class="pt-3 pb-3">
                                <div style="list-style-type: none;">
                                    <div class="nav-item text-decoration-none" disabled>
                                        <div class="container d-flex" style="flex-direction:column; ">
                                            <?php foreach ($data['takaranAll'] as $takaran): ?>
                                            <li class="nav-item d-flex align-items-center">
                                                <input class="form-check-input me-3 fs-5" style="font-size: 2rem"
                                                    type="radio" name="gram_<?php echo $jadwal['id_jadwal']; ?>"
                                                    id="toggleSwitch<?php echo $jadwal['id_jadwal']; ?>"
                                                    value=" <?php echo $takaran['id_takaran']; ?>"
                                                    <?php if ($takaran['id_takaran'] == $jadwal['id_takaran']): ?> checked
                                                    <?php endif; ?> <?php if ($jadwal['is_active'] == 0): ?> disabled
                                                    <?php endif; ?> />
                                                <label for="toggleSwitch<?php echo $jadwal['id_jadwal']; ?>"
                                                    class="fs-4 d-inline-block toggle-text d-flex align-items-center <?php if ($jadwal['is_active'] == 0): ?> text-secondary <?php else: ?> text-black <?php endif; ?>"
                                                    style="text-decoration: none; font-size: 2.5rem <?php if ($jadwal['is_active'] == 0): ?> text-secondary <?php else: ?> text-black <?php endif; ?>">
                                                    <?php echo $takaran['jumlah_takaran']; ?> GRAM
                                                </label>
                                            </li>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn text-white" style="background-color: #c78130"
                        data-bs-dismiss="modal">KEMBALI</button>
                    <button type="button" id="simpanButton<?php echo $jadwal['id_jadwal']; ?>" class="btn btn-secondary"
                        data-bs-dismiss="modal" onclick="simpanData('<?php echo $jadwal['id_jadwal']; ?>')">SIMPAN</button>

                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Javascript di Widget Tambah Data -->
<script>
let jadwalCount = <?php echo $jadwalCount; ?>;

// Fungsi untuk menampilkan nilai jadwalCount
function displayJadwalCount() {
    console.log("Jumlah jadwal saat ini:", jadwalCount);
}

// Fungsi untuk menambah jadwalCount
function increaseJadwalCount() {
    jadwalCount++;
}

$('#createData').click(function() {
    let waktu = $('#waktu').val();
    let selectedRadioButton = $("input[name='gram']:checked").val();

    if (waktu === '' || selectedRadioButton === undefined) {
        Swal.fire({
            title: 'Gagal!',
            text: 'Silakan Isi Kembali',
            icon: 'warning'
        }).then(() => {
            $('#waktu').val('');
            $("input[name='gram']").prop('checked', false);
        });
    } else {
        // Lakukan perulangan pada data penjadwalan yang sudah ada
        <?php foreach ($data['jadwal'] as $jadwal): ?>
        <?php
        // Ambil waktu dari data penjadwalan dan hapus ":00" belakangnya
        $waktu_jadwal = substr($jadwal['waktu'], 0, -3);
        ?>
        // Bandingkan nilai inputan waktu dengan waktu yang sudah ada
        console.log("Perbandingan waktu:", "<?php echo $waktu_jadwal; ?>" === waktu);
        console.log("Waktu yang dimasukkan:", waktu);
        console.log("Waktu yang sudah ada:", "<?php echo $jadwal['waktu']; ?>");
        if ("<?php echo $waktu_jadwal; ?>" === waktu) {
            // Jika waktu sama, tampilkan pesan kesalahan
            Swal.fire({
                title: "Gagal!",
                text: "Waktu tidak boleh sama.",
                icon: "warning"
            });
            // Kosongkan nilai inputan waktu
            $('#waktu').val('');
            // Hapus seleksi radio button
            $("input[name='gram']").prop('checked', false);
            // Hentikan proses penyimpanan data
            return;
        }
        <?php endforeach; ?>


        // Jumlah jadwal saat ini
        if (jadwalCount >= 5) {
            showWarning();
        } else {
            displayJadwalCount()
            createData(waktu, selectedRadioButton);
            $('#waktu').val('');
            $("input[name='gram']").prop('checked', false);
            increaseJadwalCount();
            displayJadwalCount()
        }
    }
});



function createData(waktu, id) {
    $.ajax({
            url: '<?= BASEURL ?>/?controller=c_penjadwalan&method=jadwal_kolam&params=<?= $data['params'] ?>',
            type: 'POST',
            data: {
                waktu: waktu,
                id: id,
                action: "create"
            }
        })
        .done(function(response) {
            var result = JSON.parse(response);
            if (result.status == 1) {

                Swal.fire({
                    title: "Berhasil!",
                    text: "Jadwal Berhasil Ditambahkan.",
                    icon: "success"
                });
                $('#waktu').val('');
                $("input[name='gram']").prop('checked', false);
                refreshDiv();

            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: "Silakan Isi Kembali.",
                    icon: "error"
                });
            }
        })
        .fail(function(xhr, status, error) {
            refreshDiv();
            Swal.fire({
                title: "Error!",
                text: "Silakan Isi Kembali",
                icon: "error"
            });
        });
}

function refreshDiv() {
    $('#reloadcard').load(
        '<?= BASEURL ?>/?controller=c_penjadwalan&method=cardJadwal&params=<?=$data['params']?>',
        function(
            response, status,
            xhr) {
            if (status == "error") {
                console.error("Error: " + xhr.status + " " + xhr.statusText);
            }
        });

    $('#reloadcardupdate').load(
        '<?= BASEURL ?>/?controller=c_penjadwalan&method=cardUpdate&params=<?=$data['params']?>',
        function(
            response, status,
            xhr) {
            if (status == "error") {
                console.error("Error: " + xhr.status + " " + xhr.statusText);
            }
        });
}
</script>
<!--  -->

<!-- Javascript di Widget Ubah Data -->
<script>
$(document).ready(function() {
    $('.nav-link[data-bs-toggle="collapse"]').on('click', function() {
        var targetId = $(this).attr('href');
        var targetMenu = $(targetId);

        $('.collapse.show').not(targetMenu).collapse('hide');
    });
});
</script>

<script>
function simpanData(id_jadwal) {
    var waktu = $("#waktu" + id_jadwal).val();
    var id_takaran = $("input[name='gram_" + id_jadwal + "']:checked").val();

    // Tampilkan konfirmasi sebelum mengirimkan permintaan Ajax
    <?php foreach ($data['jadwal'] as $jadwal): ?>
    <?php
        // Ambil waktu dari data penjadwalan dan hapus ":00" belakangnya
        $waktu_jadwal = substr($jadwal['waktu'], 0, -3);
        ?>
    // Bandingkan nilai inputan waktu dengan waktu yang sudah ada
    console.log("Perbandingan waktu:", "<?php echo $waktu_jadwal; ?>" === waktu);
    console.log("Waktu yang dimasukkan:", waktu);
    console.log("Waktu yang sudah ada:", "<?php echo $jadwal['waktu']; ?>");
    if ("<?php echo $waktu_jadwal; ?>" === waktu) {
        // Jika waktu sama, tampilkan pesan kesalahan
        Swal.fire({
            title: "Gagal!",
            text: "Waktu tidak boleh sama.",
            icon: "warning"
        });
        // Kosongkan nilai inputan waktu
        $('#waktu<?php echo $jadwal['id_jadwal']; ?>').val('<?php echo $jadwal['waktu']; ?>');
        // Remove radio button selection
        $("input[name='gram_<?php echo $jadwal['id_jadwal']; ?>']").prop('checked',
            <?php echo ($takaran['id_takaran'] == $jadwal['id_takaran']) ? 'true' : 'false'; ?>).prop('disabled',
            <?php echo ($jadwal['is_active'] == 0) ? 'true' : 'false'; ?>);
        // Stop data saving process
        return;

    }
    <?php endforeach; ?>
    updateData(waktu, id_takaran, id_jadwal);
}


function updateData(waktu, id_takaran, id_jadwal) {
    console.log("Waktu: " + waktu);
    console.log("ID Takaran: " + id_takaran);
    // Lakukan request AJAX untuk mengirimkan data ke server
    $.ajax({
            url: '<?= BASEURL ?>/?controller=c_penjadwalan&method=jadwal_kolam&params=<?= $data['params'] ?>', // Ganti dengan URL yang sesuai
            type: 'POST',
            data: {
                waktuUpdate: waktu,
                id_takaran: id_takaran,
                id_jadwal: id_jadwal,
                action: "updateData"
            }
        })
        .done(function(response) {
            var result = JSON.parse(response);
            if (result.status == 1) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Data berhasil diperbarui.",
                    icon: "success"
                });
                refreshDiv();
            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: "Terjadi kesalahan saat memperbarui data.",
                    icon: "error"
                });
            }
        })
        .fail(function(xhr, status, error) {
            refreshDiv();
            Swal.fire({
                title: "Error!",
                text: "Terjadi kesalahan saat memperbarui data.",
                icon: "error"
            });
        });
}

function refreshDiv() {
    $('#reloadcard').load(
        '<?= BASEURL ?>/?controller=c_penjadwalan&method=cardJadwal&params=<?=$data['params']?>',
        function(
            response, status,
            xhr) {
            if (status == "error") {
                console.error("Error: " + xhr.status + " " + xhr.statusText);
            }
        });

    $('#reloadcardupdate').load(
        '<?= BASEURL ?>/?controller=c_penjadwalan&method=cardUpdate&params=<?=$data['params']?>',
        function(
            response, status,
            xhr) {
            if (status == "error") {
                console.error("Error: " + xhr.status + " " + xhr.statusText);
            }
        });
}
</script>

<script>
$(document).ready(function() {
    $('.toggle-switch').on('change', function() {
        var id_jadwal = $(this).attr('id').replace('toggleSwitch', '');
        var isChecked = $(this).prop('checked');

        // Menutup modal saat switch berubah dan menampilkan konfirmasi jika diperlukan
        if (!isChecked) {
            $(this).closest('.modal').modal('hide');
            // Panggil fungsi updateToggle untuk memperbarui toggle
            updateToggle(id_jadwal, isChecked);
        } else {
            // Jika switch dicentang, langsung jalankan perintah untuk menutup modal
            $(this).closest('.modal').modal('hide');
            // Panggil fungsi updateToggle untuk memperbarui toggle
            updateToggle(id_jadwal, isChecked);
        }
    });

    // Fungsi untuk memperbarui toggle
    function updateToggle(id_jadwal, isChecked) {
        // Lakukan request AJAX untuk mengirimkan data ke server
        $.ajax({
                url: '<?= BASEURL ?>/?controller=c_penjadwalan&method=jadwal_kolam&params=<?= $data['params'] ?>', // Ganti dengan URL yang sesuai
                type: 'POST',
                data: {
                    id_jadwal: id_jadwal,
                    is_active: isChecked ? 1 : 0,
                    action: "updateToggle" // Ubah nilai is_active sesuai dengan status checkbox
                }
            })
            .done(function(response) {
                var result = JSON.parse(response);
                if (result.status == 1) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Berhasil Diubah.",
                        icon: "success"
                    });
                    refreshDiv();
                } else {
                    Swal.fire({
                        title: "Gagal!",
                        text: "Silakan Isi Kembali.",
                        icon: "error"
                    });
                }
            })
            .fail(function(xhr, status, error) {
                refreshDiv();
                Swal.fire({
                    title: "Error!",
                    text: "Silakan Isi Kembali",
                    icon: "error"
                });
            });
    }

    function refreshDiv() {
        $('#reloadcard').load(
            '<?= BASEURL ?>/?controller=c_penjadwalan&method=cardJadwal&params=<?=$data['params']?>',
            function(
                response, status,
                xhr) {
                if (status == "error") {
                    console.error("Error: " + xhr.status + " " + xhr.statusText);
                }
            });

        $('#reloadcardupdate').load(
            '<?= BASEURL ?>/?controller=c_penjadwalan&method=cardUpdate&params=<?=$data['params']?>',
            function(
                response, status,
                xhr) {
                if (status == "error") {
                    console.error("Error: " + xhr.status + " " + xhr.statusText);
                }
            });
    }
});
</script>
<!--  -->

    <script src="../public/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>