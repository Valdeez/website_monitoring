<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php if(session('log') !== true): ?>
                <h1 class="mt-3">Selamat datang di website monitoring!</h1>
                <p class="mt-3 fs-5">Silahkan login terlebih dahulu</p>
            <?php else: ?>
                <h1 class="mt-3">Halo <?= session('user_name'); ?> </h1>
                <h1 class="mt-3">Selamat datang di website monitoring!</h1>
            <?php endif ?>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>