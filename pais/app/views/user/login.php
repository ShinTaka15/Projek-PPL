<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
  <link rel="stylesheet" href="<?= BASEURL ?>/css/masuk.css">
</head>
<body>
<div class="content-overlay" id="content-overlay">
    <i class="close-icon" onclick="window.location.href = '?controller=c_landing_page&method=showLandingPage';">&times;</i>
    <div class="content">
      <p class="content-text">Masuk</p>
      <div class="input-container">
        <form method="post" action="?controller=c_login&method=processLogin">
          <label for="email" class="input-label">Nama Pengguna</label>
          <input type="text" id="email" name="email" class="input-field">
          <label for="password" class="input-label">Kata Sandi</label>
          <input type="password" id="password" name="password" class="input-field">
          <button type="submit" class="login-button">Masuk</button>
        </form>
      </div>
      <div class="remember-me">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember me</label>
        <div class="lupa-akun">
          <label for="lupa">Lupa akun Anda? Hubungi Kami</label>
        </div>
      </div>
    </div>
  </div>
  <div id="popup" class="popup">
    <div class="popup-content">
      <span class="close" onclick="closePopup()">&times;</span>
      <p>Data tidak valid, Silahkan isi kembali.</p>
    </div>
  </div>
  <script>
    function openPopup() {
      document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
      document.getElementById("popup").style.display = "none";
    }

    // Periksa apakah parameter error ada di URL dan tampilkan popup jika iya
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error') && urlParams.get('error') === 'true') {
      openPopup();
    }
  </script>

</body>
</html>