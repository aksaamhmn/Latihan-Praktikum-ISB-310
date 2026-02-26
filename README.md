# Sistem Manajemen Sepatu (Apaweh Shoes)

Sebuah aplikasi web sederhana untuk mengelola katalog sepatu, dilengkapi dengan antarmuka yang responsif dan interaktif. Proyek ini dibangun menggunakan **HTML**, **CSS (Bootstrap 5)**, dan **Vanilla JavaScript**, dengan fokus pada manipulasi DOM dan pemanfaatan `localStorage` agar data tetap tersimpan secara lokal di peramban (browser) pengguna.

## Gambaran Umum (Overview)

Aplikasi ini mensimulasikan halaman beranda sebuah toko sepatu digital. Pengguna dapat melihat daftar sepatu, mengecek ketersediaan stok, menambahkan sepatu favorit ke dalam _Wishlist_, serta melakukan simulasi pembelian yang akan mengurangi stok secara langsung (real-time). Semua interaksi pengguna akan disimpan secara otomatis sehingga data tidak hilang saat halaman dimuat ulang (refresh) atau tab ditutup.

## Fitur Utama

- **Mode Gelap (Dark Mode) Persisten**
  - Pengguna dapat beralih antara tema terang dan gelap untuk kenyamanan mata.
  - Preferensi tema disimpan menggunakan `localStorage`, sehingga saat pengguna kembali membuka web, tema yang dipilih sebelumnya akan tetap aktif.

- **Simulasi Pembelian & Manajemen Stok**
  - Tombol "Beli" interaktif yang secara dinamis mengurangi jumlah stok sepatu.
  - Jika stok mencapai **0**, tombol akan otomatis dinonaktifkan (disabled) dan berubah teks menjadi "Habis".
  - Data sisa stok disimpan di `localStorage` agar data tidak kembali ke angka semula (HTML bawaan) saat halaman ditutup atau di-refresh.

- **Sistem Wishlist (Daftar Keinginan)**
  - Pengguna dapat menambahkan sepatu ke daftar keinginan menggunakan tombol "Wishlist".
  - Daftar Wishlist ditampilkan secara rapi di dalam sebuah _Modal_ Bootstrap.
  - Terdapat penghitung (badge) jumlah item wishlist pada _navbar_ yang diperbarui secara langsung.
  - Fitur hapus/kosongkan wishlist.
  - Seluruh data wishlist disimpan secara persisten di `localStorage`.

- **Desain Responsif**
  - Dibangun dengan **Bootstrap 5**, memastikan tampilan web tetap rapi dan menyesuaikan ukuran layar (Mobile, Tablet, maupun Desktop).

## Teknologi yang Digunakan

- **HTML5:** Untuk kerangka dan struktur halaman.
- **CSS3 & Bootstrap 5:** Untuk _styling_, _layouting_ (Grid System), komponen UI (Card, Modal, Navbar), dan utilitas desain.
- **Vanilla JavaScript:** Untuk memberikan logika interaktif, manipulasi DOM, dan pengelolaan `localStorage`.

## Struktur Berkas (File Structure)

- `index.html` — Halaman utama web.
- `style.css` — Kode CSS kustom (seperti penyesuaian gaya untuk _Dark Mode_).
- `script.js` — Logika JavaScript utama untuk fungsionalitas aplikasi.
