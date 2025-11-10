    </main><!-- #main-content -->

    <!-- Footer -->
    <footer class="bg-secondary text-white py-16" style="background-color: #0A2540;">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Footer Column 1 -->
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div>
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php elseif (has_nav_menu('footer')) : ?>
                    <div>
                        <?php
                        $footer_logo_id = get_theme_mod('footer_logo');
                        if ($footer_logo_id) {
                            $footer_logo_url = wp_get_attachment_image_url($footer_logo_id, 'full');
                            $footer_logo_alt = get_bloginfo('name');
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block mb-4">
                                <img src="<?php echo esc_url($footer_logo_url); ?>" 
                                     alt="<?php echo esc_attr($footer_logo_alt); ?>" 
                                     class="h-12 w-auto">
                            </a>
                            <?php
                        } else {
                            ?>
                            <div class="font-['Pacifico'] text-2xl mb-4"><?php bloginfo('name'); ?></div>
                            <?php
                        }
                        ?>
                        <p class="text-blue-200 leading-relaxed mb-4">
                            <?php bloginfo('description'); ?>
                        </p>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'space-y-2 text-blue-200 mb-6',
                            'container'      => false,
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ));
                        ?>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-lg hover:bg-white/20 transition-colors duration-300">
                                <i class="ri-linkedin-line"></i>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-lg hover:bg-white/20 transition-colors duration-300">
                                <i class="ri-twitter-line"></i>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-lg hover:bg-white/20 transition-colors duration-300">
                                <i class="ri-github-line"></i>
                            </a>
                        </div>
                    </div>
                <?php else : ?>
                    <div>
                        <?php
                        $footer_logo_id = get_theme_mod('footer_logo');
                        if ($footer_logo_id) {
                            $footer_logo_url = wp_get_attachment_image_url($footer_logo_id, 'full');
                            $footer_logo_alt = get_bloginfo('name');
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block mb-4">
                                <img src="<?php echo esc_url($footer_logo_url); ?>" 
                                     alt="<?php echo esc_attr($footer_logo_alt); ?>" 
                                     class="h-12 w-auto">
                            </a>
                            <?php
                        } else {
                            ?>
                            <div class="font-['Pacifico'] text-2xl mb-4"><?php bloginfo('name'); ?></div>
                            <?php
                        }
                        ?>
                        <p class="text-blue-200 leading-relaxed mb-6">
                            <?php bloginfo('description'); ?>
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-lg hover:bg-white/20 transition-colors duration-300">
                                <i class="ri-linkedin-line"></i>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-lg hover:bg-white/20 transition-colors duration-300">
                                <i class="ri-twitter-line"></i>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-lg hover:bg-white/20 transition-colors duration-300">
                                <i class="ri-github-line"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Footer Column 2 -->
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div>
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php elseif (has_nav_menu('footer-services')) : ?>
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Hizmetler</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-services',
                            'menu_class'     => 'space-y-2 text-blue-200',
                            'container'      => false,
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    <div>
                        <h3 class="font-semibold text-lg mb-4"><?php esc_html_e('Hizmetler', 'entegrasyonum'); ?></h3>
                        <ul class="space-y-2 text-blue-200">
                            <li><a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('API Entegrasyonu', 'entegrasyonum'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('WooCommerce Çözümleri', 'entegrasyonum'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('XML İşleme', 'entegrasyonum'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('Özel Geliştirme', 'entegrasyonum'); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Footer Column 3 -->
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div>
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php elseif (has_nav_menu('footer-company')) : ?>
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Şirket</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-company',
                            'menu_class'     => 'space-y-2 text-blue-200',
                            'container'      => false,
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    <div>
                        <h3 class="font-semibold text-lg mb-4"><?php esc_html_e('Şirket', 'entegrasyonum'); ?></h3>
                        <ul class="space-y-2 text-blue-200">
                            <li><a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('Hakkımızda', 'entegrasyonum'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('Ekibimiz', 'entegrasyonum'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('Kariyer', 'entegrasyonum'); ?></a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('İletişim', 'entegrasyonum'); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Footer Column 4 -->
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <div>
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                <?php else : ?>
                    <div>
                        <h3 class="font-semibold text-lg mb-4"><?php esc_html_e('Bülten', 'entegrasyonum'); ?></h3>
                        <p class="text-blue-200 mb-4"><?php esc_html_e('En son içgörülerimiz ve entegrasyon ipuçlarımızdan haberdar olun.', 'entegrasyonum'); ?></p>
                        <div class="flex">
                            <input type="email" placeholder="<?php esc_attr_e('E-posta adresiniz', 'entegrasyonum'); ?>" class="flex-1 px-4 py-2 rounded-l-lg bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-primary">
                            <button class="bg-primary hover:bg-blue-700 px-6 py-2 rounded-r-lg transition-colors duration-300 whitespace-nowrap" style="background-color: #1D4ED8;">
                                <?php esc_html_e('Abone Ol', 'entegrasyonum'); ?>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="border-t border-white/20 pt-8 text-center text-blue-200">
                <p class="mb-2">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Tüm hakları saklıdır.', 'entegrasyonum'); ?></p>
                <?php if (has_nav_menu('footer-legal')) : ?>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-legal',
                        'menu_class'     => 'flex justify-center space-x-4 text-blue-200',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ));
                    ?>
                <?php else : ?>
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('Gizlilik Politikası', 'entegrasyonum'); ?></a>
                        <span>|</span>
                        <a href="#" class="hover:text-white transition-colors duration-300"><?php esc_html_e('Hizmet Şartları', 'entegrasyonum'); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<!-- WhatsApp Floating Button -->
<div class="fixed bottom-6 right-6 z-50">
    <!-- 
    <a href="https://wa.me/905448091065" class="w-14 h-14 flex items-center justify-center bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300">
        <i class="ri-whatsapp-line text-2xl"></i>
    </a>
                -->
</div>

<?php wp_footer(); ?>

</body>
</html>
