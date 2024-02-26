<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Dịch vụ Doanh NGhiệp','crismaster'),
        'base' => 'p1_dich_vu_doanh_nghiep',
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
                'type' => 'param_group',
                'heading' => esc_html__('Thêm các dịch vụ','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('','crismaster'),
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Icon dịch vụ','crismaster'),
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
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tên dịch vụ','crismaster'),
                        'param_name' => 'stitle',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                ),
            ),
        )
    ));
}
add_shortcode('p1_dich_vu_doanh_nghiep','p1_dich_vu_doanh_nghiep_func');
function p1_dich_vu_doanh_nghiep_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'details' => '',
    ),$atts));
    ob_start();
    ?>

    <section class="section-widget-service">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section text-center heading-service">
                        <span class="text-behind">service</span>
                        <h2 class="item-section-title mt-a60px">
                            <span class="text-highlight"><?=  $title ?></span> <?=  $title2 ?>
                             </h2>
                    </div>
                </div>
            </div>

            <div class="row wrap-grid-service text-center">
            <?php if(isset($details) && $details != ''){
                $detailss = vc_param_group_parse_atts($details,'');
                foreach ($detailss as $dca ) {
                    if(isset($dca['simage']) && $dca['simage']!='') {
                        $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
                    }
                    ?>
                    <div class="col-12 col-md-3 col-lg-2 item">
                    <a href="<?= esc_url($dca['slink']) ?>" class="wrap-item">
                        <div class="wrap-image">
                            <img class="item-image" src="<?= esc_url($dca['simage'][0]) ?>" alt="Icon">
                        </div>
                        <h5 class="item-title"><?= htmlspecialchars_decode($dca['stitle']) ?></h5>
                    </a>
                </div>
                <?php  } } ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>