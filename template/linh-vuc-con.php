<?php
/*
*Template Name:  Page - Lĩnh vực con
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
        <main class="site-content">
            <div class="container-default">
                <div class="row-custom">
                    <?php  the_content(); ?>
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