<?php
/*
*Template Name:  Page - Liên hệ
*
*/
get_header();
$theme_option = get_option('theme_option');
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_name = $theme_option['footer_name'];
$footer_address = $theme_option['footer_address'];
$footer_address2 = $theme_option['footer_address2'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
?>
<?php
echo get_template_part('template-parts/footer-cus');
?>
<?php
get_footer();