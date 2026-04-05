<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENAB // <?= $title ?? 'SISTEM' ?></title>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;800&family=Staatliches&display=swap');

        :root {
            --bg: #f0f0f0;
            --surface: #ffffff;
            --ink: #000000;
            --accent: #ff3e00;
            --border: #000000;
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
            display: flex;
            flex-direction: row;
            min-height: 100vh;
            overflow-x: hidden;
        }

        aside {
            width: 80px;
            background: var(--ink);
            color: var(--surface);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 0;
            border-right: 4px solid var(--ink);
            flex-shrink: 0;
            z-index: 100;
        }

        .vertical-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 0.8rem;
            letter-spacing: 2px;
        }

        main {
            flex: 1;
            padding: 4rem 2rem;
            position: relative;
            min-width: 0;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        nav {
            position: absolute;
            top: 2rem;
            right: 2rem;
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        nav a {
            color: var(--ink);
            text-decoration: none;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.8rem;
            border-bottom: 3px solid transparent;
            transition: border-color 0.2s;
            white-space: nowrap;
        }

        nav a:hover { border-color: var(--accent); }

        h1 {
            font-family: var(--display);
            font-size: clamp(3rem, 10vw, 6rem);
            line-height: 0.9;
            margin: 0 0 2rem 0;
            text-transform: uppercase;
            letter-spacing: -2px;
        }

        .btn {
            background: var(--ink);
            color: var(--surface);
            border: none;
            padding: 1rem 1.5rem;
            font-family: var(--mono);
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 6px 6px 0px var(--accent);
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            body { flex-direction: column; }
            aside {
                width: 100%;
                height: 60px;
                flex-direction: row;
                padding: 0 2rem;
                border-right: none;
                border-bottom: 4px solid var(--ink);
            }
            .vertical-text {
                writing-mode: horizontal-tb;
                font-size: 0.6rem;
            }
            main { padding: 6rem 1.5rem 4rem 1.5rem; }
            nav {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                top: auto;
                background: var(--surface);
                padding: 1rem;
                justify-content: center;
                border-top: 4px solid var(--ink);
                z-index: 1000;
                gap: 1rem;
            }
            h1 { font-size: 4rem; }
        }

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 2rem;
            border: 4px solid var(--ink);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        .brutalist-grid {
            border: 4px solid var(--ink);
            background: var(--surface);
            padding: 1.5rem;
            box-shadow: 10px 10px 0px var(--ink);
            margin-bottom: 2rem;
        }

        .stamp {
            position: absolute;
            border: 4px solid var(--accent);
            color: var(--accent);
            padding: 0.5rem 1rem;
            font-family: var(--display);
            font-size: 2rem;
            text-transform: uppercase;
            transform: rotate(-15deg);
            opacity: 0.8;
            pointer-events: none;
            border-radius: 4px;
        }

        .reveal { opacity: 0; transform: translateY(20px); }
    </style>
</head>
<body>
    <aside>
        <div class="vertical-text">INTI_SISTEM_PNJ</div>
        <div class="vertical-text" style="color: var(--accent);">SIPENAB_v1.0</div>
    </aside>

    <main>
        <nav>
            <a href="<?= site_url('dashboard') ?>">Hasil</a>
            <a href="<?= site_url('mahasiswa') ?>">Mahasiswa</a>
            <a href="<?= site_url('kriteria') ?>">Kriteria</a>
            <a href="<?= site_url('penilaian') ?>">Penilaian</a>
            <a href="<?= site_url('logout') ?>">Keluar</a>
        </nav>

        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            gsap.to('.reveal', {
                opacity: 1,
                y: 0,
                duration: 0.8,
                stagger: 0.1,
                ease: 'power4.out'
            });
        });
    </script>
</body>
</html>
