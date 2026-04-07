<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">Data
            Mahasiswa</h1>
        <p style="color: var(--muted);">Manajemen Database Kandidat Beasiswa</p>
    </div>
    <div style="display: flex; gap: 1rem; align-items: center;">
        <form method="get" action="<?= current_url() ?>" style="display: flex; align-items: center; gap: 0.5rem;">
            <label style="font-weight: 600; font-size: 0.9rem; color: var(--muted);">Tampilkan</label>
            <select name="limit" onchange="this.form.submit()" class="form-control"
                style="min-width: 80px; padding: 0.4rem 1rem; height: auto;">
                <option value="25" <?= isset($perPage) && $perPage === 25 ? 'selected' : '' ?>>25</option>
                <option value="50" <?= isset($perPage) && $perPage === 50 ? 'selected' : '' ?>>50</option>
                <option value="100" <?= isset($perPage) && $perPage === 100 ? 'selected' : '' ?>>100</option>
            </select>
        </form>
        <a href="<?= site_url('mahasiswa/new') ?>" class="btn btn-primary"><i class="ti ti-user-plus"></i> Tambah
            Kandidat</a>
    </div>
</div>

<div class="bento-dashboard">
    <div class="bento-card glass-panel col-12 row-4 table-container" data-aos="fade-up" data-aos-delay="100">
        <div class="table-header">
            <h3><i class="ti ti-users" style="color: var(--accent);"></i> Daftar Register Kandidat</h3>
            <div style="font-size: 0.85rem; color: var(--muted);"><i class="ti ti-server"></i> Total Kandidat:
                <strong><?= $pager->getTotal() ?></strong></div>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 150px;">Identitas (NIM)</th>
                        <th>Nama Kandidat</th>
                        <th>Alamat Email</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $m): ?>
                        <tr>
                            <td class="score-col">
                                <span class="rank-badge"
                                    style="background: rgba(255,255,255,0.05); color: var(--text); padding: 4px 10px; border-radius: 6px; font-weight: 700;"><?= esc($m['nim']) ?></span>
                            </td>
                            <td style="font-weight: 600; text-transform: uppercase; font-size: 1.05rem;">
                                <a href="<?= site_url('mahasiswa/' . $m['id']) ?>"
                                    style="color: var(--text); text-decoration: none; transition: color 0.3s ease;"
                                    onmouseover="this.style.color='var(--accent)'"
                                    onmouseout="this.style.color='var(--text)'">
                                    <?= esc($m['nama']) ?>
                                </a>
                            </td>
                            <td style="color: var(--muted); font-size: 0.95rem;">
                                <?= esc($m['email']) ?>
                            </td>
                            <td style="text-align: right;">
                                <div style="display: flex; justify-content: flex-end; gap: 0.5rem;">
                                    <a href="<?= site_url('mahasiswa/edit/' . $m['id']) ?>" class="btn btn-glass"
                                        style="padding: 0.5rem 0.8rem; font-size: 0.85rem; color: var(--accent); border-color: rgba(59, 130, 246, 0.3);"
                                        title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <button
                                        onclick="showConfirmModal('<?= site_url('mahasiswa/delete/' . $m['id']) ?>', 'Apakah Anda yakin ingin menghapus mahasiswa <?= esc($m['nama']) ?>? Data yang dihapus tidak dapat dikembalikan.', 'Hapus Mahasiswa', 'ti-trash')"
                                        class="btn btn-glass"
                                        style="padding: 0.5rem 0.8rem; font-size: 0.85rem; color: var(--danger); border-color: rgba(239, 68, 68, 0.3);"
                                        title="Hapus">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($mahasiswa)): ?>
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 4rem 2rem; color: var(--muted);">
                                <div
                                    style="background: rgba(255,255,255,0.05); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                                    <i class="ti ti-database-x" style="font-size: 2.5rem;"></i>
                                </div>
                                <h3
                                    style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--text);">
                                    Belum Ada Kandidat</h3>
                                <p>Silakan tambahkan data mahasiswa kandidat beasiswa.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if (!empty($mahasiswa)): ?>
            <div
                style="padding: 1.5rem; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem; border-top: 1px solid var(--border);">
                <div style="color: var(--muted); font-size: 0.9rem;">
                    Menampilkan <strong><?= count($mahasiswa) ?></strong> dari total
                    <strong><?= $pager->getTotal() ?></strong> kandidat
                </div>
                <div class="custom-pagination">
                    <?= $pager->links() ?>
                </div>
            </div>
        <?php endif; ?>
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

    /* Pagination Styling overriding default CI4 styles if any */
    .custom-pagination ul.pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 0.25rem;
    }

    .custom-pagination ul.pagination li a,
    .custom-pagination ul.pagination li span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 32px;
        height: 32px;
        padding: 0 0.5rem;
        border-radius: 8px;
        background: var(--glass);
        color: var(--text);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        border: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .custom-pagination ul.pagination li.active a,
    .custom-pagination ul.pagination li.active span {
        background: var(--accent);
        color: #fff;
        border-color: var(--accent);
    }

    .custom-pagination ul.pagination li a:hover {
        background: var(--surface2);
        border-color: var(--accent);
    }
</style>
<?= $this->endSection() ?>