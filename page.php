<?php
/*
*Template Name: Home Page - HSH Thăng Long
*
*/ 
get_header();

$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_1']['url'])){
    $banner_logo_1 = $theme_option['banner_logo_1']['url'];
}
$header_language = $theme_option['header_language'];
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
                <div class="row-custom" id="fullpage">
                    <section class="section fp-section fp-table shs-header-custom bg-img-section" data-anchor="hsh-thang-long" id="bannerHome hsh-thang-long">
                        <div class="shs-slide container-fluidd scale-m1345 scale-m1201">
                            <div class="slider-content">
                                <video id="myVideo" class="video-display" autoplay muted loop playsinline src="https://hshgroup.co/video/HSH.mp4"></video>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var video = document.getElementById('myVideo');
                                        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
                                        if (isMobile) {
                                            video.autoplay = true;
                                            video.play();
                                        }
                                    });
                                </script>
                                <div class="shs-nav-number hide">
                                    <div class="nav-number active"><a href="#">01</a></div>
                                    <div class="nav-number"><a href="#ve-chung-toi-ele">02</a></div>
                                    <div class="nav-number"><a href="#">03</a></div>
                                    <div class="nav-number"><a href="#tin-tuc-ele">04</a></div>
                                    <div class="nav-number"><a href="#">05</a></div>
                                </div>
                            </div>
                        </div>
                        <a class="scrolldown js-scrollCt" href="#">
                            <img class="ar" src="<?= get_template_directory_uri() ?>/assets/images/vector-1.png">
                        </a>
                    </section>
                    <?php the_content(); ?>
                    <?php
                    $footer_style = $theme_option['footer_style'];
                    if ($footer_style){ ?>
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
                    <?php }else{ ?>
                        <section class="section site-footer-main site-footer-main-2 position-relative" data-anchor="contact" id="footer-id contact">
                            <div class="shs-footer-main-2 position-relative text-black" >
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-6 shs-column-02">
                                            <div class="">
                                                <div class="shs-meta-footer">
                                                    <?php if (isset($footer_name) && $footer_name != '') { ?>
                                                        <h5 class="text-black"><?= esc_html__($footer_name,'crismaster') ?></h5>
                                                    <?php }else{ ?>
                                                        <h5 class="text-black"><?= esc_html__('CÔNG TY TNHH XUẤT NHẬP KHẨU HSH THĂNG LONG','crismaster') ?></h5>
                                                    <?php } ?>
                                                </div>
                                                <ul class="text-black">
                                                    <li>
                                                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                                                        <?php
                                                        $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                                                        if (isset($footer_address) && $footer_address != '' && $current_language == 'vi' ) { ?>
                                                            <a class="shs-link" href="#"><?= htmlspecialchars_decode($footer_address) ?></a>
                                                        <?php }elseif(isset($footer_address2) && $footer_address2 != '' ){ ?>
                                                            <a class="shs-link" href="#"><?= htmlspecialchars_decode($footer_address2) ?></a>
                                                        <?php }else{ ?>
                                                            <a class="shs-link" href="#">Số nhà 19, ngách 26, ngõ 154 đường Đình Thôn, TDP số 7, <br>Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội, Việt Nam </a>
                                                        <?php } ?>
                                                    </li>
                                                    <li class="mr-t-20px ">
                                                    <span>
                                                        <i class="fa-solid fa-phone"></i>
                                                    <?php if (isset($footer_phone) && $footer_phone != '') { ?>
                                                        <a class="shs-link" href="tel:<?= $footer_phone ?>"><?= formatPhoneNumber($footer_phone) ?></a>
                                                    <?php }else{ ?>
                                                        <a class="shs-link" href="tel:0987654321">0987.654.321</a>
                                                    <?php } ?>
                                                    </span>
                                                        <span class="mr-l-50px">
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
                                                   </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-6 shs-column-01 shs-column-01-cus">
                                            <ul>
                                                <?php
                                                $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                                                if ($current_language == 'vi'){
                                                    $menu_items = wp_get_menu_array('3');
                                                }else{
                                                    $menu_items = wp_get_menu_array('26');
                                                }
                                                $t = 1;
                                                if (!empty($menu_items)){
                                                foreach ($menu_items as $menu) { ?>
                                                <li><a href="<?= $menu['url'] ?>"><?php esc_attr_e( $menu['title'], 'crismaster'); ?></a></li>
                                                <?php
                                                if ($t==3){ ?>
                                            </ul><ul>
                                                <?php }
                                                $t++;  }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shs-copy-right">
                                <span class="copy-right copy-right-2 text-center">Copyright © 2023 HSH. Designed by <a target="_blank" href="https://innocom.vn/">Innocom</a></span>
                            </div>
                        </section>
                    <?php } ?>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif; ?>
<?php
get_footer();
?>
