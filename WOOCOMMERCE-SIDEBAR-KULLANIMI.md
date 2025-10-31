# WooCommerce Mağaza Sidebar Kullanım Kılavuzu

## 🎯 Sorun ve Çözüm

### Sorun
Mağaza sayfasında sidebar vardı ama widget'lar görünmüyordu. `archive-product.php` dosyası sidebar'ı render etmiyordu.

### Çözüm
✅ `archive-product.php` dosyası güncellendi ve sidebar desteği eklendi  
✅ Modern, responsive sidebar tasarımı yapıldı  
✅ Widget stilleri eklendi  

---

## 📋 Sidebar'a Widget Ekleme

### Adım 1: WordPress Admin Paneline Giriş Yapın
1. `http://wordpress.test/wp-admin` adresine gidin
2. Kullanıcı adı ve şifrenizle giriş yapın

### Adım 2: Widget Sayfasına Gidin
1. Sol menüden **Görünüm → Widget'lar** (veya **Appearance → Widgets**) seçeneğine tıklayın
2. Sağ tarafta **"Shop Sidebar"** widget alanını göreceksiniz

### Adım 3: WooCommerce Widget'larını Ekleyin

Aşağıdaki widget'ları **Shop Sidebar** alanına sürükleyip bırakabilirsiniz:

#### 🔍 Önerilen Widget'lar:

1. **Ürün Kategorileri** (Product Categories)
   - Ürünleri kategorilere göre filtreleme
   - Ürün sayılarını gösterir

2. **Fiyat Filtresi** (Filter by Price)
   - Fiyat aralığına göre ürün filtreleme
   - Slider ile kolay kullanım

3. **Ürün Ara** (Product Search)
   - Mağazada hızlı ürün arama

4. **Boyut Filtresi** (Filter by Attribute - Size)
   - Ürün özelliklerine göre filtreleme
   - Beden, renk, vb.

5. **Değerlendirme Filtresi** (Filter by Rating)
   - Yıldız puanına göre filtreleme

6. **Aktif Filtreler** (Active Product Filters)
   - Seçili filtreleri gösterir
   - Filtreleri kolayca kaldırma

7. **Ürün Etiketleri** (Product Tags)
   - Etiketlere göre filtreleme

---

## 🎨 Widget Ayarları

### Ürün Kategorileri Widget Ayarları:
```
✅ Başlık: "Kategoriler" veya "Ürün Kategorileri"
✅ Sıralama: "İsim" veya "Ürün Sayısı"
✅ Hiyerarşik Görünüm: Açık (✓)
✅ Ürün Sayısını Göster: Açık (✓)
```

### Fiyat Filtresi Widget Ayarları:
```
✅ Başlık: "Fiyat Aralığı"
✅ Minimum Fiyat: Otomatik
✅ Maksimum Fiyat: Otomatik
```

### Ürün Ara Widget Ayarları:
```
✅ Başlık: "Ürün Ara" veya boş bırakın
```

---

## 📱 Sidebar Görünümü

### Desktop (1024px ve üzeri)
- Sidebar sol tarafta 1 kolon (25%)
- Ürünler sağ tarafta 3 kolon (75%)
- 3 sütun grid layout

### Tablet (768px - 1023px)
- Sidebar üstte
- Ürünler altta 2 sütun grid

### Mobil (767px ve altı)
- Sidebar üstte
- Ürünler altta tek sütun

---

## 🎨 Sidebar Stili Özellikleri

### Widget Tasarımı:
- ✨ Beyaz kartlar
- 🎯 Yuvarlatılmış köşeler (12px)
- 🌟 Hover efektleri
- 📊 Ürün sayısı badge'leri
- 🎨 Modern renkler (Mavi tonları)

### Filtre Özellikleri:
- 🎚️ Fiyat slider'ı
- 🔢 Ürün sayıları
- ⭐ Yıldız değerlendirmeleri
- 🏷️ Aktif filtre gösterimi

---

## 🔧 Özelleştirme

### Sidebar Genişliğini Değiştirme

`archive-product.php` dosyasında:
```php
<!-- Mevcut -->
<div class="grid lg:grid-cols-4 gap-8">
    <aside class="lg:col-span-1">  <!-- 25% genişlik -->
    <div class="lg:col-span-3">    <!-- 75% genişlik -->

<!-- Daha geniş sidebar için -->
<div class="grid lg:grid-cols-3 gap-8">
    <aside class="lg:col-span-1">  <!-- 33% genişlik -->
    <div class="lg:col-span-2">    <!-- 67% genişlik -->
```

### Widget Stil Değiştirme

`style.css` dosyasında "SIDEBAR & WIDGETS" bölümünü özelleştirebilirsiniz:

