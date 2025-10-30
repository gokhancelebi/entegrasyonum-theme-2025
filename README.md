# Entegrasyonum WordPress Teması

Modern, profesyonel ve kurumsal bir WooCommerce teması. Hizmet satışı ve blog içerikleri için özel olarak tasarlanmıştır.

## Özellikler

✅ **Tamamen Responsive** - Mobil, tablet ve masaüstü cihazlarda mükemmel görünüm
✅ **WooCommerce Entegrasyonu** - E-ticaret için tam destek
✅ **SEO Uyumlu** - Arama motorları için optimize edilmiş
✅ **Hızlı Yükleme** - Optimize edilmiş kod yapısı
✅ **Pure CSS** - Tailwind veya Bootstrap gibi framework kullanılmamıştır
✅ **Kolay Özelleştirme** - WordPress Customizer desteği
✅ **Blog Desteği** - Zengin blog özellikleri
✅ **Modern Tasarım** - Profesyonel ve temiz arayüz

## Kurulum

1. WordPress admin panelinde **Görünüm > Temalar > Yeni Ekle** sayfasına gidin
2. "Tema Yükle" butonuna tıklayın
3. Tema ZIP dosyasını seçin ve yükleyin
4. Temayı aktif edin

### Gereksinimler

- WordPress 5.8 veya üzeri
- PHP 7.4 veya üzeri
- WooCommerce eklentisi (e-ticaret özellikleri için)

## Tema Özellikleri

### 1. Header (Başlık)
- Sticky (yapışkan) header
- Logo desteği
- Ana menü (dropdown menü desteği)
- Arama fonksiyonu
- Sepet ikonu (WooCommerce)
- Mobil menü

### 2. Ana Sayfa
- Hero bölümü (özelleştirilebilir)
- Öne çıkan hizmetler/ürünler
- Son blog yazıları
- Call-to-action bölümü

### 3. Blog
- Grid görünüm
- Kategori ve etiket desteği
- Sosyal medya paylaşım butonları
- Yorum sistemi
- Görüntülenme sayacı
- İlgili yazılar

### 4. WooCommerce
- Ürün listeleme
- Ürün detay sayfası
- Sepet ve ödeme
- Ürün filtreleme
- Ürün arama

### 5. Widget Alanları
- Blog Sidebar
- Shop Sidebar
- Footer 1, 2, 3, 4

### 6. Menü Konumları
- Ana Menü (Primary)
- Footer Menü

## Özelleştirme

WordPress admin panelinde **Görünüm > Özelleştir** sayfasından tema ayarlarını yapabilirsiniz:

- Logo yükleme
- Site başlık ve açıklama
- Hero bölümü metinleri
- Renkler (CSS değişkenleri ile)
- Menüler

## CSS Değişkenleri

Tema renklerini değiştirmek için `style.css` dosyasındaki CSS değişkenlerini düzenleyebilirsiniz:

```css
:root {
    --primary-color: #2c3e50;      /* Ana renk */
    --secondary-color: #3498db;    /* İkincil renk */
    --accent-color: #e74c3c;       /* Vurgu rengi */
    --success-color: #27ae60;      /* Başarı rengi */
}
```

## JavaScript Özellikleri

- Sticky Header
- Mobil menü toggle
- Arama formu toggle
- Smooth scroll
- Back to top butonu
- Sepet AJAX güncelleme
- Scroll animasyonları

## Destek Verilen Eklentiler

- **WooCommerce** - Tam entegrasyon
- **Contact Form 7** - İletişim formları
- **Yoast SEO** - SEO optimizasyonu
- **WPML** - Çoklu dil desteği (hazır)

## Tema Dosya Yapısı

```
entegrasyonum/
├── assets/
│   └── js/
│       └── main.js
├── template-parts/
│   ├── content.php
│   └── content-search.php
├── woocommerce/
│   └── content-product.php
├── 404.php
├── archive.php
├── comments.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── search.php
├── searchform.php
├── sidebar.php
├── single.php
├── style.css
├── woocommerce.php
└── README.md
```

## Performans İpuçları

1. **Görselleri Optimize Edin** - Görselleri yüklemeden önce sıkıştırın
2. **Caching Eklentisi Kullanın** - WP Super Cache veya W3 Total Cache
3. **CDN Kullanımı** - Statik dosyalar için CDN kullanın
4. **Lazy Loading** - Görseller için lazy loading aktif

## Güvenlik

Tema güvenlik en iyi pratiklerine göre geliştirilmiştir:
- XSS koruması
- CSRF koruması
- SQL injection koruması
- Güvenlik başlıkları
- Veri sanitizasyonu ve validasyonu

## Tarayıcı Desteği

- Chrome (son 2 versiyon)
- Firefox (son 2 versiyon)
- Safari (son 2 versiyon)
- Edge (son 2 versiyon)
- Mobil tarayıcılar

## Lisans

Bu tema GPL v2 veya üzeri lisans altında lisanslanmıştır.

## İletişim

Website: https://entegrasyonum.com
E-posta: info@entegrasyonum.com

## Changelog

### Version 1.0.0
- İlk sürüm
- Temel tema özellikleri
- WooCommerce entegrasyonu
- Blog özellikleri
- Responsive tasarım
- SEO optimizasyonu

