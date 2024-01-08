<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'LVC Bài post có sidebar','crismaster'),
        'base' => 'lvc_post_sidebar',
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
                'heading' => esc_html__('ID các bài viết muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Ngăn cách với nhau bởi dấu phẩy',"crismaster")
            ),
        )
    ));
}
add_shortcode('lvc_post_sidebar','lvc_post_sidebar_func');
function lvc_post_sidebar_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'ids' => '',
    ),$atts));
    ob_start();
    $args = array(
        'post_type' => 'post',
        'status' => 'approve',
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        'post__in' => explode(',',$ids)
    );
    ?>
    <h4 class="item-post-title"><?php esc_attr__($title,'crismaster') ?></h4>
    <?php
    $query  = new WP_Query($args);
    $t = 1;
    if ($query->have_posts()) {
    while ($query->have_posts()) {
    $query->the_post();
    $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');?>
    <div class="hsh-blog-column <?php if ($t > 1){ echo 'mt-70'; } ?>">
        <div class="item-post-content cursor-pointer" onclick="clickChangeUrls('<?= get_permalink() ?>')">
            <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
            <h6 class="item-blog-title"><?php the_title() ?></h6>
            <div class="item-post-description">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <div class="hsh-blog-releated">
            <h6 class="hsh-blog-releated-title"><?= esc_html__('Tin Liên Quan','crismaster') ?></h6>
            <div class="shs-nav-blog-releated row" data-nav="true">
                <div class="shs-nav-blog-releated-1  owl-carousel">
                    <a href="#" class="item nav-image"><img alt="img-blog-01" src="<?= get_template_directory_uri() ?>/assets/images/img-nav-image-01.jpg"></a>
                    <a href="#" class="item nav-image"><img alt="img-blog-01" src="<?= get_template_directory_uri() ?>/assets/images/img-nav-image-01.jpg"></a>
                    <a href="#" class="item nav-image"><img alt="img-blog-01" src="<?= get_template_directory_uri() ?>/assets/images/img-nav-image-01.jpg"></a>
                    <a href="#" class="item nav-image"><img alt="img-blog-01" src="<?= get_template_directory_uri() ?>/assets/images/img-nav-image-01.jpg"></a>
                </div>
            </div>
        </div>
    </div>
    <?php
     $t +=1; }
     wp_reset_postdata();
    }
    ?>
    <?php
    return ob_get_clean();
}
?>