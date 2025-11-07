<?php
/**
 * Entegrasyonum Theme Functions
 * 
 * @package Entegrasyonum
 * @since 1.0.0
 */

// Security check
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom Post Type - Hizmetler
 * Hizmetler için özel post type
 */
function entegrasyonum_register_services_post_type() {
    $labels = array(
        'name'                  => _x('Hizmetler', 'Post type genel adı', 'entegrasyonum'),
        'singular_name'         => _x('Hizmet', 'Post type tekil adı', 'entegrasyonum'),
        'menu_name'             => _x('Hizmetler', 'Admin menü', 'entegrasyonum'),
        'name_admin_bar'        => _x('Hizmet', 'Admin bar ekle', 'entegrasyonum'),
        'add_new'               => _x('Yeni Ekle', 'hizmet', 'entegrasyonum'),
        'add_new_item'          => __('Yeni Hizmet Ekle', 'entegrasyonum'),
        'new_item'              => __('Yeni Hizmet', 'entegrasyonum'),
        'edit_item'             => __('Hizmeti Düzenle', 'entegrasyonum'),
        'view_item'             => __('Hizmeti Görüntüle', 'entegrasyonum'),
        'all_items'             => __('Tüm Hizmetler', 'entegrasyonum'),
        'search_items'          => __('Hizmet Ara', 'entegrasyonum'),
        'parent_item_colon'     => __('Üst Hizmet:', 'entegrasyonum'),
        'not_found'             => __('Hizmet bulunamadı.', 'entegrasyonum'),
        'not_found_in_trash'    => __('Çöp kutusunda hizmet bulunamadı.', 'entegrasyonum'),
        'featured_image'        => _x('Hizmet Görseli', 'Overrides the "Featured Image" phrase', 'entegrasyonum'),
        'set_featured_image'    => _x('Hizmet görseli seç', 'Overrides the "Set featured image" phrase', 'entegrasyonum'),
        'remove_featured_image' => _x('Hizmet görselini kaldır', 'Overrides the "Remove featured image" phrase', 'entegrasyonum'),
        'use_featured_image'    => _x('Hizmet görseli olarak kullan', 'Overrides the "Use as featured image" phrase', 'entegrasyonum'),
        'archives'              => _x('Hizmet arşivleri', 'The post type archive label used in nav menus', 'entegrasyonum'),
        'insert_into_item'      => _x('Hizmete ekle', 'Overrides the "Insert into post"/"Insert into page" phrase', 'entegrasyonum'),
        'uploaded_to_this_item' => _x('Bu hizmete yüklendi', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase', 'entegrasyonum'),
        'filter_items_list'     => _x('Hizmet listesini filtrele', 'Screen reader text for the filter links', 'entegrasyonum'),
        'items_list_navigation' => _x('Hizmet listesi navigasyonu', 'Screen reader text for the pagination', 'entegrasyonum'),
        'items_list'            => _x('Hizmet listesi', 'Screen reader text for the items list', 'entegrasyonum'),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Şirket hizmetleri', 'entegrasyonum'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'hizmetler'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true, // Gutenberg desteği
    );

    register_post_type('service', $args);
}
add_action('init', 'entegrasyonum_register_services_post_type');

/**
 * Custom Taxonomy - Hizmet Kategorileri
 * Hizmetler için kategori taxonomy
 */
function entegrasyonum_register_service_taxonomy() {
    $labels = array(
        'name'                       => _x('Hizmet Kategorileri', 'taxonomy genel adı', 'entegrasyonum'),
        'singular_name'              => _x('Hizmet Kategorisi', 'taxonomy tekil adı', 'entegrasyonum'),
        'search_items'               => __('Kategori Ara', 'entegrasyonum'),
        'popular_items'              => __('Popüler Kategoriler', 'entegrasyonum'),
        'all_items'                  => __('Tüm Kategoriler', 'entegrasyonum'),
        'parent_item'                => __('Üst Kategori', 'entegrasyonum'),
        'parent_item_colon'          => __('Üst Kategori:', 'entegrasyonum'),
        'edit_item'                  => __('Kategoriyi Düzenle', 'entegrasyonum'),
        'update_item'                => __('Kategoriyi Güncelle', 'entegrasyonum'),
        'add_new_item'               => __('Yeni Kategori Ekle', 'entegrasyonum'),
        'new_item_name'              => __('Yeni Kategori Adı', 'entegrasyonum'),
        'separate_items_with_commas' => __('Kategorileri virgülle ayırın', 'entegrasyonum'),
        'add_or_remove_items'        => __('Kategori ekle veya kaldır', 'entegrasyonum'),
        'choose_from_most_used'      => __('En çok kullanılanlardan seç', 'entegrasyonum'),
        'not_found'                  => __('Kategori bulunamadı.', 'entegrasyonum'),
        'menu_name'                  => __('Kategoriler', 'entegrasyonum'),
    );

    $args = array(
        'hierarchical'          => true, // Kategoriler gibi (parent-child)
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'hizmet-kategorisi'),
        'show_in_rest'          => true,
    );

    register_taxonomy('service_category', array('service'), $args);
}
add_action('init', 'entegrasyonum_register_service_taxonomy');

