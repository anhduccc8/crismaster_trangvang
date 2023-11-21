<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Lĩnh vực hoạt động','crismaster'),
        'base' => 'p3_linh_vuc_hoat_dong',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm các lĩnh vực hoạt động','crismaster'),
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
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh','crismaster'),
                        'param_name' => 'simage',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh sp có kích thước dọc',"crismaster")
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Mô tả','crismaster'),
                        'param_name' => 'sdesc',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Chọn style hiển thị','crismaster'),
                        'param_name' => 'style',
                        'value' => array(
                            'Style 1' => '1',
                            'Style 2' => '2',
                        ),
                        'std' => '1', // Default selected option
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link','crismaster'),
                        'param_name' => 'slink',
                        'value' => '',
                        'description' => esc_html__('Nhập link nếu muốn xuất hiện button',"crismaster")
                    ),
                ),
            ),
        )
    ));
}
add_shortcode('p3_linh_vuc_hoat_dong','p3_linh_vuc_hoat_dong_func');
function p3_linh_vuc_hoat_dong_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section class="shs-section-widget bg-img-section shs-section-activity">
        <div class="container-fluid">
        <?php if(isset($details) && $details != ''){
            $detailss = vc_param_group_parse_atts($details,'');
            foreach ($detailss as $dca ) {
                if(isset($dca['simage']) && $dca['simage']!='') {
                    $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
                }
                if ($dca['style'] == '1'){ ?>
                    <div class="row shs-item-activity-inner">
                        <div class="col-12-ct col-6-ct shs-item-activity mobile-hide">
                            <div class="item-image-activity">
                                <img alt="img-activity-01" src="<?= esc_url($dca['simage'][0]) ?>" style="width:100%">
                            </div>
                        </div>
                        <div class="col-12-ct col-6-ct shs-item-activity shs-activity-content shs-item-activity-cus" style="background-image: url('<?= esc_url($dca['simage'][0]) ?>')">
                            <div class="overlay overlay-1"></div>
                            <div class="item-activity-content">
                                <img class="bgr-map bgr-map-right" alt="bgr-map-01" src="<?= get_template_directory_uri() ?>/assets/images/bgr-map-activity-01.png" style="width:100%">
                                <div class="shs-heading-meta">
                                    <h3 class="shs-heading color-white text-transform u-fade-type-left js-scroll-trigger"><?= htmlspecialchars_decode($dca['stitle']) ?></h3>
                                </div>
                                <div class="activity-description u-fade-type-left js-scroll-trigger">
                                    <?= esc_html__($dca['sdesc'],'crismaster') ?>
                                </div>
                                <?php if (isset($dca['slink']) && $dca['slink'] != ''){ ?>
                                    <div class="shs-btn-about">
                                        <a class="btn-main" href="<?= esc_url($dca['slink']) ?>"><?= esc_html__('ỨNG TUYỂN','crismaster') ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="row shs-item-activity-inner">
                        <div class="col-12-ct col-6-ct shs-item-activity shs-activity-content content-left shs-item-activity-cus" style="background-image: url('<?= esc_url($dca['simage'][0]) ?>'">
                            <div class="overlay overlay-2"></div>
                            <div class="item-activity-content">
                                <img class="bgr-map bgr-map-left" alt="bgr-map-01" src="<?= get_template_directory_uri() ?>/assets/images/bgr-map-activity-02.png" style="width:100%">
                                <div class="shs-heading-meta">
                                    <h3 class="shs-heading color-dark text-transform u-fade-type-left js-scroll-trigger"><?= esc_attr__($dca['stitle'],'crismaster') ?></h3>
                                </div>
                                <div class="activity-description color-dark u-fade-type-left js-scroll-trigger">
                                    <?= esc_html__($dca['sdesc'],'crismaster') ?>
                                </div>
                                <?php if (isset($dca['slink']) && $dca['slink'] != ''){ ?>
                                <div class="shs-btn-about">
                                    <a class="btn-main" href="<?= esc_url($dca['slink']) ?>"><?= esc_html__('ỨNG TUYỂN','crismaster') ?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-12-ct col-6-ct shs-item-activity mobile-hide">
                            <div class="item-image-activity">
                                <img alt="img-activity-02" src="<?= esc_url($dca['simage'][0]) ?>" style="width:100%">
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
            <?php  } } ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>