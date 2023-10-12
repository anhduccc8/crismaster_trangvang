<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Sản Phẩm Nhẫn cưới cao cấp + 1 Banner','crismaster'),
        'base' => 'nhan_cuoi_cao_cap',
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
                        'type' => 'attach_images',
                        'heading' => esc_html__('2 Hình Ảnh','crismaster'),
                        'param_name' => 'images_ca',
                        'value' => '',
                        'description' => esc_html__('Nên nhập 2 ảnh của 1sp có kích thước 250 x 375 để hiển thị hiệu ứng',"crismaster")
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
add_shortcode('nhan_cuoi_cao_cap','nhan_cuoi_cao_cap_func');
function nhan_cuoi_cao_cap_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_ca_2' => '',
        'banner' => '',
        'link_banner' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="panel-grid" style=" ">
        <div class="container">
            <div class="home-row row">
                <div class="home-position col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="tea_categories_group tea_cat_17 center enable_css16">
                        <div class="tea_adc_heading">
                            <h3 class="tea_adc_title">Nhẫn cưới cao cấp</h3>
                            <p class="tea_adc_subtitle"></p>
                        </div>
                        <div class="tea_categories group3">
                            <div class="tea_blocks_wrapper slider"	>
                                <div class="tea_block_product_item item6 cat117 active" >
                                    <div class="tea_block_product tea_catblock_17" >
                                        <div class="slick-list draggable">
                                            <div class="slick-track slides-nhan-cuoi-cao-cap owl-carousel">
                                                <?php if(isset($details_ca_2) && $details_ca_2 != ''){
                                                    $details_ca_22 = vc_param_group_parse_atts($details_ca_2,'');
                                                    foreach ($details_ca_22 as $dca ) {
                                                        if(isset($dca['images_ca']) && $dca['images_ca']!='') {
                                                            $image_cas = explode(',',$dca['images_ca'] );
                                                            $dca['image_ca_0'] = wp_get_attachment_image_src($image_cas[0], '');
                                                            $dca['image_ca_1'] = wp_get_attachment_image_src($image_cas[1], '');
                                                        }
                                                        ?>
                                                        <div class="tea_product_group_item tea_product_group_1 slick-slide">
                                                            <div  class="product">
                                                                <article class="product-miniature js-product-miniature">
                                                                    <div class="thumbnail-container">
                                                                        <a href="<?php echo esc_url($dca['link_ca']); ?>" class="thumbnail product-thumbnail">
                                                                            <img class="ls-is-cached lazyloaded" data-src="<?php echo esc_url($dca['image_ca_0'][0]); ?>" src="<?php echo esc_url($dca['image_ca_0'][0]); ?>" alt="<?php echo ($dca['title_ca']); ?>" data-full-size-image-url="<?php echo esc_url($dca['image_ca_0'][0]); ?>">
                                                                            <img class="fade replace-2x img-responsive ybc_img_hover" src="<?php echo esc_url($dca['image_ca_1'][0]); ?>" alt="<?php echo ($dca['title_ca']); ?>"  title="<?php echo ($dca['title_ca']); ?>">
                                                                        </a>
                                                                        <div class="product-description">
                                                                            <h3 class="h3 product-title"><a href="<?php echo esc_url($dca['link_ca']); ?>"  title="<?php echo ($dca['title_ca']); ?>"><?php echo strlen($dca['title_ca']) > 30 ? mb_substr($dca['title_ca'],0,30,'utf-8')."..." : $dca['title_ca']; ?></a></h3>
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
                    <div class="tea_cat_group_cats group4 grid group_type_type1 align_content_left" >
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