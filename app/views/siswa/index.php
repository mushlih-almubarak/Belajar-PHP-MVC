<div class="container mt-5">
    <h1 class="mb-4">Daftar Seluruh Siswa</h1>
    <?php Flasher::tampilkanFlash() ?>
    <form action="<?= BASEURL ?>siswa/cariSiswa" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="keyword" placeholder="Cari siswa...">
            <button class="btn btn-primary px-4" type="sumbit">Cari</button>
        </div>
    </form>
    <ul class="list-group">
        <?php $i = 1 ?>
        <?php foreach ($data['siswa'] as $sis) : ?>
            <li class="list-group-item">
                <?= $i . '. ' . htmlspecialchars($sis['nama']) ?>
                <a href="<?= BASEURL ?>siswa/hapusSiswa/<?= $sis['id'] ?>">
                    <span class="badge text-bg-danger float-end" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</span>
                </a>
                <span role="button">
                    <span class="badge text-bg-warning float-end me-1 ubah-data" data-bs-toggle="modal" data-bs-target="#tambahData" data-id="<?= $sis['id'] ?>">Ubah</span>
                </span>
                <a href="<?= BASEURL ?>siswa/detail/<?= $sis['id'] ?>">
                    <span class="badge text-bg-primary float-end me-1">Detail</span>
                </a>
            </li>
            <?php $i++ ?>
        <?php endforeach; ?>
    </ul>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-5 tambah-data" data-bs-toggle="modal" data-bs-target="#tambahData">
        Tambah Data Siswa
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>siswa/tambahSiswa" method="POST" id="formTambahData">
                    <input type="hidden" id="id" name="id">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa" required>
                        <label for="nama">Nama Siswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" required>
                        <label for="no_hp">No HP</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah" required>
                        <label for="alamat">Alamat Rumah</label>
                    </div>
                    <select class="form-select" name="hobi" id="hobi" required>
                        <option selected hidden value="Tidak Dipilih">Pilih hobi</option>
                        <option value="Programming">Programming</option>
                        <option value="Main Bola">Main Bola</option>
                        <option value="Main Game">Main Game</option>
                        <option value="Menggambar">Menggambar</option>
                        <option value="Bersepeda">Bersepeda</option>
                        <option value="Menulis">Menulis</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary kirim">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>