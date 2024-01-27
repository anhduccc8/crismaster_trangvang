<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Thông tin bổ sung cho liên hệ','crismaster'),
        'base' => 'p5_lien_he_infor',
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
                'type' => 'textarea',
                'heading' => esc_html__('Tiêu đề phụ','crismaster'),
                'param_name' => 'subtitle',
                'value' => '',
                'description' => esc_html__('Có thể nhập dạng html',"crismaster")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm các thông tin hướng dẫn','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('','crismaster'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tiêu đề','crismaster'),
                        'param_name' => 'stitle',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Mô tả','crismaster'),
                        'param_name' => 'sdes',
                        'value' => '',
                        'description' => esc_html__('Hình ảnh đại diện hiển thị cho danh mục',"crismaster")
                    ),
                ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Hình ảnh mô tả','crismaster'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Hình ảnh thêm vào mô tả',"crismaster")
            ),
        )
    ));
}
add_shortcode('p5_lien_he_infor','p5_lien_he_infor_func');
function p5_lien_he_infor_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'subtitle' => '',
        'details' => '',
        'image' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image = wp_get_attachment_image_src($image, '');
    } ?>
    <section class="section-form-contact space-section">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section">
                        <h2 class="item-section-title style-03"><span class="text-highlight"><?= esc_attr($title) ?> </span><?= esc_attr($title2) ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 description-contact">
                    <?= htmlspecialchars_decode($subtitle) ?>
                </div>
            </div>
            <div class="row row-accodition-widget">
                <?php
                $t = 1;
                if(isset($details) && $details != ''){
                    $detailss = vc_param_group_parse_atts($details,'');
                    foreach ($detailss as $dca ) {
                     if ($t == 1){ ?>
                        <div class="col-12 col-lg-6 column-left">
                     <?php }
                        ?>
                        <div class="accodition-widget mb-40">
                            <div class="accodition-content">
                                <div class="accodition-title">
                                    <?= esc_attr($dca['stitle']) ?>
                                </div>
                                <div class="accodition-des">
                                    <?= esc_attr($dca['sdes']) ?>
                                </div>
                            </div>
                        </div>
                     <?php if ($t == 2){ ?>
                            <img src="<?= esc_url($image[0]) ?>" alt="Img custom border" class="img-style-border mt-70" style="width:100%">
                        </div>
                        <div class="col-12 col-lg-6 column-right">
                     <?php } ?>
                 <?php    $t++; } } ?>
            </div>
        </div>
    </section>
       <?php 
    return ob_get_clean();
}
?>