<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Danh mục ưa chuộng + 1 Banner','crismaster'),
        'base' => 'danh_muc_ua_chuong',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm ảnh','crismaster'),
                'param_name' => 'details_ca',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh','crismaster'),
                        'param_name' => 'image_ca',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh có kích thước vuông 200 x 200',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tên danh mục','crismaster'),
                        'param_name' => 'title_ca',
                        'value' => '',
                        'description' => esc_html__('Nhập vào tên danh mục',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Đi đến Link','crismaster'),
                        'param_name' => 'link_ca',
                        'value' => '',
                        'description' => esc_html__('Nhập vào link trang page mà bạn muốn đến',"crismaster")
                    ),

                ),
                'description' => esc_html__('Các danh mục sẽ được hiển thị theo dạng slide',"crismaster")
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Banner to phía dưới','crismaster'),
                'param_name' => 'banner',
                'value' => '',
                'description' => esc_html__('Nên nhập ảnh gif có kích thước xấp xỉ 1170 x 404',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link cho banner ','crismaster'),
                'param_name' => 'link_banner',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('danh_muc_ua_chuong','danh_muc_ua_chuong_func');
function danh_muc_ua_chuong_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_ca' => '',
        'banner' => '',
        'link_banner' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="panel-grid" style=" ">
        <div class="container">
            <div class="home-row row">
                <div class="home-position col-lg-12 col-sm-12 col-md-12 col-xs-12  ">
                    <div class="tea_adc_heading">
                        <h3 class="tea_adc_title">Danh mục ưa chuộng</h3>
                        <p class="tea_adc_subtitle"></p>
                    </div>
                    <div class="tea_cat_group_cats group1 slider listcategory_slider group_type_type1 align_content_center">
                        <div class="tea_cat_blocks slides-news owl-carousel slider-4-item slider">
                        <?php if(isset($details_ca)&&$details_ca != ''){
                            $details_ca = vc_param_group_parse_atts($details_ca,'');
                            foreach ($details_ca as $dca ) {
                                if(isset($dca['image_ca']) && $dca['image_ca']!='') {
                                    $dca['image_ca'] = wp_get_attachment_image_src($dca['image_ca'], '');
                                }
                                ?>
                            <div class="tea_cate_item item40">
                                <div class="tea_cate_item_content">
                                    <a class="tea_cate_link" href="<?php echo esc_url($dca['link_ca']); ?>" >
                                        <img class="lazyload" src="<?php echo esc_url($dca['image_ca'][0]); ?>" data-src="<?php echo esc_url($dca['image_ca'][0]); ?>"/>
                                    </a>
                                    <h3 class="tea_title_category">
                                        <a class="tea_cate_link" href="<?php echo esc_url($dca['link_ca']); ?>">
                                            <span class="name"><?php echo ($dca['title_ca']); ?></span>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <?php  } } ?>
                        </div>
                    </div>
                    <div class="tea_cat_group_cats group2 grid group_type_type1 align_content_left" >
                        <div class="tea_cat_blocks">
                            <div class="tea_cate_item item3 col-lg-12 col-sm-12 col-xs-12">
                                <div class="tea_cate_item_content">
                                    <a class="tea_cate_link" href="<?= $link_banner ?>">
                                        <?php if ($banner != ''){
                                            $banner = wp_get_attachment_image_src($banner, ''); ?>
                                            <img class="lazyload" src="<?php echo esc_url($banner[0]); ?>" data-src="<?php echo esc_url($banner[0]); ?>"  />
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>