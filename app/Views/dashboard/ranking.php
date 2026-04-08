<?php # Halaman yang menampilkan hasil ranking beasiswa ?>
<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<style>
    .bento-dashboard {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-auto-rows: minmax(100px, auto);
        gap: 1.5rem;
        padding-bottom: 4rem;
    }

    .bento-card {
        position: relative;
        border-radius: 32px;
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease;
        padding: 2rem;
        display: flex;
        flex-direction: column;
    }

    .bento-card:hover {
        transform: translateY(-5px) scale(1.01);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        border-color: var(--border-hover);
    }

    /* Spans */
    .col-12 { grid-column: span 12; }
    .col-8 { grid-column: span 8; }
    .col-4 { grid-column: span 4; }
    .col-6 { grid-column: span 6; }
    .row-2 { grid-row: span 2; }
    .row-3 { grid-row: span 3; }
    .row-4 { grid-row: span 4; }

    @media (max-width: 1024px) {
        .col-8, .col-4, .col-6 { grid-column: span 12; }
        .row-2, .row-3, .row-4 { grid-row: span 1; }
    }

    /* Rank 1 Highlight */
    .winner-card {
        background: linear-gradient(135deg, var(--accent), var(--accent2));
        color: white;
        border: none;
        align-items: flex-start;
        justify-content: space-between;
    }
    
    .winner-card .trophy-icon {
        position: absolute;
        bottom: -20px;
        right: -20px;
        font-size: 12rem;
        opacity: 0.1;
        transform: rotate(-15deg);
        pointer-events: none;
    }

    .rank-badge {
        display: inline-block;
        padding: 0.25rem 1rem;
        background: rgba(255,255,255,0.2);
        color: white;
        border-radius: 50px;
        font-weight: 800;
        font-size: 0.85rem;
        letter-spacing: 1px;
        backdrop-filter: blur(10px);
    }

    .winner-name {
        font-size: clamp(2rem, 3vw, 3rem);
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        margin: 1rem 0;
        line-height: 1.1;
    }

    .winner-score {
        font-size: 3.5rem;
        font-family: 'JetBrains Mono', monospace;
        font-weight: 800;
    }

    /* Table Container */
    .table-container {
        padding: 0;
    }
    .table-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .table-header h3 {
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 1rem 2rem;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }
    th {
        font-weight: 600;
        color: var(--muted);
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        background: rgba(0,0,0,0.02);
    }
    tr:last-child td { border-bottom: none; }
    
    tr:hover td {
        background: rgba(255,255,255,0.02);
    }

    .rank-col {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        color: var(--accent);
        font-size: 1.1rem;
    }

    .score-col {
        font-family: 'JetBrains Mono', monospace;
        font-weight: 700;
        text-align: right;
    }

    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
</style>

<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">Keputusan SAW</h1>
        <p style="color: var(--muted);">Distribusi beasiswa berbasis data objektif.</p>
    </div>
    <div style="display: flex; gap: 1rem;">
        <a href="<?= site_url('dashboard/report') ?>" class="btn btn-glass" target="_blank"><i class="ti ti-printer"></i> Cetak Laporan</a>
        <button class="btn btn-primary" onclick="showConfirmModal('<?= site_url('ranking/calculate') ?>', 'Sistem akan memproses matriks penilaian dan memperbarui seluruh peringkat kandidat. Lanjutkan proses?', 'Kalkulasi SAW', 'ti-lambda')">
            <i class="ti ti-refresh"></i> Hitung Ulang
        </button>
    </div>
</div>

