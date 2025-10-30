<?php
/**
 * Product Card Template - Modern Tasarım
 * 
 * @package Entegrasyonum
 */

defined('ABSPATH') || exit;

global $product;

// Ürün boşsa veya görünür değilse çık
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<div <?php wc_product_class('bg-white border border-gray-200 rounded-xl overflow-hidden shadow-lg card-hover fade-in', $product); ?>>
    
    <!-- Product Image -->
    <div class="relative overflow-hidden h-64 bg-gray-100">
        <a href="<?php echo esc_url($product->get_permalink()); ?>" class="block h-full">
            <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover object-top transition-transform duration-300 hover:scale-105'));
            } else {
                echo wc_placeholder_img('medium', 'w-full h-full object-cover');
            }
            ?>
        </a>
        
        <?php
        // İndirim badge - Sağ üst
        if ($product->is_on_sale()) :
            echo '<span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold">İndirim</span>';
        endif;
        
        // Yeni ürün badge - Sol üst
        $created_date = $product->get_date_created();
        if ($created_date && time() - $created_date->getTimestamp() < 30 * DAY_IN_SECONDS) :
            echo '<span class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold">Yeni</span>';
        endif;
        
        // Stok durumu - Stokta yoksa
        if (!$product->is_in_stock()) :
            echo '<span class="absolute top-4 left-4 bg-gray-800 text-white px-3 py-1 rounded-full text-xs font-semibold">Tükendi</span>';
        endif;
        ?>
    </div>
    
    <!-- Product Info -->
    <div class="p-6">
        
        <!-- Category -->
        <?php
        $categories = wc_get_product_category_list($product->get_id(), ', ');
        if ($categories) :
            ?>
            <div class="text-sm text-primary font-medium mb-2">
                <?php echo wp_kses_post($categories); ?>
            </div>
        <?php endif; ?>
        
        <!-- Product Title -->
        <h3 class="text-xl font-semibold text-secondary mb-3">
            <a href="<?php echo esc_url($product->get_permalink()); ?>" class="hover:text-primary transition-colors duration-300">
                <?php echo $product->get_name(); ?>
            </a>
        </h3>
        
        <!-- Rating -->
        <?php if ($product->get_average_rating()) : ?>
            <div class="flex items-center gap-2 mb-3">
                <div class="flex items-center text-yellow-400">
                    <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                </div>
                <span class="text-sm text-gray-500">(<?php echo $product->get_review_count(); ?> değerlendirme)</span>
            </div>
        <?php endif; ?>
        
        <!-- Short Description -->
        <?php if ($product->get_short_description()) : ?>
            <div class="text-gray-600 mb-4 text-sm leading-relaxed">
                <?php echo wp_trim_words($product->get_short_description(), 15); ?>
            </div>
        <?php endif; ?>
        
        <!-- Price -->
        <div class="mb-4">
            <span class="text-2xl font-bold text-primary">
                <?php echo $product->get_price_html(); ?>
            </span>
        </div>
        
        <!-- Add to Cart Button -->
        <?php
        // Custom add to cart button
        $button_text = $product->add_to_cart_text();
        $button_link = $product->add_to_cart_url();
        
        if ($product->is_purchasable() && $product->is_in_stock()) :
            ?>
            <a href="<?php echo esc_url($button_link); ?>" 
               class="block w-full bg-primary hover:bg-blue-700 text-white px-6 py-3 rounded-button font-semibold text-center transition-all duration-300 <?php echo esc_attr($product->get_type() === 'simple' ? 'add_to_cart_button ajax_add_to_cart' : ''); ?>"
               data-product_id="<?php echo esc_attr($product->get_id()); ?>"
               data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
               data-quantity="1">
                <i class="ri-shopping-cart-line mr-2"></i><?php echo esc_html($button_text); ?>
            </a>
        <?php else : ?>
            <a href="<?php echo esc_url($product->get_permalink()); ?>" 
               class="block w-full bg-gray-400 text-white px-6 py-3 rounded-button font-semibold text-center cursor-not-allowed">
                <?php echo esc_html($button_text); ?>
            </a>
        <?php endif; ?>
        
    </div>
    
</div>
