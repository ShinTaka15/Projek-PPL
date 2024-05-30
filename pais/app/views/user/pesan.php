<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan | PAIS</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/images/logo_ikan.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/pesan.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
        .custom-card {
            width: 800px;
            height: 600px;
        }

        .custom-card-child {
            height: 500px;
        }

        .unread {
            color: black;
            font-weight: bold;
        }

        .read {
            color: grey;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <!-- Main content -->
    <div class="main-content">
        <!-- Tabel Pesan -->
        <div class="container mt-2">
            <div class="d-flex justify-content-center" style="padding-top: 50px;">
                <div class="card custom-card" style="background-color: #d9dada">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-start" style="font-size: 36px; font-weight: 500;">Pesan</h3>
                    </div>
                    <div class="card-body">
                        <!-- Isi Pesan -->
                        <div class="card custom-card-child"
                        style="background-color: #FFFFFF; overflow-y: auto; max-height: 500px;">
                        <div class="card-body" id="reloadcard">
                                <?php foreach ($data['notifikasi'] as $pesan): ?>
                                <div class="d-flex justify-content-between ms-3 me-3 <?php echo $pesan['is_read'] == 0 ? 'unread' : 'read'; ?>">
                                    <p class="text-black fs-5"><?php echo $pesan['pesan']; ?></p>
                                    <small class="text-muted"><?php echo $pesan['tanggal']; ?></small>
                                </div>
                                <!-- Divider -->
                                <hr class="text-black">
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    function checkUnreadMessages() {
        fetch('?controller=c_notifikasi&method=getUnreadCount')
            .then(response => response.json())
            .then(data => {
                const notificationBadge = document.querySelector('.nav-link.link-dark .badge');
                if (data.unread_count > 0) {
                    if (notificationBadge) {
                        notificationBadge.textContent = data.unread_count;
                    } else {
                        const badge = document.createElement('span');
                        badge.className = 'badge bg-danger rounded-pill';
                        badge.textContent = data.unread_count;
                        document.querySelector('.nav-link.link-dark').appendChild(badge);
                    }
                } else if (notificationBadge) {
                    notificationBadge.remove();
                }
            })
            .catch(error => console.error('Error fetching unread count:', error));
    }

    // Check for unread messages every 10 seconds
    setInterval(checkUnreadMessages, 10000);

    // Initial check on page load
    checkUnreadMessages();
});
</script>

</body>
</html>
