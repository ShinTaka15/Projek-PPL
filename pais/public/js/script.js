function editData() {
  Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Data Berhasil Diedit',
    showConfirmButton: false,
    timer: 1500,
  });
}

function showWarning() {
  Swal.fire({
      title: 'Gagal!',
      text: 'Jadwal melebihi batas',
      icon: 'warning'
  });
}

function toggleDropdown(num) {
  var dropdownMenu = document.getElementById('dropdownMenu' + num);
  dropdownMenu.classList.toggle('show');
  document.querySelector('.toggle-text').innerHTML = '<input type="time" class="form-control fs-4 text-center" id="waktu1" />';
}

// Mengubah tampilan jam menjadi inputan waktu saat Chevron-down diklik
