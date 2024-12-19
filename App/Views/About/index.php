    <!-- BANNER -->
    <div class="container">
        <h3 class="mt-4">Mengenai Kami!</h3>
        <div class="container-custom">
            <img src="<?= BASEURL; ?>/Img/gon.png" alt="Gon Freecs" width="400" class="shadow">
        </div>
        <?php //var_dump($data); ?>
        <ul>
            <li><?= $data['nama']; ?></li>
            <li><?= $data['jurusan']; ?></li>
            <li><?= $data['nim']; ?></li>
        </ul>
    </div>