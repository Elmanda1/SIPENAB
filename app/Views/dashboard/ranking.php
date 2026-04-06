<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <div>
        <h1 style="margin: 0; font-size: 3rem;">Hasil Seleksi</h1>
        <p style="color: var(--text-muted);">Indeks Peringkat // Metode SAW</p>
    </div>
    <div style="display: flex; gap: 1rem;">
        <a href="<?= site_url('dashboard/report') ?>" class="btn btn-glass" target="_blank"><i class="ti ti-printer"></i> Cetak Laporan</a>
        <button class="btn btn-primary" onclick="showConfirmModal('<?= site_url('ranking/calculate') ?>', 'Sistem akan memproses matriks penilaian dan memperbarui seluruh peringkat kandidat. Lanjutkan proses?', 'Kalkulasi SAW', 'ti-lambda')"><i class="ti ti-refresh"></i> Hitung Ulang SAW</button>
    </div>
</div>

<?php if (!empty($rankings)): ?>
    <!-- HERO SECTION: RANK #01 -->
    <section class="glass" style="margin-bottom: 2rem; padding: 0; overflow: hidden; display: flex; flex-wrap: wrap;">
        <div style="background: var(--accent); color: #fff; padding: 3rem; display: flex; flex-direction: column; justify-content: center; align-items: center; min-width: 250px;">
            <i class="ti ti-trophy" style="font-size: 4rem; opacity: 0.8; margin-bottom: 1rem;"></i>
            <div style="font-family: 'Outfit', sans-serif; font-size: 5rem; font-weight: 800; line-height: 1;">#1</div>
            <div style="font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">Kandidat Utama</div>
        </div>
        <div style="padding: 3rem; flex: 1; min-width: 300px;">
            <div style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 1px;">
                <i class="ti ti-id-badge"></i> <?= esc($rankings[0]['nim']) ?>
            </div>
            <h2 style="font-size: 3rem; margin: 0 0 1.5rem 0; text-transform: uppercase;">
                <?= esc($rankings[0]['nama']) ?>
            </h2>
            
            <div style="display: flex; gap: 4rem; align-items: flex-end; flex-wrap: wrap;">
                <div>
                    <div style="font-size: 0.85rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase;"><i class="ti ti-target"></i> Skor Agregat</div>
                    <div style="font-size: 2.5rem; font-weight: 800; color: var(--accent);"><?= number_format($rankings[0]['total_nilai'], 4) ?></div>
                </div>
                <div style="flex: 1; min-width: 200px; padding-bottom: 0.5rem;">
                    <div style="height: 10px; background: var(--glass-border); border-radius: 10px; overflow: hidden;">
                        <div style="height: 100%; background: var(--accent); width: <?= $rankings[0]['total_nilai'] * 100 ?>%; border-radius: 10px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MATRIX SECTION -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
        <div class="glass" style="padding: 2rem;">
            <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-list-numbers"></i> Peringkat Lengkap</h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; min-width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 60px;">Rank</th>
                            <th>Identitas Kandidat</th>
                            <th style="text-align: right;">Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($rankings, 1) as $row): ?>
                        <tr>
                            <td style="font-weight: 800; color: var(--accent); font-size: 1.2rem;">#<?= str_pad($row['ranking'], 2, '0', STR_PAD_LEFT) ?></td>
                            <td>
                                <div style="font-weight: 600; text-transform: uppercase;"><?= esc($row['nama']) ?></div>
                                <div style="font-size: 0.8rem; color: var(--text-muted);"><?= esc($row['nim']) ?></div>
                            </td>
                            <td style="font-weight: 800; text-align: right;">
                                <?= number_format($row['total_nilai'], 4) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 2rem;">
            <div class="glass" style="padding: 2rem;">
                <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-chart-radar"></i> Bobot Kriteria</h3>
                <canvas id="criteriaChart" height="250"></canvas>
            </div>
            
            <div class="glass" style="padding: 2rem;">
                <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-server"></i> Telemetri Sistem</h3>
                <div style="font-size: 0.9rem; line-height: 2; color: var(--text-muted);">
                    <div><i class="ti ti-circle-check" style="color: #10b981;"></i> Status: Operasional</div>
                    <div><i class="ti ti-math" style="color: var(--accent);"></i> Algoritma: SAW Terbobot</div>
                    <div><i class="ti ti-users"></i> Total Kandidat: <?= count($rankings) ?></div>
                    <div><i class="ti ti-clock"></i> Timestamp: <?= date('d M Y, H:i') ?></div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="glass" style="padding: 5rem 2rem; text-align: center;">
        <i class="ti ti-database-x" style="font-size: 5rem; color: var(--text-muted); margin-bottom: 1rem;"></i>
        <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Data Tidak Ditemukan</h2>
        <p style="color: var(--text-muted); margin-bottom: 2rem;">Silakan jalankan algoritma perhitungan untuk menghasilkan peringkat.</p>
        <button class="btn btn-primary" onclick="showConfirmModal('<?= site_url('ranking/calculate') ?>', 'Mulai proses perhitungan SAW untuk menentukan peringkat kandidat beasiswa?', 'Inisialisasi SAW', 'ti-player-play')"><i class="ti ti-player-play"></i> Inisialisasi Proses</button>
    </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
<?php if (!empty($rankings)): ?>
    const ctx = document.getElementById('criteriaChart').getContext('2d');
    
    // Auto-detect theme colors
    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    const gridColor = isDark ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)';
    const textColor = isDark ? '#cbd5e1' : '#475569';
    
    new Chart(ctx, {
        type: 'radar',
        data: {
            labels: <?= json_encode(array_column($criteria, 'kode_kriteria')) ?>,
            datasets: [{
                data: <?= json_encode(array_column($criteria, 'bobot')) ?>,
                backgroundColor: 'rgba(37, 99, 235, 0.2)',
                borderColor: '#2563eb',
                borderWidth: 2,
                pointBackgroundColor: '#2563eb',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#2563eb'
            }]
        },
        options: {
            scales: {
                r: {
                    angleLines: { color: gridColor },
                    grid: { color: gridColor },
                    pointLabels: { 
                        font: { family: 'Plus Jakarta Sans', weight: '600', size: 12 },
                        color: textColor
                    },
                    ticks: { display: false }
                }
            },
            plugins: { legend: { display: false } },
            maintainAspectRatio: false
        }
    });
<?php endif; ?>
</script>

<?= $this->endSection() ?>
