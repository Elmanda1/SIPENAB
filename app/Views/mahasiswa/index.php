<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="stamp reveal" style="top: 10%; right: 10%;">REGISTRASI</div>

<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0;">Brankas<br>Mahasiswa</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem; display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Manajemen Database // Registri Kandidat
        </div>
        <a href="<?= site_url('mahasiswa/new') ?>" class="btn">Daftarkan_Entitas_Baru</a>
    </div>
</header>

<div class="table-wrapper reveal">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: var(--ink); color: var(--surface);">
                <th style="padding: 1rem; text-align: left; width: 200px;">IDENTIFIKASI (NIM)</th>
                <th style="padding: 1rem; text-align: left;">NAMA_KANDIDAT</th>
                <th style="padding: 1rem; text-align: left;">LINK_KOMUNIKASI</th>
                <th style="padding: 1rem; text-align: right;">OPERASI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $m): ?>
            <tr style="border-bottom: 2px solid var(--ink); transition: background 0.2s;" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='white'">
                <td style="padding: 2rem 1rem; font-family: var(--mono); font-weight: 800;">
                    <code><?= esc($m['nim']) ?></code>
                </td>
                <td style="padding: 2rem 1rem; font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
                    <a href="<?= site_url('mahasiswa/'.$m['id']) ?>" style="color: var(--ink); text-decoration: none; border-bottom: 2px solid transparent;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='transparent'">
                        <?= esc($m['nama']) ?>
                    </a>
                </td>
                <td style="padding: 2rem 1rem; font-family: var(--mono); font-size: 0.9rem;">
                    <?= esc($m['email']) ?>
                </td>
                <td style="padding: 2rem 1rem; text-align: right;">
                    <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                        <a href="<?= site_url('mahasiswa/edit/'.$m['id']) ?>" style="color: var(--ink); text-decoration: none; border: 2px solid var(--ink); padding: 0.5rem 1rem; font-weight: 800; font-size: 0.7rem;">[ UBAH ]</a>
                        <a href="<?= site_url('mahasiswa/delete/'.$m['id']) ?>" style="background: var(--accent); color: var(--ink); text-decoration: none; border: 2px solid var(--ink); padding: 0.5rem 1rem; font-weight: 800; font-size: 0.7rem;" onclick="return confirm('Konfirmasi penghapusan entitas?')">[ HAPUS ]</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer class="reveal" style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center; color: #666; font-size: 0.8rem; flex-wrap: wrap; gap: 1rem;">
    <div>ENTITAS_TERMUAT: <?= count($mahasiswa) ?></div>
    <div>ENKRIPSI: AES-256_AKTIF</div>
</footer>
<?= $this->endSection() ?>
