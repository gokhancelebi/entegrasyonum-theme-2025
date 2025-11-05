<?php
/**
 * Checkout Form
 *
 * Keeps theme styling while following WooCommerce template structure.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_checkout_form', $checkout);

// Sepet boşsa
if (!WC()->cart->is_empty() && !WC()->cart->needs_payment()) {
    // Ödeme gerektirmeyen siparişler için
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <?php if ($checkout->get_checkout_fields()) : ?>

        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- Billing & Shipping Details -->
            <div class="lg:col-span-2">
                
                <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                <!-- Billing Details -->
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8 fade-in">
                    <h3 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                        <i class="ri-user-line mr-3 text-primary"></i>
                        Fatura Bilgileri
                    </h3>
                    
                    <?php do_action('woocommerce_checkout_billing'); ?>
                </div>

                <!-- Shipping Details -->
                <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                    
                    <div class="bg-white rounded-xl shadow-lg p-8 mb-8 fade-in">
                        <h3 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                            <i class="ri-truck-line mr-3 text-primary"></i>
                            Teslimat Bilgileri
                        </h3>
                        
                        <?php do_action('woocommerce_checkout_shipping'); ?>
                    </div>

                <?php endif; ?>

                <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                <!-- Additional Information -->
                <?php if (apply_filters('woocommerce_enable_order_notes_field', 'yes' === get_option('woocommerce_enable_order_comments', 'yes'))) : ?>
                    
                    <div class="bg-white rounded-xl shadow-lg p-8 fade-in">
                        <h3 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                            <i class="ri-file-text-line mr-3 text-primary"></i>
                            Ek Bilgiler
                        </h3>
                        
                        <?php foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>
                            <?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
                        <?php endforeach; ?>
                    </div>

                <?php endif; ?>
                
            </div>

            <!-- Order Review & Payment -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 rounded-xl shadow-lg p-6 sticky top-24 fade-in">
                    
                    <h3 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                        <i class="ri-shopping-cart-2-line mr-3 text-primary"></i>
                        Sipariş Özeti
                    </h3>

                    <?php do_action('woocommerce_checkout_before_order_review'); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action('woocommerce_checkout_order_review'); ?>
                    </div>

                    <?php do_action('woocommerce_checkout_after_order_review'); ?>

                </div>
            </div>

        </div>

    <?php endif; ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

