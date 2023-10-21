<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Khuyến mãi banner 1','crismaster'),
        'base' => 'khuyen_mai_banner_1',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Hình Ảnh','crismaster'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Nên nhập ảnh sp có kích thước 1200 x 450',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link','crismaster'),
                'param_name' => 'link',
                'value' => '',
                'description' => esc_html__('Nhập link muốn đi đến',"crismaster")
            ),
        )
    ));
}
add_shortcode('khuyen_mai_banner_1','khuyen_mai_banner_1_func');
function khuyen_mai_banner_1_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'link' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    $images = wp_get_attachment_image_src($image, '');
    ?>
    <div class="container">
        <div class=" tea_content_full_width" style=" ">
            <div class="home-position col-lg-12 col-sm-12 col-md-12 col-xs-12  ">
                <div class=" wow bounce" style="">
                    <p>
                    </p>
                    <div class="tea_cat_group_cats group25 grid group_type_type1 align_content_center">
                        <div class="tea_cat_blocks">
                            <div class="tea_cate_item item2 col-lg-12 col-sm-12 col-xs-12">
                                <div class="tea_cate_item_content">
                                    <a class="tea_cate_link" href="<?= $link ?>" >
                                        <img class="lazyloaded" src="<?= esc_url($images[0]) ?>" >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>