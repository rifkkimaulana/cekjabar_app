<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?= base_url('/'); ?>"><img src="<?= base_url('assets/cekjabar/images/version/tech-logo.png'); ?>" alt=""></a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
            </li>
            <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Berita</a>
                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                    <li>
                        <div class="container">
                            <div class="mega-menu-content clearfix">
                                <div class="tab">
                                    <button class="tablinks active" onclick="openCategory(event, 'cat01')">Science</button>
                                    <button class="tablinks" onclick="openCategory(event, 'cat02')">Technology</button>
                                </div>

                                <div class="tab-details clearfix">
                                    <div id="cat01" class="tabcontent active">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                <div class="blog-box">
                                                    <div class="post-media">
                                                        <a href="tech-single.html" title="">
                                                            <img src="<?= base_url('assets/cekjabar/upload/tech_menu_01.jpg'); ?>" alt="" class="img-fluid">
                                                            <div class="hovereffect">
                                                            </div>
                                                            <span class="menucat">Science</span>
                                                        </a>
                                                    </div>
                                                    <div class="blog-meta">
                                                        <h4><a href="tech-single.html" title="">Top 10+ care advice for your toenails</a></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                <div class="blog-box">
                                                    <div class="post-media">
                                                        <a href="tech-single.html" title="">
                                                            <img src="<?= base_url('assets/cekjabar/upload/tech_menu_02.jpg'); ?>" alt="" class="img-fluid">
                                                            <div class="hovereffect">
                                                            </div>
                                                            <span class="menucat">Science</span>
                                                        </a>
                                                    </div>
                                                    <div class="blog-meta">
                                                        <h4><a href="tech-single.html" title="">The secret of your beauty is handmade soap</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="cat02" class="tabcontent">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                <div class="blog-box">
                                                    <div class="post-media">
                                                        <a href="tech-single.html" title="">
                                                            <img src="<?= base_url('assets/cekjabar/upload/tech_menu_05.jpg'); ?>" alt="" class="img-fluid">
                                                            <div class="hovereffect">
                                                            </div>
                                                            <span class="menucat">Technology</span>
                                                        </a>
                                                    </div>
                                                    <div class="blog-meta">
                                                        <h4><a href="tech-single.html" title="">2017 summer stamp will have design models here</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tech-contact.html">Contact Us</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-2">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-rss"></i></a>
            </li>
        </ul>
    </div>
</nav>