<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

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
        --surface:#ffffff;
    }

    .main-content{
        background:#f5f7fa;
        min-height:100vh;
        padding:24px;
        margin-left:280px;
        font-family:'Plus Jakarta Sans',sans-serif;
        color:var(--ink-900);
    }

    .map-wrapper{
        position:relative;
        width:100%;
        height:calc(100vh - 48px);
        border-radius:22px;
        overflow:hidden;
        border:1px solid var(--line);
        box-shadow:0 15px 40px rgba(14,42,71,0.10);
    }

    /* TOP CONTROL */

    .top-control{
        position:absolute;
        top:18px;
        left:18px;
        right:18px;
        z-index:999;
        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;
        gap:14px;
    }

    .left-control{
        display:flex;
        align-items:center;
        gap:12px;
        flex-wrap:wrap;
    }

    .search-box{
        width:320px;
        background:rgba(255,255,255,0.96);
        backdrop-filter:blur(12px);
        border-radius:14px;
        padding:0 16px;
        display:flex;
        align-items:center;
        gap:11px;
        box-shadow:0 10px 25px rgba(14,42,71,0.12);
        border:1px solid rgba(14,42,71,0.06);
    }

    .search-box i{
        color:var(--ink-400);
        font-size:13px;
        flex-shrink:0;
    }

    .search-box input{
        width:100%;
        padding:14px 0;
        border:none;
        outline:none;
        background:transparent;
        font-size:13.5px;
        font-family:inherit;
        color:var(--ink-900);
    }

    .search-box input::placeholder{
        color:var(--ink-400);
    }

    .right-control{
        display:flex;
        align-items:center;
        gap:12px;
        flex-wrap:wrap;
    }

    .filter-select{
        background:rgba(255,255,255,0.96);
        backdrop-filter:blur(12px);
        border:1px solid rgba(14,42,71,0.06);
        padding:14px 16px;
        border-radius:14px;
        font-size:13px;
        font-family:inherit;
        color:var(--ink-900);
        outline:none;
        box-shadow:0 10px 25px rgba(14,42,71,0.12);
        cursor:pointer;
        min-width:200px;
        font-weight:600;
    }

    .apply-btn{
        background:var(--navy-900);
        color:white;
        border:none;
        padding:14px 24px;
        border-radius:14px;
        font-size:13px;
        font-weight:700;
        font-family:inherit;
        cursor:pointer;
        box-shadow:0 10px 25px rgba(14,42,71,0.28);
        transition:background 0.15s ease;
    }

    .apply-btn:hover{
        background:var(--navy-800);
    }

    .map-title{
        position:absolute;
        top:88px;
        left:50%;
        transform:translateX(-50%);
        z-index:999;
        background:rgba(14,42,71,0.90);
        backdrop-filter:blur(12px);
        color:#fff;
        padding:11px 22px;
        border-radius:40px;
        font-size:12.5px;
        font-weight:700;
        letter-spacing:0.3px;
        box-shadow:0 10px 25px rgba(14,42,71,0.20);
        display:flex;
        align-items:center;
        gap:9px;
        white-space:nowrap;
    }

    .map-title::before{
        content:'';
        width:6px;
        height:6px;
        border-radius:50%;
        background:var(--gold-400);
    }

    #map{
        width:100%;
        height:100%;
    }

    .map-legend{
        position:absolute;
        bottom:22px;
        left:18px;
        z-index:999;
        width:200px;
        background:rgba(255,255,255,0.97);
        backdrop-filter:blur(12px);
        border-radius:18px;
        padding:18px;
        box-shadow:0 10px 30px rgba(14,42,71,0.14);
        border:1px solid rgba(14,42,71,0.06);
    }

    .map-legend h4{
        font-family:'JetBrains Mono',monospace;
        font-size:10.5px;
        letter-spacing:0.8px;
        text-transform:uppercase;
        margin-bottom:16px;
        color:var(--ink-400);
        font-weight:700;
    }

    .legend-item{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:13px;
        font-size:13px;
        color:var(--ink-900);
        font-weight:600;
    }

    .legend-item:last-child{
        margin-bottom:0;
    }

    .legend-left{
        display:flex;
        align-items:center;
        gap:10px;
    }

    .dot{
        width:10px;
        height:10px;
        border-radius:50%;
    }

    .blue{
        background:var(--navy-900);
    }

    .green{
        background:var(--gold-500);
    }

    .red{
        background:#5b6b7c;
    }

    .popup-card{
        width:230px;
    }

    .popup-badge{
        display:inline-block;
        background:#f0f4f9;
        color:var(--navy-900);
        padding:6px 12px;
        border-radius:30px;
        font-size:10.5px;
        font-weight:700;
        margin-bottom:11px;
    }

    .popup-title{
        font-size:16px;
        font-weight:800;
        color:var(--navy-900);
        margin-bottom:9px;
    }

    .popup-address{
        font-size:12.5px;
        line-height:1.7;
        color:var(--ink-600);
        margin-bottom:13px;
    }

    .popup-detail{
        font-size:12.5px;
        margin-bottom:7px;
        color:var(--ink-900);
    }

    .popup-btn{
        display:block;
        margin-top:14px;
        background:var(--navy-900);
        color:#ffffff !important;
        text-align:center;
        padding:11px;
        border-radius:10px;
        text-decoration:none;
        font-size:12.5px;
        font-weight:700;
    }

    @media(max-width:992px){

        .main-content{
            margin-left:0;
            padding:88px 16px 16px;
        }

        .map-wrapper{
            height:calc(100vh - 104px);
        }

    }

    @media(max-width:768px){

        .top-control{
            flex-direction:column;
            align-items:stretch;
        }

        .search-box, .right-control{
            width:100%;
        }

        .filter-select{
            flex:1;
        }

        .map-title{
            top:210px;
            font-size:11px;
            text-align:center;
        }

    }

