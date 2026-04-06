<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="page-header" style="margin-bottom: 2rem;">
    <div>
        <h1 style="margin: 0; font-size: 3rem;">Profil Kandidat</h1>
        <p style="color: var(--text-muted);">Tinjauan mendalam untuk kandidat terpilih.</p>
    </div>
    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="<?= site_url('mahasiswa') ?>" class="btn btn-glass" style="font-size: 0.85rem;"><i class="ti ti-arrow-left"></i> Kembali</a>
        <a href="<?= site_url('penilaian/new?mahasiswa_id='.$mahasiswa['id']) ?>" class="btn btn-primary" style="font-size: 0.85rem;"><i class="ti ti-playlist-add"></i> Evaluasi Kandidat</a>
    </div>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 4rem;">
    <!-- Personal Info -->
    <div class="glass" style="padding: 2.5rem; background: var(--text-main); color: var(--bg-color);">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <div style="font-size: 1.2rem; font-weight: 800; text-transform: uppercase;">Identitas Profil</div>
            <i class="ti ti-user-circle" style="font-size: 3rem; color: var(--accent);"></i>
        </div>
        
        <div style="margin-bottom: 2rem;">
            <div style="font-size: 0.85rem; color: rgba(255,255,255,0.5); margin-bottom: 0.25rem;"><i class="ti ti-id"></i> NIM</div>
            <div style="font-family: var(--mono); font-size: 1.25rem; font-weight: 600;"><?= esc($mahasiswa['nim']) ?></div>
        </div>
        
        <div style="margin-bottom: 2rem;">
            <div style="font-size: 0.85rem; color: rgba(255,255,255,0.5); margin-bottom: 0.25rem;"><i class="ti ti-user"></i> Nama Lengkap</div>
            <div style="font-size: 1.8rem; font-weight: 800; text-transform: uppercase;"><?= esc($mahasiswa['nama']) ?></div>
        </div>
        
        <div>
            <div style="font-size: 0.85rem; color: rgba(255,255,255,0.5); margin-bottom: 0.25rem;"><i class="ti ti-mail"></i> Email Kontak</div>
            <div style="font-family: var(--mono); font-size: 1.1rem;"><?= esc($mahasiswa['email']) ?></div>
        </div>
    </div>

    <!-- Evaluation Data -->
    <div class="glass" style="padding: 2.5rem; display: flex; flex-direction: column;">
        <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 1rem; border-bottom: 1px solid var(--glass-border);">
            <i class="ti ti-clipboard-data"></i> Data Evaluasi
        </h3>
        
        <div style="flex-grow: 1; overflow-y: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Parameter Kriteria</th>
                        <th style="width: 100px;">Nilai</th>
                        <th style="width: 100px;">Tipe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($evaluations as $e): ?>
                    <tr>
                        <td style="font-weight: 600; padding: 1.25rem 1rem;"><?= esc($e['nama_kriteria']) ?></td>
                        <td style="font-weight: 800; font-size: 1.2rem; color: var(--accent); padding: 1.25rem 1rem;"><?= esc($e['nilai']) ?></td>
                        <td style="padding: 1.25rem 1rem;">
                            <?php if(strtolower($e['tipe']) === 'benefit'): ?>
                                <span style="background: rgba(16, 185, 129, 0.2); color: #10b981; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Benefit</span>
                            <?php else: ?>
                                <span style="background: rgba(239, 68, 68, 0.2); color: #ef4444; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Cost</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if (empty($evaluations)): ?>
                    <tr>
                        <td colspan="3" style="padding: 3rem 1rem; text-align: center; color: var(--text-muted);">
                            <i class="ti ti-clipboard-x" style="font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.5;"></i>
                            Kandidat ini belum dievaluasi terhadap kriteria apapun.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
