<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Lich sử hình thành','crismaster'),
        'base' => 'lich_su_thanh_lap',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm banner giới thiệu','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Lịch sử hình thành qua các năm','crismaster'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Năm','crismaster'),
                        'param_name' => 'year',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
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
                ),
            ),
        )
    ));
}
add_shortcode('lich_su_thanh_lap','lich_su_thanh_lap_func');
function lich_su_thanh_lap_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section class="shs-section-widget bg-img-section shs-section-history" id="p2-lich-su-thanh-lap" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-section-history.jpg');">
        <div class="container-fluid">
            <div class="row shs-item-history-inner item-history-content-cus">
                <h3 class="shs-heading color-dark text-transform"><?= esc_html__('LỊCH SỬ THÀNH LẬP','crismaster') ?></h3>
                <div class="owl-carousel lich-su-thanh-lap">
                <?php if(isset($details) && $details != ''){
                    $t = 1;
                    $year_arr = array();
                    $detailss = vc_param_group_parse_atts($details,'');
                    foreach ($detailss as $dca ) {
                        array_push($year_arr, $dca['year']);
                        ?>
                        <div class="col-12 item" data-dot='<div class="nav-year text-shadow"><?= $dca['year'] ?></div>'>
                            <div class="item-history-content">
                                <h3 class="shs-heading-year"><?= esc_html__('Năm','crismaster') ?>&nbsp;<?= esc_attr__($dca['year'],'crismaster') ?></h3>
                                <h6 class="shs-title-history color-dark"><?= esc_attr__($dca['title'],'crismaster') ?></h6>
                                <div class="shs-heading-meta shs-history-meta">
                                    <div class="shs-history-description color-dark">
                                        <?= esc_attr__($dca['desc'],'crismaster') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $t++; } } ?>
                </div>
            </div>
            <div class="shs-nav-year" >
                <div class="shs-nav-year-inner owl-carousel year-lich-su">
                    <?php $u = 1;
                    foreach ($year_arr as $year){ ?>
                        <div class="item nav-year <?php if ($u==1){ echo 'actived'; } ?> text-shadow"><?= esc_attr__($year, 'crismaster') ?></div>
                    <?php $u++; } ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>