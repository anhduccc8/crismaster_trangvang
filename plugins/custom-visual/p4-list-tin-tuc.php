<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Danh sách tin tức','crismaster'),
        'base' => 'p4_list_tin_tuc',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Nhập tổng số bài viết mới nhất muốn show','crismaster'),
                'param_name' => 'number',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Nhập số bài viết muốn show trên 1 trang','crismaster'),
                'param_name' => 'number2',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Hoặc Có thể nhập các ID bài viết muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Các Ids ngăn cách nhau bằng dấu phẩy',"crismaster")
            ),
        )
    ));
}
add_shortcode('p4_list_tin_tuc','p4_list_tin_tuc_func');
function p4_list_tin_tuc_func($atts,$content = null){
    extract(shortcode_atts(array(
        'number' => '',
        'number2' => '',
        'ids' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section class="shs-section-widget bg-img-section shs-section-blog shs-section-new">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="shs-heading-widget-blog">
                        <img alt="img-sub-heading-new" class="img-sub-heading-style-02" src="<?= get_template_directory_uri() ?>/assets/images/img-sub-heading-style-02.png">
                        <div class="shs-heading-meta">
                            <h3 class="shs-heading t-shadow color-white"><?= esc_html__('Tin tức','crismaster') ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row shs-item-blog-inner">
           <?php
           $paged = get_query_var('paged')? get_query_var('paged') : 1;
           $args = array(
               'post_type' => 'post',
               'post_status' => 'publish',
               'posts_per_page' => $number2,
               'paged' => $paged,
           );
           if (isset($ids) && $ids != '') {
                    $p_ids_pro = explode(',', $ids);
                    $args['post__in'] = $p_ids_pro;
           } else {
                    $args['order'] = 'DESC';
                    $args['orderby'] = 'date';

            }
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) :
                    $wp_query->the_post();
                    $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
            ?>
            <div class="col-xs-12 col-md-6 col-xl-4 shs-item-blog">
                <div class="item-blog item">
                    <div class="item-image-blog">
                        <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                    </div>
                    <div class="item-blog-content">
                        <h6 class="item-blog-title"><?php echo (strlen(get_the_title()) > 50) ? mb_substr(get_the_title(),0,50,'utf-8')."..." : get_the_title(); ?></h6>
                        <div class="item-blog-description"><?php echo (strlen(get_the_excerpt()) > 150) ? mb_substr(get_the_excerpt(),0,150,'utf-8')."..." : get_the_excerpt(); ?></div>
                        <div class="item-blog-date"><?= get_the_date('d/m/Y') ?></div>
                        <div class="item-blog-btn">
                            <a class="btn-main btn-out-line" href="<?= get_permalink() ?>"><?= esc_html__('ĐỌC THÊM','crismaster') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php  endwhile;
//                the_posts_navigation();
                crismaster_pagination();
                wp_reset_postdata();
                endif;
             ?>
            </div>
        </div>
        <div class="shs-nav-number-bottom hide">

            <a href="#" class="nav-number">01</a>
            <a href="#" class="nav-number">02</a>
            <a href="#" class="nav-number">03</a>
            <a href="#" class="nav-number">04</a>
            <a href="#" class="nav-number">05</a>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>