/**
 * Theme Setup
 * Temel tema özelliklerini ve destekleri tanımla
 */
function entegrasyonum_setup() {
    // Çeviri desteği
    load_theme_textdomain('entegrasyonum', get_template_directory() . '/languages');
    
    // HTML5 desteği
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Otomatik feed linkleri
    add_theme_support('automatic-feed-links');
    
    // Title tag desteği
    add_theme_support('title-tag');
    
    // Post thumbnail (öne çıkan görsel) desteği
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 630, true);
    
    // Özel görsel boyutları
    add_image_size('entegrasyonum-blog-thumb', 800, 450, true);
    add_image_size('entegrasyonum-product-thumb', 600, 600, true);
    
    // WooCommerce desteği
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Özel logo desteği
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Menü konumları
    register_nav_menus(array(
        'primary'         => esc_html__('Ana Menü (Header)', 'entegrasyonum'),
        'footer'          => esc_html__('Footer Kolon 1 - Genel Linkler (Logo altında)', 'entegrasyonum'),
        'footer-services' => esc_html__('Footer Kolon 2 - Hizmetler Menüsü', 'entegrasyonum'),
        'footer-company'  => esc_html__('Footer Kolon 3 - Şirket Menüsü', 'entegrasyonum'),
        'footer-legal'    => esc_html__('Footer Alt Kısım - Yasal Linkler (Gizlilik, Hizmet Şartları)', 'entegrasyonum'),
    ));
    
    // Post formatları
    add_theme_support('post-formats', array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'video',
        'audio',
    ));
}
add_action('after_setup_theme', 'entegrasyonum_setup');

/**
 * Content Width
 * İçerik genişliği sınırı
 */
function entegrasyonum_content_width() {
    $GLOBALS['content_width'] = apply_filters('entegrasyonum_content_width', 1200);
}
add_action('after_setup_theme', 'entegrasyonum_content_width', 0);

/**
 * Enqueue Scripts and Styles
 * CSS ve JavaScript dosyalarını yükle
 */
function entegrasyonum_scripts() {
    // Google Fonts - Poppins ve Pacifico
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Pacifico&display=swap', array(), null);
    
    // Remix Icon - lightweight icon library
    wp_enqueue_style('remixicon', get_template_directory_uri() . '/assets/remixicon/fonts/remixicon.css', array(), '4.7.0');
    
    // Tailwind CSS - önce yükle
    wp_enqueue_style(
        'tailwind',
        get_template_directory_uri() . '/assets/css/tailwind.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/tailwind.css')
    );
    
    // Ana stil dosyası - Tailwind'den sonra yükle (tailwind dependency olarak)
    wp_enqueue_style('entegrasyonum-style', get_stylesheet_uri(), array('tailwind'), '1.0.1');
    
    // Ana JavaScript dosyası
    wp_enqueue_script('entegrasyonum-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.1', true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // JavaScript'e PHP değişkenlerini aktar
    wp_localize_script('entegrasyonum-main', 'entegrasyonumData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('entegrasyonum-nonce'),
    ));
    
    // Tailwind Config inline script
    wp_add_inline_script('tailwindcss', '
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#1D4ED8",
                        secondary: "#0A2540"
                    },
                    borderRadius: {
                        "button": "8px"
                    }
                }
            }
        }
    ', 'before');
}
add_action('wp_enqueue_scripts', 'entegrasyonum_scripts');

