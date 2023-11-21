<?php
/*
*Template Name:  Page - Tuyển dụng
*
*/
get_header();
//echo pll_the_languages();
$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_5']['url'])){
    $banner_logo_5 = $theme_option['banner_logo_5']['url'];
}
?>
<div class="shs-header-custom">
    <div class="shs-slide container-fluidd">
        <div class="slider-content slide-page-new">
            <?php if (isset($banner_logo_5) && $banner_logo_5 != '') { ?>
                <img class="bgr-img" src="<?php  echo esc_url($banner_logo_5) ?>" style="width:100%">
            <?php }else{ ?>
                <img class="bgr-img" src="<?= get_template_directory_uri() ?>/assets/images/bgr-slide-td.jpg" style="width:100%">
            <?php } ?>
            <div class="shs-slide">
                <div class="shs-heading-meta">
                    <h3 class="shs-heading t-shadow color-white"><?= esc_html__('TUYỂN DỤNG','crismaster') ?></h3>
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

?>
<form class="hsh-form-apply">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="hsh-heading-form"><?= esc_html__('Ứng tuyển công việc','crismaster') ?></div>
    <div class="form-input">
        <input type="text" class="form-control" placeholder="Nhập họ và tên">
    </div>
    <div class="form-input">
        <input type="text" class="form-control" placeholder="Nhập số điện thoại">
    </div>
    <div class="form-input">
        <input type="email" class="form-control" placeholder="Nhập email">
    </div>
    <div class="form-input">
        <input type="text" class="form-control" placeholder="Nhập địa chỉ">
    </div>
    <div class="form-input">
        <input type="text" class="form-control" placeholder="Vị trí ứng tuyển">
    </div>
    <div class="hsh-update-file">
        <label for="">Tải CV</label>
        <a class="upload-file" href="#">Chọn file</a> <span>file_demo.pdf</span>
    </div>
    <button type="submit" class="btn-main btn-form-apply"><?= esc_html__('GỬI THÔNG TIN','crismaster')?></button>
</form>
<div class="modal-backdrop-cus"></div>
<?php
get_footer();
?>