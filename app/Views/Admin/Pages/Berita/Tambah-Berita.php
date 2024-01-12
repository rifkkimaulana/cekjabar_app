<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <form action="<?= base_url('berita/tambah'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Berita Baru</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Judul Berita:</label>
                                <input type="text" class="form-control" id="title" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Isi Berita:</label>
                                <textarea class="form-control" id="summernote" name="isi" rows="12" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="0">Draft</option>
                                    <?php if (session('hak_akses') !== 'Pengguna') { ?>
                                        <option value="1">Published</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Simpan Berita</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gambar Andalan</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="image" name="gambar" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategori</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select multiple class="form-control" name="kategori_ids[]">
                                    <?php foreach ($kategoriData as $kategori) : ?>
                                        <option value="<?= $kategori['id']; ?>"><?= $kategori['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tag</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select multiple class="form-control" name="tag_ids[]">
                                    <?php foreach ($tagData as $tag) : ?>
                                        <option value="<?= $tag['id']; ?>"><?= $tag['nama_tag']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?= $this->endSection(); ?>