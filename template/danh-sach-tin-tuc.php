<?php
/*
*Template Name: Page - Danh sách tin tức
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
                        <h3 class="shs-heading t-shadow color-white"><?= esc_html__('TIN TỨC','crismaster') ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <main class="site-content news-single">
            <div class="container-fluiddd">
                <div class="row-custom js-window-trigger is-active">
                    <section class="shs-section-widget bg-img-section shs-section-blog shs-section-new">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shs-heading-widget-blog">
                                        <img alt="img-sub-heading-new" class="img-sub-heading-style-02" src="<?= get_template_directory_uri() ?>/assets/images/img-sub-heading-style-02.png">
                                        <div class="shs-heading-meta">
                                            <h3 class="shs-heading t-shadow color-white"><?= esc_html__('Tin tức','crismaster') ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row shs-item-blog-inner">
                                <?php
                                $paged = get_query_var('paged')? get_query_var('paged') : 1;
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'paged' => $paged,
                                );
                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) :
                                    while ($wp_query->have_posts()) :
                                        $wp_query->the_post();
                                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                        ?>
                                        <div class="col-xs-12 col-md-6 col-xl-4 shs-item-blog">
                                            <div class="item-blog item">
                                                <div class="item-image-blog">
                                                    <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                                                </div>
                                                <div class="item-blog-content">
                                                    <h6 class="item-blog-title"><?php echo (strlen(get_the_title()) > 50) ? mb_substr(get_the_title(),0,50,'utf-8')."..." : get_the_title(); ?></h6>
                                                    <div class="item-blog-description"><?php echo (strlen(get_the_excerpt()) > 150) ? mb_substr(get_the_excerpt(),0,150,'utf-8')."..." : get_the_excerpt(); ?></div>
                                                    <div class="item-blog-date"><?= get_the_date('d/m/Y') ?></div>
                                                    <div class="item-blog-btn">
                                                        <a class="btn-main btn-out-line" href="<?= get_permalink() ?>"><?= esc_html__('ĐỌC THÊM','crismaster') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php  endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="shs-nav-number-bottom">
                        <?php  crismaster_pagination(); ?>
                        </div>
                    </section>
                </div>
            </div>
        </main>
<?php
get_footer();
?>