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
                <?php else : ?>
                    <div>
                        <div class="font-['Pacifico'] text-2xl mb-4"><?php bloginfo('name'); ?></div>
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
                <?php else : ?>
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Hizmetler</h3>
                        <ul class="space-y-2 text-blue-200">
                            <li><a href="#" class="hover:text-white transition-colors duration-300">API Entegrasyonu</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">WooCommerce Çözümleri</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">XML İşleme</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Özel Geliştirme</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Footer Column 3 -->
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div>
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php else : ?>
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Şirket</h3>
                        <ul class="space-y-2 text-blue-200">
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Hakkımızda</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Ekibimiz</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Kariyer</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">İletişim</a></li>
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
                        <h3 class="font-semibold text-lg mb-4">Bülten</h3>
                        <p class="text-blue-200 mb-4">En son içgörülerimiz ve entegrasyon ipuçlarımızdan haberdar olun.</p>
                        <div class="flex">
                            <input type="email" placeholder="E-posta adresiniz" class="flex-1 px-4 py-2 rounded-l-lg bg-white/10 border border-white/20 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-primary">
                            <button class="bg-primary hover:bg-blue-700 px-6 py-2 rounded-r-lg transition-colors duration-300 whitespace-nowrap" style="background-color: #1D4ED8;">
                                Abone Ol
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="border-t border-white/20 pt-8 text-center text-blue-200">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tüm hakları saklıdır. | Gizlilik Politikası | Hizmet Şartları</p>
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
