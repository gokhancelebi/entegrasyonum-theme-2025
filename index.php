<?php
/**
 * Main Template File
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1><?php bloginfo('name'); ?></h1>
        <?php entegrasyonum_breadcrumbs(); ?>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-wrapper">
            
            <div class="main-content">
                
                <!-- Blog Grid / Blog Kartları -->
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
                    // Pagination / Sayfalama
                    entegrasyonum_pagination();
                    ?>
                    
                <?php else : ?>
                    
                    <!-- No Content / İçerik Bulunamadı -->
                    <div class="no-content">
                        <h2><?php esc_html_e('İçerik Bulunamadı', 'entegrasyonum'); ?></h2>
                        <p><?php esc_html_e('Üzgünüz, aradığınız içerik bulunamadı.', 'entegrasyonum'); ?></p>
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

