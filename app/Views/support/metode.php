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
                SIPENAB menggunakan algoritma <strong>Simple Additive Weighting (SAW)</strong> yang merupakan salah satu
                metode paling terpercaya dalam sistem pendukung keputusan (Decision Support System).
            </p>

            <h3 style="color: var(--text-main); margin-bottom: 1rem; margin-top: 2rem;">Konsep Dasar SAW</h3>
            <p style="margin-bottom: 1rem;">
                Metode SAW sering juga dikenal dengan istilah metode penjumlahan terbobot. Konsep dasar metode SAW
                adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif pada semua atribut
                (kriteria).
            </p>

            <div
                style="background: rgba(37, 99, 235, 0.05); padding: 1.5rem; border-radius: 16px; border: 1px solid rgba(37, 99, 235, 0.2); margin: 2rem 0;">
                <h4 style="color: var(--accent); margin-bottom: 0.5rem; font-size: 1.1rem;">Langkah-langkah SAW:</h4>
                <ol style="margin-left: 1.5rem;">
                    <li style="margin-bottom: 0.5rem;">Menentukan kriteria-kriteria yang akan dijadikan acuan dalam
                        pengambilan keputusan.</li>
                    <li style="margin-bottom: 0.5rem;">Menentukan bobot referensi dari setiap kriteria.</li>
                    <li style="margin-bottom: 0.5rem;">Menentukan rating kecocokan setiap alternatif (kandidat) pada
                        setiap kriteria.</li>
                    <li style="margin-bottom: 0.5rem;">Membuat matriks keputusan berdasarkan kriteria, kemudian
                        melakukan normalisasi elemen matriks.</li>
                    <li style="margin-bottom: 0.5rem;">Proses perankingan (perkalian matriks normalisasi dengan bobot).
                    </li>
                </ol>
            </div>

            <p style="margin-bottom: 1.5rem;">
                Dengan formula matriks tersebut, sistem dapat memberikan skor presisi secara objektif berdasarkan bobot
                tingkat kepentingan (preferensi) yang telah ditentukan oleh pihak penyelenggara beasiswa.
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>