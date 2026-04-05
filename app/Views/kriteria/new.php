<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0; font-size: 8rem; line-height: 0.8;">Metric<br>Config</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Algorithm Parameter Configuration // SIPENAB_INPUT_NODE
        </div>
    </div>
</header>

<div class="brutalist-grid reveal" style="max-width: 600px;">
    <form action="<?= site_url('kriteria') ?>" method="POST">
        <div style="margin-bottom: 2.5rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ CRITERIA_CODE ]</label>
            <input type="text" name="kode_kriteria" placeholder="EX: C1" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none; text-transform: uppercase;">
        </div>

        <div style="margin-bottom: 2.5rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ METRIC_NAME ]</label>
            <input type="text" name="nama_kriteria" placeholder="EX: IPK" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none; text-transform: uppercase;">
        </div>

        <div style="margin-bottom: 2.5rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ WEIGHT_VALUE ]</label>
            <input type="number" step="0.01" name="bobot" placeholder="EX: 0.40" required 
                   style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none;">
        </div>

        <div style="margin-bottom: 3rem;">
            <label style="display: block; text-transform: uppercase; font-weight: 800; font-size: 0.8rem; color: var(--accent); margin-bottom: 0.5rem;">[ ALGORITHM_TYPE ]</label>
            <select name="tipe" required style="width: 100%; background: transparent; border: none; border-bottom: 4px solid var(--ink); padding: 1rem 0; font-family: var(--mono); font-size: 1.5rem; outline: none; text-transform: uppercase;">
                <option value="benefit">BENEFIT (MAXIMIZE)</option>
                <option value="cost">COST (MINIMIZE)</option>
            </select>
        </div>

        <div style="display: flex; gap: 2rem;">
            <button type="submit" class="btn">Commit_Parameter</button>
            <a href="<?= site_url('kriteria') ?>" style="display: flex; align-items: center; text-decoration: none; color: #666; font-weight: 800; font-size: 0.8rem; text-transform: uppercase;">[ ABORT_PROCESS ]</a>
        </div>
    </form>
</div>

<div class="stamp reveal" style="bottom: 10%; right: 10%; transform: rotate(10deg); opacity: 0.3;">CALCULATION_IMPACT</div>
<?= $this->endSection() ?>
