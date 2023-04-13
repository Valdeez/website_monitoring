<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-3">Daftar Website</h1>
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari disini..." name="keyword" value="<?= $keyword; ?>">
                    <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Domain</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                    <?php foreach ($website as $w) : ?>
                        <tr>
                        <th class="align-middle" scope="row"><?= $i++; ?></th>
                        <td class="align-middle"><?= $w['nama_website']; ?></td>
                        <td class="align-middle"><?= ($w['status_website'] == 1) ? 
                            "<div class='text-success'>Active</div>" : 
                            "<div class='text-danger'>Not Active</div>"; ?></td>
                        <td>
                            <a href="/edit-website/<?= $w['id']; ?>" class="btn btn-primary">Edit</a>
                            <form action="/delete/<?= $w['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>    
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Hapus</button>
                            </form>
                            <a href="<?= $w['url_website']; ?>" class="btn btn-warning">Kunjungi</a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('website', 'website_pagination'); ?>
            <a href="/tambah-website" class="btn btn-success">Tambah Website</a>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>