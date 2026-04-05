<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0;">Perbarui<br>Registri</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Mengubah Entitas // IDENTIFIKASI: <?= esc($mahasiswa['nim']) ?>
        </div>
    </div>
</header>

<div class="brutalist-grid reveal" style="max-width: 600px;">
    <form action="<?= site_url('mahasiswa/update/'.$mahasiswa['id']) ?>" method="POST">
        <div style="margin-bottom: 2.5rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ IDENTIFIKASI_NIM ]</label>
            <input type="text" name="nim" value="<?= esc($mahasiswa['nim']) ?>" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none;">
        </div>

        <div style="margin-bottom: 2.5rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ NAMA_LENGKAP_RESMI ]</label>
            <input type="text" name="nama" value="<?= esc($mahasiswa['nama']) ?>" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none; text-transform: uppercase;">
        </div>

        <div style="margin-bottom: 3rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ ALAMAT_KOMUNIKASI ]</label>
            <input type="email" name="email" value="<?= esc($mahasiswa['email']) ?>" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none;">
        </div>

        <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
            <button type="submit" class="btn">Perbarui_Catatan_Entitas</button>
            <a href="<?= site_url('mahasiswa') ?>" style="display: flex; align-items: center; text-decoration: none; color: #666; font-weight: 800; font-size: 0.8rem; text-transform: uppercase;">[ BATALKAN_PROSES ]</a>
        </div>
    </form>
</div>

<div class="stamp reveal" style="bottom: 10%; right: 10%; transform: rotate(10deg); opacity: 0.3;">KUNCI_REGISTRI_DIBUKA</div>
<?= $this->endSection() ?>
