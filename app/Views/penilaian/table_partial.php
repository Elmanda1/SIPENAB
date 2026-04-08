<div id="ajaxTableContainer">
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th style="width: 150px;">Identitas (NIM)</th>
                    <th>Nama Kandidat</th>
                    <th style="text-align: center;">Status Penilaian</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $m): ?>
                    <?php
                    $count = isset($eval_counts[$m['id']]) ? $eval_counts[$m['id']] : 0;
                    ?>
                    <tr>
                        <td class="score-col">
                            <span class="rank-badge"
                                style="background: rgba(255,255,255,0.05); color: var(--text); padding: 4px 10px; border-radius: 6px; font-weight: 700;"><?= esc($m['nim']) ?></span>
                        </td>
                        <td style="font-weight: 600; text-transform: uppercase; font-size: 1.05rem;">
                            <?= esc($m['nama']) ?>
                        </td>
                        <td style="text-align: center;">
                            <?php if ($count > 0): ?>
                                <span class="rank-badge"
                                    style="background: rgba(16, 185, 129, 0.2); color: var(--success); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Tercatat:
                                    <?= $count ?> Metrik</span>
                            <?php else: ?>
                                <span class="rank-badge"
                                    style="background: rgba(245, 158, 11, 0.2); color: var(--warning); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Menunggu
                                    Input</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: right;">
                            <a href="<?= site_url('penilaian/new?mahasiswa_id=' . $m['id']) ?>" class="btn btn-primary"
                                style="padding: 0.5rem 1rem; font-size: 0.85rem;"><i class="ti ti-edit"></i> Perbarui
                                Matriks</a>
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
                            <p>Tidak ada kandidat mahasiswa yang terdaftar dalam sistem.</p>
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
