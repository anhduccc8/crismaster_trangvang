<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'P5 Tuyển dụng I','crismaster'),
        'base' => 'p5_tuyen_dung_1',
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
                'type' => 'textarea',
                'heading' => esc_html__('Mô tả','crismaster'),
                'param_name' => 'desc',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('p5_tuyen_dung_1','p5_tuyen_dung_1_func');
function p5_tuyen_dung_1_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'desc' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section class="section shs-section-widget bg-img-section shs-section-td" data-anchor="moi-truong" id="moi-truong-ele moi-truong" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-section-td.jpg');">
        <div class="container-fluid">
            <div class="row shs-item-td-inner">
                <div class="col-12">
                    <div class="item-td-content">
                        <div class="shs-heading-meta shs-history-meta">
                            <h3 class="shs-heading color-dark text-transform color-white u-fade-type-left js-scroll-trigger"><?= esc_attr__($title,'crismaster') ?></h3>
                        </div>
                        <div class="td-description color-white u-fade-type-left js-scroll-trigger">
                            <?= esc_html__($desc,'crismaster') ?>
                        </div>
                        <div class="shs-btn-td u-fade-type-left js-scroll-trigger">
                            <div class="btn-main btn-apply"><?= esc_html__('ỨNG TUYỂN','crismaster') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-img-member none-lg">
            <img alt="img-member" src="<?= get_template_directory_uri() ?>/assets/images/img-member.png" style="width:100%">
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>