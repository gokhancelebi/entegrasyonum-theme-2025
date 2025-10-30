<?php
/**
 * WooCommerce Template - Modern Tasarım
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<!-- WooCommerce Page Header -->
<div class="py-16 bg-gray-50" style="background: linear-gradient(135deg, #0A2540 0%, #122B55 100%);">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center text-white">
            <?php if (is_shop()) : ?>
                <h1 class="text-4xl md:text-5xl font-bold mb-4"><?php woocommerce_page_title(); ?></h1>
                <p class="text-xl text-blue-100">Profesyonel entegrasyon hizmetlerimizi keşfedin</p>
            <?php elseif (is_product_category() || is_product_tag()) : ?>
                <h1 class="text-4xl md:text-5xl font-bold mb-4"><?php single_term_title(); ?></h1>
                <?php
                $term_description = term_description();
                if (!empty($term_description)) :
                    ?>
                    <div class="text-xl text-blue-100"><?php echo wp_kses_post($term_description); ?></div>
                <?php endif; ?>
            <?php elseif (is_product()) : ?>
                <h1 class="text-4xl md:text-5xl font-bold"><?php the_title(); ?></h1>
            <?php else : ?>
                <h1 class="text-4xl md:text-5xl font-bold"><?php the_title(); ?></h1>
            <?php endif; ?>
            
            <!-- Breadcrumbs -->
            <div class="mt-4">
                <?php woocommerce_breadcrumb(array(
                    'delimiter'   => ' <span class="text-blue-200 mx-2">/</span> ',
                    'wrap_before' => '<nav class="text-blue-200 text-sm">',
                    'wrap_after'  => '</nav>',
                    'before'      => '',
                    'after'       => '',
                    'home'        => _x('Ana Sayfa', 'breadcrumb', 'entegrasyonum'),
                )); ?>
            </div>
        </div>
    </div>
</div>

<!-- WooCommerce Content -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <?php if (!is_product()) : ?>
            <div class="grid lg:grid-cols-4 gap-8">
                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <?php if (is_active_sidebar('sidebar-shop')) : ?>
                        <?php dynamic_sidebar('sidebar-shop'); ?>
                    <?php endif; ?>
                </aside>
                
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <?php woocommerce_content(); ?>
                </div>
            </div>
        <?php else : ?>
            <!-- Single Product Full Width -->
            <?php woocommerce_content(); ?>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
