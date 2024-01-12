<?= $this->extend('Auth/Layout/Template'); ?>
<?= $this->section('content'); ?>

<form class="user" method="post" action="<?= base_url('buat-akun-baru'); ?>">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="nama_depan" placeholder="Nama Depan" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="nama_belakang" placeholder="Nama Belakang" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="email" class="form-control form-control-user" name="email" placeholder="Alamat Email" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" name="konfirmasi_password" placeholder="Ulangi Password" required>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Buat Akun
    </button>
</form>

<hr>

<div class="text-center">
    <a class="small" href="<?= base_url('lupa-password'); ?>">Lupa Password?</a>
</div>
<div class="text-center">
    <a class="small" href="<?= base_url('login'); ?>">Sudah Punya Akun? Login!</a>
</div>

<hr>
<div class="text-center">
    Batal :
    <a class="small" href="<?= base_url('/'); ?>">Kembali ke beranda</a>
</div>

<?= $this->endSection(); ?>