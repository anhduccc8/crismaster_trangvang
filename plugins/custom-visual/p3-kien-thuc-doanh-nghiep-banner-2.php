<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'List Banner đầu page 2','crismaster'),
        'base' => 'p3_kien_thuc_doanh_nghiep_banner_2',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm banner ','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Chỉ nên chọn 3 banner để hiển thị,1 banner kích thước dài hơn','crismaster'),
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
add_shortcode('p3_kien_thuc_doanh_nghiep_banner_2','p3_kien_thuc_doanh_nghiep_banner_2_func');
function p3_kien_thuc_doanh_nghiep_banner_2_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-banner-blog container-fluid-ct">
        <div class="row row-banner-image">
        <?php if(isset($details) && $details != ''){
            $detailss = vc_param_group_parse_atts($details,'');
            foreach ($detailss as $dca ) {
                if(isset($dca['simage']) && $dca['simage']!='') {
                    $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
                }
                ?>
            <div class="col-xs-12 <?php if ($dca['simage'][1] > 700){ echo 'col-lg-6';}else{ echo 'col-lg-3';} ?>">
                <img src="<?= esc_url($dca['simage'][0]) ?>" alt="img-banner-04" style="width:100%; min-height: 84px;">
            </div>
            <?php } } ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>