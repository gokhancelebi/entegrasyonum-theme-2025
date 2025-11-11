<?php
/**
 * Single Post Template
 * Tekil Yazı Şablonu
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
        <?php
        $is_full_width = entegrasyonum_is_full_width();
        $wrapper_class = $is_full_width ? 'content-wrapper-full' : 'content-wrapper';
        ?>
        <div class="<?php echo esc_attr($wrapper_class); ?>">
            
            <div class="main-content">
                
                <?php
                while (have_posts()) :
                    the_post();
                    
                    // Görüntülenme sayısını artır
                    entegrasyonum_set_post_views(get_the_ID());
                    ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                        
                        <!-- Post Header / Yazı Başlığı -->
                        <header class="single-post-header">
                            <h1 class="single-post-title"><?php the_title(); ?></h1>
                            
                            <div class="single-post-meta">
                                <span class="post-author">
                                    <i class="ri-user-line"></i>
                                    <?php the_author_posts_link(); ?>
                                </span>
                                <span class="post-date">
                                    <i class="ri-calendar-line"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="post-category">
                                    <i class="ri-folder-line"></i>
                                    <?php the_category(', '); ?>
                                </span>
                                <span class="post-comments">
                                    <i class="ri-chat-3-line"></i>
                                    <?php comments_number('0 Yorum', '1 Yorum', '% Yorum'); ?>
                                </span>
                                <span class="post-views">
                                    <i class="ri-eye-line"></i>
                                    <?php echo entegrasyonum_get_post_views(get_the_ID()); ?> Görüntülenme
                                </span>
                            </div>
                        </header>
                        
                        <!-- Post Thumbnail / Öne Çıkan Görsel -->
                        <?php if (has_post_thumbnail() && !entegrasyonum_hide_thumbnail()) : ?>
                            <div class="single-post-thumbnail" style="margin-bottom: 2rem;">
                                <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 8px;')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Post Content / Yazı İçeriği -->
                        <div class="single-post-content">
                            <?php
                            the_content();
                            
                            // Sayfa bağlantıları
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Sayfalar:', 'entegrasyonum'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                        
                        <!-- Post Footer / Yazı Alt Bölümü -->
                        <footer class="single-post-footer" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #dcdde1;">
                            
                            <?php if (has_tag()) : ?>
                                <div class="post-tags" style="margin-bottom: 1.5rem;">
                                    <i class="ri-price-tag-3-line"></i>
                                    <?php the_tags('', ', ', ''); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Social Share / Sosyal Medya Paylaşım -->
                            <div class="social-share" style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
                                <span style="font-weight: 600; color: #374151; margin-right: 8px;">Paylaş:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                                   target="_blank" 
                                   rel="noopener"
                                   style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; font-size: 14px; font-weight: 500; background-color: #1877F2; color: white; border-radius: 8px; text-decoration: none; transition: all 0.3s ease;"
                                   onmouseover="this.style.backgroundColor='#0C63D4'"
                                   onmouseout="this.style.backgroundColor='#1877F2'">
                                    <i class="ri-facebook-fill" style="font-size: 18px;"></i> Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                                   target="_blank" 
                                   rel="noopener"
                                   style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; font-size: 14px; font-weight: 500; background-color: #1DA1F2; color: white; border-radius: 8px; text-decoration: none; transition: all 0.3s ease;"
                                   onmouseover="this.style.backgroundColor='#0C8DD9'"
                                   onmouseout="this.style.backgroundColor='#1DA1F2'">
                                    <i class="ri-twitter-fill" style="font-size: 18px;"></i> Twitter
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" 
                                   target="_blank" 
                                   rel="noopener"
                                   style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; font-size: 14px; font-weight: 500; background-color: #0A66C2; color: white; border-radius: 8px; text-decoration: none; transition: all 0.3s ease;"
                                   onmouseover="this.style.backgroundColor='#084D93'"
                                   onmouseout="this.style.backgroundColor='#0A66C2'">
                                    <i class="ri-linkedin-fill" style="font-size: 18px;"></i> LinkedIn
                                </a>
                                <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" 
                                   target="_blank" 
                                   rel="noopener"
                                   style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; font-size: 14px; font-weight: 500; background-color: #25D366; color: white; border-radius: 8px; text-decoration: none; transition: all 0.3s ease;"
                                   onmouseover="this.style.backgroundColor='#1DA851'"
                                   onmouseout="this.style.backgroundColor='#25D366'">
                                    <i class="ri-whatsapp-line" style="font-size: 18px;"></i> WhatsApp
                                </a>
                            </div>
                            
                        </footer>
                        
                    </article>
                    
                    <!-- Post Navigation / Önceki/Sonraki Yazı -->
                    <nav class="post-navigation" style="display: flex; justify-content: space-between; margin: 3rem 0; padding: 1.5rem; background: #f8f9fa; border-radius: 8px;">
                        <div class="nav-previous">
                            <?php
                            $prev_post = get_previous_post();
                            if ($prev_post) :
                                ?>
                                <a href="<?php echo get_permalink($prev_post); ?>" rel="prev">
                                    <i class="ri-arrow-left-s-line"></i> 
                                    <strong>Önceki Yazı</strong><br>
                                    <span style="font-size: 14px; color: #6c757d;"><?php echo get_the_title($prev_post); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="nav-next" style="text-align: right;">
                            <?php
                            $next_post = get_next_post();
                            if ($next_post) :
                                ?>
                                <a href="<?php echo get_permalink($next_post); ?>" rel="next">
                                    <strong>Sonraki Yazı</strong>
                                    <i class="ri-arrow-right-s-line"></i><br>
                                    <span style="font-size: 14px; color: #6c757d;"><?php echo get_the_title($next_post); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </nav>
                    
                    <?php
                    // Yorumlar
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    
                endwhile;
                ?>
                
            </div>
            
            <?php if (!$is_full_width) : ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
            
        </div>
    </div>
</div>

<?php
get_footer();

