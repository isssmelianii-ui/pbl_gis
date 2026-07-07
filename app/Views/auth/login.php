<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin — GeoSchool GIS</title>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>

        :root{
            --navy-950:#0a1d33;
            --navy-900:#0e2a47;
            --navy-800:#153a5f;
            --gold-500:#c08a28;
            --gold-400:#d6a445;
            --ink-900:#1c2733;
            --ink-600:#54626f;
            --ink-400:#8b97a3;
            --line:#e3e8ee;
            --bg:#eef2f8;
            --surface:#ffffff;
            --danger-bg:#fdecec;
            --danger-fg:#b3261e;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Plus Jakarta Sans',sans-serif;
        }

        .mono{
            font-family:'JetBrains Mono',monospace;
        }

        body{
            min-height:100vh;
            background:var(--bg);
            overflow:hidden;
            position:relative;
        }

        /* ---------- BACKGROUND SCENE ---------- */

        .scene{
            position:absolute;
            inset:0;
            z-index:0;
            overflow:hidden;
        }

        .scene::before{
            content:'';
            position:absolute;
            inset:0;
            background:
                radial-gradient(circle at 8% 12%, rgba(214,164,69,0.14), transparent 38%),
                radial-gradient(circle at 92% 85%, rgba(14,42,71,0.08), transparent 42%),
                linear-gradient(160deg,#eef2f8 0%,#e7ecf4 100%);
        }

        .scene::after{
            content:'';
            position:absolute;
            inset:0;
            background-image:
                linear-gradient(rgba(14,42,71,0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(14,42,71,0.035) 1px, transparent 1px);
            background-size:52px 52px;
            mask-image:radial-gradient(ellipse 75% 75% at 50% 50%, black 30%, transparent 78%);
        }

        .scene svg.contours{
            position:absolute;
            width:100%;
            height:100%;
            top:0;
            left:0;
        }

        .coord-tag{
            position:absolute;
            display:flex;
            align-items:center;
            gap:9px;
            font-family:'JetBrains Mono',monospace;
            font-size:11px;
            color:var(--ink-600);
            background:rgba(255,255,255,0.65);
            border:1px solid rgba(14,42,71,0.10);
            padding:6px 12px;
            border-radius:8px;
            backdrop-filter:blur(4px);
        }

        .coord-tag .dot{
            width:7px;
            height:7px;
            border-radius:50%;
            background:var(--gold-500);
            box-shadow:0 0 0 4px rgba(192,138,40,0.16);
            flex-shrink:0;
        }

        .tag-1{ top:14%; left:9%; }
        .tag-2{ bottom:16%; left:12%; }
        .tag-3{ top:20%; right:10%; }
        .tag-4{ bottom:22%; right:8%; }

        .pin-float{
            position:absolute;
            color:var(--navy-800);
            opacity:0.16;
            font-size:34px;
        }

        .pin-1{ top:32%; left:20%; transform:rotate(-8deg); }
        .pin-2{ bottom:30%; right:19%; transform:rotate(10deg); font-size:26px; }

        @media(max-width:900px){
            .coord-tag, .pin-float{
                display:none;
            }
        }

        /* ---------- NAVBAR ---------- */

        .navbar{
            width:100%;
            height:74px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 34px;
            border-bottom:1px solid var(--line);
            background:rgba(255,255,255,0.85);
            backdrop-filter:blur(10px);
            position:relative;
            z-index:10;
        }

        .logo{
            font-size:17px;
            font-weight:800;
            color:var(--navy-900);
            display:flex;
            align-items:center;
            gap:10px;
            letter-spacing:-0.2px;
        }

        .logo .logo-mark{
            width:34px;
            height:34px;
            border-radius:9px;
            background:var(--navy-900);
            color:var(--gold-400);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:14px;
        }

        .navbar a.back-link{
            color:var(--ink-600);
            text-decoration:none;
            font-size:13px;
            font-weight:600;
            display:flex;
            align-items:center;
            gap:8px;
        }

        .navbar a.back-link:hover{
            color:var(--navy-900);
        }

        /* ---------- LOGIN ---------- */

        .login-wrapper{
            width:100%;
            height:calc(100vh - 74px);
            display:flex;
            justify-content:center;
            align-items:center;
            position:relative;
            z-index:2;
        }

        .login-box{
            width:420px;
            background:var(--surface);
            border-radius:22px;
            padding:44px 42px;
            box-shadow:0 25px 60px rgba(14,42,71,0.12);
            border:1px solid rgba(14,42,71,0.06);
            position:relative;
        }

        .icon-box{
            width:64px;
            height:64px;
            background:var(--navy-900);
            border-radius:16px;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:auto;
            margin-bottom:24px;
        }

        .icon-box i{
            font-size:24px;
            color:var(--gold-400);
        }

        .login-box .kicker{
            text-align:center;
            font-family:'JetBrains Mono',monospace;
            font-size:11px;
            letter-spacing:1.2px;
            text-transform:uppercase;
            color:var(--gold-500);
            margin-bottom:10px;
        }

        .login-box h2{
            text-align:center;
            font-size:28px;
            font-weight:800;
            margin-bottom:8px;
            color:var(--ink-900);
            letter-spacing:-0.3px;
        }

        .login-box p.sub{
            text-align:center;
            color:var(--ink-600);
            margin-bottom:32px;
            font-size:13.5px;
        }

        .input-group{
            margin-bottom:20px;
        }

        .input-group label{
            display:block;
            margin-bottom:9px;
            font-size:13px;
            font-weight:700;
            color:var(--ink-900);
        }

        .input-box{
            display:flex;
            align-items:center;
            gap:10px;
            border:1.5px solid var(--line);
            border-radius:12px;
            background:#f8fafc;
            padding:0 14px;
            transition:border-color 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
        }

        .input-box:focus-within{
            border-color:var(--navy-800);
            background:white;
            box-shadow:0 0 0 3.5px rgba(14,42,71,0.09);
        }

        .input-box i{
            color:var(--ink-400);
            font-size:14px;
            flex-shrink:0;
        }

        .input-box input{
            flex:1;
            min-width:0;
            width:100%;
            padding:13.5px 0;
            border:none;
            outline:none;
            background:transparent;
            font-size:14px;
            font-family:inherit;
            color:var(--ink-900);
        }

        .input-box input::placeholder{
            color:var(--ink-400);
        }

        .toggle-pass{
            color:var(--ink-400);
            cursor:pointer;
            font-size:14px;
            background:none;
            border:none;
            padding:4px;
            flex-shrink:0;
            display:flex;
            align-items:center;
        }

        .toggle-pass:hover{
            color:var(--ink-600);
        }

        .options{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:24px;
            font-size:13px;
        }

        .options a{
            text-decoration:none;
            color:var(--navy-900);
            font-weight:700;
        }

        .options a:hover{
            text-decoration:underline;
        }

        .remember{
            display:flex;
            align-items:center;
            gap:8px;
            color:var(--ink-600);
        }

        .remember input{
            width:15px;
            height:15px;
            accent-color:var(--navy-900);
        }

        .login-btn{
            width:100%;
            padding:14.5px;
            border:none;
            border-radius:12px;
            background:var(--navy-900);
            color:white;
            font-size:14.5px;
            font-weight:700;
            font-family:inherit;
            cursor:pointer;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            transition:background 0.15s ease, transform 0.1s ease;
        }

        .login-btn:hover{
            background:var(--navy-800);
        }

        .login-btn:active{
            transform:translateY(1px);
        }

        .login-btn:focus-visible,
        .input-box input:focus-visible,
        a:focus-visible,
        button:focus-visible{
            outline:2.5px solid var(--gold-500);
            outline-offset:2px;
        }

        .error{
            display:flex;
            align-items:flex-start;
            gap:10px;
            background:var(--danger-bg);
            color:var(--danger-fg);
            padding:13px 14px;
            border-radius:12px;
            margin-bottom:20px;
            font-size:13.5px;
            border:1px solid rgba(179,38,30,0.15);
            text-align:left;
        }

        /* ---------- FOOTER ---------- */

        .footer{
            position:absolute;
            bottom:20px;
            left:34px;
            right:34px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            font-size:12px;
            color:var(--ink-400);
            z-index:2;
        }

        .footer-links{
            display:flex;
            gap:22px;
        }

        .footer-links a{
            color:var(--ink-400);
            text-decoration:none;
        }

        .footer-links a:hover{
            color:var(--ink-600);
        }

        @media(prefers-reduced-motion:no-preference){
            .login-box{
                animation:rise 0.5s ease both;
            }
        }

        @keyframes rise{
            from{opacity:0; transform:translateY(10px);}
            to{opacity:1; transform:translateY(0);}
        }

        @media(max-width:600px){

            .login-box{
                width:90%;
                padding:36px 26px;
            }

            .footer{
                flex-direction:column;
                gap:10px;
                text-align:center;
                left:20px;
                right:20px;
            }

        }

    </style>

</head>

<body>

<!-- BACKGROUND SCENE -->

<div class="scene">

    <svg class="contours" viewBox="0 0 1440 800" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">

        <path d="M-40 140C160 240 340 30 560 130C780 230 940 20 1180 150C1320 220 1420 190 1480 150"
        stroke="#0e2a47" stroke-opacity="0.10" stroke-width="1.5"/>

        <path d="M-40 200C170 300 350 90 570 190C790 290 950 80 1190 210C1330 280 1430 250 1490 210"
        stroke="#0e2a47" stroke-opacity="0.08" stroke-width="1.5"/>

        <path d="M-60 580C140 480 300 660 520 570C740 480 900 640 1140 550C1280 500 1380 520 1500 560"
        stroke="#0e2a47" stroke-opacity="0.10" stroke-width="1.5"/>

        <path d="M-60 650C150 550 320 720 540 630C760 540 930 700 1160 610C1300 560 1390 580 1500 620"
        stroke="#c08a28" stroke-opacity="0.14" stroke-width="1.5"/>

        <path d="M-60 720C160 630 340 780 560 700C780 620 940 760 1180 680C1310 640 1400 660 1500 690"
        stroke="#0e2a47" stroke-opacity="0.07" stroke-width="1.5"/>

    </svg>

    <div class="coord-tag tag-1"><span class="dot"></span>UPTD TK NEGERI PEMBINA KEC. LINTAU BUO</div>
    <div class="coord-tag tag-2"><span class="dot"></span>UPT SDN 02 PADANG GANTING</div>
    <div class="coord-tag tag-3"><span class="dot"></span>UPT SMPN 1 TANJUNG EMAS</div>
    <div class="coord-tag tag-4"><span class="dot"></span>3 Kecamatan Terpetakan</div>

    <i class="fa-solid fa-map-location-dot pin-float pin-1"></i>
    <i class="fa-solid fa-location-dot pin-float pin-2"></i>

</div>

<!-- NAVBAR -->

<div class="navbar">

    <div class="logo">
        <span class="logo-mark"><i class="fa-solid fa-map-location-dot"></i></span>
        GeoSchool GIS
    </div>

    <a href="<?= base_url('/') ?>" class="back-link">
        <i class="fa-solid fa-arrow-left"></i>
        Beranda
    </a>

</div>

<!-- LOGIN -->

<div class="login-wrapper">

    <div class="login-box">

        <div class="icon-box">

            <i class="fa-solid fa-user-shield"></i>

        </div>

        <div class="kicker">Akses Internal</div>

        <h2>
            Login Admin
        </h2>

        <p class="sub">
            Akses dashboard GeoSchool GIS
        </p>

        <?php if(session()->getFlashdata('error')) : ?>

            <div class="error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= session()->getFlashdata('error'); ?></span>
            </div>

        <?php endif; ?>

        <form action="<?= base_url('/process-login') ?>" method="post">

            <div class="input-group">

                <label>Email</label>

                <div class="input-box">

                    <i class="fa-regular fa-envelope"></i>

                    <input type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required>

                </div>

            </div>

            <div class="input-group">

                <label>Password</label>

                <div class="input-box">

                    <i class="fa-solid fa-lock"></i>

                    <input type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>
 
                    <button type="button" class="toggle-pass" id="togglePass" aria-label="Tampilkan password">
                        <i class="fa-regular fa-eye"></i>
                    </button>

                </div>

            </div>

            <!-- <div class="options">

                <div class="remember">

                    <input type="checkbox">

                    Ingat Saya

                </div>

                <a href="#">
                    Lupa Password?
                </a>

            </div> -->

            <button type="submit" class="login-btn">

                Login

            </button>

        </form>

    </div>

</div>

<!-- FOOTER -->

<div class="footer">

    <div>
        © 2026 GeoSchool GIS. Seluruh Hak Cipta Dilindungi.
    </div>

    <div class="footer-links">

        <a href="#">
            Kebijakan Privasi
        </a>

        <a href="#">
            Syarat & Ketentuan
        </a>

    </div>

</div>

<script>
    const toggleBtn = document.getElementById('togglePass');
    const passInput = document.getElementById('password');
    if(toggleBtn && passInput){
        toggleBtn.addEventListener('click', () => {
            const isHidden = passInput.type === 'password';
            passInput.type = isHidden ? 'text' : 'password';
            toggleBtn.innerHTML = isHidden
                ? '<i class="fa-regular fa-eye-slash"></i>'
                : '<i class="fa-regular fa-eye"></i>';
        });
    }
</script>

</body>
</html>