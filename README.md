# Apaweh Shoes - CRUD & Slicing Template

Repositori ini berisi implementasi dari materi **Slicing Template** dan **CRUD (Create, Read, Update, Delete)** menggunakan framework Laravel. Fokus utama pada materi ini adalah memisahkan komponen antarmuka (UI) menggunakan fitur Blade Templating dan membuat form interaktif menggunakan **Bootstrap Modal**.

## Fitur yang Dikerjakan

1. **Slicing Template (Blade Component)**
    - Memisahkan struktur utama halaman menggunakan `@extends('layouts.main')`.
    - Menggunakan `@include` untuk memanggil komponen yang dapat digunakan ulang (reusable), seperti Modal Tambah Produk, Modal Update Produk, dan Modal Wishlist.
    - Merender daftar produk menggunakan komponen **Bootstrap Card** di dalam _grid system_ (`row` & `col-md-4`).

2. **Read Data (Menampilkan Produk)**
    - Menampilkan data produk dari database menggunakan perulangan `@foreach ($products as $item)`.
    - Menampilkan informasi detail produk: Nama, Harga (dengan format Rupiah), Stok, dan Gambar Produk.

3. **Create Data (Tambah Produk)**
    - Mengimplementasikan form penambahan data menggunakan **Bootstrap Modal** yang diletakkan di _luar_ blok perulangan produk.
    - Mendukung fitur _upload_ file gambar dengan atribut `enctype="multipart/form-data"`.

4. **Update Data (Edit Produk)**
    - Menggunakan Modal yang diletakkan di _dalam_ blok `@foreach` agar ID dan data produk spesifik (`$item`) dapat dimuat (bind) secara otomatis ke dalam form.
    - Penggunaan directive `@method('PUT')` pada form HTML.
    - Fitur opsional untuk mengganti gambar produk (menampilkan _preview_ gambar saat ini).

5. **Delete Data (Hapus Produk)**
    - Tombol hapus menggunakan tag `<form>` dengan directive `@method('DELETE')`.
    - Ditambahkan konfirmasi JavaScript (`onsubmit="return confirm(...)"`) sebelum penghapusan dieksekusi untuk mencegah ketidaksengajaan.

---

## Catatan Penting & _Troubleshooting_

Selama proses pengerjaan, terdapat beberapa penyesuaian penting yang menjadi _best practice_:

- **Struktur Modal Bootstrap:** Form aksi (Tambah/Update) **wajib** dibungkus oleh struktur hirarki Modal Bootstrap (`.modal` > `.modal-dialog` > `.modal-content`). Jika hanya berisi tag `<form>`, form tersebut akan tumpah ke halaman utama dan _trigger_ dari tombol tidak akan bekerja.
- **Penempatan Gambar di Card:** Gambar produk (`<img>` dengan class `card-img-top`) harus diletakkan di _luar_ dan di _atas_ `<div class="card-body">` agar mendapatkan _styling_ dan _border-radius_ yang rapi sesuai standar Bootstrap.
- **ID Modal Dinamis:** Pada Modal Update, ID modal harus bersifat dinamis (contoh: `id="editProdukModal{{ $item->product_id }}"`) agar tombol "Update" pada card tertentu memicu modal dari data yang benar, bukan modal dari produk pertama.

---
