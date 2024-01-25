<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Ảnh sưu tập','crismaster'),
        'base' => 'p1_gallery',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'attach_images',
                'heading' => esc_html__('Hình Ảnh','crismaster'),
                'param_name' => 'images',
                'value' => '',
                'description' => esc_html__('Có thể thêm nhiều hình ảnh',"crismaster")
            ),
        )
    ));
}
add_shortcode('p1_gallery','p1_gallery_func');
function p1_gallery_func($atts,$content = null){
    extract(shortcode_atts(array(
        'images' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-gallery-image">
        <div class="container-fluid-ct">
            <div class="row wrap-gallery">
            <?php if(isset($images) && $images !='') {
                $imagess = explode(',', $images);
                foreach ($imagess as $img){
                    $imgs = wp_get_attachment_image_src($img, '');?>
                    <div class="<?php if ($imgs[1] > 600){ echo 'col-xl-6 col-lg-6 col-md-12 col-sm-12';}else{ echo 'col-xl-3 col-lg-3 col-md-6 col-sm-6';} ?> col-xs-12 gallery-item">
                        <img src="<?= esc_url($imgs[0]) ?>" alt="">
                    </div>
                <?php } } ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>