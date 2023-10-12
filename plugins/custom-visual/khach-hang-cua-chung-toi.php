<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Khách hàng của chúng tôi','crismaster'),
        'base' => 'khach_hang_cua_chung_toi',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'attach_images',
                'heading' => esc_html__('Nhập hình ảnh đối tác','crismaster'),
                'param_name' => 'images_ca',
                'value' => '',
                'description' => esc_html__('Có thể nhập nhiều hình ảnh đôi tác có chiều cao tối đa 100px để tối ưu hiển thị',"crismaster")
            ),
        )
    ));
}
add_shortcode('khach_hang_cua_chung_toi','khach_hang_cua_chung_toi_func');
function khach_hang_cua_chung_toi_func($atts,$content = null){
    extract(shortcode_atts(array(
        'images_ca' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="khach_hang">
        <div class="container">
            <div class="home-row row">
                <div class="home-position col-lg-12 col-sm-12 col-md-12 col-xs-12  ">
                    <div class="title_block">
                        <h4>KHÁCH HÀNG CỦA CHÚNG TÔI</h4>
                    </div>
                </div>
                <?php if(isset($images_ca) && $images_ca !='') {
                    $images_ca = explode(',', $images_ca);
                    foreach ($images_ca as $img){
                        $imgs = wp_get_attachment_image_src($img, ''); ?>
                        <div class="home-position col-lg-3 col-sm-3 col-md-3 col-xs-6">
                            <div class=" " style=""><p><img class="lazyload" src="<?php echo esc_url($imgs[0]); ?>"  alt="" width="92" height="94" /></p>
                            </div>
                        </div>
                <?php } } ?>
            </div>
        </div>
    </div>
     <?php
    return ob_get_clean();
}
?>