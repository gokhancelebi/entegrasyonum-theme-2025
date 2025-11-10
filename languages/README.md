# Entegrasyonum Tema Dil Dosyaları

Bu klasör, Entegrasyonum temasının çoklu dil desteği için gerekli çeviri dosyalarını içerir.

## Mevcut Diller

- **Türkçe (tr_TR)** - Varsayılan dil
- **İngilizce (en_US)** - Tam çeviri

## Dosya Yapısı

```
languages/
├── entegrasyonum.pot    # Template dosyası (tüm çevrilecek metinler)
├── tr_TR.po             # Türkçe çeviri dosyası
├── en_US.po             # İngilizce çeviri dosyası
└── README.md            # Bu dosya
```

## Kurulum Talimatları

### 1. MO Dosyalarını Oluşturma (Gerekli)

.po dosyalarını WordPress'in kullanabileceği .mo formatına dönüştürmeniz gerekiyor:

**Yöntem 1: Poedit Kullanarak (Önerilen)**

1. [Poedit](https://poedit.net/) programını indirin ve kurun (Ücretsiz)
2. Poedit'i açın
3. `File > Open` menüsünden `tr_TR.po` dosyasını açın
4. `File > Save` ile kaydedin (otomatik olarak .mo dosyası oluşturulur)
5. Aynı işlemi `en_US.po` için tekrarlayın

**Yöntem 2: Komut Satırı (Linux/Mac)**

```bash
cd wp-content/themes/entegrasyonum/languages
msgfmt -o tr_TR.mo tr_TR.po
msgfmt -o en_US.mo en_US.po
```

### 2. WordPress Dil Ayarları

1. WordPress Yönetim Paneli > **Ayarlar > Genel**
2. **Site Dili** seçeneğinden istediğiniz dili seçin:
   - Türkçe için: `Türkçe`
   - İngilizce için: `English (United States)`
3. **Değişiklikleri Kaydet** butonuna tıklayın

### 3. Alternatif: Polylang veya WPML Kullanımı

Çoklu dil sitesi için şu eklentilerden birini kullanabilirsiniz:

- **Polylang** (Ücretsiz)
- **WPML** (Ücretli)
- **TranslatePress** (Freemium)

## Yeni Dil Ekleme

Yeni bir dil eklemek için:

1. `entegrasyonum.pot` dosyasını kopyalayın
2. Poedit ile açın
3. `File > New from POT file` seçin
4. Dil kodunu seçin (örn: `de_DE` Almanca için)
5. Çevirileri yapın
6. `xx_XX.po` formatında kaydedin (örn: `de_DE.po`)
7. Otomatik olarak .mo dosyası oluşturulacaktır

## Çeviri Kapsamı

### Çevrilen Alanlar

✅ **Custom Post Types**
- Hizmetler (Services)
- Hizmet Kategorileri

✅ **Tema Arayüzü**
- Header (Menü, Arama, Sepet, Hesap)
- Footer (Tüm bölümler)
- Ana Sayfa (Hero, Hizmetler, Ürünler, Blog, İletişim)
- Hizmetler Arşiv Sayfası
- Tekil Hizmet Sayfası

✅ **WooCommerce Entegrasyonu**
- Sepet butonları
- Ödeme formu alanları
- Ürün durumları

✅ **Formlar ve Mesajlar**
- Arama formları
- İletişim bilgileri
- Hata mesajları
- Breadcrumb navigasyonu

## Güncelleme Sonrası

Temayı güncelledikten sonra yeni string'ler eklenirse:

1. WP-CLI kullanıyorsanız:
```bash
wp i18n make-pot . languages/entegrasyonum.pot
```

2. Veya [Blank WordPress Pot](https://github.com/fxbenard/Blank-WordPress-Pot) kullanarak POT dosyasını yeniden oluşturun

3. Poedit ile .po dosyalarınızı açın ve **Catalog > Update from POT File** seçeneğiyle güncelleyin

## Destek

Çeviri ile ilgili sorunlar için:
- GitHub: Issues bölümünden bildirebilirsiniz
- E-posta: info@entegrasyonum.com

## Katkıda Bulunma

Yeni dil çevirileri veya mevcut çevirilerde düzeltmeler için pull request gönderebilirsiniz.

---

**Not:** Bu tema WordPress çeviri standardlarına (%100 i18n uyumlu) göre geliştirilmiştir. Tüm metin çıktıları `__()`, `_e()`, `esc_html__()`, `esc_attr__()`, `_n()`, ve `_x()` fonksiyonları kullanılarak çevrilebilir hale getirilmiştir.

