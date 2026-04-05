<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENAB // RANKING_DASHBOARD</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --bg: #0a0a0a;
            --surface: #1a1a1a;
            --accent: #ff0000;
            --text: #e0e0e0;
            --mono: 'JetBrains Mono', 'Fira Code', monospace;
            --border: #333;
        }

        * { box-sizing: border-box; }
        body {
            background: var(--bg);
            color: var(--text);
            font-family: var(--mono);
            margin: 0;
            padding: 2rem;
            line-height: 1.5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            border-bottom: 4px solid var(--accent);
            margin-bottom: 3rem;
            padding-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 900;
            letter-spacing: -2px;
            text-transform: uppercase;
        }

        .grid-layout {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 2rem;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 1.5rem;
        }

        .panel-header {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 0.8rem;
            color: var(--accent);
            margin-bottom: 1rem;
            border-bottom: 1px solid var(--border);
            padding-bottom: 0.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 0.75rem;
            text-transform: uppercase;
            font-size: 0.8rem;
            border-bottom: 2px solid var(--border);
        }

        td {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border);
            font-size: 1rem;
        }

        .rank-cell {
            font-weight: 900;
            color: var(--accent);
            width: 50px;
        }

        .score-bar-container {
            width: 100px;
            background: #333;
            height: 8px;
            display: inline-block;
            margin-left: 0.5rem;
        }

        .score-bar {
            height: 100%;
            background: var(--accent);
        }

        .id-strip {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 40px;
            background: var(--surface);
            writing-mode: vertical-rl;
            text-orientation: mixed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            color: #444;
            border-right: 1px solid var(--border);
        }
    </style>
</head>
<body>
    <div class="id-strip">SIPENAB_SYSTEM_v1.0 // PNJ_SCHOLARSHIP_ALGORITHM</div>
    
    <div class="container">
        <header>
            <div>
                <h1>Ranking // Results</h1>
            </div>
            <div style="text-align: right; font-size: 0.8rem; color: #666;">
                <div>DATE: <?= date('Y-m-d') ?></div>
                <div>ID: <?= strtoupper(substr(md5(time()), 0, 8)) ?></div>
            </div>
        </header>

        <div class="grid-layout">
            <div class="panel">
                <div class="panel-header">Result_Matrix</div>
                <table>
                    <thead>
                        <tr>
                            <th class="rank-cell">RK</th>
                            <th>Mahasiswa</th>
                            <th>NIM</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rankings as $row): ?>
                        <tr>
                            <td class="rank-cell">#<?= str_pad($row['ranking'], 2, '0', STR_PAD_LEFT) ?></td>
                            <td><?= esc($row['nama']) ?></td>
                            <td><code><?= esc($row['nim']) ?></code></td>
                            <td>
                                <?= number_format($row['total_nilai'], 4) ?>
                                <div class="score-bar-container">
                                    <div class="score-bar" style="width: <?= $row['total_nilai'] * 100 ?>%"></div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <div class="panel-header">Criteria_Distribution</div>
                <canvas id="criteriaChart"></canvas>
                <div style="margin-top: 1rem; font-size: 0.75rem;">
                    <?php foreach ($criteria as $c): ?>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.25rem; border-bottom: 1px dashed #333;">
                        <span><?= esc($c['nama_kriteria']) ?> (<?= strtoupper($c['tipe']) ?>)</span>
                        <span style="color: var(--accent);"><?= $c['bobot'] * 100 ?>%</span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('criteriaChart').getContext('2d');
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: <?= json_encode(array_column($criteria, 'kode_kriteria')) ?>,
                datasets: [{
                    label: 'Weight',
                    data: <?= json_encode(array_column($criteria, 'bobot')) ?>,
                    backgroundColor: 'rgba(255, 0, 0, 0.2)',
                    borderColor: 'rgba(255, 0, 0, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: '#ff0000'
                }]
            },
            options: {
                scales: {
                    r: {
                        angleLines: { color: '#333' },
                        grid: { color: '#333' },
                        pointLabels: { color: '#666', font: { family: 'JetBrains Mono' } },
                        ticks: { display: false }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
</body>
</html>