/**
 * Register Widget Areas
 * Widget alanlarını kaydet
 */
function entegrasyonum_widgets_init() {
    // Ana sidebar
    register_sidebar(array(
        'name'          => esc_html__('Blog Sidebar', 'entegrasyonum'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Blog sayfaları için sidebar', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    // Shop sidebar
    register_sidebar(array(
        'name'          => esc_html__('Shop Sidebar', 'entegrasyonum'),
        'id'            => 'sidebar-shop',
        'description'   => esc_html__('Mağaza sayfaları için sidebar', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    // Footer widget alanları
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'entegrasyonum'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer ilk kolon', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s text-white">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-white font-semibold text-lg mb-4">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'entegrasyonum'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer ikinci kolon', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s text-white">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-white font-semibold text-lg mb-4">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'entegrasyonum'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer üçüncü kolon', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s text-white">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-white font-semibold text-lg mb-4">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 4', 'entegrasyonum'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Footer dördüncü kolon', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s text-white">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-white font-semibold text-lg mb-4">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'entegrasyonum_widgets_init');

/**
 * Custom Excerpt Length
 * Özet uzunluğunu ayarla
 */
function entegrasyonum_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'entegrasyonum_excerpt_length');

/**
 * Custom Excerpt More
 * Özet devamı metnini ayarla
 */
function entegrasyonum_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'entegrasyonum_excerpt_more');

/**
 * Add body classes
 * Body'ye özel class'lar ekle
 */
function entegrasyonum_body_classes($classes) {
    // Sidebar kontrolü
    if (!is_active_sidebar('sidebar-1') && !is_active_sidebar('sidebar-shop')) {
        $classes[] = 'no-sidebar';
    }
    
    // Mobil algılama
    if (wp_is_mobile()) {
        $classes[] = 'mobile-device';
    }
    
    return $classes;
}
add_filter('body_class', 'entegrasyonum_body_classes');

/**
 * WooCommerce Customization
 * WooCommerce özelleştirmeleri
 */
// Ürün sayısı ayarı
function entegrasyonum_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'entegrasyonum_products_per_page', 20);

// Grid kolonu ayarı
function entegrasyonum_loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'entegrasyonum_loop_columns');

/**
 * Pagination
 * Sayfalandırma fonksiyonu
 */
function entegrasyonum_pagination() {
    global $wp_query;
    
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    
    $big = 999999999;
    
    echo '<div class="pagination">';
    echo paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => '<i class="ri-arrow-left-s-line"></i>',
        'next_text' => '<i class="ri-arrow-right-s-line"></i>',
        'type'      => 'list',
    ));
    echo '</div>';
}

/**
 * Breadcrumbs
 * Breadcrumb navigasyonu
 */
function entegrasyonum_breadcrumbs() {
    // Ana sayfada gösterme
    if (is_front_page()) {
        return;
    }
    
    echo '<div class="breadcrumbs">';
    echo '<a href="' . home_url('/') . '"><i class="ri-home-line"></i> Ana Sayfa</a>';
    echo '<span class="separator"> / </span>';
    
    if (is_category() || is_single()) {
        $category = get_the_category();
        if ($category) {
            echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a>';
            if (is_single()) {
                echo '<span class="separator"> / </span>';
                echo '<span>' . get_the_title() . '</span>';
            }
        }
    } elseif (is_page()) {
        echo '<span>' . get_the_title() . '</span>';
    } elseif (is_search()) {
        echo '<span>Arama Sonuçları: ' . get_search_query() . '</span>';
    } elseif (is_404()) {
        echo '<span>Sayfa Bulunamadı</span>';
    }
    
    echo '</div>';
}

/**
 * Get Cart Count
 * Sepetteki ürün sayısını al
 */
function entegrasyonum_cart_count() {
    if (class_exists('WooCommerce')) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

/**
 * AJAX Cart Count Update
 * Sepet sayısını AJAX ile güncelle
 */
function entegrasyonum_update_cart_count() {
    if (class_exists('WooCommerce')) {
        echo WC()->cart->get_cart_contents_count();
    }
    wp_die();
}
add_action('wp_ajax_entegrasyonum_update_cart_count', 'entegrasyonum_update_cart_count');
add_action('wp_ajax_nopriv_entegrasyonum_update_cart_count', 'entegrasyonum_update_cart_count');

/**
 * Post View Counter
 * Yazı görüntülenme sayacı
 */
function entegrasyonum_set_post_views($postID) {
    $count_key = 'entegrasyonum_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function entegrasyonum_get_post_views($postID) {
    $count_key = 'entegrasyonum_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

/**
 * Comment Form Fields
 * Yorum formu alanlarını özelleştir
 */
function entegrasyonum_comment_form_fields($fields) {
    foreach ($fields as &$field) {
        $field = str_replace('class="', 'class="comment-form-field ', $field);
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'entegrasyonum_comment_form_fields');

/**
 * Theme Customizer
 * Tema özelleştirici ayarları
 */
function entegrasyonum_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('entegrasyonum_hero', array(
        'title'    => __('Hero Section', 'entegrasyonum'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Entegrasyonum\'a Hoş Geldiniz',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Başlık', 'entegrasyonum'),
        'section' => 'entegrasyonum_hero',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Profesyonel entegrasyon hizmetleri ve çözümleri',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_description', array(
        'label'   => __('Hero Açıklama', 'entegrasyonum'),
        'section' => 'entegrasyonum_hero',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'entegrasyonum_customize_register');

/**
 * Security Headers
 * Güvenlik başlıklarını ekle
 */
function entegrasyonum_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
}
add_action('send_headers', 'entegrasyonum_security_headers');

/**
 * Custom Comment Callback
 * Özel yorum görünümü
 */
function entegrasyonum_comment_callback($comment, $args, $depth) {
    $tag = ('div' === $args['style']) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-author vcard">
                <?php echo get_avatar($comment, 50); ?>
                <span class="fn"><?php echo get_comment_author_link(); ?></span>
            </div>
            
            <div class="comment-meta">
                <time datetime="<?php comment_time('c'); ?>">
                    <i class="ri-time-line"></i>
                    <?php printf(__('%1$s tarihinde %2$s', 'entegrasyonum'), get_comment_date(), get_comment_time()); ?>
                </time>
            </div>
            
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
            
            <div class="comment-actions">
                <?php
                comment_reply_link(array_merge($args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply">',
                    'after'     => '</div>',
                )));
                ?>
                
                <?php if ('0' == $comment->comment_approved) : ?>
                    <p class="comment-awaiting-moderation">
                        <?php esc_html_e('Yorumunuz onay bekliyor.', 'entegrasyonum'); ?>
                    </p>
                <?php endif; ?>
            </div>
        </article>
    <?php
}

/**
 * Custom Navigation Menu Walker
 * Menü için özel walker class - Tailwind için
 */
class Entegrasyonum_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start Level - ul açılışı
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '';
    }
    
    // End Level - ul kapanışı
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '';
    }
    
    // Start Element - li ve a açılışı
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        // Hover efekti ile modern menü linki
        $output .= '<a href="' . esc_url($item->url) . '" class="text-gray-700 hover:text-primary hover:bg-gray-50 transition-all duration-300 font-medium text-sm whitespace-nowrap py-2 px-3 rounded-lg">';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }
}

/**
 * Theme Customizer - Hero Section
 * Hero bölümü için özelleştirici ayarları güncelleme
 */
function entegrasyonum_customize_hero($wp_customize) {
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Made Simple',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Alt Başlık', 'entegrasyonum'),
        'section' => 'entegrasyonum_hero',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'entegrasyonum_customize_hero');

