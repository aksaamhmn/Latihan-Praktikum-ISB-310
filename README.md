# Apaweh Shoes - Laravel Migration

Repository ini berisi tugas Week 4 untuk mata kuliah Praktikum ISB-310. Project ini merupakan hasil migrasi aplikasi sistem manajemen sepatu "Apaweh Shoes" dari arsitektur PHP Native ke framework **Laravel** (Konsep MVC).

## Fitur Aplikasi

Aplikasi ini dilengkapi dengan beberapa fitur utama, baik dari sisi _backend_ maupun _frontend_:

### Backend (Laravel MVC)

- **Sistem Autentikasi**: Fitur Login dan Logout menggunakan Controller dan logika Session bawaan Laravel.
- **Dual-Cookie "Remember Me"**:
    - `user_login`: Cookie berdurasi 60 menit untuk fitur _Auto-Login_ saat browser ditutup.
    - `remembered_username`: Cookie jangka panjang untuk _pre-fill_ (mengisi otomatis) kolom username di form setelah user melakukan _logout_.
- **Blade Templating**: Pemisahan antarmuka (View) menggunakan Blade directives (`@if`, `@csrf`, dll).
- **Asset Management**: Pemanggilan file statis (CSS/JS) yang rapi menggunakan helper `asset()`.

### Frontend (JavaScript & LocalStorage)

- **Dark Mode**: Tema gelap/terang yang preferensinya disimpan di browser.
- **Sistem Wishlist**: Menambahkan dan menghapus barang ke daftar favorit.
- **Manajemen Stok**: Simulasi pengurangan stok barang saat tombol "Beli" ditekan (stok akan persisten meskipun halaman di-refresh).

## Teknologi yang Digunakan

- **Framework**: Laravel
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **UI/UX**: Bootstrap 5.3
