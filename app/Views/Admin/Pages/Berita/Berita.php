<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                        <a class="btn btn-primary btn-sm float-right" href="<?= base_url('berita/tambah') ?>">
                            <i class="fas fa-plus"></i> Tambah Berita
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablerifkkimaulana" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="padding: 10px;">No</th>
                                        <th class="text-center" style="padding: 10px;">Judul</th>
                                        <th class="text-center" style="padding: 10px;">Penulis</th>
                                        <th class="text-center" style="padding: 10px;">Kategori</th>
                                        <th class="text-center" style="padding: 10px;">Tag</th>
                                        <th class="text-center" style="padding: 10px;">Dibuat</th>
                                        <th class="text-center" style="padding: 10px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($beritaData as $berita) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $berita['judul'] ?></td>
                                            <td>
                                                <?= $userMap[$berita['user_id']]['nama_depan'] . ' ' .  $userMap[$berita['user_id']]['nama_belakang']; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $kategoriIds = explode(',', $berita['kategori_ids']);
                                                $kategoriNames = [];

                                                foreach ($kategoriIds as $kategoriId) {
                                                    $kategoriId = trim($kategoriId);
                                                    if ($kategoriId !== '' && isset($kategoriMap[$kategoriId])) {
                                                        $kategoriNames[] = $kategoriMap[$kategoriId]['nama_kategori'];
                                                    }
                                                }

                                                echo implode(', ', $kategoriNames);

                                                if (empty($kategoriNames)) {
                                                    echo 'No Kategori';
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                $tagIds = explode(',', $berita['tag_ids']);
                                                $tagNames = [];

                                                foreach ($tagIds as $tagId) {
                                                    $tagId = trim($tagId);
                                                    if ($tagId !== '' && isset($tagMap[$tagId])) {
                                                        $tagNames[] = $tagMap[$tagId]['nama_tag'];
                                                    }
                                                }

                                                echo implode(', ', $tagNames);

                                                if (empty($tagNames)) {
                                                    echo 'No Tag';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center"><?= $berita['created_at'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm" href="<?= base_url('berita/ubah/' . $berita['id']) ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal_<?= $berita['id'] ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
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

<?php foreach ($beritaData as $berita) : ?>
    <!-- Modal Konfirmasi Delete -->
    <div class="modal fade" id="deleteModal_<?= $berita['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_<?= $berita['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel_<?= $berita['id'] ?>">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus berita: <?= $berita['judul'] ?>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('berita/hapus/' . $berita['id']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>