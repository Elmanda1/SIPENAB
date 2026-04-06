<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
    <div class="glass" style="width: 100%; max-width: 440px; padding: 3rem; text-align: center;">
        <div style="width: 64px; height: 64px; border-radius: 18px; background: linear-gradient(135deg, var(--accent), #a855f7); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; color: #fff;">
            <i class="ti ti-school"></i>
        </div>
        <h1 style="font-size: 2rem; margin-bottom: 0.25rem;">SIPENAB</h1>
        <p style="color: var(--text-muted); margin-bottom: 2.5rem; font-size: 0.9rem;">Masuk ke Panel Administrasi</p>

        <?php if(session()->getFlashdata('error')): ?>
            <div style="background: rgba(239,68,68,0.15); color: #ef4444; border: 1px solid rgba(239,68,68,0.2); border-radius: 10px; padding: 0.75rem 1rem; margin-bottom: 1.5rem; text-align: left; display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
                <i class="ti ti-alert-circle"></i> <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <form action="<?= site_url('login') ?>" method="POST" style="text-align: left;">
            <div class="form-group">
                <label><i class="ti ti-user"></i> Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
            </div>
            
            <div class="form-group">
                <label><i class="ti ti-key"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.85rem; font-size: 1rem; margin-top: 0.5rem;">
                <i class="ti ti-login"></i> Masuk ke Sistem
            </button>
        </form>

        <p style="margin-top: 2rem; font-size: 0.78rem; color: var(--text-muted);">
            SIPENAB v1.0 &mdash; Sistem Pendukung Keputusan Pemilihan Beasiswa
        </p>
    </div>
</div>

<?= $this->endSection() ?>
