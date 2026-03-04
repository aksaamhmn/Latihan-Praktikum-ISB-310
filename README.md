# Sistem Manajemen Sepatu (Apaweh Shoes)

Sebuah aplikasi web sederhana untuk mengelola katalog sepatu, dilengkapi dengan antarmuka yang responsif dan interaktif. Proyek ini dibangun menggunakan **HTML**, **CSS (Bootstrap 5)**, dan **Vanilla JavaScript**, dengan fokus pada manipulasi DOM dan pemanfaatan `localStorage` agar data tetap tersimpan secara lokal di peramban (browser) pengguna.

## Gambaran Umum (Overview)

Aplikasi ini mensimulasikan halaman beranda sebuah toko sepatu digital. Pengguna dapat melihat daftar sepatu, mengecek ketersediaan stok, menambahkan sepatu favorit ke dalam _Wishlist_, serta melakukan simulasi pembelian yang akan mengurangi stok secara langsung (real-time). Semua interaksi pengguna akan disimpan secara otomatis sehingga data tidak hilang saat halaman dimuat ulang (refresh) atau tab ditutup.

---

## Integrasi PHP & Sistem Autentikasi

Pada pembaruan ini, arsitektur web ditingkatkan dari sepenuhnya _client-side_ (HTML statis) menjadi web dinamis menggunakan **PHP**. Pembaruan ini berfokus pada penambahan fitur keamanan dan manajemen akses pengguna di sisi server (_server-side_).

### Apa yang Berubah?

- **Migrasi dari HTML ke PHP (`index.html` ➔ `index.php`)**
  Berkas utama diubah menjadi `.php` agar dapat mengeksekusi logika PHP sebelum halaman dirender. Komponen antarmuka seperti _Navbar_ sekarang bersifat dinamis (menampilkan sapaan user dan tombol Logout jika pengguna sudah login).
- **Sistem Login & Manajemen Sesi (Session)**
  Penambahan sistem autentikasi dasar menggunakan `session_start()`. Sistem menggunakan `$_SESSION` untuk mengingat status login pengguna secara aman di memori server selama browser aktif.
- **Fitur "Remember Me" dengan Cookies**
  Penambahan opsi "Remember Me" pada form login yang memanfaatkan `$_COOKIE`. Fitur ini menyimpan token login secara persisten di penyimpanan lokal browser, memungkinkan _auto-login_ saat web dibuka kembali tanpa harus mengisi form lagi meskipun browser sempat ditutup.

---

## Fitur Utama

- **Autentikasi Pengguna:** Login, Logout, dan "Remember Me" menggunakan Session & Cookies.
- **Mode Gelap (Dark Mode) Persisten:** Menggunakan `localStorage` untuk menyimpan preferensi tema pengguna.
- **Simulasi Pembelian & Manajemen Stok:** Stok sepatu berkurang secara real-time saat dibeli dan tersimpan di `localStorage`.
- **Sistem Wishlist (Daftar Keinginan):** Tambah/hapus item favorit dengan lencana (badge) dinamis pada navbar.
- **Desain Responsif:** Dibangun dengan Bootstrap 5, nyaman dilihat di Mobile maupun Desktop.

## Teknologi yang Digunakan

- **PHP:** Pemrosesan _server-side_, manajemen sesi, dan cookies.
- **HTML5 & CSS3:** Struktur dan penyesuaian gaya antarmuka.
- **Bootstrap 5:** Komponen UI (Card, Modal, Navbar) dan utilitas _layouting_.
- **Vanilla JavaScript:** Logika interaktif fitur stok, wishlist, dan pergantian tema.

## Struktur Berkas (File Structure)

- `index.php` — _(Diperbarui)_ Halaman utama web yang dilengkapi pengecekan sesi & cookie.
- `login.php` — _(Baru)_ Halaman form login beserta proses validasi autentikasi.
- `logout.php` — _(Baru)_ Skrip untuk menghapus sesi/cookie dan melakukan _redirect_ ke beranda.
- `style.css` — Kode CSS kustom untuk transisi dan mode gelap.
- `script.js` — Logika _client-side_ untuk simulasi transaksi dan manipulasi DOM.
