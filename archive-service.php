<?php
/**
 * Archive Template for Services - Hizmetler Arşiv Sayfası
 * 
 * @package Entegrasyonum
 */

get_header();

// Hizmetleri sıraya göre sırala
global $wp_query;
$wp_query->set('orderby', 'menu_order');
$wp_query->set('order', 'ASC');
?>

<!-- Services Archive Header -->
<section class="py-16 bg-gray-50" style="background: linear-gradient(135deg, #0A2540 0%, #122B55 100%);">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                <?php
                if (is_tax('service_category')) {
                    single_term_title();
                } else {
                    esc_html_e('Hizmetlerimiz', 'entegrasyonum');
                }
                ?>
            </h1>
            <p class="text-xl text-blue-100">
                <?php
                if (is_tax('service_category')) {
                    echo term_description();
                } else {
                    esc_html_e('Profesyonel entegrasyon hizmetlerimizi keşfedin ve işinizi bir üst seviyeye taşıyın', 'entegrasyonum');
                }
                ?>
            </p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <?php if (have_posts()) : ?>
            
            <!-- Filter by Category -->
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => true,
            ));
            
            if (!empty($terms) && !is_wp_error($terms)) :
                ?>
                <div class="mb-12 text-center">
                    <div class="inline-flex flex-wrap gap-2 p-2 bg-gray-100 rounded-lg">
                        <a href="<?php echo get_post_type_archive_link('service'); ?>" 
                           class="px-6 py-2 rounded-lg font-medium transition-all duration-300 <?php echo !is_tax() ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-200'; ?>">
                            <?php esc_html_e('Tümü', 'entegrasyonum'); ?>
                        </a>
                        <?php foreach ($terms as $term) : ?>
                            <a href="<?php echo get_term_link($term); ?>" 
                               class="px-6 py-2 rounded-lg font-medium transition-all duration-300 <?php echo is_tax('service_category', $term->slug) ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-200'; ?>">
                                <?php echo esc_html($term->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Services Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-lg card-hover fade-in">
                        
                        <!-- Service Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block overflow-hidden h-64">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover object-center transition-transform duration-300 hover:scale-105')); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>" class="block h-64 bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                                <i class="ri-tools-line text-6xl text-white opacity-50"></i>
                            </a>
                        <?php endif; ?>
                        
                        <!-- Service Content -->
                        <div class="p-6">
                            
                            <!-- Category -->
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'service_category');
                            if ($categories && !is_wp_error($categories)) :
                                ?>
                                <div class="text-sm text-primary font-medium mb-2">
                                    <?php
                                    $cat_names = array();
                                    foreach ($categories as $category) {
                                        $cat_names[] = $category->name;
                                    }
                                    echo implode(', ', $cat_names);
                                    ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Title -->
                            <h3 class="text-xl font-semibold text-secondary mb-3">
                                <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors duration-300">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <!-- Excerpt -->
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            
                            <!-- Read More Button -->
                            <a href="<?php the_permalink(); ?>" 
                               class="inline-flex items-center text-primary hover:text-secondary font-semibold transition-colors duration-300">
                                <?php esc_html_e('Detaylı Bilgi', 'entegrasyonum'); ?>
                                <i class="ri-arrow-right-line ml-2"></i>
                            </a>
                            
                        </div>
                        
                    </article>
                    
                <?php endwhile; ?>
                
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '<i class="ri-arrow-left-line"></i> ' . esc_html__('Önceki', 'entegrasyonum'),
                    'next_text' => esc_html__('Sonraki', 'entegrasyonum') . ' <i class="ri-arrow-right-line"></i>',
                    'class'     => 'pagination',
                ));
                ?>
            </div>
            
        <?php else : ?>
            
            <!-- No Services Found -->
            <div class="text-center py-16">
                <div class="mb-6">
                    <i class="ri-tools-line text-6xl text-gray-300"></i>
                </div>
                <h2 class="text-2xl font-bold text-secondary mb-4"><?php esc_html_e('Hizmet Bulunamadı', 'entegrasyonum'); ?></h2>
                <p class="text-gray-600 mb-8"><?php esc_html_e('Henüz bu kategoride hizmet bulunmamaktadır.', 'entegrasyonum'); ?></p>
                <a href="<?php echo esc_url(home_url('/')); ?>" 
                   class="inline-block bg-primary hover:bg-blue-700 text-white px-8 py-3 rounded-button font-semibold transition-all duration-300">
                    <?php esc_html_e('Ana Sayfaya Dön', 'entegrasyonum'); ?>
                </a>
            </div>
            
        <?php endif; ?>
        
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-secondary mb-4"><?php esc_html_e('Size Nasıl Yardımcı Olabiliriz?', 'entegrasyonum'); ?></h2>
        <p class="text-xl text-gray-600 mb-8">
            <?php esc_html_e('Hizmetlerimiz hakkında detaylı bilgi almak veya özel bir çözüm için bizimle iletişime geçin.', 'entegrasyonum'); ?>
        </p>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('iletisim'))); ?>" 
           class="inline-block bg-primary hover:bg-blue-700 text-white px-8 py-4 rounded-button font-semibold transition-all duration-300">
            <i class="ri-phone-line mr-2"></i><?php esc_html_e('İletişime Geçin', 'entegrasyonum'); ?>
        </a>
    </div>
</section>

<?php
get_footer();

