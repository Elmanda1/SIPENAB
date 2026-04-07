<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="page-header" style="margin-bottom: 2rem;">
    <div>
        <h1 style="margin: 0; font-size: 3rem;">Evaluasi Kandidat</h1>
        <p style="color: var(--text-muted);">Input & pembaruan nilai matrik evaluasi untuk algoritma.</p>
    </div>
    <div>
        <a href="<?= site_url('penilaian') ?>" class="btn btn-glass" style="font-size: 0.85rem;"><i class="ti ti-arrow-left"></i> Batal & Kembali</a>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
    <div class="glass" style="padding: 2.5rem; background: var(--text-main); color: var(--bg-color);">
        <h3 style="margin-bottom: 0.5rem; font-size: 1.5rem; text-transform: uppercase;">
            <?= esc($mahasiswa['nama']) ?>
        </h3>
        <p style="font-family: var(--mono); color: rgba(255,255,255,0.7);">
            <i class="ti ti-id"></i> NIM: <?= esc($mahasiswa['nim']) ?>
        </p>
    </div>

    <div class="glass" style="padding: 3rem;">
        <h3 style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 1rem; border-bottom: 1px solid var(--glass-border);">
            <i class="ti ti-keyboard"></i> Form Input Matriks Evaluasi
        </h3>

        <form action="<?= site_url('penilaian') ?>" method="POST">
            <input type="hidden" name="mahasiswa_id" value="<?= $mahasiswa['id'] ?>">

            <div style="overflow-x: auto; margin-bottom: 3rem;">
                <div class="evaluation-matrix">
                    <table style="width: 100%; min-width: 500px;">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Kode</th>
                                <th>Nama Metrik / Kriteria</th>
                                <th style="width: 250px;">Nilai Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kriteria as $k): ?>
                            <?php $currentVal = isset($existing_values[$k['id']]) ? $existing_values[$k['id']] : ''; ?>
                            <tr>
                                <td style="font-weight: 800; color: var(--accent); font-family: var(--mono);">
                                    <?= esc($k['kode_kriteria']) ?>
                                </td>
                                <td style="font-weight: 600; text-transform: uppercase;">
                                    <?= esc($k['nama_kriteria']) ?>
                                </td>
                                <td>
                                    <input type="number" step="0.01" name="nilai[<?= $k['id'] ?>]" class="form-control" value="<?= esc($currentVal) ?>" placeholder="Contoh: 85.5" required>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary" style="padding: 1rem 2rem;"><i class="ti ti-device-floppy"></i> Simpan Data Evaluasi</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
