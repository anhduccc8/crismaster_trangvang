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

<div class="shs-header-custom bg-img-section" id="bannerHome">
    <div class="shs-slide container-fluidd">
        <div class="slider-content">
<!--            <video class="video-display" autoplay muted loop playsinline>-->
<!--                <source src="https://www.youtube.com/embed/M9bGM2nly2Q?si=DXuH2g-16cDvmkt8?autoplay=1" type="video/mp4">-->
<!--            </video>-->
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
        </div>
    </div>
    <a class="scrolldown js-scrollCt" href="#">
        <img class="ar" src="<?= get_template_directory_uri() ?>/assets/images/scrolldown-icon.png">
    </a>
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
get_footer();
?>