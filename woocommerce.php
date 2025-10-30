<?php
/**
 * WooCommerce Template
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <?php if (is_shop()) : ?>
            <h1><?php woocommerce_page_title(); ?></h1>
        <?php elseif (is_product_category() || is_product_tag()) : ?>
            <h1><?php single_term_title(); ?></h1>
        <?php elseif (is_product()) : ?>
            <h1><?php the_title(); ?></h1>
        <?php else : ?>
            <h1><?php the_title(); ?></h1>
        <?php endif; ?>
        <?php entegrasyonum_breadcrumbs(); ?>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-wrapper <?php echo is_product() ? 'full-width' : ''; ?>">
            
            <div class="main-content">
                <?php woocommerce_content(); ?>
            </div>
            
            <?php
            // Tekil ürün sayfasında sidebar gösterme
            if (!is_product()) {
                get_sidebar();
            }
            ?>
            
        </div>
    </div>
</div>

<?php
get_footer();

