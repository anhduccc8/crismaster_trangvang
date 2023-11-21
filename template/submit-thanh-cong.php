<?php
/*
*Template Name: Page - Submit thành công
*
*/
get_header();
$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_4']['url'])){
    $banner_logo_4 = $theme_option['banner_logo_4']['url'];
} ?>
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
                        <h3 class="shs-heading t-shadow color-white"><?= esc_html__('Gửi yêu cầu thành công','crismaster') ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>