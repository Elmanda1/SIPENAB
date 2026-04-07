<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENAB | <?= $title ?? 'Beasiswa Decision Support' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    
    <style>
        :root {
            /* Light Theme */
            --bg-color: #f0fdf4;
            --text-main: #0f172a;
            --text-muted: #475569;
            --glass-bg: rgba(255, 255, 255, 0.4);
            --glass-border: rgba(255, 255, 255, 0.6);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
            
            --blob-1: #3b82f6;
            --blob-2: #10b981;
            --blob-3: #8b5cf6;
            
            --btn-bg: rgba(255, 255, 255, 0.7);
            --btn-hover: rgba(255, 255, 255, 0.9);
            --accent: #2563eb;
            --danger: #ef4444;
        }

        [data-theme="dark"] {
            --bg-color: #0f172a;
            --text-main: #f8fafc;
            --text-muted: #cbd5e1;
            --glass-bg: rgba(30, 41, 59, 0.4);
            --glass-border: rgba(255, 255, 255, 0.08);
            --glass-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            
            --blob-1: #2563eb; 
            --blob-2: #059669; 
            --blob-3: #6d28d9; 
            
            --btn-bg: rgba(30, 41, 59, 0.7);
            --btn-hover: rgba(51, 65, 85, 0.9);
            --accent: #60a5fa;
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

        h1, h2, h3, h4, h5 {
            font-family: 'Outfit', sans-serif;
            line-height: 1.2;
        }

        /* --- BLOB ANIMATIONS (Background) --- */
        .blobs-container {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            overflow: hidden;
            z-index: -1;
            filter: blur(100px);
            opacity: 0.7;
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            animation: move 20s infinite alternate;
        }
        .blob-1 { width: 50vw; height: 50vw; background: var(--blob-1); top: -10%; left: -10%; animation-duration: 25s; }
        .blob-2 { width: 40vw; height: 40vw; background: var(--blob-2); bottom: -10%; right: -10%; animation-delay: -5s; animation-duration: 20s; }
        .blob-3 { width: 45vw; height: 45vw; background: var(--blob-3); top: 40%; left: 30%; animation-delay: -10s; animation-duration: 22s; }

        @keyframes move {
            0% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(10vw, 15vh) scale(1.1); }
            66% { transform: translate(-10vw, 5vh) scale(0.9); }
            100% { transform: translate(5vw, -15vh) scale(1); }
        }

        /* --- GLASSMORPHISM UTILITY --- */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
            border-radius: 24px;
        }

        /* --- NAVBAR --- */
        nav {
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 1rem;
            z-index: 100;
            margin: 0 auto;
            width: 90%;
            max-width: 1400px;
            border-radius: 50px;
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
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
        }
        
        .logo span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: var(--text-main);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .theme-toggle {
            background: none;
            border: none;
            color: var(--text-main);
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }
        .theme-toggle:hover {
            transform: scale(1.1);
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
            font-size: 0.9rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid transparent;
        }
        .btn-primary {
            background: var(--text-main);
            color: var(--bg-color);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .btn-glass {
            background: var(--btn-bg);
            color: var(--text-main);
            border: 1px solid var(--glass-border);
        }
        .btn-glass:hover {
            background: var(--btn-hover);
            transform: translateY(-3px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--glass-border);
        }
        th {
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            background: var(--btn-bg);
            border: 1px solid var(--glass-border);
            color: var(--text-main);
            font-family: inherit;
        }
        .form-control:focus {
            outline: 2px solid var(--accent);
        }

        .main-content {
            flex-grow: 1;
            padding: 4rem 5%;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        .page-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header .header-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .page-header .header-actions form {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .page-header .header-actions select {
            min-width: 120px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-responsive table {
            width: 100%;
            min-width: 100%;
            border-collapse: collapse;
        }

        .table-responsive table th,
        .table-responsive table td {
            padding: 0.85rem 0.75rem;
        }

        .evaluation-matrix table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 1rem;
        }

        .evaluation-matrix thead tr {
            background: transparent;
        }

        .evaluation-matrix tbody tr {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 18px;
        }

        .evaluation-matrix th,
        .evaluation-matrix td {
            padding: 1rem 1rem;
        }

        .evaluation-matrix td {
            vertical-align: middle;
        }

        .evaluation-matrix td input.form-control {
            min-width: 180px;
        }

        .pager-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .pagination {
            display: inline-flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            display: inline;
        }

        .pagination li a,
        .pagination li span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 0.75rem;
            border-radius: 10px;
            border: 1px solid var(--glass-border);
            text-decoration: none;
            color: var(--text-main);
            background: var(--btn-bg);
            font-size: 0.9rem;
        }

        .pagination li a:hover,
        .pagination li span.current {
            background: rgba(99, 102, 241, 0.15);
            border-color: var(--accent);
            color: var(--accent);
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: stretch;
            }

            .page-header .header-actions {
                justify-content: space-between;
                width: 100%;
            }

            .page-header .header-actions form {
                width: 100%;
                justify-content: flex-start;
            }

            .page-header .header-actions select {
                width: 100%;
            }

            .main-content {
                padding: 2rem 5%;
            }
        }

        /* --- FOOTER --- */
        footer {
            padding: 3rem 5%;
            margin-top: auto;
            text-align: center;
            border-top: 1px solid var(--glass-border);
            color: var(--text-muted);
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                border-radius: 20px;
                padding: 1rem;
                gap: 1rem;
            }
            .nav-links {
                flex-direction: column;
                gap: 1rem;
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
        <div class="nav-links">
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= site_url('dashboard') ?>"><i class="ti ti-chart-bar"></i> Hasil</a>
                <a href="<?= site_url('mahasiswa') ?>"><i class="ti ti-users"></i> Mahasiswa</a>
                <a href="<?= site_url('kriteria') ?>"><i class="ti ti-list"></i> Kriteria</a>
                <a href="<?= site_url('penilaian') ?>"><i class="ti ti-clipboard-list"></i> Penilaian</a>
                <a href="<?= site_url('logout') ?>"><i class="ti ti-logout"></i> Keluar</a>
            <?php else: ?>
                <a href="<?= site_url('#about') ?>"><i class="ti ti-info-circle"></i> Tentang</a>
                <a href="<?= site_url('#features') ?>"><i class="ti ti-star"></i> Fitur</a>
                <a href="<?= site_url('login') ?>" style="display:inline-flex;align-items:center;gap:0.4rem;padding:0.5rem 1.25rem;background:#6366f1;color:#ffffff !important;border-radius:10px;text-decoration:none;font-weight:700;font-size:0.9rem;border:none;transition:background 0.2s;" onmouseover="this.style.background='#4f46e5'" onmouseout="this.style.background='#6366f1'"><i class="ti ti-login"></i> Masuk</a>
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
    <footer>
        <p>&copy; 2026 SIPENAB. Sistem Pendukung Keputusan Pemilihan Beasiswa.</p>
        <p style="margin-top: 0.5rem; font-size: 0.9rem;">Dibangun dengan CodeIgniter 4 &amp; Desain Glassmorphism.</p>
    </footer>

    <!-- GLOBAL CONFIRMATION MODAL -->
    <div id="globalConfirmModal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background: rgba(0,0,0,0.5); backdrop-filter: blur(10px); display: none; align-items: center; justify-content: center; animation: modalFadeIn 0.3s ease;">
        <div class="glass" style="width: 90%; max-width: 450px; padding: 2.5rem; text-align: center; box-shadow: 0 20px 60px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.15);">
            <div id="globalModalIconContainer" style="background: rgba(37, 99, 235, 0.1); color: var(--accent); width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">
                <i id="globalModalIcon" class="ti ti-help"></i>
            </div>
            <h2 id="globalModalTitle" style="margin-bottom: 0.8rem; font-size: 1.6rem; letter-spacing: -0.5px;">Konfirmasi</h2>
            <p id="globalModalMsg" style="color: var(--text-muted); margin-bottom: 2rem; line-height: 1.6; font-size: 0.95rem;">Apakah Anda yakin ingin melanjutkan tindakan ini?</p>
            
            <div style="display: flex; gap: 0.8rem; justify-content: center;">
                <button onclick="hideConfirmModal()" class="btn btn-glass" style="padding: 0.7rem 1.8rem; flex: 1;">Batal</button>
                <a id="globalModalBtn" href="#" class="btn btn-primary" style="padding: 0.7rem 1.8rem; flex: 1; background: var(--accent); color: #fff; border: none;">Ya, Lanjutkan</a>
            </div>
        </div>
    </div>

    <script>
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
            if(theme === 'light') {
                themeIcon.className = 'ti ti-sun';
            } else {
                themeIcon.className = 'ti ti-moon';
            }
        }

        // --- GLOBAL CONFIRMATION MODAL LOGIC ---
        const globalModal = document.getElementById('globalConfirmModal');
        const globalModalTitle = document.getElementById('globalModalTitle');
        const globalModalMsg = document.getElementById('globalModalMsg');
        const globalModalIcon = document.getElementById('globalModalIcon');
        const globalModalBtn = document.getElementById('globalModalBtn');

        function showConfirmModal(url, message = 'Apakah Anda yakin ingin melanjutkan?', title = 'Konfirmasi Tindakan', icon = 'ti-question-mark') {
            globalModalTitle.innerText = title;
            globalModalMsg.innerText = message;
            globalModalIcon.className = 'ti ' + icon;
            globalModalBtn.href = url;
            globalModal.style.display = 'flex';
        }

        function hideConfirmModal() {
            globalModal.style.display = 'none';
        }

        // Close on escape
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') hideConfirmModal();
        });
    </script>

    <style>
        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</body>
</html>
