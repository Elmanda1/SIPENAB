<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="page-header" style="margin-bottom: 2rem;">
    <div>
        <h1 style="margin: 0; font-size: 3rem;">Konfigurasi Kriteria</h1>
        <p style="color: var(--text-muted);">Tambahkan parameter metriks evaluasi untuk algoritma SAW.</p>
    </div>
    <div>
        <a href="<?= site_url('kriteria') ?>" class="btn btn-glass" style="font-size: 0.85rem;"><i class="ti ti-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="glass" style="max-width: 600px; padding: 3rem;">
    <h3 style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 1rem; border-bottom: 1px solid var(--glass-border);">
        <i class="ti ti-settings"></i> Form Kriteria Baru
    </h3>
    <form action="<?= site_url('kriteria') ?>" method="POST">
        <div class="form-group">
            <label><i class="ti ti-tag"></i> Kode Kriteria</label>
            <input type="text" name="kode_kriteria" class="form-control" placeholder="Contoh: C1" required style="text-transform: uppercase;">
        </div>

        <div class="form-group">
            <label><i class="ti ti-text-caption"></i> Nama Metrik Kriteria</label>
            <input type="text" name="nama_kriteria" class="form-control" placeholder="Contoh: Indeks Prestasi Kumulatif" required style="text-transform: uppercase;">
        </div>

        <div class="form-group">
            <label><i class="ti ti-weight"></i> Nilai Bobot (Desimal)</label>
            <input type="number" step="0.01" name="bobot" class="form-control" placeholder="Contoh: 0.40" required>
            <small style="color: var(--text-muted); display: block; margin-top: 0.3rem;">*Pastikan total persentase semua bobot pada akhirnya adalah 1.00 (100%)</small>
        </div>

        <div class="form-group">
            <label><i class="ti ti-category"></i> Sifat / Tipe Kriteria</label>
            <select name="tipe" class="form-control" required style="text-transform: uppercase;">
                <option value="benefit">Benefit (Harus Dimaksimalkan)</option>
                <option value="cost">Cost (Harus Diminimalkan)</option>
            </select>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 3rem;">
            <button type="submit" class="btn btn-primary" style="flex: 1;"><i class="ti ti-device-floppy"></i> Simpan Parameter</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
