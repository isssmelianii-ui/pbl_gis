<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            min-height:100vh;
            background:#f5f7fb;
            overflow:hidden;
            position:relative;
        }

        /* BACKGROUND LINE */

        body::before{
            content:'';
            position:absolute;
            width:140%;
            height:140%;
            background:
            radial-gradient(circle at top left,
            rgba(37,99,235,0.05),
            transparent 40%);
            top:-20%;
            left:-20%;
        }

        .wave{
            position:absolute;
            width:100%;
            height:100%;
            top:0;
            left:0;
            opacity:0.25;
        }

        .wave svg{
            width:100%;
            height:100%;
        }

        /* NAVBAR */

        .navbar{
            width:100%;
            height:70px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 30px;
            border-bottom:1px solid #e5e7eb;
            background:white;
            position:relative;
            z-index:10;
        }

        .logo{
            font-size:18px;
            font-weight:700;
            color:#2563eb;
        }

        .navbar a{
            color:#64748b;
            text-decoration:none;
            font-size:13px;
        }

        /* LOGIN */

        .login-wrapper{
            width:100%;
            height:calc(100vh - 70px);
            display:flex;
            justify-content:center;
            align-items:center;
            position:relative;
            z-index:2;
        }

        .login-box{
            width:420px;
            background:white;
            border-radius:24px;
            padding:45px;
            box-shadow:0 15px 40px rgba(0,0,0,0.08);
            border:1px solid #edf1f7;
        }

        .icon-box{
            width:70px;
            height:70px;
            background:#eff6ff;
            border-radius:50%;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:auto;
            margin-bottom:25px;
        }

        .icon-box i{
            font-size:28px;
            color:#2563eb;
        }

        .login-box h2{
            text-align:center;
            font-size:36px;
            margin-bottom:10px;
            color:#0f172a;
        }

        .login-box p{
            text-align:center;
            color:#64748b;
            margin-bottom:35px;
            font-size:14px;
        }

        .input-group{
            margin-bottom:22px;
        }

        .input-group label{
            display:block;
            margin-bottom:10px;
            font-size:14px;
            font-weight:600;
            color:#334155;
        }

        .input-box{
            position:relative;
        }

        .input-box i{
            position:absolute;
            top:50%;
            transform:translateY(-50%);
            left:15px;
            color:#94a3b8;
        }

        .input-box input{
            width:100%;
            padding:15px 15px 15px 45px;
            border:1px solid #dbe3ef;
            border-radius:14px;
            outline:none;
            background:#f8fafc;
            font-size:14px;
        }

        .input-box input:focus{
            border-color:#2563eb;
            background:white;
        }

        .options{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            font-size:13px;
        }

        .options a{
            text-decoration:none;
            color:#2563eb;
            font-weight:500;
        }

        .remember{
            display:flex;
            align-items:center;
            gap:8px;
            color:#64748b;
        }

        .login-btn{
            width:100%;
            padding:15px;
            border:none;
            border-radius:14px;
            background:#2563eb;
            color:white;
            font-size:15px;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;
        }

        .login-btn:hover{
            background:#1d4ed8;
        }

        .error{
            background:#fee2e2;
            color:#dc2626;
            padding:14px;
            border-radius:12px;
            margin-bottom:20px;
            font-size:14px;
            text-align:center;
        }

        /* FOOTER */

        .footer{
            position:absolute;
            bottom:20px;
            left:30px;
            right:30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            font-size:12px;
            color:#94a3b8;
            z-index:2;
        }

        .footer-links{
            display:flex;
            gap:20px;
        }

        .footer-links a{
            color:#94a3b8;
            text-decoration:none;
        }

        @media(max-width:600px){

            .login-box{
                width:90%;
                padding:35px 25px;
            }

            .footer{
                flex-direction:column;
                gap:10px;
                text-align:center;
            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<div class="navbar">

    <div class="logo">
        GeoSchool GIS
    </div>

    <a href="<?= base_url('/') ?>">
        Beranda
    </a>

</div>

<!-- WAVE -->

<div class="wave">

    <svg viewBox="0 0 1440 800" fill="none"
    xmlns="http://www.w3.org/2000/svg">

        <path d="M0 200C180 300 320 50 540 150C760 250 900 50 1140 180C1260 240 1350 210 1440 160"
        stroke="#2563eb"
        stroke-width="2"/>

        <path d="M0 420C220 300 380 500 600 430C820 360 980 280 1200 380C1320 430 1380 410 1440 370"
        stroke="#2563eb"
        stroke-width="2"/>

    </svg>

</div>

<!-- LOGIN -->

<div class="login-wrapper">

    <div class="login-box">

        <div class="icon-box">

            <i class="fa-solid fa-user-shield"></i>

        </div>

        <h2>
            Login Admin
        </h2>

        <p>
            Akses dashboard GeoSchool GIS
        </p>

        <?php if(session()->getFlashdata('error')) : ?>

            <div class="error">

                <?= session()->getFlashdata('error'); ?>

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
                    name="password"
                    placeholder="Masukkan password"
                    required>

                </div>

            </div>

            <div class="options">

                <div class="remember">

                    <input type="checkbox">

                    Ingat Saya

                </div>

                <a href="#">
                    Lupa Password?
                </a>

            </div>

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

</body>
</html>