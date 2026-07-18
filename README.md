<p align="center">
  <img src="docs/Sipenab%20(2).png" alt="SIPENAB Landing Page" width="800">
</p>

<h1 align="center">SIPENAB</h1>
<h3 align="center">Sistem Pendukung Keputusan Pemilihan Beasiswa</h3>

<p align="center">
  <strong>Presisi dalam Setiap Keputusan</strong><br>
  Sistem berbasis algoritma <em>Simple Additive Weighting (SAW)</em> untuk seleksi beasiswa yang transparan, cepat, dan akurat.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/CodeIgniter-4.7-EF4223?style=flat&logo=codeigniter" alt="CodeIgniter">
  <img src="https://img.shields.io/badge/SQLite-003B57?style=flat&logo=sqlite" alt="SQLite">
  <img src="https://img.shields.io/badge/SAW-Algorithm-00B4D8?style=flat" alt="SAW">
  <img src="https://img.shields.io/badge/license-MIT-green" alt="License">
</p>

---

## 📋 Daftar Isi

- [Tentang SIPENAB](#tentang-sipenab)
- [Fitur Utama](#fitur-utama)
- [Alur Aplikasi](#alur-aplikasi)
- [Teknologi](#teknologi)
- [Screenshot](#screenshot)
- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Lisensi](#lisensi)

---

## 🎯 Tentang SIPENAB

**SIPENAB** adalah Sistem Pendukung Keputusan (SPK) yang dirancang untuk membantu institusi dalam menyeleksi penerima beasiswa secara objektif. Menggunakan algoritma **Simple Additive Weighting (SAW)** — metode Multi-Attribute Decision Making (MADM) yang terstandarisasi — SIPENAB mentransformasi data kandidat menjadi peringkat berbobot yang transparan dan dapat dipertanggungjawabkan.

**Mengapa SAW?** Metode ini dipilih karena kesederhanaannya, kecepatan kalkulasi (<1ms), dan kemampuannya menangani kriteria benefit/cost secara simultan.

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|---|---|
| **SAW Algorithm Engine** | Normalisasi & kalkulasi skor otomatis (benefit/cost) |
| **Manajemen Mahasiswa** | CRUD data kandidat (100+ entri) |
| **Manajemen Kriteria** | Bobot & tipe (benefit/cost) fleksibel: C1–C5 |
| **Input Penilaian** | Form evaluasi per kandidat per metrik |
| **Ranking Otomatis** | Peringkat lengkap dengan skor SAW |
| **Telemetri** | Panel statistik: total evaluasi, metode, distribusi |
| **Grafik Radar** | Visualisasi distribusi bobot kriteria |
| **Dark/Light Mode** | Toggle tema yang persist di localStorage |
| **Role-Based Access** | Dua role: `admin` & `operator` |
| **Laporan Cetak** | Halaman report ranking siap print |

---

## 🔄 Alur Aplikasi

```
Landing Page → Login → Dashboard (Ranking SAW)
                ↓
          Data Mahasiswa → Input Penilaian / Matriks → Bobot Kriteria
                ↓
          Evaluasi Kandidat → Hasil Ranking SAW
```

---

## 🖼️ Screenshot

### Halaman Depan

<p align="center">
  <img src="docs/Sipenab%20(2).png" alt="Landing Page" width="700">
  <br>
  <em>Landing page / Beranda — tagline "Presisi dalam Setiap Keputusan", deskripsi sistem berbasis algoritma SAW, tombol "Mulai Analisis" & "Lihat Metodologi", serta statistik: 100% Transparansi Data, <1ms Waktu Kalkulasi, SAW Standar Algoritma.</em>
</p>

### Autentikasi

<p align="center">
  <img src="docs/Sipenab%20(8).png" alt="Halaman Login" width="700">
  <br>
  <em>Halaman login "Gerbang Kendali SIPENAB" dengan form username & password, tersedia untuk role admin dan operator.</em>
</p>

### Dashboard — Ranking SAW

<p align="center">
  <img src="docs/Sipenab%20(3).png" alt="Ranking SAW Dark Mode" width="700">
  <br>
  <em>Halaman "Keputusan SAW" / Ranking SAW (dark mode). Menampilkan kandidat peringkat #1 (Lasmono Baktiadi Narpati, skor SAW 0.8095), daftar peringkat lengkap #2–#06, panel Telemetri (total evaluasi 100, metode SAW), dan grafik radar Distribusi Bobot kriteria (C1–C5).</em>
</p>

<p align="center">
  <img src="docs/Sipenab%20(9).png" alt="Ranking SAW Light Mode" width="700">
  <br>
  <em>Halaman Ranking SAW versi light mode, login sebagai "operator" dengan notifikasi sukses "Berhasil login sebagai operator".</em>
</p>

### Data Mahasiswa

<p align="center">
  <img src="docs/Sipenab%20(4).png" alt="Data Mahasiswa Dark Mode" width="700">
  <br>
  <em>Halaman "Data Mahasiswa" (dark mode). Tabel daftar register kandidat beasiswa (NIM, nama, email), total 100 kandidat, dengan tombol aksi edit/hapus dan "Tambah Kandidat".</em>
</p>

<p align="center">
  <img src="docs/Sipenab%20(10).png" alt="Data Mahasiswa Light Mode" width="700">
  <br>
  <em>Halaman Data Mahasiswa versi light mode, login sebagai operator.</em>
</p>

### Matriks Penilaian

<p align="center">
  <img src="docs/Sipenab%20(5).png" alt="Matriks Penilaian Dark Mode" width="700">
  <br>
  <em>Halaman "Matriks Penilaian" / Input Penilaian (dark mode). Rekapitulasi status evaluasi tiap kandidat — semua tercatat "5 Metrik", dengan tombol "Perbarui Matriks".</em>
</p>

<p align="center">
  <img src="docs/Sipenab%20(1).png" alt="Matriks Penilaian Light Mode" width="700">
  <br>
  <em>Halaman Matriks Penilaian versi light mode, login sebagai operator.</em>
</p>

### Evaluasi Kandidat

<p align="center">
  <img src="docs/Sipenab%20(6).png" alt="Evaluasi Kandidat" width="700">
  <br>
  <em>Halaman "Evaluasi Kandidat" — form input penilaian per kriteria (C1 IPK, C2 Penghasilan Ortu, C3 Jumlah Tanggungan, C4 Prestasi, C5 Organisasi) untuk kandidat Michelle Yuliana Suryatmi.</em>
</p>

### Bobot Kriteria

<p align="center">
  <img src="docs/Sipenab%20(7).png" alt="Data Kriteria" width="700">
  <br>
  <em>Halaman "Data Kriteria" / Bobot Kriteria. Tabel 5 kriteria SAW beserta bobot dan tipe (benefit/cost): C1 IPK (0.3, benefit), C2 Penghasilan Ortu (0.25, cost), C3 Tanggungan (0.15, benefit), C4 Prestasi (0.2, benefit), C5 Organisasi (0.1, benefit).</em>
</p>

---

## 🛠️ Teknologi

- **PHP 8.2+** — Bahasa pemrograman backend
- **CodeIgniter 4** — Framework PHP full-stack
- **SQLite3** — Database ringan tanpa konfigurasi
- **Chart.js** — Visualisasi grafik radar
- **Tabler Icons** — Ikon UI modern
- **AOS (Animate on Scroll)** — Animasi scroll
- **Glassmorphism CSS** — Desain UI kontemporer

---

## ⚙️ Instalasi

### Prasyarat

- PHP 8.2 atau lebih tinggi
- Composer
- Ekstensi PHP: `intl`, `mbstring`, `sqlite3`, `json`

### Langkah Instalasi

```bash
# Clone repositori
git clone https://github.com/username/sipenab.git
cd sipenab

# Install dependensi
composer install

# Copy environment
cp env .env

# Edit .env — sesuaikan baseURL
# app.baseURL = 'http://localhost:8080'

# Jalankan migrasi & seeder
php spark migrate --all
php spark db:seed UserSeeder
php spark db:seed MasterDssSeeder

# Jalankan server development
php spark serve
```

### Default Akun

| Role | Username | Password |
|---|---|---|
| Admin | `admin` | admin123 |
| Operator | `operator` | operator123 |

---

## 🚀 Pengembangan

```bash
# Menambahkan migration baru
php spark make:migration NamaMigration

# Menambahkan seeder
php spark make:seeder NamaSeeder

# Menjalankan semua seeder
php spark db:seed NamaSeeder

# Menghitung ulang ranking SAW (CLI)
php spark dss:analyze
```

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah **MIT License** — milik **SITOPSI**. Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

---

<p align="center">
  Dibuat dengan ❤️ oleh <strong>SITOPSI</strong> — <em>Presisi dalam Setiap Keputusan</em>
</p>
