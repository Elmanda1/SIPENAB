<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="action-bar" data-aos="fade-down">
    <div>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.25rem;">
            Perbarui Data</h1>
        <p style="color: var(--muted);">Mengubah atribut kandidat: <strong><?= esc($mahasiswa['nim']) ?></strong></p>
    </div>
    <div>
        <a href="<?= site_url('mahasiswa') ?>" class="btn btn-glass"><i class="ti ti-arrow-left"></i> Batal &
            Kembali</a>
    </div>
</div>

<div class="bento-dashboard">
    <div class="bento-card glass-panel col-12 col-lg-8" style="margin: 0 auto; max-width: 800px; padding: 2.5rem;"
        data-aos="fade-up" data-aos-delay="100">
        <h3
            style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border); font-size: 1.3rem;">
            <i class="ti ti-user-edit" style="color: var(--accent);"></i> Form Pembaruan Kandidat
        </h3>

        <form action="<?= site_url('mahasiswa/update/' . $mahasiswa['id']) ?>" method="POST">
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-id text-muted"></i> Nomor Induk Mahasiswa (NIM)</label>
                <input type="text" name="nim" class="form-control" value="<?= esc($mahasiswa['nim']) ?>" required>
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-user text-muted"></i> Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?= esc($mahasiswa['nama']) ?>" required
                    style="text-transform: uppercase;">
            </div>

            <div class="form-group" style="margin-bottom: 2.5rem;">
                <label
                    style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);"><i
                        class="ti ti-mail text-muted"></i> Alamat Email</label>
                <input type="email" name="email" class="form-control" value="<?= esc($mahasiswa['email']) ?>" required>
            </div>

            <div style="display: flex; gap: 1rem; border-top: 1px solid var(--border); padding-top: 1.5rem;">
                <button type="submit" class="btn btn-primary" style="flex: 1; padding: 1rem;"><i
                        class="ti ti-device-floppy"></i> Simpan Perubahan</button>
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