<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0;">Matriks<br>Profil</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Pemindaian Mendalam Kandidat // IDENTIFIKASI: <?= esc($mahasiswa['nim']) ?>
        </div>
    </div>
</header>

<div class="grid-layout reveal" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 4rem; margin-bottom: 4rem;">
    <!-- Personal Info -->
    <div class="brutalist-grid" style="background: var(--ink); color: var(--surface);">
        <div style="font-family: var(--display); font-size: 2rem; color: var(--accent); margin-bottom: 2rem;">INFO_ENTITAS</div>
        <div style="margin-bottom: 2rem;">
            <div style="font-size: 0.7rem; color: #888;">NAMA_LENGKAP</div>
            <div style="font-size: 1.5rem; font-weight: 800; text-transform: uppercase;"><?= esc($mahasiswa['nama']) ?></div>
        </div>
        <div style="margin-bottom: 2rem;">
            <div style="font-size: 0.7rem; color: #888;">IDENTIFIKASI_NIM</div>
            <div style="font-size: 1.2rem; font-family: var(--mono);"><?= esc($mahasiswa['nim']) ?></div>
        </div>
        <div>
            <div style="font-size: 0.7rem; color: #888;">ALAMAT_KOMUNIKASI</div>
            <div style="font-size: 1rem; font-family: var(--mono);"><?= esc($mahasiswa['email']) ?></div>
        </div>
    </div>

    <!-- Evaluation Data -->
    <div class="brutalist-grid">
        <h3 style="text-transform: uppercase; margin-top: 0;">Data_Terlog_Evaluasi</h3>
        <div class="table-wrapper" style="border: none;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 2rem; min-width: 100%;">
                <thead>
                    <tr style="font-size: 0.7rem; text-align: left; color: #666; border-bottom: 2px solid var(--ink);">
                        <th style="padding: 0.5rem 0;">METRIK</th>
                        <th style="padding: 0.5rem 0;">NILAI_TERCATAT</th>
                        <th style="padding: 0.5rem 0;">TIPE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($evaluations as $e): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 1.5rem 0; font-weight: 800;"><?= esc($e['nama_kriteria']) ?></td>
                        <td style="padding: 1.5rem 0; font-family: var(--mono); font-weight: 800; font-size: 1.2rem;"><?= esc($e['nilai']) ?></td>
                        <td style="padding: 1.5rem 0;">
                            <span style="font-size: 0.7rem; background: #000; color: #fff; padding: 0.2rem 0.5rem; text-transform: uppercase;">
                                <?= esc($e['tipe']) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (empty($evaluations)): ?>
                    <tr>
                        <td colspan="3" style="padding: 2rem 0; text-align: center; color: var(--accent); font-weight: 800;">[ KEGAGALAN_PEMULIHAN_DATA ]</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div style="display: flex; gap: 2rem; flex-wrap: wrap;" class="reveal">
    <a href="<?= site_url('mahasiswa/edit/'.$mahasiswa['id']) ?>" class="btn">Ubah_Registri</a>
    <a href="<?= site_url('penilaian/new?mahasiswa_id='.$mahasiswa['id']) ?>" class="btn" style="background: var(--surface); color: var(--ink); border: 2px solid var(--ink);">[ RE-EVALUASI ]</a>
    <a href="<?= site_url('mahasiswa') ?>" style="display: flex; align-items: center; text-decoration: none; color: #666; font-weight: 800; font-size: 0.8rem; text-transform: uppercase;">[ KEMBALI_KE_BRANKAS ]</a>
</div>
<?= $this->endSection() ?>
