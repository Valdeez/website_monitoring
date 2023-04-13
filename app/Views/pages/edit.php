<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 class="my-3">Form Edit Data Website</h2>
            <form action="/update/<?= $website['id']; ?>" method="post">
                <div class="mb-3">
                    <label for="nama_website" class="form-label">Domain Website</label>
                    <input type="text" class="form-control" id="nama_website" name="nama_website" autofocus value="<?= $website['nama_website']; ?>">
                </div>
                <div class="mb-3">
                    <label for="url_website" class="form-label">Alamat Url</label>
                    <input type="url" class="form-control" id="url_website" name="url_website" value="<?= $website['url_website']; ?>">
                </div>
                <div class="mb-3">
                    <label for="status_website" class="form-label">Status Website</label>
                    <input type="number" class="form-control" id="status_website" name="status_website" min="0" max="1" value="<?= $website['status_website']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/daftar-website" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>