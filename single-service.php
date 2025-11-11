<?php
/**
 * Single Service Template - Tekil Hizmet Sayfası
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<!-- Service Hero -->
<section class="py-16" style="background: linear-gradient(135deg, #0A2540 0%, #122B55 100%);">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-white">
            
            <!-- Category -->
            <?php
            $categories = get_the_terms(get_the_ID(), 'service_category');
            if ($categories && !is_wp_error($categories)) :
                ?>
                <div class="text-blue-200 mb-4">
                    <?php
                    foreach ($categories as $category) {
                        echo '<span class="inline-block bg-white/10 px-4 py-1 rounded-full text-sm font-medium mr-2">' . 
                             esc_html($category->name) . '</span>';
                    }
                    ?>
                </div>
            <?php endif; ?>
            
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php the_title(); ?></h1>
            
            <!-- Excerpt -->
            <?php if (has_excerpt()) : ?>
                <p class="text-xl text-blue-100 max-w-3xl">
                    <?php echo get_the_excerpt(); ?>
                </p>
            <?php endif; ?>
            
        </div>
    </div>
</section>

<!-- Service Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <?php 
        $is_full_width = entegrasyonum_is_full_width();
        $container_class = $is_full_width ? 'max-w-5xl mx-auto' : 'grid lg:grid-cols-3 gap-12';
        $content_class = $is_full_width ? '' : 'lg:col-span-2';
        ?>
        
        <div class="<?php echo esc_attr($container_class); ?>">
            
            <!-- Main Content -->
            <div class="<?php echo esc_attr($content_class); ?>">
        
                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Category Tags -->
                <?php if ($categories && !is_wp_error($categories)) : ?>
                    <div class="mb-6 flex flex-wrap gap-2">
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo get_term_link($category); ?>" 
                               class="inline-flex items-center bg-primary/10 text-primary hover:bg-primary hover:text-white px-4 py-2 rounded-full text-sm font-medium transition-all duration-300">
                                <i class="ri-folder-line mr-2"></i>
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Content - Gutenberg Blocks -->
                <div class="prose prose-lg max-w-none mb-12">
                    <?php the_content(); ?>
                </div>
                
                <!-- Service Features / Custom Fields -->
                <?php
                $features = get_post_meta(get_the_ID(), 'service_features', true);
                if (!empty($features)) :
                    ?>
                    <div class="mb-12 bg-gray-50 rounded-xl p-8">
                        <h3 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                            <i class="ri-check-double-line mr-3 text-primary"></i>
                            <?php esc_html_e('Hizmet Özellikleri', 'entegrasyonum'); ?>
                        </h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <?php
                            $features_array = explode("\n", $features);
                            foreach ($features_array as $feature) :
                                if (trim($feature)) :
                                    ?>
                                    <div class="flex items-start">
                                        <i class="ri-check-line text-primary mt-1 mr-2 flex-shrink-0"></i>
                                        <span class="text-gray-700"><?php echo esc_html(trim($feature)); ?></span>
                                    </div>
                                <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($is_full_width) : ?>
                    <!-- Contact CTA - Full Width Only -->
                    <div class="bg-gradient-to-r from-primary to-blue-700 rounded-xl p-8 text-white text-center">
                        <h3 class="text-3xl font-bold mb-4"><?php esc_html_e('Bu Hizmeti Mi Arıyorsunuz?', 'entegrasyonum'); ?></h3>
                        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                            <?php esc_html_e('Size özel bir teklif hazırlayalım. Hemen iletişime geçin!', 'entegrasyonum'); ?>
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('iletisim'))); ?>" 
                               class="inline-flex items-center bg-white hover:bg-gray-100 text-primary px-8 py-4 rounded-button font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                                <i class="ri-phone-line mr-2 text-xl"></i><?php esc_html_e('İletişime Geçin', 'entegrasyonum'); ?>
                            </a>
                            <a href="https://wa.me/905448091065?text=<?php echo urlencode(sprintf(__('Merhaba, %s hizmeti hakkında bilgi almak istiyorum.', 'entegrasyonum'), get_the_title())); ?>" 
                               class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-button font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl"
                               target="_blank">
                                <i class="ri-whatsapp-line mr-2 text-xl"></i><?php esc_html_e('WhatsApp ile Sor', 'entegrasyonum'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Meta Information -->
                <div class="mt-8 pt-8 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 text-sm text-gray-500">
                    <div class="flex items-center gap-6">
                        <div class="flex items-center">
                            <i class="ri-calendar-line mr-2"></i>
                            <span><?php esc_html_e('Yayın:', 'entegrasyonum'); ?> <?php echo get_the_date(); ?></span>
                        </div>
                        <div class="flex items-center">
                            <i class="ri-refresh-line mr-2"></i>
                            <span><?php esc_html_e('Güncelleme:', 'entegrasyonum'); ?> <?php echo get_the_modified_date(); ?></span>
                        </div>
                    </div>
                    
                    <!-- Social Share -->
                    <div class="flex items-center gap-2">
                        <span class="mr-2"><?php esc_html_e('Paylaş:', 'entegrasyonum'); ?></span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                           target="_blank"
                           class="w-10 h-10 flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-300">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                           target="_blank"
                           class="w-10 h-10 flex items-center justify-center bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-colors duration-300">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" 
                           target="_blank"
                           class="w-10 h-10 flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition-colors duration-300">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                    </div>
                </div>
                
            </div>
            
            <?php if (!$is_full_width) : ?>
                <!-- Sidebar (Sadece Full Width değilse göster) -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 h-fit flex flex-col gap-6">
                        
                        <!-- Contact Card -->
                        <div class="bg-white border border-gray-200 rounded-xl p-6">
                            <h3 class="text-2xl font-bold mb-4"><?php esc_html_e('Bu Hizmeti Mi Arıyorsunuz?', 'entegrasyonum'); ?></h3>
                            <p class="text-gray-600 mb-6">
                                <?php esc_html_e('Size özel bir teklif hazırlayalım. Hemen iletişime geçin!', 'entegrasyonum'); ?>
                            </p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('iletisim'))); ?>" 
                               class="block w-full bg-primary hover:bg-secondary text-white px-6 py-3 rounded-button font-semibold text-center transition-all duration-300 mb-4">
                                <i class="ri-phone-line mr-2"></i><?php esc_html_e('İletişime Geçin', 'entegrasyonum'); ?>
                            </a>
                            <a href="https://wa.me/905448091065?text=<?php echo urlencode(sprintf(__('Merhaba, %s hizmeti hakkında bilgi almak istiyorum.', 'entegrasyonum'), get_the_title())); ?>" 
                               class="block w-full bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-button font-semibold text-center transition-all duration-300"
                               target="_blank">
                                <i class="ri-whatsapp-line mr-2"></i><?php esc_html_e('WhatsApp ile Sor', 'entegrasyonum'); ?>
                            </a>
                        </div>
                        
                        <!-- Service Info -->
                        <div class="bg-white border border-gray-200 rounded-xl p-6">
                            <h4 class="font-bold text-secondary mb-4 flex items-center">
                                <i class="ri-information-line mr-2 text-primary"></i>
                                <?php esc_html_e('Hizmet Bilgileri', 'entegrasyonum'); ?>
                            </h4>
                            
                            <div class="space-y-3 text-sm">
                                <!-- Category -->
                                <?php if ($categories && !is_wp_error($categories)) : ?>
                                    <div class="flex items-start">
                                        <span class="text-gray-500 w-24 flex-shrink-0"><?php esc_html_e('Kategori:', 'entegrasyonum'); ?></span>
                                        <span class="text-secondary font-medium">
                                            <?php
                                            $cat_names = array();
                                            foreach ($categories as $category) {
                                                $cat_names[] = '<a href="' . get_term_link($category) . '" class="hover:text-primary">' . 
                                                              $category->name . '</a>';
                                            }
                                            echo implode(', ', $cat_names);
                                            ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Published Date -->
                                <div class="flex items-start">
                                    <span class="text-gray-500 w-24 flex-shrink-0"><?php esc_html_e('Yayın:', 'entegrasyonum'); ?></span>
                                    <span class="text-secondary"><?php echo get_the_date(); ?></span>
                                </div>
                                
                                <!-- Updated Date -->
                                <div class="flex items-start">
                                    <span class="text-gray-500 w-24 flex-shrink-0"><?php esc_html_e('Güncelleme:', 'entegrasyonum'); ?></span>
                                    <span class="text-secondary"><?php echo get_the_modified_date(); ?></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</section>

<!-- Related Services -->
<?php
$related_args = array(
    'post_type'      => 'service',
    'posts_per_page' => 3,
    'post__not_in'   => array(get_the_ID()),
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

// Aynı kategoriden hizmetler getir
if ($categories && !is_wp_error($categories)) {
    $category_ids = array();
    foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
    }
    $related_args['tax_query'] = array(
        array(
            'taxonomy' => 'service_category',
            'field'    => 'term_id',
            'terms'    => $category_ids,
        ),
    );
}

$related_query = new WP_Query($related_args);

if ($related_query->have_posts()) :
    ?>
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-secondary mb-8 text-center"><?php esc_html_e('İlgili Hizmetler', 'entegrasyonum'); ?></h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    
                    <article class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-lg card-hover">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block h-48 overflow-hidden">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover transition-transform duration-300 hover:scale-105')); ?>
                            </a>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-secondary mb-3">
                                <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors duration-300">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="text-gray-600 mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" 
                               class="inline-flex items-center text-primary hover:text-secondary font-semibold transition-colors duration-300">
                                <?php esc_html_e('Detaylı Bilgi', 'entegrasyonum'); ?>
                                <i class="ri-arrow-right-line ml-2"></i>
                            </a>
                        </div>
                        
                    </article>
                    
                <?php endwhile; wp_reset_postdata(); ?>
                
            </div>
        </div>
    </section>
<?php endif; ?>

<?php endwhile; ?>

<?php
get_footer();

