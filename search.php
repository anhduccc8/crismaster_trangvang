<?php get_header(); ?>
    <section id="wrapper">
        <div class="container">
            <nav data-depth="2" class="breadcrumb hidden-sm-down">
                <?php
                global $paged;
                global $wp_query;
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
//                $search_query = new WP_Query( 's='.$s.'&paged='.$paged.'.&post_type=product&showposts=-1' );
                $wp_query = new WP_Query( array(
                        's' => $s,
                        'post_type' => 'product',
                        'paged' => $paged,
//                        'showposts' => -1,

                ) );
                $search_keyword =  $s;
                $search_count = $wp_query->post_count; ?>
                <ol>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>Trang chủ</span></a>
                    </li>

                    <li>
                        <span><?php echo esc_attr($search_count);?> <?php
                            printf( esc_html__(' kết quả tìm được cho: ', 'crismaster'));?><?php echo esc_attr($search_keyword)?></span>
                    </li>
                </ol>
            </nav>
            <div id="content-wrapper">
                <section class="products">
                    <section id="main">
                        <section id="products">
                            <div id="js-product-list">
                                <div class="products row">
                                    <?php if ( $wp_query->have_posts() ) : while ($wp_query->have_posts() ) : $wp_query->the_post();
                                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                        $product = wc_get_product( get_the_ID() );
                                        $price = $product->get_price_html();?>
                                        <div class="product">
                                            <article class="product-miniature js-product-miniature">
                                                <div class="thumbnail-container">
                                                    <a href="<?php the_permalink(); ?>" class="thumbnail product-thumbnail">
                                                        <img class=" lazyloaded"  src="<?= esc_url($single_image[0])?>" alt="<?php the_title() ?>">
                                                        <!--                                            <img class="fade replace-2x img-responsive ybc_img_hover">-->
                                                    </a>
                                                    <div class="product-description">
                                                        <h2 class="h3 product-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                                                        <?php   if(isset($price) && $price != '') { ?>
                                                            <span class="price_contact" aria-label="Giá"><?php echo ($price); ?></span>
                                                        <?php }else{ ?>
                                                            <span class="price_contact"><i class="fa-phone fa"></i> Giá liên hệ</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endwhile;endif;?>
                                </div>
                                <nav class="pagination">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-6 offset-md-2 pr-0">
                                        <ul class="page-list clearfix text-sm-center">
                                            <?php crismaster_pagination(); ?>
                                        </ul>
                                    </div>

                                </nav>
                            </div>
                        </section>
                    </section>
                </section>
            </div>
        </div>
    </section>
<?php get_footer(); ?>