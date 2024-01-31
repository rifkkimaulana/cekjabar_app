<div class="footer footer_area3 ">
    <div class="container">
        <div class="row">
            <!-- Left Layout -->
            <div class="col-md-6 col-lg-4">
                <div class="single_footer_nav mb30">
                    <h3 class="widget-title">Kategori</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <?php foreach ($kategoriData->findAll(7) as $kt) { ?>
                                    <li><a href="<?= base_url('kategori/' . $kt['slug']); ?>"><?= $kt['nama_kategori']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <?php foreach ($kategoriData->findAll(7, 7) as $kt) { ?>
                                    <li><a href="<?= base_url('kategori/' . $kt['slug']); ?>"><?= $kt['nama_kategori']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- View Tags News -->
                <div class="space-30"></div>
                <div class="border_black"></div>
                <div class="space-30"></div>
                <div class="single_footer_nav mb30">
                    <h3 class="widget-title">Tag Populer</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <?php foreach ($tagData->findAll(7) as $tag) { ?>
                                    <li><a href="<?= base_url('tag/' . $tag['slug']); ?>"><?= '#' . $tag['nama_tag']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <?php foreach ($tagData->findAll(7, 7) as $tag) { ?>
                                    <li><a href="<?= base_url('tag/' . $tag['slug']); ?>"><?= '#' . $tag['nama_tag']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Layout-->
            <div class="col-md-6 col-lg-8">
                <div class="row">
                    <div class="col-lg-6">

                        <!-- View More News -->
                        <div class="footer_more_news mb30">
                            <h3 class="widget-title">Berita Teratas</h3>
                            <div class="more_newss">
                                <?php foreach ($beritaTrending->findAll(3) as $trending) { ?>
                                    <div class="single_more_news">
                                        <p class="meta"><?= strtoupper($kategoriMap[$trending['kategori_ids']]['nama_kategori']); ?></p>
                                        <a href="<?= base_url($trending['slug']); ?>"><?= $trending['judul']; ?></a>
                                        <p><?= substr(strip_tags($trending['isi']), 0, 89) . '...'; ?></p>
                                        <ul class="mt20 like_cm">
                                            <li><a href="<?= base_url($trending['slug']); ?>"><i class="far fa-eye"></i> <?= $pengunjungMap[$trending['id']]['jumlah_kunjungan'] ?? 0; ?></a></li>
                                            <li><a href="<?= base_url($trending['slug']); ?>"><i class="far fa-comment"></i> <?= $komentarCount[$trending['id']] ?? 0; ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="space-15"></div>
                                    <div class="border_black"></div>
                                    <div class="space-15"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- View Kategori News -->
                    <div class="col-lg-6">
                        <div class="box widget news_letter news3bg mb30 border-radious5">
                            <h2 class="widget-title">News Letter</h2>
                            <p>Your email address will not be this published. Required fields are News Today.</p>
                            <div class="space-20"></div>
                            <div class="signup_form">
                                <form action="index.html">
                                    <input class="signup white_bg" type="email" placeholder="Your email">
                                    <input type="button" class="cbtn" value="sign up">
                                </form>
                                <div class="space-10"></div>
                                <p>We hate spam as much as you do</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Get Install Mobile Application -->
                <div class="download_btn v4">
                    <div class="space-15"></div>
                    <div class="border_black"></div>
                    <div class="space-15"></div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="apps_desc">
                                <h3 class="apps_title">Cek Jabar app download</h3>
                                <div class="space-5"></div>
                                <p>Free sign & download, iOS & Android app</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="download_btn_group">
                                <a class="app_btn" href="javascript:void()"> <i class="fab fa-google-play"></i>
                                    Download on the <span>google play</span>
                                </a>
                                <a class="app_btn" href="javascript:void()"> <i class="fab fa-apple"></i>
                                    Download on the <span>app store</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <p>CEK JABAR &copy; Copyright 2024, All Rights Reserved</p>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="copyright_menus text-right">
                        <div class="language"></div>
                        <div class="copyright_menu inline">
                            <ul>
                                <li><a href="<?= base_url('about'); ?>">About</a></li>
                                <li><a href="<?= base_url('contact'); ?>">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>