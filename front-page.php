<?php
/**
 * Front Page Template
 * Ana Sayfa Şablonu
 * 
 * @package Entegrasyonum
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-bg relative min-h-screen flex items-center overflow-hidden">
    <div class="particle-bg">
        <div class="particle" style="left: 10%; top: 20%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; top: 60%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 30%; top: 40%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 40%; top: 80%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 60%; top: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 70%; top: 70%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 80%; top: 50%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 90%; top: 20%; animation-delay: 7s;"></div>
    </div>
    <div class="w-full max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-white">
                <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    <?php echo esc_html(get_theme_mod('hero_title', 'Web Yazılıım Hizmetlerini')); ?> 
                    <span class="text-blue-400"><?php echo esc_html(get_theme_mod('hero_subtitle', 'Kolaylaştırdık')); ?></span>
                </h1>
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    <?php echo esc_html(get_theme_mod('hero_description', 'İşletmenizi dijitalleştirin ve verimliliği artırın.')); ?>
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#services" class="bg-primary hover:bg-blue-700 text-white px-8 py-4 rounded-button font-semibold transition-all duration-300 whitespace-nowrap text-center">
                        Hizmetleri Keşfet
                    </a>
                    <a href="#contact" class="border-2 border-white text-white hover:bg-white hover:text-secondary px-8 py-4 rounded-button font-semibold transition-all duration-300 whitespace-nowrap text-center">
                        İletişim
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <!-- 
                <img src="" 
                     alt="Digital Integration Services" 
                     class="w-full h-auto object-cover object-top rounded-xl">
                -->
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 fade-in">
            <h2 class="text-4xl font-bold text-secondary mb-4">Hizmetlerimiz</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                İş operasyonlarınızı kolaylaştırmak ve gelişmiş otomasyon teknolojileri ile verimliliği artırmak için tasarlanmış kapsamlı dijital entegrasyon çözümleri.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Hizmetleri getir
            $services_args = array(
                'post_type'      => 'service',
                'posts_per_page' => 6,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            );
            
            $services_query = new WP_Query($services_args);
            
            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) :
                    $services_query->the_post();
                    
                    // Icon meta field varsa kullan, yoksa default
                    $icon = get_post_meta(get_the_ID(), 'service_icon', true);
                    if (empty($icon)) {
                        $icon = 'ri-tools-line';
                    }
                    ?>
                    <div class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in">
                        <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-xl mb-6">
                            <i class="<?php echo esc_attr($icon); ?> text-2xl text-primary"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-secondary mb-4">
                            <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors duration-300">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" 
                           class="inline-flex items-center text-primary hover:text-secondary font-semibold transition-colors duration-300">
                            Detaylı Bilgi
                            <i class="ri-arrow-right-line ml-2"></i>
                        </a>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Hizmet yoksa varsayılan statik içerik göster
                ?>
                <div class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-xl mb-6">
                        <i class="ri-code-s-slash-line text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-4">API Entegrasyonu</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Güçlü API entegrasyon hizmetlerimizle farklı sistemleri ve uygulamaları sorunsuz bir şekilde bağlayın.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-xl mb-6">
                        <i class="ri-shopping-cart-line text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-4">WooCommerce Çözümleri</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Özel WooCommerce entegrasyonları, ödeme ağ geçitleri ve envanter yönetim sistemleri ile e-ticaret platformunuzu optimize edin.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-xl mb-6">
                        <i class="ri-file-code-line text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-4">XML Veri İşleme</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Otomatik ayrıştırma çözümlerimizle XML verilerini verimli bir şekilde dönüştürün ve işleyin.
                    </p>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if ($services_query->found_posts > 0) : ?>
            <div class="text-center mt-12">
                <a href="<?php echo get_post_type_archive_link('service'); ?>" 
                   class="inline-block bg-primary hover:bg-blue-700 text-white px-8 py-4 rounded-button font-semibold transition-all duration-300">
                    Tüm Hizmetleri Görüntüle
                </a>
            </div>
        <?php endif; ?>
        
    </div>
</section>

<!-- Featured Products -->
<?php if (class_exists('WooCommerce')) : ?>
<section id="products" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 fade-in">
            <h2 class="text-4xl font-bold text-secondary mb-4">Öne Çıkan Ürünler</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Entegrasyon projelerinizi hızlandırmak ve karmaşık otomasyon iş akışlarını kolaylaştırmak için tasarlanmış dijital ürün paketimizi keşfedin.
            </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Öne çıkan ürünleri getir
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 3,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
            );
            
            $featured_query = new WP_Query($args);
            
            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) :
                    $featured_query->the_post();
                    global $product;
                    ?>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-lg card-hover fade-in">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover object-top')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-secondary mb-3">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-gray-600 mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="bg-primary hover:bg-blue-700 text-white px-6 py-2 rounded-button font-medium transition-all duration-300 whitespace-nowrap inline-block">
                                Daha Fazla Bilgi
                            </a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" 
               class="inline-block bg-primary hover:bg-blue-700 text-white px-8 py-4 rounded-button font-semibold transition-all duration-300">
                <i class="ri-shopping-bag-line mr-2"></i>Tüm Ürünler
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- About Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold text-secondary mb-6">Entegrasyonum Hakkında</h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Farklı sistemleri birbirine bağlayan ve iş süreçlerini kolaylaştıran otomasyon çözümlerinde uzmanlaşmış lider bir dijital entegrasyon şirketiyiz. Uzmanlığımız API geliştirme, e-ticaret entegrasyonları ve veri işleme teknolojilerini kapsamaktadır.
                </p>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Kurumsal entegrasyon konusundaki yıllarca süren deneyimimizle, işletmelerin manuel çalışmayı azaltmalarına, veri silolarını ortadan kaldırmalarına ve büyümeyi ve verimliliği artıran sorunsuz dijital iş akışları oluşturmalarına yardımcı oluyoruz.
                </p>
                <div class="flex items-center space-x-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary">500+</div>
                        <div class="text-gray-600">Tamamlanan Proje</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary">150+</div>
                        <div class="text-gray-600">Mutlu Müşteri</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary">5+</div>
                        <div class="text-gray-600">Yıllık Deneyim</div>
                    </div>
                </div>
            </div>
            <div class="fade-in">
                <!-- 
                <img src="" 
                     alt="About Entegrasyonum" 
                     class="w-full h-auto object-cover object-top rounded-xl">
                -->
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 fade-in">
            <h2 class="text-4xl font-bold text-secondary mb-4">Neden Bizi Seçmelisiniz</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Teknik uzmanlık, kanıtlanmış metodolojiler ve müşteri başarısına olan bağlılığımızla desteklenen olağanüstü entegrasyon çözümleri sunuyoruz.
            </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-8 fade-in">
                <div class="w-20 h-20 flex items-center justify-center bg-primary/10 rounded-full mx-auto mb-6">
                    <i class="ri-rocket-line text-3xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">Hızlı Uygulama</h3>
                <p class="text-gray-600 leading-relaxed">
                    Minimum kesinti süresiyle entegrasyon çözümlerinin hızlı bir şekilde dağıtımı. Çevik yaklaşımımız, dijital dönüşüm projeleriniz için hızlı pazara çıkış süresi sağlar.
                </p>
            </div>
            <div class="text-center p-8 fade-in">
                <div class="w-20 h-20 flex items-center justify-center bg-primary/10 rounded-full mx-auto mb-6">
                    <i class="ri-shield-check-line text-3xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">Kurumsal Güvenlik</h3>
                <p class="text-gray-600 leading-relaxed">
                    Banka düzeyinde güvenlik protokolleri ve uyumluluk standartları, tüm entegrasyon süreçleri ve iş akışları boyunca verilerinizin korunmasını sağlar.
                </p>
            </div>
            <div class="text-center p-8 fade-in">
                <div class="w-20 h-20 flex items-center justify-center bg-primary/10 rounded-full mx-auto mb-6">
                    <i class="ri-customer-service-2-line text-3xl text-primary"></i>
                </div>
                <h3 class="text-xl font-semibold text-secondary mb-4">7/24 Destek</h3>
                <p class="text-gray-600 leading-relaxed">
                    Entegrasyonlarınızın her zaman sorunsuz ve verimli bir şekilde çalışmasını sağlamak için kesintisiz teknik destek ve izleme hizmetleri.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Blog Highlights -->
<section id="blog" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 fade-in">
            <h2 class="text-4xl font-bold text-secondary mb-4">Blog Öne Çıkanları</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                E-ticaret teknolojileri, entegrasyon en iyi uygulamaları ve dijital dönüşüm stratejileri hakkında en son görüşlerden haberdar olun.
            </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Son blog yazılarını getir
            $blog_args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            );
            
            $blog_query = new WP_Query($blog_args);
            
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) :
                    $blog_query->the_post();
                    ?>
                    <article class="bg-white rounded-xl overflow-hidden shadow-lg card-hover fade-in">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover object-top')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-6">
                            <div class="text-sm text-primary font-medium mb-2">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                }
                                ?>
                            </div>
                            <h3 class="text-xl font-semibold text-secondary mb-3">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-gray-600 mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            <div class="text-sm text-gray-500"><?php echo get_the_date(); ?></div>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        
        <?php if ($blog_query->found_posts > 0) : ?>
            <div class="text-center mt-12">
                <a href="/blog" 
                   class="inline-block bg-primary hover:bg-blue-700 text-white px-8 py-4 rounded-button font-semibold transition-all duration-300">
                    <i class="ri-article-line mr-2"></i>Tüm Yazılar
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16 fade-in">
            <h2 class="text-4xl font-bold text-secondary mb-4">İletişime Geçin</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                İşinizi dijital entegrasyon ile dönüştürmeye hazır mısınız? Proje gereksinimlerinizi görüşmek için bugün bizimle iletişime geçin.
            </p>
        </div>
        <div class="grid lg:grid-cols-2 gap-16">
            <div class="fade-in">
                <?php echo do_shortcode('[wpforms id="8"]'); ?>
            </div>
            <div class="fade-in">
                <div class="bg-gray-100 rounded-xl h-96 flex items-center justify-center" style="background-image: url('/wp-content/themes/entegrasyonum/map_placeholder_1280x720.png'); background-size: cover; background-position: center;">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="font-semibold text-secondary mb-2">Konumumuz</h3>
                        <p class="text-gray-600">İstanbul, Türkiye</p>
                    </div>
                </div>
                <div class="mt-8 space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-lg">
                            <i class="ri-mail-line text-primary"></i>
                        </div>
                        <div>
                            <div class="font-medium text-secondary">E-posta</div>
                            <div class="text-gray-600">info@entegrasyonum.com</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-lg">
                            <i class="ri-phone-line text-primary"></i>
                        </div>
                        <div>
                            <div class="font-medium text-secondary">Telefon</div>
                            <div class="text-gray-600">+90 544 809 1065</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
