<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Thông điệp chủ tịch','crismaster'),
        'base' => 'p2_thong_diep',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Hình Ảnh','crismaster'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Nên nhập ảnh sp có kích thước vuông',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Mô tả','crismaster'),
                'param_name' => 'desc',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tên','crismaster'),
                'param_name' => 'names',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Chức danh','crismaster'),
                'param_name' => 'ceos',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('p2_thong_diep','p2_thong_diep_func');
function p2_thong_diep_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'title' => '',
        'desc' => '',
        'names' => '',
        'ceos' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    if(isset($image) && $image!='') {
        $image = wp_get_attachment_image_src($image, '');
        $images = $image[0];
    }else{
        $images = get_template_directory_uri() .'/assets/images/img-column-06.jpg';
    }
    ?>
    <section class="shs-section-widget bg-img-section shs-section-activity">
        <div class="container-fluid">
            <div class="row shs-item-activity-inner">
                <div class="col-12-ct col-7-ct shs-item-activity shs-activity-image">
                    <div class="item-image-activity">
                        <img alt="img-activity-01" src="<?= esc_url($images) ?>" style="width:100%">
                    </div>
                </div>
                <div class="col-12-ct col-5-ct shs-item-activity shs-activity-content shs-introduce-content">
                    <div class="item-activity-content">
                        <img class="bgr-map-right" alt="bgr-map-01" src="<?= get_template_directory_uri() ?>/assets/images/bgr-map-activity-01.png" style="width:100%">
                        <div class="shs-heading-meta u-fade-type-left js-scroll-trigger">
                            <h3 class="shs-heading color-white text-transform style-03"><?= esc_html__($title, 'crismaster') ?></h3>
                        </div>
                        <div class="activity-description u-fade-type-left js-scroll-trigger">
                            <?= esc_html__($desc, 'crismaster') ?>
                        </div>
                        <div class="shs-ceo-meta u-fade-type-left js-scroll-trigger">
                            <h3 class="shs-name color-white"><?= esc_html__($names, 'crismaster') ?></h3>
                            <div class="shs-position"><?= esc_html__($ceos, 'crismaster') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>