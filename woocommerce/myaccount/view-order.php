<?php
/**
 * View Order
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.1.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>

<div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
	<div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
		<h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3 mb-0">
			<i class="ri-file-list-line text-primary"></i>
			<?php
			echo sprintf(
				/* translators: %s: Order number */
				esc_html__( 'Sipariş #%s', 'woocommerce' ),
				'<mark class="order-number text-primary">' . $order->get_order_number() . '</mark>'
			);
			?>
		</h2>
		<mark class="order-status <?php echo esc_attr( 'status-' . $order->get_status() ); ?>">
			<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
		</mark>
	</div>

	<div class="grid md:grid-cols-4 gap-4 mb-6 p-4 bg-gray-50 rounded-lg">
		<div>
			<p class="text-xs text-gray-500 mb-1">Tarih</p>
			<p class="font-semibold text-gray-900">
				<?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?>
			</p>
		</div>
		<div>
			<p class="text-xs text-gray-500 mb-1">Toplam</p>
			<p class="font-semibold text-gray-900">
				<?php
				/* translators: %s: Order total */
				echo wp_kses_post( sprintf( _n( '%1$s için %2$s ürün', '%1$s için %2$s ürün', $order->get_item_count(), 'woocommerce' ), $order->get_formatted_order_total(), $order->get_item_count() ) );
				?>
			</p>
		</div>
		<div>
			<p class="text-xs text-gray-500 mb-1">Ödeme Yöntemi</p>
			<p class="font-semibold text-gray-900">
				<?php echo esc_html( $order->get_payment_method_title() ); ?>
			</p>
		</div>
		<?php if ( $order->get_shipping_method() ) : ?>
			<div>
				<p class="text-xs text-gray-500 mb-1">Kargo</p>
				<p class="font-semibold text-gray-900">
					<?php echo esc_html( $order->get_shipping_method() ); ?>
				</p>
			</div>
		<?php endif; ?>
	</div>

	<?php
	/**
	 * Action hook fired before the order details.
	 *
	 * @since 4.4.0
	 * @param WC_Order $order Order object.
	 */
	do_action( 'woocommerce_before_order_details', $order );
	?>

	<section class="woocommerce-order-details mb-8">
		<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

		<h3 class="woocommerce-order-details__title text-xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
			<i class="ri-shopping-bag-line text-primary"></i>
			<?php esc_html_e( 'Sipariş detayları', 'woocommerce' ); ?>
		</h3>

		<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

			<thead>
				<tr>
					<th class="woocommerce-table__product-name product-name"><?php esc_html_e( 'Ürün', 'woocommerce' ); ?></th>
					<th class="woocommerce-table__product-table product-total"><?php esc_html_e( 'Toplam', 'woocommerce' ); ?></th>
				</tr>
			</thead>

			<tbody>
				<?php
				do_action( 'woocommerce_order_details_before_order_table_items', $order );

				foreach ( $order->get_items() as $item_id => $item ) {
					$product = $item->get_product();

					wc_get_template(
						'order/order-details-item.php',
						array(
							'order'              => $order,
							'item_id'            => $item_id,
							'item'               => $item,
							'show_purchase_note' => $show_purchase_note,
							'purchase_note'      => $product ? $product->get_purchase_note() : '',
							'product'            => $product,
						)
					);
				}

				do_action( 'woocommerce_order_details_after_order_table_items', $order );
				?>
			</tbody>

			<tfoot>
				<?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {
					?>
					<tr>
						<th scope="row"><?php echo esc_html( $total['label'] ); ?></th>
						<td><?php echo wp_kses_post( $total['value'] ); ?></td>
					</tr>
					<?php
				}
				?>
				<?php if ( $order->get_customer_note() ) : ?>
					<tr>
						<th><?php esc_html_e( 'Not:', 'woocommerce' ); ?></th>
						<td><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>
					</tr>
				<?php endif; ?>
			</tfoot>
		</table>

		<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
	</section>

	<?php
	/**
	 * Action hook fired after the order details.
	 *
	 * @since 4.4.0
	 * @param WC_Order $order Order object.
	 */
	do_action( 'woocommerce_after_order_details', $order );
	?>

	<?php if ( $notes ) : ?>
		<section class="woocommerce-order-notes mb-8">
			<h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
				<i class="ri-message-2-line text-primary"></i>
				<?php esc_html_e( 'Sipariş notları', 'woocommerce' ); ?>
			</h3>
			<ol class="woocommerce-OrderUpdates commentlist notes space-y-4">
				<?php foreach ( $notes as $note ) : ?>
					<li class="woocommerce-OrderUpdate comment note bg-blue-50 p-4 rounded-lg border-l-4 border-primary">
						<div class="woocommerce-OrderUpdate-inner comment_container">
							<div class="woocommerce-OrderUpdate-text comment-text">
								<p class="woocommerce-OrderUpdate-meta meta text-sm text-gray-600 mb-2">
									<i class="ri-time-line"></i>
									<time class="woocommerce-OrderUpdate-date" datetime="<?php echo esc_attr( $note->date_created->date( 'c' ) ); ?>">
										<?php echo esc_html( wc_format_datetime( $note->date_created, get_option( 'date_format' ) . ', ' . get_option( 'time_format' ) ) ); ?>
									</time>
								</p>
								<div class="woocommerce-OrderUpdate-description description text-gray-700">
									<?php echo wp_kses_post( wpautop( wptexturize( $note->content ) ) ); ?>
								</div>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</section>
	<?php endif; ?>

	<div class="flex items-center gap-3 pt-6 border-t border-gray-200">
		<a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>" class="button woocommerce-button">
			<i class="ri-arrow-left-line"></i>
			<?php esc_html_e( 'Siparişlere dön', 'woocommerce' ); ?>
		</a>
	</div>
</div>