</style>

<div class="main-content">

    <div class="map-wrapper">

        <!-- TOP CONTROL -->

        <div class="top-control">

            <div class="left-control">

                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="text"
                    id="searchSekolah"
                    placeholder="Cari nama sekolah...">

                </div>

            </div>

            <div class="right-control">

                <!-- FILTER KECAMATAN -->

                <select class="filter-select"
                id="filterKecamatan">

                    <option value="">
                        Kecamatan: Semua
                    </option>

                    <option value="Lintau Buo">
                        Kecamatan: Lintau Buo
                    </option>

                    <option value="Padang Ganting">
                        Kecamatan: Padang Ganting
                    </option>

                    <option value="Tanjung Emas">
                        Kecamatan: Tanjung Emas
                    </option>

                </select>

                <!-- FILTER JENJANG -->

                <select class="filter-select"
                id="filterJenjang">

                    <option value="">
                        Tingkat: Semua
                    </option>

                    <option value="TK">
                        TK
                    </option>

                    <option value="SD">
                        SD
                    </option>

                    <option value="SMP">
                        SMP
                    </option>

                </select>

                <!-- BUTTON -->

                <button class="apply-btn"
                onclick="filterSekolah()">

                    Terapkan

                </button>

            </div>

        </div>

        <!-- TITLE -->

        <div class="map-title">

            Sistem Informasi Sekolah Aktif

        </div>

        <!-- MAP -->

        <div id="map"></div>

        <!-- LEGEND -->

        <div class="map-legend">

            <h4>
                Legenda Peta
            </h4>

            <div class="legend-item">

                <div class="legend-left">

                    <div class="dot blue"></div>

                    SD

                </div>

                <span>
                    <?= $totalSD ?? 0; ?>
                </span>

            </div>

            <div class="legend-item">

                <div class="legend-left">

                    <div class="dot green"></div>

                    SMP

                </div>

                <span>
                    <?= $totalSMP ?? 0; ?>
                </span>

            </div>

            <div class="legend-item">

                <div class="legend-left">

                    <div class="dot red"></div>

                    TK

                </div>

                <span>
                    <?= $totalTK ?? 0; ?>
                </span>

            </div>

        </div>

    </div>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

    // INIT MAP

    var map = L.map('map').setView(
        [-0.947083, 100.417181],
        8
    );

    // MAP STYLE

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:'© OpenStreetMap'
        }
    ).addTo(map);

    // ARRAY MARKER

    var semuaMarker = [];

    <?php foreach($sekolah as $s): ?>

        <?php

            $color = 'blue';

            if($s['jenjang'] == 'TK'){
                $color = 'red';
            }

            if($s['jenjang'] == 'SMP'){
                $color = 'green';
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

        var marker<?= $s['id']; ?> = L.marker([
            <?= $s['latitude']; ?>,
            <?= $s['longitude']; ?>
        ],{
            icon:icon<?= $s['id']; ?>
        });

        marker<?= $s['id']; ?>.nama =
        "<?= strtolower($s['nama_sekolah']); ?>";

        marker<?= $s['id']; ?>.kecamatan =
        "<?= $s['kecamatan']; ?>";

        marker<?= $s['id']; ?>.jenjang =
        "<?= $s['jenjang']; ?>";

        marker<?= $s['id']; ?>.addTo(map);

        marker<?= $s['id']; ?>.bindPopup(`

            <div class="popup-card">

                <div class="popup-badge">

                    <?= $s['jenjang']; ?>

                </div>

                <div class="popup-title">

                    <?= $s['nama_sekolah']; ?>

                </div>

                <div class="popup-address">

                    <?= $s['alamat']; ?>

                </div>

                <div class="popup-detail">

                    <b>Kecamatan:</b>
                    <?= $s['kecamatan']; ?>

                </div>

                <div class="popup-detail">

                    <b>Koordinat:</b>
                    <?= $s['latitude']; ?>,
                    <?= $s['longitude']; ?>

                </div>

                <?php if($s['website'] != '') : ?>

                    <a href="<?= base_url('public-website?id='.$s['id']); ?>"
                    class="popup-btn">

                        Website Sekolah

                    </a>

                <?php endif; ?>

            </div>

        `);

        semuaMarker.push(marker<?= $s['id']; ?>);

    <?php endforeach; ?>

    // FILTER

    function filterSekolah(){

        var keyword =
        document.getElementById('searchSekolah')
        .value.toLowerCase();

        var kecamatan =
        document.getElementById('filterKecamatan')
        .value;

        var jenjang =
        document.getElementById('filterJenjang')
        .value;

        semuaMarker.forEach(function(marker){

            map.removeLayer(marker);

            var cocok = true;

            // SEARCH

            if(
                keyword != '' &&
                !marker.nama.includes(keyword)
            ){
                cocok = false;
            }

            // FILTER KECAMATAN

            if(
                kecamatan != '' &&
                marker.kecamatan != kecamatan
            ){
                cocok = false;
            }

            // FILTER JENJANG

            if(
                jenjang != '' &&
                marker.jenjang != jenjang
            ){
                cocok = false;
            }

            // TAMPILKAN

            if(cocok){

                map.addLayer(marker);

            }

        });

    }

</script>

<?= $this->include('layouts/footer'); ?>