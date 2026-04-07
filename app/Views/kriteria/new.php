<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">
            Konfigurasi Kriteria</h1>
        <p style="color: var(--muted);">Tambahkan parameter metrik evaluasi untuk algoritma SAW</p>
    </div>
    <div>
        <a href="<?= site_url('kriteria') ?>" class="btn btn-glass"><i class="ti ti-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="bento-dashboard">
    <div class="bento-card glass-panel col-12 col-lg-8" style="margin: 0 auto; max-width: 800px; padding: 2.5rem;"
        data-aos="fade-up" data-aos-delay="100">
        <h3
            style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border); font-size: 1.3rem;">
            <i class="ti ti-settings" style="color: var(--accent);"></i> Form Kriteria Baru
        </h3>
        <form action="<?= site_url('kriteria') ?>" method="POST">
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-tag text-muted"></i> Kode Kriteria</label>
                <input type="text" name="kode_kriteria" class="form-control" placeholder="Contoh: C1" required
                    style="text-transform: uppercase;">
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-text-caption text-muted"></i> Nama Metrik Kriteria</label>
                <input type="text" name="nama_kriteria" class="form-control"
                    placeholder="Contoh: Indeks Prestasi Kumulatif" required style="text-transform: uppercase;">
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-weight text-muted"></i> Nilai Bobot (Desimal)</label>
                <input type="number" step="0.01" name="bobot" class="form-control" placeholder="Contoh: 0.40" required>
                <small style="color: var(--muted); display: block; margin-top: 0.5rem; font-size: 0.85rem;"><i
                        class="ti ti-info-circle"></i> Pastikan total keseluruhan bobot adalah 1.00 (100%)</small>
            </div>

            <div class="form-group" style="margin-bottom: 2.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-category text-muted"></i> Sifat / Tipe Kriteria</label>
                <select name="tipe" class="form-control" required style="text-transform: uppercase; cursor: pointer;">
                    <option value="benefit">Benefit (Harus Dimaksimalkan)</option>
                    <option value="cost">Cost (Harus Diminimalkan)</option>
                </select>
            </div>

            <div style="display: flex; gap: 1rem; border-top: 1px solid var(--border); padding-top: 1.5rem;">
                <button type="submit" class="btn btn-primary" style="flex: 1; padding: 1rem;"><i
                        class="ti ti-device-floppy"></i> Simpan Parameter Kriteria</button>
            </div>
        </form>
    </div>
</div>

<style>
    .bento-dashboard {
        display: block;
        padding-bottom: 4rem;
    }

    .bento-card {
        position: relative;
        border-radius: 32px;
        overflow: hidden;
        background: var(--surface);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid var(--border);
        box-shadow: var(--glass-shadow);
        display: flex;
        flex-direction: column;
    }

    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .form-group label i.text-muted {
        color: var(--accent);
        opacity: 0.8;
    }
</style>
<?= $this->endSection() ?>