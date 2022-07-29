<div class="container">
    <h1>Tentang saya</h1>
    <br>
    <img src="<?= BASEURL; ?>img/profil.png" width="200" class="rounded-circle shadow" alt="Gambar Saya">
    <br><br>
    <p>Nama saya adalah <?= $data['nama'] ?>, saya berusia <?= $data['umur'] ?>, saya seorang <?= $data['pekerjaan'] ?></p>
    <a href="<?= BASEURL; ?>">
        <button class="btn btn-primary btn-sm" type="button">Kembali ke halaman utama</button>
    </a>
</div>