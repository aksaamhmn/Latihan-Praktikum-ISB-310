# Apaweh Shoes - Keamanan Lanjutan, SSO, & Pengujian (Laravel)

Repositori ini merupakan kelanjutan pengembangan sistem dengan fokus pada **Peningkatan Keamanan (Security)**, implementasi **Single Sign-On (SSO)**, dan **Pengujian Otomatis (Testing)** menggunakan framework Laravel.

## Fitur yang Dikerjakan (Week 10)

1. **Keamanan Registrasi dengan Google reCAPTCHA v2**
    - Mengintegrasikan layanan Google reCAPTCHA (tipe Checkbox "I'm not a robot") pada form pendaftaran untuk melindungi aplikasi dari spam dan bot otomatis.
    - Menambahkan validasi HTTP Post di _backend_ (`RegisteredUserController`) untuk memverifikasi token _captcha_ langsung ke server Google sebelum menyimpan data pengguna ke database.

2. **Login Terintegrasi (SSO) menggunakan Google OAuth & Socialite**
    - Mengimplementasikan _Single Sign-On_ (SSO) menggunakan paket resmi **Laravel Socialite**.
    - Memungkinkan pengguna untuk masuk (login) ke dalam aplikasi menggunakan akun Google mereka tanpa perlu mendaftar atau memasukkan _password_ secara manual.
    - Melakukan konfigurasi kredensial OAuth 2.0 Client ID secara eksternal melalui **Google Cloud Platform (GCP)**.

3. **Pembaruan Struktur Database untuk SSO**
    - Membuat _migration_ untuk menambahkan kolom `google_id` pada tabel `users`.
    - Mengubah struktur kolom `password` menjadi `nullable` agar sistem dapat menyimpan otentikasi dari pengguna Google (yang tidak memiliki _password_ lokal).

4. **Pengujian Otomatis (Automated Testing) dengan PHPUnit**
    - Membuat skenario pengujian _Feature Test_ (`AuthFeatureTest`) untuk memastikan stabilitas sistem autentikasi.
    - Menguji dan memastikan halaman utama dapat dirender dengan benar (HTTP Status 200).
    - Menguji dan memastikan rute _redirect_ Google Socialite berfungsi dan mengembalikan status _redirect_ (HTTP Status 302).

---
