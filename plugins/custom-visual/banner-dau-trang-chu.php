<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'3 Banner Đầu Trang chủ','crismaster'),
        'base' => 'banner_dau_trang_chu',
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
                        'description' => esc_html__('Nên nhập ảnh có kích thước 420 x 230',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Đi đến Link','crismaster'),
                        'param_name' => 'link_ca',
                        'value' => '',
                        'description' => esc_html__('Nhập vào link trang page mà bạn muốn đến',"crismaster")
                    ),

                ),
                'description' => esc_html__('Nên chỉ nhập 3 banner để tối ưu hiển thị',"crismaster")
            ),
        )
    ));
}
add_shortcode('banner_dau_trang_chu','banner_dau_trang_chu_func');
function banner_dau_trang_chu_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_ca' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="panel_services_2 tea_categories_group" style=" ">
        <div class="container">
            <div class="banner-home-cus home-row row owl-carousel">
            <?php if(isset($details_ca)&&$details_ca != ''){
                $details_ca = vc_param_group_parse_atts($details_ca,'');
                foreach ($details_ca as $dca ) {
                    if(isset($dca['image_ca']) && $dca['image_ca']!='') {
                        $dca['image_ca'] = wp_get_attachment_image_src($dca['image_ca'], '');
                    }
                    ?>
                <div class="">
                    <div style="" class="tea_widget_block widget_content_inner_top" >
                        <a class="widget_image_link" href="<?php echo esc_url($dca['link_ca']); ?>">
                            <img alt="" class="lazyload" src="<?php echo esc_url($dca['image_ca'][0]); ?>"
                                 data-view="http://www.adj.com.vn/"
                                 data-src="<?php echo esc_url($dca['image_ca'][0]); ?>"/>
                        </a>
                        <div class="widget_content"></div>
                    </div>
                </div>
            <?php  } } ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>