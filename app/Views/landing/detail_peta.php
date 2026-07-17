<?= $this->include('layouts/header'); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>GeoSchool Pro — Peta Interaktif</title>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>

    <style>
        /* ============================================================
           ROOT — NAVY + GOLD
           ============================================================ */
        :root {
            --navy: #0a1628;
            --navy-light: #13203a;
            --gold: #d4a02b;
            --gold-glow: rgba(212, 160, 43, 0.3);
            --white: #ffffff;
            --white-soft: #f8f9fc;
            --grey-light: #eef2f7;
            --text-muted: #8a9bb5;
            --radius-lg: 20px;
            --radius-full: 9999px;
            --transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--white-soft);
            color: #0a1628;
        }

        body.dark-theme {
            --white-soft: #0a1628;
            --grey-light: #13203a;
            color: #f1f5f9;
        }
        body.dark-theme .leaflet-tile {
            filter: brightness(0.6) invert(1) contrast(3) hue-rotate(200deg) saturate(0.3);
        }

        .app-container {
            display: flex;
            width: 100vw;
            height: 100vh;
            position: relative;
            background: var(--white-soft);
            overflow: hidden;
        }

        /* ============================================================
           SIDEBAR
           ============================================================ */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 420px;
            height: 100vh;
            background: var(--navy);
            color: #fff;
            z-index: 2000;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 30px rgba(0,0,0,0.3);
            transform: translateX(-100%);
            transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1);
            overflow: hidden;
        }
        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 20px 24px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            background: var(--navy-light);
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .brand .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy);
            font-size: 18px;
        }
        .brand h1 {
            font-size: 18px;
            font-weight: 800;
            color: #fff;
        }
        .brand h1 span { color: var(--gold); }

        .sidebar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-home {
            background: rgba(255,255,255,0.08);
            border: none;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 13px;
            color: rgba(255,255,255,0.7);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }
        .btn-home:hover {
            background: var(--gold);
            color: var(--navy);
        }
        .btn-close-sidebar {
            background: rgba(255,255,255,0.08);
            border: none;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 13px;
            color: rgba(255,255,255,0.7);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .btn-close-sidebar:hover {
            background: rgba(255,255,255,0.15);
            color: #fff;
        }

        /* Search */
        .search-wrapper { padding: 14px 24px; flex-shrink: 0; }
        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: var(--radius-full);
            padding: 0 16px;
            transition: var(--transition);
        }
        .search-box:focus-within {
            border-color: var(--gold);
            background: rgba(255,255,255,0.12);
            box-shadow: 0 0 0 3px var(--gold-glow);
        }
        .search-box input {
            width: 100%;
            padding: 12px 0;
            border: none;
            outline: none;
            background: transparent;
            font-size: 14px;
            color: #fff;
            font-family: inherit;
        }
        .search-box input::placeholder { color: rgba(255,255,255,0.4); }
        .search-box i { color: rgba(255,255,255,0.3); }
        .voice-btn {
            background: none;
            border: none;
            color: var(--gold);
            font-size: 17px;
            cursor: pointer;
            padding: 4px;
        }
        .voice-btn.listening { color: #ef4444; animation: pulse-voice 0.8s infinite alternate; }
        @keyframes pulse-voice {
            0% { transform: scale(0.9); opacity: 0.7; }
            100% { transform: scale(1.2); opacity: 1; }
        }

        /* Vehicle */
        .vehicle-selector {
            padding: 0 24px 10px;
            display: flex;
            gap: 6px;
            flex-shrink: 0;
            flex-wrap: wrap;
        }
        .vehicle-btn {
            flex: 1;
            min-width: 60px;
            padding: 6px 10px;
            border-radius: var(--radius-full);
            border: 1px solid rgba(255,255,255,0.08);
            background: rgba(255,255,255,0.04);
            font-weight: 600;
            font-size: 12px;
            color: rgba(255,255,255,0.5);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }
        .vehicle-btn.active {
            background: var(--gold);
            color: var(--navy);
            border-color: var(--gold);
        }

        /* Filter */
        .filter-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: rgba(255,255,255,0.3);
            padding: 0 24px 4px;
            margin-top: 2px;
        }
        .filter-group {
            padding: 0 24px 8px;
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
            flex-shrink: 0;
        }
        .filter-chip {
            padding: 5px 12px;
            border-radius: var(--radius-full);
            border: 1px solid rgba(255,255,255,0.06);
            background: rgba(255,255,255,0.04);
            font-weight: 600;
            font-size: 11px;
            color: rgba(255,255,255,0.4);
            cursor: pointer;
            transition: var(--transition);
        }
        .filter-chip.active {
            background: var(--gold);
            color: var(--navy);
            border-color: var(--gold);
        }
        .filter-chip.kecamatan-chip.active {
            background: #2d8a5e;
            border-color: #2d8a5e;
            color: #fff;
        }
        .filter-chip:hover:not(.active) {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        /* School list */
        .school-list-wrapper {
            flex: 1;
            overflow-y: auto;
            padding: 0 24px 20px;
        }
        .school-list-wrapper::-webkit-scrollbar { width: 3px; }
        .school-list-wrapper::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 4px; }

        .school-card {
            background: rgba(255,255,255,0.92);
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: var(--transition);
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .school-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.10);
            border-color: var(--gold);
        }
        .school-card .card-cover {
            height: 100px;
            background: var(--grey-light);
            position: relative;
            overflow: hidden;
        }
        .school-card .card-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .school-card .card-cover .jenjang-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background: var(--navy);
            color: var(--gold);
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 700;
            border: 1px solid rgba(212,160,43,0.3);
        }
        .school-card .card-body {
            padding: 14px 16px 16px;
            color: #0a1628;
        }
        .school-card .card-body h3 {
            font-size: 14px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 2px;
        }
        .school-card .card-body .kecamatan {
            font-size: 11px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 8px;
        }
        .school-card .card-body .kecamatan i { color: var(--gold); }
        .school-card .card-body .distance-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 12px;
        }
        .school-card .card-body .distance-value {
            font-weight: 700;
            color: var(--gold);
        }
        .school-card .card-body .action-buttons {
            display: flex;
            gap: 6px;
        }
        .school-card .card-body .action-buttons button {
            flex: 1;
            padding: 7px 10px;
            border: none;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 11px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }
        .btn-detail {
            background: var(--grey-light);
            color: #475569;
        }
        .btn-detail:hover {
            background: var(--navy);
            color: #fff;
        }
        .btn-navigate {
            background: var(--navy);
            color: #fff;
        }
        .btn-navigate:hover {
            background: var(--gold);
            color: var(--navy);
        }

        /* ============================================================
           HAMBURGER BUTTON — selalu tampil
           ============================================================ */
        .hamburger-btn {
            position: fixed;
            left: 16px;
            top: 16px;
            z-index: 3000;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--navy);
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 4px 16px rgba(0,0,0,0.2);
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }
        .hamburger-btn:hover {
            background: var(--gold);
            color: var(--navy);
            transform: scale(1.05);
        }
        .hamburger-btn.open {
            left: 436px;
            background: #ef4444;
            color: #fff;
        }

        /* ============================================================
           MAP
           ============================================================ */
        .map-container {
            flex: 1;
            position: relative;
            height: 100vh;
            width: 100%;
        }
        #map {
            width: 100%;
            height: 100%;
        }

        .floating-controls {
            position: absolute;
            right: 16px;
            top: 80px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .float-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--navy);
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
            color: rgba(255,255,255,0.7);
            font-size: 17px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .float-btn:hover {
            background: var(--gold);
            color: var(--navy);
            transform: scale(1.05);
        }

        /* ============================================================
           DIRECTIONS PANEL
           ============================================================ */
        .directions-panel {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 380px;
            max-width: 90vw;
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            z-index: 1500;
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.22,1,0.36,1), opacity 0.3s;
            transform: translateX(-120%);
            opacity: 0;
            pointer-events: none;
        }
        .directions-panel.open {
            transform: translateX(0);
            opacity: 1;
            pointer-events: auto;
        }

        .panel-header {
            background: var(--navy);
            color: #fff;
            padding: 18px 22px;
        }
        .panel-header .top-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .panel-header .eta {
            font-size: 24px;
            font-weight: 800;
            color: var(--gold);
        }
        .panel-header .dist { font-size: 12px; opacity: 0.7; }
        .panel-header .voice-controls {
            display: flex;
            gap: 6px;
        }
        .panel-header .voice-controls button {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: none;
            background: rgba(255,255,255,0.08);
            color: #fff;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
        .panel-header .voice-controls button.active-voice {
            background: var(--gold);
            color: var(--navy);
        }
        .next-step {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .next-step i { font-size: 22px; color: var(--gold); }
        .next-step .instruction { font-size: 13px; font-weight: 600; }

        .simulation-bar {
            background: var(--white-soft);
            padding: 8px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0,0,0,0.04);
        }
        .simulation-bar .btn-sim {
            padding: 5px 14px;
            border-radius: var(--radius-full);
            border: none;
            font-weight: 700;
            font-size: 11px;
            cursor: pointer;
            background: var(--navy);
            color: #fff;
            transition: var(--transition);
        }
        .simulation-bar .btn-sim.danger { background: #ef4444; }
        .simulation-bar .btn-sim:hover { opacity: 0.8; transform: scale(1.02); }
        .speed-badge {
            background: var(--grey-light);
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
            color: #475569;
            cursor: pointer;
            transition: var(--transition);
        }
        .speed-badge:hover { background: var(--gold); color: var(--navy); }

        .directions-steps {
            max-height: 200px;
            overflow-y: auto;
            background: var(--white);
        }
        .step-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-bottom: 1px solid rgba(0,0,0,0.04);
            transition: var(--transition);
            font-size: 13px;
        }
        .step-item.active {
            background: var(--navy);
            color: #fff;
            border-left: 3px solid var(--gold);
        }
        .step-item .step-icon { width: 24px; text-align: center; }
        .step-item .step-text { flex: 1; }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 992px) {
            .sidebar { width: 360px; }
            .hamburger-btn.open { left: 376px; }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: 100vh;
                border-radius: 0;
                transform: translateX(-100%);
            }
            .sidebar.open { transform: translateX(0); }

            .hamburger-btn {
                left: 12px;
                top: 12px;
                width: 42px;
                height: 42px;
                font-size: 18px;
            }
            .hamburger-btn.open {
                left: auto;
                right: 12px;
            }

            .floating-controls {
                right: 10px;
                top: 70px;
            }
            .float-btn { width: 40px; height: 40px; font-size: 15px; }

            .directions-panel {
                top: auto;
                bottom: 0;
                left: 0;
                width: 100%;
                max-width: 100%;
                border-radius: var(--radius-lg) var(--radius-lg) 0 0;
                transform: translateY(120%);
            }
            .directions-panel.open { transform: translateY(0); }

            .school-card .card-cover { height: 90px; }
            .sidebar-header { padding: 14px 18px; }
            .brand h1 { font-size: 16px; }
            .search-wrapper { padding: 10px 18px; }
            .vehicle-selector { padding: 0 18px 8px; }
            .filter-group { padding: 0 18px 6px; }
            .filter-label { padding: 0 18px 3px; }
            .school-list-wrapper { padding: 0 18px 14px; }
            .btn-close-sidebar, .btn-home { font-size: 12px; padding: 4px 10px; }
        }

        @media (max-width: 480px) {
            .brand .logo-icon { width: 34px; height: 34px; font-size: 15px; }
            .brand h1 { font-size: 15px; }
            .search-box input { font-size: 13px; padding: 10px 0; }
            .vehicle-btn { font-size: 11px; padding: 5px 8px; }
            .filter-chip { font-size: 10px; padding: 4px 10px; }
            .school-card .card-body { padding: 12px 14px; }
            .school-card .card-body h3 { font-size: 13px; }
            .school-card .card-body .action-buttons button { font-size: 10px; padding: 6px 8px; }
            .panel-header { padding: 14px 16px; }
            .panel-header .eta { font-size: 20px; }
            .directions-panel { width: 100%; left: 0; }
        }
    </style>