<?php if (!empty($rankings)): ?>
<div class="bento-dashboard">
    
    <!-- Top Winner Card -->
    <div class="bento-card winner-card col-8 row-2" data-aos="fade-right" data-aos-delay="100">
        <div>
            <div class="rank-badge">RANK #01 - KANDIDAT UTAMA</div>
            <div style="font-size: 1rem; opacity: 0.8; margin-top: 1rem; font-family: 'JetBrains Mono', monospace;">NIM: <?= esc($rankings[0]['nim']) ?></div>
            <div class="winner-name"><?= esc($rankings[0]['nama']) ?></div>
        </div>
        <div>
            <div style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; opacity: 0.8;">Skor SAW Agregat</div>
            <div class="winner-score"><?= number_format($rankings[0]['total_nilai'], 4) ?></div>
        </div>
        <i class="ti ti-trophy trophy-icon"></i>
    </div>

    <!-- Quick Stats -->
    <div class="bento-card glass-panel col-4 row-2" style="justify-content: space-between;" data-aos="fade-left" data-aos-delay="200">
        <div>
            <h3 style="margin-bottom: 0.5rem; font-size: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ti ti-server-cog text-accent"></i> Telemetri
            </h3>
            <p style="color: var(--muted); font-size: 0.9rem;">Status komputasi sistem saat ini.</p>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div style="background: rgba(0,0,0,0.1); padding: 1rem; border-radius: 16px;">
                <div style="font-size: 0.75rem; color: var(--muted); text-transform: uppercase; font-weight: 700; margin-bottom: 0.25rem;">Total Evaluasi</div>
                <div style="font-size: 1.5rem; font-family: 'Outfit', sans-serif; font-weight: 800; color: var(--text);"><?= count($rankings) ?></div>
            </div>
            <div style="background: rgba(0,0,0,0.1); padding: 1rem; border-radius: 16px;">
                <div style="font-size: 0.75rem; color: var(--muted); text-transform: uppercase; font-weight: 700; margin-bottom: 0.25rem;">Metode</div>
                <div style="font-size: 1.2rem; font-family: 'Outfit', sans-serif; font-weight: 800; color: var(--success);">SAW</div>
            </div>
        </div>
        <div style="font-size: 0.8rem; color: var(--muted); text-align: center; margin-top: 1rem;">
            <i class="ti ti-clock"></i> Terakhir dihitung: <?= date('d M Y, H:i') ?>
        </div>
    </div>

    <!-- Full Table (Spans 8 cols) -->
    <div class="bento-card glass-panel col-8 row-4 table-container" data-aos="fade-up" data-aos-delay="300">
        <div class="table-header">
            <h3><i class="ti ti-list-numbers" style="color: var(--accent);"></i> Daftar Peringkat Lengkap</h3>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 80px;">Rank</th>
                        <th>Identitas Kandidat</th>
                        <th style="text-align: right;">Skor SAW</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_slice($rankings, 1) as $index => $row): ?>
                    <tr class="ranking-row<?= $index >= 9 ? ' hidden-row' : '' ?>">
                        <td class="rank-col">#<?= str_pad($row['ranking'], 2, '0', STR_PAD_LEFT) ?></td>
                        <td>
                            <div style="font-weight: 700; font-size: 1.05rem;"><?= esc($row['nama']) ?></div>
                            <div style="font-size: 0.85rem; color: var(--muted); font-family: 'JetBrains Mono', monospace;"><?= esc($row['nim']) ?></div>
                        </td>
                        <td class="score-col">
                            <?= number_format($row['total_nilai'], 4) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php if (count($rankings) > 10): ?>
        <div style="padding: 1.5rem; text-align: center; border-top: 1px solid var(--border);">
            <button id="loadMoreRanksBtn" class="btn btn-glass" style="width: 100%; max-width: 300px; padding: 1rem;">
                <i class="ti ti-chevron-down"></i> Tampilkan Lebih Banyak
            </button>
        </div>
        <?php endif; ?>
    </div>

    <!-- Chart (Spans 4 cols) -->
    <div class="bento-card glass-panel col-4 row-4" data-aos="fade-up" data-aos-delay="400">
        <h3 style="margin-bottom: 0.5rem; font-size: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="ti ti-chart-radar" style="color: var(--accent);"></i> Distribusi Bobot
        </h3>
        <p style="color: var(--muted); font-size: 0.9rem; margin-bottom: 2rem;">Proporsi setiap kriteria dalam kalkulasi.</p>
        
        <div style="flex: 1; min-height: 250px; display: flex; align-items: center; justify-content: center; position: relative;">
            <canvas id="criteriaChart" style="width: 100%; height: 100%;"></canvas>
        </div>
    </div>

