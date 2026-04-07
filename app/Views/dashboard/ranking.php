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
            <h3 style="margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-list-numbers"></i> Peringkat Teratas</h3>
            <p style="color: var(--text-muted); margin-bottom: 1.5rem;">Menampilkan 10 teratas terlebih dahulu. Klik tombol di bawah untuk memuat 15 hasil berikutnya sampai semua kandidat ditampilkan.</p>
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
                        <?php foreach (array_slice($rankings, 1) as $index => $row): ?>
                        <tr class="ranking-row<?= $index >= 9 ? ' hidden-row' : '' ?>" data-row-index="<?= $index + 2 ?>">
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

            <?php if (count($rankings) > 10): ?>
            <div style="margin-top: 1.5rem; display: flex; justify-content: center;">
                <button id="loadMoreRanksBtn" class="btn btn-primary" style="padding: 0.9rem 1.5rem; min-width: 220px;">
                    <i class="ti ti-arrow-down"></i> Tampilkan 15 Hasil Berikutnya
                </button>
            </div>
            <?php endif; ?>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div class="glass" style="padding: 1.5rem; min-height: 260px; display: flex; flex-direction: column; justify-content: space-between; gap: 1rem;">
                <div>
                    <h3 style="margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-chart-radar"></i> Bobot Kriteria</h3>
                    <p style="color: var(--text-muted); margin: 0 0 1rem 0; font-size: 0.95rem;">Perbandingan bobot kriteria yang digunakan dalam perhitungan SAW.</p>
                </div>
                <div style="flex: 1; min-height: 180px;">
                    <canvas id="criteriaChart" height="180" style="width: 100%; height: 100%; display: block;"></canvas>
                </div>
            </div>
            
            <div class="glass" style="padding: 1.5rem;">
                <h3 style="margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;"><i class="ti ti-server"></i> Telemetri Sistem</h3>
                <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0.75rem; font-size: 0.9rem; line-height: 1.6; color: var(--text-muted);">
                    <div style="background: var(--glass-bg); padding: 0.85rem 1rem; border-radius: 16px; border: 1px solid var(--glass-border);">
                        <div style="font-weight: 600; color: var(--text-main);">Status</div>
                        <div>Operasional</div>
                    </div>
                    <div style="background: var(--glass-bg); padding: 0.85rem 1rem; border-radius: 16px; border: 1px solid var(--glass-border);">
                        <div style="font-weight: 600; color: var(--text-main);">Algoritma</div>
                        <div>SAW Terbobot</div>
                    </div>
                    <div style="background: var(--glass-bg); padding: 0.85rem 1rem; border-radius: 16px; border: 1px solid var(--glass-border);">
                        <div style="font-weight: 600; color: var(--text-main);">Total Kandidat</div>
                        <div><?= count($rankings) ?></div>
                    </div>
                    <div style="background: var(--glass-bg); padding: 0.85rem 1rem; border-radius: 16px; border: 1px solid var(--glass-border);">
                        <div style="font-weight: 600; color: var(--text-main);">Timestamp</div>
                        <div><?= date('d M Y, H:i') ?></div>
                    </div>
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

<style>
    .ranking-row.hidden-row {
        display: none;
    }
</style>
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

    document.addEventListener('DOMContentLoaded', () => {
        const loadBtn = document.getElementById('loadMoreRanksBtn');
        if (!loadBtn) return;

        const hiddenRows = Array.from(document.querySelectorAll('.ranking-row.hidden-row'));
        let currentIndex = 0;
        const chunkSize = 15;

        const updateButtonLabel = () => {
            const remaining = hiddenRows.length - currentIndex;
            if (remaining <= 0) {
                loadBtn.style.display = 'none';
                return;
            }
            loadBtn.innerHTML = `<i class="ti ti-arrow-down"></i> Tampilkan ${Math.min(chunkSize, remaining)} Hasil Berikutnya`;
        };

        loadBtn.addEventListener('click', () => {
            const nextRows = hiddenRows.slice(currentIndex, currentIndex + chunkSize);
            nextRows.forEach(row => row.classList.remove('hidden-row'));
            currentIndex += nextRows.length;
            updateButtonLabel();
        });

        updateButtonLabel();
    });
<?php endif; ?>
</script>

<?= $this->endSection() ?>
