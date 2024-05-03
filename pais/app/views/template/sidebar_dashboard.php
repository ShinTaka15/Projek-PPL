    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo">
        <img src="<?= BASEURL; ?>/images/logo_ikan.png" alt="" />
        <p class="fs-4 fw-bolder">PAIS</p>
      </div>
      <ul>
        <li>
          <a href="?controller=user&method=dashboard"> <i class="bi bi-house"></i> Dashboard </a>
        </li>
        <li>
          <a href="#"> <i class="bi bi-person"></i> Akun </a>
        </li>
        <li>
          <a href="#"> <i class="bi bi-file-earmark"></i> Pelaporan </a>
        </li>
        <li>
          <a href="?controller=user&method=penjadwalan"> <i class="bi bi-calendar2 active"></i> Penjadwalan </a>
        </li>
        <li class="parent">
          <a href="#"><i class="bi bi-bell"></i> Notifikasi <i class="bi bi-chevron-down"></i></a>
          <ul class="dropdown-content">
            <li><a href="#">Pesan</a></li>
            <li><a href="#">Stok Pakan</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </body>
