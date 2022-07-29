// Jika documen ready 
$(function () {
    $('.tambah-data').on('click', function () {
        // Kembalikan seperti awal
        $('#tambahDataLabel').text('Tambah Data Siswa');
        $('.kirim').text('Tambah Data');
        $('#nama').val('');
        $('#no_hp').val('');
        $('#alamat').val('');
        $('#hobi').val('Tidak Dipilih');
        $('#formTambahData').attr('action', 'http://localhost:70/Belajar%20PHP%20MVC/public/siswa/tambahSiswa');
    })

    $('.ubah-data').on('click', function () {
        // Ubah judul modal
        $('#tambahDataLabel').text('Ubah Data Siswa');
        $('.kirim').text('Ubah Data');
        // Ambil id yang ada di atribut 'data-id'
        const id = $(this).data('id');
        // Jalankan ajax
        $.ajax({
            url: 'http://localhost:70/Belajar%20PHP%20MVC/public/siswa/getUbahSiswa', // Load url ini secara ajax
            data: {
                id: id
            }, // Kirim 'id'nya ke halaman yang diload diatas menggunakan method post
            method: 'post',
            dataType: 'json', // Hanya terima data kembaliannya dengan json
            // Jika ajaxnya sukses dilakukan
            success: function (data) {
                $('#nama').val(data[0].nama);
                $('#no_hp').val(data[0].no_hp);
                $('#alamat').val(data[0].alamat);
                $('#hobi').val(data[0].hobi);
            }
        });
        // Ubah URL tujuan
        $('#formTambahData').attr('action', 'http://localhost:70/Belajar%20PHP%20MVC/public/siswa/ubahSiswa/' + id);
    })
})