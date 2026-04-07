<!DOCTYPE html>
<html lang="id" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENAB | <?= $title ?? 'Beasiswa Decision Support' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap"
        rel="stylesheet">
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            /* Light Theme */
            --bg-color: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.5);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);

            --blob-1: #3b82f6;
            --blob-2: #10b981;
            --blob-3: #8b5cf6;

            --btn-bg: rgba(255, 255, 255, 0.8);
            --btn-hover: rgba(255, 255, 255, 1);
            --accent: #2563eb;
            --danger: #ef4444;
        }

        [data-theme="dark"] {
            --bg-color: #0b0f19;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --glass-bg: rgba(17, 24, 39, 0.6);
            --glass-border: rgba(255, 255, 255, 0.05);
            --glass-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.4);

            --blob-1: #2563eb;
            --blob-2: #059669;
            --blob-3: #7c3aed;

            --btn-bg: rgba(30, 41, 59, 0.6);
            --btn-hover: rgba(51, 65, 85, 0.8);
            --accent: #3b82f6;
            --danger: #f87171;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            overflow-x: hidden;
            transition: background-color 0.5s ease, color 0.5s ease;
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Outfit', sans-serif;
            line-height: 1.1;
        }

        /* --- BLOB ANIMATIONS (Background) --- */
        .blobs-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            z-index: -1;
            filter: blur(120px);
            opacity: 0.5;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            animation: move 20s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
        }

        .blob-1 {
            width: 50vw;
            height: 50vw;
            background: var(--blob-1);
            top: -10%;
            left: -10%;
            animation-duration: 25s;
        }

        .blob-2 {
            width: 40vw;
            height: 40vw;
            background: var(--blob-2);
            bottom: -10%;
            right: -10%;
            animation-delay: -5s;
            animation-duration: 20s;
        }

        .blob-3 {
            width: 45vw;
            height: 45vw;
            background: var(--blob-3);
            top: 40%;
            left: 30%;
            animation-delay: -10s;
            animation-duration: 22s;
        }

        @keyframes move {
            0% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(10vw, 15vh) scale(1.1);
            }

            66% {
                transform: translate(-10vw, 5vh) scale(0.9);
            }

            100% {
                transform: translate(5vw, -15vh) scale(1);
            }
        }

        /* --- GLASSMORPHISM UTILITY --- */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
            border-radius: 24px;
        }

        /* --- NAVBAR WITH SMOOTH ANIMATION --- */
        nav {
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 1.5rem;
            z-index: 100;
            margin: 0 auto;
            width: 95%;
            max-width: 1200px;
            border-radius: 100px;
            background: var(--glass-bg);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--glass-border);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -1px;
            color: var(--text-main);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .logo span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;
            position: relative;
            background: rgba(0, 0, 0, 0.05);
            padding: 0.4rem;
            border-radius: 100px;
        }

        [data-theme="dark"] .nav-links {
            background: rgba(255, 255, 255, 0.03);
        }

        .nav-links a {
            color: var(--text-main);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.6rem 1.2rem;
            border-radius: 100px;
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .nav-links a:hover {
            color: var(--text-main);
        }

        /* The sliding pill */
        .nav-pill {
            position: absolute;
            height: calc(100% - 0.8rem);
            top: 0.4rem;
            background: rgba(0, 0, 0, 0.05);
            border-radius: 100px;
            z-index: 1;
            transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border: 1px solid var(--glass-border);
            opacity: 0;
            pointer-events: none;
        }

        [data-theme="dark"] .nav-pill {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-links:hover .nav-pill {
            opacity: 1;
        }

        .theme-toggle {
            background: var(--btn-bg);
            border: 1px solid var(--glass-border);
            color: var(--text-main);
            font-size: 1.2rem;
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .theme-toggle:hover {
            transform: rotate(15deg) scale(1.1);
            background: var(--accent);
            color: #fff;
            border-color: var(--accent);
        }

        /* --- SHARED BUTTONS & FORMS --- */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            cursor: pointer;
            border: 1px solid transparent;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
            background: #2563eb;
            /* Ensure contrast */
            color: #fff !important;
        }

        .btn-glass {
            background: var(--glass-bg);
            color: var(--text-main);
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            border-color: var(--accent);
        }

        .main-content {
            flex-grow: 1;
            padding: 4rem 5%;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* --- PROFESSIONAL FOOTER --- */
        .site-footer {
            margin-top: auto;
            border-top: 1px solid var(--glass-border);
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 4rem 5% 2rem;
            color: var(--text-muted);
            box-shadow: 0 -4px 30px rgba(0, 0, 0, 0.05);
        }

        .footer-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand .logo {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            position: static;
        }

        .footer-brand p {
            line-height: 1.6;
            margin-bottom: 1.5rem;
            max-width: 350px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--btn-bg);
            color: var(--text-main);
            border: 1px solid var(--glass-border);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--accent);
            color: #fff;
            transform: translateY(-3px);
            border-color: var(--accent);
        }

        .footer-links h4 {
            color: var(--text-main);
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            letter-spacing: 0.5px;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--accent);
            transform: translateX(5px);
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 1.5rem;
            border-top: 1px solid var(--glass-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-bottom-links a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: var(--text-main);
        }

        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            nav {
                flex-direction: column;
                border-radius: 24px;
                padding: 1.5rem;
                gap: 1.5rem;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                background: transparent;
            }

            .nav-pill {
                display: none;
            }

            .nav-links a {
                background: var(--glass-bg);
                border: 1px solid var(--glass-border);
                margin: 0.25rem;
            }
        }
    </style>
