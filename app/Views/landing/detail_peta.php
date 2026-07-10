<?= $this->include('layouts/header'); ?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Detail Peta Sekolah — GeoSchool GIS
    </title>

    <!-- LEAFLET -->

    <link rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

    <!-- FONT AWESOME -->

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <!-- FONT -->

    <link rel="preconnect"
    href="https://fonts.googleapis.com">

    <link rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap"
    rel="stylesheet">

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
            --surface:#ffffff;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        /* Halaman ini punya sidebar/panel sendiri yang sudah responsif,
           jadi tombol hamburger & overlay bawaan layouts/header tidak dipakai di sini */
        .mobile-toggle,
        .sidebar-overlay{
            display:none !important;
        }

        body{
            font-family:'Plus Jakarta Sans',sans-serif;
            background:#f5f7fa;
            overflow:hidden;
            color:var(--ink-900);
        }

        .mono{
            font-family:'JetBrains Mono',monospace;
        }

        .app-container{
            display:flex;
            width:100%;
            height:100vh;
        }

        /* ============================================
           SIDEBAR
        ============================================ */

        .sidebar{
            width:420px;
            height:100vh;
            background:rgba(255,255,255,0.97);
            backdrop-filter:blur(20px);
            border-right:1px solid var(--line);
            box-shadow:0 10px 30px rgba(14,42,71,0.06);
            overflow:hidden;
            z-index:999;
        }

        .sidebar-inner{
            padding:24px;
            overflow-y:auto;
            height:100%;
        }

        .sidebar-header{
            display:flex;
            align-items:center;
            justify-content:space-between;
            margin-bottom:22px;
            padding-bottom:20px;
            border-bottom:1px solid var(--line);
        }

        .brand{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .logo{
            width:42px;
            height:42px;
            border-radius:12px;
            background:var(--navy-900);
            display:flex;
            align-items:center;
            justify-content:center;
            color:var(--gold-400);
            font-size:17px;
            flex-shrink:0;
        }

        .brand h1{
            font-size:17px;
            font-weight:800;
            color:var(--ink-900);
            letter-spacing:-0.2px;
        }

        .brand h1 span{
            color:var(--gold-500);
        }

        .back-btn{
            background:var(--navy-900);
            color:white;
            padding:9px 18px;
            border-radius:30px;
            text-decoration:none;
            font-size:12.5px;
            font-weight:700;
            transition:background 0.15s ease;
            white-space:nowrap;
        }

        .back-btn:hover{
            background:var(--navy-800);
        }

        /* ============================================
           SEARCH
        ============================================ */

        .search-box{
            display:flex;
            align-items:center;
            gap:11px;
            border:1.5px solid var(--line);
            border-radius:14px;
            background:#f8fafc;
            padding:0 16px;
            margin-bottom:18px;
            transition:border-color 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
        }

        .search-box:focus-within{
            border-color:var(--navy-800);
            background:white;
            box-shadow:0 0 0 3.5px rgba(14,42,71,0.09);
        }

        .search-box i{
            color:var(--ink-400);
            font-size:14px;
            flex-shrink:0;
        }

        .search-box input{
            width:100%;
            padding:14px 0;
            border:none;
            outline:none;
            background:transparent;
            font-size:14px;
            font-family:inherit;
            color:var(--ink-900);
        }

        .search-box input::placeholder{
            color:var(--ink-400);
        }

        /* ============================================
           FILTER
        ============================================ */

        .filter-group{
            display:flex;
            gap:9px;
            flex-wrap:wrap;
            margin-bottom:22px;
        }

        .filter-chip{
            padding:9px 16px;
            border-radius:30px;
            background:white;
            border:1px solid var(--line);
            font-size:12.5px;
            font-weight:700;
            cursor:pointer;
            transition:background 0.15s ease, color 0.15s ease, border-color 0.15s ease;
            color:var(--ink-600);
        }

        .filter-chip.active{
            background:var(--navy-900);
            color:white;
            border-color:var(--navy-900);
        }

        /* ============================================
           STATS
        ============================================ */

        .stats-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:12px;
            margin-bottom:22px;
        }

        .stat-card{
            background:white;
            border-radius:16px;
            padding:16px;
            border:1px solid var(--line);
            text-align:center;
            box-shadow:0 8px 20px rgba(14,42,71,0.04);
        }

        .stat-icon{
            width:42px;
            height:42px;
            border-radius:12px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            margin-bottom:10px;
            color:var(--gold-400);
            font-size:16px;
            background:var(--navy-900);
        }

        .stat-number{
            font-size:21px;
            font-weight:800;
            color:var(--ink-900);
        }

        .stat-label{
            font-size:11px;
            color:var(--ink-600);
            font-weight:700;
            margin-top:4px;
            font-family:'JetBrains Mono',monospace;
            text-transform:uppercase;
            letter-spacing:0.4px;
        }

        /* ============================================
           CARD SEKOLAH
        ============================================ */

        .school-list{
            display:flex;
            flex-direction:column;
            gap:14px;
            padding-bottom:30px;
        }

        .school-card{
            background:white;
            border-radius:18px;
            overflow:hidden;
            border:1px solid var(--line);
            box-shadow:0 10px 20px rgba(14,42,71,0.04);
            transition:transform 0.2s ease, box-shadow 0.2s ease;
            cursor:pointer;
        }

        .school-card:hover{
            transform:translateY(-3px);
            box-shadow:0 14px 28px rgba(14,42,71,0.09);
        }

        .school-cover{
            height:130px;
            overflow:hidden;
            position:relative;
        }

        .school-cover img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .school-badge{
            position:absolute;
            top:12px;
            right:12px;
            background:var(--navy-900);
            color:white;
            padding:6px 14px;
            border-radius:30px;
            font-size:10.5px;
            font-weight:700;
        }

        .school-content{
            padding:16px;
        }

        .school-content h3{
            font-size:16px;
            color:var(--ink-900);
            margin-bottom:7px;
            font-weight:700;
        }

        .school-address{
            font-size:12.5px;
            color:var(--ink-600);
            margin-bottom:13px;
        }

        .school-footer{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .distance{
            font-size:12px;
            color:var(--gold-500);
            font-weight:700;
            font-family:'JetBrains Mono',monospace;
        }

        .detail-btn{
            background:#f0f4f9;
            color:var(--navy-900);
            padding:9px 15px;
            border-radius:10px;
            text-decoration:none;
            font-size:12px;
            font-weight:700;
            transition:background 0.15s ease, color 0.15s ease;
        }

        .detail-btn:hover{
            background:var(--navy-900);
            color:white;
        }

        /* ============================================
           MAP
        ============================================ */

        .map-container{
            flex:1;
            position:relative;
        }

        #map{
            width:100%;
            height:100%;
        }

        /* ============================================
           LEGEND
        ============================================ */

        .legend{
            position:absolute;
            top:20px;
            right:20px;
            background:rgba(255,255,255,0.97);
            padding:18px;
            border-radius:16px;
            z-index:999;
            box-shadow:0 10px 25px rgba(14,42,71,0.10);
            width:170px;
            border:1px solid var(--line);
        }

        .legend h4{
            font-family:'JetBrains Mono',monospace;
            font-size:10.5px;
            letter-spacing:0.8px;
            text-transform:uppercase;
            margin-bottom:13px;
            color:var(--ink-400);
            font-weight:700;
        }

        .legend-item{
            display:flex;
            align-items:center;
            gap:10px;
            margin-bottom:10px;
            font-size:13px;
            color:var(--ink-900);
            font-weight:600;
        }

        .legend-item:last-child{
            margin-bottom:0;
        }

        .legend-color{
            width:12px;
            height:12px;
            border-radius:50%;
        }

        @media(max-width:768px){

            body{
                overflow:auto;
            }

            .app-container{
                flex-direction:column;
            }

            .sidebar{
                width:100%;
                height:50vh;
            }

            .map-container{
                height:50vh;
            }

        }

    </style>

