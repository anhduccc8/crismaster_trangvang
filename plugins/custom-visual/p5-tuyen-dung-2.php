<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'P5 Tuyển dụng II','crismaster'),
        'base' => 'p5_tuyen_dung_2',
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
                'heading' => esc_html__('Hình Ảnh','crismaster'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Nên nhập ảnh sp có kích thước dọc',"crismaster")
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Mô tả','crismaster'),
                'param_name' => 'desc',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('p5_tuyen_dung_2','p5_tuyen_dung_2_func');
function p5_tuyen_dung_2_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'image' => '',
        'desc' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    if(isset($image) && $image!='') {
        $image = wp_get_attachment_image_src($image, '');
    }
    ?>
    <section class="shs-section-widget bg-img-section shs-section-activity shs-section-td-02">
        <div class="container-fluid">
            <div class="row shs-item-activity-inner">
                <div class="col-12-ct col-7-td shs-item-activity shs-activity-content content-left">
                    <div class="item-activity-content">
                        <img class="bgr-map-left" alt="bgr-map-01" src="<?= get_template_directory_uri() ?>/assets/images/bgr-map-activity-02.png" style="width:100%">
                        <div class="shs-heading-meta u-fade-type-left js-scroll-trigger">
                            <h3 class="shs-heading color-dark text-transform"><?= esc_attr__($title,'crismaster') ?></h3>
                        </div>
                        <div class="activity-description color-dark u-fade-type-left js-scroll-trigger">
                            <?= esc_html__($desc,'crismaster') ?>
                        </div>
                        <div class="shs-btn-td mt-40 u-fade-type-left js-scroll-trigger">
                            <div class="btn-main btn-apply" data-toggle="modal" data-target="#tuyen-dung-form"><?= esc_html__('ỨNG TUYỂN','crismaster') ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-12-ct col-5-td shs-item-activity">
                    <div class="item-image-activity">
                        <img alt="img-activity-02" src="<?= esc_url($image[0]) ?>" style="width:100%">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>