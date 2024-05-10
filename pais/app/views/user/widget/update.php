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
            url: '<?= BASEURL ?>/?controller=c_jadwal_kolam&method=jadwal_kolam&params=<?= $data['params'] ?>', // Ganti dengan URL yang sesuai
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
                url: '<?= BASEURL ?>/?controller=c_jadwal_kolam&method=jadwal_kolam&params=<?= $data['params'] ?>', // Ganti dengan URL yang sesuai
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
});
</script>