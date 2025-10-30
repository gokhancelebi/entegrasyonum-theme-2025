<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    
    <!-- Header Section / Başlık Bölümü -->
    <header class="site-header" id="masthead">
        <div class="container">
            <div class="header-inner">
                
                <!-- Logo / Logo -->
                <div class="site-branding">
                    <?php
                    // Logo varsa göster, yoksa site adını göster
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                            <i class="fas fa-link"></i>
                            <?php bloginfo('name'); ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                
                <!-- Navigation / Navigasyon Menüsü -->
                <nav class="main-navigation" id="site-navigation">
                    <?php
                    // Ana menüyü göster
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'main-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ));
                    } else {
                        // Menü yoksa örnek menü göster
                        echo '<ul class="main-menu">';
                        echo '<li><a href="' . esc_url(home_url('/')) . '">Ana Sayfa</a></li>';
                        if (class_exists('WooCommerce')) {
                            echo '<li><a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '">Mağaza</a></li>';
                        }
                        echo '<li><a href="' . esc_url(get_permalink(get_option('page_for_posts'))) . '">Blog</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </nav>
                
                <!-- Header Actions / Başlık Aksiyonları -->
                <div class="header-actions">
                    <!-- Search Toggle / Arama Butonu -->
                    <button class="header-search-toggle" aria-label="<?php esc_attr_e('Arama', 'entegrasyonum'); ?>">
                        <i class="fas fa-search"></i>
                    </button>
                    
                    <!-- Cart Icon / Sepet İkonu (WooCommerce aktifse) -->
                    <?php if (class_exists('WooCommerce')) : ?>
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <?php
                            $cart_count = WC()->cart->get_cart_contents_count();
                            if ($cart_count > 0) :
                            ?>
                                <span class="cart-count"><?php echo esc_html($cart_count); ?></span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Mobile Menu Toggle / Mobil Menü Butonu -->
                <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Menü', 'entegrasyonum'); ?>">
                    <i class="fas fa-bars"></i>
                </button>
                
            </div>
            
            <!-- Search Form / Arama Formu -->
            <div class="header-search-form">
                <?php get_search_form(); ?>
            </div>
            
        </div>
    </header>

    <!-- Main Content / Ana İçerik -->
    <main id="main-content" class="site-content">

