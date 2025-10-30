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
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex items-center space-x-8',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'items_wrap'     => '%3$s',
                        'walker'         => new Entegrasyonum_Walker_Nav_Menu(),
                    ));
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
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'flex flex-col space-y-4',
                'container'      => false,
                'fallback_cb'    => false,
            ));
            ?>
        </div>
    </div>

    <!-- Main Content -->
    <main id="main-content" class="site-content">
