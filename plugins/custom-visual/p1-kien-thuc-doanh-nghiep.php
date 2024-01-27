<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Kiến thức doanh nghiệp','crismaster'),
        'base' => 'p1_kien_thuc_doanh_nghiep',
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
                'heading' => esc_html__('ID bài tin tức chính','crismaster'),
                'param_name' => 'idz',
                'value' => '',
                'description' => esc_html__('Nhập 1 ID của bài viết chính',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('ID các bài tin tức mới nhất muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Ngăn cách nhau bởi dấu ","',"crismaster")
            ),
        )
    ));
}
add_shortcode('p1_kien_thuc_doanh_nghiep','p1_kien_thuc_doanh_nghiep_func');
function p1_kien_thuc_doanh_nghiep_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'idz' => '',
        'ids' => '',
    ),$atts));
    ob_start();
    $ids_arr = explode(',', $ids);
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__in' => $ids_arr,
    );
    ?>
    <section class="section-blog">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section heading-service">
                        <span class="text-behind style-02">kNOWLEDGE</span>
                        <h2 class="item-section-title"><span class="text-highlight"><?= esc_attr($title) ?></span> <?= esc_attr($title2) ?></h2>
                    </div>
                </div>
            </div>
            <div class="row row-blog">
            <?php
                    $post = get_post($idz);
                    if ($post) {
                    $title_post = get_the_title($post->ID);
                    $title_post = mb_strlen($title_post, 'UTF-8') > 50 ? mb_substr($title_post, 0, 50, 'UTF-8') . '...' : $title_post;
                    $single_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                    $post_summary = get_post_meta($post->ID, '_cmb_post_summary', true);
                     ?>
                        <div class="col-xs-12 col-md-9 item-blog-sidebar">
                            <div class="blog-main">
                                <div class="item-post-content">
                                    <div class="item-image-blog">
                                        <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                                    </div>
                                    <h6 class="item-blog-title"><?= esc_attr($title_post) ?></h6>
                                    <div class="item-post-description">
                                        <?= esc_attr($post_summary) ?>
                                    </div>
                                    <a class="btn-main btn-round style-03" href="<?php the_permalink(); ?>"><?= esc_html__('Xem chi tiết','crismaster') ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-xs-12 col-md-3 shs-blog-sidebar">
                        <h6 class="item-blog-title"><?= esc_html__('Tin mới nhất','crismaster') ?> </h6>
                    <?php
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $title_post2 = get_the_title();
                            $title_post2 = mb_strlen($title_post2, 'UTF-8') > 50 ? mb_substr($title_post2, 0, 50, 'UTF-8') . '...' : $title_post2;
                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                            ?>
                            <div class="item-post-content item-post item text-center" onclick="clickChangeUrls('<?= get_permalink() ?>')">
                                <div class="item-image-blog">
                                    <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                                </div>
                                <div class="blog-title"><?= esc_attr($title_post2) ?> </div>
                            </div>
                        <?php }
                        wp_reset_postdata();
                    }
                    ?>
                    </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>