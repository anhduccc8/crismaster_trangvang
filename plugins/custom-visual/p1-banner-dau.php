<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'List Banner','crismaster'),
        'base' => 'p1_banner_dau',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm banner ','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Chỉ nên chọn 2 banner để hiển thị','crismaster'),
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
add_shortcode('p1_banner_dau','p1_banner_dau_func');
function p1_banner_dau_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section section-widget-banner">
        <div class="container-fluid-ct">
            <div class="row">
    <?php if(isset($details) && $details != ''){
        $detailss = vc_param_group_parse_atts($details,'');
        foreach ($detailss as $dca ) {
            if(isset($dca['simage']) && $dca['simage']!='') {
                $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
            }
            ?>
                <div class="col-12 col-lg-6 item-banner-image" onclick="clickChangeUrls('<?= esc_url($dca['slink']) ?>')">
                    <img src="<?= esc_url($dca['simage'][0]) ?>" alt="" style="width:100%">
                </div>
            <?php  } } ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>