<?= $this->extend('CekJabar/Layout/Template'); ?>
<?= $this->section('content'); ?>

<!--::::: ARCHIVE AREA START :::::::-->
<div class="archives layout3 post post1 padding-top-30">
	<div class="container">
		<div class="space-30"></div>
		<div class="row">
			<div class="col-12">
				<div class="bridcrumb"> <a href="<?= base_url('/'); ?>">Home</a> / Kategori / <?= $kategoriFilter['nama_kategori']; ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-lg-8">
				<div class="row">
					<div class="col-12">
						<div class="categories_title">
							<h5>Kategori: <a href="<?= base_url('kategori/' . $kategoriFilter['slug']); ?>"><?= $kategoriFilter['nama_kategori']; ?></a></h5>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<?php foreach ($beritaData->where('kategori_ids', $kategoriFilter['id'])->findAll() as $berita) { ?>
						<div class="col-lg-6">
							<div class="single_post post_type3 xs-mb90 post_type15 mb30">
								<div class="post_img border-radious5">
									<div class="img_wrap">
										<a href="<?= base_url($berita['slug']); ?>">
											<img src="<?= base_url('assets/image/berita/' . $berita['gambar']); ?>" alt="<?= $berita['judul']; ?>">
										</a>
									</div> <span class="tranding border_tranding">
										<i class="fas fa-bolt"></i></span>
								</div>
								<div class="single_post_text">
									<div class="row">
										<div class="col-9 align-self-cnter">
											<div class="meta3"> <a href="<?= $kategoriMap[$berita['kategori_ids']]['slug']; ?>"><?= strtoupper($kategoriMap[$berita['kategori_ids']]['nama_kategori']); ?></a>
												<a href="<?= base_url($berita['slug']); ?>">March 26, 2020</a>
											</div>
										</div>
										<div class="col-3 align-self-cnter">
											<div class="share_meta4 text-right">
												<ul class="inline">
													<li><a href="<?= base_url($berita['slug']); ?>"><i class="far fa-bookmark"></i></a>
													</li>
													<li><a href="<?= base_url($berita['slug']); ?>"><i class="fas fa-share"></i></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="space-5"></div>
									<h4><a href="<?= base_url($berita['slug']); ?>"><?= $berita['judul']; ?></a></h4>
									<div class="space-10"></div>
									<p class="post-p"><?= substr(strip_tags($berita['isi']), 0, 100) . '...'; ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="cpagination v4 padding5050">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fas fa-caret-left"></i></span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">..</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">5</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true"><i class="fas fa-caret-right"></i></span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="finance mb30 white_bg border-radious5 shadow7 padding20">
					<div class="heading">
						<h3 class="widget-title">Rekomendasi</h3>
					</div>
					<?php foreach ($beritaData->orderBy('RAND()')->findAll(3) as $berita) { ?>
						<div class="single_post mb30 type18">
							<div class="post_img">
								<a href="<?= base_url($berita['slug']); ?>">
									<img src="<?= base_url('assets/image/berita/' . $berita['gambar']); ?>" alt="<?= $berita['judul']; ?>">
								</a> <span class="batch3 date">
									April 26, 2020
								</span>
							</div>
							<div class="single_post_text py0">
								<h4><a href="<?= base_url($berita['slug']); ?>"><?= $berita['judul']; ?></a></h4>
								<div class="space-10"></div>
								<p class="post-p"><?= substr(strip_tags($berita['isi']), 0, 60) . '...'; ?></p>
								<ul class="mt10 like_cm">
									<li><a href="<?= base_url($berita['slug']); ?>"><i class="far fa-eye"></i> <?= $pengunjungMap[$berita['id']]['jumlah_kunjungan'] ?? 0; ?></a>
									</li>
									<li><a href="<?= base_url($berita['slug']); ?>"><i class="far fa-comment"></i> <?= $komentarCount[$berita['id']] ?? 0; ?></a>
									</li>
								</ul>
							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>