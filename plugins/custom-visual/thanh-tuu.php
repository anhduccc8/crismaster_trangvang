<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Thành tựu','crismaster'),
        'base' => 'thanh_tuu',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm các thành tựu','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Chỉ nên thêm 4 thành tựu để tối ưu hiển thị','crismaster'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tiêu đề trái (số)','crismaster'),
                        'param_name' => 'stitle',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tiêu đề phải','crismaster'),
                        'param_name' => 'stitle2',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tiêu đề phụ','crismaster'),
                        'param_name' => 'ssubtitle',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                ),
            ),
        )
    ));
}
add_shortcode('thanh_tuu','thanh_tuu_func');
function thanh_tuu_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section class="shs-section-widget bg-img-section shs-section-about-02" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-section-about-02.jpg');">
        <div class="bg-img-section bg-img-mobile" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-section-about-mobile-02.jpg');"></div>
        <div class="container-fluid">
        <?php if(isset($details) && $details != ''){
            $t = 1;
            $t1 = 1;
            $class = array(
                '1' => 'left',
                '2' => 'left',
                '3' => 'left',
                '4' => 'left',
            );
            $detailss = vc_param_group_parse_atts($details,'');
            foreach ($detailss as $dca ) {
                if ($t%2 == 1){ ?>
                    <div class="row shs-item-about-02 row-<?= $t1 ?>">
                 <?php   } ?>
                        <div class="col-sm-12 col-xl-6 about-column u-fade-type-<?= $class[$t] ?> js-scroll-trigger">
                    <div class="shs-content-inner">
                        <div class="shs-meta-number text-center">
                            <div class="item-about-number t-shadow"><?= $dca['stitle'] ?></div>
                            <?php if (isset($dca['stitle']) && $dca['stitle'] != ''){ ?>
                                <div class="item-about-meta-title <?php if ($t==3){echo 'fs-100';} ?>"><?= esc_html__($dca['stitle2'], 'crismaster') ?></div>
                            <?php } ?>
                        </div>
                        <div class="item-about-02 text-center">
                            <h6 class="item-about-meta-heading"><?= htmlspecialchars_decode($dca['ssubtitle']) ?></h6>
                        </div>
                    </div>
                </div>
                <?php if ($t%2 == 0){ $t1++; ?>
                </div>
                <?php   } ?>
        <?php $t++; } } ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>