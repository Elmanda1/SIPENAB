<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENAB // <?= $title ?? 'SYSTEM' ?></title>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;800&family=Staatliches&display=swap');

        :root {
            --bg: #f0f0f0;
            --surface: #ffffff;
            --ink: #000000;
            --accent: #ff3e00; /* Brutalist orange-red */
            --border: #000000;
            --mono: 'JetBrains Mono', monospace;
            --display: 'Staatliches', cursive;
        }

        * { box-sizing: border-box; }
        
        /* Grainy Paper Texture Overlay */
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
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar / ID Strip */
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
            padding: 4rem;
            position: relative;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        nav {
            position: absolute;
            top: 2rem;
            right: 4rem;
            display: flex;
            gap: 2rem;
        }

        nav a {
            color: var(--ink);
            text-decoration: none;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.9rem;
            border-bottom: 3px solid transparent;
            transition: border-color 0.2s;
        }

        nav a:hover {
            border-color: var(--accent);
        }

        h1 {
            font-family: var(--display);
            font-size: 6rem;
            line-height: 0.9;
            margin: 0 0 2rem 0;
            text-transform: uppercase;
            letter-spacing: -2px;
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

        /* Brutalist Buttons */
        .btn {
            background: var(--ink);
            color: var(--surface);
            border: none;
            padding: 1rem 2rem;
            font-family: var(--mono);
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 8px 8px 0px var(--accent);
            transition: transform 0.1s, box-shadow 0.1s;
        }

        .btn:active {
            transform: translate(4px, 4px);
            box-shadow: 4px 4px 0px var(--accent);
        }

        /* Grid Patterns */
        .brutalist-grid {
            border: 4px solid var(--ink);
            background: var(--surface);
            padding: 2rem;
            box-shadow: 12px 12px 0px var(--ink);
        }

        /* Animations */
        .reveal { opacity: 0; transform: translateY(30px); }
    </style>
</head>
<body>
    <aside>
        <div class="vertical-text">PNJ_SYSTEM_CORE</div>
        <div class="vertical-text" style="color: var(--accent);">SIPENAB_v1.0</div>
    </aside>

    <main>
        <nav>
            <a href="<?= site_url('dashboard') ?>">Results</a>
            <a href="<?= site_url('mahasiswa') ?>">Students</a>
            <a href="<?= site_url('kriteria') ?>">Criteria</a>
            <a href="<?= site_url('penilaian') ?>">Evaluation</a>
            <a href="<?= site_url('logout') ?>">Exit</a>
        </nav>

        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <script>
        // Entrance Animation Sequence
        window.addEventListener('DOMContentLoaded', () => {
            gsap.to('.reveal', {
                opacity: 1,
                y: 0,
                duration: 0.8,
                stagger: 0.2,
                ease: 'power4.out'
            });
        });
    </script>
</body>
</html>
