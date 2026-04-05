<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENAB // RANKING_DASHBOARD</title>
    <style>
        :root {
            --bg: #0a0a0a;
            --surface: #1a1a1a;
            --accent: #ff0000; /* Industrial red */
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

        .status-box {
            background: var(--accent);
            color: black;
            padding: 0.2rem 0.5rem;
            font-weight: bold;
            font-size: 0.8rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid var(--border);
        }

        th {
            background: var(--surface);
            text-align: left;
            padding: 1rem;
            text-transform: uppercase;
            font-size: 0.9rem;
            border-bottom: 2px solid var(--border);
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            font-size: 1.1rem;
        }

        tr:hover td {
            background: #222;
        }

        .rank-cell {
            font-weight: 900;
            color: var(--accent);
            width: 80px;
            font-size: 1.5rem;
            border-right: 2px solid var(--border);
        }

        .score-bar-container {
            width: 200px;
            background: #333;
            height: 12px;
            display: inline-block;
            margin-left: 1rem;
        }

        .score-bar {
            height: 100%;
            background: var(--accent);
        }

        .metadata {
            color: #666;
            font-size: 0.8rem;
            margin-top: 2rem;
            display: flex;
            gap: 2rem;
        }

        /* Differentiation Anchor: Vertical ID strip */
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
                <div class="status-box">SYSTEM_STABLE</div>
                <h1>Ranking // Results</h1>
            </div>
            <div style="text-align: right">
                <div>DATE: <?= date('Y-m-d') ?></div>
                <div>TIME: <?= date('H:i:s') ?></div>
            </div>
        </header>

        <table>
            <thead>
                <tr>
                    <th class="rank-cell">RK</th>
                    <th>Mahasiswa</th>
                    <th>NIM</th>
                    <th>Preference Score</th>
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

        <div class="metadata">
            <div>ALGORITHM: SIMPLE_ADDITIVE_WEIGHTING (SAW)</div>
            <div>STATUS: FINALIZED</div>
            <div>CHECKSUM: <?= md5(json_encode($rankings)) ?></div>
        </div>
    </div>
</body>
</html>
