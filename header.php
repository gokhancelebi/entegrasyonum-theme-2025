<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    
    <!-- Header Section -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="font-['Pacifico'] text-2xl text-secondary">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="font-['Pacifico'] text-2xl" style="color: #0A2540;">
                            <?php bloginfo('name'); ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                
                <!-- Navigation Menu (Desktop) -->
                <nav class="hidden md:flex items-center space-x-8">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'flex items-center space-x-8',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'items_wrap'     => '%3$s',
                            'walker'         => new Entegrasyonum_Walker_Nav_Menu(),
                        ));
                    } else {
                        // Menü yoksa otomatik linkler göster
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium">Ana Sayfa</a>
                        
                        <?php if (post_type_exists('service')) : ?>
                            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium">Hizmetler</a>
                        <?php endif; ?>
                        
                        <?php if (class_exists('WooCommerce')) : ?>
                            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium">Ürünler</a>
                        <?php endif; ?>
                        
                        <?php if (get_option('page_for_posts')) : ?>
                            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium">Blog</a>
                        <?php endif; ?>
                        
                        <a href="#contact" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium">İletişim</a>
                        <?php
                    }
                    ?>
                </nav>
                
                <!-- Mobile Menu Toggle -->
                <button class="md:hidden mobile-menu-toggle w-8 h-8 flex items-center justify-center">
                    <i class="ri-menu-line text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden bg-white shadow-lg">
        <div class="px-6 py-4">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'flex flex-col space-y-4',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
            } else {
                // Menü yoksa otomatik linkler göster
                ?>
                <div class="flex flex-col space-y-4">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium py-2">Ana Sayfa</a>
                    
                    <?php if (post_type_exists('service')) : ?>
                        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium py-2">Hizmetler</a>
                    <?php endif; ?>
                    
                    <?php if (class_exists('WooCommerce')) : ?>
                        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium py-2">Ürünler</a>
                    <?php endif; ?>
                    
                    <?php if (get_option('page_for_posts')) : ?>
                        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium py-2">Blog</a>
                    <?php endif; ?>
                    
                    <a href="#contact" class="text-gray-700 hover:text-primary transition-colors duration-300 font-medium py-2">İletişim</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- Main Content -->
    <main id="main-content" class="site-content">
