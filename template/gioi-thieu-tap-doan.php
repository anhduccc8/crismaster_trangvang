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
?>
<div class="shs-header-custom">
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
</div>
<?php if(have_posts()):
    while ( have_posts() ) : the_post(); ?>
        <main class="site-content">
            <div class="container-fluiddd">
                <div class="row-custom js-window-trigger is-active">
                    <?php the_content(); ?>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif;
get_footer();
?>