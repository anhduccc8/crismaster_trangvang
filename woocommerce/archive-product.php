<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     5.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();

?>
    <section id="wrapper">
        <div id="content-wrapper">
            <?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action( 'woocommerce_before_main_content' );
            ?>
            <section id="main">
                <section id="content" class="page-home">
                    <div class="tea_content_body">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main container" >
                            <?php if ( have_posts() ) : ?>
                                <div class="before-loop-wrapper">
                                    <?php
                                    /**
                                     * woocommerce_before_shop_loop hook
                                     *
                                     * @hooked woocommerce_result_count - 20
                                     * @hooked woocommerce_catalog_ordering - 30
                                     */
                                    do_action( 'woocommerce_before_shop_loop' );
                                    ?>
                                </div>
                                <?php do_action( 'woocommerce_archive_description' ); ?>
                                <div class="after-loop-wrapper">
                                    <?php
                                    /**
                                     * woocommerce_after_shop_loop hook
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop' );
                                    ?>
                                </div>
                                <?php
                                global $woocommerce_loop;
                                ?>
                                <div class="woocommerce columns-<?php echo esc_attr($woocommerce_loop['columns']); ?>">
                                    <?php woocommerce_product_loop_start(); ?>
                                    <?php $woocommerce_loop['loop'] = 0; ?>
                                    <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <?php wc_get_template_part( 'content', 'product' ); ?>
                                        <?php endwhile; // end of the loop. ?>
                                    <?php endif;  ?>
                                    <?php woocommerce_product_loop_end(); ?>
                                </div>
                            <?php endif; ?>
                            </main>

                            <div class="after-loop-wrapper">
                                <?php
                                /**
                                 * woocommerce_after_shop_loop hook
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
            ?>
        </div>
    </section>
<?php get_footer(  ); ?>