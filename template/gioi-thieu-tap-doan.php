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
                    <?php
                    get_template_part('template-parts/footer');
                    ?>
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