</head>

<body>

<div class="app-container">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="sidebar-inner">

            <!-- HEADER -->

            <div class="sidebar-header">

                <div class="brand">

                    <div class="logo">

                        <i class="fa-solid fa-map-location-dot"></i>

                    </div>

                    <h1>

                        Geo<span>School</span>

                    </h1>

                </div>

                <?php

                $backUrl = $_GET['from'] ?? '';

                if($backUrl == 'data-sekolah'){

                    $backLink = base_url('data-sekolah');

                }else{

                    $backLink = base_url('/');

                }

                ?>

                <a href="<?= $backLink; ?>"
                class="back-btn">

                    Kembali

                </a>

            </div>

            <!-- SEARCH -->

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text"
                id="searchInput"
                placeholder="Cari sekolah...">

            </div>

            <!-- FILTER -->

            <div class="filter-group">

                <div class="filter-chip active">TK</div>

                <div class="filter-chip active">SD</div>

                <div class="filter-chip active">SMP</div>

            </div>

            <!-- STATS -->

            <div class="stats-grid">

                <div class="stat-card">

                    <div class="stat-icon">

                        <i class="fa-solid fa-school"></i>

                    </div>

                    <div class="stat-number"
                    id="totalCount">

                        0

                    </div>

                    <div class="stat-label">

                        Total

                    </div>

                </div>

                <div class="stat-card">

                    <div class="stat-icon">

                        <i class="fa-solid fa-map-location-dot"></i>

                    </div>

                    <div class="stat-number"
                    id="kecamatanCount">

                        0

                    </div>

                    <div class="stat-label">

                        Kecamatan

                    </div>

                </div>

                <div class="stat-card">

                    <div class="stat-icon">

                        <i class="fa-solid fa-layer-group"></i>

                    </div>

                    <div class="stat-number"
                    id="jenjangCount">

                        0

                    </div>

                    <div class="stat-label">

                        Jenjang

                    </div>

                </div>

                <div class="stat-card">

                    <div class="stat-icon">

                        <i class="fa-solid fa-location-crosshairs"></i>

                    </div>

                    <div class="stat-number">

                        Aktif

                    </div>

                    <div class="stat-label">

                        Peta

                    </div>

                </div>

            </div>

            <!-- LIST SEKOLAH -->

            <div class="school-list"
            id="schoolList">

            </div>

        </div>

    </aside>

    <!-- MAP -->

    <div class="map-container">

        <div id="map"></div>

        <!-- LEGEND -->

        <div class="legend">

            <h4>

                Legenda

            </h4>

            <div class="legend-item">

                <div class="legend-color"
                style="background:#5b6b7c;"></div>

                TK

            </div>

            <div class="legend-item">

                <div class="legend-color"
                style="background:#0e2a47;"></div>

                SD

            </div>

            <div class="legend-item">

                <div class="legend-color"
                style="background:#c08a28;"></div>

                SMP

            </div>

        </div>

    </div>

