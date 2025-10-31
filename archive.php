<?php
/**
 * Archive Template
 * Arşiv Şablonu (Kategori, Etiket, Tarih arşivleri)
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <?php
        the_archive_title('<h1>', '</h1>');
        the_archive_description('<p style="color: #6c757d; font-size: 1.1rem;">', '</p>');
        ?>
        <?php entegrasyonum_breadcrumbs(); ?>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-wrapper">
            
            <div class="main-content">
                
                <?php if (have_posts()) : ?>
                    
                    <div class="blog-grid">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', get_post_format());
                        endwhile;
                        ?>
                    </div>
                    
                    <?php
                    // Pagination
                    entegrasyonum_pagination();
                    ?>
                    
                <?php else : ?>
                    
                    <div class="no-content" style="text-align: center; padding: 4rem 2rem; background: #f8f9fa; border-radius: 8px;">
                        <i class="ri-inbox-line" style="font-size: 4rem; color: #dcdde1; margin-bottom: 1rem;"></i>
                        <h2><?php esc_html_e('İçerik Bulunamadı', 'entegrasyonum'); ?></h2>
                        <p><?php esc_html_e('Bu arşivde henüz içerik bulunmuyor.', 'entegrasyonum'); ?></p>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            <i class="ri-home-line"></i> <?php esc_html_e('Ana Sayfaya Dön', 'entegrasyonum'); ?>
                        </a>
                    </div>
                    
                <?php endif; ?>
                
            </div>
            
            <?php get_sidebar(); ?>
            
        </div>
    </div>
</div>

<?php
get_footer();

