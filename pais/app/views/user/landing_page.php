<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
  <link rel="stylesheet" href="<?= BASEURL ?>/css/landing_page.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body>
  <div class="content-overlay">
    <div class="content">
      <img src="<?= BASEURL; ?>/images/logo_pais.jpg" alt="Logo" class="logo">
      <p class="subtext">Pakan Ikan Otomatis</p>
      <button class="login-button" onclick="window.location.href ='?controller=c_login&method=showLogin';">Masuk</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const logoutSuccess = sessionStorage.getItem('logoutSuccess');
        if (logoutSuccess === 'true') {
            sessionStorage.removeItem('logoutSuccess'); // Hapus status logout dari sessionStorage
            Swal.fire({
                text: "Berhasil keluar.",
                icon: "success"
            });
        }
    });
  </script>
</body>
</html>
