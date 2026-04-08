<?php # Komponen tabel mahasiswa ?>
<div id="ajaxTableContainer">
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
            <div style="color: var(--muted); font-size: 0.9rem;" id="totalCountDisplay">
                Menampilkan <strong><?= count($mahasiswa) ?></strong> dari total
                <strong><?= $pager->getTotal() ?></strong> kandidat
            </div>
            <div class="custom-pagination">
                <?= $pager->links() ?>
            </div>
        </div>
    <?php endif; ?>
</div>
