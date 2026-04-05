<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0;">Entri<br>Data</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Node Input Evaluasi // KANDIDAT: <?= esc($mahasiswa['nama']) ?>
        </div>
        <div style="font-family: var(--mono); font-size: 0.9rem; margin-top: 0.5rem; color: var(--accent);">
            REF_ID: <code><?= esc($mahasiswa['nim']) ?></code>
        </div>
    </div>
</header>

<div class="brutalist-grid reveal" style="max-width: 800px;">
    <form action="<?= site_url('penilaian') ?>" method="POST">
        <input type="hidden" name="mahasiswa_id" value="<?= $mahasiswa['id'] ?>">

        <div class="table-wrapper" style="border: none;">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 3rem; min-width: 100%;">
                <thead>
                    <tr style="border-bottom: 4px solid var(--ink);">
                        <th style="padding: 1rem; text-align: left;">KODE_METRIK</th>
                        <th style="padding: 1rem; text-align: left;">NAMA_METRIK</th>
                        <th style="padding: 1rem; text-align: left;">NILAI_INPUT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kriteria as $k): ?>
                    <?php $currentVal = isset($existing_values[$k['id']]) ? $existing_values[$k['id']] : ''; ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 1.5rem 1rem; font-weight: 800; color: var(--accent); font-family: var(--mono);">
                            <?= esc($k['kode_kriteria']) ?>
                        </td>
                        <td style="padding: 1.5rem 1rem; font-weight: 800; text-transform: uppercase;">
                            <?= esc($k['nama_kriteria']) ?>
                        </td>
                        <td style="padding: 1.5rem 1rem;">
                            <input type="number" step="0.01" name="nilai[<?= $k['id'] ?>]" value="<?= esc($currentVal) ?>" placeholder="0.00" required 
                                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 0.5rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none;">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
            <button type="submit" class="btn">Simpan_Evaluasi</button>
            <a href="<?= site_url('penilaian') ?>" style="display: flex; align-items: center; text-decoration: none; color: #666; font-weight: 800; font-size: 0.8rem; text-transform: uppercase;">[ BATALKAN_PROSES ]</a>
        </div>
    </form>
</div>

<div class="stamp reveal" style="bottom: 10%; right: 10%; transform: rotate(-10deg); opacity: 0.3;">MENUNGGU_INPUT</div>
<?= $this->endSection() ?>
