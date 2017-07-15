<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$g5plus_woocommerce_single = &G5Plus_Global::get_woocommerce_single();
$g5plus_woocommerce_loop = &G5Plus_Global::get_woocommerce_loop();
$g5plus_options = &G5Plus_Global::get_options();


$has_sidebar =  $g5plus_woocommerce_single['has_sidebar'];
$related_product_display_columns = 4;
if ($has_sidebar) {
	$related_product_display_columns = 3;
}

$related_product_display_columns = apply_filters('related_product_display_columns',$related_product_display_columns);

$g5plus_woocommerce_loop['rating'] = 0;
$g5plus_woocommerce_loop['columns'] = $related_product_display_columns;
$g5plus_woocommerce_loop['layout'] = 'slider';


if ( $cross_sells ) : ?>

	<div class="cross-sells">

		<h4 class="sc-title p-font"><span><?php esc_html_e( 'You may be interested in&hellip;', 'g5plus-megatron' ) ?></span></h4>

		<?php woocommerce_product_loop_start(); ?>

		<?php foreach ( $cross_sells as $cross_sell ) : ?>

			<?php
			$post_object = get_post( $cross_sell->get_id() );

			setup_postdata( $GLOBALS['post'] =& $post_object );

			wc_get_template_part( 'content', 'product' ); ?>

		<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
