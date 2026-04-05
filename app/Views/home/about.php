<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0;">Metodologi<br>// MESIN_SAW</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Simple Additive Weighting // Kerangka Kerja Matematika
        </div>
    </div>
</header>

<div class="grid-layout reveal" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
    <div class="brutalist-grid">
        <h3 style="text-transform: uppercase;">01_Normalisasi</h3>
        <p style="font-size: 0.9rem; line-height: 1.8;">
            Proses normalisasi mengubah data mentah menjadi skala yang dapat dibandingkan [0, 1]. Sistem secara otomatis mendeteksi tipe kriteria:
        </p>
        <div style="background: #eee; padding: 1rem; font-family: var(--mono); font-size: 0.8rem; margin-top: 1rem; border-left: 4px solid var(--accent);">
            <strong>BENEFIT:</strong> R<sub>ij</sub> = x<sub>ij</sub> / max(x<sub>ij</sub>)<br>
            <strong>COST:</strong> R<sub>ij</sub> = min(x<sub>ij</sub>) / x<sub>ij</sub>
        </div>
    </div>

    <div class="brutalist-grid">
        <h3 style="text-transform: uppercase;">02_Skor_Preferensi</h3>
        <p style="font-size: 0.9rem; line-height: 1.8;">
            Skor akhir dihitung dengan mengalikan nilai ternormalisasi dengan bobot masing-masing kriteria dan menjumlahkan hasilnya untuk setiap kandidat.
        </p>
        <div style="background: #eee; padding: 1rem; font-family: var(--mono); font-size: 0.8rem; margin-top: 1rem; border-left: 4px solid var(--accent);">
            V<sub>i</sub> = Σ (w<sub>j</sub> * R<sub>ij</sub>)
        </div>
    </div>

    <div class="brutalist-grid" style="background: var(--ink); color: var(--surface);">
        <h3 style="text-transform: uppercase; color: var(--accent);">03_Peringkat_Akhir</h3>
        <p style="font-size: 0.9rem; line-height: 1.8;">
            Kandidat diurutkan secara menurun berdasarkan nilai preferensi (V<sub>i</sub>) mereka. Nilai tertinggi menunjukkan kandidat tingkat atas untuk seleksi.
        </p>
    </div>
</div>

<div class="brutalist-grid reveal" style="margin-top: 4rem;">
    <h3 style="text-transform: uppercase;">Arsitektur_Sistem</h3>
    <div style="display: flex; flex-wrap: wrap; gap: 4rem; margin-top: 2rem;">
        <div>
            <div style="font-size: 0.7rem; color: #666;">FRAMEWORK</div>
            <div style="font-weight: 800;">CODEIGNITER_4.7</div>
        </div>
        <div>
            <div style="font-size: 0.7rem; color: #666;">PARADIGMA_UI</div>
            <div style="font-weight: 800;">EDITORIAL_BRUTALISM</div>
        </div>
        <div>
            <div style="font-size: 0.7rem; color: #666;">MESIN</div>
            <div style="font-weight: 800;">DETERMINISTIC_SAW_v1.0</div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
