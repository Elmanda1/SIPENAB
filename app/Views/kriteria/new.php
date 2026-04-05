<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0;">Konfig<br>Metrik</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Konfigurasi Parameter Algoritma // NODE_INPUT_SIPENAB
        </div>
    </div>
</header>

<div class="brutalist-grid reveal" style="max-width: 600px;">
    <form action="<?= site_url('kriteria') ?>" method="POST">
        <div style="margin-bottom: 2.5rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ KODE_KRITERIA ]</label>
            <input type="text" name="kode_kriteria" placeholder="CTH: C1" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none; text-transform: uppercase;">
        </div>

        <div style="margin-bottom: 2.5rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ NAMA_METRIK ]</label>
            <input type="text" name="nama_kriteria" placeholder="CTH: IPK" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none; text-transform: uppercase;">
        </div>

        <div style="margin-bottom: 2.5rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ NILAI_BOBOT ]</label>
            <input type="number" step="0.01" name="bobot" placeholder="CTH: 0.40" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none;">
        </div>

        <div style="margin-bottom: 3rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ TIPE_ALGORITMA ]</label>
            <select name="tipe" required style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none; text-transform: uppercase;">
                <option value="benefit">BENEFIT (MAKSIMALKAN)</option>
                <option value="cost">COST (MINIMALKAN)</option>
            </select>
        </div>

        <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
            <button type="submit" class="btn">Simpan_Parameter</button>
            <a href="<?= site_url('kriteria') ?>" style="display: flex; align-items: center; text-decoration: none; color: #666; font-weight: 800; font-size: 0.8rem; text-transform: uppercase;">[ BATALKAN_PROSES ]</a>
        </div>
    </form>
</div>

<div class="stamp reveal" style="bottom: 10%; right: 10%; transform: rotate(10deg); opacity: 0.3;">DAMPAK_PERHITUNGAN</div>
<?= $this->endSection() ?>
