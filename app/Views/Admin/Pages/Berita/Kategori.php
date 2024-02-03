<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                        <?php if (session('hak_akses') === 'administrator') { ?>
                            <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">
                                <i class="fas fa-plus"></i> Tambah Kategori
                            </a>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablerifkkimaulana" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="padding: 10px;">No</th>
                                        <th class="text-center" style="padding: 10px;">Kategori</th>
                                        <th class="text-center" style="padding: 10px;">Keterangan</th>

                                        <?php if (session('hak_akses') === 'administrator') { ?>
                                            <th class="text-center" style="padding: 10px;">Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kategoriData as $kategori) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $kategori['nama_kategori'] ?></td>
                                            <td class="text-center"><?= substr($kategori['keterangan'], 0, 50) . '...'; ?></td>

                                            <?php if (session('hak_akses') === 'administrator') { ?>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $kategori['id'] ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $kategori['id'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('berita/kategori/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kategori_tambah">Nama Kategori</label>
                        <input type="text" id="nama_kategori_tambah" class="form-control" name="nama_kategori">
                    </div>
                    <div class="form-group">
                        <label for="keterangan_kategori_tambah">Keterangan</label>
                        <textarea name="keterangan" id="keterangan_kategori_tambah" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($kategoriData as $kategori) : ?>
    <!-- Modal Konfirmasi Delete -->
    <div class="modal fade" id="deleteModal<?= $kategori['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus kategori: <?= $kategori['nama_kategori'] ?>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('berita/kategori/hapus/' . $kategori['id']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal<?= $kategori['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_<?= $kategori['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel_<?= $kategori['id'] ?>">Ubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('berita/kategori/ubah'); ?>">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id" value="<?= $kategori['id'] ?>">
                        <div class="form-group">
                            <label for="nama_kategori_tambah">Nama Kategori</label>
                            <input type="text" id="nama_kategori_tambah" class="form-control" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="keterangan_kategori_tambah">Keterangan</label>
                            <textarea name="keterangan" id="keterangan_kategori_tambah" class="form-control" cols="30" rows="10"><?= $kategori['keterangan']; ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>