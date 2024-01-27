<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Tin tức mới nhất','crismaster'),
        'base' => 'p3_single_post_tin_tuc_moi_nhat',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Nhập số bài viết muốn hiển thị','crismaster'),
                'param_name' => 'number',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('p3_single_post_tin_tuc_moi_nhat','p3_single_post_tin_tuc_moi_nhat_func');
function p3_single_post_tin_tuc_moi_nhat_func($atts,$content = null){
    extract(shortcode_atts(array(
        'number' => '',
    ),$atts));
    ob_start();
    $post_id = get_the_ID();

    $args = array(
        'post__not_in' => array($post_id),
        'posts_per_page' => $number,
        'ignore_sticky_posts' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
    );  ?>
    <section class="section-product section-blog-carousel space-custom-05">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section">
                        <h2 class="item-section-title style-02"><?= esc_html__('Tin Tức','crismaster') ?>  <span class="text-highlight"><?= esc_html__('Mới nhất','crismaster') ?> </span></h2>
                    </div>
                </div>
                <div class="col-12 owl-carousel-section">
                    <div class="owl-carousel owl-theme">
                        <?php
                        $related_posts = new WP_Query($args);
                        if ($related_posts->have_posts()) {
                            while ($related_posts->have_posts()) {
                                $related_posts->the_post();
                                $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large'); ?>
                                <div class="item">
                                    <div class="wrap-item relative">
                                        <a href="<?php the_permalink() ?>" class="link-box"></a>
                                        <div class="wrap-image">
                                            <img class="item-image" src="<?= esc_url($single_image[0]) ?>" alt="Image">
                                        </div>
                                        <h5 class="item-title"><?= the_title() ?> </h5>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        }  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>