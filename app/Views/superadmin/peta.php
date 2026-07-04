<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>

    .main-content{
        background:#f8fafc;
        min-height:100vh;
        padding:24px;
        margin-left:280px;
    }

    .map-wrapper{
        position:relative;
        width:100%;
        height:100vh;
        border-radius:28px;
        overflow:hidden;
        border:1px solid #e5e7eb;
        box-shadow:0 15px 40px rgba(0,0,0,0.08);
    }

    /* TOP CONTROL */

    .top-control{
        position:absolute;
        top:20px;
        left:20px;
        right:20px;
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
        gap:14px;
        flex-wrap:wrap;
    }

    .search-box{
        width:340px;
        background:rgba(255,255,255,0.96);
        backdrop-filter:blur(12px);
        border-radius:18px;
        padding:15px 18px;
        display:flex;
        align-items:center;
        gap:12px;
        box-shadow:0 10px 25px rgba(0,0,0,0.10);
    }

    .search-box i{
        color:#64748b;
        font-size:14px;
    }

    .search-box input{
        width:100%;
        border:none;
        outline:none;
        background:transparent;
        font-size:14px;
        color:#0f172a;
    }

    .right-control{
        display:flex;
        align-items:center;
        gap:14px;
        flex-wrap:wrap;
    }

    .filter-select{
        background:rgba(255,255,255,0.96);
        backdrop-filter:blur(12px);
        border:none;
        padding:15px 18px;
        border-radius:18px;
        font-size:13px;
        color:#334155;
        outline:none;
        box-shadow:0 10px 25px rgba(0,0,0,0.10);
        cursor:pointer;
        min-width:220px;
        font-weight:500;
    }

    .apply-btn{
        background:#2563eb;
        color:white;
        border:none;
        padding:15px 24px;
        border-radius:18px;
        font-size:13px;
        font-weight:600;
        cursor:pointer;
        box-shadow:0 10px 25px rgba(37,99,235,0.30);
        transition:0.3s;
    }

    .apply-btn:hover{
        background:#1d4ed8;
    }

    .map-title{
        position:absolute;
        top:95px;
        left:50%;
        transform:translateX(-50%);
        z-index:999;
        background:rgba(37,99,235,0.85);
        backdrop-filter:blur(12px);
        color:white;
        padding:12px 24px;
        border-radius:40px;
        font-size:13px;
        font-weight:600;
        box-shadow:0 10px 25px rgba(0,0,0,0.15);
    }

    #map{
        width:100%;
        height:100%;
    }

    .map-legend{
        position:absolute;
        bottom:25px;
        left:20px;
        z-index:999;
        width:210px;
        background:rgba(255,255,255,0.95);
        backdrop-filter:blur(12px);
        border-radius:22px;
        padding:20px;
        box-shadow:0 10px 30px rgba(0,0,0,0.12);
    }

    .map-legend h4{
        font-size:15px;
        margin-bottom:18px;
        color:#0f172a;
    }

    .legend-item{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:14px;
        font-size:13px;
        color:#334155;
    }

    .legend-left{
        display:flex;
        align-items:center;
        gap:10px;
    }

    .dot{
        width:12px;
        height:12px;
        border-radius:50%;
    }

    .blue{
        background:#2563eb;
    }

    .green{
        background:#16a34a;
    }

    .red{
        background:#dc2626;
    }

    .popup-card{
        width:240px;
    }

    .popup-badge{
        display:inline-block;
        background:#dbeafe;
        color:#2563eb;
        padding:6px 12px;
        border-radius:30px;
        font-size:11px;
        font-weight:600;
        margin-bottom:12px;
    }

    .popup-title{
        font-size:18px;
        font-weight:700;
        color:#0f172a;
        margin-bottom:10px;
    }

    .popup-address{
        font-size:13px;
        line-height:1.7;
        color:#64748b;
        margin-bottom:14px;
    }

    .popup-detail{
        font-size:13px;
        margin-bottom:8px;
        color:#334155;
    }

.popup-btn{
    display:block;
    margin-top:15px;
    background:#2563eb;
    color:#ffffff !important;
    text-align:center;
    padding:12px;
    border-radius:12px;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
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