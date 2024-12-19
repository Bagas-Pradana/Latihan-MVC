<div class="container mt-4">

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiwa</h3>
            <ul class="list-group">
                 <!-- Ambil data mahasiswa yang ada di model -->
                <?php foreach ($data['mhs'] as $mhs) : ?>
                <li class="list-group-item bg-secondary text-white d-flex justify-content-between align-items-start" aria-current="true">
                    <?= $mhs['nama']; ?>
                    <a href="<?= BASEURL; ?>/Mahasiswa/Detail/<?= $mhs['id']; ?>" class="badge text-bg-light">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>

</div>