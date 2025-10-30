<?php
/**
 * Cart Page - Modern Tasarım
 * 
 * @package Entegrasyonum
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart');
?>

<div class="max-w-7xl mx-auto">
    <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
        
        <?php do_action('woocommerce_before_cart_table'); ?>

        <!-- Cart Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 fade-in">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-secondary">Ürün</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-secondary">Fiyat</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-secondary">Miktar</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-secondary">Toplam</th>
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                            ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                                
                                <!-- Product Info -->
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-20 h-20 flex-shrink-0 bg-gray-100 rounded-lg overflow-hidden">
                                            <?php
                                            $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('thumbnail'), $cart_item, $cart_item_key);
                                            if (!$product_permalink) {
                                                echo $thumbnail;
                                            } else {
                                                printf('<a href="%s" class="block">%s</a>', esc_url($product_permalink), $thumbnail);
                                            }
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            if (!$product_permalink) {
                                                echo '<div class="font-semibold text-secondary">' . wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '</div>';
                                            } else {
                                                echo '<a href="' . esc_url($product_permalink) . '" class="font-semibold text-secondary hover:text-primary transition-colors duration-200">' . wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '</a>';
                                            }

                                            do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                            // Meta data
                                            echo wc_get_formatted_cart_item_data($cart_item);

                                            // Backorder notification
                                            if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                                echo '<p class="text-sm text-yellow-600 mt-2">' . esc_html__('Ön siparişte mevcut', 'woocommerce') . '</p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-6 text-gray-700 font-medium">
                                    <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
                                </td>

                                <!-- Quantity -->
                                <td class="px-6 py-6 text-center">
                                    <?php
                                    if ($_product->is_sold_individually()) {
                                        $min_quantity = 1;
                                        $max_quantity = 1;
                                    } else {
                                        $min_quantity = 0;
                                        $max_quantity = $_product->get_max_purchase_quantity();
                                    }

                                    $product_quantity = woocommerce_quantity_input(
                                        array(
                                            'input_name'   => "cart[{$cart_item_key}][qty]",
                                            'input_value'  => $cart_item['quantity'],
                                            'max_value'    => $max_quantity,
                                            'min_value'    => $min_quantity,
                                            'product_name' => $_product->get_name(),
                                        ),
                                        $_product,
                                        false
                                    );

                                    echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                    ?>
                                </td>

                                <!-- Subtotal -->
                                <td class="px-6 py-6 text-right font-bold text-primary text-lg">
                                    <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                                </td>

                                <!-- Remove -->
                                <td class="px-6 py-6 text-center">
                                    <?php
                                    echo apply_filters(
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="text-red-500 hover:text-red-700 transition-colors duration-200" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="ri-delete-bin-line text-xl"></i></a>',
                                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                                            esc_attr__('Kaldır', 'woocommerce'),
                                            esc_attr($product_id),
                                            esc_attr($_product->get_sku())
                                        ),
                                        $cart_item_key
                                    );
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Cart Actions -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
            <div>
                <?php if (wc_coupons_enabled()) : ?>
                    <div class="flex gap-2">
                        <input type="text" name="coupon_code" class="px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:outline-none" placeholder="<?php esc_attr_e('Kupon kodu', 'woocommerce'); ?>" id="coupon_code" value="" />
                        <button type="submit" class="bg-secondary hover:bg-primary text-white px-6 py-3 rounded-button font-semibold transition-all duration-300" name="apply_coupon" value="<?php esc_attr_e('Kuponu uygula', 'woocommerce'); ?>">
                            <?php esc_html_e('Kuponu Uygula', 'woocommerce'); ?>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-secondary px-6 py-3 rounded-button font-semibold transition-all duration-300" name="update_cart" value="<?php esc_attr_e('Sepeti güncelle', 'woocommerce'); ?>">
                <i class="ri-refresh-line mr-2"></i><?php esc_html_e('Sepeti Güncelle', 'woocommerce'); ?>
            </button>
        </div>

        <?php do_action('woocommerce_cart_actions'); ?>
        <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
        
    </form>

    <!-- Cart Totals -->
    <div class="grid lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <?php do_action('woocommerce_before_cart_collaterals'); ?>
        </div>
        
        <div class="lg:col-span-1">
            <div class="bg-gray-50 rounded-xl p-6 shadow-lg sticky top-24 fade-in">
                <?php
                /**
                 * Cart collaterals hook
                 * - woocommerce_cart_totals - 10
                 */
                do_action('woocommerce_cart_collaterals');
                ?>
            </div>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_cart'); ?>

