<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'List Sản phẩm theo category','crismaster'),
        'base' => 'san_pham_theo_cate',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Nhập ID danh mục sản phẩm mà bạn muốn show ','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Nhập số sản phẩm muốn hiện','crismaster'),
                'param_name' => 'number',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'checkbox',
                'heading' => __('Hoặc Show tất cả sản phẩm của ID danh mục này', 'crismaster' ),
                'param_name' => 'check_all',
                'value' => '',
                'description' =>''
            ),
        )
    ));
}
add_shortcode('san_pham_theo_cate','san_pham_theo_cate_func');
function san_pham_theo_cate_func($atts,$content = null){
    extract(shortcode_atts(array(
        'number' => '',
        'ids' => '',
        'check_all' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>

    <div id="content-wrapper" class="">
        <section id="main">
            <section id="products">
                <div>
                    <div id="js-product-list">
                        <div class="products row">
                        <?php
                         if(isset($check_all) && $check_all = true && $check_all != '') {
                             $args = array(
                                 'post_type' => 'product',
                                 'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                                 'posts_per_page' => -1,
                                 'tax_query' => array(
                                     array(
                                         'taxonomy' => 'product_cat',
                                         'field'    => 'term_id',
                                         'terms'    => array($ids),
                                     ),
                                 ),
                                 'status' => 'approve',
                                 'post_status' => 'publish',
                             );
                         }else{
                             $args = array(
                                 'post_type' => 'product',
                                 'posts_per_page' => $number,
                                 'tax_query' => array(
                                     array(
                                         'taxonomy' => 'product_cat',
                                         'field'    => 'term_id',
                                         'terms'    => array($ids),
                                     ),
                                 ),
                                 'paged' => $paged,
                                 'status' => 'approve',
                                 'post_status' => 'publish',
                                 'order' => 'DESC',
                                 'orderby' => 'date'
                             );
                         }

                            $wp_query = new WP_Query($args);

                            if ($wp_query->have_posts()) {
                                while ($wp_query->have_posts()) {
                                    $wp_query->the_post();
                                    $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                    $product = wc_get_product( get_the_ID() );
                                    $price = $product->get_price_html();
                                    ?>
                                <div class="product">
                                <article class="product-miniature js-product-miniature" >
                                    <div class="thumbnail-container">
                                        <a href="<?php the_permalink(); ?>" class="thumbnail product-thumbnail">
                                            <img class="lazyload"  src="<?= esc_url($single_image[0]) ?>"  />
                                        </a>
                                        <div class="product-description">
                                            <h2 class="h3 product-title" ><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php echo (strlen(get_the_title()) > 30) ? mb_substr(get_the_title(),0,30,'utf-8')."..." : get_the_title(); ?></a></h2>
                                            <?php   if(isset($price) && $price != '') { ?>
                                                <span class="price_contact" aria-label="Giá"><?php echo ($price); ?></span>
                                            <?php }else{ ?>
                                                <span class="price_contact"><i class="fa-phone fa"></i> Giá liên hệ</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php }
                            wp_reset_postdata();
                        } ?>
                        </div>
                        <nav class="pagination">
                            <div class="col-md-4">
                            </div>

                            <div class="col-md-6 offset-md-2 pr-0">
                            </div>

                        </nav>
                    </div>
                </div>
            </section>
        </section>
    </div>

    <?php
    return ob_get_clean();
}
?>