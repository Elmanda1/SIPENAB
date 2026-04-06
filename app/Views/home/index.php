<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<style>
    .hero {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding-top: 4rem;
        padding-bottom: 6rem;
    }

    .hero-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        background: var(--glass-bg);
        backdrop-filter: blur(8px);
        border: 1px solid var(--glass-border);
        color: var(--accent);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .hero h1 {
        font-size: clamp(3rem, 6vw, 5rem);
        margin-bottom: 1.5rem;
        max-width: 900px;
        letter-spacing: -1.5px;
    }

    .hero p {
        font-size: clamp(1.1rem, 2vw, 1.25rem);
        color: var(--text-muted);
        max-width: 700px;
        margin-bottom: 3rem;
        line-height: 1.6;
    }

    /* --- STATS --- */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 4rem;
    }

    .stat-card {
        padding: 2.5rem 2rem;
        text-align: center;
        transition: transform 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-family: 'Outfit', sans-serif;
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--accent);
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--text-muted);
    }

    /* --- ABOUT / FEATURES --- */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .section-subtitle {
        text-align: center;
        color: var(--text-muted);
        margin-bottom: 4rem;
        font-size: 1.1rem;
        max-width: 600px;
        margin-inline: auto;
    }

    .feature-card {
        padding: 2.5rem;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .feature-icon {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        width: 60px; height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: rgba(255,255,255,0.1);
        border: 1px solid var(--glass-border);
        color: var(--text-main);
    }

    .feature-card h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .feature-card p {
        color: var(--text-muted);
        line-height: 1.6;
        flex-grow: 1;
    }

    /* --- TESTIMONIALS --- */
    .testimonials {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .review-card {
        padding: 2rem;
        position: relative;
    }
    
    .review-text {
        font-size: 1.1rem;
        font-style: italic;
        margin-bottom: 2rem;
        line-height: 1.7;
    }

    .reviewer {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--accent);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .reviewer-info h4 { margin-bottom: 0.2rem; }
    .reviewer-info p { font-size: 0.85rem; color: var(--text-muted); }

    /* --- CTA --- */
    .cta-section {
        text-align: center;
        padding: 6rem 2rem;
        margin: 6rem auto 2rem auto;
        max-width: 1000px;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section h2 {
        font-size: 3rem;
        margin-bottom: 1.5rem;
    }
</style>

<!-- Bagian Hero -->
<section class="hero">
    <div class="hero-badge">Sistem Pendukung Keputusan</div>
    <h1>Seleksi Beasiswa Berbasis Data</h1>
    <p>Memberdayakan perguruan tinggi untuk mengalokasikan beasiswa secara adil, akurat, dan objektif menggunakan algoritma Simple Additive Weighting (SAW). Tidak ada lagi kesalahan manual dan ketidakadilan.</p>
    <div>
        <a href="<?= site_url('login') ?>" class="btn btn-primary"><i class="ti ti-login"></i> Masuk ke Dashboard</a>
        <a href="#fitur" class="btn btn-glass"><i class="ti ti-arrow-down"></i> Pelajari Lebih Lanjut</a>
    </div>
</section>

<!-- Bagian Statistik -->
<section id="statistik" style="margin-top: 4rem;">
    <div class="stats-grid">
        <div class="stat-card glass">
            <div class="stat-number" data-target="4">0</div>
            <div class="stat-label">Kriteria Evaluasi Utama</div>
        </div>
        <div class="stat-card glass">
            <div class="stat-number" data-target="100">0</div>
            <span style="font-size: 2rem; color: var(--accent); font-weight: bold; position: absolute; margin-top: -65px; margin-left: 55px;">%</span>
            <div class="stat-label">Akurasi Objektif</div>
        </div>
        <div class="stat-card glass" style="position:relative;">
            <div class="stat-number" data-target="24">0</div>
            <span style="font-size: 2rem; color: var(--accent); font-weight: bold; position: absolute; margin-top: -65px; margin-left: 10px;">/7</span>
            <div class="stat-label">Ketersediaan Sistem</div>
        </div>
    </div>
</section>

<!-- Bagian Fitur -->
<section id="fitur" style="margin-top: 8rem;">
    <h2 class="section-title">Mengapa Memilih SIPENAB?</h2>
    <p class="section-subtitle">Pendekatan modern untuk pengambilan keputusan di kampus. Kami menggantikan penilaian subjektif dengan presisi berbasis algoritma.</p>
    
    <div class="features-grid">
        <div class="feature-card glass">
            <div class="feature-icon"><i class="ti ti-scale"></i></div>
            <h3>Keadilan Metodis</h3>
            <p>Dengan mengimplementasikan algoritma SAW, setiap kandidat dinilai secara seragam berdasarkan kriteria benefit dan cost yang dinormalisasi seperti IPK dan penghasilan orang tua.</p>
        </div>
        <div class="feature-card glass">
            <div class="feature-icon"><i class="ti ti-bolt"></i></div>
            <h3>Peringkat Otomatis</h3>
            <p>Cukup masukkan data ke dalam sistem, dan langsung dapatkan peringkat kandidat yang paling layak menerima beasiswa. Tidak perlu lagi repot dengan spreadsheet.</p>
        </div>
        <div class="feature-card glass">
            <div class="feature-icon"><i class="ti ti-lock"></i></div>
            <h3>Keamanan Berbasis Peran</h3>
            <p>Dirancang dengan akses administratif. Administrator dan operator memiliki kontrol yang berbeda atas manajemen data dan pembobotan algoritma.</p>
        </div>
    </div>
</section>

<!-- Bagian Testimoni -->
<section id="testimoni" style="margin-top: 8rem;">
    <h2 class="section-title">Dipercaya oleh Staf Akademik</h2>
    <p class="section-subtitle">Dengarkan bagaimana SIPENAB mengubah alur kerja panitia beasiswa.</p>

    <div class="testimonials">
        <div class="review-card glass">
            <p class="review-text">"Sebelum SIPENAB, menyortir ratusan pelamar membutuhkan waktu berminggu-minggu bagi tim kami. Sekarang, sistem secara matematis menghitung kandidat yang tepat dalam hitungan detik. Tampilan glassmorphism-nya adalah bonus yang luar biasa!"</p>
            <div class="reviewer">
                <div class="avatar">A</div>
                <div class="reviewer-info">
                    <h4>Ahmad R.</h4>
                    <p>Kepala Bagian Kemahasiswaan</p>
                </div>
            </div>
        </div>
        <div class="review-card glass">
            <p class="review-text">"Yang paling saya sukai adalah transparansinya. Karena kami menggunakan metodologi SAW, kami dapat menjelaskan dengan tepat mengapa seorang mahasiswa dipilih. Ini benar-benar menghilangkan klaim ketidakadilan."</p>
            <div class="reviewer">
                <div class="avatar">S</div>
                <div class="reviewer-info">
                    <h4>Siti Nuraenah</h4>
                    <p>Administrator Akademik</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bagian CTA -->
<section>
    <div class="cta-section glass">
        <h2>Siap Memodernisasi Proses Seleksi Anda?</h2>
        <p style="color: var(--text-muted); margin-bottom: 2rem; font-size: 1.1rem;">Terapkan SIPENAB di kampus Anda hari ini dan wujudkan keadilan absolut dalam distribusi beasiswa.</p>
        <a href="<?= site_url('login') ?>" class="btn btn-primary"><i class="ti ti-rocket"></i> Mulai Sekarang</a>
    </div>
</section>

<script>
    // Animasi angka statistik
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const animateNumbers = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-target'));
                const duration = 2000;
                const stepTime = Math.abs(Math.floor(duration / target));
                
                let current = 0;
                const timer = setInterval(() => {
                    current += 1;
                    el.textContent = current;
                    if (current === target) {
                        clearInterval(timer);
                    }
                }, stepTime);
                
                observer.unobserve(el);
            }
        });
    };

    const observer = new IntersectionObserver(animateNumbers, { threshold: 0.5 });
    statNumbers.forEach(num => observer.observe(num));
</script>

<?= $this->endSection() ?>
