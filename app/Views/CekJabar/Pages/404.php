<?= $this->extend('CekJabar/Layout/Template'); ?>
<?= $this->section('content'); ?>

<!--::::: INNER TABLE AREA START :::::::-->
<div class="inner_table layout3 white_bg">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="space-50"></div>
        <div class="area404 text-center">
          <img src="../assets/img/bg/404.png" alt="" />
        </div>
        <div class="space-30"></div>
        <div class="back4040 text-center col-lg-6 m-auto">
          <h3>Page not faund</h3>
          <div class="space-10"></div>
          <p>Sorry the page you were looking for cannot be found. Try searching for the best match or browse the links below:</p>
          <div class="space-20"></div>
          <div class="button_group">
            <a href="<?= base_url('/'); ?>" class="cbtn4">GO TO HOME</a>
            <a href="<?= base_url('contact'); ?>" class="cbtn3">contact us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="space-50"></div>
</div>
<!--::::: INNER TABLE AREA END :::::::-->

<?= $this->endSection(); ?>