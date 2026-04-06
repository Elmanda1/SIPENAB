<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? esc($title) . ' | SIPENAB' : 'SIPENAB Admin' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-w: 260px;
            --topbar-h: 64px;
        }

        [data-theme="dark"] {
            --bg:       #0f1117;
            --surface:  #1a1d27;
            --surface2: #22263a;
            --border:   rgba(255,255,255,0.08);
            --text:     #e2e8f0;
            --muted:    #64748b;
            --accent:   #6366f1;
            --accent2:  #818cf8;
            --success:  #10b981;
            --danger:   #ef4444;
            --warning:  #f59e0b;
            --glass:    rgba(255,255,255,0.04);
            --glass-border: rgba(255,255,255,0.08);
        }

        [data-theme="light"] {
            --bg:       #f1f5f9;
            --surface:  #ffffff;
            --surface2: #f8fafc;
            --border:   rgba(0,0,0,0.08);
            --text:     #1e293b;
            --muted:    #94a3b8;
            --accent:   #6366f1;
            --accent2:  #4f46e5;
            --success:  #059669;
            --danger:   #dc2626;
            --warning:  #d97706;
            --glass:    rgba(255,255,255,0.8);
            --glass-border: rgba(0,0,0,0.08);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            transition: background 0.3s, color 0.3s;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 100;
            transition: transform 0.3s;
            overflow-y: auto;
        }

        .sidebar-logo {
            padding: 1.5rem 1.5rem 1rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-logo .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--accent), #a855f7);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .sidebar-logo .logo-text {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.3rem;
            letter-spacing: -0.5px;
        }

        .sidebar-logo .logo-sub {
            font-size: 0.7rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-section {
            padding: 1.25rem 1rem 0.5rem;
        }

        .sidebar-section-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--muted);
            padding: 0 0.5rem;
            margin-bottom: 0.5rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.75rem;
            border-radius: 10px;
            text-decoration: none;
            color: var(--muted);
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s;
            margin-bottom: 2px;
        }

        .nav-item i { font-size: 1.2rem; flex-shrink: 0; }

        .nav-item:hover {
            background: var(--glass);
            color: var(--text);
        }

        .nav-item.active {
            background: rgba(99, 102, 241, 0.15);
            color: var(--accent2);
            font-weight: 600;
        }

        .nav-item.active i { color: var(--accent); }

        .sidebar-footer {
            margin-top: auto;
            padding: 1rem;
            border-top: 1px solid var(--border);
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            border-radius: 10px;
            background: var(--glass);
            margin-bottom: 0.75rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--accent), #a855f7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .user-info .user-name { font-weight: 600; font-size: 0.9rem; }
        .user-info .user-role {
            font-size: 0.75rem;
            color: var(--muted);
            text-transform: capitalize;
        }

        /* role badge */
        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 2px 8px;
            border-radius: 4px;
            background: rgba(99, 102, 241, 0.15);
            color: var(--accent2);
        }

        /* ===== TOPBAR ===== */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: var(--topbar-h);
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            z-index: 99;
            gap: 1rem;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-breadcrumb {
            font-size: 0.85rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .page-breadcrumb .current {
            color: var(--text);
            font-weight: 600;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .theme-btn {
            background: var(--surface2);
            border: 1px solid var(--border);
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--muted);
            font-size: 1.1rem;
            transition: all 0.2s;
        }

        .theme-btn:hover { color: var(--text); background: var(--glass); }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            font-family: inherit;
            cursor: pointer;
        }

        .btn-logout:hover { background: rgba(239, 68, 68, 0.2); }

        /* ===== MAIN CONTENT ===== */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            padding-top: var(--topbar-h);
            flex: 1;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .content-area {
            padding: 2rem;
            max-width: 1400px;
        }

        /* ===== ALERTS (session flash) ===== */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            font-size: 0.95rem;
        }
        .alert-success { background: rgba(16, 185, 129, 0.15); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.2); }
        .alert-error   { background: rgba(239, 68, 68, 0.15);    color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
        }

        .page-header p { color: var(--muted); margin-top: 0.25rem; }

        /* ===== CARDS ===== */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.75rem;
            margin-bottom: 1.5rem;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
            font-weight: 700;
            font-size: 1rem;
        }

        /* ===== STATS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            font-family: 'Outfit', sans-serif;
        }

        .stat-label { font-size: 0.85rem; color: var(--muted); font-weight: 500; }

        /* ===== TABLE ===== */
        table { width: 100%; border-collapse: collapse; }

        th {
            text-align: left;
            padding: 0.85rem 1rem;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--muted);
            font-weight: 700;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 1.1rem 1rem;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
            color: var(--text);
        }

        tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.2s; }
        tbody tr:hover { background: var(--glass); }

        /* ===== BUTTONS ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-primary { background: var(--accent); color: white; }
        .btn-primary:hover { background: var(--accent2); transform: translateY(-1px); }

        .btn-ghost {
            background: var(--surface2);
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover { background: var(--glass); }

        .btn-danger { background: rgba(239,68,68,0.1); color: var(--danger); border: 1px solid rgba(239,68,68,0.2); }
        .btn-danger:hover { background: rgba(239,68,68,0.2); }

        .btn-sm { padding: 0.4rem 0.75rem; font-size: 0.82rem; }

        /* ===== FORMS ===== */
        .form-group { margin-bottom: 1.5rem; }

        label {
            display: block;
            font-size: 0.83rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text);
            font-family: inherit;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        select.form-control { cursor: pointer; }

        /* ===== BADGES ===== */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .badge-green { background: rgba(16,185,129,0.15); color: #10b981; }
        .badge-red   { background: rgba(239,68,68,0.15);  color: #ef4444; }
        .badge-yellow { background: rgba(245,158,11,0.15); color: #f59e0b; }
        .badge-blue   { background: rgba(99,102,241,0.15); color: var(--accent2); }

        /* ===== MOBILE SIDEBAR TOGGLE ===== */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text);
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-wrapper { margin-left: 0; }
            .topbar { left: 0; }
            .sidebar-toggle { display: flex; align-items: center; }
            .content-area { padding: 1.25rem; }
        }
    </style>
</head>
<body>
    <!-- SIDEBAR -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon"><i class="ti ti-school"></i></div>
            <div>
                <div class="logo-text">SIPENAB</div>
                <div class="logo-sub">Admin Panel</div>
            </div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-label">Overview</div>
            <a href="<?= site_url('dashboard') ?>" class="nav-item <?= (uri_string() === 'dashboard') ? 'active' : '' ?>">
                <i class="ti ti-layout-dashboard"></i> Dashboard
            </a>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-label">Data</div>
            <a href="<?= site_url('mahasiswa') ?>" class="nav-item <?= (str_starts_with(uri_string(), 'mahasiswa')) ? 'active' : '' ?>">
                <i class="ti ti-users"></i> Data Mahasiswa
            </a>
            <a href="<?= site_url('penilaian') ?>" class="nav-item <?= (str_starts_with(uri_string(), 'penilaian')) ? 'active' : '' ?>">
                <i class="ti ti-clipboard-data"></i> Penilaian
            </a>
        </div>

        <?php if(session()->get('role') === 'admin'): ?>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Konfigurasi</div>
            <a href="<?= site_url('kriteria') ?>" class="nav-item <?= (str_starts_with(uri_string(), 'kriteria')) ? 'active' : '' ?>">
                <i class="ti ti-list-check"></i> Kriteria SAW
            </a>
            <a href="<?= site_url('ranking/calculate') ?>" class="nav-item">
                <i class="ti ti-calculator"></i> Hitung SAW
            </a>
        </div>
        <?php endif; ?>

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar"><?= strtoupper(substr(session()->get('username') ?? 'U', 0, 1)) ?></div>
                <div class="user-info">
                    <div class="user-name"><?= esc(session()->get('username') ?? 'User') ?></div>
                    <span class="role-badge"><i class="ti ti-shield"></i><?= esc(session()->get('role') ?? 'guest') ?></span>
                </div>
            </div>
            <a href="<?= site_url('logout') ?>" class="btn-logout" style="width: 100%; justify-content: center;">
                <i class="ti ti-logout"></i> Keluar
            </a>
        </div>
    </nav>

    <!-- TOPBAR -->
    <header class="topbar">
        <div class="topbar-left">
            <button class="sidebar-toggle" onclick="document.getElementById('sidebar').classList.toggle('open')">
                <i class="ti ti-menu-2"></i>
            </button>
            <div class="page-breadcrumb">
                <i class="ti ti-home" style="font-size:1rem;"></i>
                <span>/</span>
                <span class="current"><?= isset($title) ? esc($title) : 'Dashboard' ?></span>
            </div>
        </div>
        <div class="topbar-right">
            <button class="theme-btn" id="themeToggle" title="Toggle theme">
                <i class="ti ti-sun"></i>
            </button>
            <a href="<?= site_url('logout') ?>" class="btn-logout" style="display:none;">
                <i class="ti ti-logout"></i> Keluar
            </a>
        </div>
    </header>

    <!-- CONTENT -->
    <div class="main-wrapper">
        <div class="content-area">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><i class="ti ti-circle-check"></i> <?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-error"><i class="ti ti-alert-circle"></i> <?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script>
        // Theme toggle
        const toggle = document.getElementById('themeToggle');
        const html = document.documentElement;
        const saved = localStorage.getItem('adminTheme') || 'dark';
        html.setAttribute('data-theme', saved);
        toggle.querySelector('i').className = saved === 'dark' ? 'ti ti-sun' : 'ti ti-moon';

        toggle.addEventListener('click', () => {
            const t = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', t);
            localStorage.setItem('adminTheme', t);
            toggle.querySelector('i').className = t === 'dark' ? 'ti ti-sun' : 'ti ti-moon';
        });

        // Close sidebar on outside click (mobile)
        document.addEventListener('click', (e) => {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth <= 768 && !sidebar.contains(e.target) && !e.target.closest('.sidebar-toggle')) {
                sidebar.classList.remove('open');
            }
        });
    </script>
</body>
</html>
