<?= $this->extend('CekJabar/Layout/Template'); ?>
<?= $this->section('content'); ?>

<!--::::: ARCHIVE AREA START :::::::-->
<div class="archives layout3 post post1 padding-top-30">
	<div class="container">
		<div class="space-40"></div>
		<div class="row">
			<div class="col-12">
				<div class="bridcrumb"> <a href="<?= base_url('.'); ?>">Home</a> / <?= $kategoriMap[$beritaView['kategori_ids']]['nama_kategori']; ?> / <?= $beritaView['judul']; ?></div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-lg-8">
				<div class="row">
					<div class="col-6 align-self-center">
						<div class="page_category">
							<h4><?= strtoupper($kategoriMap[$beritaView['kategori_ids']]['nama_kategori']); ?></h4>
						</div>
					</div>
					<div class="col-6 text-right">
						<div class="page_comments">
							<ul class="inline">
								<li><i class="fas fa-eye"></i><?= $pengunjungMap[$beritaView['id']]['jumlah_kunjungan'] ?? 0; ?></li>
								<li><i class="fas fa-comment"></i><?= $komentarCount[$beritaView['id']] ?? 0; ?></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="space-30"></div>
				<div class="single_post_heading">
					<h1><?= $beritaView['judul']; ?></h1>
				</div>
				<div class="space-40"></div>
				<img class="border-radious5" src="<?= base_url('assets/image/berita/' . $beritaView['gambar']); ?>" alt="<?= $beritaView['judul'] . '| CEK JABAR'; ?>">
				<div class="space-20"></div>
				<div class="row">
					<div class="col-lg-6 align-self-center">
						<div class="author">
							<div class="author_img">
								<div class="author_img_wrap">
									<img src="<?= base_url('assets/image/user_foto/' . $userMap[$beritaView['user_id']]['user_foto']); ?>" alt="<?= $userMap[$beritaView['user_id']]['nama_depan'] . ' ' . $userMap[$beritaView['user_id']]['nama_belakang']; ?>">
								</div>
							</div> <a href="javascript:void(0)"><?= $userMap[$beritaView['user_id']]['nama_depan'] . ' ' . $userMap[$beritaView['user_id']]['nama_belakang']; ?></a>
							<ul>
								<li><a href="#">March 26, 2020</a>
								</li>
								<li>Updated 1:58 p.m. ET</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 align-self-center">
						<div class="author_social inline text-right">
							<ul>
								<li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
								</li>
								<li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
								</li>
								<li><a href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
								</li>
								<li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="space-20"></div>
				<?= $beritaView['isi']; ?>
				<div class="space-40"></div>
				<div class="tags">
					<ul class="inline">
						<li class="tag_list"><i class="fas fa-tag"></i> tags</li>

						<?php
						$tagIds = explode(',', $beritaView['tag_ids']);
						foreach ($tagIds as $tagId) {
							if (isset($tagMap[$tagId])) {
								$tag = $tagMap[$tagId];
						?>
								<li>
									<a href="<?= base_url('tag/' . $tag['slug']); ?>"><?= $tag['nama_tag'] . ' '; ?></a>
								</li>
						<?php
							}
						}
						?>


					</ul>
				</div>
				<div class="space-40"></div>
				<div class="border_black"></div>
				<div class="space-40"></div>
				<div class="next_prev">
					<div class="row">
						<div class="col-lg-6 align-self-center">
							<?php if ($beritaViewBefore) : ?>
								<div class="next_prv_single border_left3">
									<p>PREVIOUS NEWS</p>
									<h3><a href="<?= base_url($beritaViewBefore['slug']); ?>"><?= substr($beritaViewBefore['judul'], 0, 50) . '... '; ?></a></h3>
								</div>
							<?php endif; ?>
						</div>
						<div class="col-lg-6 align-self-center">
							<?php if ($beritaViewAfter) : ?>
								<div class="next_prv_single border_left3">
									<p>NEXT NEWS</p>
									<h3><a href="<?= base_url($beritaViewAfter['slug']); ?>"><?= substr($beritaViewAfter['judul'], 0, 50) . '... '; ?></a></h3>
								</div>
							<?php endif; ?>
						</div>
					</div>

				</div>
			</div>

			<div class="col-md-6 col-lg-4">
				<div class="finance mb30 white_bg border-radious5 shadow7 padding20">
					<div class="heading">
						<h3 class="widget-title">Opinion News</h3>
					</div>
					<div class="single_post mb30 type18">
						<div class="post_img">
							<a href="#">
								<img src="assets/cekjabar/img/feature/finance1.jpg" alt="">
							</a> <span class="batch3 date">
								April 26, 2020
							</span>
						</div>
						<div class="single_post_text py0">
							<h4><a href="post1.html">Copa America: Luis Suarez from devastated US</a></h4>
							<div class="space-10"></div>
							<p class="post-p">The property, complete with seates screening from room amphitheater pond with sandy</p>
							<ul class="mt10 like_cm">
								<li><a href="#"><i class="far fa-eye"></i> 6745</a>
								</li>
								<li><a href="#"><i class="far fa-heart"></i> 6745</a>
								</li>
								<li><a href="#"><i class="fas fa-share"></i> 6745</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="single_post type18">
						<div class="post_img">
							<a href="#">
								<img src="assets/cekjabar/img/feature/finance1.jpg" alt="">
							</a> <span class="batch3 date">
								April 26, 2020
							</span>
						</div>
						<div class="single_post_text py0">
							<h4><a href="post1.html">Copa America: Luis Suarez from devastated US</a></h4>
							<div class="space-10"></div>
							<p class="post-p">The property, complete with seates screening from room amphitheater pond with sandy</p>
							<ul class="mt10 like_cm">
								<li><a href="#"><i class="far fa-eye"></i> 6745</a>
								</li>
								<li><a href="#"><i class="far fa-heart"></i> 6745</a>
								</li>
								<li><a href="#"><i class="fas fa-share"></i> 6745</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="category4 mb30 border-radious5 shadow7 white_bg padding20">
					<h3 class="widget-title">Categories</h3>
					<ul>
						<li><a href="#">Restaurent<i class="fas fa-play"></i></a>
						</li>
						<li><a href="#">Intertainment<i class="fas fa-play"></i></a>
						</li>
						<li><a href="#">Sports<i class="fas fa-play"></i></a>
						</li>
						<li><a href="#">Business<i class="fas fa-play"></i></a>
						</li>
						<li><a href="#">Financial<i class="fas fa-play"></i></a>
						</li>
						<li><a href="#">Business<i class="fas fa-play"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--::::: ARCHIVE AREA END :::::::-->
