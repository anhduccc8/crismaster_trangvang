<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

    <div class="tea_sizeguide">
        <span class="size_guide">Hướng dẫn chọn kích thước</span>
        <div class="sizeguide_content">
            <h2 style="font-family:Roboto, sans-serif;font-size:18px;font-weight:400;margin:25px 0px 15px;text-align:center;background-color:#ffffff;">Hướng dẫn đo size nhẫn</h2>
            <div class="steps" style="font-family:Roboto, sans-serif;font-size:14px;padding:20px 25px 0px;background-color:#ffffff;">
                <div class="step step1">
                    <p style="margin:0px 0px 20px;padding:6px 0px;">1. Dùng dây đo quấn quanh khớp tay, đánh dấu vị trí cắt nhau</p>
                    <p style="margin:0px 0px 20px 30px;padding:6px 0px;width:120px;"><img class="image-lazyload" alt="1. Dùng dây đo quán quanh khớp tay, đánh dấu vị trí cắt nhau" src="<?= get_template_directory_uri() ?>/assets/img/do-duong-kinh.png" style="border:0px;height:auto;vertical-align:middle;font-size:0px;"></p>
                </div>
                <div class="step step2">
                    <p style="margin:0px 0px 20px;padding:6px 0px;">2. Dùng thước đo chiều dài của dây vừa đo được&nbsp;<i>(đơn vị cm)</i></p>
                    <p style="margin:0px 0px 20px 30px;padding:6px 0px;width:120px;"><img class="image-lazyload" alt="2. Dùng thước đo chiều dài của dây vừa đo được (đơn vị cm)" src="<?= get_template_directory_uri() ?>/assets/img/do-chieudai-cua-day.png" style="border:0px;height:auto;vertical-align:middle;font-size:0px;"></p>
                </div>
            </div>
        </div>
    </div>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-primary add-to-cart single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
			<span>Mua hàng</span>
			<span class="adc_small">Miễn phí giao hàng tận nhà hoặc nhận tại cửa hàng</span>
		</button>
		
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
