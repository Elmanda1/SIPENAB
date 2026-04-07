<!DOCTYPE html>
<html lang="id" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? esc($title) . ' | SIPENAB' : 'SIPENAB Dashboard' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-w: 280px;
            --topbar-h: 80px;
        }

        /* Modern Dark Theme */
        [data-theme="dark"] {
            --bg: #0b0f19;
            --surface: rgba(17, 24, 39, 0.6);
            --surface2: rgba(30, 41, 59, 0.7);
            --border: rgba(255, 255, 255, 0.05);
            --border-hover: rgba(255, 255, 255, 0.15);
            --text: #f8fafc;
            --muted: #94a3b8;
            --accent: #3b82f6;
            --accent2: #60a5fa;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --glass: rgba(255, 255, 255, 0.02);
            --glass-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.4);
            --blob-1: #2563eb;
            --blob-2: #059669;
            --blob-3: #7c3aed;
        }

        /* Modern Light Theme */
        [data-theme="light"] {
            --bg: #f8fafc;
            --surface: rgba(255, 255, 255, 0.7);
            --surface2: rgba(255, 255, 255, 0.9);
            --border: rgba(0, 0, 0, 0.05);
            --border-hover: rgba(0, 0, 0, 0.15);
            --text: #0f172a;
            --muted: #64748b;
            --accent: #2563eb;
            --accent2: #3b82f6;
            --success: #059669;
            --danger: #dc2626;
            --warning: #d97706;
            --glass: rgba(255, 255, 255, 0.5);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);
            --blob-1: #3b82f6;
            --blob-2: #10b981;
            --blob-3: #8b5cf6;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            transition: background 0.5s ease, color 0.5s ease;
            overflow-x: hidden;
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
            opacity: 0.4;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            animation: move 20s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
        }

        .blob-1 {
            width: 40vw;
            height: 40vw;
            background: var(--blob-1);
            top: -10%;
            left: -10%;
            animation-duration: 25s;
        }

        .blob-2 {
            width: 35vw;
            height: 35vw;
            background: var(--blob-2);
            bottom: -10%;
            right: -10%;
            animation-delay: -5s;
            animation-duration: 20s;
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
        .glass-panel {
            background: var(--surface);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--border);
            box-shadow: var(--glass-shadow);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-w);
            position: fixed;
            top: 1rem;
            left: 1rem;
            bottom: 1rem;
            border-radius: 32px;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), background 0.5s ease;
            overflow: hidden;

            /* UI/UX Pro Max Colors */
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        [data-theme="light"] .sidebar {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 20px 40px rgba(31, 38, 135, 0.05);
        }

        .sidebar-logo {
            padding: 2rem 1.5rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--accent), #8b5cf6);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
            color: #fff;
        }

        [data-theme="light"] .logo-text {
            color: #0f172a;
        }

        .sidebar-section {
            padding: 1rem 1.5rem 0.5rem;
        }

        .sidebar-section-label {
            font-size: 0.70rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.4);
            margin-bottom: 1rem;
            padding-left: 0.5rem;
        }

        [data-theme="light"] .sidebar-section-label {
            color: rgba(0, 0, 0, 0.4);
        }

        .nav-menu {
            position: relative;
            padding: 0 1rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.85rem 1rem;
            border-radius: 16px;
            text-decoration: none;
            color: rgba(255,255,255,0.6);
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            margin-bottom: 0.25rem;
        }
        
        [data-theme="light"] .nav-item {
            color: rgba(0,0,0,0.6);
        }

        .nav-item i { font-size: 1.3rem; transition: transform 0.3s ease, color 0.3s ease; }

        /* Hover animation for icon only (color handled by .has-pill) */
        .nav-item:hover i {
            transform: scale(1.1);
        }

        /* Active item styling (when pill is NOT directly on it) */
        .nav-item.active {
            color: #fff;
        }
        .nav-item.active i {
            color: #fff;
        }
        
        [data-theme="light"] .nav-item.active {
            color: var(--accent); /* Ensure it's visible on white background */
        }
        [data-theme="light"] .nav-item.active i {
            color: var(--accent);
        }

        /* The item currently covered by the moving pill */
        .nav-item.has-pill {
            color: #fff !important;
        }
        .nav-item.has-pill i {
            color: #fff !important;
        }

        /* Smooth Pill Animation for Sidebar */
        .sidebar-scroll {
            position: relative;
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        [data-theme="light"] .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
        }

        .sidebar-pill {
            position: absolute;
            left: 2.5rem;
            width: calc(100% - 5rem);
            height: 48px;
            /* matches .nav-item height */
            background: var(--accent);
            border-radius: 16px;
            z-index: 1;
            transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            opacity: 0;
            pointer-events: none;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.25);
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1.5rem;
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        [data-theme="light"] .user-card {
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        [data-theme="light"] .user-avatar {
            background: rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #0f172a;
        }

        .user-card-text {
            font-weight: 700;
            font-size: 0.95rem;
            color: #fff;
        }

        [data-theme="light"] .user-card-text {
            color: #0f172a;
        }

        /* ===== MAIN WRAPPER ===== */
        .main-wrapper {
            margin-left: calc(var(--sidebar-w) + 2rem);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 1rem 2rem 2rem 0;
        }

        /* ===== TOPBAR ===== */
        .topbar {
            height: var(--topbar-h);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            border-radius: 24px;
            margin-bottom: 2rem;
            z-index: 99;
        }

        .page-breadcrumb {
            font-size: 0.9rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .page-breadcrumb .current {
            color: var(--text);
            font-weight: 700;
            font-size: 1.25rem;
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.5px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .theme-btn {
            background: var(--surface);
            border: 1px solid var(--border);
            width: 44px;
            height: 44px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text);
            font-size: 1.2rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .theme-btn:hover {
            transform: rotate(15deg) scale(1.1);
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 14px;
            font-size: 0.9rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: var(--danger);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
        }

        /* ===== CONTENT AREA ===== */
        .content-area {
            flex: 1;
        }

        /* ===== ALERTS ===== */
        .alert {
            padding: 1.25rem 1.5rem;
            border-radius: 20px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 600;
            font-size: 0.95rem;
            backdrop-filter: blur(12px);
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        /* ===== FORMS & INPUTS ===== */
        .form-control {
            width: 100%;
            padding: 0.85rem 1.25rem;
            border-radius: 14px;
            background: var(--glass);
            border: 1px solid var(--border);
            color: var(--text);
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            background: var(--surface2);
        }

        /* ===== COMMON BUTTONS ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.85rem 1.5rem;
            border-radius: 14px;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-glass {
            background: var(--glass);
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-glass:hover {
            border-color: var(--accent);
            transform: translateY(-3px);
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-120%);
                z-index: 1000;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
                padding: 1rem;
            }

            .topbar {
                padding: 0 1rem;
            }
        }
    </style>
</head>

<body>

    <div class="blobs-container">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon"><i class="ti ti-school"></i></div>
            <div>
                <div class="logo-text">SIPENAB<span style="color: var(--accent)">.</span></div>
                <div
                    style="font-size: 0.7rem; color: var(--accent); font-weight: 700; letter-spacing: 1px; text-transform: uppercase;">
                    DASHBOARD</div>
            </div>
        </div>

        <div class="sidebar-scroll">
            <div class="sidebar-pill" id="sidebarPill"></div>

            <div class="sidebar-section">
                <div class="sidebar-section-label">Menu Utama</div>
                <div class="nav-menu" id="navMenu">
                    <a href="<?= site_url('dashboard') ?>"
                        class="nav-item <?= (current_url() == site_url('dashboard') || current_url() == site_url('dashboard/index')) ? 'active' : '' ?>">
                        <i class="ti ti-layout-dashboard"></i> Ranking SAW
                    </a>
                    <a href="<?= site_url('mahasiswa') ?>"
                        class="nav-item <?= strpos(current_url(), 'mahasiswa') !== false ? 'active' : '' ?>">
                        <i class="ti ti-users"></i> Data Mahasiswa
                    </a>
                    <a href="<?= site_url('penilaian') ?>"
                        class="nav-item <?= strpos(current_url(), 'penilaian') !== false ? 'active' : '' ?>">
                        <i class="ti ti-clipboard-list"></i> Input Penilaian
                    </a>
                </div>
            </div>

            <?php if (session()->get('role') === 'admin'): ?>
                <div class="sidebar-section">
                    <div class="sidebar-section-label">Administrator</div>
                    <div class="nav-menu" id="navMenuAdmin">
                        <a href="<?= site_url('kriteria') ?>"
                            class="nav-item <?= strpos(current_url(), 'kriteria') !== false ? 'active' : '' ?>">
                            <i class="ti ti-adjustments-alt"></i> Bobot Kriteria
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar">
                    <i class="ti ti-user"></i>
                </div>
                <div>
                    <div class="user-card-text"><?= esc(session()->get('username')) ?></div>
                    <div
                        style="font-size: 0.75rem; color: var(--accent); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-top: 0.2rem;">
                        <?= esc(session()->get('role')) ?>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-wrapper">
        <header class="topbar glass-panel">
            <div class="page-breadcrumb">
                <span>SIPENAB</span>
                <i class="ti ti-chevron-right" style="font-size: 1rem; opacity: 0.5;"></i>
                <span class="current"><?= esc($title ?? 'Dashboard') ?></span>
            </div>

            <div class="topbar-right">
                <button class="theme-btn" id="themeToggle" aria-label="Toggle Theme">
                    <i class="ti ti-moon"></i>
                </button>
                <a href="<?= site_url('logout') ?>" class="btn-logout">
                    <i class="ti ti-logout"></i> Keluar
                </a>
            </div>
        </header>

        <div class="content-area">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" data-aos="fade-down">
                    <i class="ti ti-circle-check" style="font-size: 1.5rem;"></i>
                    <?= esc(session()->getFlashdata('success')) ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error" data-aos="fade-down">
                    <i class="ti ti-alert-triangle" style="font-size: 1.5rem;"></i>
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <!-- INJECT VIEW -->
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- GLOBAL CONFIRMATION MODAL -->
    <div id="globalConfirmModal"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background: rgba(0,0,0,0.6); backdrop-filter: blur(12px); display: none; align-items: center; justify-content: center; animation: modalFadeIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
        <div class="glass-panel"
            style="width: 90%; max-width: 400px; padding: 2.5rem; text-align: center; border-radius: 32px; border: 1px solid var(--border);">
            <div id="globalModalIconContainer"
                style="background: rgba(37, 99, 235, 0.1); color: var(--accent); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2.5rem;">
                <i id="globalModalIcon" class="ti ti-help"></i>
            </div>
            <h2 id="globalModalTitle"
                style="margin-bottom: 0.8rem; font-size: 1.8rem; font-weight: 800; letter-spacing: -0.5px;">Konfirmasi
            </h2>
            <p id="globalModalMsg"
                style="color: var(--muted); margin-bottom: 2.5rem; line-height: 1.6; font-size: 1rem;">Apakah Anda yakin
                ingin melanjutkan tindakan ini?</p>

            <div style="display: flex; gap: 1rem; justify-content: center;">
                <button onclick="hideConfirmModal()" class="btn btn-glass" style="flex: 1;">Batal</button>
                <a id="globalModalBtn" href="#" class="btn btn-primary" style="flex: 1;">Lanjutkan</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, easing: 'ease-out-cubic' });

        // Sidebar Smooth Pill Animation
        const navItems = document.querySelectorAll('.nav-item');
        const sidebarPill = document.getElementById('sidebarPill');
        const sidebarScroll = document.querySelector('.sidebar-scroll');

        function movePill(target) {
            if(!sidebarPill || !target || !sidebarScroll) return;
            
            // Remove has-pill class from all nav-items
            document.querySelectorAll('.nav-item.has-pill').forEach(el => el.classList.remove('has-pill'));
            // Add has-pill to target to change its text color to white
            target.classList.add('has-pill');

            sidebarPill.style.opacity = '1';
            // Calculate absolute position within the scroll container
            let element = target;
            let finalTop = 0;
            while (element && element !== sidebarScroll) {
                finalTop += element.offsetTop;
                element = element.offsetParent;
            }

            sidebarPill.style.transform = `translateY(${finalTop}px)`;
        }

        // Initialize pill position
        const activeItem = document.querySelector('.nav-item.active');
        if (activeItem) {
            setTimeout(() => {
                sidebarPill.style.transition = 'none';
                movePill(activeItem);
                setTimeout(() => sidebarPill.style.transition = '', 50);
            }, 50);
        }

        navItems.forEach(item => {
            item.addEventListener('mouseenter', () => movePill(item));
            item.addEventListener('mouseleave', () => {
                if(activeItem) {
                    movePill(activeItem);
                } else {
                    sidebarPill.style.opacity = '0';
                    const hoverItem = document.querySelector('.nav-item.has-pill');
                    if (hoverItem) hoverItem.classList.remove('has-pill');
                }
            });
        });

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
            themeIcon.className = theme === 'light' ? 'ti ti-sun' : 'ti ti-moon';
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
</body>

</html>