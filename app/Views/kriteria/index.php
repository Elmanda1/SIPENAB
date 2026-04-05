<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="stamp reveal" style="top: 10%; right: 10%;">REGISTRI</div>

<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0;">Brankas<br>Kriteria</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem; display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Manajemen Database // Konfigurasi Bobot
        </div>
        <a href="<?= site_url('kriteria/new') ?>" class="btn">Tentukan_Metrik_Baru</a>
    </div>
</header>

<div class="table-wrapper reveal">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: var(--ink); color: var(--surface);">
                <th style="padding: 1rem; text-align: left; width: 100px;">KODE</th>
                <th style="padding: 1rem; text-align: left;">NAMA_METRIK</th>
                <th style="padding: 1rem; text-align: center;">BOBOT</th>
                <th style="padding: 1rem; text-align: center;">TIPE</th>
                <th style="padding: 1rem; text-align: right;">OPERASI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kriteria as $k): ?>
            <tr style="border-bottom: 2px solid var(--ink); transition: background 0.2s;" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='white'">
                <td style="padding: 2rem 1rem; font-family: var(--mono); font-weight: 800; color: var(--accent);">
                    <code><?= esc($k['kode_kriteria']) ?></code>
                </td>
                <td style="padding: 2rem 1rem; font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
                    <?= esc($k['nama_kriteria']) ?>
                </td>
                <td style="padding: 2rem 1rem; text-align: center; font-family: var(--mono); font-weight: 800;">
                    <?= esc($k['bobot']) ?>
                </td>
                <td style="padding: 2rem 1rem; text-align: center; font-weight: 800; text-transform: uppercase;">
                    <span style="background: <?= $k['tipe'] === 'benefit' ? '#000' : '#ff3e00' ?>; color: #fff; padding: 0.2rem 0.5rem; font-size: 0.8rem;">
                        <?= esc($k['tipe']) ?>
                    </span>
                </td>
                <td style="padding: 2rem 1rem; text-align: right;">
                    <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                        <a href="<?= site_url('kriteria/delete/'.$k['id']) ?>" style="background: var(--accent); color: var(--ink); text-decoration: none; border: 2px solid var(--ink); padding: 0.5rem 1rem; font-weight: 800; font-size: 0.7rem;" onclick="return confirm('Hapus kriteria?')">[ PURGE ]</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer class="reveal" style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center; color: #666; font-size: 0.8rem;">
    <div>METRIK_TERMUAT: <?= count($kriteria) ?></div>
    <div>ALGORITMA: BOBOT_SAW_SIAP</div>
</footer>
<?= $this->endSection() ?>
