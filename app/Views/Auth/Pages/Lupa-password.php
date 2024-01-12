<?= $this->extend('Auth/Layout/Template'); ?>
<?= $this->section('content'); ?>

<div class="text-center">
    <p class="mb-4">Silahkan masukan email terdaftar kamu untuk melakukan permintaan password baru!</p>
</div>
<form class="user" action="<?= base_url('lupa-password'); ?>" method="post">
    <div class="form-group">
        <input type="email" class="form-control form-control-user" name="email" placeholder="Masukan Alamat Email..." required>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Reset Password
    </button>
</form>
<hr>
<div class="text-center">
    <a class="small" href="<?= base_url('buat-akun'); ?>">Buat akun baru!</a>
</div>
<div class="text-center">
    <a class="small" href="<?= base_url('login'); ?>">Sudah punya akun? Login!</a>
</div>

<?= $this->endSection(); ?>