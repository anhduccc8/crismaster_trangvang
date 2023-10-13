<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Nhẫn nam cao cấp','crismaster'),
        'base' => 'nhan_nam_cao_cap',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm sản phẩm','crismaster'),
                'param_name' => 'details_ca_2',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh','crismaster'),
                        'param_name' => 'images_ca',
                        'value' => '',
                        'description' => esc_html__('Nên nhập ảnh sp có kích thước 250 x 375',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tên sản phẩm','crismaster'),
                        'param_name' => 'title_ca',
                        'value' => '',
                        'description' => esc_html__('Nhập vào tên danh mục',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Giá sản phẩm','crismaster'),
                        'param_name' => 'price_ca',
                        'value' => '',
                        'description' => esc_html__('Vd: 38.000.000 đ',"crismaster")
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => __('Giá cả liên hệ', 'crismaster' ),
                        'param_name' => 'price_lh',
                        'value' => '',
                        'description' =>'Check nếu bạn không muốn public giá'
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Đi đến Link','crismaster'),
                        'param_name' => 'link_ca',
                        'value' => '',
                        'description' => esc_html__('Nhập vào link trang page mà bạn muốn đến',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Hoặc nhập ID sản phẩm','crismaster'),
                        'param_name' => 'id_ca',
                        'value' => '',
                        'description' => esc_html__('Nhập vào ID sản phẩm bạn muốn link đến',"crismaster")
                    ),

                ),
                'description' => esc_html__('Các danh mục sẽ được hiển thị theo dạng slide',"crismaster")
            ),
        )
    ));
}
add_shortcode('nhan_nam_cao_cap','nhan_nam_cao_cap_func');
function nhan_nam_cao_cap_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_ca_2' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="panel-grid" >
        <div class="container">
            <div class="home-row row">
                <div class="home-position col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="tea_categories_group tea_cat_17 center enable_css16">
                        <div class="tea_adc_heading">
                            <h3 class="tea_adc_title">Nhẫn Nam Cao Cấp</h3>
                            <p class="tea_adc_subtitle"></p>
                        </div>
                        <div class="tea_categories group11">
                            <div class="tea_blocks_wrapper slider">
                                <div class="tea_block_product_item item25 cat80 active">
                                    <div class="tea_block_product tea_catblock_17 slides-nhan-nam-cao-cap owl-carousel">
                                    <?php if(isset($details_ca_2) && $details_ca_2 != ''){
                                        $details_ca_22 = vc_param_group_parse_atts($details_ca_2,'');
                                        foreach ($details_ca_22 as $dca ) {
                                            if(isset($dca['images_ca']) && $dca['images_ca']!='') {
                                                $dca['image_ca'] = wp_get_attachment_image_src($dca['images_ca'], '');
                                            }
                                            if ($dca['id_ca'] != ''){
                                                $dca['link_ca'] = get_permalink($dca['id_ca']);
                                            }
                                        ?>
                                        <div class="tea_product_group_item tea_product_group_1">
                                            <div class="product">
                                                <article class="product-miniature js-product-miniature">
                                                    <div class="thumbnail-container">
                                                        <a href="<?php echo esc_url($dca['link_ca']); ?>" class="thumbnail product-thumbnail">
                                                            <img class="lazyload" data-src="<?php echo esc_url($dca['image_ca'][0]); ?>" src="<?php echo esc_url($dca['image_ca'][0]); ?>"
                                                                 alt="<?php echo ($dca['title_ca']); ?>"
                                                            />
                                                        </a>
                                                        <div class="product-description">
                                                            <h3 class="h3 product-title" ><a href="<?php echo esc_url($dca['link_ca']); ?>" title="<?php echo ($dca['title_ca']); ?>"><?php echo strlen($dca['title_ca']) > 30 ? mb_substr($dca['title_ca'],0,30,'utf-8')."..." : $dca['title_ca']; ?></a></h3>
                                                            <div class="product-price-and-shipping">
                                                                <?php   if(isset($dca['price_lh']) && $dca['price_lh'] = true) { ?>
                                                                <span class="price_contact"><i class="fa-phone fa"></i> Giá liên hệ</span>
                                                            <?php }else{ ?>
                                                                <span class="price" aria-label="Giá"><?php echo ($dca['price_ca']); ?></span>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                        <?php  } } ?>
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