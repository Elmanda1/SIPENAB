<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="stamp reveal" style="top: 10%; right: 10%;">EVAL_NODE</div>

<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0; font-size: 8rem; line-height: 0.8;">Evaluation<br>Matrix</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem; display: flex; justify-content: space-between; align-items: flex-start;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Database Management // Evaluation Node
        </div>
    </div>
</header>

<div class="brutalist-grid reveal" style="padding: 0;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: var(--ink); color: var(--surface);">
                <th style="padding: 1rem; text-align: left; width: 200px;">IDENTIFIER (NIM)</th>
                <th style="padding: 1rem; text-align: left;">CANDIDATE_NAME</th>
                <th style="padding: 1rem; text-align: center;">STATUS</th>
                <th style="padding: 1rem; text-align: right;">OPERATIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $m): ?>
            <?php 
                $count = isset($eval_counts[$m['id']]) ? $eval_counts[$m['id']] : 0;
                $statusColor = $count > 0 ? '#000' : '#ff3e00';
                $statusText = $count > 0 ? 'LOGGED: ' . $count . ' METRICS' : 'PENDING_INPUT';
            ?>
            <tr style="border-bottom: 2px solid var(--ink); transition: background 0.2s;" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='white'">
                <td style="padding: 2rem 1rem; font-family: var(--mono); font-weight: 800;">
                    <code><?= esc($m['nim']) ?></code>
                </td>
                <td style="padding: 2rem 1rem; font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
                    <?= esc($m['nama']) ?>
                </td>
                <td style="padding: 2rem 1rem; text-align: center; font-family: var(--mono); font-size: 0.9rem;">
                    <span style="background: <?= $statusColor ?>; color: #fff; padding: 0.2rem 0.5rem; font-weight: 800;">
                        <?= $statusText ?>
                    </span>
                </td>
                <td style="padding: 2rem 1rem; text-align: right;">
                    <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                        <a href="<?= site_url('penilaian/new?mahasiswa_id='.$m['id']) ?>" style="color: var(--ink); text-decoration: none; border: 2px solid var(--ink); padding: 0.5rem 1rem; font-weight: 800; font-size: 0.7rem;">[ UPDATE_MATRIX ]</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer class="reveal" style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center; color: #666; font-size: 0.8rem;">
    <div>LOADED_ENTITIES: <?= count($mahasiswa) ?></div>
    <div>ALGORITHM: READY_FOR_EVALUATION</div>
</footer>
<?= $this->endSection() ?>
