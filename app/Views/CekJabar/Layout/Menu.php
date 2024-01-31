<!--::::: MENU AREA START  :::::::-->
<div class="menu4 home4menu">
    <div class="container">
        <div class="main-menu">
            <div class="main-nav clearfix is-ts-sticky">
                <div class="row justify-content-between">
                    <div class="col-6 col-lg-9 align-self-center">
                        <div class="newsprk_nav stellarnav">
                            <ul id="newsprk_menu">
                                <li><a href="<?= base_url('/'); ?>">Home </a></li>
                                <li><a href="javascript:void(0)">Kategori <i class="fal fa-angle-down"></i></a>
                                    <ul>
                                        <?php foreach ($kategoriData->orderBy('RAND()')->findAll(10) as $kt) { ?>
                                            <li>
                                                <a href="<?= base_url('kategori/' . $kt['slug']); ?>">
                                                    <?= $kt['nama_kategori']; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Tags <i class="fal fa-angle-down"></i></a>
                                    <ul>
                                        <?php foreach ($tagData->orderBy('RAND()')->findAll(10) as $tag) { ?>
                                            <li>
                                                <a href="<?= base_url('tag/' . $tag['slug']); ?>">
                                                    <?= '#' . $tag['nama_tag']; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url('contact'); ?>">Contact</a></li>
                                <li><a href="<?= base_url('about'); ?>">About</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 text-right align-self-center">
                        <div class="search4"> <i class="far fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--::::: MENU AREA END :::::::-->