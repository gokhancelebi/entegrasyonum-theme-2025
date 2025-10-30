<?php
/**
 * My Account Dashboard
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$current_user = wp_get_current_user();

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="woocommerce-MyAccount-dashboard-content bg-white rounded-lg shadow-md p-6 lg:p-8">
	<div class="mb-8">
		<h2 class="text-2xl font-bold text-gray-900 mb-2 flex items-center gap-3">
			<i class="ri-home-smile-line text-primary"></i>
			Dashboard
		</h2>
		<p class="text-gray-600">
			<?php
			printf(
				/* translators: 1: user display name 2: logout url */
				wp_kses( __( 'Merhaba %1$s (siz değilseniz <a href="%2$s">çıkış yapın</a>)', 'woocommerce' ), $allowed_html ),
				'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
				esc_url( wc_logout_url() )
			);
			?>
		</p>
	</div>

	<?php
	/* Translators: 1: Orders link 2: Address link 3: Account link. */
	$dashboard_desc = __( 'Hesap kontrol panelinizden <a href="%1$s">son siparişlerinizi</a> görüntüleyebilir, <a href="%2$s">teslimat ve fatura adreslerinizi</a> yönetebilir ve <a href="%3$s">şifreniz ile hesap detaylarınızı</a> düzenleyebilirsiniz.', 'woocommerce' );
	$dashboard_desc = sprintf( $dashboard_desc, esc_url( wc_get_endpoint_url( 'orders' ) ), esc_url( wc_get_endpoint_url( 'edit-address' ) ), esc_url( wc_get_endpoint_url( 'edit-account' ) ) );
	?>

	<div class="bg-blue-50 border-l-4 border-primary p-6 rounded-r-lg">
		<div class="flex items-start gap-3">
			<i class="ri-information-line text-primary text-xl mt-0.5"></i>
			<p class="text-gray-700 leading-relaxed m-0">
				<?php echo wp_kses( $dashboard_desc, $allowed_html ); ?>
			</p>
		</div>
	</div>

	<?php
		/**
		 * My Account dashboard.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_dashboard' );
	?>
</div>

