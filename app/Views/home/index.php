<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<style>
    :root {
        --section-spacing: 12rem;
        --accent-glow: rgba(37, 99, 235, 0.4);
    }

    /* --- GLOBAL ANIMATIONS --- */
    @keyframes float {
        0% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-15px) rotate(2deg);
        }

        100% {
            transform: translateY(0px) rotate(0deg);
        }
    }

    @keyframes float-delay {
        0% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(15px) rotate(-2deg);
        }

        100% {
            transform: translateY(0px) rotate(0deg);
        }
    }

    .float-anim {
        animation: float 6s ease-in-out infinite;
    }

    .float-delay {
        animation: float-delay 7s ease-in-out infinite;
    }

    /* --- RESPONSIVE GRIDS --- */
    .cap-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 1.5rem;
    }

    .col-12 {
        grid-column: span 12;
    }

    .col-8 {
        grid-column: span 8;
    }

    .col-6 {
        grid-column: span 6;
    }

    .col-4 {
        grid-column: span 4;
    }

    /* --- HERO SECTION --- */
    .hero-section {
        min-height: 90vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        padding: 4rem 1rem;
    }

    .hero-section h1 {
        font-size: clamp(3rem, 8vw, 6.5rem);
        margin-bottom: 1.5rem;
        letter-spacing: -3px;
        line-height: 0.95;
        font-weight: 800;
        background: linear-gradient(to bottom, var(--text-main), var(--text-muted));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-section h1 span {
        display: block;
        color: var(--accent);
        -webkit-text-fill-color: var(--accent);
    }

    /* --- PREMIUM GLASSMORPHISM --- */
    .premium-glass,
    .cap-card,
    .feature-item,
    .v-card {
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
    }

    [data-theme="light"] .premium-glass,
    [data-theme="light"] .cap-card,
    [data-theme="light"] .feature-item,
    [data-theme="light"] .v-card {
        background: rgba(255, 255, 255, 0.55);
        border: 1px solid rgba(255, 255, 255, 0.8);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.06), inset 0 0 0 1px rgba(255, 255, 255, 0.6);
    }

    /* --- BACKGROUND BLOBS --- */
    .background-blobs {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
    }

    .blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(120px);
        opacity: 0.3;
        animation: float-delay 20s ease-in-out infinite alternate;
    }

    .blob-1 {
        top: -20%;
        left: -10%;
        width: 60vw;
        height: 60vw;
        background: var(--blob-1);
    }

    .blob-2 {
        bottom: -20%;
        right: -10%;
        width: 60vw;
        height: 60vw;
        background: var(--blob-2);
        animation-delay: -5s;
    }

    .blob-3 {
        top: 30%;
        left: 30%;
        width: 50vw;
        height: 50vw;
        background: var(--blob-3);
        animation-delay: -10s;
    }

    [data-theme="light"] .blob {
        opacity: 0.25;
        filter: blur(100px);
    }

    /* Make sections sit above the blobs */
    section {
        position: relative;
        z-index: 2;
    }

    /* --- STATS OVERLAY --- */
    .hero-stats {
        display: flex;
        gap: 3rem;
        margin-top: 4rem;
        padding: 1.5rem 3.5rem;
        border-radius: 100px;
    }

    .stat-item {
        text-align: center;
    }

    .stat-item .val {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--accent);
        font-family: 'Outfit', sans-serif;
    }

    .stat-item .lab {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
        font-weight: 600;
    }

    /* --- CAPABILITIES & FEATURES --- */
    .cap-card {
        padding: 2.5rem;
        border-radius: 32px;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease, background 0.3s ease;
    }

    .cap-card:hover {
        transform: translateY(-6px);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.4), inset 0 0 0 1px var(--accent);
        background: rgba(255, 255, 255, 0.08);
    }

    [data-theme="light"] .cap-card:hover {
        background: rgba(255, 255, 255, 0.85);
        border-color: rgba(37, 99, 235, 0.3);
        box-shadow: 0 30px 60px -15px rgba(31, 38, 135, 0.1), inset 0 0 0 1px var(--accent);
    }

    .feature-item {
        display: flex;
        gap: 1.25rem;
        align-items: flex-start;
        padding: 1.5rem;
        border-radius: 24px;
        transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease, background 0.3s ease;
    }

    .feature-item:hover {
        transform: translateX(6px);
        border-color: rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.08);
        box-shadow: inset 0 0 0 1px var(--accent);
    }

    [data-theme="light"] .feature-item:hover {
        background: rgba(255, 255, 255, 0.85);
        border-color: rgba(37, 99, 235, 0.3);
        box-shadow: inset 0 0 0 1px var(--accent);
    }

    .v-card {
        position: absolute;
        border-radius: 24px;
        padding: 1.5rem;
        transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), background 0.3s ease;
    }

    .v-card:hover {
        transform: translateY(-4px) scale(1.02);
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.3);
        z-index: 10 !important;
    }

    [data-theme="light"] .v-card:hover {
        background: rgba(255, 255, 255, 0.85);
        border-color: rgba(37, 99, 235, 0.3);
    }

    /* --- FLOW METHODOLOGY --- */
    .flow-container {
        position: relative;
        padding: 2rem 0;
        max-width: 1000px;
        margin: 0 auto;
    }

    .flow-step {
        display: grid;
        grid-template-columns: 120px 1fr;
        gap: 2.5rem;
        margin-bottom: 4rem;
        position: relative;
    }

    .flow-icon {
        width: 120px;
        height: 120px;
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        border-radius: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        color: var(--accent);
        position: relative;
        z-index: 2;
        transition: all 0.3s ease;
    }

    .flow-step:hover .flow-icon {
        background: var(--accent);
        color: white;
        transform: scale(1.05) rotate(-5deg);
        box-shadow: 0 15px 30px rgba(37, 99, 235, 0.3);
    }

    .flow-content {
        padding-top: 0.5rem;
    }

    .flow-content h3 {
        font-size: 1.8rem;
        margin-bottom: 0.75rem;
        letter-spacing: -0.5px;
        font-weight: 800;
        font-family: 'Outfit', sans-serif;
    }

    .formula-display {
        margin-top: 1.5rem;
        padding: 2rem;
        background: rgba(0, 0, 0, 0.8);
        border-radius: 20px;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 0 40px rgba(0, 0, 0, 0.5);
    }

    .formula-display code {
        font-family: 'JetBrains Mono', monospace;
        font-size: 1.1rem;
        color: #fff;
        display: block;
        letter-spacing: 0.5px;
    }

    .formula-label {
        position: absolute;
        top: -12px;
        left: 20px;
        background: var(--accent);
        color: white;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* --- WHY US SECTION (KEUNGGULAN) --- */
    .why-us-section {
        margin-bottom: var(--section-spacing);
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: center;
    }

    .feature-list {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .feature-check {
        width: 40px;
        height: 40px;
        background: rgba(37, 99, 235, 0.1);
        color: var(--accent);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1.2rem;
    }

    /* --- CUSTOM VIRTUAL UI FOR KEUNGGULAN --- */
    .virtual-ui-container {
        position: relative;
        width: 100%;
        aspect-ratio: 1;
        max-width: 500px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* --- RESPONSIVE GRIDS --- */
    @media (max-width: 1024px) {

        .col-8,
        .col-4,
        .col-6 {
            grid-column: span 12;
        }

        .hero-stats {
            flex-direction: column;
            gap: 1.5rem;
            border-radius: 32px;
            padding: 2rem;
            width: 100%;
        }

        .why-us-section {
            grid-template-columns: 1fr;
            gap: 4rem;
        }

        .virtual-ui-container {
            display: none;
        }

        /* Hide complex visual on small screens for performance */
        .flow-step {
            grid-template-columns: 1fr;
            text-align: center;
            justify-items: center;
        }
    }
</style>

<!-- BACKGROUND ANIMATED BLOBS FOR GLASSMORPHISM -->
<div class="background-blobs">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
</div>

<!-- HERO SECTION -->
<section id="hero" class="hero-section">
    <div class="hero-badge premium-glass" data-aos="fade-down"
        style="padding: 8px 16px; border-radius: 50px; font-size: 0.8rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: var(--accent); margin-bottom: 2rem; display: inline-flex; align-items: center; gap: 8px;">
        <i class="ti ti-cpu" style="font-size: 1rem;"></i> Technology & Mathematics
    </div>
    <h1 data-aos="zoom-out" data-aos-delay="100">Presisi dalam<span>Setiap Keputusan.</span></h1>
    <p data-aos="fade-up" data-aos-delay="200"
        style="max-width: 700px; margin: 1.5rem auto 3rem; font-size: 1.2rem; line-height: 1.6; color: var(--text-muted);">
        SIPENAB mentransformasi data menjadi insight. Menggunakan algoritma <strong>Simple Additive Weighting
            (SAW)</strong> untuk memastikan beasiswa diberikan kepada mereka yang benar-benar berhak.</p>

    <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;" data-aos="fade-up"
        data-aos-delay="300">
        <a href="<?= site_url('login') ?>" class="btn btn-primary"
            style="padding: 1.2rem 3rem; font-size: 1.1rem; border-radius: 20px; box-shadow: 0 10px 25px rgba(37,99,235,0.3);">
            Mulai Analisis <i class="ti ti-arrow-right"></i>
        </a>
        <a href="#methodology" class="btn premium-glass"
            style="padding: 1.2rem 3rem; font-size: 1.1rem; color: #ffffff; border-radius: 20px; transition: all 0.3s ease;">
            Lihat Metodologi
        </a>
    </div>

    <div class="hero-stats premium-glass" data-aos="fade-up" data-aos-delay="400">
        <div class="stat-item">
            <div class="val">100%</div>
            <div class="lab">Transparansi Data</div>
        </div>
        <div style="width: 1px; background: var(--glass-border);"></div>
        <div class="stat-item">
            <div class="val">
                < 1ms</div>
                    <div class="lab">Waktu Kalkulasi</div>
            </div>
            <div style="width: 1px; background: var(--glass-border);"></div>
            <div class="stat-item">
                <div class="val">SAW</div>
                <div class="lab">Standar Algoritma</div>
            </div>
        </div>
</section>

<!-- WHY CHOOSE US -->
<section class="why-us-section">
    <div data-aos="fade-right">
        <div class="section-tag" style="margin-bottom: 1rem;"><i class="ti ti-star"></i> Keunggulan</div>
        <h2
            style="font-size: 3rem; margin-bottom: 1.5rem; font-family: 'Outfit', sans-serif; font-weight: 800; line-height: 1.1;">
            Solusi Cerdas untuk<span> Pengambil Keputusan.</span></h2>
        <p style="color: var(--text-muted); margin-bottom: 2.5rem; font-size: 1.1rem; line-height: 1.7;">Sistem SAW kami
            memastikan transparansi dan keakuratan matematis pada setiap seleksi kandidat beasiswa.</p>

        <div class="feature-list">
            <div class="feature-item">
                <div class="feature-check"><i class="ti ti-target"></i></div>
                <div>
                    <h4 style="font-size: 1.15rem; margin-bottom: 0.3rem; font-weight: 700;">Objektivitas Mutlak</h4>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">Keputusan
                        diformulasikan berdasarkan matriks bobot institusi, mengeliminasi bias personal.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-check"><i class="ti ti-bolt"></i></div>
                <div>
                    <h4 style="font-size: 1.15rem; margin-bottom: 0.3rem; font-weight: 700;">Otomasi Menyeluruh</h4>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">Matriks
                        normalisasi dan perhitungan vektor V dilakukan serentak tanpa *spreadsheet* manual.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-check"><i class="ti ti-shield-check"></i></div>
                <div>
                    <h4 style="font-size: 1.15rem; margin-bottom: 0.3rem; font-weight: 700;">Keamanan & Transparansi
                    </h4>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">Jejak
                        normalisasi dapat diekspor lengkap sebagai bukti validasi keadilan proses seleksi.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="virtual-ui-container" data-aos="zoom-in" data-aos-delay="200">
        <!-- Background Glow -->
        <div
            style="position: absolute; width: 60%; height: 60%; background: var(--accent); border-radius: 50%; filter: blur(80px); opacity: 0.15;">
        </div>

        <!-- Virtual Component 1: Matrix Card -->
        <div class="v-card float-anim" style="width: 80%; top: 10%; right: 5%; z-index: 3;">
            <div
                style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--glass-border); padding-bottom: 1rem; margin-bottom: 1rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div
                        style="width: 32px; height: 32px; border-radius: 8px; background: rgba(37, 99, 235, 0.1); display: flex; align-items: center; justify-content: center; color: var(--accent);">
                        <i class="ti ti-math-function"></i>
                    </div>
                    <span style="font-weight: 700; font-size: 0.9rem; color: var(--text-main)">SAW Matrix</span>
                </div>
                <div style="font-family: 'JetBrains Mono', monospace; font-size: 0.75rem; color: var(--text-muted);">
                    v2.4.1</div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem;">
                <div style="background: rgba(0,0,0,0.05); padding: 0.5rem; border-radius: 8px; text-align: center;">
                    <div style="font-size: 0.7rem; color: var(--text-muted); margin-bottom: 0.2rem;">IPK (C1)</div>
                    <div style="font-family: 'JetBrains Mono', monospace; font-weight: 700; color: #10b981;">1.00</div>
                </div>
                <div style="background: rgba(0,0,0,0.05); padding: 0.5rem; border-radius: 8px; text-align: center;">
                    <div style="font-size: 0.7rem; color: var(--text-muted); margin-bottom: 0.2rem;">Gaji (C2)</div>
                    <div style="font-family: 'JetBrains Mono', monospace; font-weight: 700; color: var(--danger);">0.75
                    </div>
                </div>
                <div style="background: rgba(0,0,0,0.05); padding: 0.5rem; border-radius: 8px; text-align: center;">
                    <div style="font-size: 0.7rem; color: var(--text-muted); margin-bottom: 0.2rem;">Tgg (C3)</div>
                    <div style="font-family: 'JetBrains Mono', monospace; font-weight: 700; color: #10b981;">0.80</div>
                </div>
            </div>
        </div>

        <!-- Virtual Component 2: Ranking Badge -->
        <div class="v-card float-delay"
            style="width: 70%; bottom: 15%; left: 0; z-index: 4; border-color: rgba(16, 185, 129, 0.3);">
            <div style="display: flex; gap: 1rem; align-items: center;">
                <div
                    style="width: 50px; height: 50px; border-radius: 12px; background: linear-gradient(135deg, #10b981, #059669); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; box-shadow: 0 10px 20px rgba(16,185,129,0.3);">
                    <i class="ti ti-trophy"></i>
                </div>
                <div>
                    <div
                        style="font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 1px; margin-bottom: 0.2rem;">
                        Peringkat #1</div>
                    <div
                        style="font-family: 'Outfit', sans-serif; font-size: 1.2rem; font-weight: 800; line-height: 1.1; color: var(--text-main)">
                        Ahmad Rifai</div>
                    <div
                        style="font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; color: #10b981; margin-top: 0.2rem;">
                        Skor Vi: 95.84</div>
                </div>
            </div>
        </div>

        <!-- Virtual Component 3: Data Node (Small) -->
        <div class="v-card float-anim"
            style="padding: 1rem; border-radius: 50px; bottom: 40%; right: 0; z-index: 5; display: flex; align-items: center; gap: 0.5rem;">
            <div
                style="width: 12px; height: 12px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 10px var(--accent);">
            </div>
            <span
                style="font-family: 'JetBrains Mono', monospace; font-size: 0.75rem; font-weight: 700; color: var(--text-main)">Data
                Sync</span>
        </div>
    </div>
</section>

<!-- CAPABILITIES -->
<section id="capabilities" style="margin-bottom: var(--section-spacing);">
    <div class="section-title" data-aos="fade-up">
        <div class="section-tag" style="margin-bottom: 1rem;"><i class="ti ti-comet"></i> Kapabilitas</div>
        <h2
            style="font-size: 3rem; margin-bottom: 1.5rem; font-family: 'Outfit', sans-serif; font-weight: 800; line-height: 1.1;">
            Fitur Utama Sistem<span>.</span></h2>
    </div>

    <div class="cap-grid">
        <div class="cap-card col-8" data-aos="fade-up">
            <div class="flow-icon" style="width: 64px; height: 64px; font-size: 1.5rem; margin-bottom: 2rem;"><i
                    class="ti ti-settings-automation"></i></div>
            <h3 style="font-size: 1.5rem; font-family: 'Outfit', sans-serif; font-weight: 700; margin-bottom: 1rem;">
                Mesin Kalkulasi Otomatis</h3>
            <p style="color: var(--text-muted); line-height: 1.6; margin-bottom: 2rem;">Sistem secara cerdas mendeteksi
                tipe
                kriteria dan menerapkan rumus normalisasi yang tepat secara *real-time* tanpa intervensi manual oleh
                pengguna.</p>
            <div style="margin-top: auto; display: flex; gap: 1rem; flex-wrap: wrap;">
                <span
                    style="font-size: 0.75rem; background: rgba(37,99,235,0.1); color: var(--accent); padding: 6px 16px; border-radius: 50px; font-weight: 700;"><i
                        class="ti ti-trending-up"></i> Benefit Focus</span>
                <span
                    style="font-size: 0.75rem; background: rgba(239,68,68,0.1); color: var(--danger); padding: 6px 16px; border-radius: 50px; font-weight: 700;"><i
                        class="ti ti-trending-down"></i> Cost Aware</span>
            </div>
        </div>

        <div class="cap-card col-4" data-aos="fade-up" data-aos-delay="100">
            <div style="font-size: 2.5rem; color: var(--accent); margin-bottom: 1.5rem;"><i class="ti ti-users"></i>
            </div>
            <h3 style="font-size: 1.3rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--text-main);">Multi-User
                Roles</h3>
            <p style="color: var(--text-muted); line-height: 1.6;">Manajemen akses RBAC yang memisahkan ranah kerja
                administrator dan tim operasional.</p>
        </div>

        <div class="cap-card col-4" data-aos="fade-up" data-aos-delay="150" style="border-top-color: #10b981;">
            <div style="font-size: 2.5rem; color: #10b981; margin-bottom: 1.5rem;"><i class="ti ti-device-floppy"></i>
            </div>
            <h3 style="font-size: 1.3rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--text-main)">Sinkronisasi
                Data Real-time</h3>
            <p style="color: var(--text-muted); line-height: 1.6;">Seluruh input penilaian kandidat tersimpan otomatis
                dan
                memperbarui struktur peringkatan dalam hitungan milidetik.</p>
        </div>

        <div class="cap-card col-8" data-aos="fade-up" data-aos-delay="200"
            style="background: linear-gradient(135deg, rgba(255,255,255,0.05), transparent); display: flex; flex-direction: row; gap: 2.5rem; align-items: center; justify-content: space-between;">
            <div>
                <div
                    style="font-size: 1.2rem; font-weight: 700; color: var(--accent); letter-spacing: 1px; margin-bottom: 0.5rem; text-transform: uppercase;">
                    <i class="ti ti-report-analytics"></i> Output Transparan
                </div>
                <h3
                    style="font-size: 1.8rem; font-family: 'Outfit', sans-serif; font-weight: 800; margin-bottom: 1rem; line-height: 1.2; color: var(--text-main)">
                    Cetak Laporan Siap Saji</h3>
                <p style="color: var(--text-muted); line-height: 1.6; max-width: 400px; margin: 0;">Ekspor hasil akhir
                    ke
                    dalam format yang disetujui otoritas kampus. Buktikan akuntabilitas tanpa menutupi jejak nilai.</p>
            </div>
            <a href="<?= site_url('login') ?>" class="btn btn-primary"
                style="flex-shrink: 0; padding: 1rem 2rem; border-radius: 16px;">Buat Laporan <i
                    class="ti ti-external-link"></i></a>
        </div>
    </div>
</section>

<!-- METHODOLOGY SECTION -->
<section id="methodology" style="margin-bottom: var(--section-spacing);">
    <div class="flow-container">
        <div class="section-title" data-aos="fade-up" style="margin-bottom: 3rem;">
            <div class="section-tag">Arsitektur Logika</div>
            <h2>Alur Metodologi SAW<span>.</span></h2>
            <p style="color: var(--text-muted);">Bagaimana data mentah dikonversi menjadi keputusan peringkat.</p>
        </div>
        <!-- Step 1 -->
        <div class="flow-step" data-aos="fade-up">
            <div class="flow-icon"><i class="ti ti-list-numbers"></i></div>
            <div class="flow-content">
                <h3>01. Penentuan Kriteria</h3>
                <p>Setiap beasiswa memiliki variabel unik. Kita menentukan <strong>Kriteria (C)</strong> dan
                    <strong>Bobot (W)</strong> yang mencerminkan prioritas institusi.
                </p>
                <div class="formula-display">
                    <span class="formula-label">Vektor Bobot</span>
                    <code>W = [w1, w2, w3, ..., wj]</code>
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="flow-step" data-aos="fade-up">
            <div class="flow-icon"><i class="ti ti-arrows-maximize"></i></div>
            <div class="flow-content">
                <h3>02. Normalisasi (R)</h3>
                <p>Mengonversi nilai asli ke skala komparatif 0-1. Rumus dibedakan berdasarkan sifat kriteria untuk
                    menjaga keadilan distribusi nilai.</p>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 2rem;">
                    <div class="formula-display">
                        <span class="formula-label" style="background: #10b981;">Benefit (IPK, Prestasi)</span>
                        <code>rij = xij / max(xij)</code>
                    </div>
                    <div class="formula-display">
                        <span class="formula-label" style="background: #ef4444;">Cost (Penghasilan, Tanggungan)</span>
                        <code>rij = min(xij) / xij</code>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="flow-step" data-aos="fade-up">
            <div class="flow-icon"><i class="ti ti-sum"></i></div>
            <div class="flow-content">
                <h3>03. Skor Preferensi (V)</h3>
                <p>Langkah akhir dimana nilai ternormalisasi dikalikan dengan bobotnya masing-masing, lalu dijumlahkan
                    untuk mendapatkan <strong>Nilai Akhir (V)</strong>.</p>
                <div class="formula-display">
                    <span class="formula-label">Hasil Akhir</span>
                    <code>Vi = Σ (wj * rij)</code>
                </div>
                <p style="margin-top: 1.5rem; font-style: italic; color: var(--accent);">* Mahasiswa dengan nilai Vi
                    tertinggi menempati peringkat teratas.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section premium-glass" data-aos="zoom-in"
    style="margin: 4rem auto; border-radius: 40px; padding: 5rem 3rem; max-width: 1000px; text-align: center; position: relative; overflow: hidden; display: flex; flex-direction: column; align-items: center;">
    <!-- Abstract Glows for CTA -->
    <div
        style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(37, 99, 235, 0.4); filter: blur(100px); border-radius: 50%; z-index: 1;">
    </div>
    <div
        style="position: absolute; bottom: -50px; left: -50px; width: 250px; height: 250px; background: rgba(16, 185, 129, 0.2); filter: blur(100px); border-radius: 50%; z-index: 1;">
    </div>

    <div style="position: relative; z-index: 2;">
        <h2
            style="font-size: 3.5rem; letter-spacing: -2px; margin-bottom: 1.5rem; font-weight: 800; font-family: 'Outfit', sans-serif; color: var(--text-main);">
            Waktunya Transformasi Digital<span>.</span></h2>
        <p
            style="margin-bottom: 3rem; font-size: 1.2rem; color: var(--text-muted); max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6;">
            Bergabunglah dengan ekosistem administrasi beasiswa yang modern, presisi, dan akuntabel.</p>
        <div style="display: flex; gap: 1.5rem; justify-content: center;">
            <a href="<?= site_url('login') ?>" class="btn btn-primary"
                style="padding: 1.25rem 4rem; font-size: 1.1rem; border-radius: 24px; box-shadow: 0 20px 40px rgba(37, 99, 235, 0.3); transition: all 0.3s ease;">
                Buka Panel Dashboard
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>