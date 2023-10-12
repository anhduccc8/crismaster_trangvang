<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Tin tức trang chủ','crismaster'),
        'base' => 'tin_tuc_trang_chu',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Số tin tức muốn hiện','crismaster'),
                'param_name' => 'number',
                'value' => '',
                'description' => esc_html__('Nhập vào tên danh mục',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Hoặc Nhập IDs các bài viết muốn show ','crismaster'),
                'param_name' => 'ids_pro',
                'value' => '',
                'description' => esc_html__('(ví dụ 1,2,3,..)',"crismaster")
            ),
        )
    ));
}
add_shortcode('tin_tuc_trang_chu','tin_tuc_trang_chu_func');
function tin_tuc_trang_chu_func($atts,$content = null){
    extract(shortcode_atts(array(
        'number' => '',
        'ids_pro' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="panel-news" style=" ">
        <div class="container">
            <div class="home-row row">
                <div class="home-position col-lg-12 col-sm-12 col-md-12 col-xs-12  ">
                    <div class="section_title " style=""><h3>Tin tức</h3></div>
                    <div class="block ybc_block_latest ybc_blog_ltr_mode page_home  ybc_block_slider">
                        <h4 class="title_blog title_block">Bài viết mới</h4>
                        <div class="block_content row">
                            <ul class="owl-rtl owl-carousel tin-tuc-trang-chu">
                              <?php
                                if (isset($ids_pro) && $ids_pro != '') {
                                    $p_ids_pro = explode(',', $ids_pro);
                                    $query = new WP_Query(array(
                                        'post_type' => 'post',
                                        'status' => 'approve',
                                        'post_status' => 'publish',
                                        'post__in' => $p_ids_pro
                                    ));
                                } else {
                                    $query = new WP_Query(array(
                                        'post_type' => 'post',
                                        'posts_per_page' => $number,
                                        'status' => 'approve',
                                        'post_status' => 'publish',
                                        'order' => 'DESC',
                                        'orderby' => 'date'
                                    ));
                                }
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                                ?>
                                <li class="col-xs-12 col-sm-4 col-lg-4">
                                    <a class="ybc_item_img" href="<?php the_permalink(); ?>">
                                        <img class="lazyload" src="<?= esc_url($single_image[0]) ?>" />
                                    </a>
                                    <div class="ybc-blog-latest-post-content" style="margin-top: 10px">
                                        <a class="ybc_title_block" href="<?= esc_url($single_image[0]) ?>"><?php the_title() ?></a>
                                        <div class="blog_description">
                                            <p>
                                                <?php the_excerpt(); ?>
                                            </p>
                                        </div>
                                        <div class="block_footer_post">
                                            <a class="read_more" href="<?php the_permalink(); ?>">Xem thêm</a>
                                        </div>
                                    </div>
                                </li>

                            <?php }
                            wp_reset_postdata();
                            } ?>
                            </ul>
                            <div class="blog_view_all_button">
                                <a href="#" class="view_all_link">Xem tất cả bài mới</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}
?>