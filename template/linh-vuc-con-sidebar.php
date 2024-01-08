<?php
/*
*Template Name:  Page - Lĩnh vực con sidebar
*
*/
get_header('lvc');
//echo pll_the_languages();
$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_5']['url'])){
    $banner_logo_5 = $theme_option['banner_logo_5']['url'];
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
        <div class="shs-page-title">
            <div class="shs-slide container-default">
                <div class="slider-content slide-page-new">
                    <img class="bgr-img" alt="img-slide1" src="<?= get_template_directory_uri() ?>/assets/images/bgr-pagetitle-03.jpg" style="width:100%">
                    <div class="shs-slide content-middle">
                        <div class="shs-heading-meta">
                            <h3 class="shs-heading t-shadow color-white mw-400"><?= esc_html__('XÚC TIẾN THƯƠNG MẠI','crismaster') ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main class="site-content">
            <div class="container-default">
                <div class="row row-custom">
                    <div class="col-xs-12 col-lg-9 shs-item-blog-sidebar">
                        <?php  the_content(); ?>
                    </div>
                    <div class="col-xs-12 col-lg-3 shs-blog-sidebar">
                        <?php
                        if ( is_active_sidebar('sidebar-1') ) {
                            dynamic_sidebar( 'sidebar-1' );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif;

?>

<?php
get_footer('lvc');
?>