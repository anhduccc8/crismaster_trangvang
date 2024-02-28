<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Bài post sider có carousel','crismaster'),
        'base' => 'p3_kien_thuc_doanh_nghiep_carousel',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('Thời sự',"crismaster")
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
                'heading' => esc_html__('ID các bài tin tức liên quan muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Ngăn cách nhau bởi dấu ","',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Số bài biết mới nhất muốn hiển thị','crismaster'),
                'param_name' => 'number',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('p3_kien_thuc_doanh_nghiep_carousel','p3_kien_thuc_doanh_nghiep_carousel_func');
function p3_kien_thuc_doanh_nghiep_carousel_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'ids' => '',
        'idz' => '',
        'number' => '',
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
    <div class="section-blog-main container-fluid-ct">
        <div class="row row-custom">
            <div class="col-xs-12 col-lg-9 shs-item-blog-sidebar">
                <h4 class="item-post-title"><?= esc_attr($title) ?></h4>
                <div class="hsh-blog-column">
                <?php
                $post = get_post($idz);
                if ($post) {
                    $title_post = get_the_title($post->ID);
                    $title_post = mb_strlen($title_post, 'UTF-8') > 50 ? mb_substr($title_post, 0, 50, 'UTF-8') . '...' : $title_post;
                    $single_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                    $post_summary = get_post_meta($post->ID, '_cmb_post_summary', true);
                    $post_summary = mb_strlen($post_summary, 'UTF-8') > 300 ? mb_substr($post_summary, 0, 300, 'UTF-8') . '...' : $post_summary;
                    ?>
                        <div class="item-post-content">
                            <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                            <h6 class="item-blog-title"><?= esc_attr($title_post) ?></h6>
                            <div class="item-post-description">
                                <?= esc_attr($post_summary) ?>
                            </div>
                            <a class="btn-main btn-round style-03 btn-page-news" href="<?php the_permalink($post->ID); ?>"><?= esc_html__('Xem chi tiết','crismaster') ?></a>
                        </div>
                    <?php } ?>

                    <div class="hsh-blog-releated">
                        <h6 class="hsh-blog-releated-title"><?= esc_html__('Tin Liên Quan','crismaster') ?></h6>
                        <div class="shs-nav-blog-releated row width-70-per text-center" data-nav="true">
                            <div class="shs-nav-blog-releated-1  owl-carousel">
                                <?php
                                $query = new WP_Query($args);
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        $title_post2 = get_the_title();
                                        $title_post2 = mb_strlen($title_post2, 'UTF-8') > 50 ? mb_substr($title_post2, 0, 50, 'UTF-8') . '...' : $title_post2;
                                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="item nav-image"><img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>"></a>
                                    <?php }
                                    wp_reset_postdata();
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-lg-3 shs-blog-sidebar">
                <h6 class="item-blog-title"><?= esc_html__('Tin mới nhất','crismaster') ?> </h6>
                <?php
                $args2 = array(
                    'posts_per_page' => $number,
                    'ignore_sticky_posts' => 1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $related_posts = new WP_Query($args2);
                if ($related_posts->have_posts()) {
                    while ($related_posts->have_posts()) {
                        $related_posts->the_post();
                        $single_image2 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                        ?>
                            <div class="item-post item cursor-pointer mb-60px" onclick="clickChangeUrls('<?= get_permalink() ?>')">
                                <img alt="img-blog-01" src="<?= esc_url($single_image2[0]) ?>" style="width:100%">
                                <div class="blog-title"><?= the_title() ?> </div>
                            </div>
                        <?php
                    }
                    wp_reset_postdata();
                }  ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>