</head>

<body>

    <!-- Animated Gradient Background Blobs -->
    <div class="blobs-container">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <!-- Navigation -->
    <nav>
        <a href="<?= site_url('/') ?>" class="logo"><i class="ti ti-school"></i> SIPENAB<span>.</span></a>

        <div class="nav-links" id="navLinks">
            <div class="nav-pill" id="navPill"></div>
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= site_url('dashboard') ?>"><i class="ti ti-chart-bar"></i> Hasil</a>
                <a href="<?= site_url('mahasiswa') ?>"><i class="ti ti-users"></i> Mahasiswa</a>
                <a href="<?= site_url('kriteria') ?>"><i class="ti ti-list"></i> Kriteria</a>
                <a href="<?= site_url('penilaian') ?>"><i class="ti ti-clipboard-list"></i> Penilaian</a>
                <a href="<?= site_url('logout') ?>" style="color: var(--danger);"><i class="ti ti-logout"></i> Keluar</a>
            <?php else: ?>
                <a href="<?= site_url('/#hero') ?>"><i class="ti ti-home"></i> Beranda</a>
                <a href="<?= site_url('/#capabilities') ?>"><i class="ti ti-star"></i> Kapabilitas</a>
                <a href="<?= site_url('/#methodology') ?>"><i class="ti ti-info-circle"></i> Metodologi</a>
                <a href="<?= site_url('login') ?>" style="color: var(--accent);"><i class="ti ti-login"></i> Masuk</a>
            <?php endif; ?>
        </div>

        <button class="theme-toggle" id="themeToggle" aria-label="Toggle Theme">
            <i class="ti ti-moon"></i>
        </button>
    </nav>

    <!-- Main Content Injection -->
    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?= site_url('/') ?>" class="logo"><i class="ti ti-school"></i> SIPENAB<span>.</span></a>
                <p>Sistem Pendukung Keputusan Pemilihan Beasiswa menggunakan algoritma <strong>Simple Additive Weighting
                        (SAW)</strong>. Transparan, cepat, dan presisi tinggi.</p>
            </div>
            <div class="footer-links">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="<?= site_url('/') ?>">Beranda</a></li>
                    <li><a href="<?= site_url('/#capabilities') ?>">Kapabilitas</a></li>
                    <li><a href="<?= site_url('/#methodology') ?>">Metodologi</a></li>
                    <li><a href="<?= site_url('login') ?>">Masuk Dashboard</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Bantuan & Dukungan</h4>
                <ul>
                    <li><a href="<?= site_url('panduan') ?>">Panduan Penggunaan</a></li>
                    <li><a href="<?= site_url('metode') ?>">Metode Penilaian</a></li>
                    <li><a href="<?= site_url('faq') ?>">Tanya Jawab (FAQ)</a></li>
                    <li><a href="<?= site_url('kontak') ?>">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> SIPENAB. Hak Cipta Dilindungi.</p>
            <div class="footer-bottom-links">
                <a href="#">Syarat & Ketentuan</a>
                <a href="#">Kebijakan Privasi</a>
            </div>
        </div>
    </footer>

    <!-- GLOBAL CONFIRMATION MODAL -->
    <div id="globalConfirmModal"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background: rgba(0,0,0,0.6); backdrop-filter: blur(12px); display: none; align-items: center; justify-content: center; animation: modalFadeIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
        <div class="glass"
            style="width: 90%; max-width: 400px; padding: 2.5rem; text-align: center; border-radius: 32px; border: 1px solid rgba(255,255,255,0.15);">
            <div id="globalModalIconContainer"
                style="background: rgba(37, 99, 235, 0.1); color: var(--accent); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2.5rem;">
                <i id="globalModalIcon" class="ti ti-help"></i>
            </div>
            <h2 id="globalModalTitle"
                style="margin-bottom: 0.8rem; font-size: 1.8rem; font-weight: 800; letter-spacing: -0.5px;">Konfirmasi
            </h2>
            <p id="globalModalMsg"
                style="color: var(--text-muted); margin-bottom: 2.5rem; line-height: 1.6; font-size: 1rem;">Apakah Anda
                yakin ingin melanjutkan tindakan ini?</p>

            <div style="display: flex; gap: 1rem; justify-content: center;">
                <button onclick="hideConfirmModal()" class="btn btn-glass" style="flex: 1;">Batal</button>
                <a id="globalModalBtn" href="#" class="btn btn-primary" style="flex: 1;">Lanjutkan</a>
            </div>
        </div>
    </div>

    <script>
        // Universal Smooth Scroll for internal links
        document.querySelectorAll('a[href*="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                
                // Get the hash part
                const hashIndex = href.indexOf('#');
                if (hashIndex === -1) return;
                
                const hash = href.substring(hashIndex);
                const path = href.substring(0, hashIndex);
                
                // Check if we are on the target page
                const currentPath = window.location.pathname;
                const targetPath = new URL(href, window.location.origin).pathname;

                if (targetPath === currentPath || (targetPath === '/' && currentPath === '')) {
                    const targetElement = document.querySelector(hash);
                    if (targetElement) {
                        e.preventDefault();
                        const navHeight = document.querySelector('nav').offsetHeight;
                        window.scrollTo({
                            top: targetElement.offsetTop - navHeight - 20,
                            behavior: 'smooth'
                        });
                        history.pushState(null, null, hash);
                    }
                }
            });
        });

        // Smooth Navbar Pill Animation
        const navLinks = document.querySelectorAll('#navLinks a');
        const navPill = document.getElementById('navPill');
        const navContainer = document.getElementById('navLinks');

        if (navLinks.length > 0 && navPill) {
            function updatePill(target) {
                const rect = target.getBoundingClientRect();
                const containerRect = navContainer.getBoundingClientRect();
                navPill.style.width = `${rect.width}px`;
                navPill.style.transform = `translateX(${rect.left - containerRect.left}px)`;
                navPill.style.opacity = '1';
            }

            navLinks.forEach(link => {
                link.addEventListener('mouseenter', (e) => updatePill(e.target));
            });

            navContainer.addEventListener('mouseleave', () => {
                navPill.style.opacity = '0';
            });
        }

        // Theme Toggle Logic
        const toggleBtn = document.getElementById('themeToggle');
        const themeIcon = toggleBtn.querySelector('i');
        const htmlElement = document.documentElement;

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            htmlElement.setAttribute('data-theme', savedTheme);
            updateIcon(savedTheme);
        }

        toggleBtn.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            htmlElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });

        function updateIcon(theme) {
            if (theme === 'light') {
                themeIcon.className = 'ti ti-sun';
            } else {
                themeIcon.className = 'ti ti-moon';
            }
        }

        // Modal Logic
        const globalModal = document.getElementById('globalConfirmModal');
        const globalModalTitle = document.getElementById('globalModalTitle');
        const globalModalMsg = document.getElementById('globalModalMsg');
        const globalModalIcon = document.getElementById('globalModalIcon');
        const globalModalBtn = document.getElementById('globalModalBtn');

        function showConfirmModal(url, message = 'Apakah Anda yakin ingin melanjutkan?', title = 'Konfirmasi', icon = 'ti-question-mark') {
            globalModalTitle.innerText = title;
            globalModalMsg.innerText = message;
            globalModalIcon.className = 'ti ' + icon;
            globalModalBtn.href = url;
            globalModal.style.display = 'flex';
        }

        function hideConfirmModal() {
            globalModal.style.display = 'none';
        }

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') hideConfirmModal();
        });
    </script>

    <style>
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.85) translateY(20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
    </style>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>
</body>

</html>