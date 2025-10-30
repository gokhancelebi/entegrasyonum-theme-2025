<?php
/**
 * Page Template
 * Sayfa Şablonu
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php entegrasyonum_breadcrumbs(); ?>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-wrapper full-width">
            
            <div class="main-content">
                
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="page-thumbnail">
                                <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 8px; margin-bottom: 2rem;')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="page-content">
                            <?php
                            the_content();
                            
                            // Sayfa bağlantıları (<!--nextpage--> için)
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Sayfalar:', 'entegrasyonum'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                        
                    </article>
                    
                    <?php
                    // Yorumlar açıksa göster
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    
                endwhile;
                ?>
                
            </div>
            
        </div>
    </div>
</div>

<?php
get_footer();

