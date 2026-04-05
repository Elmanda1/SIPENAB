<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LAPORAN // SIPENAB_PERINGKAT_<?= date('Ymd') ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;800&family=Staatliches&display=swap');
        
        body {
            font-family: 'JetBrains Mono', monospace;
            padding: 40px;
            color: #000;
            background: #fff;
        }

        .header {
            border-bottom: 8px solid #000;
            margin-bottom: 40px;
            padding-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        h1 {
            font-family: 'Staatliches', cursive;
            font-size: 4rem;
            margin: 0;
            line-height: 0.8;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            border: 4px solid #000;
            background: #000;
            color: #fff;
            padding: 15px;
            text-align: left;
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        td {
            border: 2px solid #000;
            padding: 15px;
            font-weight: 800;
        }

        .stamp {
            border: 4px solid #000;
            padding: 10px 20px;
            display: inline-block;
            transform: rotate(-5deg);
            font-family: 'Staatliches', cursive;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        @media print {
            .no-print { display: none; }
            body { padding: 0; }
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #000; color: #fff; border: none; cursor: pointer; font-weight: 800;">[ EKSEKUSI_PERINTAH_CETAK ]</button>
        <button onclick="window.history.back()" style="padding: 10px 20px; background: #fff; color: #000; border: 2px solid #000; cursor: pointer; font-weight: 800; margin-left: 10px;">[ KEMBALI_KE_SISTEM ]</button>
    </div>

    <div class="stamp">RILIS_RESMI</div>

    <div class="header">
        <div>
            <h1>Laporan<br>Peringkat</h1>
            <div style="margin-top: 10px; font-weight: 800;">SIPENAB_v1.0 // ALOKASI_BEASISWA_PNJ</div>
        </div>
        <div style="text-align: right;">
            <div>TANGGAL: <?= date('Y-m-d') ?></div>
            <div>WAKTU: <?= date('H:i:s') ?></div>
            <div>REF: <?= strtoupper(substr(md5(time()), 0, 12)) ?></div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 80px;">RANK</th>
                <th style="width: 150px;">IDENTIFIKASI</th>
                <th>NAMA_KANDIDAT</th>
                <th style="width: 150px;">SKOR_AKHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rankings as $row): ?>
            <tr>
                <td>#<?= str_pad($row['ranking'], 2, '0', STR_PAD_LEFT) ?></td>
                <td><?= esc($row['nim']) ?></td>
                <td style="text-transform: uppercase;"><?= esc($row['nama']) ?></td>
                <td><?= number_format($row['total_nilai'], 4) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 60px; display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
        <div>
            <div style="font-size: 0.7rem; color: #666; margin-bottom: 40px;">SPESIFIKASI_ALGORITMA:</div>
            <div style="font-size: 0.8rem;">Metode: Simple Additive Weighting (SAW)<br>Verifikasi: Lulus_Deterministik<br>Status: Registri_Final</div>
        </div>
        <div style="text-align: right;">
            <div style="margin-bottom: 60px;">PENANDATANGAN_OTORITAS</div>
            <div style="border-top: 2px solid #000; display: inline-block; width: 250px; padding-top: 10px; font-weight: 800;">ADMINISTRATOR_SISTEM</div>
        </div>
    </div>
</body>
</html>
