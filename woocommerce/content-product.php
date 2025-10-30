<?php
/**
 * The template for displaying product content within loops
 * 
 * @package Entegrasyonum
 */

defined('ABSPATH') || exit;

global $product;

// Ürün boşsa çık
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<div <?php wc_product_class('product-card', $product); ?>>
    
    <!-- Product Image / Ürün Görseli -->
    <div class="product-image">
        <a href="<?php echo esc_url($product->get_permalink()); ?>">
            <?php echo $product->get_image('entegrasyonum-product-thumb'); ?>
        </a>
        
        <?php
        // İndirim badge
        if ($product->is_on_sale()) :
            ?>
            <span class="product-badge sale">
                <?php esc_html_e('İndirim', 'entegrasyonum'); ?>
            </span>
            <?php
        endif;
        
        // Yeni ürün badge (son 30 gün)
        $created_date = $product->get_date_created();
        if ($created_date && time() - $created_date->getTimestamp() < 30 * DAY_IN_SECONDS) :
            ?>
            <span class="product-badge new" style="top: 15px; left: 15px; right: auto;">
                <?php esc_html_e('Yeni', 'entegrasyonum'); ?>
            </span>
        <?php endif; ?>
    </div>
    
    <!-- Product Info / Ürün Bilgileri -->
    <div class="product-info">
        
        <!-- Product Title / Ürün Başlığı -->
        <h3 class="product-title">
            <a href="<?php echo esc_url($product->get_permalink()); ?>">
                <?php echo $product->get_name(); ?>
            </a>
        </h3>
        
        <!-- Product Rating / Ürün Puanı -->
        <?php if ($product->get_average_rating()) : ?>
            <div class="product-rating">
                <?php echo wc_get_rating_html($product->get_average_rating()); ?>
                <span class="rating-count">(<?php echo $product->get_review_count(); ?>)</span>
            </div>
        <?php endif; ?>
        
        <!-- Product Price / Ürün Fiyatı -->
        <div class="product-price">
            <?php echo $product->get_price_html(); ?>
        </div>
        
        <!-- Product Excerpt / Ürün Kısa Açıklama -->
        <?php if ($product->get_short_description()) : ?>
            <div class="product-excerpt" style="font-size: 14px; color: #6c757d; margin-bottom: 1rem;">
                <?php echo wp_trim_words($product->get_short_description(), 10); ?>
            </div>
        <?php endif; ?>
        
        <!-- Add to Cart / Sepete Ekle -->
        <?php
        woocommerce_template_loop_add_to_cart();
        ?>
        
    </div>
    
</div>

