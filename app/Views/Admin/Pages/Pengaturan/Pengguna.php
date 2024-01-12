<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                        <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">
                            <i class="fas fa-plus"></i> Tambah Pengguna
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablerifkkimaulana" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="padding: 10px;">No</th>
                                        <th class="text-center" style="padding: 10px;">Nama</th>
                                        <th class="text-center" style="padding: 10px;">Username</th>
                                        <th class="text-center" style="padding: 10px;">Email</th>
                                        <th class="text-center" style="padding: 10px;">Posisi</th>
                                        <th class="text-center" style="padding: 10px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    use App\Controllers\Admin\Pengaturan\Pengguna;

                                    $no = 1;
                                    foreach ($userData as $user) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $user['nama_depan'] . ' ' . $user['nama_belakang'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td class="text-center"><?= $user['hak_akses'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $user['id'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <?php if ($user['username'] !== 'admin') : ?>
                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $user['id'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <!-- Modal Konfirmasi Delete -->
                                        <div class="modal fade" id="deleteModal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus pengguna: <?= $user['nama_depan'] . ' ' . $user['nama_belakang'] ?>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url('pengaturan/pengguna/hapus/' . $user['id']) ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Edit Users -->
                                        <div class="modal fade" id="editModal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <ul class="nav nav-pills">
                                                            <li class="nav-item"><a class="nav-link active" href="#profile<?= $user['id'] ?>" data-toggle="tab">Profil</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="#edit<?= $user['id'] ?>" data-toggle="tab">Edit Detail</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="#password<?= $user['id'] ?>" data-toggle="tab">Ubah Password</a></li>
                                                        </ul>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="<?= base_url('pengaturan/pengguna/ubah'); ?>" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane" id="edit<?= $user['id'] ?>">

                                                                    <input type="hidden" class="form-control" name="user_id" value="<?= $user['id'] ?>">
                                                                    <input type="hidden" class="form-control" name="foto_lama" value="<?= $user['user_foto'] ?>">

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="nama_depan">Nama Depan</label>
                                                                                <input type="text" id="nama_depan" class="form-control" name="nama_depan" value="<?= $user['nama_depan'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="nama_belakang">Nama Belakang</label>
                                                                                <input type="text" id="nama_belakang" class="form-control" name="nama_belakang" value="<?= $user['nama_belakang'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="username">Username</label>
                                                                                <input type="text" id="username" class="form-control" name="username" value="<?= $user['username'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label for="hak_akses_ubah">Level Pengguna</label>
                                                                            <select class="form-control" id="hak_akses_ubah" name="hak_akses">
                                                                                <option value="pengguna" <?= ($user['hak_akses'] === 'pengguna') ? 'selected' : ' '; ?>>Pengguna</option>
                                                                                <option value="administrator" <?= ($user['hak_akses'] === 'administrator') ? 'selected' : ' '; ?>>Administrator</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="telpon">Telpon</label>
                                                                                <input type="text" id="telpon" class="form-control" name="telpon" value="<?= $user['telpon'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" id="email" class="form-control" name="email" value="<?= $user['email'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="active tab-pane" id="profile<?= $user['id'] ?>">
                                                                    <div class="row">

                                                                        <div class="col-md-6">
                                                                            <?php if (!empty($user['user_foto'])) : ?>
                                                                                <img src="<?= base_url('assets/image/user_foto/' . $user['user_foto']) ?>" alt="User Foto" class="img-fluid">
                                                                            <?php else : ?>
                                                                                <img src="<?= base_url('assets/image/avatar5.png') ?>" alt="User Default Foto" class="img-fluid">
                                                                            <?php endif; ?>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control" name="logoLama" value="<?= $user['user_foto'] ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="foto">Picture Profile</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" class="custom-file-input" id="foto" name="user_foto">
                                                                                    <label class="custom-file-label" for="foto">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="password<?= $user['id'] ?>">
                                                                    <div class="tab-pane" id="password<?= $user['id'] ?>">
                                                                        <div class="form-group">
                                                                            <label for="current_password">Password Saat Ini</label>
                                                                            <input type="password" class="form-control" name="current_password">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="new_password">Password Baru</label>
                                                                            <input type="password" class="form-control" name="new_password">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="confirm_password">Konfirmasi Password Baru</label>
                                                                            <input type="password" class="form-control" name="confirm_password">
                                                                        </div>
                                                                    </div>
                                                                </div>

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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah Pengguna-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengaturan/pengguna/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tambah_foto">Foto Profil</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="tambah_foto" name="user_foto">
                            <label class="custom-file-label" for="tambah_foto">Choose file</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_depan_tambah">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_depan_tambah" name="nama_depan" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_belakang_tambah">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_belakang_tambah" name="nama_belakang" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username_tambah">Username</label>
                        <input type="text" class="form-control" id="username_tambah" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password_tambah">Password</label>
                        <input type="password" class="form-control" id="password_tambah" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="email_tambah">Email</label>
                        <input type="text" class="form-control" id="email_tambah" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telpon_tambah">Telpon</label>
                        <input type="text" class="form-control" id="telpon_tambah" name="telpon" required>
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

<?= $this->endSection(); ?>