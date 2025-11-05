<?php
/**
 * Edit address form
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Fatura adresi', 'woocommerce' ) : esc_html__( 'Teslimat adresi', 'woocommerce' );
$icon_class = ( 'billing' === $load_address ) ? 'ri-file-text-line' : 'ri-truck-line';

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
	<?php if ( ! $load_address ) : ?>
		<?php wc_get_template( 'myaccount/my-address.php' ); ?>
	<?php else : ?>

		<h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
			<i class="<?php echo esc_attr( $icon_class ); ?> text-primary"></i>
			<?php echo esc_html( $page_title ); ?>
		</h2>

		<form method="post">

			<div class="woocommerce-address-fields grid md:grid-cols-2 gap-6">
				<?php
				$fields = $address;

				foreach ( $fields as $key => $field ) {
					$field_name = $key;

					if ( is_callable( array( 'WC_Shortcode_My_Account', 'edit_address_i18n' ) ) ) {
						$field_name = WC_Shortcode_My_Account::edit_address_i18n( $field_name, $load_address, $address );
					}

					woocommerce_form_field( $field_name, $field, wc_get_post_data_by_key( $field_name, $field['value'] ) );
				}
				?>
			</div>

			<div class="mt-6">
				<p class="flex items-center gap-4">
					<button type="submit" class="woocommerce-Button button" name="save_address" value="<?php esc_attr_e( 'Adresi kaydet', 'woocommerce' ); ?>">
						<i class="ri-save-line"></i>
						<?php esc_html_e( 'Adresi kaydet', 'woocommerce' ); ?>
					</button>
					<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
					<input type="hidden" name="action" value="edit_address" />
				</p>
			</div>

		</form>

	<?php endif; ?>
</div>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>

