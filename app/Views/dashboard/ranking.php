<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="stamp reveal" style="top: 5%; right: 5%; z-index: 10;">TOP_CANDIDATE</div>

<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0; font-size: 8rem; line-height: 0.8;">Rank<br>Index</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem; display: flex; justify-content: space-between; align-items: flex-start;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Scholarship Selection Results // SAW Method
        </div>
        <a href="<?= site_url('ranking/calculate') ?>" class="btn">Re-initialize_Algorithm</a>
    </div>
</header>

<?php if (!empty($rankings)): ?>
    <!-- HERO SECTION: RANK #01 -->
    <section class="reveal" style="margin-bottom: 4rem; display: grid; grid-template-columns: 300px 1fr; gap: 4px; background: var(--ink); border: 4px solid var(--ink);">
        <div style="background: var(--accent); color: var(--ink); padding: 2rem; display: flex; flex-direction: column; justify-content: space-between;">
            <div style="font-family: var(--display); font-size: 8rem; line-height: 1;">#01</div>
            <div style="font-weight: 800; font-size: 1.2rem; text-transform: uppercase;">Primary<br>Selection</div>
        </div>
        <div style="background: var(--surface); padding: 2rem; position: relative;">
            <div style="font-size: 0.8rem; color: #666; margin-bottom: 1rem;">CANDIDATE_DATA_ENCRYPTED</div>
            <h2 style="font-family: var(--display); font-size: 4rem; margin: 0; text-transform: uppercase;"><?= esc($rankings[0]['nama']) ?></h2>
            <div style="font-family: var(--mono); font-size: 1.5rem; margin-bottom: 2rem;"><code><?= esc($rankings[0]['nim']) ?></code></div>
            
            <div style="display: flex; gap: 4rem; align-items: flex-end;">
                <div>
                    <div style="font-size: 0.7rem; font-weight: 800; color: var(--accent);">AGGREGATE_SCORE</div>
                    <div style="font-size: 3rem; font-weight: 800; line-height: 1;"><?= number_format($rankings[0]['total_nilai'], 4) ?></div>
                </div>
                <div style="flex: 1;">
                    <div style="height: 20px; background: #eee; position: relative;">
                        <div style="height: 100%; background: var(--accent); width: <?= $rankings[0]['total_nilai'] * 100 ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MATRIX SECTION -->
    <div class="grid-layout reveal" style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 4rem; margin-bottom: 4rem;">
        <div>
            <h3 style="text-transform: uppercase; border-bottom: 4px solid var(--ink); padding-bottom: 0.5rem; margin-bottom: 2rem;">Full_Rank_Matrix</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="font-size: 0.7rem; text-align: left; color: #666;">
                        <th style="padding: 0.5rem 0;">RK</th>
                        <th>IDENTIFIER</th>
                        <th>SCORE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_slice($rankings, 1) as $row): ?>
                    <tr style="border-top: 1px solid #ddd;">
                        <td style="padding: 1.5rem 0; font-weight: 800; color: var(--accent);">#<?= str_pad($row['ranking'], 2, '0', STR_PAD_LEFT) ?></td>
                        <td>
                            <div style="font-weight: 800; text-transform: uppercase;"><?= esc($row['nama']) ?></div>
                            <div style="font-size: 0.7rem; color: #888;"><code><?= esc($row['nim']) ?></code></div>
                        </td>
                        <td style="font-weight: 800; text-align: right;">
                            <?= number_format($row['total_nilai'], 4) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div>
            <div class="brutalist-grid" style="margin-bottom: 2rem;">
                <h3 style="margin-top: 0; text-transform: uppercase; font-size: 0.9rem;">Criteria_Distribution</h3>
                <canvas id="criteriaChart" height="300"></canvas>
            </div>
            
            <div class="brutalist-grid" style="background: var(--ink); color: var(--surface);">
                <h3 style="margin-top: 0; text-transform: uppercase; font-size: 0.9rem; color: var(--accent);">System_Telemetry</h3>
                <div style="font-family: var(--mono); font-size: 0.7rem; line-height: 1.8;">
                    <div>> STATUS: OPERATIONAL</div>
                    <div>> ALGO: SAW_WEIGHTED</div>
                    <div>> NODES: <?= count($rankings) ?></div>
                    <div>> TIMESTAMP: <?= date('Ymd_His') ?></div>
                    <div style="margin-top: 1rem; color: var(--accent);">[SYSTEM_LOCKED_FOR_REVIEW]</div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="brutalist-grid reveal" style="padding: 4rem; text-align: center;">
        <h2 style="font-family: var(--display); font-size: 3rem;">NO_DATA_FOUND</h2>
        <p>Please run the calculation algorithm to generate results.</p>
        <a href="<?= site_url('ranking/calculate') ?>" class="btn">Initialize_Process</a>
    </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('criteriaChart').getContext('2d');
    new Chart(ctx, {
        type: 'radar',
        data: {
            labels: <?= json_encode(array_column($criteria, 'kode_kriteria')) ?>,
            datasets: [{
                data: <?= json_encode(array_column($criteria, 'bobot')) ?>,
                backgroundColor: 'rgba(255, 62, 0, 0.2)',
                borderColor: '#ff3e00',
                borderWidth: 3,
                pointBackgroundColor: '#000'
            }]
        },
        options: {
            scales: {
                r: {
                    angleLines: { color: '#000' },
                    grid: { color: '#ddd' },
                    pointLabels: { font: { family: 'JetBrains Mono', weight: 'bold', size: 10 } },
                    ticks: { display: false }
                }
            },
            plugins: { legend: { display: false } }
        }
    });
</script>
<?= $this->endSection() ?>
