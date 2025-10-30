<?php
/**
 * Downloads
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_downloads', $has_downloads ); ?>

<div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
	<h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
		<i class="ri-download-line text-primary"></i>
		İndirilebilir Ürünler
	</h2>

	<?php if ( $has_downloads ) : ?>

		<table class="woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
			<thead>
				<tr>
					<?php foreach ( wc_get_account_downloads_columns() as $column_id => $column_name ) : ?>
						<th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
					<?php endforeach; ?>
				</tr>
			</thead>

			<tbody>
				<?php foreach ( $downloads as $download ) : ?>
					<tr>
						<?php foreach ( wc_get_account_downloads_columns() as $column_id => $column_name ) : ?>
							<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
								<?php
								if ( has_action( 'woocommerce_account_downloads_column_' . $column_id ) ) {
									do_action( 'woocommerce_account_downloads_column_' . $column_id, $download );
								} else {
									switch ( $column_id ) {
										case 'download-product':
											?>
											<a href="<?php echo esc_url( get_permalink( $download['product_id'] ) ); ?>" class="font-semibold text-primary hover:text-blue-700">
												<?php echo esc_html( $download['product_name'] ); ?>
											</a>
											<?php
											break;
										case 'download-file':
											?>
											<a href="<?php echo esc_url( $download['download_url'] ); ?>" class="woocommerce-MyAccount-downloads-file button alt inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700">
												<i class="ri-download-cloud-line"></i>
												<?php echo esc_html( $download['download_name'] ); ?>
											</a>
											<?php
											break;
										case 'download-remaining':
											?>
											<span class="inline-flex items-center gap-1">
												<i class="ri-stack-line text-primary"></i>
												<?php echo is_numeric( $download['downloads_remaining'] ) ? esc_html( $download['downloads_remaining'] ) : esc_html__( 'Sınırsız', 'woocommerce' ); ?>
											</span>
											<?php
											break;
										case 'download-expires':
											if ( ! empty( $download['access_expires'] ) ) {
												?>
												<time datetime="<?php echo esc_attr( gmdate( 'Y-m-d', strtotime( $download['access_expires'] ) ) ); ?>" title="<?php echo esc_attr( strtotime( $download['access_expires'] ) ); ?>">
													<i class="ri-calendar-line text-gray-500 mr-1"></i>
													<?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $download['access_expires'] ) ) ); ?>
												</time>
												<?php
											} else {
												esc_html_e( 'Asla', 'woocommerce' );
											}
											break;
									}
								}
								?>
							</td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	<?php else : ?>
		<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
			<i class="ri-inbox-line"></i>
			<?php esc_html_e( 'İndirilebilir ürününüz bulunmamaktadır.', 'woocommerce' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php do_action( 'woocommerce_after_account_downloads', $has_downloads ); ?>

