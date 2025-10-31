<?php
/**
 * Template part for displaying posts
 * 
 * @package Entegrasyonum
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    
    <!-- Post Thumbnail / Yazı Görseli -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('entegrasyonum-blog-thumb'); ?>
            </a>
            
            <?php
            // İlk kategoriyi göster
            $categories = get_the_category();
            if (!empty($categories)) :
                ?>
                <span class="post-category">
                    <?php echo esc_html($categories[0]->name); ?>
                </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <!-- Post Content / Yazı İçeriği -->
    <div class="post-content">
        
        <!-- Post Meta / Yazı Bilgileri -->
        <div class="post-meta">
            <span class="post-date">
                <i class="ri-calendar-line"></i>
                <?php echo get_the_date(); ?>
            </span>
            <span class="post-author">
                <i class="ri-user-line"></i>
                <?php the_author(); ?>
            </span>
            <span class="post-comments">
                <i class="ri-chat-3-line"></i>
                <?php comments_number('0', '1', '%'); ?>
            </span>
        </div>
        
        <!-- Post Title / Yazı Başlığı -->
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <!-- Post Excerpt / Yazı Özeti -->
        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <!-- Read More / Devamını Oku -->
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e('Devamını Oku', 'entegrasyonum'); ?>
            <i class="ri-arrow-right-line"></i>
        </a>
        
    </div>
    
</article>

