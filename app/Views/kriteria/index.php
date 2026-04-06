<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <div>
        <h1 style="margin: 0; font-size: 3rem;">Data Kriteria</h1>
        <p style="color: var(--text-muted);">Manajemen Konfigurasi Bobot & Metrik Parameter SAW</p>
    </div>
    <div>
        <a href="<?= site_url('kriteria/new') ?>" class="btn btn-primary"><i class="ti ti-playlist-add"></i> Tambah Kriteria Baru</a>
    </div>
</div>

<div class="glass" style="padding: 2rem; overflow-x: auto;">
    <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-list"></i> Daftar Kriteria Evaluasi</h3>
    <table style="width: 100%; min-width: 600px;">
        <thead>
            <tr>
                <th style="width: 100px;">Kode</th>
                <th>Nama Kriteria</th>
                <th style="text-align: center;">Bobot</th>
                <th style="text-align: center;">Tipe</th>
                <th style="text-align: right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kriteria as $k): ?>
            <tr>
                <td style="font-weight: 800; color: var(--accent); font-family: var(--mono);">
                    <?= esc($k['kode_kriteria']) ?>
                </td>
                <td style="font-weight: 600; text-transform: uppercase;">
                    <?= esc($k['nama_kriteria']) ?>
                </td>
                <td style="text-align: center; font-weight: 800; font-family: var(--mono);">
                    <?= esc($k['bobot']) ?>
                </td>
                <td style="text-align: center;">
                    <?php if(strtolower($k['tipe']) === 'benefit'): ?>
                        <span style="background: rgba(16, 185, 129, 0.2); color: #10b981; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Benefit</span>
                    <?php else: ?>
                        <span style="background: rgba(239, 68, 68, 0.2); color: #ef4444; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Cost</span>
                    <?php endif; ?>
                </td>
                <td style="text-align: right;">
                    <a href="<?= site_url('kriteria/delete/'.$k['id']) ?>" class="btn" style="background: var(--danger); color: white; padding: 0.5rem 0.8rem; font-size: 0.85rem;" onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')" title="Hapus"><i class="ti ti-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($kriteria)): ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                        <i class="ti ti-database-x" style="font-size: 3rem; display: block; margin-bottom: 1rem;"></i>
                        Belum ada data kriteria yang terdaftar.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<footer style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center; color: var(--text-muted); font-size: 0.85rem; flex-wrap: wrap; gap: 1rem; border:none; padding:0; background:transparent;">
    <div><i class="ti ti-server"></i> Total Kriteria: <strong><?= count($kriteria) ?></strong></div>
</footer>
<?= $this->endSection() ?>
