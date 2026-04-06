<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="page-header" style="margin-bottom: 2rem;">
    <div>
        <h1 style="margin: 0; font-size: 3rem;">Matriks Penilaian</h1>
        <p style="color: var(--text-muted);">Pemantauan Evaluasi dan Skor Kandidat</p>
    </div>
</div>

<div class="glass" style="padding: 2rem; overflow-x: auto;">
    <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-clipboard-data"></i> Rekapitulasi Data Evaluasi</h3>
    <table style="width: 100%; min-width: 700px;">
        <thead>
            <tr>
                <th style="width: 150px;">Identitas (NIM)</th>
                <th>Nama Kandidat</th>
                <th style="text-align: center;">Status Penilaian</th>
                <th style="text-align: right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $m): ?>
            <?php 
                $count = isset($eval_counts[$m['id']]) ? $eval_counts[$m['id']] : 0;
            ?>
            <tr>
                <td>
                    <code style="background: var(--btn-bg); padding: 4px 8px; border-radius: 6px; font-weight: 600;"><?= esc($m['nim']) ?></code>
                </td>
                <td style="font-weight: 600; text-transform: uppercase;">
                    <?= esc($m['nama']) ?>
                </td>
                <td style="text-align: center;">
                    <?php if($count > 0): ?>
                        <span style="background: rgba(16, 185, 129, 0.2); color: #10b981; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Tercatat: <?= $count ?> Metrik</span>
                    <?php else: ?>
                        <span style="background: rgba(245, 158, 11, 0.2); color: #f59e0b; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Menunggu Input</span>
                    <?php endif; ?>
                </td>
                <td style="text-align: right;">
                    <a href="<?= site_url('penilaian/new?mahasiswa_id='.$m['id']) ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.85rem;"><i class="ti ti-edit"></i> Perbarui Matriks</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($mahasiswa)): ?>
                <tr>
                    <td colspan="4" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                        <i class="ti ti-database-x" style="font-size: 3rem; display: block; margin-bottom: 1rem;"></i>
                        Tidak ada kandidat mahasiswa yang terdaftar dalam sistem.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<footer style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center; color: var(--text-muted); font-size: 0.85rem; flex-wrap: wrap; gap: 1rem; border:none; padding:0; background:transparent;">
    <div><i class="ti ti-server"></i> Total Kandidat Dimuat: <strong><?= count($mahasiswa) ?></strong></div>
</footer>
<?= $this->endSection() ?>
