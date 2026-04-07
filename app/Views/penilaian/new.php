<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">
            Evaluasi Kandidat</h1>
        <p style="color: var(--muted);">Input & pembaruan nilai matrik evaluasi untuk algoritma.</p>
    </div>
    <div>
        <a href="<?= site_url('penilaian') ?>" class="btn btn-glass"><i class="ti ti-arrow-left"></i> Batal &
            Kembali</a>
    </div>
</div>

<div class="bento-dashboard">
    <!-- Candidate Info Card -->
    <div class="bento-card col-12 col-lg-4"
        style="background: linear-gradient(135deg, var(--surface2), var(--surface)); border: 1px solid var(--border); color: var(--text); padding: 2.5rem;"
        data-aos="fade-right" data-aos-delay="100">
        <div
            style="background: rgba(59, 130, 246, 0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
            <i class="ti ti-user-check" style="font-size: 2.5rem; color: var(--accent);"></i>
        </div>
        <h3
            style="margin-bottom: 0.5rem; font-size: 1.5rem; text-transform: uppercase; font-family: 'Outfit', sans-serif; font-weight: 800;">
            <?= esc($mahasiswa['nama']) ?>
        </h3>
        <p
            style="font-family: 'JetBrains Mono', monospace; color: var(--muted); font-weight: 600; font-size: 0.95rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="ti ti-id text-accent"></i> <?= esc($mahasiswa['nim']) ?>
        </p>
    </div>

    <!-- Matrix Input Form -->
    <div class="bento-card glass-panel col-12 col-lg-8" style="padding: 2.5rem;" data-aos="fade-left"
        data-aos-delay="200">
        <h3
            style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border); font-size: 1.3rem;">
            <i class="ti ti-keyboard" style="color: var(--accent);"></i> Form Input Matriks Evaluasi
        </h3>

        <form action="<?= site_url('penilaian') ?>" method="POST">
            <input type="hidden" name="mahasiswa_id" value="<?= $mahasiswa['id'] ?>">

            <div style="overflow-x: auto; margin-bottom: 2.5rem;">
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
                                <td class="rank-col">
                                    <?= esc($k['kode_kriteria']) ?>
                                </td>
                                <td style="font-weight: 600; text-transform: uppercase;">
                                    <?= esc($k['nama_kriteria']) ?>
                                </td>
                                <td>
                                    <input type="number" step="0.01" name="nilai[<?= $k['id'] ?>]" class="form-control"
                                        value="<?= esc($currentVal) ?>" placeholder="Contoh: 85.5" required>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div style="display: flex; gap: 1rem; border-top: 1px solid var(--border); padding-top: 1.5rem;">
                <button type="submit" class="btn btn-primary" style="flex: 1; padding: 1rem;"><i
                        class="ti ti-device-floppy"></i> Simpan Data Evaluasi</button>
            </div>
        </form>
    </div>
</div>

<style>
    .bento-dashboard {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-auto-rows: minmax(100px, auto);
        gap: 1.5rem;
        padding-bottom: 4rem;
    }

    .bento-card {
        position: relative;
        border-radius: 32px;
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease;
        padding: 2rem;
        display: flex;
        flex-direction: column;
    }

    .col-12 {
        grid-column: span 12;
    }

    @media (min-width: 1024px) {
        .col-lg-4 {
            grid-column: span 4;
        }

        .col-lg-8 {
            grid-column: span 8;
        }
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1rem 1.5rem;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }

    th {
        font-weight: 600;
        color: var(--muted);
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        background: rgba(0, 0, 0, 0.02);
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background: rgba(255, 255, 255, 0.02);
    }

    .rank-col {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        color: var(--accent);
        font-size: 1.1rem;
    }

    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .text-accent {
        color: var(--accent);
    }
</style>
<?= $this->endSection() ?>