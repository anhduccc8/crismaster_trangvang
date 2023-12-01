<?php
/*
*Template Name:  Page - Lĩnh vực hoạt động
*
*/
get_header();
//echo pll_the_languages();
$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_3']['url'])){
    $banner_logo_3 = $theme_option['banner_logo_3']['url'];
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
                <div class="row-custom js-window-trigger is-active" id="fullpage3">
                    <section class="section shs-header-custom" data-anchor="banner" id="banner-ele banner">
                        <div class="shs-slide container-fluidd">
                            <div class="slider-content slide-page-new">
                                <?php if (isset($banner_logo_3) && $banner_logo_3 != '') { ?>
                                    <img class="bgr-img" src="<?php  echo esc_url($banner_logo_3) ?>" style="width:100%">
                                <?php }else{ ?>
                                    <img class="bgr-img" src="<?= get_template_directory_uri() ?>/assets/images/slide-activity.jpg" style="width:100%">
                                <?php } ?>
                                <div class="shs-slide">
                                    <div class="shs-heading-meta">
                                        <h3 class="shs-heading t-shadow color-white"><?= esc_html__('LĨNH VỰC HOẠT ĐỘNG','crismaster') ?></h3>
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
            <div class="nav-number" data-menuanchor="linh-vuc-1"><a href="#linh-vuc-1">02</a></div>
            <div class="nav-number" data-menuanchor="linh-vuc-2"><a href="#linh-vuc-2">03</a></div>
            <div class="nav-number" data-menuanchor="linh-vuc-3"><a href="#linh-vuc-3">04</a></div>
            <div class="nav-number" data-menuanchor="linh-vuc-4"><a href="#linh-vuc-4">05</a></div>
            <div class="nav-number" data-menuanchor="linh-vuc-5"><a href="#linh-vuc-5">06</a></div>
            <div class="nav-number" data-menuanchor="contact"><a href="#contact">07</a></div>
        </div>
    <?php
    endwhile;
endif;
get_footer();
?>