/**
 * WooCommerce Hooks - Modern Tasarım Uyumluluğu
 */
if (class_exists('WooCommerce')) {
    
    // WooCommerce wrapper'ları kaldır - kendi tasarımımızı kullanacağız
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    
    // Sidebar kaldır - kendi layoutumuz var
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    
    // Ürün sayısı - 3 sütun grid için
    add_filter('loop_shop_columns', function() {
        return 3;
    });
    
    // Sayfa başına ürün sayısı
    add_filter('loop_shop_per_page', function() {
        return 12;
    });
    
    // Related products sayısı
    add_filter('woocommerce_output_related_products_args', function($args) {
        $args['posts_per_page'] = 3;
        $args['columns'] = 3;
        return $args;
    });
    
    // Upsell products sayısı
    add_filter('woocommerce_upsell_display_args', function($args) {
        $args['posts_per_page'] = 3;
        $args['columns'] = 3;
        return $args;
    });
    
    // Add to cart buton metni özelleştirme
    add_filter('woocommerce_product_add_to_cart_text', function($text, $product) {
        if ($product->is_type('simple')) {
            return __('Sepete Ekle', 'entegrasyonum');
        }
        if ($product->is_type('variable')) {
            return __('Seçenekleri Gör', 'entegrasyonum');
        }
        if ($product->is_type('grouped')) {
            return __('Ürünleri Gör', 'entegrasyonum');
        }
        if ($product->is_type('external')) {
            return __('Satın Al', 'entegrasyonum');
        }
        return $text;
    }, 10, 2);
     
    // Sale badge özelleştirme
    add_filter('woocommerce_sale_flash', function($html, $post, $product) {
        if ($product->is_on_sale()) {
            $percentage = '';
            if ($product->is_type('variable')) {
                $percentages = array();
                $prices = $product->get_variation_prices();
                foreach ($prices['price'] as $key => $price) {
                    if ($prices['regular_price'][$key] !== $price) {
                        $percentages[] = round((($prices['regular_price'][$key] - $price) / $prices['regular_price'][$key]) * 100);
                    }
                }
                if ($percentages) {
                    $percentage = max($percentages) . '%';
                }
            } else {
                $regular_price = $product->get_regular_price();
                $sale_price = $product->get_sale_price();
                if ($regular_price && $sale_price) {
                    $percentage = round((($regular_price - $sale_price) / $regular_price) * 100) . '%';
                }
            }
            
            return '<span class="onsale bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">' . 
                   ($percentage ? '-' . $percentage : __('İndirim', 'entegrasyonum')) . 
                   '</span>';
        }
        return $html;
    }, 10, 3);
    
    // WooCommerce bildirimlerini modern hale getir
    add_filter('woocommerce_add_to_cart_message_html', function($message) {
        $message = str_replace('class="woocommerce-message"', 'class="woocommerce-message flex items-center"', $message);
        return '<div class="woocommerce-notices-wrapper">' . $message . '</div>';
    });
    
    // Checkout placeholder metinleri
    add_filter('woocommerce_checkout_fields', function($fields) {
        // Fatura alanları
        if (isset($fields['billing'])) {
            $fields['billing']['billing_first_name']['placeholder'] = 'Adınız';
            $fields['billing']['billing_last_name']['placeholder'] = 'Soyadınız';
            $fields['billing']['billing_email']['placeholder'] = 'E-posta adresiniz';
            $fields['billing']['billing_phone']['placeholder'] = 'Telefon numaranız';
            $fields['billing']['billing_address_1']['placeholder'] = 'Adres';
            $fields['billing']['billing_postcode']['placeholder'] = 'Posta Kodu';
            $fields['billing']['billing_city']['placeholder'] = 'Şehir';
        }
        
        // Teslimat alanları
        if (isset($fields['shipping'])) {
            $fields['shipping']['shipping_first_name']['placeholder'] = 'Adınız';
            $fields['shipping']['shipping_last_name']['placeholder'] = 'Soyadınız';
            $fields['shipping']['shipping_address_1']['placeholder'] = 'Adres';
            $fields['shipping']['shipping_postcode']['placeholder'] = 'Posta Kodu';
            $fields['shipping']['shipping_city']['placeholder'] = 'Şehir';
        }
        
        return $fields;
    });
    
    // Cart sayfası butonları
    add_action('woocommerce_proceed_to_checkout', function() {
        echo '<style>.woocommerce-cart .wc-proceed-to-checkout a.checkout-button { 
            background-color: #10B981 !important; 
            color: white !important; 
            padding: 16px 32px !important; 
            border-radius: 8px !important; 
            font-size: 18px !important; 
            font-weight: 700 !important;
            font-family: "Poppins", sans-serif !important;
            text-align: center !important;
            display: block !important;
        }
        .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover { 
            background-color: #059669 !important; 
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3) !important;
        }</style>';
    }, 1);
    
    // AJAX cart update için script ekle
    add_action('wp_footer', function() {
        if (is_cart()) {
            ?>
            <script type="text/javascript">
            jQuery(document).ready(function($) {
                // Cart update butonuna tıklandığında loading göster
                $('button[name="update_cart"]').on('click', function() {
                    $(this).prop('disabled', true).html('<i class="ri-loader-4-line animate-spin mr-2"></i>Güncelleniyor...');
                });
                
                // Quantity değiştiğinde otomatik update
                $('.qty').on('change', function() {
                    $('button[name="update_cart"]').prop('disabled', false);
                });
            });
            </script>
            <?php
        }
    });
    
    // WooCommerce varsayılan ödeme yöntemlerini kaldır - tema dosyasında zaten gösteriliyor
    // Bu, ödeme yöntemlerinin tekrar görünmesini engeller
    remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
    
}

