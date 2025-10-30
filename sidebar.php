<?php
/**
 * Sidebar Template
 * 
 * @package Entegrasyonum
 */

// Sidebar yoksa gösterme
if (!is_active_sidebar('sidebar-1') && !is_active_sidebar('sidebar-shop')) {
    return;
}
?>

<aside id="secondary" class="sidebar">
    
    <?php
    // WooCommerce sayfalarında shop sidebar göster
    if (class_exists('WooCommerce') && (is_shop() || is_product_category() || is_product_tag() || is_product())) {
        if (is_active_sidebar('sidebar-shop')) {
            dynamic_sidebar('sidebar-shop');
        }
    } else {
        // Diğer sayfalarda blog sidebar göster
        if (is_active_sidebar('sidebar-1')) {
            dynamic_sidebar('sidebar-1');
        }
    }
    ?>
    
</aside>