```css
/* Widget arkaplan rengi */
.widget {
    background: white; /* Değiştirilebilir */
}

/* Widget başlık rengi */
.widget h3, .widget .widget-title {
    color: #0A2540; /* Değiştirilebilir */
}

/* Badge renkleri */
.widget_product_categories .count {
    background-color: #EFF6FF; /* Değiştirilebilir */
    color: #1D4ED8; /* Değiştirilebilir */
}
```

---

## ✅ Test Listesi

Sidebar'ın düzgün çalıştığından emin olmak için:

1. ✓ Widget'lar eklendiğinde görünüyor mu?
2. ✓ Kategori filtreleri çalışıyor mu?
3. ✓ Fiyat filtresi düzgün çalışıyor mu?
4. ✓ Arama kutusu çalışıyor mu?
5. ✓ Mobilde sidebar görünüyor mu?
6. ✓ Filtreler ürünleri doğru filtreliyor mu?
7. ✓ Aktif filtreler gösteriliyor mu?

---

## 🐛 Sorun Giderme

### Widget'lar Görünmüyor
**Çözüm:**
1. `Görünüm → Widget'lar` sayfasına gidin
2. **Shop Sidebar** alanına en az bir widget ekleyin
3. Sayfayı yenileyin (Ctrl+F5)
4. Tarayıcı önbelleğini temizleyin

### Sidebar Mobilde Görünmüyor
**Çözüm:**
1. `style.css` dosyasında responsive kod kontrol edilsin
2. Tailwind CSS yüklendiğinden emin olun
3. Tarayıcı geliştirici araçlarında responsive kontrol edin

### Filtreler Çalışmıyor
**Çözüm:**
1. WooCommerce plugin'inin aktif olduğundan emin olun
2. Ürünlerde kategori/etiket tanımlandığından emin olun
3. Kalıcı bağlantıları yenileyin: `Ayarlar → Kalıcı Bağlantılar → Kaydet`

### Stiller Uygulanmıyor
**Çözüm:**
1. `style.css` dosyasının yüklendiğini kontrol edin
2. Tema sürümünü güncelleyin (functions.php'te version'ı artırın)
3. Tarayıcı önbelleğini temizleyin
4. WordPress önbelleği varsa temizleyin

---

## 📚 WooCommerce Widget'ları Listesi

| Widget Adı | Açıklama | Kullanım |
|------------|----------|----------|
| **Product Categories** | Ürün kategorilerini listeler | Kategori filtreleme |
| **Filter by Price** | Fiyat aralığı filtresi | Fiyat filtreleme |
| **Filter by Attribute** | Özellik filtresi (renk, beden, vb.) | Özellik filtreleme |
| **Filter by Rating** | Yıldız puanı filtresi | Değerlendirme filtreleme |
| **Active Product Filters** | Aktif filtreleri gösterir | Filtre yönetimi |
| **Product Search** | Ürün arama kutusu | Hızlı arama |
| **Product Tags** | Ürün etiketleri | Etiket filtreleme |
| **Products** | Öne çıkan/yeni ürünler | Ürün gösterimi |
| **Top Rated Products** | En yüksek puanlı ürünler | Ürün önerisi |
| **Recent Products** | Son eklenen ürünler | Yeni ürünler |

---

## 🎯 Örnek Widget Düzeni

### Önerilen Sıralama:

1. **Ürün Ara** - En üstte hızlı arama
2. **Aktif Filtreler** - Seçili filtreleri göster
3. **Kategoriler** - Ana filtreleme
4. **Fiyat Filtresi** - İkinci en önemli filtre
5. **Özellik Filtreleri** - Renk, beden, vb.
6. **Değerlendirme** - Yıldız filtreleme
7. **Ürün Etiketleri** - Ek filtreleme

---

## 💡 İpuçları

1. **Widget Başlıkları**: Widget başlıklarına ikon eklemek için başlığa `<i class="ri-filter-line"></i>` gibi RemixIcon kodları ekleyebilirsiniz.

2. **Kategori Resimleri**: WooCommerce kategori ayarlarından kategorilere resim ekleyebilirsiniz.

3. **Performans**: Çok fazla widget eklemek sayfayı yavaşlatabilir. 5-7 widget optimal sayıdır.

4. **Mobil Deneyim**: Mobilde sidebar uzun olabilir, en önemli filtreleri üste koyun.

5. **A/B Test**: Farklı widget düzenlerini test edin ve hangisinin daha iyi çalıştığını görün.

---

## 📞 Destek

Sorunla karşılaşırsanız:
1. Bu dokümanı baştan okuyun
2. WordPress/WooCommerce'in güncel olduğundan emin olun
3. Tarayıcı konsolunda hata olup olmadığını kontrol edin

---

**Tarih:** 30 Ekim 2025  
**Sürüm:** 1.0.1  
**Tema:** Entegrasyonum

