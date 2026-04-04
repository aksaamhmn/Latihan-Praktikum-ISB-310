# Apaweh Shoes - Laravel MVC & Database Integration

Repository ini berisi tugas Week 5 untuk mata kuliah Praktikum ISB-310. Project ini berfokus pada penerapan arsitektur **MVC (Model, View, Controller)** secara utuh dan integrasinya dengan database MySQL menggunakan framework Laravel.

## Fitur Aplikasi (Week 5)

Pada minggu ini, aplikasi telah diubah menjadi dinamis dengan antarmuka yang terhubung langsung ke database:

- **Database Migrations**: Pembuatan skema tabel `categories` dan `products` secara terstruktur, lengkap dengan relasi _Foreign Key_ (Cascade).
- **Eloquent ORM & Relationships**: Penerapan logika relasi _One-to-Many_ antar Model (menggunakan `hasMany` pada Category dan `belongsTo` pada Product).
- **Database Seeder**: Injeksi data awal (_dummy data_) secara otomatis ke dalam database untuk keperluan pengujian dan inisialisasi tabel.
- **Dynamic View (Read)**: Menampilkan daftar produk secara dinamis di halaman web yang di-fetch langsung dari database menggunakan _Blade directive_ `@foreach`.
- **Fitur Tambah Produk (Create)**: Integrasi Modal Form Bootstrap untuk menginput sepatu baru, lengkap dengan:
    - Validasi _request_ input di dalam Controller.
    - Penyimpanan data secara otomatis ke database.
    - _Flash Message_ (notifikasi sukses) setelah data berhasil ditambahkan.

## Teknologi yang Digunakan

- **Framework**: Laravel
- **Database**: MySQL
- **Frontend**: HTML5, CSS3
- **UI/UX**: Bootstrap 5.3
