<?php
$theme_option = get_option('theme_option');
$footer_style = $theme_option['footer_style'];
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_name = $theme_option['footer_name'];
$footer_address = $theme_option['footer_address'];
$footer_address2 = $theme_option['footer_address2'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
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
                <div class="row footer-ele-logo">
                    <div class="col-lg-12 col-xl-6 shs-column-02 ">
                        <div class="shs-meta-footer row">
                            <a class="col-3 logo_footer" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php if (isset($footer_logo) && $footer_logo != '') { ?>
                                    <img src="<?php  echo esc_url($footer_logo) ?>" alt="">
                                <?php }else{ ?>
                                    <img src="<?= get_template_directory_uri() ?>/assets/images/footer_logo.png">
                                <?php } ?>
                            </a>
                            <div class="col-9">
                                <?php if (isset($footer_name) && $footer_name != '') { ?>
                                    <p class="company-name text-black"><?= esc_html__($footer_name,'crismaster') ?></p>
                                <?php }else{ ?>
                                    <p class="company-name text-black"><?= esc_html__('CÔNG TY TNHH XUẤT NHẬP KHẨU HSH THĂNG LONG','crismaster') ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 shs-column-01 shs-column-02-cus">
                        <div class="logo-container">
                            <a class="logo" href="#"><iconify-icon icon="mdi:youtube"></iconify-icon></a>
                            <a class="logo zalo" href="#"><img src="<?= get_template_directory_uri() ?>/assets/images/zalo.png" alt=""></a>
                            <a class="logo" href="#"><iconify-icon icon="mdi:facebook"></iconify-icon></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shs-footer-main-3 position-relative" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/footer_br_cus.png');">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-lg-12 col-xl-6 shs-column-02">
                        <div class="">
                            <ul class="">
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
<?php }