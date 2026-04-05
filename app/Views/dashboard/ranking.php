<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="stamp reveal" style="top: 5%; right: 5%; z-index: 10;">KANDIDAT_UTAMA</div>

<header class="reveal" style="margin-bottom: 4rem;">
    <h1 style="margin: 0; font-size: 8rem; line-height: 0.8;">Indeks<br>Peringkat</h1>
    <div style="margin-top: 1rem; border-top: 8px solid var(--ink); padding-top: 1rem; display: flex; justify-content: space-between; align-items: flex-start;">
        <div style="font-weight: 800; text-transform: uppercase; font-size: 1.2rem;">
            Hasil Seleksi Beasiswa // Metode SAW
        </div>
        <div style="display: flex; gap: 1rem;">
            <a href="<?= site_url('dashboard/report') ?>" class="btn" style="background: var(--surface); color: var(--ink); border: 2px solid var(--ink);">[ CETAK_LAPORAN ]</a>
            <a href="<?= site_url('ranking/calculate') ?>" class="btn">Inisialisasi_Ulang_Algoritma</a>
        </div>
    </div>
</header>

<?php if (!empty($rankings)): ?>
    <!-- HERO SECTION: RANK #01 -->
    <section class="reveal" style="margin-bottom: 4rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 4px; background: var(--ink); border: 4px solid var(--ink);">
        <div style="background: var(--accent); color: var(--ink); padding: 2rem; display: flex; flex-direction: column; justify-content: space-between;">
            <div style="font-family: var(--display); font-size: 8rem; line-height: 1;">#01</div>
            <div style="font-weight: 800; font-size: 1.2rem; text-transform: uppercase;">Seleksi<br>Utama</div>
        </div>
        <div style="background: var(--surface); padding: 2rem; position: relative;">
            <div style="font-size: 0.8rem; color: #666; margin-bottom: 1rem;">DATA_KANDIDAT_TERVERIFIKASI</div>
            <h2 style="font-family: var(--display); font-size: 4rem; margin: 0; text-transform: uppercase;"><?= esc($rankings[0]['nama']) ?></h2>
            <div style="font-family: var(--mono); font-size: 1.5rem; margin-bottom: 2rem;"><code><?= esc($rankings[0]['nim']) ?></code></div>
            
            <div style="display: flex; gap: 4rem; align-items: flex-end; flex-wrap: wrap;">
                <div>
                    <div style="font-size: 0.7rem; font-weight: 800; color: var(--accent);">SKOR_AGREGAT</div>
                    <div style="font-size: 3rem; font-weight: 800; line-height: 1;"><?= number_format($rankings[0]['total_nilai'], 4) ?></div>
                </div>
                <div style="flex: 1; min-width: 200px;">
                    <div style="height: 20px; background: #eee; position: relative;">
                        <div style="height: 100%; background: var(--accent); width: <?= $rankings[0]['total_nilai'] * 100 ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MATRIX SECTION -->
    <div class="grid-layout reveal" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 4rem; margin-bottom: 4rem;">
        <div>
            <h3 style="text-transform: uppercase; border-bottom: 4px solid var(--ink); padding-bottom: 0.5rem; margin-bottom: 2rem;">Matriks_Peringkat_Lengkap</h3>
            <div class="table-wrapper" style="border: none;">
                <table style="width: 100%; border-collapse: collapse; min-width: 100%;">
                    <thead>
                        <tr style="font-size: 0.7rem; text-align: left; color: #666;">
                            <th style="padding: 0.5rem 0;">RK</th>
                            <th>IDENTIFIKASI</th>
                            <th style="text-align: right;">SKOR</th>
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
        </div>

        <div>
            <div class="brutalist-grid" style="margin-bottom: 2rem;">
                <h3 style="margin-top: 0; text-transform: uppercase; font-size: 0.9rem;">Distribusi_Kriteria</h3>
                <canvas id="criteriaChart" height="300"></canvas>
            </div>
            
            <div class="brutalist-grid" style="background: var(--ink); color: var(--surface);">
                <h3 style="margin-top: 0; text-transform: uppercase; font-size: 0.9rem; color: var(--accent);">Telemetri_Sistem</h3>
                <div style="font-family: var(--mono); font-size: 0.7rem; line-height: 1.8;">
                    <div>> STATUS: OPERASIONAL</div>
                    <div>> ALGORITMA: SAW_TERBOBOT</div>
                    <div>> NODE: <?= count($rankings) ?></div>
                    <div>> TIMESTAMP: <?= date('Ymd_His') ?></div>
                    <div style="margin-top: 1rem; color: var(--accent);">[SISTEM_TERKUNCI_UNTUK_TINJAUAN]</div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="brutalist-grid reveal" style="padding: 4rem; text-align: center;">
        <h2 style="font-family: var(--display); font-size: 3rem;">DATA_TIDAK_DITEMUKAN</h2>
        <p>Silakan jalankan algoritma perhitungan untuk menghasilkan peringkat.</p>
        <a href="<?= site_url('ranking/calculate') ?>" class="btn">Inisialisasi_Proses</a>
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
