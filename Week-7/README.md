# Demo Submit Form Without Page Refresh

Proyek ini adalah contoh sederhana **form kontak berbasis AJAX** yang dapat mengirimkan data ke server **tanpa melakukan refresh halaman**. Form ini menggunakan **Bootstrap** untuk tampilan yang rapi dan **jQuery AJAX** untuk pengiriman data secara asinkron.  
Cocok sebagai dasar untuk proyek web sederhana seperti halaman “Hubungi Kami” atau formulir masukan pengguna.

---

## 🧩 Fitur Utama
- ✅ Mengirim data form tanpa reload halaman (`AJAX`)
- ✅ Validasi input di sisi client (JavaScript)
- ✅ Validasi tambahan dan pengiriman email di sisi server (PHP)
- ✅ Desain responsif menggunakan **Bootstrap 5**
- ✅ Pesan sukses/gagal ditampilkan langsung di halaman

---

## ⚙️ Cara Kerja Singkat

1. **User** mengisi form (nama, email, dan pesan).
2. Saat tombol **Submit** ditekan:
   - JavaScript mencegah refresh halaman (`preventDefault()`).
   - jQuery melakukan **request AJAX** ke `ajax.php`.
3. **ajax.php** menerima data, memvalidasi input, dan menggunakan fungsi `mail()` PHP untuk mengirim email ke alamat tujuan.
4. Setelah berhasil, halaman menampilkan pesan sukses tanpa reload.

---
