# Binmas Polda NTB - Web Profile & Admin Panel

Website Profil dan Sistem Manajemen Konten (CMS) untuk Direktorat Pembinaan Masyarakat (Ditbinmas) Polda Nusa Tenggara Barat. Dibangun menggunakan **Laravel 12** dan **FilamentPHP 3**.

![Dashboard Preview](https://filamentphp.com/images/filament-panels.jpg) *[Ganti dengan screenshot asli nanti]*

## 📋 Fitur Utama
- **Frontend Publik**: Beranda, Profil (Satuan Fungsi), Berita/Artikel, Galeri, Kontak.
- **Admin Panel**: Manajemen Berita, Galeri, Agenda, Dokumen, Struktur Organisasi, dan Konten Halaman.
- **Dynamic Content**: Semua teks dan gambar di halaman depan dapat diubah melalui Admin Panel.
- **Struktur Organisasi**: Visualisasi hierarki pejabat dan satuan fungsi.

## 🛠️ Persyaratan Sistem (Requirements)
Sebelum memulai, pastikan komputer Anda memiliki:
- **PHP**: Versi 8.2 atau lebih baru.
- **Composer**: Dependency manager untuk PHP.
- **Node.js & NPM**: Untuk compile aset frontend (Tailwind CSS/Vite).
- **Database**: MySQL atau MariaDB.
- **Git**: Untuk kloning repository.

## 🚀 Instalasi di Localhost (Untuk Developer Baru)

Ikuti langkah-langkah ini untuk menjalankan proyek di komputer Anda.

### 1. Clone Repository
Buka terminal (Command Prompt/PowerShell/Git Bash) dan jalankan:
```bash
git clone https://github.com/username/binmas-polda-ntb.git
cd binmas-polda-ntb
```
*(Ganti URL di atas dengan URL repository GitHub Anda nanti)*

### 2. Install Dependencies
Install library PHP dan JavaScript yang dibutuhkan:
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
Duplikat file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
*(Di Windows, Anda bisa copy-paste file `.env.example` dan rename menjadi `.env` secara manual)*

Buka file `.env` dan sesuaikan koneksi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=binmas_db
DB_USERNAME=root
DB_PASSWORD=
```
*Pastikan Anda telah membuat database kosong bernama `binmas_db` di MySQL Anda.*

### 4. Generate Key & Storage Link
```bash
php artisan key:generate
php artisan storage:link
```

### 5. Migrasi & Seeding Database
Jalankan perintah ini untuk membuat tabel dan mengisi data awal (User Admin & Konten Sample):
```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Aplikasi
Buka dua terminal terpisah:

**Terminal 1 (Server PHP):**
```bash
php artisan serve
```

**Terminal 2 (Vite Build/Dev):**
```bash
npm run dev
```

Akses website di: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 🔑 Akses Admin Panel
Setelah menjalankan `php artisan migrate:fresh --seed`, akun admin default adalah:
- **URL**: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)
- **Email**: `admin@binmas.com`
- **Password**: `password`

## 🌐 Panduan Upload ke Hosting (cPanel/Shared Hosting)

### 1. Persiapan File
1. Jalankan `npm run build` di local untuk meng-compile aset produksi.
2. Hapus folder `node_modules` (tidak perlu di-upload).
3. Zip seluruh folder project (kecuali `.git` dan `node_modules`).

### 2. Upload ke Hosting
1. Login ke cPanel -> File Manager.
2. Upload file Zip ke folder root domain (misal: `public_html` atau subfoldernya).
3. Extract file Zip.

### 3. Konfigurasi Database
1. Di cPanel, buka **MySQL Databases**. Buat database baru dan user baru.
2. Import file SQL (Export dari database local Anda) melalui **phpMyAdmin** di hosting.
3. Edit file `.env` di hosting, sesuaikan:
   - `APP_URL`: Domain Anda (misal `https://binmas.poldantb.com`)
   - `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` sesuai yang dibuat di cPanel.
   - `APP_ENV=production`
   - `APP_DEBUG=false`

### 4. Storage Link (Penting!)
Di hosting, Anda mungkin tidak bisa menjalankan `php artisan storage:link`.
Cara manual:
1. Hapus folder `public/storage` jika ada.
2. Di terminal hosting (jika ada SSH) jalankan: `ln -s /path/to/project/storage/app/public /path/to/project/public/storage`
3. Atau gunakan Script PHP: Buat file `link.php` di folder `public_html`:
   ```php
   <?php
   symlink('/home/user/folder_proyek/storage/app/public', '/home/user/public_html/storage');
   echo "Symlink created";
   ?>
   ```
   Akses file tersebut sekali di browser, lalu hapus.

## 🤝 Kontribusi (Git Flow)
1. **Pull** perubahan terbaru sebelum memulai kerja: `git pull origin main`.
2. Buat **Branch** baru untuk fitur/perbaikan: `git checkout -b fitur-baru`.
3. **Commit** perubahan Anda: `git commit -m "Menambahkan fitur X"`.
4. **Push** ke repository: `git push origin fitur-baru`.
5. Buat **Pull Request** di GitHub.

## 🐛 Troubleshooting Umum
- **Gambar tidak muncul?** Pastikan `php artisan storage:link` sudah dijalankan dan `APP_URL` di `.env` sudah benar.
- **Halaman 404/Not Found?** Pastikan konfigurasi `.htaccess` (Apache) atau Nginx sudah benar untuk Laravel.
- **Upload Gagal?** Cek `upload_max_filesize` di `php.ini` server Anda.
