<?php
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
                        <h3 class="shs-heading t-shadow color-white"><?php the_title() ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if(have_posts()):
    while ( have_posts() ) : the_post();?>
        <main class="site-content news-single">
            <div class="container-fluiddd">
                <div class="row-custom js-window-trigger is-active">
                    <section class="shs-section-widget shs-section-single-post">
                        <div class="container-fluid">
                            <div class="row shs-single-post-inner">
                                <div class="col-xs-12 col-md-12 col-xl-12">
                                    <div class="item-blog item">
                                        <div class="item-single-post-content  u-fade-type-left js-scroll-trigger">
                                            <h1 class="item-post-heading color-black mt-40">
                                                <?php the_title() ?>
                                            </h1>
                                            <hr>
                                            <?php the_content(); ?>
                                            <div class="sharePost  u-fade-type-left js-scroll-trigger">
                                                <p><?= esc_html__('Chia sẻ','crismaster') ?>:</p>
                                                <a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?= get_the_permalink() ?>" target="_blank"><i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i></a>
                                                <a class="gp" href="https://plus.google.com/share?url=<?= get_the_permalink() ?>" target="_blank"><i class="fab fa-google fa-2x" style="color: #dd4b39;"></i></a>
                                                <a class="mail" href="mailto:?subject=HSH - Group&amp;body=<?= get_the_permalink() ?>" target="_blank"><i class="fab fa-envelope fa-2x" style="color: #dda00e;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif;
get_footer();
?>