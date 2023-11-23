<?php $theme_option = get_option('theme_option');
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_name = $theme_option['footer_name'];
$footer_address = $theme_option['footer_address'];
$footer_address2 = $theme_option['footer_address2'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
$mobile = wp_is_mobile(); ?>



<a href="#" class="scroll-top on">
    <i class="zmdi zmdi-long-arrow-up"></i>
</a>
<?php
if (is_front_page()) { ?>
    <div class="footer-nav-number shs-nav-number" id="scroll-bullets">
        <div class="nav-number" data-menuanchor="hsh-thang-long"><a href="#hsh-thang-long">01</a></div>
        <div class="nav-number" data-menuanchor="about-us"><a href="#about-us">02</a></div>
        <div class="nav-number" data-menuanchor="field-activity"><a href="#field-activity">03</a></div>
        <div class="nav-number" data-menuanchor="achievement"><a href="#achievement">04</a></div>
        <div class="nav-number" data-menuanchor="news"><a href="#news">05</a></div>
        <div class="nav-number" data-menuanchor="contact"><a href="#contact">06</a></div>
    </div>
<?php } ?>
<div id="preloader" class="helper-hide">
    <div class="loader helper-centerbox">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<script>var path_resource = "<?=  get_template_directory_uri() ?>/assets/";</script>
</body>
</html>