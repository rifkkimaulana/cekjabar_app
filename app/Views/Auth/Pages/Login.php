<?= $this->extend('Auth/Layout/Template'); ?>
<?= $this->section('content'); ?>

<form class="user" method="post" action="<?= base_url('login'); ?>">
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="usernameOrEmail" placeholder="Masukan Username Atau Email..." required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
            <label class="custom-control-label" for="customCheck">Tetap Masuk!</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
</form>

<hr>
<div class="text-center">
    <a class="small" href="<?= base_url('lupa-password'); ?>">Lupa Password?</a>
</div>
<div class="text-center">
    <a class="small" href="<?= base_url('buat-akun'); ?>">Buat Akun Baru!</a>
</div>
<hr>
<div class="text-center">
    Batal :
    <a class="small" href="<?= base_url('/'); ?>">Kembali ke beranda</a>
</div>

<?= $this->endSection(); ?>