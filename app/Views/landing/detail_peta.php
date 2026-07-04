<?= $this->include('layouts/header'); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Publik Sekolah</title>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body{
            background:#f4f7fb;
        }

        .map-wrapper{
            width:100%;
            height:100vh;
            position:relative;
        }

        #map{
            width:100%;
            height:100vh;
            z-index:1;
        }

        /* TOPBAR */
        .topbar{
            position:absolute;
            top:20px;
            left:20px;
            right:20px;
            z-index:999;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .logo-box{
            background:white;
            padding:12px 20px;
            border-radius:14px;
            box-shadow:0 4px 20px rgba(0,0,0,0.08);
            font-weight:700;
            color:#2563eb;
            font-size:20px;
        }

        .back-btn{
            text-decoration:none;
            background:#2563eb;
            color:white;
            padding:10px 18px;
            border-radius:12px;
            font-weight:600;
            transition:0.3s;
        }

        .back-btn:hover{
            background:#1d4ed8;
        }

        /* SIDEBAR */
        .sidebar{
            position:absolute;
            top:90px;
            left:20px;
            width:300px;
            background:white;
            border-radius:20px;
            padding:20px;
            z-index:999;
            box-shadow:0 4px 30px rgba(0,0,0,0.08);
        }

        .sidebar h3{
            margin-bottom:15px;
            color:#111827;
        }

        .search-box{
            width:100%;
            margin-bottom:20px;
        }

        .search-box input{
            width:100%;
            padding:12px;
            border:1px solid #d1d5db;
            border-radius:12px;
            outline:none;
        }

        .filter-box{
            margin-top:20px;
        }

        .filter-item{
            margin-bottom:10px;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .stats-box{
            margin-top:25px;
            background:#f8fafc;
            border-radius:14px;
            padding:15px;
        }

        .stats-item{
            margin-bottom:10px;
        }

        .stats-item h2{
            color:#2563eb;
        }

        .leaflet-popup-content{
            font-size:14px;
        }

        .popup-title{
            font-size:16px;
            font-weight:700;
            margin-bottom:5px;
            color:#111827;
        }

        .popup-info{
            margin-bottom:4px;
            color:#4b5563;
        }

        @media(max-width:768px){

            .sidebar{
                width:90%;
                left:50%;
                transform:translateX(-50%);
                top:auto;
                bottom:20px;
            }

            .topbar{
                flex-direction:column;
                gap:10px;
            }

        }

    </style>
</head>
<body>

<div class="map-wrapper">

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="logo-box">
            GeoSchool GIS
        </div>

        <a href="<?= base_url('/'); ?>" class="back-btn">
            Kembali
        </a>

    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h3>Peta Persebaran Sekolah</h3>

        <div class="search-box">
            <input type="text" placeholder="Cari sekolah...">
        </div>

        <div class="filter-box">

            <div class="filter-item">
                <input type="checkbox" checked>
                <label>TK</label>
            </div>

            <div class="filter-item">
                <input type="checkbox" checked>
                <label>SD</label>
            </div>

            <div class="filter-item">
                <input type="checkbox" checked>
                <label>SMP</label>
            </div>

        </div>

        <div class="stats-box">

            <div class="stats-item">
                <small>Total Sekolah</small>
                <h2><?= count($sekolah); ?></h2>
            </div>

        </div>

    </div>

    <!-- MAP -->
    <div id="map"></div>

</div>

<!-- LEAFLET -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

    // INIT MAP
    var map = L.map('map').setView([-0.947083, 100.417181], 11);

    // TILE
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    // DATA SEKOLAH
    <?php foreach($sekolah as $s) : ?>

        <?php if(!empty($s['latitude']) && !empty($s['longitude'])) : ?>

            var marker = L.marker([
                <?= $s['latitude']; ?>,
                <?= $s['longitude']; ?>
            ]).addTo(map);

            marker.bindPopup(`
                <div class="popup-title">
                    <?= $s['nama_sekolah']; ?>
                </div>

                <div class="popup-info">
                    <b>NPSN:</b> <?= $s['npsn']; ?>
                </div>

                <div class="popup-info">
                    <b>Jenjang:</b> <?= $s['jenjang']; ?>
                </div>

                <div class="popup-info">
                    <b>Kecamatan:</b> <?= $s['kecamatan']; ?>
                </div>

                <div class="popup-info">
                    <b>Akreditasi:</b> <?= $s['akreditasi']; ?>
                </div>
            `);

        <?php endif; ?>

    <?php endforeach; ?>

</script>

</body>
</html>