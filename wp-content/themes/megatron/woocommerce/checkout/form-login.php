<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

$info_message  = apply_filters( 'woocommerce_checkout_login_message', __( 'Returning customer?', 'g5plus-megatron' ) );
$info_message .= ' <a href="#" class="showlogin">' . __( 'Click here to login', 'g5plus-megatron' ) . '</a>';
//wc_print_notice( $info_message, 'notice' );
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
?>
<div class="col-md-6 col-xs-12 checkout-login margin-bottom-60">
	<div class="checkout-message">
		<?php echo wp_kses_post($info_message); ?>
	</div>
	<?php
	woocommerce_login_form(
		array(
			'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'g5plus-megatron' ),
			'redirect' => wc_get_page_permalink( 'checkout' ),
			'hidden'   => true,
		)
	);

	?>
</div>
