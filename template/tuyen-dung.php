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