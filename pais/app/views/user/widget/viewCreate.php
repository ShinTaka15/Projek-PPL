<!-- Modal Tambah Data -->
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
            url: '<?= BASEURL ?>/?controller=c_jadwal_kolam&method=jadwal_kolam&params=<?= $data['params'] ?>',
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
        '<?= BASEURL ?>/?controller=c_jadwal_kolam&method=cardJadwal&params=<?=$data['params']?>',
        function(
            response, status,
            xhr) {
            if (status == "error") {
                console.error("Error: " + xhr.status + " " + xhr.statusText);
            }
        });

    $('#reloadcardupdate').load(
        '<?= BASEURL ?>/?controller=c_jadwal_kolam&method=cardUpdate&params=<?=$data['params']?>',
        function(
            response, status,
            xhr) {
            if (status == "error") {
                console.error("Error: " + xhr.status + " " + xhr.statusText);
            }
        });
}
</script>