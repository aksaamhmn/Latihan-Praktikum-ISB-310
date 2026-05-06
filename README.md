# Apaweh Shoes - Autentikasi & Middleware (Laravel Breeze)

Repositori ini berisi implementasi sistem **Autentikasi** dan proteksi rute (routing) menggunakan **Middleware** dalam framework Laravel. Fokus utama pada repositori ini adalah memigrasikan sistem login manual menjadi sistem autentikasi terstandarisasi untuk mengamankan aplikasi dari akses yang tidak sah menggunakan **Laravel Breeze**.

## Fitur yang Dikerjakan

1. **Instalasi & Konfigurasi Laravel Breeze**
    - Mengimplementasikan _starter kit_ Laravel Breeze dengan _stack_ **Blade with Alpine**.
    - Mengganti sistem login dan manajemen _session_ manual menjadi sistem autentikasi bawaan yang lebih aman dan terstruktur.

2. **Proteksi Halaman (Middleware)**
    - Membatasi akses ke halaman dan aksi tertentu (seperti mengelola produk) hanya untuk pengguna yang terautentikasi.
    - Menggunakan fungsi pengelompokan `Route::middleware(['auth'])->group(...)` pada file `routes/web.php` untuk melindungi rute secara massal dengan kode yang lebih bersih.
    - Memuat rute autentikasi bawaan Breeze menggunakan `require __DIR__.'/auth.php';`.

3. **Manajemen Antarmuka Berbasis Autentikasi**
    - Menggunakan directive Blade `@auth` untuk menampilkan elemen UI spesifik (seperti nama pengguna aktif via `Auth::user()->name` dan tombol Logout) hanya ketika pengguna sudah login.
    - Menggunakan directive Blade `@guest` untuk merender tombol Login dan Register bagi pengunjung yang belum terautentikasi.

4. **Kustomisasi Alur Redirect**
    - Mengubah rute _redirect_ bawaan Laravel Breeze. Secara _default_, Breeze akan mengarahkan pengguna ke rute `/dashboard` setelah berhasil Login atau Registrasi. Alur ini dimodifikasi agar mengarah langsung ke halaman utama (`/`).

## Catatan Penting & _Troubleshooting_

Selama proses implementasi autentikasi dan middleware, terdapat beberapa praktik keamanan ( _best practice_ ) yang diterapkan:

- **Keamanan Fitur Logout (Mencegah CSRF):** Pada sistem autentikasi modern Laravel, tombol logout **tidak boleh** dirender sebagai tautan URL biasa (`<a href="...">`). Aksi logout **wajib** menggunakan form dengan method `POST` dan harus menyertakan directive `@csrf`. Hal ini sangat krusial untuk mencegah kerentanan keamanan _Cross-Site Request Forgery_ (CSRF).
- **Lokasi Modifikasi Redirect:** Kustomisasi tujuan halaman setelah pengguna berhasil login atau mendaftar dilakukan dengan mengubah _return response_ pada method `store()` di dalam dua controller inti Breeze:
    - `app/Http/Controllers/Auth/AuthenticatedSessionController.php` (untuk Login)
    - `app/Http/Controllers/Auth/RegisteredUserController.php` (untuk Registrasi)
- **Penghapusan Sistem Lama:** Setelah migrasi ke Breeze, file seperti `CheckLogin.php` (middleware manual) dan `AuthController.php` (controller login manual) beserta pemanggilan _session_ manual (`session()->has('user')`) sepenuhnya dihapus agar tidak terjadi bentrok logika dengan sistem Breeze.

---
