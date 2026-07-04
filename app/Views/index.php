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

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', sans-serif;
            scroll-behavior:smooth;
        }

        body{
            background:#f8fafc;
            color:#0f172a;
        }

        a{
            text-decoration:none;
        }

        .container{
            width:88%;
            margin:auto;
        }

        /* NAVBAR */

        .navbar{
            width:100%;
            position:fixed;
            top:0;
            z-index:999;
            background:rgba(255,255,255,0.95);
            backdrop-filter:blur(10px);
            border-bottom:1px solid #e5e7eb;
        }

        .nav-content{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:16px 0;
        }

        .logo{
            font-size:22px;
            font-weight:700;
            color:#2563eb;
        }

        .menu{
            display:flex;
            gap:30px;
            align-items:center;
        }

        .menu a{
            color:#64748b;
            font-size:14px;
            font-weight:500;
        }

        .menu a:hover{
            color:#2563eb;
        }

        .login-btn{
            background:#2563eb;
            color:white;
            padding:11px 20px;
            border-radius:12px;
            font-size:13px;
            font-weight:600;
        }

        /* HERO */

        .hero{
            padding-top:130px;
            padding-bottom:90px;
            background:
            linear-gradient(
                rgba(255,255,255,0.92),
                rgba(255,255,255,0.92)
            ),
            url('https://www.transparenttextures.com/patterns/topography.png');
        }

        .hero-content{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:70px;
        }

        .hero-text{
            flex:1;
        }

        .hero-badge{
            display:inline-block;
            background:#dbeafe;
            color:#2563eb;
            padding:8px 18px;
            border-radius:50px;
            font-size:13px;
            font-weight:600;
            margin-bottom:22px;
        }

        .hero-text h1{
            font-size:48px;
            line-height:1.2;
            margin-bottom:18px;
        }

        .hero-text h1 span{
            color:#2563eb;
        }

        .hero-text p{
            color:#64748b;
            line-height:1.9;
            margin-bottom:30px;
            font-size:15px;
            max-width:580px;
        }

        /* SEARCH */

        .search-box{
            width:100%;
            max-width:500px;
            background:white;
            border-radius:16px;
            padding:10px;
            display:flex;
            align-items:center;
            gap:10px;
            border:1px solid #e5e7eb;
            box-shadow:0 10px 25px rgba(0,0,0,0.05);
        }

        .search-box input{
            width:100%;
            border:none;
            outline:none;
            padding:10px;
            font-size:14px;
        }

        .search-btn{
            background:#2563eb;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:12px;
            cursor:pointer;
            font-weight:600;
        }

        /* TAG */

        .hero-tags{
            display:flex;
            gap:12px;
            margin-top:18px;
            flex-wrap:wrap;
        }

        .hero-tags span{
            background:white;
            padding:10px 16px;
            border-radius:12px;
            font-size:13px;
            border:1px solid #e5e7eb;
            color:#475569;
        }

        /* HERO IMAGE */

        .hero-image{
            flex:1;
            display:flex;
            justify-content:center;
        }

        .hero-image img{
            width:100%;
            max-width:470px;
            height:320px;
            object-fit:cover;
            border-radius:28px;
            box-shadow:0 25px 50px rgba(0,0,0,0.12);
        }

        /* STATS */

        .stats{
            margin-top:55px;
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:18px;
        }

        .card{
            background:white;
            padding:24px;
            border-radius:18px;
            border:1px solid #edf1f7;
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card p{
            font-size:13px;
            color:#64748b;
        }

        .card h2{
            font-size:34px;
            margin-top:12px;
            color:#2563eb;
        }

        /* MAP */

        .map-section{
            padding:90px 0;
        }

        .section-title{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:35px;
        }

        .section-title h2{
            font-size:34px;
        }

        .section-title button{
            background:#eff6ff;
            color:#2563eb;
            border:none;
            padding:12px 18px;
            border-radius:12px;
            cursor:pointer;
            font-weight:600;
        }

        .map-wrapper{
            background:white;
            padding:18px;
            border-radius:28px;
            border:1px solid #e5e7eb;
            display:grid;
            grid-template-columns:260px 1fr;
            gap:20px;
        }

        .map-info{
            background:#f8fafc;
            border-radius:20px;
            padding:22px;
        }

        .map-info h3{
            margin-bottom:14px;
        }

        .map-info p{
            color:#64748b;
            font-size:14px;
            line-height:1.8;
        }

        .map-info ul{
            margin-top:20px;
            list-style:none;
        }

        .map-info li{
            margin-bottom:12px;
            font-size:14px;
            color:#475569;
        }

        .map-info i{
            color:#2563eb;
            margin-right:8px;
        }

        #map{
            height:500px;
            border-radius:22px;
            overflow:hidden;
        }

        /* ABOUT */

        .info-section{
            padding-bottom:90px;
        }

        .info-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:40px;
            align-items:center;
        }

        .info-image img{
            width:100%;
            border-radius:28px;
            box-shadow:0 20px 45px rgba(0,0,0,0.08);
        }

        .info-text h2{
            font-size:34px;
            margin-bottom:20px;
        }

        .info-text p{
            color:#64748b;
            line-height:1.9;
            margin-bottom:25px;
        }

        .info-list{
            display:flex;
            flex-direction:column;
            gap:16px;
        }

        .info-item{
            display:flex;
            align-items:flex-start;
            gap:14px;
        }

        .info-item i{
            width:42px;
            height:42px;
            background:#dbeafe;
            color:#2563eb;
            border-radius:12px;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-shrink:0;
        }

        .info-item h4{
            margin-bottom:5px;
        }

        .info-item p{
            margin:0;
            font-size:14px;
        }

        /* FOOTER */

        footer{
            background:white;
            border-top:1px solid #e5e7eb;
            padding:45px 0;
        }

        .footer-content{
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
            gap:20px;
        }

        .footer-logo{
            font-size:22px;
            font-weight:700;
            color:#2563eb;
        }

        .footer-text{
            color:#64748b;
            font-size:14px;
            margin-top:10px;
        }

        .footer-links{
            display:flex;
            gap:25px;
        }

        .footer-links a{
            color:#64748b;
            font-size:14px;
        }

        /* RESPONSIVE */

        @media(max-width:1000px){

            .hero-content{
                flex-direction:column;
            }

            .map-wrapper{
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

            .hero-text h1{
                font-size:34px;
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

</div>

    </div>

</div>

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
        background:#fee2e2;
        color:#dc2626;
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

                <p>Total SD</p>

                <h2>

                <?= count(array_filter($sekolah,function($s){

                    return $s['jenjang'] == 'SD';

                })); ?>

                </h2>

            </div>

            <div class="card">

                <p>Total SMP</p>

                <h2>

                <?= count(array_filter($sekolah,function($s){

                    return $s['jenjang'] == 'SMP';

                })); ?>

                </h2>

            </div>

            <div class="card">

                <p>Total TK</p>

                <h2>

                <?= count(array_filter($sekolah,function($s){

                    return $s['jenjang'] == 'TK';

                })); ?>

                </h2>

            </div>

            <div class="card">

                <p>Total Sekolah</p>

                <h2><?= count($sekolah); ?></h2>

            </div>

        </div>

    </div>

</section>

<!-- MAP -->

<section class="map-section" id="peta">

```
<div class="container">

    <div class="section-title">

        <div>

            <h2>
                Peta Persebaran Sekolah
            </h2>

            <p style="
                color:#64748b;
                margin-top:10px;
                line-height:1.8;
                font-size:14px;
                max-width:600px;
            ">

                Lihat distribusi lokasi sekolah negeri di seluruh kecamatan.
                Gunakan filter untuk melihat kategori sekolah tertentu.

            </p>

        </div>

        <button style="
            background:white;
            border:1px solid #dbe3ef;
            color:#2563eb;
            padding:12px 18px;
            border-radius:12px;
            font-size:13px;
            font-weight:600;
            cursor:pointer;
        ">

            <a href="<?= base_url('/detail-peta'); ?>">

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
```

</section>

<style>

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

    .section-title h2{
        font-size:34px;
        margin-bottom:8px;
    }

    .map-layout{
        display:grid;
        grid-template-columns:240px 1fr;
        gap:20px;
        align-items:start;
    }

    .map-sidebar{
        display:flex;
        flex-direction:column;
        gap:16px;
    }

    .info-card{
        background:#f8fafc;
        border:1px solid #dbe3ef;
        border-radius:16px;
        padding:18px;
        display:flex;
        gap:14px;
        align-items:flex-start;
    }

    .info-icon{
        width:40px;
        height:40px;
        background:#e0ecff;
        color:#2563eb;
        border-radius:12px;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-shrink:0;
    }

    .info-card h4{
        font-size:14px;
        margin-bottom:6px;
    }

    .info-card p{
        font-size:12px;
        line-height:1.7;
        color:#64748b;
    }

    .map-filter{
        display:flex;
        flex-direction:column;
        gap:14px;
        margin-top:10px;
    }

    .filter-item{
        display:flex;
        align-items:center;
        gap:14px;
        font-size:14px;
        color:#334155;
        font-weight:500;
    }

    .filter-icon{
        width:38px;
        height:38px;
        background:#eff6ff;
        color:#2563eb;
        border-radius:50%;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:13px;
    }

    .map-box{
        background:white;
        border-radius:22px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,0.08);
        border:1px solid #e5e7eb;
        padding:14px;
    }

    #map{
        width:100%;
        height:520px;
        border-radius:18px;
    }

    @media(max-width:900px){

        .map-layout{
            grid-template-columns:1fr;
        }

    }

</style>


<!-- ABOUT -->

<section class="info-section"
id="about">

    <div class="container info-grid">

        <div class="info-image">

            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop">

        </div>

        <div class="info-text">

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
                    color:#2563eb;
                    margin-bottom:10px;
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
                        background:#2563eb;
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