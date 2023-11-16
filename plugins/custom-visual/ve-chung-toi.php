<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Về chúng tôi','crismaster'),
        'base' => 've_chung_toi',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề phụ (trên)','crismaster'),
                'param_name' => 'sub1',
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
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề phụ (dưới)','crismaster'),
                'param_name' => 'sub2',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Mô tả','crismaster'),
                'param_name' => 'des',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link bài viết muốn đến','crismaster'),
                'param_name' => 'link',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm banner giới thiệu','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Chỉ nên chọn 3 banner để hiển thị','crismaster'),
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
                        'heading' => esc_html__('Hình Ảnh Desktop','crismaster'),
                        'param_name' => 'simage',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh sp có kích thước vuông',"crismaster")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh Mobile','crismaster'),
                        'param_name' => 'simage2',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh sp có kích thước dọc',"crismaster")
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
add_shortcode('ve_chung_toi','ve_chung_toi_func');
function ve_chung_toi_func($atts,$content = null){
    extract(shortcode_atts(array(
        'sub1' => '',
        'title' => '',
        'sub2' => '',
        'des' => '',
        'link' => '',
        'details' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section class="shs-section-widget bg-img-section shs-section-about pd-b-0-767" id="ve-chung-toi-ele" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-section-about.png');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="shs-heading-widget text-center">
                        <img alt="img-sub-heading-style" class="img-sub-heading-style" src="<?= get_template_directory_uri() ?>/assets/images/img-sub-heading-style.png">
                        <div class="shs-sub-heading-top"><?= esc_html__($sub1, 'crismaster') ?></div>
                        <div class="shs-heading-meta">
                            <h3 class="shs-heading"><?= esc_html__($title, 'crismaster') ?></h3>
                            <div class="shs-sub-heading-bottom"><?= esc_html__($sub2, 'crismaster') ?></div>
                        </div>
                        <div class="shs-description"><?= esc_html__($des, 'crismaster') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row shs-item-about-column row-column">
        <?php if(isset($details) && $details != ''){
             $detailss = vc_param_group_parse_atts($details,'');
             $t = 1;
             $class = array(
                     '1' => 'left',
                     '2' => 'up',
                     '3' => 'left',
             );
            foreach ($detailss as $dca ) {
                if(isset($dca['simage']) && $dca['simage']!='') {
                    $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
                }
                if(isset($dca['simage2']) && $dca['simage2']!='') {
                    $dca['simage2'] = wp_get_attachment_image_src($dca['simage2'], '');
                }
                ?>
                <div class="col-4 shs-item-about mr-b-0-767 p-lr-lg-0 u-fade-type-<?= $class[$t] ?> js-scroll-trigger <?php if ($t == 2){ echo 'text-center'; } ?>">
                    <?php if ($t==2){ ?>
                        <div class="shs-btn-about">
                            <a class="btn-main" href="<?= esc_url($link) ?>"><?= esc_html__('ĐỌC THÊM','crismaster') ?></a>
                        </div>
                    <?php } ?>
                    <div class="item-about text-center">
                        <a class="box-link" href="<?= esc_url($dca['slink']) ?>"></a>
                        <div class="item-about-image">
                            <img class="img-column-about-02 mobile-hide" src="<?= esc_url($dca['simage'][0]) ?>" style="width:100%">
                            <img class="img-column-about-02 mobile-show" src="<?= esc_url($dca['simage2'][0]) ?>" style="width:100%">
                        </div>
                        <h6 class="item-about-title"><?= esc_html__($dca['stitle'],'crismaster') ?></h6>
                    </div>
                </div>
            <?php $t++;  } } ?>
            </div>
            <div class="shs-nav-number hide">
                <div class="nav-number"><a href="#bannerHome">01</a></div>
                <div class="nav-number active"><a href="#ve-chung-toi-ele">02</a></div>
                <div class="nav-number"><a href="#">03</a></div>
                <div class="nav-number"><a href="#tin-tuc-ele">04</a></div>
                <div class="nav-number"><a href="#">05</a></div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>