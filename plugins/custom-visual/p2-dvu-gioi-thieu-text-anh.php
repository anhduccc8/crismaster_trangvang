<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Giới thiệu dịch vụ','crismaster'),
        'base' => 'p2_dvu_gioi_thieu_text_anh',
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
                'heading' => esc_html__('Tiêu đề 2','crismaster'),
                'param_name' => 'title2',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textarea_raw_html',
                'heading' => esc_html__('Mô tả','crismaster'),
                'param_name' => 'des',
                'value' => '',
                'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Hình ảnh','crismaster'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Chọn style hiển thị', 'crismaster'),
                'param_name' => 'style',
                'value' => array(
                        'Hiển thị ảnh bên phải' => '1',
                        'Hiển thị ảnh phía dưới' => '2'
                    ),
                'description' => esc_html__('', 'crismaster'),
            ),
        )
    ));
}
add_shortcode('p2_dvu_gioi_thieu_text_anh','p2_dvu_gioi_thieu_text_anh_func');
function p2_dvu_gioi_thieu_text_anh_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'des' => '',
        'image' => '',
        'style' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    if (isset($style) && $style == '1'){ ?>
        <section class="section-about-service container-fluid-ct">
            <div class="row row-custom">
                <div class="col-xs-12 col-lg-7 shs-item-blog-sidebar">
                    <h4 class="item-section-title item-post-title uppercase"><?= esc_attr($title) ?> <span class="text-highlight"><?= esc_attr($title2) ?></span></h4>
                </div>
            </div>
            <div class="row row-custom align-center">
                <div class="col-xs-12 col-lg-7">
                    <div class="about-service-description">
                        <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-5 ">
                    <div class="item img-column-service">
                        <img alt="img-single-01" src="<?= esc_url($image_link[0]) ?>" style="width:100%">
                    </div>
                </div>
            </div>
        </section>
    <?php }else{ ?>
        <section class="section-about-service container-fluid-ct">
            <div class="row row-custom">
                <div class="col-xs-12 shs-item-blog-sidebar">
                    <h4 class="item-section-title item-post-title uppercase"><?= esc_attr($title) ?> <span class="text-highlight"><?= esc_attr($title2) ?></span></h4>
                </div>
            </div>
            <div class="row row-custom align-center row-left">
                <div class="col-xs-12">
                    <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                    <img class="pt-20" src="<?= esc_url($image_link[0]) ?>" alt="banner-content-01" style="width:100%">
                </div>
            </div>
        </section>
    <?php }
    return ob_get_clean();
}
?>