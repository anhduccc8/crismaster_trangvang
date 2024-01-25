<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Thống kê chỉ số','crismaster'),
        'base' => 'p1_thong_ke',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Ảnh background','crismaster'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm các chỉ số thống kê','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Chỉ nên thêm 3 chỉ số để hiển thị','crismaster'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Thông số','crismaster'),
                        'param_name' => 'snumber',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tiêu đề','crismaster'),
                        'param_name' => 'stitle',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),

                ),
            ),
        )
    ));
}
add_shortcode('p1_thong_ke','p1_thong_ke_func');
function p1_thong_ke_func($atts,$content = null){
    extract(shortcode_atts(array(
        'image' => '',
        'details' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $images = wp_get_attachment_image_src($image, '');
    }
    ?>
    <section class="section-show-case bg-img-section" style="background-image: url('<?= esc_url($images[0]) ?>');">
        <div class="container-fluid-ct">
            <div class="row show-case">
            <?php if(isset($details) && $details != ''){
            $detailss = vc_param_group_parse_atts($details,'');
            $t = 1;
                foreach ($detailss as $dca ) { ?>
                    <div class="col-12 col-md-4 show-case-item">
                            <div class="item-show-case text-center">
                                <div class="number <?php if($t%2!=0){ echo 'stroke';} ?>">
                                    <?= esc_attr($dca['snumber']) ?>
                                </div>
                                <div class="show-case-title">
                                    <?= esc_attr($dca['stitle']) ?>
                                </div>
                            </div>
                        </div>
                <?php  $t++; } } ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>