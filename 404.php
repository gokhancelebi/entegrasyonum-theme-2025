<?php
/**
 * 404 Error Page Template
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1><?php esc_html_e('404 - Sayfa Bulunamadı', 'entegrasyonum'); ?></h1>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-wrapper full-width">
            
            <div class="main-content">
                
                <div class="error-404" style="text-align: center; padding: 4rem 2rem;">
                    
                    <div class="error-icon" style="font-size: 8rem; color: #dcdde1; margin-bottom: 2rem;">
                        <i class="ri-error-warning-line"></i>
                    </div>
                    
                    <h2 style="font-size: 2rem; margin-bottom: 1rem;">
                        <?php esc_html_e('Üzgünüz, bu sayfa bulunamadı!', 'entegrasyonum'); ?>
                    </h2>
                    
                    <p style="font-size: 1.1rem; color: #6c757d; margin-bottom: 2rem;">
                        <?php esc_html_e('Aradığınız sayfa taşınmış, silinmiş veya hiç var olmamış olabilir.', 'entegrasyonum'); ?>
                    </p>
                    
                    <div class="error-actions" style="margin-bottom: 3rem;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            <i class="ri-home-line"></i> <?php esc_html_e('Ana Sayfaya Dön', 'entegrasyonum'); ?>
                        </a>
                        <?php if (class_exists('WooCommerce')) : ?>
                            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-secondary">
                                <i class="ri-shopping-bag-line"></i> <?php esc_html_e('Mağazayı Ziyaret Et', 'entegrasyonum'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="error-search" style="max-width: 600px; margin: 0 auto;">
                        <h3 style="margin-bottom: 1rem;"><?php esc_html_e('Arama Yap', 'entegrasyonum'); ?></h3>
                        <?php get_search_form(); ?>
                    </div>
                    
                </div>
                
                <!-- Popular Posts / Popüler Yazılar -->
                <?php
                $popular_posts = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'orderby'        => 'comment_count',
                    'order'          => 'DESC',
                ));
                
                if ($popular_posts->have_posts()) :
                    ?>
                    <div class="popular-posts" style="margin-top: 4rem;">
                        <h3 style="text-align: center; margin-bottom: 2rem;">
                            <?php esc_html_e('Popüler Yazılar', 'entegrasyonum'); ?>
                        </h3>
                        <div class="blog-grid">
                            <?php
                            while ($popular_posts->have_posts()) :
                                $popular_posts->the_post();
                                get_template_part('template-parts/content');
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
            
        </div>
    </div>
</div>

<?php
get_footer();

