<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Lĩnh vực con - Banner','crismaster'),
        'base' => 'lvc_banner',
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
                'type' => 'attach_image',
                'heading' => esc_html__('Hình Ảnh Banner','crismaster'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('lvc_banner','lvc_banner_func');
function lvc_banner_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'image' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    ?>
    <div class="shs-page-title">
        <div class="shs-slide container-default">
            <div class="slider-content slide-page-new">
                <?php if ($image_link[0] != ''){ ?>
                    <img class="bgr-img" alt="img-slide1" src="<?= esc_url($image_link[0]) ?>" style="width:100%">
                <?php }else{ ?>
                    <img class="bgr-img" alt="img-slide1" src="<?= get_template_directory_uri() ?>/assets/images/bgr-pagetitle-01.jpg" style="width:100%">
                <?php } ?>
                <div class="shs-slide content-middle">
                    <div class="shs-heading-meta">
                        <h3 class="shs-heading t-shadow color-white"><?= htmlspecialchars_decode($title); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>