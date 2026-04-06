<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="page-header" style="margin-bottom: 2rem;">
    <div>
        <h1 style="margin: 0; font-size: 3rem;">Registrasi Kandidat</h1>
        <p style="color: var(--text-muted);">Tambahkan data mahasiswa baru ke dalam sistem SIPENAB.</p>
    </div>
    <div>
        <a href="<?= site_url('mahasiswa') ?>" class="btn btn-glass" style="font-size: 0.85rem;"><i class="ti ti-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="glass" style="max-width: 600px; padding: 3rem;">
    <h3 style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 1rem; border-bottom: 1px solid var(--glass-border);">
        <i class="ti ti-user-plus"></i> Form Pendaftaran
    </h3>

    <form action="<?= site_url('mahasiswa') ?>" method="POST">
        <div class="form-group">
            <label><i class="ti ti-id"></i> Nomor Induk Mahasiswa (NIM)</label>
            <input type="text" name="nim" class="form-control" placeholder="Contoh: 2021001" required>
        </div>

        <div class="form-group">
            <label><i class="ti ti-user"></i> Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Contoh: John Doe" required style="text-transform: uppercase;">
        </div>

        <div class="form-group">
            <label><i class="ti ti-mail"></i> Alamat Email</label>
            <input type="email" name="email" class="form-control" placeholder="Contoh: user@student.domain.ac.id" required>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 3rem;">
            <button type="submit" class="btn btn-primary" style="flex: 1;"><i class="ti ti-device-floppy"></i> Simpan Kandidat</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