function custom_blog_styles() {
  wp_enqueue_style('blog-content', get_stylesheet_directory_uri() . '/assets/css/blog-content.css');
}

add_action('wp_enqueue_scripts', 'custom_blog_styles');

add_theme_support('editor-styles');
add_editor_style('blog-editor.css');

// Tailwind CSS artık entegrasyonum_scripts() fonksiyonunda yükleniyor
// Bu fonksiyon gereksiz olduğu için kaldırıldı

# /assets/css/wp-forms.css
function custom_wpforms_styles() {
  wp_enqueue_style('wpforms-custom', get_stylesheet_directory_uri() . '/assets/css/wp-forms.css');
}
add_action('wp_enqueue_scripts', 'custom_wpforms_styles');


// Gutenberg (block editor) desteğini etkinleştir
function mytheme_add_gutenberg_support() {
    add_theme_support( 'editor-styles' ); // Tema stillerini editörde göster
    add_theme_support( 'wp-block-styles' ); // Gutenberg blok stilleri
    add_theme_support( 'align-wide' ); // Geniş hizalama desteği
    add_theme_support( 'responsive-embeds' ); // Embed'ler responsive olsun
}
add_action( 'after_setup_theme', 'mytheme_add_gutenberg_support' );

// Gutenberg blok stillerini frontend'de etkinleştir
function mytheme_enable_gutenberg_frontend_styles() {
    // WordPress'in varsayılan Gutenberg CSS dosyasını yükle
    wp_enqueue_style( 'wp-block-library' );

    // Ek olarak tema içinde kendi blok düzenlemelerini de ekleyebilirsin
    wp_enqueue_style( 'mytheme-gutenberg', get_template_directory_uri() . '/assets/css/block-editor.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enable_gutenberg_frontend_styles' );

// code that runs only for single blog post
function mytheme_single_post_scripts() {
    if ( is_single() && 'post' === get_post_type() ) {
        wp_enqueue_style( 'single-post-style', get_template_directory_uri() . '/assets/css/single-post.css', array(), '1.0.0' );
    }
}
add_action( 'wp_enqueue_scripts', 'mytheme_single_post_scripts' );