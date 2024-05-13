    <!-- sidebar -->
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px">
        <div class="logo">
            <img src="<?= BASEURL; ?>/images/logo_ikan.png" alt="" />
            <p class="fs-4 fw-bolder text-start">PAIS</p>
        </div>
        <hr />
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="?controller=c_dashboard&method=showDashboard" class="nav-link link-dark" aria-current="page">
                    <i class="bi bi-house"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="?controller=c_akun&method=showAkun&params=1" class="nav-link link-dark">
                    <i class="bi bi-person"></i>
                    Akun
                </a>
            </li>
            <li>
                <a href="?controller=c_laporan&method=showLaporan" class="nav-link link-dark">
                    <i class="bi bi-file-earmark"></i>
                    Pelaporan
                </a>
            </li>
            <li>
                <a href="?controller=c_penjadwalan&method=showPenjadwalan" class="nav-link link-dark">
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
                    <li><a href="?controller=c_notifikasi&method=showPesan" class="link-dark rounded">Pesan</a></li>
                    <li><a href="?controller=c_notifikasi&method=showStokPakan" class="link-dark rounded">Stok Pakan</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="bi bi-box-arrow-right"></i>
                    Keluar
                </a>
            </li>
        </ul>
        <hr />
    </div>
<script>
const sidebar = document.querySelector('.sidebar');

sidebar.addEventListener('click', (event) => {
    const clickedItem = event.target.closest('.parent');
    if (clickedItem) {
        clickedItem.classList.toggle('active');
    }
});
</script>