</head>

<body>

<div class="app-container">

    <!-- HAMBURGER BUTTON (selalu tampil) -->
    <button class="hamburger-btn" id="hamburgerBtn" aria-label="Toggle sidebar">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- ============================================================
    SIDEBAR
    ============================================================ -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <h1>Geo<span>School</span></h1>
            </div>
            <div class="sidebar-actions">
                <a href="<?= base_url('/'); ?>" class="btn-home" title="Kembali ke Beranda">
                    <i class="fa-solid fa-house"></i> Beranda
                </a>
                <button class="btn-close-sidebar" id="closeSidebarBtn">
                    <i class="fa-solid fa-xmark"></i> Tutup
                </button>
            </div>
        </div>

        <!-- Search -->
        <div class="search-wrapper">
            <div class="search-box">
                <i class="fa-solid fa-search"></i>
                <input type="text" id="searchInput" placeholder="Cari sekolah, kecamatan...">
                <button class="voice-btn" id="voiceBtn"><i class="fa-solid fa-microphone"></i></button>
            </div>
        </div>

        <!-- Vehicle -->
        <div class="vehicle-selector">
            <button class="vehicle-btn active" data-vehicle="car"><i class="fa-solid fa-car"></i> Mobil</button>
            <button class="vehicle-btn" data-vehicle="motorcycle"><i class="fa-solid fa-motorcycle"></i> Motor</button>
            <button class="vehicle-btn" data-vehicle="foot"><i class="fa-solid fa-person-walking"></i> Jalan</button>
        </div>

        <!-- Filter Jenjang -->
        <div class="filter-label"><i class="fa-solid fa-layer-group"></i> Jenjang</div>
        <div class="filter-group">
            <div class="filter-chip active" data-jenjang="all">Semua</div>
            <div class="filter-chip" data-jenjang="TK">TK</div>
            <div class="filter-chip" data-jenjang="SD">SD</div>
            <div class="filter-chip" data-jenjang="SMP">SMP</div>
        </div>

        <!-- Filter Kecamatan -->
        <div class="filter-label" style="margin-top:2px;"><i class="fa-solid fa-map-pin"></i> Kecamatan</div>
        <div class="filter-group">
            <div class="filter-chip kecamatan-chip active" data-kecamatan="all">Semua</div>
            <div class="filter-chip kecamatan-chip" data-kecamatan="Lintau Buo">Lintau Buo</div>
            <div class="filter-chip kecamatan-chip" data-kecamatan="Padang Ganting">Padang Ganting</div>
            <div class="filter-chip kecamatan-chip" data-kecamatan="Tanjung Emas">Tanjung Emas</div>
        </div>

        <!-- School List -->
        <div class="school-list-wrapper">
            <div class="school-list" id="schoolList"></div>
        </div>
    </aside>

    <!-- ============================================================
    MAP
    ============================================================ -->
    <div class="map-container">
        <div id="map"></div>

        <div class="floating-controls">
            <button class="float-btn" id="themeToggle"><i class="fa-solid fa-moon"></i></button>
            <button class="float-btn" id="resetView"><i class="fa-solid fa-earth-asia"></i></button>
            <button class="float-btn" id="locateMe"><i class="fa-solid fa-location-crosshairs"></i></button>
        </div>

        <!-- Directions Panel -->
        <div class="directions-panel" id="directionsPanel">
            <div class="panel-header">
                <div class="top-row">
                    <div>
                        <div class="eta" id="summaryTime">-- mnt</div>
                        <div class="dist" id="summaryDistance">Menghitung rute...</div>
                    </div>
                    <div class="voice-controls">
                        <button id="voiceToggle" class="active-voice"><i class="fa-solid fa-volume-high"></i></button>
                        <button id="closePanel"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>
                <div class="next-step">
                    <i class="fa-solid fa-radar" id="nextStepIcon"></i>
                    <div class="instruction" id="nextStepText">Menghitung trajektori...</div>
                </div>
            </div>

            <div class="simulation-bar">
                <button class="btn-sim" id="startSim"><i class="fa-solid fa-play"></i> Autopilot</button>
                <button class="btn-sim danger" id="stopSim" style="display:none;"><i class="fa-solid fa-stop"></i> Berhenti</button>
                <div class="speed-badge" id="speedControl">1x</div>
            </div>

            <div class="directions-steps" id="directionsSteps"></div>
        </div>
    </div>
