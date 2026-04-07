<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <div>
        <h1 style="margin: 0; font-size: 3rem;">Data Mahasiswa</h1>
        <p style="color: var(--text-muted);">Manajemen Database Kandidat Beasiswa</p>
    </div>
    <div class="header-actions">
        <form method="get" action="<?= current_url() ?>">
            <label style="font-weight: 600;">Tampilkan</label>
            <select name="limit" onchange="this.form.submit()" class="form-control" style="min-width: 120px;">
                <option value="25" <?= isset($perPage) && $perPage === 25 ? 'selected' : '' ?>>25</option>
                <option value="50" <?= isset($perPage) && $perPage === 50 ? 'selected' : '' ?>>50</option>
                <option value="100" <?= isset($perPage) && $perPage === 100 ? 'selected' : '' ?>>100</option>
            </select>
            <span style="color: var(--text-muted);">entri per halaman</span>
        </form>
        <a href="<?= site_url('mahasiswa/new') ?>" class="btn btn-primary"><i class="ti ti-user-plus"></i> Tambah Kandidat</a>
    </div>
</div>

<div class="glass table-responsive" style="padding: 2rem;">
    <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-users"></i> Daftar Register Kandidat</h3>
    <table style="width: 100%;">
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
                <td>
                    <code style="background: var(--btn-bg); padding: 4px 8px; border-radius: 6px; font-weight: 600;"><?= esc($m['nim']) ?></code>
                </td>
                <td style="font-weight: 600; text-transform: uppercase;">
                    <a href="<?= site_url('mahasiswa/'.$m['id']) ?>" style="color: var(--text-main); text-decoration: none;">
                        <?= esc($m['nama']) ?>
                    </a>
                </td>
                <td style="color: var(--text-muted);">
                    <?= esc($m['email']) ?>
                </td>
                <td style="text-align: right;">
                    <div style="display: flex; justify-content: flex-end; gap: 0.5rem;">
                        <a href="<?= site_url('mahasiswa/edit/'.$m['id']) ?>" class="btn btn-glass" style="padding: 0.5rem 0.8rem; font-size: 0.85rem;" title="Edit"><i class="ti ti-edit"></i></a>
                        <button type="button" class="btn" style="background: var(--danger); color: white; padding: 0.5rem 0.8rem; font-size: 0.85rem;" onclick="showConfirmModal('<?= site_url('mahasiswa/delete/'.$m['id']) ?>', 'Apakah Anda yakin ingin menghapus mahasiswa <?= esc($m['nama']) ?>? Data yang dihapus tidak dapat dikembalikan.', 'Hapus Mahasiswa', 'ti-trash')" title="Hapus"><i class="ti ti-trash"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($mahasiswa)): ?>
                <tr>
                    <td colspan="4" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                        <i class="ti ti-database-x" style="font-size: 3rem; display: block; margin-bottom: 1rem;"></i>
                        Belum ada data mahasiswa yang terdaftar.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div style="margin-top: 1rem; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
    <div style="color: var(--text-muted); font-size: 0.95rem;">
        Menampilkan <strong><?= count($mahasiswa) ?></strong> dari total <strong><?= $pager->getTotal() ?></strong> kandidat
    </div>
    <div>
        <?= $pager->links() ?>
    </div>
</div>

<footer style="margin-top: 1rem; display: flex; justify-content: space-between; align-items: center; color: var(--text-muted); font-size: 0.85rem; flex-wrap: wrap; gap: 1rem; border:none; padding:0; background:transparent;">
    <div><i class="ti ti-server"></i> Total Entitas Aktif: <strong><?= $pager->getTotal() ?></strong></div>
</footer>
<?= $this->endSection() ?>
