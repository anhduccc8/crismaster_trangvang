<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'DN Tìm kiếm nhiều','crismaster'),
        'base' => 'p1_doanh_nghiep_tim_kiem_nhieu',
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
add_shortcode('p1_doanh_nghiep_tim_kiem_nhieu','p1_doanh_nghiep_tim_kiem_nhieu_func');
function p1_doanh_nghiep_tim_kiem_nhieu_func($atts,$content = null){
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
    <section class="section-search">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section">
                        <span class="text-behind">search</span>
                        <h2 class="item-section-title style-02 mt-a50px"><?= esc_attr($title) ?> <span class="text-highlight"><?= esc_attr($title2) ?></span></h2>
                    </div>
                </div>
                <div class="col-12 row-spacing">
                    <ul class="wrap-list-search">
                        <?php
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                $title_post = get_the_title();
                                $title_post = mb_strlen($title_post, 'UTF-8') > 20 ? mb_substr($title_post, 0, 20, 'UTF-8') . '...' : $title_post
                                ?>
                                <li class="item" onclick="clickChangeUrls('<?php  the_permalink() ?> ')">
                                    <div class="wrap-item">
                                        <img class="item-image" src="<?= esc_url($single_image[0]) ?>" alt="Image" style="width:100%">
                                        <h5 class="item-title"><?= $title_post ?></h5>
                                    </div>
                                </li>
                            <?php
                            }
                            wp_reset_postdata();
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>