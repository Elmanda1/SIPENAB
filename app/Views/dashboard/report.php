<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>LAPORAN | SIPENAB PERINGKAT <?= date('Ymd') ?></title>
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            padding: 40px;
            color: #1f2937;
            background: #ffffff;
            margin: 0;
        }

        .header {
            border-bottom: 2px solid #e5e7eb;
            margin-bottom: 40px;
            padding-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 3rem;
            margin: 0;
            line-height: 1.1;
            color: #111827;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            border-bottom: 2px solid #1f2937;
            color: #4b5563;
            padding: 15px;
            text-align: left;
            text-transform: uppercase;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.05em;
        }

        td {
            border-bottom: 1px solid #e5e7eb;
            padding: 15px;
            font-weight: 500;
        }

        .action-bars {
            position: fixed;
            bottom: 30px;
            right: 40px;
            background: #ffffff;
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            gap: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border: 1px solid #e5e7eb;
            z-index: 100;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        button {
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-family: inherit;
            display: flex;
            align-items: center;
            gap: 8px;
            border: none;
            transition: opacity 0.2s;
        }

        button:hover {
            opacity: 0.9;
        }

        .btn-print { background: #2563eb; color: #fff; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3); }
        .btn-print:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4); }
        
        .btn-back { background: #fff; border: 1px solid #d1d5db; color: #374151; }
        .btn-back:hover { background: #f3f4f6; transform: translateY(-2px); }

        .tag-info {
            font-size: 0.85rem;
            color: #6b7280;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="no-print action-bars">
        <button class="btn-print" onclick="window.print()"><i class="ti ti-printer"></i> Cetak Laporan</button>
        <button class="btn-back" onclick="window.location.href='<?= site_url('dashboard') ?>'"><i
                class="ti ti-arrow-left"></i> Kembali ke Dashboard</button>
    </div>

    <div class="header">
        <div>
            <h1><i class="ti ti-file-certificate" style="color: #2563eb;"></i> Laporan Peringkat</h1>
            <div style="margin-top: 10px; font-weight: 600; color: #4b5563;">SIPENAB | ALOKASI BEASISWA PNJ</div>
        </div>
        <div style="text-align: right;">
            <div class="tag-info"><i class="ti ti-calendar"></i> TANGGAL: <?= date('d M Y') ?></div>
            <div class="tag-info"><i class="ti ti-clock"></i> WAKTU: <?= date('H:i:s') ?></div>
            <div class="tag-info"><i class="ti ti-hash"></i> REF: <?= strtoupper(substr(md5(time()), 0, 12)) ?></div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 80px;">RANK</th>
                <th style="width: 150px;">IDENTITAS (NIM)</th>
                <th>NAMA KANDIDAT</th>
                <th style="width: 150px; text-align: right;">SKOR AKHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rankings as $row): ?>
                <tr>
                    <td style="font-weight: 700; color: #2563eb;">#<?= str_pad($row['ranking'], 2, '0', STR_PAD_LEFT) ?>
                    </td>
                    <td><code
                            style="background: #f3f4f6; padding: 2px 6px; border-radius: 4px;"><?= esc($row['nim']) ?></code>
                    </td>
                    <td style="text-transform: uppercase;;"><?= esc($row['nama']) ?></td>
                    <td style="font-weight: 700; text-align: right;"><?= number_format($row['total_nilai'], 4) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 60px; display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
        <div>
            <div style="font-weight: 700; margin-bottom: 10px; font-size: 0.9rem;">SPESIFIKASI ALGORITMA:</div>
            <div style="font-size: 0.85rem; color: #4b5563; line-height: 1.8;">
                <div><i class="ti ti-math"></i> Metode: Simple Additive Weighting (SAW)</div>
                <div><i class="ti ti-checks"></i> Status: Hasil Final Seleksi</div>
            </div>
        </div>
        <div style="text-align: right;">
            <div style="margin-bottom: 80px; font-weight: 600; color: #4b5563;">PENANDATANGAN OTORITAS</div>
            <div
                style="border-top: 1px solid #1f2937; display: inline-block; width: 250px; padding-top: 10px; font-weight: 700;">
                ADMINISTRATOR SISTEM
            </div>
        </div>
    </div>
</body>

</html>