</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

    const sekolah =
    <?= json_encode($sekolah); ?>;

    // ============================================
    // MAP
    // ============================================

    const lat = <?= $_GET['lat'] ?? '-0.947083'; ?>;
    const lng = <?= $_GET['lng'] ?? '100.417181'; ?>;
    const namaSekolah = "<?= $_GET['nama'] ?? 'Lokasi Sekolah'; ?>";

    const map = L.map('map').setView(
        [lat, lng],
        16
    );

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:'© OpenStreetMap'
        }
    ).addTo(map);

    // ============================================
    // COLOR
    // ============================================

    function getColor(jenjang){

        if(jenjang === 'TK') return '#5b6b7c';

        if(jenjang === 'SMP') return '#c08a28';

        return '#0e2a47';
    }

    // ============================================
    // ARRAY MARKER
    // ============================================

    let markers = [];

    // ============================================
    // CARD + MARKER
    // ============================================

    let html = '';

    sekolah.forEach(function(s){

        const color =
        getColor(s.jenjang);

        // MARKER

        const marker =
        L.circleMarker(
            [s.latitude,s.longitude],
            {
                radius:10,
                fillColor:color,
                color:'#fff',
                weight:3,
                fillOpacity:1
            }
        ).addTo(map);

        marker.bindPopup(`

            <b>${s.nama_sekolah}</b>

            <br>

            ${s.kecamatan}

        `);
        if (
    parseFloat(s.latitude) == parseFloat(lat) &&
    parseFloat(s.longitude) == parseFloat(lng)
) {

    marker.openPopup();

    map.flyTo(
        [s.latitude, s.longitude],
        17,
        {
            duration: 2
        }
    );

}

        // SIMPAN MARKER

        markers.push({
            id:s.id,
            nama:s.nama_sekolah.toLowerCase(),
            marker:marker,
            lat:s.latitude,
            lng:s.longitude
        });

        // CARD

        html += `

            <div class="school-card"
            data-id="${s.id}">

                <div class="school-cover">

                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop">

                    <div class="school-badge"
                    style="background:${color};">

                        ${s.jenjang}

                    </div>

                </div>

                <div class="school-content">

                    <h3>

                        ${s.nama_sekolah}

                    </h3>

                    <div class="school-address">

                        ${s.kecamatan}

                    </div>

                    <div class="school-footer">

                        <div class="distance">

                            <i class="fa-solid fa-location-dot"></i>

                            ${s.latitude}

                        </div>

                        <a href="<?= base_url('detail-sekolah'); ?>/${s.id}?from=detail-peta"
                        class="detail-btn">

                            Detail

                        </a>

                    </div>

                </div>

            </div>

        `;

    });

    document.getElementById('schoolList').innerHTML =
    html;

    // ============================================
    // STATS
    // ============================================

    document.getElementById('totalCount').innerHTML =
    sekolah.length;

    const kecamatan =
    [...new Set(sekolah.map(s => s.kecamatan))];

    document.getElementById('kecamatanCount').innerHTML =
    kecamatan.length;

    const jenjang =
    [...new Set(sekolah.map(s => s.jenjang))];

    document.getElementById('jenjangCount').innerHTML =
    jenjang.length;

    // ============================================
    // SEARCH + FOCUS MARKER
    // ============================================

    const searchInput =
    document.getElementById('searchInput');

    searchInput.addEventListener('keyup', function(){

        const keyword =
        this.value.toLowerCase();

        const cards =
        document.querySelectorAll('.school-card');

        let ditemukan = false;

        // FILTER CARD

        cards.forEach(function(card){

            const text =
            card.innerText.toLowerCase();

            if(text.includes(keyword)){

                card.style.display = 'block';

            }else{

                card.style.display = 'none';

            }

        });

        // FOKUS MARKER

        markers.forEach(function(m){

            if(
                m.nama.includes(keyword)
                &&
                !ditemukan
            ){

                ditemukan = true;

                map.flyTo(
                    [m.lat,m.lng],
                    16,
                    {
                        duration:1.5
                    }
                );

                m.marker.openPopup();

            }

        });

    });

</script>

</body>

</html>