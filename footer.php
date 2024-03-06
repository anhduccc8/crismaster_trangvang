<?php $theme_option = get_option('theme_option');
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_sublogo = $theme_option['footer_sublogo'];
$footer_address = $theme_option['footer_address'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
$footer_twitter = $theme_option['footer_twitter'];
$footer_facebook = $theme_option['footer_facebook'];
$footer_instagram = $theme_option['footer_instagram'];
$footer_linkedin = $theme_option['footer_linkedin'];
$footer_term = $theme_option['footer_term'];
$footer_policy = $theme_option['footer_policy'];
$mobile = wp_is_mobile(); ?>

<footer class="footer">
    <section class="section-infomation">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 wrap-info-company footer-column">
                    <div class="logo-footer">
                        <?php
                        $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                        if ($current_language == 'ja'){ ?>
                            <img src="<?= get_template_directory_uri() ?>/assets/image/logo_ja.png">
                            <?php
                        }else{
                            if (isset($footer_logo) && $footer_logo != '') { ?>
                                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php  echo esc_url($footer_logo) ?>" alt="Logo"></a>
                            <?php }else{ ?>
                                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?= get_template_directory_uri() ?>/assets/image/logo.png" alt="Logo"></a>
                            <?php } }
                        ?>
                    </div>
                    <p class="text"><?= esc_attr__($footer_sublogo,'crismaster') ?></p>
                    <ul class="social-network">
                        <li>
                            <a href="<?= $footer_facebook ?>">
                                <img src="<?= get_template_directory_uri() ?>/assets/image/Facebook.svg" alt="Facebook">
                            </a>
                        </li>
                        <li>
                            <a href="<?= $footer_twitter ?>">
                                <img src="<?= get_template_directory_uri() ?>/assets/image/Twitter.svg" alt="Twitter">
                            </a>
                        </li>
                        <li>
                            <a href="<?= $footer_instagram ?>">
                                <img src="<?= get_template_directory_uri() ?>/assets/image/Instagram.svg" alt="Instagram">
                            </a>
                        </li>
                        <li>
                            <a href="<?= $footer_linkedin ?>">
                                <img src="<?= get_template_directory_uri() ?>/assets/image/LinkedIn.svg" alt="LinkedIn">
                            </a>
                        </li>
                        <li>
                            <a href="<?= $footer_youtube ?>">
                                <img src="<?= get_template_directory_uri() ?>/assets/image/Youtube.svg" alt="Youtube">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wrap-link-footer footer-column">
                    <div class="link-of-home">
                        <h5><?= esc_html__('Trang chủ','crismaster') ?></h5>
                        <ul class="list-link">
                            <li class="item"><a href="#"><?= esc_html__('Tính năng','crismaster') ?></a></li>
                            <li class="item"><a href="#"><?= esc_html__('Bảng giá','crismaster') ?></a></li>
                            <li class="item"><a href="#"><?= esc_html__('Nghiên cứu','crismaster') ?></a></li>
                            <li class="item"><a href="#"><?= esc_html__('Đánh giá','crismaster') ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wrap-link-footer footer-column">
                    <div class="link-of-company">
                        <h5><?= esc_html__('Công ty','crismaster') ?></h5>
                        <ul class="list-link">
                            <li class="item"><a href="#"><?= esc_html__('Về chúng tôi','crismaster') ?></a></li>
                            <li class="item"><a href="#"><?= esc_html__('Liên hệ','crismaster') ?></a></li>
                            <li class="item"><a href="#"><?= esc_html__('Tuyển dụng','crismaster') ?></a></li>
                            <li class="item"><a href="#"><?= esc_html__('Văn hóa','crismaster') ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wrap-link-footer footer-column">
                    <div class="link-of-support">
                        <h5><?= esc_html__('Trợ giúp','crismaster') ?></h5>
                        <ul class="list-link">
                            <li class="item"><a href="#"><?= esc_html__('Mới bắt đầu','crismaster') ?>Getting started</a></li>
                            <li class="item"><a href="#"><?= esc_html__('Trung tâm trợ giúp','crismaster') ?>Help center</a></li>
                            <li class="item"><a href="#"><?= esc_html__('Trạng thái server','crismaster') ?>Server status</a></li>
                            <li class="item"><a href="#"><?= esc_html__('Báo cáo','crismaster') ?>Report a bug</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wrap-link-footer footer-column">
                    <div class="link-of-contact">
                        <h5><?= esc_html__('Liên hệ với chúng tôi','crismaster') ?></h5>
                        <ul class="list-link">
                            <li class="item">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.3333 5.9668V14.3001C18.3333 14.8527 18.1138 15.3826 17.7231 15.7733C17.3324 16.164 16.8025 16.3835 16.25 16.3835H3.74996C3.19743 16.3835 2.66752 16.164 2.27682 15.7733C1.88612 15.3826 1.66663 14.8527 1.66663 14.3001V5.9668" stroke="#FFCD00" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.3333 5.96663C18.3333 5.4141 18.1138 4.8842 17.7231 4.4935C17.3324 4.10279 16.8025 3.8833 16.25 3.8833H3.74996C3.19743 3.8833 2.66752 4.10279 2.27682 4.4935C1.88612 4.8842 1.66663 5.4141 1.66663 5.96663L8.89579 10.4805C9.2269 10.6875 9.6095 10.7972 9.99996 10.7972C10.3904 10.7972 10.773 10.6875 11.1041 10.4805L18.3333 5.96663Z" stroke="#FFCD00" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <a href="mailto:<?= $footer_email ?>"><?= $footer_email ?></a>
                            </li>
                            <li class="item">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2515 18.3373L12.2606 18.3436C13.0477 18.8448 13.9822 19.0624 14.9096 18.9605C15.8371 18.8587 16.702 18.4434 17.3616 17.7834L17.9345 17.2105C18.0615 17.0836 18.1622 16.933 18.2309 16.7671C18.2996 16.6013 18.335 16.4236 18.335 16.2441C18.335 16.0646 18.2996 15.8868 18.2309 15.721C18.1622 15.5552 18.0615 15.4045 17.9345 15.2776L15.518 12.8629C15.3911 12.7359 15.2404 12.6352 15.0746 12.5665C14.9088 12.4977 14.731 12.4624 14.5515 12.4624C14.372 12.4624 14.1943 12.4977 14.0284 12.5665C13.8626 12.6352 13.712 12.7359 13.5851 12.8629C13.3288 13.119 12.9814 13.2629 12.6191 13.2629C12.2568 13.2629 11.9093 13.119 11.6531 12.8629L7.78914 8.99801C7.53299 8.74178 7.3891 8.39432 7.3891 8.03202C7.3891 7.66972 7.53299 7.32225 7.78914 7.06603C7.9161 6.93914 8.01682 6.78848 8.08554 6.62266C8.15426 6.45683 8.18963 6.27909 8.18963 6.09959C8.18963 5.92008 8.15426 5.74234 8.08554 5.57652C8.01682 5.41069 7.9161 5.26003 7.78914 5.13314L5.37348 2.7184C5.11726 2.46225 4.76979 2.31836 4.40749 2.31836C4.04519 2.31836 3.69773 2.46225 3.44151 2.7184L2.86765 3.29134C2.2078 3.95098 1.79274 4.816 1.69105 5.74346C1.58936 6.67092 1.80713 7.60533 2.30837 8.39227L2.31384 8.40138C4.96102 12.318 8.33446 15.6908 12.2515 18.3373V18.3373Z" stroke="#FFCD00" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <a href="tel:<?= $footer_phone ?>"><?= $footer_phone ?></a>
                            </li>
                            <li class="item">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.8608 9.54249C16.8608 14.9213 11.3516 18.2351 10.2067 18.8663C10.1433 18.9012 10.072 18.9196 9.99961 18.9196C9.92718 18.9196 9.85593 18.9012 9.79251 18.8663C8.64676 18.2351 3.13928 14.9213 3.13928 9.54249C3.13928 5.25451 5.71207 2.25293 10 2.25293C14.288 2.25293 16.8608 5.25451 16.8608 9.54249Z" stroke="#FFCD00" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.5697 9.11349C6.5697 10.0233 6.93112 10.8958 7.57444 11.5391C8.21776 12.1825 9.09029 12.5439 10.0001 12.5439C10.9099 12.5439 11.7824 12.1825 12.4257 11.5391C13.069 10.8958 13.4305 10.0233 13.4305 9.11349C13.4305 8.20369 13.069 7.33116 12.4257 6.68784C11.7824 6.04452 10.9099 5.68311 10.0001 5.68311C9.09029 5.68311 8.21776 6.04452 7.57444 6.68784C6.93112 7.33116 6.5697 8.20369 6.5697 9.11349V9.11349Z" stroke="#FFCD00" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <a href="#"><?= $footer_address ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-more-infomation">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wrap wrap-footer-bottom">
                        <p>Copyright © 2023 Trang Vang Designed by <a target="_blank" href="https://innocom.vn/">Innocom</a></p>
                        <ul class="item-link-hozi">
                            <li class="item">All Rights Reserved </li>
                            <li class="item"><a href="<?= $footer_term ?>">Terms and Conditions</a></li>
                            <li class="item"><a href="<?= $footer_policy ?>">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
</body>
</html>