<?php
/**
 * WooCommerce Template - Modern Tasarım
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<?php if (!is_product()) : ?>
<!-- WooCommerce Page Header -->
<?php 
// Light header for account and cart pages
$is_light_header = is_account_page() || is_cart() || is_checkout();
$header_bg = $is_light_header ? 'bg-gradient-to-r from-blue-50 to-indigo-50' : 'bg-gradient-to-r from-white to-gray-50';
$text_color = $is_light_header ? 'text-gray-900' : 'text-gray-900';
$subtitle_color = $is_light_header ? 'text-gray-600' : 'text-gray-700';
$breadcrumb_color = $is_light_header ? 'text-gray-500' : 'text-gray-600';
?>
<div class="py-12 <?php echo $header_bg; ?> border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="<?php echo is_account_page() || is_cart() || is_checkout() ? 'text-left' : 'text-center'; ?>">
            <?php if (is_shop()) : ?>
                <h1 class="text-3xl md:text-4xl font-bold mb-3 <?php echo $text_color; ?>"><?php woocommerce_page_title(); ?></h1>
                <p class="text-lg <?php echo $subtitle_color; ?>">Profesyonel entegrasyon hizmetlerimizi keşfedin</p>
            <?php elseif (is_product_category() || is_product_tag()) : ?>
                <h1 class="text-3xl md:text-4xl font-bold mb-3 <?php echo $text_color; ?>"><?php single_term_title(); ?></h1>
                <?php
                $term_description = term_description();
                if (!empty($term_description)) :
                    ?>
                    <div class="text-lg <?php echo $subtitle_color; ?>"><?php echo wp_kses_post($term_description); ?></div>
                <?php endif; ?>
            <?php elseif (is_account_page()) : ?>
                <h1 class="text-3xl md:text-4xl font-bold mb-3 <?php echo $text_color; ?>">Hesabım</h1>
                <p class="text-lg <?php echo $subtitle_color; ?>">Siparişlerinizi görüntüleyin ve hesap bilgilerinizi yönetin</p>
            <?php elseif (is_cart()) : ?>
                <h1 class="text-3xl md:text-4xl font-bold mb-3 <?php echo $text_color; ?>">Alışveriş Sepeti</h1>
                <p class="text-lg <?php echo $subtitle_color; ?>">Sepetinizdeki ürünleri gözden geçirin</p>
            <?php elseif (is_checkout()) : ?>
                <h1 class="text-3xl md:text-4xl font-bold mb-3 <?php echo $text_color; ?>">Ödeme</h1>
                <p class="text-lg <?php echo $subtitle_color; ?>">Siparişinizi tamamlayın</p>
            <?php else : ?>
                <h1 class="text-3xl md:text-4xl font-bold <?php echo $text_color; ?>"><?php the_title(); ?></h1>
            <?php endif; ?>
            
            <!-- Breadcrumbs -->
            <div class="mt-4">
                <?php woocommerce_breadcrumb(array(
                    'delimiter'   => ' <span class="' . $breadcrumb_color . ' mx-2">/</span> ',
                    'wrap_before' => '<nav class="' . $breadcrumb_color . ' text-sm">',
                    'wrap_after'  => '</nav>',
                    'before'      => '',
                    'after'       => '',
                    'home'        => _x('Ana Sayfa', 'breadcrumb', 'entegrasyonum'),
                )); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- WooCommerce Content -->
<div class="<?php echo is_product() ? 'py-0' : 'py-12'; ?> bg-white">
    <div class="max-w-7xl mx-auto <?php echo is_product() ? 'px-6 py-12' : 'px-6'; ?>">
        <?php if (is_account_page()) : ?>
            <!-- My Account Page - Own Layout -->
            <?php woocommerce_content(); ?>
        <?php elseif (!is_product()) : ?>
            <!-- Shop/Archive Pages with Sidebar -->
            <div class="grid lg:grid-cols-4 gap-8">
                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <?php if (is_active_sidebar('sidebar-shop')) : ?>
                        <div class="space-y-6">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    <?php else : ?>
                        <!-- Default Sidebar Content -->
                        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200">
                            <h3 class="text-lg font-semibold text-secondary mb-4 pb-3 border-b border-gray-200">
                                <i class="ri-filter-3-line mr-2"></i>Filtreler
                            </h3>
                            <p class="text-sm text-gray-600">
                                Filtreleri kullanmak için <strong>Görünüm → Widget'lar → Shop Sidebar</strong> alanına widget ekleyin.
                            </p>
                        </div>
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
