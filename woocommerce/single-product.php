<?php
/**
 * Single Product Template - Modern Tasarım
 *
 * @package Entegrasyonum
 * @version 1.6.4
 */

defined('ABSPATH') || exit;

?>

<?php while (have_posts()) : ?>
    <?php the_post(); ?>

    <?php
    /**
     * Hook: woocommerce_before_single_product
     */
    do_action('woocommerce_before_single_product');
    ?>

    <!-- Breadcrumb for Single Product -->
    <div class="bg-gray-50 py-4 border-b border-gray-200">
        <?php woocommerce_breadcrumb(array(
            'delimiter'   => ' <span class="text-gray-400 mx-2">/</span> ',
            'wrap_before' => '<nav class="text-gray-600 text-sm">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x('Ana Sayfa', 'breadcrumb', 'entegrasyonum'),
        )); ?>
    </div>

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
        
        <!-- Product Main Section -->
        <div class="grid lg:grid-cols-2 gap-12 mb-12">
            
            <!-- Product Images -->
            <div class="fade-in">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary
                 * - woocommerce_show_product_sale_flash - 10
                 * - woocommerce_show_product_images - 20
                 */
                do_action('woocommerce_before_single_product_summary');
                ?>
            </div>
            
            <!-- Product Summary -->
            <div class="fade-in">
                <div class="mb-4">
                    <?php
                    $categories = wc_get_product_category_list(get_the_ID(), ', ');
                    if ($categories) :
                        ?>
                        <div class="text-sm text-primary font-medium mb-2">
                            <?php echo wp_kses_post($categories); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                
                
                <?php
                /**
                 * Hook: woocommerce_single_product_summary
                 * - woocommerce_template_single_rating - 10
                 * - woocommerce_template_single_price - 10
                 * - woocommerce_template_single_excerpt - 20
                 * - woocommerce_template_single_add_to_cart - 30
                 * - woocommerce_template_single_meta - 40
                 * - woocommerce_template_single_sharing - 50
                 */
                do_action('woocommerce_single_product_summary');
                ?>
            </div>
            
        </div>
        
        <!-- Product Tabs / Description -->
        <div class="fade-in">
            <?php
            /**
             * Hook: woocommerce_after_single_product_summary
             * - woocommerce_output_product_data_tabs - 10
             * - woocommerce_upsell_display - 15
             * - woocommerce_output_related_products - 20
             */
            do_action('woocommerce_after_single_product_summary');
            ?>
        </div>
        
    </div>

    <?php do_action('woocommerce_after_single_product'); ?>

<?php endwhile; ?>

