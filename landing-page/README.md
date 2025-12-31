# Taman Flora Website

Proyek ini adalah sebuah website profil wisata **Taman Flora**, sebuah destinasi ruang hijau di Surabaya yang dirancang untuk rekreasi, edukasi, dan pelestarian lingkungan. Website ini dibangun menggunakan framework **Bootstrap 4** untuk memastikan tampilan yang responsif dan estetis.

## 🚀 Fitur Utama

Website ini terdiri dari 5 halaman utama dengan fungsionalitas berikut:

* **Beranda (`index.html`)**: Menampilkan *Jumbotron* selamat datang, panel informasi keunggulan taman (Buka setiap hari, spot foto, keamanan), serta testimoni pengunjung.
* **Informasi Tiket (`tiket.html`)**: Memberikan detail harga tiket masuk berdasarkan kategori usia dan informasi jam operasional.
* **Daftar Fasilitas (`fasilitas.html`)**: Menampilkan daftar fasilitas yang tersedia seperti taman bermain, area piknik, gazebo, kantin, hingga area jogging.
* **Tentang Kami (`tentang.html`)**: Menjelaskan misi dan visi Taman Flora sebagai sarana edukasi lingkungan dan rekreasi keluarga.
* **Kunjungi Kami & Form Tiket (`kunjungi.html`)**: 
    * Menampilkan informasi alamat lengkap, kontak, dan integrasi Google Maps.
    * **Fitur Interaktif**: Terdapat form pengisian data pengunjung yang secara otomatis menghitung harga tiket berdasarkan umur menggunakan JavaScript.

## 📊 Logika Penentuan Harga Tiket

Sistem pada halaman **Kunjungi Kami** menghitung harga tiket secara otomatis melalui modal hasil:
| Kategori Usia | Harga |
| :--- | :--- |
| < 3 Tahun | Gratis (Bayi) |
| 3 - 12 Tahun | Rp10.000 (Anak-anak) |
| > 12 Tahun | Rp20.000 (Dewasa) |

## 🛠️ Teknologi yang Digunakan

* **HTML5 & CSS3**: Struktur dasar dan kustomisasi gaya (melalui `style.css`).
* **Bootstrap 4.1.3**: Framework CSS untuk grid system, komponen navbar, jumbotron, tombol, dan modal.
* **Google Fonts**: Menggunakan font *Viga* untuk tipografi yang modern.
* **JavaScript (jQuery & Vanilla JS)**: Digunakan untuk interaktivitas Bootstrap (navbar toggler, modal) dan logika kalkulasi harga tiket.
* 
