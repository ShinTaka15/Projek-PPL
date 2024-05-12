<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
  <link rel="stylesheet" href="<?= BASEURL ?>/css/landing_page.css">
</head>
<body>
  <div class="content-overlay">
    <div class="content">
      <img src="<?= BASEURL; ?>/images/logo_pais.jpg" alt="Logo" class="logo">
      <p class="subtext">Pakan Ikan Otomatis</p>
      <button class="login-button" onclick="window.location.href ='?controller=c_login&method=showLogin';">Masuk</button>
    </div>
  </div>
</body>
</html>