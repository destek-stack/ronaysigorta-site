# Ranay Sigorta - Admin Panel Kullanım Kılavuzu

## 🔐 Admin Paneli Giriş

**URL:** `https://ronaysigorta.com/admin/login.php`

**Varsayılan Giriş Bilgileri:**
- Kullanıcı Adı: `admin`
- Şifre: `ranay2024`

## 📋 Özellikler

### ✅ Tamamlanan Modüller:
- ✅ **Login Sistemi** - Güvenli giriş
- ✅ **Dashboard** - Genel bakış ve istatistikler
- ✅ **Logo Yönetimi** - Logo yükleme/değiştirme
- ✅ **Site Ayarları** - Telefon, adres, e-posta düzenleme
- ✅ **Hero Düzenleme** - Ana sayfa başlık/alt başlık

### 🔧 Geliştirme Aşamasında:
- 🔨 Banner yönetimi
- 🔨 Hizmetler düzenleme
- 🔨 Görsel galerisi

## 📁 Dosya Yapısı

```
ronaysigorta-site/
├── admin/
│   ├── login.php           # Giriş sayfası
│   ├── index.php           # Ana panel
│   ├── logout.php          # Çıkış
│   ├── config.php          # Ayarlar
│   ├── data.json           # Veri deposu
│   ├── css/
│   │   └── admin.css       # Admin stil
│   ├── js/
│   │   └── admin.js        # Admin JS
│   └── pages/
│       ├── dashboard.php   # Dashboard
│       ├── logo.php        # Logo yönetimi
│       ├── hero.php        # Hero düzenleme
│       ├── settings.php    # Ayarlar
│       ├── services.php    # Hizmetler
│       └── banners.php     # Bannerlar
├── images/
│   ├── banners/            # Banner görselleri
│   ├── services/           # Hizmet görselleri
│   └── about/              # Hakkımızda görselleri
└── uploads/
    └── logo/               # Logo dosyaları
```

## 🚀 Kurulum

### cPanel'de Kurulum:

1. **Dosyaları Yükleyin**
   - `ronaysigorta-website.zip` dosyasını cPanel File Manager'a yükleyin
   - `public_html` klasörüne çıkartın

2. **İzinleri Ayarlayın**
   ```bash
   chmod 777 admin/data.json
   chmod 777 uploads/
   chmod 777 images/
   ```

3. **PHP Versiyonu**
   - PHP 7.4+ gereklidir
   - cPanel'de PHP ayarlarından kontrol edin

4. **Admin Paneline Giriş**
   - `https://ronaysigorta.com/admin/login.php` adresine gidin
   - `admin` / `ranay2024` ile giriş yapın

## 🔧 Kullanım

### Logo Değiştirme:
1. Admin Panel → Logo Yönetimi
2. "Tıklayarak logo yükleyin" alanına tıklayın
3. PNG veya JPG dosyası seçin (max 2MB)
4. Otomatik yüklenecek ve kaydedilecek

### Site Bilgileri Güncelleme:
1. Admin Panel → Site Ayarları
2. Telefon, e-posta, adres bilgilerini düzenleyin
3. "Kaydet" butonuna tıklayın

### Hero Bölümü Düzenleme:
1. Admin Panel → Ana Sayfa Hero
2. Başlık ve alt başlık metinlerini düzenleyin
3. HTML etiketleri kullanabilirsiniz (`<span class="highlight">`)
4. "Kaydet" butonuna tıklayın

## 🔒 Güvenlik

### Şifre Değiştirme:
1. `admin/config.php` dosyasını açın
2. Şu satırı bulun:
   ```php
   define('ADMIN_PASSWORD', password_hash('ranay2024', PASSWORD_DEFAULT));
   ```
3. `ranay2024` yerine yeni şifrenizi yazın
4. Kaydedin

### Güvenlik Önerileri:
- ✅ Varsayılan şifreyi mutlaka değiştirin
- ✅ Admin klasörüne `.htaccess` ile IP kısıtlaması ekleyin
- ✅ SSL sertifikası kullanın (HTTPS)
- ✅ Düzenli yedekleme yapın

## 📊 Veri Yönetimi

Tüm veriler `admin/data.json` dosyasında saklanır:
- Site bilgileri
- Hero içeriği
- Hizmetler
- İstatistikler
- Bannerlar

**Yedekleme:** Bu dosyayı düzenli olarak yedekleyin!

## 🆘 Sorun Giderme

### Admin panele giremiyorum:
- PHP session fonksiyonlarının aktif olduğundan emin olun
- Tarayıcı çerezlerini kontrol edin
- Şifrenin doğru olduğunu kontrol edin

### Logo yüklenmiyor:
- `uploads/logo/` klasörünün yazma izni olduğunu kontrol edin (777)
- Dosya boyutunun 2MB'dan küçük olduğunu kontrol edin
- PHP'de `upload_max_filesize` ayarını kontrol edin

### Değişiklikler görünmüyor:
- Tarayıcı önbelleğini temizleyin (Ctrl+F5)
- `data.json` dosyasının güncellendiğini kontrol edin

## 📞 Destek

Sorun yaşarsanız:
1. `admin/data.json` dosyasını yedekleyin
2. Hata mesajını not alın
3. cPanel Error Logs'u kontrol edin

---

**Version:** 1.0.0
**Tarih:** 2024
