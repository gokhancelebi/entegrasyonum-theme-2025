<?php
/**
 * My Addresses
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Fatura adresi', 'woocommerce' ),
			'shipping' => __( 'Teslimat adresi', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Fatura adresi', 'woocommerce' ),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>

<div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
	<h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
		<i class="ri-map-pin-line text-primary"></i>
		<?php echo esc_html( apply_filters( 'woocommerce_my_account_my_address_description', __( 'Adreslerim', 'woocommerce' ) ) ); ?>
	</h2>

	<div class="woocommerce-Addresses grid md:grid-cols-2 gap-6">
		<?php foreach ( $get_addresses as $name => $address_title ) : ?>
			<?php
				$address = wc_get_account_formatted_address( $name );
				$col     = $col * -1;
				$oldcol  = $col;
				$icon    = ( 'billing' === $name ) ? 'ri-file-text-line' : 'ri-truck-line';
			?>

			<div class="woocommerce-Address">
				<header class="woocommerce-Address-title title mb-4 pb-3 border-b border-gray-200">
					<h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2 mb-0">
						<i class="<?php echo esc_attr( $icon ); ?> text-primary"></i>
						<?php echo esc_html( $address_title ); ?>
					</h3>
				</header>
				<address class="text-gray-700 leading-relaxed mb-4">
					<?php
					echo $address ? wp_kses_post( $address ) : esc_html_e( 'Henüz bu adresi eklemediniz.', 'woocommerce' );
					?>
				</address>
				<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="button woocommerce-button inline-flex">
					<i class="ri-edit-line"></i>
					<?php echo $address ? esc_html__( 'Düzenle', 'woocommerce' ) : esc_html__( 'Ekle', 'woocommerce' ); ?>
				</a>
			</div>

		<?php endforeach; ?>
	</div>
</div>

