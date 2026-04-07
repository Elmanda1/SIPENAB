<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div style="max-width: 800px; margin: 0 auto; position: relative; padding-top: 2rem;">
    <!-- Back Button -->
    <a href="<?= site_url('/') ?>" class="btn btn-glass" style="display: inline-flex; margin-bottom: 2rem;">
        <i class="ti ti-arrow-left"></i> Kembali ke Beranda
    </a>

    <!-- Main Card -->
    <div class="glass" style="padding: 3rem; border-radius: 24px;">
        <h1
            style="font-size: 2.5rem; font-weight: 800; color: var(--accent); margin-bottom: 1.5rem; letter-spacing: -1px;">
            <?= esc($title) ?>
        </h1>

        <div style="line-height: 1.8; color: var(--text-muted); font-size: 1.05rem;">
            <p style="margin-bottom: 1.5rem;">
                Selamat datang di halaman Panduan Penggunaan SIPENAB. SIPENAB dirancang untuk memudahkan proses seleksi
                penerimaan beasiswa menggunakan metode SAW.
            </p>

            <h3 style="color: var(--text-main); margin-bottom: 1rem; margin-top: 2rem;">1. Dashboard Mahasiswa</h3>
            <p style="margin-bottom: 1rem;">
                Pada halaman dashboard, Anda dapat melihat hasil akhir perhitungan dari seluruh kandidat. Sistem akan
                otomatis mengurutkan mahasiswa berdasarkan skor tertinggi (V) hingga terendah.
            </p>

            <h3 style="color: var(--text-main); margin-bottom: 1rem; margin-top: 2rem;">2. Manajemen Data Mahasiswa</h3>
            <p style="margin-bottom: 1rem;">
                Navigasi ke menu "Mahasiswa" untuk menambah, mengedit, atau menghapus data kandidat beasiswa. Pastikan
                seluruh data yang dimasukkan valid sebelum melakukan penilaian.
            </p>

            <h3 style="color: var(--text-main); margin-bottom: 1rem; margin-top: 2rem;">3. Kriteria Penilaian</h3>
            <p style="margin-bottom: 1rem;">
                Menu "Kriteria" digunakan oleh Admin untuk menentukan bobot dan jenis kriteria (Benefit / Cost). Bobot
                ini sangat berpengaruh terhadap hasil akhir seleksi.
            </p>

            <h3 style="color: var(--text-main); margin-bottom: 1rem; margin-top: 2rem;">4. Input Penilaian</h3>
            <p style="margin-bottom: 1rem;">
                Setelah data mahasiswa dan kriteria siap, masuk ke menu "Penilaian" untuk menginputkan nilai
                masing-masing mahasiswa terhadap setiap kriteria yang telah ditentukan. Sistem DSS akan bekerja secara
                otomatis setelah penilaian tersimpan.
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>