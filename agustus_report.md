# Laporan Build — Kota Jababeka Website

**Periode:** 14–18 Agustus 2026
**Status saat ini:** Proses deploy ke `kotajababeka.com`, dibantu oleh **masreno**

---

## Ringkasan

Lima hari membangun website publik dan CMS untuk Kota Jababeka dari nol — mulai dari struktur data, panel admin (Filament), sampai halaman publik yang mengambil data langsung dari CMS. Stack: **Laravel 13 + Filament 4**, database **MySQL**, front-end **Vite + Tailwind 4**.

---

## Timeline

### 14 Agustus — Fondasi & struktur data
- Project Laravel 13 di-setup, Filament 4 dipasang sebagai admin panel.
- Skema inti dibuat: `Menu`, `SubMenu`, `Content`, `Category`, `Tag`, `Article`.
- MySQL disiapkan sebagai database utama; session, cache, dan queue pakai driver `database`.

### 15 Agustus — Resource admin panel
- Filament resource dibuat untuk setiap tipe konten (list, create, edit) lengkap dengan form schema dan table masing-masing.
- Resource Menu/SubMenu dibuat supaya navigasi situs bisa diatur langsung dari CMS, tanpa hardcode.

### 16 Agustus — Homepage & pengaturan visual
- Resource `HeroSlide` dan `CarouselSetting` ditambahkan untuk hero carousel di homepage.
- Resource `FooterSetting` ditambahkan agar konten footer bisa diedit tanpa perlu deploy ulang kode.
- Komponen home, hero-carousel, quick-actions, dan card-grid dibangun untuk sisi publik.

### 17 Agustus — Halaman dinamis & artikel
- Routing halaman berbasis menu selesai: `/{menu}`, `/{menu}/{section}`, `/{menu}/{section}/{content}` — halaman resolve sepenuhnya dari data CMS.
- Artikel dipecah jadi listing **News** dan **Events**, plus halaman single-article.
- Komponen kartu kategori dan kartu news/event dibuat untuk halaman listing.

### 18 Agustus — Search & lokalisasi
- Fitur pencarian situs ditambahkan, dengan halaman hasil pencarian dan komponen map-search.
- Language switcher terhubung ke route locale-aware (`/lang/{locale}`), disimpan di session.
- Site header, mega-menu, dan footer difinalisasi terhadap data CMS live.

---

## Cakupan CMS saat ini

| Modul | Kemampuan |
|---|---|
| **Navigasi** | Menu & sub-menu sepenuhnya dikelola dari CMS — struktur dan label bisa diubah tanpa sentuh kode. |
| **Halaman konten** | Halaman konten bebas, nested di bawah menu → section, dirender lewat satu controller dinamis. |
| **News & events** | Artikel dengan kategori dan tag, dipecah jadi feed news dan events terpisah. |
| **Homepage** | Hero carousel beserta pengaturan tampilannya, plus block quick-action dan card-grid, semua bisa diedit. |
| **Footer** | Link dan konten footer dikelola sebagai singleton resource, bukan hardcode di layout. |
| **Search & bahasa** | Pencarian situs menyeluruh plus switch bahasa berbasis session. |

---

## Status Deployment — `kotajababeka.com`

| Item | Status | Catatan |
|---|---|---|
| Application build | ✅ Siap | Build Composer + npm sudah diverifikasi lokal |
| Server provisioning | 🔄 Berjalan | PHP 8.3, MySQL, Nginx, Supervisor — bareng masreno |
| Domain & DNS | 🔄 Berjalan | Pointing `kotajababeka.com` ke server produksi |
| Sertifikat SSL | ⏳ Menunggu | Certbot, setelah DNS propagasi |
| Queue worker & scheduler | ⏳ Menunggu | Config Supervisor untuk `queue:work`, cron untuk `schedule:run` |

**Catatan:** deployment produksi ke `kotajababeka.com` — setup server, cutover DNS, dan pengecekan go-live — dibantu oleh **masreno**.
