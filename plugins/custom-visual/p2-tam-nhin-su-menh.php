<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Tầm nhìn Sứ mệnh','crismaster'),
        'base' => 'p2_tam_nhin_su_menh',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tầm nhìn','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Mô tả tầm nhìn','crismaster'),
                'param_name' => 'desc',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Sứ mệnh','crismaster'),
                'param_name' => 'title2',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Mô tả sứ mệnh','crismaster'),
                'param_name' => 'desc2',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('p2_tam_nhin_su_menh','p2_tam_nhin_su_menh_func');
function p2_tam_nhin_su_menh_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'desc' => '',
        'desc2' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section class="section shs-section-widget bg-img-section shs-section-about-03" id="p2-tam-nhin-su-menh tam-nhin-su-menh" data-anchor="tam-nhin-su-menh" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-section-03.jpg');">
        <div class="container-fluid">
            <div class="row shs-item-about-02">
                <div class="col-12 col-xl-6 about-column-03 row-01 u-fade-type-left js-scroll-trigger">
                    <div class="shs-content-inner text-center">
                        <img alt="shs-img-air" class="shs-img-air" src="<?= get_template_directory_uri() ?>/assets/images/img-icon-01.png" style="width:77px">
                        <h3 class="shs-heading-air shs-item-heading-03">
                            <?= esc_attr__($title,'crismaster') ?>
                        </h3>
                        <div class="about-03-description text-white">
                            <?= esc_html__($desc,'crismaster') ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6 about-column-03 row-02 u-fade-type-left js-scroll-trigger">
                    <div class="shs-content-inner text-center">
                        <img alt="shs-img-flag" class="shs-img-flag" src="<?= get_template_directory_uri() ?>/assets/images/img-icon-02.png" style="width:68px">
                        <h3 class="shs-heading-flag shs-item-heading-03">
                            <?= esc_attr__($title2,'crismaster') ?>
                        </h3>
                        <div class="about-03-description text-white">
                            <?= esc_html__($desc2,'crismaster') ?>
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