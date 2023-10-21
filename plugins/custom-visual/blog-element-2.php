<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Blog element 2 and sidebar','crismaster'),
        'base' => 'blog_element_2',
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
                'description' => esc_html__('Nhập ID các bài viết phụ muốn hiên thị vd: 10,11,12,13',"crismaster")
            ),
        )
    ));
}
add_shortcode('blog_element_2','blog_element_2_func');
function blog_element_2_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'numbers' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="post_layout_kienthuc">
        <div class="container">

            <div class="row">
                <div class="col-lg-9">
                    <h4 class="layout_title">
                        <span><?= $title ?></span>
                    </h4>
                    <div class="list row">
                    <?php
                    $numberss = explode(',', $numbers);
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'status' => 'approve',
                        'post_status' => 'publish',
                        'posts_per_page' => 8,
                        'post__in' => $numberss
                    ));
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                            ?>
                            <div class="blog_post col-sm-6">
                            <div class="post-wrapper">
                                <a class="ybc_item_img" href="<?php the_permalink(); ?>">
                                    <img title="<?php the_title() ?>" src="<?= esc_url($single_image[0]) ?>" alt="<?php the_title() ?>">
                                </a>
                                <div class="post_des">
                                    <h3 class="post_title">
                                        <a class="ybc_title_block" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                            <?php }
                            wp_reset_postdata();
                        } ?>
                    </div>
                </div>
                <div id="right-column" class="col-xs-12 col-sm-4 col-md-3">
                    <div class="ybc_blog_sidebar ">
                        <div class="ybc-navigation-blog">Blog navigation</div>
                        <div class="ybc-navigation-blog-content">
                            <?php
                            if ( is_active_sidebar('sidebar-1') ) {
                                dynamic_sidebar( 'sidebar-1' );
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>