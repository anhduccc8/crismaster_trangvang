<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Blog element 3 (Sự kiện))','crismaster'),
        'base' => 'blog_element_3',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title cho element','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('ID các bài post ','crismaster'),
                'param_name' => 'numbers',
                'value' => '',
                'description' => esc_html__('Nhập 3 ID các bài viết phụ muốn hiên thị vd: 10,11,12',"crismaster")
            ),
        )
    ));
}
add_shortcode('blog_element_3','blog_element_3_func');
function blog_element_3_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'numbers' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="post_layout_mixmatch">
        <div class="container">
            <h4 class="layout_title">
                <span><?php the_title() ?></span>
            </h4>
            <div class="mixmatch_wrap">
                <div class="col-md-6 col-xs-12 mixmatch_info">
                    <div class="mixmatch_content">

                    </div>
                </div>
                <?php
                $numberss = explode(',', $numbers);
                $query = new WP_Query(array(
                    'post_type' => 'post',
                    'status' => 'approve',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'post__in' => $numberss
                ));
                $t = 1;
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                        ?>
                        <div class="col-md-6 col-xs-12 mixmatch_post item_<?= $t ?>">
                            <div class="post_thumb">
                                <a class="ybc_item_img" href="<?php the_permalink(); ?>">
                                    <img title="<?php the_title() ?>" src="<?= esc_url($single_image[0]) ?>" alt="<?php the_title() ?>">
                                </a>
                            </div>
                            <h4 class="post_title">
                                <a class="cat_link" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                            </h4>
                        </div>
                    <?php $t++; }
                    wp_reset_postdata();
                } ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>