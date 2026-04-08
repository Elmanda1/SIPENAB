<?php # Halaman informasi kontak bantuan ?>
<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div style="max-width: 800px; margin: 0 auto; position: relative; padding-top: 2rem;">
    <!-- Back Button -->
    <a href="<?= site_url('/') ?>" class="btn btn-glass" style="display: inline-flex; margin-bottom: 2rem;">
        <i class="ti ti-arrow-left"></i> Kembali ke Beranda
    </a>

    <!-- Main Card -->
    <div class="glass" style="padding: 3rem; border-radius: 24px;">
        <div style="text-align: center; margin-bottom: 3rem;">
            <div
                style="background: rgba(37, 99, 235, 0.1); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <i class="ti ti-headset" style="font-size: 2.5rem; color: var(--accent);"></i>
            </div>
            <h1
                style="font-size: 2.5rem; font-weight: 800; color: var(--text-main); margin-bottom: 1rem; letter-spacing: -1px;">
                <?= esc($title) ?>
            </h1>
            <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 500px; margin: 0 auto;">
                Punya pertanyaan lebih lanjut atau mengalami masalah? Tim kami siap membantu Anda kapan saja.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
            <!-- Email -->
            <div
                style="background: var(--glass-bg); padding: 2rem; border-radius: 20px; border: 1px solid var(--glass-border); text-align: center;">
                <i class="ti ti-mail"
                    style="font-size: 2rem; color: var(--accent); margin-bottom: 1rem; display: block;"></i>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem; color: var(--text-main);">Email Support</h3>
                <p style="color: var(--text-muted); margin-bottom: 1rem;">Layanan 24/7 untuk bantuan teknis.</p>
                <a href="mailto:support@sipenab.id"
                    style="color: var(--accent); text-decoration: none; font-weight: 600;">support@sipenab.id</a>
            </div>

            <!-- Telepon -->
            <div
                style="background: var(--glass-bg); padding: 2rem; border-radius: 20px; border: 1px solid var(--glass-border); text-align: center;">
                <i class="ti ti-phone"
                    style="font-size: 2rem; color: var(--success); margin-bottom: 1rem; display: block;"></i>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem; color: var(--text-main);">Telepon</h3>
                <p style="color: var(--text-muted); margin-bottom: 1rem;">Senin - Jumat, 08:00 - 17:00 WIB.</p>
                <a href="tel:+6281234567890" style="color: var(--success); text-decoration: none; font-weight: 600;">+62
                    812-3456-7890</a>
            </div>

            <!-- Lokasi -->
            <div
                style="background: var(--glass-bg); padding: 2rem; border-radius: 20px; border: 1px solid var(--glass-border); text-align: center; grid-column: 1 / -1;">
                <i class="ti ti-map-pin"
                    style="font-size: 2rem; color: var(--warning); margin-bottom: 1rem; display: block;"></i>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem; color: var(--text-main);">Kantor Pusat</h3>
                <p style="color: var(--text-muted);">Jl. Jendral Sudirman No. 123, Jakarta, Indonesia 10220</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>