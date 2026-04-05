<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPENAB // AUTHORIZATION_REQUIRED</title>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;800&family=Staatliches&display=swap');

        :root {
            --bg: #000000;
            --surface: #111111;
            --ink: #ffffff;
            --accent: #ff3e00;
            --mono: 'JetBrains Mono', monospace;
            --display: 'Staatliches', cursive;
        }

        * { box-sizing: border-box; }
        
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            opacity: .15;
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
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-box {
            width: 100%;
            max-width: 450px;
            padding: 3rem;
            border: 4px solid var(--ink);
            background: var(--surface);
            position: relative;
            box-shadow: 20px 20px 0px var(--accent);
        }

        h1 {
            font-family: var(--display);
            font-size: 4rem;
            margin: 0 0 2rem 0;
            line-height: 0.8;
            text-transform: uppercase;
        }

        .input-group {
            margin-bottom: 2rem;
        }

        label {
            display: block;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
            color: var(--accent);
        }

        input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 2px solid var(--ink);
            color: var(--ink);
            padding: 0.5rem 0;
            font-family: var(--mono);
            font-size: 1.2rem;
            outline: none;
        }

        input:focus {
            border-bottom-color: var(--accent);
        }

        .btn {
            width: 100%;
            background: var(--ink);
            color: var(--bg);
            border: none;
            padding: 1.2rem;
            font-family: var(--display);
            font-size: 1.5rem;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn:hover {
            background: var(--accent);
        }

        .footer-tag {
            position: absolute;
            bottom: -50px;
            left: 0;
            font-size: 0.7rem;
            color: #444;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .reveal { opacity: 0; transform: translateY(20px); }
    </style>
</head>
<body>
    <div class="login-box reveal">
        <h1 class="reveal">Auth<br>Access</h1>
        
        <form action="<?= site_url('login') ?>" method="POST">
            <div class="input-group reveal">
                <label>Identifier</label>
                <input type="text" name="username" placeholder="USERNAME" required autofocus>
            </div>
            
            <div class="input-group reveal">
                <label>Security_Key</label>
                <input type="password" name="password" placeholder="PASSWORD" required>
            </div>

            <button type="submit" class="btn reveal">Initialize_Session</button>
        </form>

        <div class="footer-tag">SIPENAB_v1.0 // AUTHORIZATION_GATEWAY</div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            gsap.to('.reveal', {
                opacity: 1,
                y: 0,
                duration: 1,
                stagger: 0.1,
                ease: 'power4.out'
            });
        });
    </script>
</body>
</html>
