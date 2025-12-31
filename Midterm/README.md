# TravelGo - Platform Travel & Logistik Antar Kota

**TravelGo** adalah platform berbasis web yang menghubungkan penumpang dan pengirim paket dengan komunitas pengemudi travel serta penyewaan mobil lokal. Website ini dirancang untuk memberikan solusi transportasi yang cepat, aman, dan fleksibel dengan sistem transparansi harga.

## 🚀 Fitur Utama

Website ini mencakup beberapa halaman dengan fungsionalitas khusus:

* **Beranda (`index.html`)**: Ringkasan layanan, poin keuntungan, testimoni singkat, FAQ, dan formulir pemesanan interaktif.
* **Layanan (`layanan.html`)**: Detail tiga pilar layanan utama: Pesan Kursi Antar Kota, Sewa Armada/Charter, dan Kirim Paket/Titip Barang.
* **Keuntungan (`benefit.html`)**: Penjelasan mengenai jaringan komunitas luas, harga transparan, keamanan pelacakan, dan dukungan 24/7.
* **Testimoni (`testimoni.html`)**: Ulasan nyata dari pelanggan yang ditampilkan melalui komponen *carousel* interaktif dan grid kartu.
* **Promo (`promo.html`)**: Informasi penawaran khusus, termasuk diskon untuk pemesanan pertama.
* **Kontak (`kontak.html`)**: Detail lokasi kantor (integrasi Google Maps), layanan pelanggan, dan formulir pesan cepat.

## 🛠️ Fungsionalitas Teknis (JavaScript)

Website ini dilengkapi dengan sistem manajemen data pelanggan sederhana di sisi klien (*Client-Side*):

1.  **Manajemen Data (CRUD)**: Menggunakan `localStorage` untuk menyimpan, memuat, dan menghapus data pemesanan pelanggan secara persisten di browser.
2.  **Validasi Formulir**: Memastikan semua kolom input (Nama, Telepon, Asal, Tujuan, Layanan) terisi sebelum data diproses.
3.  **Ekspor Data**: Fitur untuk mengunduh data pelanggan yang tersimpan dalam format file `.csv`.
4.  **Notifikasi Toast**: Memberikan umpan balik visual instan (seperti "Data berhasil disimpan") menggunakan komponen Toast Bootstrap.
5.  **Efek Antarmuka**: Perubahan gaya *Navbar* secara otomatis saat pengguna melakukan scroll.

## 🎨 Teknologi yang Digunakan

* **HTML5 & CSS3**: Struktur dasar dengan kustomisasi variabel CSS untuk konsistensi warna (Primary: #2a6df4, Secondary: #f97316).
* **Bootstrap 5.3.x**: Digunakan untuk sistem grid responsif, navigasi, kartu, modal, dan akordion.
* **Bootstrap Icons**: Ikonografi untuk memperjelas informasi layanan dan fitur.
* **Google Fonts**: Menggunakan font *Poppins* untuk memberikan kesan modern dan profesional.
* **JavaScript (Vanilla JS)**: Logika bisnis untuk pengelolaan data dan interaksi DOM tanpa bergantung pada library berat.
