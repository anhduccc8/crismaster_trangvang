<?php
/*
*Template Name:  Page - Giới thiệu tập đoàn
*
*/
get_header();
//echo pll_the_languages();
$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_2']['url'])){
    $banner_logo_2 = $theme_option['banner_logo_2']['url'];
}
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_name = $theme_option['footer_name'];
$footer_address = $theme_option['footer_address'];
$footer_address2 = $theme_option['footer_address2'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
?>

<?php if(have_posts()):
    while ( have_posts() ) : the_post(); ?>
        <main class="site-content">
            <div class="container-fluiddd">
                <div class="row-custom" id="fullpage2">
                    <section class="section shs-header-custom" data-anchor="banner" id="banner">
                        <div class="shs-slide container-fluidd">
                            <div class="slider-content slide-page-new">
                                <?php if (isset($banner_logo_2) && $banner_logo_2 != '') { ?>
                                    <img class="bgr-img" src="<?php  echo esc_url($banner_logo_2) ?>" style="width:100%">
                                <?php }else{ ?>
                                    <img class="bgr-img" src="<?= get_template_directory_uri() ?>/assets/images/slide-activity.jpg" style="width:100%">
                                <?php } ?>
                                <div class="shs-slide">
                                    <div class="shs-heading-meta">
                                        <div class="sub-heading-slide text-white fs-30 fs-15 fw-700 text-uppercase"><?= esc_html__('GIỚI THIỆU CHUNG','crismaster') ?></div>
                                        <h3 class="shs-heading t-shadow color-white"><?= esc_html__('HSH THĂNG LONG','crismaster') ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php the_content(); ?>
                    <section class="section site-footer-main position-relative" data-anchor="contact" id="footer-id contact">
                        <div class="shs-footer-main position-relative" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-footer-01.jpg');">
                            <div class="container-fluiddd">
                                <div class="container-default">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-3 shs-column-01">
                                            <div class="shs-contact-footer">
                                                <h4 class="shs-heading-footer"><?= esc_html__('THÔNG TIN LIÊN HỆ', 'crismaster') ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-9 shs-column-02">
                                            <div class="shs-content-footer">
                                                <div class="shs-meta-footer">
                                                    <?php if (isset($header_logo) && $header_logo != '') { ?>
                                                        <img alt="img-logo-footer" class="shs-logo-footer none-lg" src="<?php  echo esc_url($header_logo) ?>" style="width:100%">
                                                    <?php }else{ ?>
                                                        <img alt="img-logo-footer" class="shs-logo-footer none-lg" src="<?= get_template_directory_uri() ?>/assets/images/img-logo-footer.png" style="width:100%">
                                                    <?php } ?>
                                                    <?php if (isset($footer_name) && $footer_name != '') { ?>
                                                        <h4 class="shs-heading-footer"><?= esc_html__($footer_name,'crismaster') ?></h4>
                                                    <?php }else{ ?>
                                                        <h4 class="shs-heading-footer"><?= esc_html__('CÔNG TY TNHH XUẤT NHẬP KHẨU HSH THĂNG LONG','crismaster') ?></h4>
                                                    <?php } ?>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                                                        <?php
                                                        $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                                                        if (isset($footer_address) && $footer_address != '' && $current_language == 'vi' ) { ?>
                                                            <a class="shs-link" href="#"><?= htmlspecialchars_decode($footer_address) ?></a>
                                                        <?php }elseif(isset($footer_address2) && $footer_address2 != '' ){ ?>
                                                            <a class="shs-link" href="#"><?= htmlspecialchars_decode($footer_address2) ?></a>
                                                        <?php }else{ ?>
                                                            <a class="shs-link" href="#">Số nhà 19, ngách 26, ngõ 154 đường Đình Thôn, TDP số 7, <span>Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội, Việt Nam</span> </a>
                                                        <?php } ?>
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-phone"></i>
                                                        <?php if (isset($footer_phone) && $footer_phone != '') { ?>
                                                            <a class="shs-link" href="tel:<?= $footer_phone ?>"><?= formatPhoneNumber($footer_phone) ?></a>
                                                        <?php }else{ ?>
                                                            <a class="shs-link" href="tel:0987654321">0987.654.321</a>
                                                        <?php } ?>
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-envelope"></i>
                                                        <?php if (isset($footer_email) && $footer_email != '') { ?>
                                                            <a class="shs-link" href="mailto:<?= $footer_email ?>">
                                                                <?= $footer_email ?>
                                                            </a>
                                                        <?php }else{ ?>
                                                            <a class="shs-link" href="mailto:info@hshgroup.com">
                                                                info@hshgroup.com
                                                            </a>
                                                        <?php } ?>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shs-copy-right">
                            <span class="copy-right text-center">Copyright © 2023 HSH. Designed by <a target="_blank" href="https://innocom.vn/">Innocom</a></span>
                        </div>
                    </section>
                </div>
            </div>
        </main>
        <div class="footer-nav-number shs-nav-number" id="scroll-bullets">
            <div class="nav-number" data-menuanchor="banner"><a href="#banner">01</a></div>
            <div class="nav-number" data-menuanchor="thong-diep"><a href="#thong-diep">02</a></div>
            <div class="nav-number" data-menuanchor="lich-su-thanh-lap"><a href="#lich-su-thanh-lap">03</a></div>
            <div class="nav-number" data-menuanchor="tam-nhin-su-menh"><a href="#tam-nhin-su-menh">04</a></div>
            <div class="nav-number" data-menuanchor="contact"><a href="#contact">05</a></div>
        </div>
    <?php
    endwhile;
endif;
get_footer();
?>