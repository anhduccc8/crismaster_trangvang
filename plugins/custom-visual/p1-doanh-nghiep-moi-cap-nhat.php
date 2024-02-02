<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Doanh nghiệp mới cập nhật','crismaster'),
        'base' => 'p1_doanh_nghiep_moi_cap_nhat',
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
                'heading' => esc_html__('ID các doanh nghiêp muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Ngăn cách nhau bởi dấu ","',"crismaster")
            ),
        )
    ));
}
add_shortcode('p1_doanh_nghiep_moi_cap_nhat','p1_doanh_nghiep_moi_cap_nhat_func');
function p1_doanh_nghiep_moi_cap_nhat_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'ids' => '',
    ),$atts));
    ob_start();
    $ids_arr = explode(',', $ids);
    $args = array(
        'post_type' => 'enterprise',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__in' => $ids_arr,
    );
    ?>
    <section class="section-update">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12 wrap-title-section">
                    <span class="text-behind">UPDATES</span>
                    <h2 class="item-section-title"><?= esc_attr($title) ?> <span class="text-highlight"><?= esc_attr($title2) ?></span></h2>
                </div>
            </div>
            <li class="row row-spacing">
                <ul class="col-12 wrap-list-update">
                <?php
                $t = 1;
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                    $query->the_post();
                    $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                    $title_post = get_the_title();
                    if ($t%2 == 1){ ?>
                        <li class="item">
                    <?php } ?>
                            <div class="wrap-item">
                                <a href="<?php the_permalink(); ?>" class="link-box"></a>
                                <img class="item-image" src="<?= esc_url($single_image[0]) ?>" alt="Image" style="max-width: 285px">
                                <h5 class="item-title">
                                    <span><?= esc_attr($title_post) ?></span>
                                </h5>
                            </div>
                    <?php if ($t%2 == 0){ ?>
                        </li>
                    <?php }
                    $t+=1; }
                    wp_reset_postdata();
                    }
                    ?>
                </ul>
            </div>
    </section>
    <?php
    return ob_get_clean();
}
?>