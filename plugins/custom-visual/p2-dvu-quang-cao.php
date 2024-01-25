<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'List Banner Quảng cáo','crismaster'),
        'base' => 'p2_dvu_quang_cao',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm banner ','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Chỉ nên chọn 4 banner để hiển thị','crismaster'),
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh','crismaster'),
                        'param_name' => 'simage',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Đi đến Link','crismaster'),
                        'param_name' => 'slink',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),

                ),
            ),
        )
    ));
}
add_shortcode('p2_dvu_quang_cao','p2_dvu_quang_cao_func');
function p2_dvu_quang_cao_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section section-widget-banner-sale space-custom-02">
        <div class="container-fluid-ct">
            <div class="row">
            <?php if(isset($details) && $details != ''){
                $detailss = vc_param_group_parse_atts($details,'');
                foreach ($detailss as $dca ) {
                    if(isset($dca['simage']) && $dca['simage']!='') {
                        $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
                    }
                    ?>
                    <div class="col-12 col-lg-3 item-banner-sale">
                        <a href="<?= esc_url($dca['slink']) ?>">
                            <img src="<?= esc_url($dca['simage'][0]) ?>" alt="Banner Quảng Cáo" style="width:100%">
                        </a>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>