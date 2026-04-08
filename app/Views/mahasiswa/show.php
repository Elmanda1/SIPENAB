<?php # Halaman detail data mahasiswa ?>
<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">
            Profil Kandidat</h1>
        <p style="color: var(--muted);">Tinjauan mendalam untuk kandidat terpilih.</p>
    </div>
    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="<?= site_url('mahasiswa') ?>" class="btn btn-glass"><i class="ti ti-arrow-left"></i> Kembali</a>
        <a href="<?= site_url('penilaian/new?mahasiswa_id=' . $mahasiswa['id']) ?>" class="btn btn-primary"><i
                class="ti ti-checkups"></i> Evaluasi Kandidat</a>
    </div>
</div>

<div class="bento-dashboard">
    <!-- Personal Info Card -->
    <div class="bento-card col-12 col-lg-4"
        style="background: linear-gradient(135deg, var(--surface2), var(--surface)); border: 1px solid var(--border); color: var(--text);"
        data-aos="fade-right" data-aos-delay="100">
        <div
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border);">
            <div
                style="font-size: 1.3rem; font-weight: 800; text-transform: uppercase; font-family: 'Outfit', sans-serif;">
                Identitas Profil</div>
            <div
                style="background: rgba(59, 130, 246, 0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="ti ti-user-circle" style="font-size: 2.5rem; color: var(--accent);"></i>
            </div>
        </div>

        <div style="margin-bottom: 2rem;">
            <div
                style="font-size: 0.85rem; color: var(--muted); margin-bottom: 0.5rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                <i class="ti ti-id text-accent"></i> NIM</div>
            <div
                style="font-family: 'JetBrains Mono', monospace; font-size: 1.5rem; font-weight: 700; color: var(--text); background: rgba(0,0,0,0.1); padding: 0.5rem 1rem; border-radius: 12px; display: inline-block;">
                <?= esc($mahasiswa['nim']) ?></div>
        </div>

        <div style="margin-bottom: 2rem;">
            <div
                style="font-size: 0.85rem; color: var(--muted); margin-bottom: 0.5rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                <i class="ti ti-user text-accent"></i> Nama Lengkap</div>
            <div
                style="font-size: 2rem; font-weight: 800; text-transform: uppercase; font-family: 'Outfit', sans-serif; line-height: 1.1; color: var(--text);">
                <?= esc($mahasiswa['nama']) ?></div>
        </div>

        <div>
            <div
                style="font-size: 0.85rem; color: var(--muted); margin-bottom: 0.5rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                <i class="ti ti-mail text-accent"></i> Email Kontak</div>
            <div
                style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.1rem; color: var(--text); display: flex; align-items: center; gap: 0.5rem;">
                <div style="width: 8px; height: 8px; background: var(--success); border-radius: 50%;"></div>
                <?= esc($mahasiswa['email']) ?>
            </div>
        </div>
    </div>

    <!-- Evaluation Data -->
    <div class="bento-card glass-panel col-12 col-lg-8 table-container" data-aos="fade-left" data-aos-delay="200">
        <div class="table-header">
            <h3><i class="ti ti-clipboard-data" style="color: var(--accent);"></i> Data Evaluasi (Metrik SAW)</h3>
        </div>

        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Parameter Kriteria</th>
                        <th style="width: 150px; text-align: center;">Nilai Bobot</th>
                        <th style="width: 120px; text-align: center;">Sifat (Tipe)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($evaluations as $e): ?>
                        <tr>
                            <td style="font-weight: 600; font-size: 1.05rem;">
                                <?= esc($e['nama_kriteria']) ?>
                            </td>
                            <td class="score-col" style="text-align: center; color: var(--accent); font-size: 1.25rem;">
                                <?= esc($e['nilai']) ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if (strtolower($e['tipe']) === 'benefit'): ?>
                                    <span class="rank-badge"
                                        style="background: rgba(16, 185, 129, 0.2); color: var(--success); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Benefit</span>
                                <?php else: ?>
                                    <span class="rank-badge"
                                        style="background: rgba(239, 68, 68, 0.2); color: var(--danger); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Cost</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($evaluations)): ?>
                        <tr>
                            <td colspan="3" style="text-align: center; padding: 4rem 2rem; color: var(--muted);">
                                <div
                                    style="background: rgba(255,255,255,0.05); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                                    <i class="ti ti-clipboard-x" style="font-size: 2.5rem;"></i>
                                </div>
                                <h3
                                    style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--text);">
                                    Belum Dievaluasi</h3>
                                <p>Kandidat ini belum diberikan nilai evaluasi terhadap kriteria apapun.</p>
                                <a href="<?= site_url('penilaian/new?mahasiswa_id=' . $mahasiswa['id']) ?>"
                                    class="btn btn-primary" style="margin-top: 1.5rem;"><i class="ti ti-checkups"></i>
                                    Evaluasi Sekarang</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
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

    .table-container {
        padding: 0;
    }

    .table-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-header h3 {
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 1rem 2rem;
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

    .score-col {
        font-family: 'JetBrains Mono', monospace;
        font-weight: 700;
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