<div class="space-60"></div>
<!--::::: LATEST BLOG AREA START :::::::-->
<div class="theme3_bg section-padding layout3">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="heading">
					<h2 class="widget-title">Our Latest Blog</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">

			<?php foreach ($beritaTrending->findAll(3) as $trending) { ?>
				<div class="col-md-6 col-lg-4">
					<div class="single_post post_type3 shadow7 mb30 post_type15 border-radious5">
						<div class="post_img border-radious5">
							<div class="img_wrap">
								<a href="<?= base_url($trending['slug']); ?>">
									<img src="<?= base_url('assets/image/berita/' . $trending['gambar']); ?>" alt="">
								</a>
							</div> <span class="tranding border_tranding">
								<i class="fas fa-bolt"></i>
							</span>
						</div>
						<div class="single_post_text padding20 white_bg">
							<h4><a href="<?= base_url($trending['slug']); ?>"><?= $trending['judul']; ?></a></h4>
							<div class="space-10"></div>
							<p class="post-p"><?= substr(strip_tags($trending['isi']), 0, 89) . '...'; ?> </p>
							<div class="space-10"></div>
							<div class="meta3"> <a href="<?= base_url('kategori/', $kategoriMap[$trending['kategori_ids']]['slug']); ?>"><?= strtoupper($kategoriMap[$trending['kategori_ids']]['nama_kategori']); ?></a>
								<a href="<?= base_url($trending['slug']); ?>">March 26, 2020</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</div>
<!--::::: LATEST BLOG AREA END :::::::-->
<div class="space-60"></div>
<!--:::::  COMMENT FORM AREA START :::::::-->
<div class="comment_form layout3">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-10 m-auto">
				<form action="#">
					<div class="row">
						<div class="col-md-6">
							<input type="text" placeholder="Full name">
						</div>
						<div class="col-md-6">
							<input type="text" placeholder="Email address">
						</div>
						<div class="col-12">
							<textarea name="messege" id="messege" cols="30" rows="5" placeholder="Tell us about your opinion…"></textarea>
						</div>
						<div class="col-12">
							<input type="button" value="POST OPINION" class="cbtn4">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="space-60"></div>
		<div class="comment_list">
			<div class="row">
				<div class="col-12 col-lg-10 m-auto">
					<h3>Our latest news</h3>
					<div class="single_comment">
						<div class="comment_img">
							<img src="assets/cekjabar/img/author/author2.png" alt="">
						</div>
						<div class="row">
							<div class="col-sm-6"> <a href="#">QuomodoSoft</a>
							</div>
							<div class="col-sm-6">
								<div class="replay text-right"> <a href="#">replay</a>
								</div>
							</div>
						</div>
						<div class="space-5"></div>
						<p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
					</div>
					<div class="space-15"></div>
					<div class="border_black"></div>
					<div class="space-15"></div>
					<div class="single_comment">
						<div class="comment_img">
							<img src="assets/cekjabar/img/author/author2.png" alt="">
						</div>
						<div class="row">
							<div class="col-sm-6"> <a href="#">QuomodoSoft</a>
							</div>
							<div class="col-sm-6">
								<div class="replay text-right"> <a href="#">replay</a>
								</div>
							</div>
						</div>
						<div class="space-5"></div>
						<p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
					</div>
					<div class="space-15"></div>
					<div class="border_black"></div>
					<div class="space-15"></div>
					<div class="single_comment">
						<div class="comment_img">
							<img src="assets/cekjabar/img/author/author2.png" alt="">
						</div>
						<div class="row">
							<div class="col-sm-6"> <a href="#">QuomodoSoft</a>
							</div>
							<div class="col-sm-6">
								<div class="replay text-right"> <a href="#">replay</a>
								</div>
							</div>
						</div>
						<div class="space-5"></div>
						<p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
					</div>
					<div class="space-15"></div>
					<div class="border_black"></div>
					<div class="space-15"></div>
					<div class="single_comment inner_cm">
						<div class="comment_img">
							<img src="assets/cekjabar/img/author/author2.png" alt="">
						</div>
						<div class="row">
							<div class="col-sm-6"> <a href="#">QuomodoSoft</a>
							</div>
							<div class="col-sm-6">
								<div class="replay text-right"> <a href="#">replay</a>
								</div>
							</div>
						</div>
						<div class="space-5"></div>
						<p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
					</div>
					<div class="space-40"></div> <a href="#" class="cbtn4">Load More</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="space-100"></div>
<!--:::::  COMMENT FORM AREA END :::::::-->

<?= $this->endSection(); ?>