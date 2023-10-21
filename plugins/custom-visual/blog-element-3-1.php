<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Blog Element tin tức 1 ( 3 -1 )','crismaster'),
        'base' => 'blog_element_3_1',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('ID bài nổi bật','crismaster'),
                'param_name' => 'number',
                'value' => '',
                'description' => esc_html__('Nhập ID bài post hiển thị lớn bên trái',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('ID các bài post phụ','crismaster'),
                'param_name' => 'numbers',
                'value' => '',
                'description' => esc_html__('Nhập ID 3 bài viết phụ muốn hiên thị bên phải vd: 10,11,12,13',"crismaster")
            ),
        )
    ));
}
add_shortcode('blog_element_3_1','blog_element_3_1_func');
function blog_element_3_1_func($atts,$content = null){
    extract(shortcode_atts(array(
        'number' => '',
        'numbers' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="post_banner top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 post_banner_left">
                <?php
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'status' => 'approve',
                        'post_status' => 'publish',
                        'p' => $number
                    ));
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                        ?>
                        <div class="blog_post">
                            <div class="post-wrapper">
                                <a class="ybc_item_img" href="<?php the_permalink(); ?>">
                                    <img src="<?= esc_url($single_image[0]) ?>" alt="<?php the_title() ?>">
                                </a>
                                <div class="post_des">
                                    <h3 class="post_title">
                                        <a class="ybc_title_block" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                    </h3>
                                    <div class="post_date_use">
                                        <a class="post_user xx2" href="#">
                                        <span class="post-author-name">
                                        </span>
                                        </a>
                                        <a href="#" title="<?php the_author(); ?>"><?php the_author(); ?></a>
                                        <span>-</span>
                                        <span class="post_date">
                                                <?php echo get_the_date(); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    wp_reset_postdata();
                } ?>

                </div>
                <div class="col-lg-3 post_banner_right">
                <?php
                $numberss = explode(',', $numbers);
                $query2 = new WP_Query(array(
                    'post_type' => 'post',
                    'status' => 'approve',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'post__in' => $numberss
                ));
                if ($query2->have_posts()) {
                    while ($query2->have_posts()) {
                        $query2->the_post();
                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                        ?>
                    <div class="blog_post">
                        <div class="post-wrapper">
                            <a class="ybc_item_img" href="<?php the_permalink(); ?>">
                                <img title="" src="<?= esc_url($single_image[0]) ?>" alt="<?php the_title() ?>">
                            </a>
                            <div class="post_des">
                                <h3 class="post_title">
                                    <a class="ybc_title_block" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                </h3>
                                <div class="post_date_use">
                                    <a class="post_user xx2" href="#">
                                        <span class="post-author-name">
                                        </span>
                                    </a>
                                    <a href="#" title="<?php the_author(); ?>"><?php the_author(); ?></a>
                                    <span>-</span>
                                    <span class="post_date">
                                                <?php echo get_the_date(); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    wp_reset_postdata();
                } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>