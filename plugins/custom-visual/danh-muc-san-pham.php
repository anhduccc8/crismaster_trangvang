<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Cửa hàng : Danh mục kèm link','crismaster'),
        'base' => 'danh_muc_san_pham',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm danh mục','crismaster'),
                'param_name' => 'details_ca',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tên danh mục','crismaster'),
                        'param_name' => 'title',
                        'value' => '',
                        'description' => esc_html__('Nhập vào tên danh mục',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Đi đến Link','crismaster'),
                        'param_name' => 'link',
                        'value' => '',
                        'description' => esc_html__('Nhập vào link trang page mà bạn muốn đến',"crismaster")
                    ),

                ),
            ),
        )
    ));
}
add_shortcode('danh_muc_san_pham','danh_muc_san_pham_func');
function danh_muc_san_pham_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_ca' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div id="subcategories" style="margin-bottom: 50px;">
        <ul class="clearfix">
        <?php if(isset($details_ca)&&$details_ca != ''){
            $details_ca = vc_param_group_parse_atts($details_ca,'');
            foreach ($details_ca as $dca ) {
                ?>
                <li>
                    <a class="subcategory-name" href="<?php echo esc_url($dca['link']); ?>">
                        <?php echo ($dca['title']); ?>
                    </a>
                </li>
            <?php  } } ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
?>