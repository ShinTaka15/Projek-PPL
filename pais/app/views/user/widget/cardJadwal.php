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