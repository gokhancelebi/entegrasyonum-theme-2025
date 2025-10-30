    </main><!-- #main-content -->

    <!-- Footer / Alt Bölüm -->
    <footer class="site-footer" id="colophon">
        <div class="container">
            
            <!-- Footer Widgets / Footer Widget Alanları -->
            <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || 
                      is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
                <div class="footer-widgets">
                    
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
            <?php endif; ?>
            
            <!-- Footer Bottom / Footer Alt Bölüm -->
            <div class="footer-bottom">
                <p>
                    &copy; <?php echo date('Y'); ?> 
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                    - <?php esc_html_e('Tüm hakları saklıdır.', 'entegrasyonum'); ?>
                </p>
                
                <?php
                // Footer menüsü varsa göster
                if (has_nav_menu('footer')) :
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => 'footer-menu',
                        'container'      => 'nav',
                        'container_class' => 'footer-navigation',
                        'depth'          => 1,
                    ));
                endif;
                ?>
                
                <p class="theme-credit">
                    <a href="https://entegrasyonum.com" target="_blank" rel="noopener">
                        Entegrasyonum
                    </a>
                </p>
            </div>
            
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

