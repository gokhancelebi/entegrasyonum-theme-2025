<?php
/**
 * Product Archive Template - Modern Tasarım
 * 
 * @package Entegrasyonum
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content
 */
do_action('woocommerce_before_main_content');

?>

<?php if (woocommerce_product_loop()) : ?>

    <!-- Toolbar: Ordering & Result Count -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4 fade-in">
        <div class="text-gray-600">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop
             * - woocommerce_result_count - 20
             * - woocommerce_catalog_ordering - 30
             */
            woocommerce_result_count();
            ?>
        </div>
        <div>
            <?php woocommerce_catalog_ordering(); ?>
        </div>
    </div>

    <?php
    /**
     * Hook: woocommerce_before_shop_loop
     */
    do_action('woocommerce_before_shop_loop');
    ?>

    <!-- Products Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        
        <?php
        if (wc_get_loop_prop('total')) {
            while (have_posts()) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop
                 */
                do_action('woocommerce_shop_loop');

                wc_get_template_part('content', 'product');
            }
        }
        ?>
        
    </div>

    <?php
    /**
     * Hook: woocommerce_after_shop_loop
     * - woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
    ?>

<?php else : ?>

    <!-- No Products Found -->
    <div class="text-center py-16">
        <div class="mb-6">
            <i class="ri-shopping-bag-line text-6xl text-gray-300"></i>
        </div>
        <h2 class="text-2xl font-bold text-secondary mb-4">Ürün Bulunamadı</h2>
        <p class="text-gray-600 mb-8">Aradığınız kriterlere uygun ürün bulunamadı. Lütfen farklı bir arama yapın.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-primary hover:bg-blue-700 text-white px-8 py-3 rounded-button font-semibold transition-all duration-300">
            Ana Sayfaya Dön
        </a>
    </div>

<?php endif; ?>

<?php
/**
 * Hook: woocommerce_after_main_content
 */
do_action('woocommerce_after_main_content');

get_footer('shop');

