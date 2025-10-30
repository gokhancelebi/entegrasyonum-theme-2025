<?php
/**
 * Template part for displaying search results
 * 
 * @package Entegrasyonum
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('entegrasyonum-blog-thumb'); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="post-content">
        
        <div class="post-meta">
            <span class="post-type">
                <i class="ri-file-text-line"></i>
                <?php echo get_post_type(); ?>
            </span>
            <span class="post-date">
                <i class="ri-calendar-line"></i>
                <?php echo get_the_date(); ?>
            </span>
        </div>
        
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e('Görüntüle', 'entegrasyonum'); ?>
            <i class="ri-arrow-right-line"></i>
        </a>
        
    </div>
    
</article>

