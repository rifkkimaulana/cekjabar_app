<?= $this->extend('CekJabar/Layout/Template'); ?>
<?= $this->section('content'); ?>

<!--::::: CONTACT FORM AREA START :::::::-->
<div class="inner_table shadow5 layout3">
	<div class="container">

		<div class="space-50 mt-5"></div>
		<div class="cotact_form">
			<div class="row">
				<div class="col-12">
					<h3>Let’s work together! <br> Fill out the form.</h3>
				</div>
				<div class="col-12">
					<form action="index.html">
						<div class="row">
							<div class="col-lg-6">
								<input type="text" placeholder="Full Name">
							</div>
							<div class="col-lg-6">
								<input type="text" placeholder="Subject">
							</div>
							<div class="col-lg-6">
								<input type="email" placeholder="Email Adress">
							</div>
							<div class="col-lg-6">
								<input type="text" placeholder="Phone Number">
							</div>
							<div class="col-12">
								<textarea name="messege" id="messege" cols="30" rows="5" placeholder="Tell us about your message…"></textarea>
							</div>
							<div class="col-12">
								<div class="space-20"></div>
								<input class="cbtn4" type="button" value="Sent Messege">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--::::: CONTACT FORM AREA END :::::::-->

<?= $this->endSection(); ?>