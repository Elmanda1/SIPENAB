<?php # Halaman untuk masuk ke dalam sistem (login) ?>
<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<style>
    .login-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: calc(100vh - 200px);
        gap: 4rem;
        align-items: center;
        margin-top: 2rem;
    }

    /* --- LEFT SIDE: AESTHETIC DATA VIS --- */
    .login-visual {
        position: relative;
        padding: 4rem;
        border-radius: 40px;
        background: rgba(37, 99, 235, 0.05);
        border: 1px solid var(--glass-border);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-visual::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(37, 99, 235, 0.1) 0%, transparent 50%);
        animation: rotate 30s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .visual-content {
        position: relative;
        z-index: 2;
    }

    .visual-content h2 {
        font-size: 3.5rem;
        letter-spacing: -2px;
        line-height: 1;
        margin-bottom: 1.5rem;
    }

    .visual-content h2 span {
        color: var(--accent);
    }

    .visual-content p {
        font-size: 1.1rem;
        color: var(--text-muted);
        line-height: 1.6;
        max-width: 400px;
    }

    .data-dots {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 10px;
        margin-top: 3rem;
        opacity: 0.3;
    }

    .dot {
        width: 8px;
        height: 8px;
        background: var(--accent);
        border-radius: 50%;
        animation: pulse 2s infinite ease-in-out;
    }

    @keyframes pulse {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.5); }
    }

    /* --- RIGHT SIDE: LOGIN CARD --- */
    .login-card {
        padding: 4rem;
        border-radius: 40px;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .login-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .login-icon {
        width: 80px;
        height: 80px;
        background: rgba(37, 99, 235, 0.1);
        color: var(--accent);
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
        border: 1px solid rgba(37, 99, 235, 0.2);
    }

    .login-header h1 {
        font-size: 2.2rem;
        letter-spacing: -1px;
        margin-bottom: 0.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.75rem;
        color: var(--text-muted);
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper i {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        transition: color 0.3s ease;
    }

    .form-control {
        width: 100%;
        padding: 1.1rem 1.25rem 1.1rem 3.5rem;
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid var(--glass-border);
        border-radius: 18px;
        color: var(--text-main);
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--accent);
        background: rgba(0, 0, 0, 0.3);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .form-control:focus + i {
        color: var(--accent);
    }

    .btn-login {
        width: 100%;
        padding: 1.1rem;
        font-size: 1.1rem;
        font-weight: 700;
        margin-top: 1rem;
        border-radius: 18px;
    }

    .login-footer {
        text-align: center;
        margin-top: 3rem;
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    @media (max-width: 1024px) {
        .login-container {
            grid-template-columns: 1fr;
        }
        .login-visual {
            display: none;
        }
    }
</style>

<div class="login-container">
    
    <!-- Left Visual -->
    <div class="login-visual glass" data-aos="fade-right">
        <div class="visual-content">
            <div class="hero-badge">Akses Terenkripsi</div>
            <h2>Gerbang Kendali <span>SIPENAB.</span></h2>
            <p>Silakan otentikasi identitas Anda untuk mengelola parameter keputusan dan data beasiswa secara aman.</p>
            
            <div class="data-dots">
                <?php for($i=0; $i<24; $i++): ?>
                    <div class="dot" style="animation-delay: <?= $i * 0.1 ?>s"></div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <!-- Right Form -->
    <div class="login-card glass" data-aos="fade-left">
        <div class="login-header">
            <div class="login-icon">
                <i class="ti ti-shield-lock"></i>
            </div>
            <h1>Selamat Datang</h1>
            <p style="color: var(--text-muted);">Masuk ke Panel Administrasi</p>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="glass" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2); padding: 1rem 1.25rem; border-radius: 16px; margin-bottom: 2rem; display: flex; align-items: center; gap: 0.75rem; color: #f87171; font-weight: 600;" data-aos="shake">
                <i class="ti ti-alert-triangle" style="font-size: 1.5rem;"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="POST">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label>Username</label>
                <div class="input-wrapper">
                    <input type="text" name="username" class="form-control" placeholder="Masukkan ID Pengguna" required autofocus>
                    <i class="ti ti-user"></i>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    <i class="ti ti-lock"></i>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-login">
                Masuk ke Sistem <i class="ti ti-arrow-right"></i>
            </button>
        </form>

        <div class="login-footer">
            <p>SIPENAB v1.0 &mdash; PNJ Decision Support</p>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
