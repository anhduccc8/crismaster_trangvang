<?php
/*
*Template Name: Home Page - HSH Thăng Long
*
*/ 
get_header();
//echo pll_the_languages();
$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_1']['url'])){
    $banner_logo_1 = $theme_option['banner_logo_1']['url'];
}
?>

<div class="shs-header-custom" id="bannerHome">
    <div class="shs-slide container-fluidd">
        <div class="slider-content">
            <?php if (isset($banner_logo_1) && $banner_logo_1 != '') { ?>
                <img class="bgr-img" src="<?php  echo esc_url($banner_logo_1) ?>" style="width:100%">
            <?php }else{ ?>
                <img class="bgr-img" src="<?= get_template_directory_uri() ?>/assets/images/img-slide-01.jpg" style="width:100%">
            <?php } ?>
        </div>
    </div>
    <a class="scrolldown js-scrollCt" href="#">
        <img class="ar" src="<?= get_template_directory_uri() ?>/assets/images/scrolldown-icon.png">
    </a>
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