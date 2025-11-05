<?php
/**
 * My Account navigation
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation bg-white rounded-lg shadow-md overflow-hidden">
	<div class="account-nav-header bg-gradient-to-r from-primary to-blue-600 text-white p-6">
		<div class="flex items-center gap-4">
			<div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
				<i class="ri-user-line text-3xl"></i>
			</div>
			<div>
				<h2 class="text-lg font-bold mb-1">Hesabım</h2>
				<p class="text-sm text-white/90"><?php echo esc_html( wp_get_current_user()->display_name ); ?></p>
			</div>
		</div>
	</div>
	
	<ul class="woocommerce-MyAccount-navigation-list list-none p-0 m-0">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?> border-b border-gray-100 last:border-0">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" 
				   class="flex items-center gap-3 px-6 py-4 text-gray-700 hover:bg-gray-50 hover:text-primary transition-all duration-300">
					<?php
					// Icon mapping for each menu item
					$icons = array(
						'dashboard'          => 'ri-dashboard-line',
						'orders'             => 'ri-file-list-line',
						'downloads'          => 'ri-download-line',
						'edit-address'       => 'ri-map-pin-line',
						'edit-account'       => 'ri-user-settings-line',
						'payment-methods'    => 'ri-bank-card-line',
						'customer-logout'    => 'ri-logout-box-line',
					);
					$icon_class = isset( $icons[ $endpoint ] ) ? $icons[ $endpoint ] : 'ri-arrow-right-s-line';
					?>
					<i class="<?php echo esc_attr( $icon_class ); ?> text-xl"></i>
					<span class="font-medium"><?php echo esc_html( $label ); ?></span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>

