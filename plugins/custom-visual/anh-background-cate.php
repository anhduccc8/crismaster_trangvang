<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Ảnh background trang category','crismaster'),
        'base' => 'background_cate',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Hình Ảnh','crismaster'),
                'param_name' => 'image_ca',
                'value' => '',
                'description' => esc_html__('Nên nhập ảnh có kích thước 1200 x 450',"crismaster")
            ),
        )
    ));
}
add_shortcode('background_cate','background_cate_func');
function background_cate_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image_ca' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div id="js-product-list-header">
        <div class="block-category">
            <div class="block-category-inner">
                <div class="category-cover">
                    <?php if(isset($image_ca) && $image_ca!='') {
                        $image_cas = wp_get_attachment_image_src($image_ca, ''); ?>
                        <img src="<?= esc_url($image_cas[0]) ?>" >
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>