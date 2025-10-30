/**
 * Entegrasyonum Theme Main JavaScript
 * 
 * @package Entegrasyonum
 */

(function($) {
    'use strict';
    
    // Document ready
    $(document).ready(function() {
        
        // Sticky Header / Yapışkan Başlık
        initStickyHeader();
        
        // Mobile Menu / Mobil Menü
        initMobileMenu();
        
        // Search Toggle / Arama Toggle
        initSearchToggle();
        
        // Smooth Scroll / Yumuşak Kaydırma
        initSmoothScroll();
        
        // Back to Top / Yukarı Çık
        initBackToTop();
        
        // WooCommerce Cart Update / Sepet Güncelleme
        initCartUpdate();
        
        // Account Dropdown / Hesabım Dropdown
        initAccountDropdown();
        
    });
    
    // Window scroll events
    $(window).on('scroll', function() {
        handleStickyHeader();
        handleBackToTop();
    });
    
    /**
     * Sticky Header
     * Scroll edildiğinde header'a sticky class ekle
     */
    function initStickyHeader() {
        // İlk yüklemede kontrol et
        handleStickyHeader();
    }
    
    function handleStickyHeader() {
        var header = $('.site-header');
        var scrollTop = $(window).scrollTop();
        
        if (scrollTop > 100) {
            header.addClass('sticky');
        } else {
            header.removeClass('sticky');
        }
    }
    
    /**
     * Mobile Menu
     * Mobil menü açma/kapama
     */
    function initMobileMenu() {
        var menuToggle = $('.mobile-menu-toggle');
        var navigation = $('.main-navigation');
        var body = $('body');
        
        menuToggle.on('click', function(e) {
            e.preventDefault();
            navigation.toggleClass('active');
            body.toggleClass('menu-open');
            
            // İkon değiştir (RemixIcon)
            var icon = $(this).find('i');
            if (navigation.hasClass('active')) {
                icon.removeClass('ri-menu-line').addClass('ri-close-line');
            } else {
                icon.removeClass('ri-close-line').addClass('ri-menu-line');
            }
        });
        
        // Menü dışına tıklandığında kapat
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                if (navigation.hasClass('active')) {
                    navigation.removeClass('active');
                    body.removeClass('menu-open');
                    menuToggle.find('i').removeClass('ri-close-line').addClass('ri-menu-line');
                }
            }
        });
        
        // Mobil menüde dropdown toggle
        if ($(window).width() <= 768) {
            $('.main-menu > li.menu-item-has-children > a').on('click', function(e) {
                e.preventDefault();
                $(this).parent().toggleClass('active');
                $(this).next('ul').slideToggle(300);
            });
        }
    }
    
    /**
     * Search Toggle
     * Mobil arama popup'ını aç/kapat
     */
    function initSearchToggle() {
        var searchToggle = $('.search-toggle');
        var searchPopup = $('.mobile-search-popup');
        var searchClose = $('.search-close');
        
        // Arama butonuna tıklandığında popup aç
        searchToggle.on('click', function(e) {
            e.preventDefault();
            searchPopup.removeClass('hidden');
            // Input'a focus
            setTimeout(function() {
                searchPopup.find('input[type="search"]').focus();
            }, 100);
        });
        
        // Kapat butonuna tıklandığında
        searchClose.on('click', function(e) {
            e.preventDefault();
            searchPopup.addClass('hidden');
        });
        
        // Popup dışına tıklandığında kapat
        searchPopup.on('click', function(e) {
            if ($(e.target).hasClass('mobile-search-popup')) {
                searchPopup.addClass('hidden');
            }
        });
        
        // ESC tuşu ile kapat
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && !searchPopup.hasClass('hidden')) {
                searchPopup.addClass('hidden');
            }
        });
    }
    
    /**
     * Smooth Scroll
     * Anchor linklerde yumuşak kaydırma
     */
    function initSmoothScroll() {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
                location.hostname === this.hostname) {
                
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    e.preventDefault();
                    var offset = target.offset().top - 80; // Header yüksekliği
                    
                    $('html, body').animate({
                        scrollTop: offset
                    }, 800, 'swing');
                }
            }
        });
    }
    
    /**
     * Back to Top Button
     * Yukarı çık butonu (RemixIcon kullanılıyor)
     */
    function initBackToTop() {
        // Buton HTML'i ekle
        if ($('.back-to-top').length === 0) {
            $('body').append('<button class="back-to-top" aria-label="Yukarı Çık"><i class="ri-arrow-up-line"></i></button>');
        }
        
        // Butona tıklandığında
        $('.back-to-top').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });
        
        // İlk yüklemede kontrol et
        handleBackToTop();
    }
    
    function handleBackToTop() {
        var scrollTop = $(window).scrollTop();
        var backToTop = $('.back-to-top');
        
        if (scrollTop > 300) {
            backToTop.addClass('show');
        } else {
            backToTop.removeClass('show');
        }
    }
    
    /**
     * WooCommerce Cart Update
     * Sepet sayısını AJAX ile güncelle
     */
    function initCartUpdate() {
        if (typeof wc_add_to_cart_params === 'undefined') {
            return;
        }
        
        // Sepete ekleme işlemi sonrası
        $(document.body).on('added_to_cart', function(e, fragments, cart_hash, button) {
            updateCartCount();
        });
        
        // Sepetten çıkarma işlemi sonrası
        $(document.body).on('removed_from_cart', function() {
            updateCartCount();
        });
    }
    
    function updateCartCount() {
        $.ajax({
            url: entegrasyonumData.ajaxUrl,
            type: 'POST',
            data: {
                action: 'entegrasyonum_update_cart_count',
                nonce: entegrasyonumData.nonce
            },
            success: function(response) {
                var count = parseInt(response);
                var cartIcon = $('.cart-icon');
                var cartCount = $('.cart-count');
                
                if (count > 0) {
                    if (cartCount.length) {
                        cartCount.text(count);
                    } else {
                        cartIcon.append('<span class="cart-count absolute -top-2 -right-2 bg-primary text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">' + count + '</span>');
                    }
                    
                    // Pulse animasyonu ekle
                    cartIcon.addClass('pulse');
                    setTimeout(function() {
                        cartIcon.removeClass('pulse');
                    }, 600);
                } else {
                    cartCount.remove();
                }
            }
        });
    }
    
    /**
     * Account Dropdown
     * Hesabım dropdown menüsünü aç/kapat
     */
    function initAccountDropdown() {
        var accountToggle = $('.account-toggle');
        var accountDropdown = $('.account-dropdown');
        
        // Toggle butona tıklandığında
        accountToggle.on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            accountDropdown.toggleClass('hidden');
        });
        
        // Dropdown dışına tıklandığında kapat
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.account-menu-wrapper').length) {
                accountDropdown.addClass('hidden');
            }
        });
        
        // ESC tuşu ile kapat
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && !accountDropdown.hasClass('hidden')) {
                accountDropdown.addClass('hidden');
            }
        });
    }
    
    /**
     * Image Lazy Load
     * Görselleri lazy load et (modern tarayıcılar için)
     */
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    }
    
    /**
     * Form Validation
     * Temel form validasyonu
     */
    $('form').each(function() {
        $(this).on('submit', function(e) {
            var form = $(this);
            var isValid = true;
            
            // Required field kontrolü
            form.find('[required]').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    $(this).addClass('error');
                } else {
                    $(this).removeClass('error');
                }
            });
            
            // Email kontrolü
            form.find('input[type="email"]').each(function() {
                var email = $(this).val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email && !emailRegex.test(email)) {
                    isValid = false;
                    $(this).addClass('error');
                } else {
                    $(this).removeClass('error');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
    
    /**
     * Fade In Animation
     * Sayfa yüklendiğinde elementleri fade in yap
     */
    function fadeInElements() {
        $('.fade-in').each(function(index) {
            var element = $(this);
            setTimeout(function() {
                element.css('opacity', '1');
            }, index * 100);
        });
    }
    
    // Sayfa yüklendiğinde animasyonları başlat
    $(window).on('load', function() {
        fadeInElements();
    });
    
    /**
     * Intersection Observer
     * Scroll animasyonları için (modern tarayıcılar)
     */
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        // .fade-in elementlerini gözlemle
        document.querySelectorAll('.fade-in').forEach(function(element) {
            observer.observe(element);
        });
    }
    
    /**
     * Mobile Menu Toggle - Yeni Tasarım
     * Mobil menü açma/kapama - Remix Icon ile
     */
    $('.mobile-menu-toggle').on('click', function(e) {
        e.preventDefault();
        var mobileMenu = $('.mobile-menu');
        var icon = $(this).find('i');
        
        mobileMenu.toggleClass('active');
        
        // İkon değiştir
        if (mobileMenu.hasClass('active')) {
            icon.removeClass('ri-menu-line').addClass('ri-close-line');
            mobileMenu.slideDown(300);
        } else {
            icon.removeClass('ri-close-line').addClass('ri-menu-line');
            mobileMenu.slideUp(300);
        }
    });
    
    /**
     * Smooth Scrolling - Yeni Tasarım
     * Anchor linklerde yumuşak kaydırma
     */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href && href !== '#') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
    
})(jQuery);

