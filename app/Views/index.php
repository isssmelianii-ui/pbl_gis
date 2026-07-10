<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        GeoSchool GIS
    </title>

    <!-- FONT AWESOME -->

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <!-- LEAFLET -->

    <link rel="stylesheet"
    href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <!-- FONTS -->

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
            --bg:#f5f7fa;
            --surface:#ffffff;
            --danger-bg:#fdecec;
            --danger-fg:#b3261e;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Plus Jakarta Sans', sans-serif;
            scroll-behavior:smooth;
        }

        body{
            background:var(--bg);
            color:var(--ink-900);
        }

        a{
            text-decoration:none;
        }

        .mono{
            font-family:'JetBrains Mono', monospace;
        }

        .container{
            width:88%;
            max-width:1240px;
            margin:auto;
        }

        /* NAVBAR */

        .navbar{
            width:100%;
            position:fixed;
            top:0;
            z-index:999;
            background:rgba(255,255,255,0.92);
            backdrop-filter:blur(10px);
            border-bottom:1px solid var(--line);
        }

        .nav-content{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:16px 0;
        }

        .logo{
            font-size:19px;
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
            flex-shrink:0;
        }

        .menu{
            display:flex;
            gap:32px;
            align-items:center;
        }

        .menu a{
            color:var(--ink-600);
            font-size:13.5px;
            font-weight:600;
        }

        .menu a:hover{
            color:var(--navy-900);
        }

        .login-btn{
            background:var(--navy-900);
            color:white;
            padding:11px 22px;
            border-radius:10px;
            font-size:13px;
            font-weight:700;
            transition:background 0.15s ease;
        }

        .login-btn:hover{
            background:var(--navy-800);
        }

        /* MOBILE NAV TOGGLE */

        .nav-toggle{
            display:none;
            width:40px;
            height:40px;
            border:1.5px solid var(--line);
            border-radius:10px;
            background:var(--surface);
            color:var(--navy-900);
            font-size:16px;
            cursor:pointer;
            align-items:center;
            justify-content:center;
        }

        .mobile-menu{
            display:none;
            flex-direction:column;
            gap:4px;
            padding:14px 0 18px;
            border-top:1px solid var(--line);
        }

        .mobile-menu.active{
            display:flex;
        }

        .mobile-menu a{
            color:var(--ink-600);
            font-size:14px;
            font-weight:600;
            padding:12px 6px;
            border-radius:10px;
            transition:background 0.15s ease, color 0.15s ease;
        }

        .mobile-menu a:hover{
            background:#f0f4f9;
            color:var(--navy-900);
        }

        /* HERO */

        .hero{
            padding-top:132px;
            padding-bottom:90px;
            position:relative;
            background:var(--navy-950);
            color:#eaf0f6;
            overflow:hidden;
        }

        .hero::before{
            content:'';
            position:absolute;
            inset:0;
            background:
                radial-gradient(circle at 85% 10%, rgba(214,164,69,0.10), transparent 45%),
                linear-gradient(165deg,var(--navy-950) 0%,var(--navy-900) 60%,var(--navy-800) 100%);
        }

        .hero::after{
            content:'';
            position:absolute;
            inset:0;
            background-image:
                linear-gradient(rgba(255,255,255,0.045) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.045) 1px, transparent 1px);
            background-size:56px 56px;
        }

        .hero-content{
            position:relative;
            z-index:2;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:70px;
        }

        .hero-text{
            flex:1;
        }

        .hero-badge{
            display:inline-flex;
            align-items:center;
            gap:10px;
            font-family:'JetBrains Mono', monospace;
            background:rgba(255,255,255,0.06);
            border:1px solid rgba(255,255,255,0.14);
            color:var(--gold-400);
            padding:8px 16px;
            border-radius:50px;
            font-size:11.5px;
            letter-spacing:1px;
            margin-bottom:24px;
        }

        .hero-badge::before{
            content:'';
            width:6px;
            height:6px;
            border-radius:50%;
            background:var(--gold-400);
        }

        .hero-text h1{
            font-size:46px;
            line-height:1.25;
            font-weight:800;
            margin-bottom:18px;
            letter-spacing:-0.5px;
        }

        .hero-text h1 span{
            color:var(--gold-400);
        }

        .hero-text > p{
            color:#b7c4d1;
            line-height:1.85;
            margin-bottom:30px;
            font-size:15px;
            max-width:560px;
        }

        /* SEARCH */

        .search-box{
            width:100%;
            max-width:500px;
            background:var(--surface);
            border-radius:14px;
            padding:8px;
            display:flex;
            align-items:center;
            gap:10px;
            box-shadow:0 20px 45px rgba(0,0,0,0.25);
        }

        .search-box i{
            color:var(--ink-400);
            margin-left:10px;
        }

        .search-box input{
            width:100%;
            border:none;
            outline:none;
            padding:10px;
            font-size:14px;
            color:var(--ink-900);
            font-family:inherit;
        }

        .search-btn{
            background:var(--navy-900);
            color:white;
            border:none;
            padding:12px 22px;
            border-radius:10px;
            cursor:pointer;
            font-weight:700;
            font-size:13.5px;
            font-family:inherit;
            transition:background 0.15s ease;
        }

        .search-btn:hover{
            background:var(--navy-800);
        }

        /* HERO IMAGE */

        .hero-image{
            flex:1;
            display:flex;
            justify-content:center;
            position:relative;
        }

        .hero-image::before{
            content:'';
            position:absolute;
            inset:-16px;
            border:1px solid rgba(214,164,69,0.35);
            border-radius:32px;
            pointer-events:none;
        }

        .hero-image img{
            width:100%;
            max-width:470px;
            height:320px;
            object-fit:cover;
            border-radius:24px;
            box-shadow:0 25px 55px rgba(0,0,0,0.35);
        }

        /* STATS */

        .stats{
            position:relative;
            z-index:2;
            margin-top:55px;
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:16px;
        }

        .card{
            background:rgba(255,255,255,0.05);
            border:1px solid rgba(255,255,255,0.12);
            padding:22px 24px;
            border-radius:16px;
            transition:transform 0.2s ease, background 0.2s ease;
        }

        .card:hover{
            transform:translateY(-4px);
            background:rgba(255,255,255,0.08);
        }

        .card p{
            font-size:12.5px;
            color:#9fb0c0;
            font-family:'JetBrains Mono', monospace;
            letter-spacing:0.3px;
        }

        .card h2{
            font-size:32px;
            margin-top:10px;
            color:#fff;
            font-weight:800;
        }

        /* MAP */

        .map-section{
            padding:90px 0;
        }

        .section-title{
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            margin-bottom:35px;
            gap:20px;
            flex-wrap:wrap;
        }

        .section-title .eyebrow{
            font-family:'JetBrains Mono', monospace;
            font-size:12px;
            letter-spacing:1.2px;
            text-transform:uppercase;
            color:var(--gold-500);
            margin-bottom:10px;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .section-title .eyebrow::before{
            content:'';
            width:22px;
            height:1px;
            background:var(--gold-500);
        }

        .section-title h2{
            font-size:32px;
            margin-bottom:8px;
            font-weight:800;
            color:var(--ink-900);
            letter-spacing:-0.3px;
        }

        .section-title p{
            color:var(--ink-600);
            line-height:1.8;
            font-size:14px;
            max-width:600px;
        }

        .section-title .map-cta{
            background:var(--surface);
            border:1.5px solid var(--line);
            color:var(--navy-900);
            padding:12px 20px;
            border-radius:10px;
            font-size:13px;
            font-weight:700;
            cursor:pointer;
            white-space:nowrap;
            transition:border-color 0.15s ease, background 0.15s ease;
        }

        .section-title .map-cta:hover{
            border-color:var(--navy-900);
            background:#f8fafc;
        }

        .section-title .map-cta a{
            color:inherit;
            display:flex;
            align-items:center;
            gap:8px;
        }

        .map-layout{
            display:grid;
            grid-template-columns:250px 1fr;
            gap:20px;
            align-items:start;
        }

        .map-sidebar{
            display:flex;
            flex-direction:column;
            gap:14px;
        }

        .info-card{
            background:var(--surface);
            border:1px solid var(--line);
            border-radius:16px;
            padding:18px;
            display:flex;
            gap:14px;
            align-items:flex-start;
        }

        .info-icon{
            width:38px;
            height:38px;
            background:var(--navy-900);
            color:var(--gold-400);
            border-radius:10px;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-shrink:0;
            font-size:13px;
        }

        .info-card h4{
            font-size:13.5px;
            margin-bottom:6px;
            color:var(--ink-900);
            font-weight:700;
        }

        .info-card p{
            font-size:12px;
            line-height:1.7;
            color:var(--ink-600);
        }

        .map-filter{
            background:var(--surface);
            border:1px solid var(--line);
            border-radius:16px;
            padding:18px;
            display:flex;
            flex-direction:column;
            gap:14px;
        }

        .map-filter .filter-label{
            font-family:'JetBrains Mono', monospace;
            font-size:11px;
            letter-spacing:0.8px;
            text-transform:uppercase;
            color:var(--ink-400);
            margin-bottom:2px;
        }

        .filter-item{
            display:flex;
            align-items:center;
            gap:12px;
            font-size:13.5px;
            color:var(--ink-900);
            font-weight:600;
        }

        .filter-icon{
            width:32px;
            height:32px;
            background:#f0f4f9;
            color:var(--navy-900);
            border-radius:50%;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:12px;
            flex-shrink:0;
        }

        .map-box{
            background:var(--surface);
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 15px 35px rgba(15,23,42,0.06);
            border:1px solid var(--line);
            padding:12px;
        }

        #map{
            width:100%;
            height:520px;
            border-radius:14px;
        }

        /* ABOUT */

        .info-section{
            padding-bottom:100px;
        }

        .info-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:50px;
            align-items:center;
        }

        .info-image{
            position:relative;
        }

        .info-image::before{
            content:'';
            position:absolute;
            top:-14px;
            left:-14px;
            width:100%;
            height:100%;
            border:1.5px solid var(--line);
            border-radius:24px;
            z-index:0;
        }

        .info-image img{
            position:relative;
            z-index:1;
            width:100%;
            display:block;
            border-radius:20px;
            box-shadow:0 20px 45px rgba(15,23,42,0.10);
        }

        .info-text .eyebrow{
            font-family:'JetBrains Mono', monospace;
            font-size:12px;
            letter-spacing:1.2px;
            text-transform:uppercase;
            color:var(--gold-500);
            margin-bottom:14px;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .info-text .eyebrow::before{
            content:'';
            width:22px;
            height:1px;
            background:var(--gold-500);
        }

        .info-text h2{
            font-size:30px;
            margin-bottom:18px;
            font-weight:800;
            color:var(--ink-900);
            letter-spacing:-0.3px;
        }

        .info-text > p{
            color:var(--ink-600);
            line-height:1.9;
            margin-bottom:28px;
        }

        .info-list{
            display:flex;
            flex-direction:column;
            gap:18px;
        }

        .info-item{
            display:flex;
            align-items:flex-start;
            gap:16px;
        }

        .info-item i{
            width:42px;
            height:42px;
            background:var(--navy-900);
            color:var(--gold-400);
            border-radius:12px;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-shrink:0;
            font-size:15px;
        }

        .info-item h4{
            margin-bottom:5px;
            font-size:14.5px;
            color:var(--ink-900);
        }

        .info-item p{
            margin:0;
            font-size:13.5px;
            color:var(--ink-600);
        }

        /* FOOTER */

        footer{
            background:var(--surface);
            border-top:1px solid var(--line);
            padding:40px 0;
        }

        .footer-content{
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
            gap:20px;
        }

        .footer-logo{
            font-size:18px;
            font-weight:800;
            color:var(--navy-900);
            display:flex;
            align-items:center;
            gap:10px;
        }

        .footer-logo .logo-mark{
            width:32px;
            height:32px;
            border-radius:9px;
            background:var(--navy-900);
            color:var(--gold-400);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:13px;
        }

        .footer-text{
            color:var(--ink-600);
            font-size:13px;
            margin-top:10px;
            font-family:'JetBrains Mono', monospace;
        }

        /* RESPONSIVE */

        @media(max-width:1000px){

            .hero-content{
                flex-direction:column;
            }

            .map-layout{
                grid-template-columns:1fr;
            }

            .info-grid{
                grid-template-columns:1fr;
            }

            .stats{
                grid-template-columns:repeat(2,1fr);
            }

        }

        @media(max-width:700px){

            .menu{
                display:none;
            }

            .nav-toggle{
                display:flex;
            }

            .hero-text h1{
                font-size:32px;
            }

            .stats{
                grid-template-columns:1fr;
            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<div class="navbar">

    <div class="container nav-content">

        <div class="logo">
            <span class="logo-mark"><i class="fa-solid fa-map-location-dot"></i></span>
            GeoSchool GIS
        </div>

        <div class="menu">

            <a href="#home">Beranda</a>

            <a href="#peta">Peta</a>

            <a href="#about">Tentang</a>

    <a href="<?= base_url('/data-sekolah'); ?>">

        Data Sekolah

    </a>


        </div>



    <a href="<?= base_url('admin/login') ?>"
    class="login-btn">

        Masuk

    </a>

    <button type="button" class="nav-toggle" id="navToggle" aria-label="Buka menu">
        <i class="fa-solid fa-bars"></i>
    </button>

</div>

    <!-- MOBILE MENU -->

    <div class="container">

        <div class="mobile-menu" id="mobileMenu">

            <a href="#home">Beranda</a>

            <a href="#peta">Peta</a>

            <a href="#about">Tentang</a>

            <a href="<?= base_url('/data-sekolah'); ?>">Data Sekolah</a>

        </div>

    </div>

</div>

<script>
    const navToggle = document.getElementById('navToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    if(navToggle && mobileMenu){
        navToggle.addEventListener('click', function(){
            mobileMenu.classList.toggle('active');
        });
    }
</script>

<!-- HERO -->

<section class="hero" id="home">

    <div class="container hero-content">

        <div class="hero-text">

            <div class="hero-badge">
                SISTEM INFORMASI TANAH DATAR
            </div>

            <h1>
                Pemetaan Digital
                Sekolah Negeri
                <span>TK, SD & SMP</span>
            </h1>

            <p>
                Sistem informasi geografis untuk visualisasi persebaran sekolah secara realtime dan modern.
            </p>

<!-- SEARCH -->

<form action="<?= base_url('/'); ?>" method="GET" class="search-box">

    <i class="fa-solid fa-magnifying-glass"></i>

    <input 
        type="text"
        name="keyword"
        placeholder="Cari sekolah atau wilayah..."
        value="<?= $_GET['keyword'] ?? ''; ?>"
    >

    <button type="submit" class="search-btn">
        Cari
    </button>

</form>

<!-- PESAN ERROR -->

<?php if(session()->getFlashdata('error')) : ?>

    <div style="
        margin-top:15px;
        background:#fdecec;
        color:#b3261e;
        border:1px solid rgba(179,38,30,0.2);
        padding:12px 16px;
        border-radius:12px;
        font-size:14px;
        width:100%;
        max-width:500px;
    ">

        <?= session()->getFlashdata('error'); ?>

    </div>

<?php endif; ?>

            <!-- TAG -->

            <!-- <div class="hero-tags">

                <span>Lintau Buo</span>

                <span>Padang Ganting</span>

                <span>Tanjung Emas</span>

            </div> -->

        </div>

        <div class="hero-image">

            <img src="https://smkn1lintaubuo.sch.id/storage/hero-images/lzuz5HYnmKfAbPk53Mm8DZnR7Xuc9P0LGyY3rRrh.jpg">

        </div>

    </div>

    <!-- STATS -->

    <div class="container">

        <div class="stats">

            <div class="card">

                <p>TOTAL SD</p>

                <h2>

                <?= count(array_filter($sekolah,function($s){

                    return $s['jenjang'] == 'SD';

                })); ?>

                </h2>

            </div>

            <div class="card">

                <p>TOTAL SMP</p>

                <h2>

                <?= count(array_filter($sekolah,function($s){

                    return $s['jenjang'] == 'SMP';

                })); ?>

                </h2>

            </div>

            <div class="card">

                <p>TOTAL TK</p>

                <h2>

                <?= count(array_filter($sekolah,function($s){

                    return $s['jenjang'] == 'TK';

                })); ?>

                </h2>

            </div>

            <div class="card">

                <p>TOTAL SEKOLAH</p>

                <h2><?= count($sekolah); ?></h2>

            </div>

        </div>

    </div>

</section>

<!-- MAP -->

<section class="map-section" id="peta">

    <div class="container">

        <div class="section-title">

            <div>

                <div class="eyebrow">Peta Interaktif</div>

                <h2>
                    Peta Persebaran Sekolah
                </h2>

                <p>

                    Lihat distribusi lokasi sekolah negeri di seluruh kecamatan.
                    Gunakan filter untuk melihat kategori sekolah tertentu.

                </p>

            </div>

            <button class="map-cta">

                <a href="<?= base_url('/detail-peta'); ?>">

                    <i class="fa-solid fa-up-right-from-square"></i>
                    Lihat Peta Publik

                </a>

            </button>

        </div>

        <div class="map-layout">

            <!-- SIDEBAR -->

            <div class="map-sidebar">

                <div class="info-card">

                    <div class="info-icon">

                        <i class="fa-solid fa-circle-info"></i>

                    </div>

                    <div>

                        <h4>
                            Info Terkini
                        </h4>

                        <p>
                            Data diperbarui secara berkala berdasarkan
                            Dapodik Pusat per Semester Ganjil 2025/2026.
                        </p>

                    </div>

                </div>

                <div class="info-card">

                    <div class="info-icon">

                        <i class="fa-solid fa-map-location-dot"></i>

                    </div>

                    <div>

                        <h4>
                            GIS Pendidikan
                        </h4>

                        <p>
                            Visualisasi persebaran sekolah berbasis GIS
                            untuk membantu masyarakat melihat lokasi sekolah.
                        </p>

                    </div>

                </div>

                <div class="map-filter">

                    <div class="filter-label">Kategori Sekolah</div>

                    <div class="filter-item">

                        <div class="filter-icon">

                            <i class="fa-solid fa-location-dot"></i>

                        </div>

                        TK

                    </div>

                    <div class="filter-item">

                        <div class="filter-icon">

                            <i class="fa-solid fa-location-dot"></i>

                        </div>

                        SD

                    </div>

                    <div class="filter-item">

                        <div class="filter-icon">

                            <i class="fa-solid fa-location-dot"></i>

                        </div>

                        SMP

                    </div>

                </div>

            </div>

            <!-- MAP -->

            <div class="map-box">

                <div id="map"></div>

            </div>

        </div>

    </div>

</section>

<!-- ABOUT -->

<section class="info-section"
id="about">

    <div class="container info-grid">

        <div class="info-image">

            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop">

        </div>

        <div class="info-text">

            <div class="eyebrow">Tentang Sistem</div>

            <h2>
                Data Persebaran Berdasarkan Wilayah Strategis
            </h2>

            <p>
                GeoSchool GIS merupakan sistem informasi geografis untuk mendukung visualisasi sekolah negeri secara modern.
            </p>

            <div class="info-list">

                <div class="info-item">

                    <i class="fa-solid fa-map-location-dot"></i>

                    <div>

                        <h4>
                            Pemetaan Lokasi
                        </h4>

                        <p>
                            Visualisasi titik sekolah berbasis GIS.
                        </p>

                    </div>

                </div>

                <div class="info-item">

                    <i class="fa-solid fa-school"></i>

                    <div>

                        <h4>
                            Informasi Sekolah
                        </h4>

                        <p>
                            Data sekolah TK, SD, dan SMP Negeri.
                        </p>

                    </div>

                </div>

                <div class="info-item">

                    <i class="fa-solid fa-chart-column"></i>

                    <div>

                        <h4>
                            Statistik Pendidikan
                        </h4>

                        <p>
                            Statistik persebaran sekolah realtime.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->

<footer>

    <div class="container footer-content">

        <div>

            <div class="footer-logo">
                <span class="logo-mark"><i class="fa-solid fa-map-location-dot"></i></span>
                GeoSchool GIS
            </div>

            <div class="footer-text">

                © 2026 Sistem Informasi Pemetaan Sekolah

            </div>

        </div>



    </div>

</footer>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

    var map = L.map('map').setView(
        [-0.471, 100.585],
        10
    );

    L.tileLayer(
        'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:'OpenStreetMap'
        }
    ).addTo(map);

    <?php foreach($sekolah as $s): ?>

        <?php

            $color = 'blue';

            if($s['jenjang'] == 'TK'){
                $color = 'green';
            }

            if($s['jenjang'] == 'SMP'){
                $color = 'red';
            }

        ?>

        var icon<?= $s['id']; ?> = L.icon({

            iconUrl:
            'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-<?= $color; ?>.png',

            shadowUrl:
            'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',

            iconSize:[25,41],

            iconAnchor:[12,41]

        });

        L.marker([
            <?= $s['latitude']; ?>,
            <?= $s['longitude']; ?>
        ],{
            icon:icon<?= $s['id']; ?>
        })

        .addTo(map)

        .bindPopup(`

            <div style="width:220px;">

                <h3 style="
                    color:#0e2a47;
                    margin-bottom:10px;
                    font-family:'Plus Jakarta Sans',sans-serif;
                ">

                    <?= $s['nama_sekolah']; ?>

                </h3>

                <p style="
                    font-size:13px;
                    color:#64748b;
                    margin-bottom:8px;
                ">

                    <?= $s['alamat']; ?>

                </p>

                <p style="
                    font-size:13px;
                    margin-bottom:8px;
                ">

                    <b>Kecamatan:</b>
                    <?= $s['kecamatan']; ?>

                </p>

                <p style="
                    font-size:13px;
                    margin-bottom:8px;
                ">

                    <b>Jenjang:</b>
                    <?= $s['jenjang']; ?>

                </p>

                <?php if($s['website'] != ''): ?>

                    <a href="<?= base_url('detail-sekolah/'.$s['id']); ?>"
                    style="
                        display:block;
                        margin-top:12px;
                        background:#0e2a47;
                        color:white;
                        text-align:center;
                        padding:10px;
                        border-radius:10px;
                    ">

                        Website Sekolah

                    </a>

                <?php endif; ?>

            </div>

        `);     

    <?php endforeach; ?>

</script>

</body>
</html>