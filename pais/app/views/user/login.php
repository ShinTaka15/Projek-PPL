<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
  <link rel="stylesheet" href="<?= BASEURL ?>/css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="content-overlay" id="content-overlay">
    <i class="close-icon" onclick="window.location.href = '?controller=c_landing_page&method=showLandingPage';">&times;</i>
    <div class="content">
      <p class="content-text">Masuk</p>
      <div class="input-container">
        <form id="loginForm" method="post" action="?controller=c_login&method=processLogin">
          <label for="email" class="input-label">Nama Pengguna</label>
          <input type="text" id="email" name="email" class="input-field">
          <label for="password" class="input-label">Kata Sandi</label>
          <input type="password" id="password" name="password" class="input-field">
          <button type="submit" class="login-button" onclick="return validateForm()">Masuk</button>
        </form>
      </div>
      <div class="remember-me">
        <div class="lupa-akun">
          <label for="lupa">Lupa akun Anda? Hubungi Kami</label>
        </div>
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      if (email === "" || password === "") {
        Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: 'Silahkan isi kembali'
        });
        return false;
      }
      return true;
    }

    // Cek apakah ada parameter error atau success di URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error')) {
      Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: 'Silahkan isi kembali'
      });
    }
  </script>
</body>
</html>
