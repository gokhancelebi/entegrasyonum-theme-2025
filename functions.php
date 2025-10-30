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
        'primary' => esc_html__('Ana Menü', 'entegrasyonum'),
        'footer'  => esc_html__('Footer Menü', 'entegrasyonum'),
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
    // Ana stil dosyası
    wp_enqueue_style('entegrasyonum-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Font Awesome (ikonlar için)
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Ana JavaScript dosyası
    wp_enqueue_script('entegrasyonum-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // JavaScript'e PHP değişkenlerini aktar
    wp_localize_script('entegrasyonum-main', 'entegrasyonumData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('entegrasyonum-nonce'),
    ));
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
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'entegrasyonum'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer ikinci kolon', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'entegrasyonum'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer üçüncü kolon', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 4', 'entegrasyonum'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Footer dördüncü kolon', 'entegrasyonum'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
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
        'prev_text' => '<i class="fas fa-chevron-left"></i>',
        'next_text' => '<i class="fas fa-chevron-right"></i>',
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
    echo '<a href="' . home_url('/') . '"><i class="fas fa-home"></i> Ana Sayfa</a>';
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
                    <i class="far fa-clock"></i>
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

