<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Sản phẩm/Dịch vụ nổi bật','crismaster'),
        'base' => 'p1_san_pham_dich_vu_noi_bat',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề 2','crismaster'),
                'param_name' => 'title2',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('ID các sản phẩm/dịch vụ muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Ngăn cách nhau bởi dấu ","',"crismaster")
            ),
        )
    ));
}
add_shortcode('p1_san_pham_dich_vu_noi_bat','p1_san_pham_dich_vu_noi_bat_func');
function p1_san_pham_dich_vu_noi_bat_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'ids' => '',
    ),$atts));
    ob_start();
    $ids_arr = explode(',', $ids);
    $args = array(
        'post_type' => 'service',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__in' => $ids_arr,
    );
    ?>
    <section class="section-product space-section">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section">
                        <span class="text-behind">products</span>
                        <h2 class="item-section-title style-02"><?= esc_attr($title) ?> <span class="text-highlight"><?= esc_attr($title2) ?></span></h2>
                    </div>
                </div>
                <div class="col-12 owl-carousel-section">
                    <div class="owl-carousel owl-theme" data-nav="true">
                        <?php
                        $t = 1;
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                $title_post = get_the_title();
                                $title_post = mb_strlen($title_post, 'UTF-8') > 20 ? mb_substr($title_post, 0, 20, 'UTF-8') . '...' : $title_post;
                                if ($t%2 == 1){ ?>
                                       <div class="item">
                                <?php } ?>
                                    <div class="wrap-item relative">
                                        <a href="<?php the_permalink(); ?>" class="link-box"></a>
                                        <div class="wrap-image">
                                            <img class="item-icon-svg" src="<?= get_template_directory_uri() ?>/assets/image/faverite.png" alt="">
                                            <img class="item-image" src="<?= esc_url($single_image[0]) ?>" alt="Image">
                                        </div>
                                        <h5 class="item-title"><?= esc_attr($title_post) ?></h5>
                                    </div>
                                <?php if ($t%2 == 0){ ?>
                                        </div>
                                 <?php }
                            $t+=1; }
                            wp_reset_postdata();
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php
    return ob_get_clean();
}
?>