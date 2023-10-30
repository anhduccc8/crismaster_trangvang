<?php
/*
*Template Name: Trang Liên hệ
*
*/
get_header();
$theme_option = get_option('theme_option');
$footer_infor_1 = $theme_option['footer_infor_1'];
$footer_infor_2 = $theme_option['footer_infor_2'];
$footer_infor_3 = $theme_option['footer_infor_3'];
$footer_infor_4 = $theme_option['footer_infor_4'];
$mobile = wp_is_mobile();?>
    <section id="wrapper">
        <div class="container">
            <nav data-depth="2" class="breadcrumb hidden-sm-down">
                <ol>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span >Trang chủ</span></a>
                    </li>
                    <li>
                        <span itemprop="name">Liên hệ với chúng tôi</span>
                    </li>
                </ol>
            </nav>
            <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
                <div class="contact-rich">
                    <h4>Thông tin cửa hàng</h4>
                    <div class="block">
                        <div class="icon"><i class="material-icons">&#xE55F;</i>
                        </div>
                        <div class="data"><?= htmlspecialchars_decode($footer_infor_2) ?></div>
                        <hr/>
                    </div>
                    <div class="block">
                        <div class="icon"><i class="material-icons">&#xE0CD;</i>
                        </div>
                        <div class="data">
                            Gọi cho chúng tôi:
                            <br/>
                            <a href="tel:<?= $footer_infor_3 ?>"><?= $footer_infor_3 ?></a>
                        </div>
                    <hr/>
                    </div>
                    <div class="block">
                        <div class="icon"><i class="material-icons">&#xE158;</i>
                        </div>
                        <div class="data email">
                            Email cho chúng tôi:
                            <br/>
                        </div>
                        <a href="mailto:<?= $footer_infor_4 ?>"><?= $footer_infor_4 ?></a>
                    </div>
                </div>

            </div>
            <div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-9">

                <section id="main">
                    <section id="content" class="page-content card card-block">
                        <section class="contact-form">
                            <?=  do_shortcode( '[ninja_form id=2]' ); ?>
                        </section>
                    </section>
                </section>
            </div>
        </div>
    </section>
<?php
get_footer();
?>