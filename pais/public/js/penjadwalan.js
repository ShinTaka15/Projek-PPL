document.getElementById('tambahData').addEventListener('click', function () {
  const inputValue = document.getElementById('inputKolam').value.trim();
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success ms-3 px-3',
      cancelButton: 'btn btn-danger me-3',
    },
    buttonsStyling: false,
  });
  if (inputValue === '') {
    swalWithBootstrapButtons.fire({
      title: 'Gagal!',
      text: 'Data Tidak Boleh Kosong',
      icon: 'warning',
    });
  } else {
    swalWithBootstrapButtons
      .fire({
        text: 'Apakah anda ingin menambah data?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Iya',
        cancelButtonText: 'Tidak',
        reverseButtons: true,
      })
      .then((result) => {
        console.log('Nilai input: ' + inputValue);
        if (result.isConfirmed) {
          const xhr = new XMLHttpRequest();
          const url = '/?controller=user&method=penjadwalan';

          xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                swalWithBootstrapButtons.fire({
                  title: 'Berhasil!',
                  text: 'Data Berhasil Ditambahkan',
                  icon: 'success',
                });
                document.getElementById('inputKolam').value = '';
                console.log(xhr.responseText);
              } else {
                // Response gagal, lakukan sesuatu jika perlu
                console.error('Error:', xhr.status);
              }
            }
          };

          xhr.open('POST', url);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.send('inputValue=' + encodeURIComponent(inputValue));
        }
      });
  }
});
