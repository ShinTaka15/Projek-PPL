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
                <a href="?controller=c_penjadwalan&method=showPenjadwalan" class="nav-link link-dark">
                    <i class="bi bi-calendar2"></i>
                    Penjadwalan
                </a>
            </li>
            <li class="parent">
                <a href="#" class="nav-link link-dark d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-bell"></i>
                        Notifikasi
                    </div>
                    <?php if ($data['unread_count'] > 0): ?>
                        <span class="badge bg-danger rounded-pill"><?= $data['unread_count']; ?></span>
                    <?php endif; ?>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li><a href="?controller=c_notifikasi&method=showPesan" class="link-dark rounded">Pesan</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="nav-link link-dark" onclick="confirmLogout()">
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
<script>
function confirmLogout() {
    Swal.fire({
    title: "Keluar",
    text: "Yakin ingin keluar?",
    icon: "warning",
    showCancelButton: true,
    cancelButtonText: "Tidak",
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Iya"
}).then((result) => {
    if (result.isConfirmed) {
        sessionStorage.setItem('logoutSuccess', 'true'); // Simpan status logout ke sessionStorage
        window.location.href = "?controller=c_landing_page&method=showLandingPage"; // Ganti URL_LANDING_PAGE dengan URL sebenarnya dari landing page Anda
    }
});
}
</script>
