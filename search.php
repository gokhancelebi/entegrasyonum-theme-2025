<?php
/**
 * Search Results Template
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1>
            <?php
            printf(
                esc_html__('Arama Sonuçları: %s', 'entegrasyonum'),
                '<span>' . get_search_query() . '</span>'
            );
            ?>
        </h1>
        <?php entegrasyonum_breadcrumbs(); ?>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-wrapper">
            
            <div class="main-content">
                
                <?php if (have_posts()) : ?>
                    
                    <p style="margin-bottom: 2rem; color: #6c757d;">
                        <?php
                        global $wp_query;
                        printf(
                            esc_html__('%s sonuç bulundu', 'entegrasyonum'),
                            '<strong>' . $wp_query->found_posts . '</strong>'
                        );
                        ?>
                    </p>
                    
                    <div class="blog-grid">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', 'search');
                        endwhile;
                        ?>
                    </div>
                    
                    <?php entegrasyonum_pagination(); ?>
                    
                <?php else : ?>
                    
                    <div class="no-content" style="text-align: center; padding: 4rem 2rem; background: #f8f9fa; border-radius: 8px;">
                        <i class="fas fa-search" style="font-size: 4rem; color: #dcdde1; margin-bottom: 1rem;"></i>
                        <h2><?php esc_html_e('Sonuç Bulunamadı', 'entegrasyonum'); ?></h2>
                        <p><?php esc_html_e('Aradığınız kriterlere uygun içerik bulunamadı. Lütfen farklı kelimeler deneyin.', 'entegrasyonum'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                    
                <?php endif; ?>
                
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</div>

<?php
get_footer();

