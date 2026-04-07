<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">Data
            Kriteria</h1>
        <p style="color: var(--muted);">Manajemen Konfigurasi Bobot & Metrik Parameter SAW</p>
    </div>
    <div>
        <a href="<?= site_url('kriteria/new') ?>" class="btn btn-primary"><i class="ti ti-playlist-add"></i> Tambah
            Kriteria</a>
    </div>
</div>

<div class="bento-dashboard">
    <div class="bento-card glass-panel col-12 row-4 table-container" data-aos="fade-up" data-aos-delay="100">
        <div class="table-header">
            <h3><i class="ti ti-list" style="color: var(--accent);"></i> Daftar Kriteria Evaluasi</h3>
            <div style="font-size: 0.85rem; color: var(--muted);"><i class="ti ti-server"></i> Total Kriteria:
                <strong><?= count($kriteria) ?></strong></div>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 100px;">Kode</th>
                        <th>Nama Kriteria</th>
                        <th style="text-align: center;">Bobot</th>
                        <th style="text-align: center;">Tipe</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kriteria as $k): ?>
                        <tr>
                            <td class="rank-col">
                                <?= esc($k['kode_kriteria']) ?>
                            </td>
                            <td style="font-weight: 600; text-transform: uppercase;">
                                <?= esc($k['nama_kriteria']) ?>
                            </td>
                            <td class="score-col" style="text-align: center;">
                                <?= esc($k['bobot']) ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if (strtolower($k['tipe']) === 'benefit'): ?>
                                    <span class="rank-badge"
                                        style="background: rgba(16, 185, 129, 0.2); color: var(--success); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Benefit</span>
                                <?php else: ?>
                                    <span class="rank-badge"
                                        style="background: rgba(239, 68, 68, 0.2); color: var(--danger); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Cost</span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right;">
                                <button
                                    onclick="showConfirmModal('<?= site_url('kriteria/delete/' . $k['id']) ?>', 'Apakah Anda yakin ingin menghapus kriteria ini secara permanen?', 'Hapus Kriteria', 'ti-trash')"
                                    class="btn btn-glass"
                                    style="padding: 0.5rem 0.8rem; font-size: 0.85rem; color: var(--danger); border-color: rgba(239, 68, 68, 0.3);"
                                    title="Hapus">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($kriteria)): ?>
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 4rem 2rem; color: var(--muted);">
                                <div
                                    style="background: rgba(255,255,255,0.05); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                                    <i class="ti ti-database-x" style="font-size: 2.5rem;"></i>
                                </div>
                                <h3
                                    style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--text);">
                                    Belum Ada Kriteria</h3>
                                <p>Silakan tambahkan data kriteria untuk memulai evaluasi SAW.</p>
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

    .rank-col {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        color: var(--accent);
        font-size: 1.1rem;
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
</style>
<?= $this->endSection() ?>