<?= $this->extend('CekJabar/Layout/Template'); ?>
<?= $this->section('content'); ?>

<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <div class="first-slot">
                <div class="masonry-box post-media">
                    <img src="<?= base_url('assets/cekjabar/upload/tech_01.jpg'); ?>" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="" title="">Technology</a></span>
                                <h4><a href="tech-single.html" title="">Say hello to real handmade office furniture! Clean & beautiful design</a></h4>
                                <small><a href="tech-single.html" title="">24 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">by Amanda</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="second-slot">
                <div class="masonry-box post-media">
                    <img src="<?= base_url('assets/cekjabar/upload/tech_02.jpg'); ?>" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="" title="">Gadgets</a></span>
                                <h4><a href="tech-single.html" title="">Do not make mistakes when choosing web hosting</a></h4>
                                <small><a href="tech-single.html" title="">03 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">by Jessica</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="last-slot">
                <div class="masonry-box post-media">
                    <img src="<?= base_url('assets/cekjabar/upload/tech_03.jpg'); ?>" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="" title="">Technology</a></span>
                                <h4><a href="tech-single.html" title="">The most reliable Galaxy Note 8 images leaked</a></h4>
                                <small><a href="tech-single.html" title="">01 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">by Jessica</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div>

                    <div class="blog-list clearfix">

                        <?php foreach ($beritaData as $berita) : ?>
                            <div class="blog-box row mt-4">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="<?= base_url('beita/' . $berita['slug']); ?>" title="">
                                            <img src="<?= base_url('assets/image/berita/' . $berita['gambar']); ?>" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="<?= base_url('beita/' . $berita['slug']); ?>" title=""><?= $berita['judul']; ?></a></h4>
                                    <p><?= substr($berita['isi'], 0, 50) . '...'; ?></p>
                                    <?php
                                    $kategori_ids = explode(',', $berita['kategori_ids']);
                                    ?>
                                    <small class="firstsmall"><a class="bg-orange" href="<?= base_url('kategori/' . $kategoriMap[explode(',', $berita['kategori_ids'])[0]]['slug']); ?>" title=""><?= $kategoriMap[explode(',', $berita['kategori_ids'])[0]]['nama_kategori']; ?> </a></small>
                                    <small><a href="javascript:void();" title=""><?= date('l, d F Y', strtotime($berita['created_at'])); ?></a></small>
                                    <small><a href="javascript:void();" title=""><?= $userMap[$berita['user_id']]['nama_depan'] . ' ' . $userMap[$berita['user_id']]['nama_belakang']; ?></a></small>
                                    <small><a href="javascript:void();" title=""><i class="fa fa-eye"></i> <?= $pengunjungMap[$berita['id']]['jumlah_pengunjung'] ?? '0'; ?></a></small>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <hr class="invis">
                    </div>
                </div>

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2 class="widget-title">Berita Terbaru</h2>
                        <div class="trend-post">
                            <?php foreach ($beritaData as $berita) : ?>
                                <div class="blog-box">
                                    <div class="post">
                                        <a href="tech-single.html" title="">
                                            <img src="<?= base_url('assets/image/berita/' . $berita['gambar']); ?>" alt="<?= $berita['gambar']; ?>" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class="videohover"></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="blog-meta">
                                        <h4><a href="<?= base_url('berita/' . $berita['slug']); ?>" title=""><?= $berita['judul']; ?></a></h4>
                                    </div>
                                </div>
                                <hr class="invis">
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="widget">
                        <h2 class="widget-title">Popular Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <?php foreach ($beritaData as $berita) : ?>
                                    <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="<?= base_url('assets/image/berita/' . $berita['gambar']); ?>" alt="<?= $berita['gambar']; ?>" class="img-fluid float-left">
                                            <h5 class="mb-1"><?= substr($berita['judul'], 0, 20) . '...'; ?></h5>
                                            <small><?= substr($berita['isi'], 0, 20) . '...'; ?></small>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="dmtop">Scroll to Top</div>
<?= $this->endSection(); ?>