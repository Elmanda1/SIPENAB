<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">
            Registrasi Kandidat</h1>
        <p style="color: var(--muted);">Tambahkan data mahasiswa baru ke dalam sistem SIPENAB</p>
    </div>
    <div>
        <a href="<?= site_url('mahasiswa') ?>" class="btn btn-glass"><i class="ti ti-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="bento-dashboard">
    <div class="bento-card glass-panel col-12 col-lg-8" style="margin: 0 auto; max-width: 800px; padding: 2.5rem;"
        data-aos="fade-up" data-aos-delay="100">
        <h3
            style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border); font-size: 1.3rem;">
            <i class="ti ti-user-plus" style="color: var(--accent);"></i> Form Pendaftaran
        </h3>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-error" data-aos="fade-down" style="padding: 1rem 1.25rem; border-radius: 16px; margin-bottom: 2rem; display: flex; flex-direction: column; gap: 0.5rem; background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2);">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <div style="display: flex; align-items: center; gap: 0.75rem; font-weight: 600; font-size: 0.9rem;">
                        <i class="ti ti-alert-triangle" style="font-size: 1.2rem;"></i>
                        <span><?= esc($error) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('mahasiswa') ?>" method="POST">
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-id text-muted"></i> Nomor Induk Mahasiswa (NIM)</label>
                <input type="text" name="nim" class="form-control" placeholder="Contoh: 2021001" required>
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-user text-muted"></i> Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Contoh: John Doe" required
                    style="text-transform: uppercase;">
            </div>

            <div class="form-group" style="margin-bottom: 2.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-mail text-muted"></i> Alamat Email</label>
                <input type="email" name="email" class="form-control" placeholder="Contoh: user@student.domain.ac.id"
                    required>
            </div>

            <div style="display: flex; gap: 1rem; border-top: 1px solid var(--border); padding-top: 1.5rem;">
                <button type="submit" class="btn btn-primary" style="flex: 1; padding: 1rem;"><i
                        class="ti ti-device-floppy"></i> Simpan Kandidat</button>
            </div>
        </form>
    </div>
</div>

<style>
    .bento-dashboard {
        display: block;
        padding-bottom: 4rem;
    }

    .bento-card {
        position: relative;
        border-radius: 32px;
        overflow: hidden;
        background: var(--surface);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid var(--border);
        box-shadow: var(--glass-shadow);
        display: flex;
        flex-direction: column;
    }

    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .form-group label i.text-muted {
        color: var(--accent);
        opacity: 0.8;
    }
</style>
<?= $this->endSection() ?>