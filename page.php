<?php
/*
*Template Name: Home Page - HSH Thăng Long
*
*/ 
get_header();

$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_1']['url'])){
    $banner_logo_1 = $theme_option['banner_logo_1']['url'];
}
?>

<section class="shs-header-custom bg-img-section" id="bannerHome">
    <div class="shs-slide container-fluidd">
        <div class="slider-content">
            <video id="myVideo" class="video-display" autoplay muted loop playsinline src="https://hshgroup.co/video/HSH.mp4"></video>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var video = document.getElementById('myVideo');
                    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
                    if (isMobile) {
                        video.autoplay = true;
                        video.play();
                    }
                });
            </script>
            <div class="shs-nav-number hide">
                <div class="nav-number active"><a href="#">01</a></div>
                <div class="nav-number"><a href="#ve-chung-toi-ele">02</a></div>
                <div class="nav-number"><a href="#">03</a></div>
                <div class="nav-number"><a href="#tin-tuc-ele">04</a></div>
                <div class="nav-number"><a href="#">05</a></div>
            </div>
        </div>
    </div>
    <a class="scrolldown js-scrollCt" href="#">
        <img class="ar" src="<?= get_template_directory_uri() ?>/assets/images/vector-1.png">
    </a>
</section>
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