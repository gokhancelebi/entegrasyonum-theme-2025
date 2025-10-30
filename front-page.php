<?php
/**
 * Front Page Template
 * Ana Sayfa Şablonu
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<!-- Hero Section / Hero Bölümü -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1><?php echo esc_html(get_theme_mod('hero_title', 'Entegrasyonum\'a Hoş Geldiniz')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('hero_description', 'Profesyonel entegrasyon hizmetleri ve çözümleri')); ?></p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">
                    <i class="fas fa-shopping-bag"></i> <?php esc_html_e('Hizmetlerimiz', 'entegrasyonum'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline">
                    <i class="fas fa-blog"></i> <?php esc_html_e('Blog', 'entegrasyonum'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products / Öne Çıkan Ürünler -->
<?php if (class_exists('WooCommerce')) : ?>
<section class="featured-products-section" style="padding: 4rem 0; background-color: #f8f9fa;">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 3rem;">
            <h2><?php esc_html_e('Öne Çıkan Hizmetler', 'entegrasyonum'); ?></h2>
            <p style="color: #6c757d; font-size: 1.1rem;">
                <?php esc_html_e('Sizin için seçtiğimiz en popüler hizmetlerimiz', 'entegrasyonum'); ?>
            </p>
        </div>
        
        <div class="products-grid">
            <?php
            // Öne çıkan ürünleri getir
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 6,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
            );
            
            $featured_query = new WP_Query($args);
            
            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) :
                    $featured_query->the_post();
                    wc_get_template_part('content', 'product');
                endwhile;
                wp_reset_postdata();
            else :
                // Öne çıkan ürün yoksa son ürünleri göster
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 6,
                );
                $products_query = new WP_Query($args);
                
                if ($products_query->have_posts()) :
                    while ($products_query->have_posts()) :
                        $products_query->the_post();
                        wc_get_template_part('content', 'product');
                    endwhile;
                    wp_reset_postdata();
                endif;
            endif;
            ?>
        </div>
        
        <div class="text-center" style="margin-top: 2rem;">
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">
                <?php esc_html_e('Tüm Hizmetleri Görüntüle', 'entegrasyonum'); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Latest Blog Posts / Son Blog Yazıları -->
<section class="latest-posts-section" style="padding: 4rem 0;">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 3rem;">
            <h2><?php esc_html_e('Son Blog Yazıları', 'entegrasyonum'); ?></h2>
            <p style="color: #6c757d; font-size: 1.1rem;">
                <?php esc_html_e('Sizin için hazırladığımız faydalı içerikler', 'entegrasyonum'); ?>
            </p>
        </div>
        
        <div class="blog-grid">
            <?php
            // Son blog yazılarını getir
            $blog_args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            );
            
            $blog_query = new WP_Query($blog_args);
            
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) :
                    $blog_query->the_post();
                    get_template_part('template-parts/content', get_post_format());
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        
        <div class="text-center" style="margin-top: 2rem;">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-secondary">
                <?php esc_html_e('Tüm Yazıları Görüntüle', 'entegrasyonum'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Call to Action / Harekete Geçirici Bölüm -->
<section class="cta-section" style="background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%); padding: 4rem 0; color: white; text-align: center;">
    <div class="container">
        <h2 style="color: white; font-size: 2.5rem; margin-bottom: 1rem;">
            <?php esc_html_e('Hemen Başlayın', 'entegrasyonum'); ?>
        </h2>
        <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
            <?php esc_html_e('Profesyonel entegrasyon hizmetlerimizle işinizi bir üst seviyeye taşıyın', 'entegrasyonum'); ?>
        </p>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('iletisim'))); ?>" class="btn btn-primary" style="background-color: white; color: #2c3e50;">
            <i class="fas fa-envelope"></i> <?php esc_html_e('İletişime Geçin', 'entegrasyonum'); ?>
        </a>
    </div>
</section>

<?php
get_footer();

