<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<style>
    .faq-item {
        border-bottom: 1px solid var(--glass-border);
        padding: 1.5rem 0;
    }

    .faq-item:last-child {
        border-bottom: none;
    }

    .faq-question {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--text-main);
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 0.8rem;
    }

    .faq-question i {
        color: var(--accent);
        font-size: 1.4rem;
    }

    .faq-answer {
        color: var(--text-muted);
        line-height: 1.7;
        padding-left: 2.2rem;
    }
</style>

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
        <p style="color: var(--text-muted); margin-bottom: 2rem; font-size: 1.05rem;">
            Temukan jawaban dari pertanyaan yang sering ditanyakan seputar sistem SIPENAB.
        </p>

        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question">
                    <i class="ti ti-question-mark"></i> Bagaimana cara menambahkan kriteria baru?
                </div>
                <div class="faq-answer">
                    Kriteria baru hanya dapat ditambahkan oleh pengguna dengan hak akses "Admin". Silakan menuju menu
                    "Kriteria", lalu klik tombol "Tambah Kriteria".
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="ti ti-question-mark"></i> Apa perbedaan tipe kriteria Benefit dan Cost?
                </div>
                <div class="faq-answer">
                    Kriteria <strong>Benefit</strong> berarti semakin besar nilainya, semakin baik (contoh: IPK).
                    Sebaliknya, <strong>Cost</strong> berarti semakin kecil nilainya, semakin baik (contoh: Pendapatan
                    Orang Tua).
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="ti ti-question-mark"></i> Mengapa saya tidak bisa melihat hasil perhitungan?
                </div>
                <div class="faq-answer">
                    Hasil perhitungan akan muncul di dashboard utama setelah ada data mahasiswa yang diberikan
                    penilaian, dan kriteria sistem telah tersetting lengkap dengan nilai bobot.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="ti ti-question-mark"></i> Apakah data mahasiswa bisa dihapus?
                </div>
                <div class="faq-answer">
                    Ya, data mahasiswa dapat dihapus melalui menu "Mahasiswa", lalu klik tombol hapus (ikon tempat
                    sampah) pada baris mahasiswa yang ingin dihapus. Perhatikan bahwa aksi ini permanen.
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>