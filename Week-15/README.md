# Sistem Informasi Data Siswa

Aplikasi web sederhana untuk mengelola dan menampilkan data siswa (khususnya kelas IX Rekayasa Perangkat Lunak). Aplikasi ini dibangun menggunakan PHP Native dan MySQL, serta dilengkapi fitur untuk mengekspor data laporan ke dalam format PDF menggunakan library FPDF.

## 📋 Fitur Utama

* **Menampilkan Data Siswa:** Membaca data siswa dari database MySQL dan menampilkannya dalam bentuk tabel HTML yang rapi.
* **Cetak PDF:** Fitur untuk mengunduh laporan data siswa dalam format `.pdf` siap cetak.
* **Styling:** Tampilan antarmuka yang bersih menggunakan CSS.
* **Database:** Penyimpanan data terpusat menggunakan MySQL.

## 🛠️ Teknologi yang Digunakan

* **Bahasa Pemrograman:** PHP (Native)
* **Database:** MySQL
* **Frontend:** HTML5, CSS3
* **Library:** FPDF (untuk generate PDF)
* **Server Environment:** XAMPP (Apache & MySQL)

## 📂 Struktur File

* `index.php`: Halaman utama yang menampilkan tabel daftar siswa.
* `connect.php`: Skript konfigurasi untuk menghubungkan PHP ke database MySQL.
* `print.php`: Script untuk memproses dan menghasilkan file PDF.
* `database.sql`: File SQL untuk membuat struktur tabel dan mengisi data dummy.
* `fpdf.css`: File CSS untuk styling tambahan (opsional).
