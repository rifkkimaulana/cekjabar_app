<div class="logo_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 align-self-center">
                <div class="logo4">
                    <a href="<?= base_url('/'); ?>">
                        <img src="<?= base_url('assets/image/logo.png'); ?>" alt="Logo Cek Jabar">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 align-self-center">
                <div class="row">
                    <div class="col-12">
                        <div class="topbar">
                            <div class="row">
                                <div class="col-md-8 align-self-center">
                                    <div class="trancarousel_area">
                                        <p class="trand">Tranding</p>
                                        <div class="trancarousel owl-carousel nav_style1">
                                            <?php foreach ($beritaTrending->findAll(20) as $trending) { ?>
                                                <div class="trancarousel_item">
                                                    <p><a href="<?= base_url('berita/' . $trending['slug']); ?>"><?= $trending['judul']; ?></a></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 align-self-center">
                                    <div class="top_date_social text-right">
                                        <div class="user3"> <i class="fal fa-user-circle"></i>
                                        </div>
                                        <div class="lang-3">
                                            <ul>
                                                <li><a href="<?= base_url('login'); ?>">Masuk</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-5"></div>
                <div class="border4"></div>
                <div class="space-20"></div>
                <div class="row justify-content-end">

                    <div class="col-md-6 col-lg-4 align-self-center fix_width_social">
                        <div class="social4 text-right">
                            <ul class="inline">
                                <li><a href="javascript:void()"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li><a href="javascript:void()"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="javascript:void()"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li><a href="javascript:void()"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="searching_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto text-center">
                <div class="search_form4">
                    <form action="<?= base_url('search'); ?>">
                        <input type="search" placeholder="Search Here" name="query" required>
                        <input type="submit" value="Search">
                    </form>
                    <div class="search4_close"> <i class="far fa-times"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>