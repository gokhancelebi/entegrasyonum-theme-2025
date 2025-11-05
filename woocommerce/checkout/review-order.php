<?php
/**
 * Review Order Table
 *
 * Keeps theme styling while following WooCommerce template structure.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>

<!-- Order Items -->
<div class="mb-6">
    <div class="space-y-4">
        <?php
        do_action('woocommerce_review_order_before_cart_contents');

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
                ?>
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <div class="flex items-center gap-3 flex-1">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                            <?php echo $_product->get_image('thumbnail'); ?>
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-secondary text-sm">
                                <?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)); ?>
                                <span class="text-gray-500">&times; <?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' ' . sprintf('%s', $cart_item['quantity']), $cart_item, $cart_item_key); ?></span>
                            </div>
                            <?php echo wc_get_formatted_cart_item_data($cart_item); ?>
                        </div>
                    </div>
                    <div class="font-bold text-primary">
                        <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                    </div>
                </div>
                <?php
            }
        }

        do_action('woocommerce_review_order_after_cart_contents');
        ?>
    </div>
</div>

<!-- Cart Totals -->
<div class="space-y-3 mb-6">
    
    <!-- Subtotal -->
    <div class="flex items-center justify-between text-gray-700">
        <span class="font-medium"><?php esc_html_e('Ara Toplam', 'woocommerce'); ?></span>
        <span class="font-semibold"><?php wc_cart_totals_subtotal_html(); ?></span>
    </div>

    <!-- Shipping -->
    <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
        <div class="flex items-center justify-between text-green-600">
            <span class="font-medium">
                <i class="ri-coupon-line mr-1"></i><?php wc_cart_totals_coupon_label($coupon); ?>
            </span>
            <span class="font-semibold"><?php wc_cart_totals_coupon_html($coupon); ?></span>
        </div>
    <?php endforeach; ?>

    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
        <?php do_action('woocommerce_review_order_before_shipping'); ?>
        <div class="flex items-center justify-between text-gray-700">
            <span class="font-medium"><?php esc_html_e('Kargo', 'woocommerce'); ?></span>
            <div class="text-right">
                <?php wc_cart_totals_shipping_html(); ?>
            </div>
        </div>
        <?php do_action('woocommerce_review_order_after_shipping'); ?>
    <?php endif; ?>

    <!-- Fees -->
    <?php foreach (WC()->cart->get_fees() as $fee) : ?>
        <div class="flex items-center justify-between text-gray-700">
            <span class="font-medium"><?php echo esc_html($fee->name); ?></span>
            <span class="font-semibold"><?php wc_cart_totals_fee_html($fee); ?></span>
        </div>
    <?php endforeach; ?>

    <!-- Tax -->
    <?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
        <?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
            <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
                <div class="flex items-center justify-between text-gray-700">
                    <span class="font-medium"><?php echo esc_html($tax->label); ?></span>
                    <span class="font-semibold"><?php echo wp_kses_post($tax->formatted_amount); ?></span>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="flex items-center justify-between text-gray-700">
                <span class="font-medium"><?php echo esc_html(WC()->countries->tax_or_vat()); ?></span>
                <span class="font-semibold"><?php wc_cart_totals_taxes_total_html(); ?></span>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php do_action('woocommerce_review_order_before_order_total'); ?>

    <!-- Total -->
    <div class="pt-4 border-t-2 border-gray-300">
        <div class="flex items-center justify-between text-lg">
            <span class="font-bold text-secondary"><?php esc_html_e('Toplam', 'woocommerce'); ?></span>
            <span class="font-bold text-primary text-2xl"><?php wc_cart_totals_order_total_html(); ?></span>
        </div>
    </div>

    <?php do_action('woocommerce_review_order_after_order_total'); ?>

</div>

<!-- Payment Methods -->
<div class="mb-6">
    <?php if (WC()->cart->needs_payment()) : ?>
        <div class="bg-white rounded-lg p-6 border-2 border-gray-200">
            <h4 class="font-bold text-secondary mb-4 flex items-center">
                <i class="ri-bank-card-line mr-2 text-primary"></i>
                Ödeme Yöntemi
            </h4>
            <?php do_action('woocommerce_review_order_before_payment'); ?>
            <div id="payment" class="woocommerce-checkout-payment">
                <?php woocommerce_checkout_payment(); ?>
            </div>
            <?php do_action('woocommerce_review_order_after_payment'); ?>
        </div>
    <?php endif; ?>
</div>

