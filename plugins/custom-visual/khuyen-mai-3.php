<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Chính sách ưu đãi','crismaster'),
        'base' => 'khuyen_mai_3',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm banner','crismaster'),
                'param_name' => 'details_ca',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh','crismaster'),
                        'param_name' => 'image_ca',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh có kích thước 1200 x 450',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title','crismaster'),
                        'param_name' => 'title_ca',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Đi đến Link','crismaster'),
                        'param_name' => 'link_ca',
                        'value' => '#',
                        'description' => esc_html__('Nhập vào link trang page mà bạn muốn đến',"crismaster")
                    ),

                ),
                'description' => esc_html__('Nên chỉ nhập 3 banner để tối ưu hiển thị',"crismaster")
            ),
        )
    ));
}
add_shortcode('khuyen_mai_3','khuyen_mai_3_func');
function khuyen_mai_3_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_ca' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="" style=" ">
        <div class="container">
            <div class="home-row row">
                <div class="home-position col-lg-12 col-sm-12 col-md-12 col-xs-12  ">
                    <div class=" wow bounce" style="">
                        <p>
                            <div class="tea_adc_heading">
                                <h3 class="tea_adc_title">Chính Sách Ưu Đãi</h3>
                        <p class="tea_adc_subtitle"></p>
                    </div>
                    <div class="tea_cat_group_cats group23 grid group_type_type1 align_content_center">
                        <div class="tea_cat_blocks">
                        <?php if(isset($details_ca)&&$details_ca != ''){
                            $details_ca = vc_param_group_parse_atts($details_ca,'');
                            foreach ($details_ca as $dca ) {
                                if(isset($dca['image_ca']) && $dca['image_ca']!='') {
                                    $dca['image_ca'] = wp_get_attachment_image_src($dca['image_ca'], '');
                                }
                                ?>
                            <div class="tea_cate_item item49 col-lg-4 col-sm-4 col-xs-4">
                                <div class="tea_cate_item_content">
                                    <a class="tea_cate_link" href="<?php echo ($dca['link_ca']); ?>" >
                                        <img class="lazyload" src="<?php echo esc_url($dca['image_ca'][0]); ?>" />
                                    </a>
                                    <h3 class="tea_title_category">
                                        <a class="tea_cate_link" href="<?php echo ($dca['link_ca']); ?>" >
                                            <span class="name"><?php echo ($dca['title_ca']); ?></span>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        <?php  } } ?>
                        </div>
                    </div>
                    </p>
                    <div id="gtx-trans" style="position: absolute; left: -53px; top: -9px;">
                        <div class="gtx-trans-icon"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>