</div>

<?php else: ?>
    <div class="glass-panel" style="padding: 6rem 2rem; text-align: center; border-radius: 32px;" data-aos="zoom-in">
        <div style="background: rgba(255,255,255,0.05); width: 120px; height: 120px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
            <i class="ti ti-database-x" style="font-size: 4rem; color: var(--muted);"></i>
        </div>
        <h2 style="font-size: 2.5rem; margin-bottom: 1rem; font-family: 'Outfit', sans-serif;">Belum Ada Analisis</h2>
        <p style="color: var(--muted); margin-bottom: 2.5rem; font-size: 1.1rem; max-width: 500px; margin-left: auto; margin-right: auto;">Data perhitungan belum tersedia. Silakan jalankan algoritma SAW untuk menginisiasi peringkat kandidat.</p>
        <button class="btn btn-primary" style="padding: 1.2rem 3rem; font-size: 1.1rem;" onclick="showConfirmModal('<?= site_url('ranking/calculate') ?>', 'Mulai proses perhitungan SAW untuk menentukan peringkat kandidat beasiswa?', 'Inisialisasi Algoritma', 'ti-player-play')">
            <i class="ti ti-player-play"></i> Inisialisasi Proses
        </button>
    </div>
<?php endif; ?>

<style>
    .ranking-row.hidden-row {
        display: none;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
<?php if (!empty($rankings)): ?>
    document.addEventListener('DOMContentLoaded', () => {
        // Chart Initialization
        const ctx = document.getElementById('criteriaChart').getContext('2d');
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        const gridColor = isDark ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)';
        const textColor = isDark ? '#94a3b8' : '#64748b';
        const accentColor = '#3b82f6';
        
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: <?= json_encode(array_column($criteria, 'kode_kriteria')) ?>,
                datasets: [{
                    data: <?= json_encode(array_column($criteria, 'bobot')) ?>,
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: accentColor,
                    borderWidth: 2,
                    pointBackgroundColor: accentColor,
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: accentColor,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                scales: {
                    r: {
                        angleLines: { color: gridColor },
                        grid: { color: gridColor },
                        pointLabels: { 
                            font: { family: 'Plus Jakarta Sans', weight: '700', size: 12 },
                            color: textColor
                        },
                        ticks: { display: false }
                    }
                },
                plugins: { legend: { display: false } },
                maintainAspectRatio: false
            }
        });

        // Load More Logic
        const loadBtn = document.getElementById('loadMoreRanksBtn');
        if (loadBtn) {
            const hiddenRows = Array.from(document.querySelectorAll('.ranking-row.hidden-row'));
            let currentIndex = 0;
            const chunkSize = 10;

            const updateButtonLabel = () => {
                const remaining = hiddenRows.length - currentIndex;
                if (remaining <= 0) {
                    loadBtn.parentElement.style.display = 'none';
                    return;
                }
                loadBtn.innerHTML = `<i class="ti ti-chevron-down"></i> Tampilkan ${Math.min(chunkSize, remaining)} Berikutnya`;
            };

            loadBtn.addEventListener('click', () => {
                const nextRows = hiddenRows.slice(currentIndex, currentIndex + chunkSize);
                nextRows.forEach(row => {
                    row.classList.remove('hidden-row');
                    // Optional: add a tiny fade-in effect to the row here if desired
                    row.style.animation = "modalFadeIn 0.3s ease";
                });
                currentIndex += nextRows.length;
                updateButtonLabel();
            });

            updateButtonLabel();
        }
    });
<?php endif; ?>
</script>

<?= $this->endSection() ?>