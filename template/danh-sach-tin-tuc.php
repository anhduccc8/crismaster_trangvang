<?php
/*
*Template Name: Page - Danh sách tin tức
*
*/
get_header();
$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_4']['url'])){
    $banner_logo_4 = $theme_option['banner_logo_4']['url'];
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
    <div class="shs-header-custom">
        <div class="shs-slide container-fluidd">
            <div class="slider-content slide-page-new slide-single-blog">
                <?php if (isset($banner_logo_4) && $banner_logo_4 != '') { ?>
                    <img class="bgr-img" src="<?php  echo esc_url($banner_logo_4) ?>" style="width:100%">
                <?php }else{ ?>
                    <img class="bgr-img" src="<?= get_template_directory_uri() ?>/assets/images/bgr-slide-02.jpg" style="width:100%">
                <?php } ?>
                <div class="shs-slide content-middle">
                    <div class="shs-heading-meta style-02">
                        <img class="img-slide-new none-lg" alt="img-blog-02" src="<?= get_template_directory_uri() ?>/assets/images/img-slide-news.png">
                        <h3 class="shs-heading t-shadow color-white"><?= esc_html__('TIN TỨC','crismaster') ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <main class="site-content news-single">
            <div class="container-fluiddd">
                <div class="row-custom js-window-trigger is-active">
                    <section class="shs-section-widget bg-img-section shs-section-blog shs-section-new">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shs-heading-widget-blog">
                                        <img alt="img-sub-heading-new" class="img-sub-heading-style-02" src="<?= get_template_directory_uri() ?>/assets/images/img-sub-heading-style-02.png">
                                        <div class="shs-heading-meta">
                                            <h3 class="shs-heading t-shadow color-white"><?= esc_html__('Tin tức','crismaster') ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row shs-item-blog-inner">
                                <?php
                                $paged = get_query_var('paged')? get_query_var('paged') : 1;
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'paged' => $paged,
                                );
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) :
                                    while ($wp_query->have_posts()) :
                                        $wp_query->the_post();
                                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                        ?>
                                        <div class="col-xs-12 col-md-6 col-xl-4 shs-item-blog">
                                            <div class="item-blog item">
                                                <div class="item-image-blog">
                                                    <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                                                </div>
                                                <div class="item-blog-content">
                                                    <h6 class="item-blog-title"><?php echo (strlen(get_the_title()) > 50) ? mb_substr(get_the_title(),0,50,'utf-8')."..." : get_the_title(); ?></h6>
                                                    <div class="item-blog-description"><?php echo (strlen(get_the_excerpt()) > 150) ? mb_substr(get_the_excerpt(),0,150,'utf-8')."..." : get_the_excerpt(); ?></div>
                                                    <div class="item-blog-date"><?= get_the_date('d/m/Y') ?></div>
                                                    <div class="item-blog-btn">
                                                        <a class="btn-main btn-out-line" href="<?= get_permalink() ?>"><?= esc_html__('ĐỌC THÊM','crismaster') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php  endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="shs-nav-number-bottom">
                        <?php  crismaster_pagination(); ?>
                        </div>
                    </section>
                </div>
            </div>
        </main>

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
<?php
get_footer();
?>