<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Akun | PAIS</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/akun.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="container mt-5 mx-5 ">
            <div class="container">
                <h1 class="text-white">Selamat Datang, <?php echo $data['id']['username']; ?></h1>
                <p class="text-white fs-4">Pakan Ikan Otomatis</p>
            </div>
            <?php if(isset($data['id'])): ?>
            <div class="login-container">
                <div class="form-field">
                    <i class="bi bi-person-circle" style="font-size: 100px; width: 100px; height: 100px;"></i>
                </div>
                <div class="form-field">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" value="<?php echo $data['id']['username']; ?>" readonly>
                </div>
                <div class="form-field">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" value="<?php echo $data['id']['password']; ?>" readonly>
                </div>
                <button id="editButton" class="login-button" onclick="toggleEditMode()">EDIT</button>
                <div class="button-container">
                    <button id="backButton" class="login-button" style="display: none;" onclick="revertToOriginal()">BATAL</button>
                    <button id="saveButton" class="login-button" style="display: none;" onclick="sendDataToDatabase($('#username').val(), $('#password').val())">SIMPAN</button>
                </div>
            </div>
            <?php endif; ?>
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
    function toggleEditMode() {
    var usernameInput = document.getElementById('username');
    var passwordInput = document.getElementById('password');
    var editButton = document.getElementById('editButton');
    var saveButton = document.getElementById('saveButton');
    var backButton = document.getElementById('backButton');
    
    if (usernameInput.readOnly) {
        usernameInput.readOnly = false;
        passwordInput.readOnly = false;
        passwordInput.type = 'text';
        editButton.style.display = 'none';
        saveButton.style.display = 'inline-block';
        backButton.style.display = 'inline-block';
    } else {
        usernameInput.readOnly = true;
        passwordInput.type = 'password';
        editButton.style.display = 'inline-block';
        saveButton.style.display = 'none';
        backButton.style.display = 'none';
    }
    }
    
    function revertToOriginal() {
    var usernameInput = document.getElementById('username');
    var passwordInput = document.getElementById('password');
    var editButton = document.getElementById('editButton');
    var saveButton = document.getElementById('saveButton');
    var backButton = document.getElementById('backButton');
    
    usernameInput.readOnly = true;
    passwordInput.type = 'password';
    editButton.style.display = 'inline-block';
    saveButton.style.display = 'none';
    backButton.style.display = 'none';
    
    }
</script>
<script>
document.getElementById('saveButton').addEventListener('click', function() {
    // Mengambil nilai dari input username dan password
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Memanggil fungsi sendDataToDatabase dengan nilai username dan password
    sendDataToDatabase(username, password, true);
});

function sendDataToDatabase(username, password) {
    var userId = 1;

    console.log("Username: " + username);
    console.log("Password: " + password);

    // Validasi form tidak boleh kosong
    if (username.trim() === '' || password.trim() === '') {
        Swal.fire({
            title: "Gagal!",
            text: "Silahkan isi kembali.",
            icon: "warning"
        });
        return; // Hentikan proses jika form kosong
    }

    // Mengirim permintaan pembaruan data ke server
    $.ajax({
            url: '<?= BASEURL ?>/?controller=c_akun&method=showAkun&params=1', // Ganti dengan URL yang sesuai
            type: 'POST',
            data: {
            userId: userId,
            username: username,
            password: password,
            action: "updateData"
            }
        })
        .done(function(response) {
            var result = JSON.parse(response);
            if (result.status == 1) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Data berhasil disimpan.",
                    icon: "success"
                });
                revertToOriginal();
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
</script>

</body>
</html>