</div>

<!-- ============================================================
SCRIPTS
============================================================ -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

<script>
    // ============================================================
    // DATA
    // ============================================================
    const schools = <?= json_encode($sekolah ?? []); ?>;
    const defaultLat = <?= $_GET['lat'] ?? '-0.947083'; ?>;
    const defaultLng = <?= $_GET['lng'] ?? '100.417181'; ?>;
    const baseUrl = '<?= base_url(); ?>';

    let selectedVehicle = 'car';
    let activeJenjang = 'all';
    let activeKecamatan = 'all';
    let userCoords = null;
    let userMarker = null;
    let routingControl = null;
    let navCoords = [];
    let navSteps = [];
    let activeStepIdx = -1;
    let simTimer = null;
    let simMarker = null;
    let simSpeed = 1;
    let voiceActive = true;
    const synth = window.speechSynthesis;
    const audioCtx = new (window.AudioContext || window.webkitAudioContext)();

    // ============================================================
    // MAP
    // ============================================================
    const map = L.map('map', {
        center: [defaultLat, defaultLng],
        zoom: 14,
        zoomControl: false,
        attributionControl: false
    });
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        maxZoom: 20
    }).addTo(map);

    const clusterGroup = L.markerClusterGroup();
    map.addLayer(clusterGroup);
    let markers = [];

    // ============================================================
    // UTILITY
    // ============================================================
    function playChime() {
        if (!voiceActive) return;
        const osc = audioCtx.createOscillator();
        const gain = audioCtx.createGain();
        osc.connect(gain);
        gain.connect(audioCtx.destination);
        osc.type = 'sine';
        osc.frequency.value = 587.33;
        gain.gain.value = 0.06;
        gain.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.15);
        osc.start();
        osc.stop(audioCtx.currentTime + 0.15);
    }

    function speak(text) {
        if (!voiceActive || !synth) return;
        synth.cancel();
        const voiceBtn = document.getElementById('voiceBtn');
        voiceBtn.classList.add('listening');
        playChime();
        setTimeout(() => {
            const msg = new SpeechSynthesisUtterance(text);
            msg.lang = 'id-ID';
            msg.rate = 0.95;
            msg.pitch = 0.9;
            const voices = synth.getVoices();
            const idVoice = voices.find(v => v.lang.includes('id') && v.name.includes('Google')) || voices.find(v => v.lang.includes('id'));
            if (idVoice) msg.voice = idVoice;
            msg.onend = () => voiceBtn.classList.remove('listening');
            synth.speak(msg);
        }, 200);
    }

    function haversine(lat1, lng1, lat2, lng2) {
        const R = 6371;
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLng = (lng2 - lng1) * Math.PI / 180;
        const a = Math.sin(dLat/2)**2 + Math.cos(lat1*Math.PI/180) * Math.cos(lat2*Math.PI/180) * Math.sin(dLng/2)**2;
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        return R * c;
    }

    function translateStep(step, dest) {
        let t = step.text || '';
        t = t.replace(/Head (north|south|east|west)/gi, (m, d) => `Arahkan ke ${d==='north'?'utara':d==='south'?'selatan':d==='east'?'timur':'barat'}`);
        t = t.replace(/Turn right onto (.*)/gi, 'Belok kanan ke $1');
        t = t.replace(/Turn left onto (.*)/gi, 'Belok kiri ke $1');
        t = t.replace(/Turn slight right/gi, 'Belok kanan tipis');
        t = t.replace(/Turn slight left/gi, 'Belok kiri tipis');
        t = t.replace(/Turn right/gi, 'Belok kanan');
        t = t.replace(/Turn left/gi, 'Belok kiri');
        t = t.replace(/Continue onto (.*)/gi, 'Terus di $1');
        t = t.replace(/Make a U-turn/gi, 'Putar balik');
        t = t.replace(/You have arrived at your destination/gi, `Tiba di ${dest}`);
        t = t.replace(/Destination will be on the (left|right)/gi, (m, side) => `Tujuan di ${side==='left'?'kiri':'kanan'}`);
        return t;
    }

    function getIcon(type) {
        const map = { 'Depart': 'fa-paper-plane', 'Straight': 'fa-arrow-up', 'Right': 'fa-arrow-turn-right', 'Left': 'fa-arrow-turn-left', 'Slight right': 'fa-location-arrow', 'Slight left': 'fa-location-arrow', 'Destination': 'fa-crosshairs' };
        return map[type] || 'fa-arrow-up';
    }

    // ============================================================
    // RENDER
    // ============================================================
    function renderSchools(jenjangFilter = 'all', kecamatanFilter = 'all') {
        clusterGroup.clearLayers();
        markers = [];
        let html = '';

        let filtered = schools;
        if (jenjangFilter !== 'all') filtered = filtered.filter(s => s.jenjang === jenjangFilter);
        if (kecamatanFilter !== 'all') filtered = filtered.filter(s => s.kecamatan === kecamatanFilter);

        filtered.forEach(s => {
            if (!s.latitude || !s.longitude) return;

            const color = s.jenjang === 'TK' ? '#d4a02b' : s.jenjang === 'SD' ? '#2d8a5e' : '#1a2a4a';
            const marker = L.marker([s.latitude, s.longitude], {
                icon: L.divIcon({
                    html: `<div style="background:${color}; width:34px; height:34px; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; border:2px solid #fff; box-shadow:0 4px 12px rgba(0,0,0,0.2);"><i class="fa-solid fa-school" style="font-size:13px;"></i></div>`,
                    className: '', iconSize: [34,34], iconAnchor: [17,17]
                })
            });

            const coverUrl = s.cover ? baseUrl + '/uploads/cover/' + s.cover : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=200&auto=format&fit=crop';
            marker.bindPopup(`
                <div style="max-width:240px; font-family:'Plus Jakarta Sans', sans-serif;">
                    <img src="${coverUrl}" style="width:100%; height:110px; object-fit:cover; border-radius:12px; margin-bottom:8px;">
                    <b style="font-size:15px; color:#0a1628;">${s.nama_sekolah}</b><br>
                    <span style="color:#8a9bb5; font-size:12px;">${s.kecamatan}</span><br>
                    <button onclick="showDetail('${s.id}')" style="margin-top:8px; background:#0a1628; color:#fff; border:none; padding:6px 14px; border-radius:20px; cursor:pointer; font-weight:600;">Detail</button>
                    <button onclick="calculateRoute(${s.latitude}, ${s.longitude}, '${s.nama_sekolah}')" style="margin-top:8px; background:#d4a02b; color:#0a1628; border:none; padding:6px 14px; border-radius:20px; cursor:pointer; font-weight:600;"><i class="fa-solid fa-route"></i> Navigasi</button>
                </div>
            `);

            markers.push({ id: s.id, nama: s.nama_sekolah.toLowerCase(), kec: s.kecamatan.toLowerCase(), jenjang: s.jenjang, marker });
            clusterGroup.addLayer(marker);

            const coverSrc = s.cover ? baseUrl + '/uploads/cover/' + s.cover : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=400&auto=format&fit=crop';
            html += `
                <div class="school-card" data-id="${s.id}" style="opacity:0; transform:translateY(15px);">
                    <div class="card-cover">
                        <img src="${coverSrc}" alt="${s.nama_sekolah}" loading="lazy">
                        <div class="jenjang-badge">${s.jenjang}</div>
                    </div>
                    <div class="card-body">
                        <h3>${s.nama_sekolah}</h3>
                        <div class="kecamatan"><i class="fa-solid fa-location-dot"></i> ${s.kecamatan}</div>
                        <div class="distance-row">
                            <span class="distance-label">Jarak</span>
                            <span class="distance-value" id="dist-${s.id}">--</span>
                        </div>
                        <div class="action-buttons">
                            <button class="btn-detail" onclick="showDetail('${s.id}')"><i class="fa-solid fa-info-circle"></i> Detail</button>
                            <button class="btn-navigate" onclick="calculateRoute(${s.latitude}, ${s.longitude}, '${s.nama_sekolah}')"><i class="fa-solid fa-route"></i> Navigasi</button>
                        </div>
                    </div>
                </div>
            `;
        });

        document.getElementById('schoolList').innerHTML = html;

        gsap.fromTo('.school-card',
            { opacity: 0, y: 15, scale: 0.96 },
            { opacity: 1, y: 0, scale: 1, duration: 0.4, stagger: 0.05, ease: 'power3.out' }
        );

        updateDistances();
    }

    function updateDistances() {
        if (!userCoords) return;
        schools.forEach(s => {
            const dist = haversine(userCoords.lat, userCoords.lng, s.latitude, s.longitude);
            const el = document.getElementById('dist-'+s.id);
            if (el) {
                el.textContent = dist < 1 ? Math.round(dist*1000)+' m' : dist.toFixed(1)+' km';
            }
        });
    }

    function showDetail(id) {
        window.location.href = baseUrl + '/detail-sekolah/' + id;
    }

    // ============================================================
    // ROUTING
    // ============================================================
    function calculateRoute(destLat, destLng, name) {
        if (!userCoords) {
            userCoords = { lat: defaultLat + 0.003, lng: defaultLng - 0.003 };
            drawUserMarker();
        }

        const panel = document.getElementById('directionsPanel');
        panel.classList.add('open');
        document.getElementById('nextStepText').textContent = 'Menghitung rute...';

        if (routingControl) map.removeControl(routingControl);

        let profile = 'car';
        if (selectedVehicle === 'motorcycle') profile = 'bike';
        else if (selectedVehicle === 'foot') profile = 'foot';

        routingControl = L.Routing.control({
            waypoints: [L.latLng(userCoords.lat, userCoords.lng), L.latLng(destLat, destLng)],
            router: L.Routing.osrmv1({ profile: profile }),
            lineOptions: { styles: [{ color: '#d4a02b', weight: 6, opacity: 0.9 }, { color: '#0a1628', weight: 2, opacity: 0.6 }] },
            show: false,
            addWaypoints: false
        }).addTo(map);

        routingControl.on('routesfound', function(e) {
            const route = e.routes[0];
            navCoords = route.coordinates;

            const d = route.summary.totalDistance;
            const t = route.summary.totalTime;
            const distStr = d > 1000 ? (d/1000).toFixed(2)+' km' : Math.round(d)+' m';
            const timeStr = t > 60 ? Math.ceil(t/60)+' menit' : '1 menit';

            document.getElementById('summaryDistance').textContent = `${distStr} • ${name}`;
            document.getElementById('summaryTime').textContent = timeStr;

            navSteps = route.instructions.map(step => ({
                text: translateStep(step, name),
                icon: getIcon(step.type),
                distance: step.distance,
                type: step.type
            }));

            let stepsHtml = '';
            navSteps.forEach((st, idx) => {
                stepsHtml += `
                    <div class="step-item" id="step-${idx}">
                        <div class="step-icon"><i class="fa-solid ${st.icon}"></i></div>
                        <div class="step-text">${st.text}</div>
                        <div class="step-dist">${st.distance > 0 ? Math.round(st.distance)+' m' : ''}</div>
                    </div>
                `;
            });
            document.getElementById('directionsSteps').innerHTML = stepsHtml;
            setActiveStep(0);
            speak(`Rute ke ${name} ditemukan. Jarak ${distStr}.`);
        });
    }

    function setActiveStep(idx) {
        activeStepIdx = idx;
        const step = navSteps[idx];
        if (!step) return;
        document.getElementById('nextStepIcon').className = `fa-solid ${step.icon}`;
        document.getElementById('nextStepText').textContent = step.text;
        document.querySelectorAll('.step-item').forEach((el, i) => {
            el.classList.toggle('active', i === idx);
        });
    }

    // ============================================================
    // AUTOPILOT
    // ============================================================
    document.getElementById('startSim').addEventListener('click', function() {
        if (navCoords.length === 0) return;
        this.style.display = 'none';
        document.getElementById('stopSim').style.display = 'block';

        if (simMarker) map.removeLayer(simMarker);
        let iconHtml = selectedVehicle === 'car' ? '<i class="fa-solid fa-car"></i>' :
                       selectedVehicle === 'motorcycle' ? '<i class="fa-solid fa-motorcycle"></i>' :
                       '<i class="fa-solid fa-person-walking"></i>';
        const icon = L.divIcon({
            html: `<div style="background:#d4a02b; width:30px; height:30px; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#0a1628; border:2px solid #fff; box-shadow:0 4px 12px rgba(0,0,0,0.3); font-size:13px;">${iconHtml}</div>`,
            className: '', iconSize: [30,30], iconAnchor: [15,15]
        });
        simMarker = L.marker(navCoords[0], { icon }).addTo(map);

        let p = 0;
        speak('Autopilot diaktifkan.');
        simTimer = setInterval(() => {
            if (p >= navCoords.length) {
                clearInterval(simTimer);
                this.style.display = 'block';
                document.getElementById('stopSim').style.display = 'none';
                map.removeLayer(simMarker);
                speak('Tiba di tujuan.');
                return;
            }
            const pos = navCoords[p];
            simMarker.setLatLng(pos);
            map.panTo(pos, { animate: true, duration: 0.2 });

            const stepIdx = Math.floor((p / navCoords.length) * navSteps.length);
            if (stepIdx !== activeStepIdx && stepIdx < navSteps.length) {
                setActiveStep(stepIdx);
                const st = navSteps[stepIdx];
                if (st.distance < 200 && st.type !== 'Destination') {
                    map.setZoom(18);
                    speak(`Manuver: ${st.text}`);
                } else {
                    map.setZoom(16);
                    if (st.type !== 'Destination' && st.distance > 0) {
                        speak(`${Math.round(st.distance)} meter lagi, ${st.text}`);
                    }
                }
            }
            p += simSpeed;
        }, 100);
    });

    document.getElementById('stopSim').addEventListener('click', function() {
        clearInterval(simTimer);
        if (simMarker) map.removeLayer(simMarker);
        document.getElementById('startSim').style.display = 'block';
        this.style.display = 'none';
        speak('Autopilot dihentikan.');
    });

    document.getElementById('speedControl').addEventListener('click', function() {
        const speeds = [1,2,4];
        let idx = speeds.indexOf(simSpeed);
        idx = (idx + 1) % speeds.length;
        simSpeed = speeds[idx];
        this.textContent = simSpeed+'x';
    });

    // ============================================================
    // USER LOCATION
    // ============================================================
    function drawUserMarker() {
        if (userMarker) map.removeLayer(userMarker);
        userMarker = L.circleMarker([userCoords.lat, userCoords.lng], {
            radius: 10, color: '#fff', fillColor: '#d4a02b', fillOpacity: 1, weight: 3
        }).addTo(map).bindPopup('Lokasi Anda');
    }

    document.getElementById('locateMe').addEventListener('click', function() {
        speak('Mengaktifkan GPS...');
        navigator.geolocation.getCurrentPosition(pos => {
            userCoords = { lat: pos.coords.latitude, lng: pos.coords.longitude };
            map.flyTo([userCoords.lat, userCoords.lng], 16);
            drawUserMarker();
            updateDistances();
            speak('Lokasi ditemukan.');
        }, () => speak('Gagal mendapatkan lokasi.'));
    });

    // ============================================================
    // VOICE SEARCH
    // ============================================================
    const SpeechRecog = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (SpeechRecog) {
        const recog = new SpeechRecog();
        recog.lang = 'id-ID';
        document.getElementById('voiceBtn').addEventListener('click', function() {
            recog.start();
            this.classList.add('listening');
        });
        recog.onresult = function(e) {
            const text = e.results[0][0].transcript.toLowerCase();
            document.getElementById('searchInput').value = text;
            document.getElementById('voiceBtn').classList.remove('listening');
            const found = markers.filter(m => m.nama.includes(text) || m.kec.includes(text));
            if (found.length > 0) {
                map.flyTo(found[0].marker.getLatLng(), 17);
                found[0].marker.openPopup();
                speak(`Menemukan ${text}`);
            } else speak(`Tidak ditemukan ${text}`);
        };
        recog.onerror = () => document.getElementById('voiceBtn').classList.remove('listening');
    }

    // ============================================================
    // FILTERS
    // ============================================================
    document.querySelectorAll('.filter-chip:not(.kecamatan-chip)').forEach(chip => {
        chip.addEventListener('click', function() {
            document.querySelectorAll('.filter-chip:not(.kecamatan-chip)').forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            activeJenjang = this.dataset.jenjang;
            renderSchools(activeJenjang, activeKecamatan);
            const name = activeJenjang === 'all' ? 'Semua jenjang' :
                        activeJenjang === 'TK' ? 'Taman Kanak-Kanak' :
                        activeJenjang === 'SD' ? 'Sekolah Dasar' : 'Sekolah Menengah Pertama';
            speak(`Menampilkan ${name}`);
        });
    });

    document.querySelectorAll('.kecamatan-chip').forEach(chip => {
        chip.addEventListener('click', function() {
            document.querySelectorAll('.kecamatan-chip').forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            activeKecamatan = this.dataset.kecamatan;
            renderSchools(activeJenjang, activeKecamatan);
            const name = activeKecamatan === 'all' ? 'Semua kecamatan' : `Kecamatan ${activeKecamatan}`;
            speak(`Menampilkan ${name}`);
        });
    });

    // ============================================================
    // SEARCH
    // ============================================================
    document.getElementById('searchInput').addEventListener('input', function() {
        const keyword = this.value.toLowerCase().trim();
        document.querySelectorAll('.school-card').forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            card.style.display = title.includes(keyword) ? 'flex' : 'none';
        });
    });

    // ============================================================
    // VEHICLE
    // ============================================================
    document.querySelectorAll('.vehicle-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.vehicle-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            selectedVehicle = this.dataset.vehicle;
            speak(`Kendaraan ${this.textContent.trim()}`);
        });
    });

    // ============================================================
    // SIDEBAR TOGGLE
    // ============================================================
    const sidebar = document.getElementById('sidebar');
    const hamburgerBtn = document.getElementById('hamburgerBtn');

    function toggleSidebar(open) {
        if (open) {
            sidebar.classList.add('open');
            hamburgerBtn.classList.add('open');
            hamburgerBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        } else {
            sidebar.classList.remove('open');
            hamburgerBtn.classList.remove('open');
            hamburgerBtn.innerHTML = '<i class="fa-solid fa-bars"></i>';
        }
    }

    hamburgerBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        const isOpen = sidebar.classList.contains('open');
        toggleSidebar(!isOpen);
    });

    document.getElementById('closeSidebarBtn').addEventListener('click', function() {
        toggleSidebar(false);
    });

    // Tutup saat klik di luar (mobile)
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            const isSidebar = sidebar.contains(e.target);
            const isHamburger = hamburgerBtn.contains(e.target);
            if (!isSidebar && !isHamburger && sidebar.classList.contains('open')) {
                toggleSidebar(false);
            }
        }
    });

    // ============================================================
    // THEME
    // ============================================================
    document.getElementById('themeToggle').addEventListener('click', function() {
        document.body.classList.toggle('dark-theme');
        const icon = this.querySelector('i');
        icon.className = document.body.classList.contains('dark-theme') ? 'fa-solid fa-sun' : 'fa-solid fa-moon';
        speak(document.body.classList.contains('dark-theme') ? 'Mode gelap' : 'Mode terang');
    });

    // ============================================================
    // PANEL CONTROLS
    // ============================================================
    document.getElementById('voiceToggle').addEventListener('click', function() {
        voiceActive = !voiceActive;
        this.className = voiceActive ? 'active-voice' : '';
        this.innerHTML = voiceActive ? '<i class="fa-solid fa-volume-high"></i>' : '<i class="fa-solid fa-volume-xmark"></i>';
        if (!voiceActive) synth.cancel();
    });

    document.getElementById('closePanel').addEventListener('click', function() {
        document.getElementById('directionsPanel').classList.remove('open');
        if (routingControl) map.removeControl(routingControl);
        clearInterval(simTimer);
        synth.cancel();
    });

    document.getElementById('resetView').addEventListener('click', function() {
        map.setView([defaultLat, defaultLng], 14);
    });

    // ============================================================
    // INIT
    // ============================================================
window.onload = function () {

    renderSchools('all', 'all');

    if (synth) synth.getVoices();

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (pos) {

            userCoords = {
                lat: pos.coords.latitude,
                lng: pos.coords.longitude
            };

            drawUserMarker();
            updateDistances();

            // langsung arahkan ke sekolah
            calculateRoute(
                defaultLat,
                defaultLng,
                "<?= $_GET['nama'] ?? 'Sekolah'; ?>"
            );

        }, function () {

            alert("Lokasi pengguna tidak dapat diakses.");

        });

    }

    if (window.innerWidth > 768) {

        toggleSidebar(true);

    } else {

        toggleSidebar(false);

    }

};
</script>
</body>
</html>