<div class="container mt-5">
    <h1 class="mb-5">Detail Siswa</h1>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($data['siswa'][0]['nama']) ?></h5>
            <h6 class="card-subtitle mb-2 text-muted mb-3">Profil siswa</h6>
            <p class="card-text">No HP: <?= htmlspecialchars($data['siswa'][0]['no_hp']) ?></p>
            <p class="card-text">Alamat: <?= htmlspecialchars($data['siswa'][0]['alamat']) ?></p>
            <p class="card-text">Hobi: <?= htmlspecialchars($data['siswa'][0]['hobi']) ?></p>
            <a href="<?= BASEURL ?>siswa" class="card-link">Kembali ke halaman sebelumnya</a>
        </div>
    </div>
</div>