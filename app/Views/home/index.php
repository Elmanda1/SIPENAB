<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENAB // ALLOCATION_SYSTEM</title>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;800&family=Staatliches&display=swap');

        :root {
            --bg: #f0f0f0;
            --surface: #ffffff;
            --ink: #000000;
            --accent: #ff3e00;
            --mono: 'JetBrains Mono', monospace;
            --display: 'Staatliches', cursive;
        }

        * { box-sizing: border-box; }
        
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            opacity: .05;
            pointer-events: none;
            z-index: 9999;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        body {
            background: var(--bg);
            color: var(--ink);
            font-family: var(--mono);
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        header {
            padding: 2rem 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px solid var(--ink);
        }

        .logo {
            font-family: var(--display);
            font-size: 2.5rem;
            line-height: 1;
            letter-spacing: -1px;
        }

        .nav-links a {
            color: var(--ink);
            text-decoration: none;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border: 2px solid transparent;
            transition: all 0.2s;
        }

        .nav-links a:hover {
            border-color: var(--ink);
            background: var(--ink);
            color: var(--surface);
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem;
            position: relative;
        }

        .hero-title {
            font-family: var(--display);
            font-size: clamp(6rem, 15vw, 16rem);
            line-height: 0.8;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: -4px;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 800;
            text-transform: uppercase;
            max-width: 600px;
            margin-top: 2rem;
            border-left: 8px solid var(--accent);
            padding-left: 1rem;
        }

        .cta-container {
            margin-top: 4rem;
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .btn {
            background: var(--ink);
            color: var(--surface);
            border: none;
            padding: 1.5rem 3rem;
            font-family: var(--display);
            font-size: 2rem;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 12px 12px 0px var(--accent);
            text-decoration: none;
            display: inline-block;
            transition: transform 0.1s, box-shadow 0.1s;
        }

        .btn:hover {
            transform: translate(4px, 4px);
            box-shadow: 8px 8px 0px var(--accent);
        }

        .btn:active {
            transform: translate(12px, 12px);
            box-shadow: 0px 0px 0px var(--accent);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 6rem;
            border-top: 4px solid var(--ink);
            padding-top: 2rem;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-value {
            font-family: var(--display);
            font-size: 4rem;
            color: var(--accent);
            line-height: 1;
        }

        .stat-label {
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        .stamp {
            position: absolute;
            top: 20%;
            right: 10%;
            border: 6px solid var(--ink);
            color: var(--ink);
            padding: 1rem 2rem;
            font-family: var(--display);
            font-size: 3rem;
            text-transform: uppercase;
            transform: rotate(15deg);
            opacity: 0.1;
            pointer-events: none;
        }

        .reveal { opacity: 0; transform: translateY(40px); }
    </style>
</head>
<body>
    <header class="reveal">
        <div class="logo">SIPENAB<br><span style="font-size: 1rem; color: var(--accent); font-family: var(--mono);">SYSTEM_CORE</span></div>
        <div class="nav-links">
            <a href="<?= site_url('login') ?>">Access_Portal</a>
            <a href="https://github.com/Elmanda1/SIPENAB" target="_blank">Documentation</a>
        </div>
    </header>

    <main>
        <div class="stamp">ALGORITHM_READY</div>
        
        <h1 class="hero-title reveal">Scholarship<br>Allocation<br><span style="color: var(--accent);">Engine</span></h1>
        
        <div class="hero-subtitle reveal">
            Systematic decision support utilizing Simple Additive Weighting (SAW) for deterministic candidate evaluation.
        </div>

        <div class="cta-container reveal">
            <a href="<?= site_url('login') ?>" class="btn">Initialize_Session</a>
            <div style="font-size: 0.8rem; font-weight: 800; color: #666;">> SECURE_CONNECTION_REQUIRED<br>> ROLE_BASED_ACCESS_ENFORCED</div>
        </div>

        <div class="stats-grid reveal">
            <div class="stat-item">
                <div class="stat-value">SAW</div>
                <div class="stat-label">Primary_Algorithm</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">1.0</div>
                <div class="stat-label">System_Version</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">RBAC</div>
                <div class="stat-label">Security_Protocol</div>
            </div>
        </div>
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            gsap.to('.reveal', {
                opacity: 1,
                y: 0,
                duration: 1.2,
                stagger: 0.15,
                ease: 'power4.out'
            });
        });
    </script>
</body>
</html>
