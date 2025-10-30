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
            <div class="grid grid-cols-12 gap-4 items-center">
                
                <!-- Logo (Sol - 2 kolon) -->
                <div class="col-span-6 md:col-span-2">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="font-['Pacifico'] text-xl md:text-2xl" style="color: #0A2540;">
                            <?php bloginfo('name'); ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                
                <!-- Arama Çubuğu (Orta - Desktop: 4-5 kolon, Mobile: Gizli) -->
                <div class="hidden md:block md:col-span-4 lg:col-span-5">
                    <form role="search" method="get" class="header-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="relative">
                            <input type="search" 
                                   name="s" 
                                   value="<?php echo get_search_query(); ?>"
                                   placeholder="<?php esc_attr_e('Ürün, hizmet veya içerik ara...', 'entegrasyonum'); ?>" 
                                   class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300"
                                   aria-label="<?php esc_attr_e('Arama', 'entegrasyonum'); ?>">
                            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary transition-colors duration-300">
                                <i class="ri-search-line text-xl"></i>
                            </button>
                            <?php if (class_exists('WooCommerce')) : ?>
                                <input type="hidden" name="post_type" value="product">
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
                
                <!-- Sağ Taraf: Menü, Sepet, Mobil Toggle (5-6 kolon) -->
                <div class="col-span-6 md:col-span-6 lg:col-span-5 flex items-center justify-end space-x-4 lg:space-x-6">
                    
                    <!-- Navigation Menu (Desktop) -->
                    <nav class="hidden lg:flex items-center space-x-4 xl:space-x-6">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'flex items-center space-x-4 xl:space-x-6',
                                'container'      => false,
                                'fallback_cb'    => false,
                                'items_wrap'     => '%3$s',
                                'walker'         => new Entegrasyonum_Walker_Nav_Menu(),
                            ));
                        } else {
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-700 hover:text-primary hover:bg-gray-50 transition-all duration-300 font-medium text-sm whitespace-nowrap py-2 px-3 rounded-lg">Ana Sayfa</a>
                            
                            <?php if (post_type_exists('service')) : ?>
                                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="text-gray-700 hover:text-primary hover:bg-gray-50 transition-all duration-300 font-medium text-sm whitespace-nowrap py-2 px-3 rounded-lg">Hizmetler</a>
                            <?php endif; ?>
                            
                            <?php if (class_exists('WooCommerce')) : ?>
                                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="text-gray-700 hover:text-primary hover:bg-gray-50 transition-all duration-300 font-medium text-sm whitespace-nowrap py-2 px-3 rounded-lg">Ürünler</a>
                            <?php endif; ?>
                            
                            <?php if (get_option('page_for_posts')) : ?>
                                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="text-gray-700 hover:text-primary hover:bg-gray-50 transition-all duration-300 font-medium text-sm whitespace-nowrap py-2 px-3 rounded-lg">Blog</a>
                            <?php endif; ?>
                            
                            <a href="#contact" class="text-gray-700 hover:text-primary hover:bg-gray-50 transition-all duration-300 font-medium text-sm whitespace-nowrap py-2 px-3 rounded-lg">İletişim</a>
                            <?php
                        }
                        ?>
                    </nav>
                    
                    <!-- Arama İkonu (Mobil - Arama popup açar) -->
                    <button class="md:hidden search-toggle text-gray-700 hover:text-primary transition-colors duration-300">
                        <i class="ri-search-line text-2xl"></i>
                    </button>
                    
                    <!-- Hesabım (Account) -->
                    <div class="relative account-menu-wrapper hidden md:block">
                        <button class="account-toggle flex items-center gap-2 text-gray-700 hover:text-primary transition-colors duration-300 py-2 px-2 lg:px-3 rounded-lg hover:bg-gray-50">
                            <i class="ri-user-line text-xl lg:text-2xl"></i>
                            <div class="text-left hidden lg:block">
                                <?php if (is_user_logged_in()) : ?>
                                    <div class="text-xs text-gray-500 whitespace-nowrap">Hoşgeldin</div>
                                    <div class="text-sm font-semibold -mt-1 whitespace-nowrap"><?php echo wp_get_current_user()->display_name; ?></div>
                                <?php else : ?>
                                    <div class="text-xs text-gray-500 whitespace-nowrap leading-tight">Giriş Yap</div>
                                    <div class="text-[10px] font-medium -mt-0.5 text-gray-400 whitespace-nowrap">veya Üye Ol</div>
                                <?php endif; ?>
                            </div>
                            <i class="ri-arrow-down-s-line text-xs hidden lg:block"></i>
                        </button>
                        
                        <!-- Account Dropdown -->
                        <div class="account-dropdown hidden absolute right-0 top-full mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                            <?php if (is_user_logged_in()) : ?>
                                <div class="p-4 border-b border-gray-200">
                                    <div class="font-semibold text-secondary"><?php echo wp_get_current_user()->display_name; ?></div>
                                    <div class="text-xs text-gray-500"><?php echo wp_get_current_user()->user_email; ?></div>
                                </div>
                                <ul class="py-2">
                                    <?php if (class_exists('WooCommerce')) : ?>
                                        <li>
                                            <a href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-300">
                                                <i class="ri-dashboard-line mr-2"></i>Hesabım
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-300">
                                                <i class="ri-shopping-bag-line mr-2"></i>Siparişlerim
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-address')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-300">
                                                <i class="ri-map-pin-line mr-2"></i>Adreslerim
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-account')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-300">
                                                <i class="ri-settings-3-line mr-2"></i>Hesap Detayları
                                            </a>
                                        </li>
                                    <?php else : ?>
                                        <li>
                                            <a href="<?php echo esc_url(admin_url('profile.php')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors duration-300">
                                                <i class="ri-user-line mr-2"></i>Profilim
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="border-t border-gray-200 mt-2 pt-2">
                                        <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-300">
                                            <i class="ri-logout-box-line mr-2"></i>Çıkış Yap
                                        </a>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <div class="p-4">
                                    <?php if (class_exists('WooCommerce')) : ?>
                                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="block w-full bg-primary hover:bg-blue-700 text-white text-center px-4 py-2 rounded-lg font-semibold transition-all duration-300 mb-2">
                                            Giriş Yap
                                        </a>
                                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="block w-full border-2 border-primary text-primary hover:bg-primary hover:text-white text-center px-4 py-2 rounded-lg font-semibold transition-all duration-300">
                                            Üye Ol
                                        </a>
                                    <?php else : ?>
                                        <a href="<?php echo esc_url(wp_login_url()); ?>" class="block w-full bg-primary hover:bg-blue-700 text-white text-center px-4 py-2 rounded-lg font-semibold transition-all duration-300 mb-2">
                                            Giriş Yap
                                        </a>
                                        <a href="<?php echo esc_url(wp_registration_url()); ?>" class="block w-full border-2 border-primary text-primary hover:bg-primary hover:text-white text-center px-4 py-2 rounded-lg font-semibold transition-all duration-300">
                                            Üye Ol
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if (class_exists('WooCommerce')) : ?>
                                    <div class="border-t border-gray-200 p-4">
                                        <p class="text-xs text-gray-500 mb-2">Üye Ol, avantajlardan yararlan:</p>
                                        <ul class="text-xs text-gray-600 space-y-1">
                                            <li><i class="ri-check-line text-primary mr-1"></i>Siparişlerini takip et</li>
                                            <li><i class="ri-check-line text-primary mr-1"></i>Hızlı alışveriş yap</li>
                                            <li><i class="ri-check-line text-primary mr-1"></i>Kampanyalardan haberdar ol</li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Sepet İkonu (WooCommerce Aktifse) -->
                    <?php if (class_exists('WooCommerce')) : ?>
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="relative cart-icon flex items-center gap-2 text-gray-700 hover:text-primary transition-colors duration-300 py-2 px-2 lg:px-3 rounded-lg hover:bg-gray-50">
                            <i class="ri-shopping-cart-line text-xl lg:text-2xl"></i>
                            <div class="text-left hidden lg:block">
                                <div class="text-xs text-gray-500 whitespace-nowrap">Sepetim</div>
                                <div class="text-sm font-semibold -mt-1 whitespace-nowrap">
                                    <?php
                                    $cart_count = WC()->cart->get_cart_contents_count();
                                    echo $cart_count > 0 ? $cart_count . ' Ürün' : 'Boş';
                                    ?>
                                </div>
                            </div>
                            <?php if ($cart_count > 0) : ?>
                                <span class="cart-count absolute top-0 right-0 bg-primary text-white text-[10px] font-bold rounded-full w-5 h-5 flex items-center justify-center lg:hidden">
                                    <?php echo $cart_count; ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                    
                    <!-- Mobile Menu Toggle -->
                    <button class="lg:hidden mobile-menu-toggle text-gray-700 hover:text-primary transition-colors duration-300">
                        <i class="ri-menu-line text-2xl"></i>
                    </button>
                    
                </div>
                
            </div>
        </div>
    </header>
    
    <!-- Mobile Search Popup -->
    <div class="mobile-search-popup hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-secondary">Arama</h3>
                    <button class="search-close text-gray-500 hover:text-gray-700">
                        <i class="ri-close-line text-2xl"></i>
                    </button>
                </div>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="relative">
                        <input type="search" 
                               name="s" 
                               placeholder="<?php esc_attr_e('Ne aramak istersiniz?', 'entegrasyonum'); ?>" 
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               autofocus>
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                            <i class="ri-search-line"></i>
                        </button>
                        <?php if (class_exists('WooCommerce')) : ?>
                            <input type="hidden" name="post_type" value="product">
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden bg-white shadow-lg">
        <div class="px-6 py-4">
            
            <!-- Hesabım ve Sepet (Mobil) -->
            <div class="pb-4 mb-4 border-b border-gray-200">
                <div class="flex items-center justify-between gap-4">
                    <!-- Hesabım -->
                    <?php if (is_user_logged_in()) : ?>
                        <?php if (class_exists('WooCommerce')) : ?>
                            <a href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')); ?>" class="flex-1 flex items-center gap-2 text-gray-700 hover:text-primary transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                                <i class="ri-user-line text-2xl"></i>
                                <div class="text-left">
                                    <div class="text-xs text-gray-500">Hoşgeldin</div>
                                    <div class="text-sm font-semibold -mt-1"><?php echo wp_get_current_user()->display_name; ?></div>
                                </div>
                            </a>
                        <?php else : ?>
                            <a href="<?php echo esc_url(admin_url('profile.php')); ?>" class="flex-1 flex items-center gap-2 text-gray-700 hover:text-primary transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                                <i class="ri-user-line text-2xl"></i>
                                <span class="text-sm font-semibold">Profilim</span>
                            </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if (class_exists('WooCommerce')) : ?>
                            <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="flex-1 flex items-center gap-2 text-gray-700 hover:text-primary transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                                <i class="ri-user-line text-2xl"></i>
                                <div class="text-left">
                                    <div class="text-xs text-gray-500">Giriş Yap</div>
                                    <div class="text-sm font-semibold -mt-1">veya Üye Ol</div>
                                </div>
                            </a>
                        <?php else : ?>
                            <a href="<?php echo esc_url(wp_login_url()); ?>" class="flex-1 flex items-center gap-2 text-gray-700 hover:text-primary transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50">
                                <i class="ri-user-line text-2xl"></i>
                                <span class="text-sm font-semibold">Giriş Yap</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <!-- Sepet -->
                    <?php if (class_exists('WooCommerce')) : ?>
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="flex-1 flex items-center gap-2 text-gray-700 hover:text-primary transition-colors duration-300 py-2 px-3 rounded-lg hover:bg-gray-50 relative">
                            <i class="ri-shopping-cart-line text-2xl"></i>
                            <div class="text-left">
                                <div class="text-xs text-gray-500">Sepetim</div>
                                <div class="text-sm font-semibold -mt-1">
                                    <?php
                                    $cart_count = WC()->cart->get_cart_contents_count();
                                    echo $cart_count > 0 ? $cart_count . ' Ürün' : 'Boş';
                                    ?>
                                </div>
                            </div>
                            <?php if ($cart_count > 0) : ?>
                                <span class="cart-count absolute top-1 right-1 bg-primary text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                                    <?php echo $cart_count; ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Menü Linkleri -->
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
            
            <!-- Çıkış Yap (Giriş Yaptıysa) -->
            <?php if (is_user_logged_in()) : ?>
                <div class="pt-4 mt-4 border-t border-gray-200">
                    <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="flex items-center gap-2 text-red-600 hover:text-red-700 transition-colors duration-300 font-medium py-2">
                        <i class="ri-logout-box-line text-xl"></i>
                        Çıkış Yap
                    </a>
                </div>
            <?php endif; ?>
            
        </div>
    </div>

    <!-- Main Content -->
    <main id="main-content" class="site-content">
