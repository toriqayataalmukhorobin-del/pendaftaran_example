# 📝 Sistem Pendaftaran/Informasi sekolah (PHP Native)

<p align="center">
  <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&weight=600&size=24&pause=1000&color=36BCF7&center=true&vCenter=true&width=700&lines=Aplikasi+Pendaftaran+Berbasis+Web;Dibuat+dengan+PHP+Native+%26+MySQL;Sistem+Login+dan+Manajemen+Data" alt="Typing SVG" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Language-PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
  <img src="https://img.shields.io/badge/Status-Completed-success?style=for-the-badge" alt="Status" />
</p>

---

### 📝 Mengenai Projek
Aplikasi ini merupakan **Sistem Pendaftaran** mudah yang dibina menggunakan PHP Native dan pangkalan data MySQL. Sistem ini dilengkapi dengan fungsi log masuk, pendaftaran, pengemaskinian data, dan penghapusan rekod (CRUD) untuk pengurusan data pendaftaran secara efektif.

---

### 🚀 Ciri-Ciri Utama Aplikasi
- 🔐 **Sistem Log Masuk:** Proses pengesahan pengguna sebelum masuk ke dalam sistem (`proses-login.php`).
- 📥 **Form Pendaftaran:** Borang kemasukan data untuk pendaftaran baru (`proses-pendaftaran.php`).
- ✏️ **Kemaskini & Padam:** Fungsi untuk mengubah suai rekod (`proses-edit.php`) atau memadam data (`hapus.php`).
- 🗄️ **Sambungan Selamat:** Konfigurasi pangkalan data berpusat menggunakan MySQLi (`config.php`).

---

### 🛠️ Keperluan Sistem
- **PHP** >= 7.4
- **Database** MySQL / MariaDB
- **Local Server** XAMPP atau Laragon

---

## 💻 Panduan Pemasangan pada Local Server

Sila pilih salah satu panduan di bawah mengikut perisian *local server* yang anda gunakan (XAMPP atau Laragon):

### A. Menggunakan XAMPP (Folder `htdocs`)
1. **Muat Turun / Salin Projek:**
   Masukkan folder projek anda (contoh nama folder: `pendaftaran_example`) ke dalam direktori XAMPP:
   ```text
   C:\xampp\htdocs\pendaftaran_example

```
 2. **Aktifkan XAMPP Control Panel:**
   Buka XAMPP Control Panel dan klik butang **Start** pada **Apache** dan **MySQL**.
### B. Menggunakan Laragon (Folder www)
 1. **Muat Turun / Salin Projek:**
   Masukkan folder projek anda (contoh nama folder: pendaftaran_example) ke dalam direktori Laragon:
   ```text
   C:\laragon\www\pendaftaran_example
   
   ```
 2. **Aktifkan Laragon:**
   Buka perisian Laragon dan klik butang **Start All** untuk menjalankan Apache/Nginx dan MySQL.
## 🗄️ Konfigurasi Pangkalan Data (Database)
Selepas meletakkan fail projek pada server, ikuti langkah ini untuk menyediakan pangkalan data:
 1. Buka pelayar web anda dan layari: http://localhost/phpmyadmin
 2. Cipta satu pangkalan data baru yang kosong dengan nama: **pendaftaran** *(mengikut tetapan pada fail config.php anda)*.
 3. Import fail pangkalan data .sql anda (jika ada) ke dalam database tersebut. Jika tiada, pastikan anda mencipta jadual (*table*) yang sepadan dengan struktur input aplikasi.
## 🏃 Menyemak Aplikasi Semasa
Selepas semua langkah di atas selesai, anda boleh mengakses aplikasi tersebut melalui pautan berikut:
 * **Bagi Pengguna XAMPP:**
   👉 http://localhost/pendaftaran_example
 * **Bagi Pengguna Laragon:**
   👉 http://pendaftaran_example.test atau http://localhost/pendaftaran_example
## 📁 Struktur Fail Utama
 * config.php — Mengandungi kod sambungan ke pangkalan data MySQL.
 * index.php — Halaman utama atau laman utama paparan aplikasi.
 * proses-login.php & logout.php — Mengendalikan sistem keselamatan dan sesi pengguna.
 * proses-pendaftaran.php & proses-edit.php — Memproses logik kemasukan dan pengemaskinian data.
 * hapus.php — Menguruskan proses pemadaman rekod daripada pangkalan data.
```

```
