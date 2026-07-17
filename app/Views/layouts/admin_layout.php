<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - GeoSchool GIS</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        /* ============================================
           ROOT VARIABLES
        ============================================ */
        :root {
            --navy-950: #0a1d33;
            --navy-900: #0e2a47;
            --navy-800: #153a5f;
            --gold-500: #c08a28;
            --gold-400: #d6a445;
            --ink-900: #1c2733;
            --ink-600: #54626f;
            --ink-400: #8b97a3;
            --line: #e3e8ee;
            --primary: var(--navy-900);
            --primary-dark: var(--navy-800);
            --primary-light: #eef2f8;
            --primary-50: #f5f7fa;
            --sidebar-width: 260px;
            --sidebar-collapsed: 0px;
            --header-height: 70px;
            --radius: 12px;
            --shadow: 0 1px 3px rgba(14,42,71,0.06);
            --shadow-hover: 0 8px 30px rgba(14,42,71,0.12);
        }

        /* ============================================
           RESET & BASE - FULL SCREEN
        ============================================ */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body {
            height: 100%;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f5f7fa;
            overflow: hidden;
            color: var(--ink-900);
        }

        .mono{
            font-family: 'JetBrains Mono', monospace;
        }

        /* ============================================
           APP WRAPPER - FULL HEIGHT
        ============================================ */
        .app-wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
            width: 100%;
        }

        /* ============================================
           SIDEBAR - FULL HEIGHT
        ============================================ */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--navy-950) 0%, var(--navy-900) 55%, var(--navy-800) 100%);
            z-index: 1050;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            overflow-x: hidden;
            box-shadow: 4px 0 24px rgba(10,29,51,0.18);
            flex-shrink: 0;
        }

        .sidebar::-webkit-scrollbar { width: 3px; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.18); border-radius: 10px; }

        /* Brand */
        .sidebar-brand {
            padding: 18px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.10);
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: var(--header-height);
        }

        .sidebar-brand .brand-icon {
            width: 38px;
            height: 38px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.14);
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: var(--gold-400);
            flex-shrink: 0;
        }

        .sidebar-brand .brand-text {
            color: #fff;
            font-weight: 800;
            font-size: 16px;
            letter-spacing: -0.2px;
            white-space: nowrap;
        }

        .sidebar-brand .brand-text small {
            display: block;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 500;
            font-size: 9.5px;
            color: #93a4b5;
            opacity: 1;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        /* Navigation */
        .sidebar-nav {
            padding: 14px 12px 80px;
            list-style: none;
        }

        .sidebar-nav .nav-item { margin-bottom: 3px; }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            color: #c3d0dd;
            text-decoration: none;
            border-radius: 11px;
            font-size: 13.5px;
            font-weight: 600;
            transition: all 0.15s ease;
            cursor: pointer;
            border: none;
            background: none;
            width: 100%;
            position: relative;
        }

        .sidebar-nav .nav-link:hover {
            background: rgba(255,255,255,0.06);
            color: #fff;
        }

        .sidebar-nav .nav-link.active {
            background: rgba(214,164,69,0.14);
            color: var(--gold-400);
            box-shadow: none;
        }

        .sidebar-nav .nav-link.active::before{
            content:'';
            position:absolute;
            left:-12px;
            top:50%;
            transform:translateY(-50%);
            width:3px;
            height:20px;
            background:var(--gold-400);
            border-radius:0 4px 4px 0;
        }

        .sidebar-nav .nav-link .nav-icon {
            font-size: 16px;
            width: 22px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar-nav .nav-link .nav-text {
            flex: 1;
            white-space: nowrap;
        }

        .sidebar-nav .nav-link .nav-arrow {
            font-size: 11px;
            transition: transform 0.3s ease;
            opacity: 0.6;
        }

        .sidebar-nav .nav-link .nav-arrow.open { transform: rotate(180deg); }

        /* Submenu */
        .sidebar-nav .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        opacity 0.25s ease;
            opacity: 0;
            padding-left: 8px;
            list-style: none;
        }

        .sidebar-nav .submenu.open {
            max-height: 400px;
            opacity: 1;
        }

        .sidebar-nav .submenu .nav-link {
            padding: 8px 14px 8px 46px;
            font-size: 12.5px;
            font-weight: 500;
            color: #93a4b5;
        }

        .sidebar-nav .submenu .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }

        .sidebar-nav .submenu .nav-link.active {
            color: var(--gold-400);
            background: rgba(214,164,69,0.10);
        }

        .sidebar-nav .submenu .nav-link.active::before{
            display:none;
        }

        .sidebar-nav .submenu .nav-link .nav-icon {
            font-size: 13px;
            width: 18px;
        }

        /* Sidebar Footer - Logout */
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 14px 20px;
            border-top: 1px solid rgba(255,255,255,0.10);
            background: rgba(10,29,51,0.35);
        }

        .sidebar-footer .nav-link {
            color: #f5a3a3;
            font-size: 13px;
            font-weight: 600;
        }

        .sidebar-footer .nav-link:hover {
            color: #fff;
            background: rgba(239,68,68,0.14);
        }

        /* ============================================
           MAIN CONTENT - FULL REMAINING SPACE
        ============================================ */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 20px 28px 28px 24px;
            background: #f5f7fa;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-content::-webkit-scrollbar { width: 5px; }
        .main-content::-webkit-scrollbar-track { background: transparent; }
        .main-content::-webkit-scrollbar-thumb { background: #c7d0da; border-radius: 10px; }

        /* ============================================
           TOP HEADER - STICKY
        ============================================ */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 0 16px 0;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--line);
            position: sticky;
            top: 0;
            background: #f5f7fa;
            z-index: 100;
            flex-wrap: wrap;
            gap: 12px;
        }

        .top-header .header-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .top-header .page-title h4 {
            font-weight: 800;
            color: var(--ink-900);
            margin: 0;
            font-size: 18px;
            line-height: 1.2;
            letter-spacing:-0.2px;
        }

        .top-header .page-title small {
            color: var(--ink-600);
            font-size: 12px;
            display: block;
        }

        .top-header .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .top-header .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 14px 5px 10px;
            background: #fff;
            border-radius: 30px;
            box-shadow: var(--shadow);
            border: 1px solid var(--line);
        }

        .top-header .user-info .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--navy-900);
            color: var(--gold-400);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 12px;
            flex-shrink: 0;
        }

        .top-header .user-info .user-name {
            font-size: 12.5px;
            font-weight: 700;
            color: var(--ink-900);
        }

        /* Toggle Button */
        .navbar-toggle {
            display: none;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 10px;
            font-size: 20px;
            color: var(--navy-900);
            padding: 6px 10px;
            cursor: pointer;
            box-shadow: var(--shadow);
        }

        .navbar-toggle:hover {
            background: #f8fafc;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(10,29,51,0.55);
            z-index: 1040;
            backdrop-filter: blur(2px);
        }

        /* ============================================
           PAGE CONTENT - FULL WIDTH
        ============================================ */
        .page-content {
            width: 100%;
            max-width: 100%;
        }

        /* ============================================
           RESPONSIVE - FULL LAYAR
        ============================================ */

        /* Tablet & Mobile */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main-content {
                margin-left: 0;
                padding: 16px 16px 20px 16px;
            }

            .navbar-toggle {
                display: flex !important;
            }

            .top-header .page-title h4 {
                font-size: 16px;
            }
        }

        /* Mobile Small */
        @media (max-width: 576px) {
            .main-content {
                padding: 12px 10px 16px 10px;
            }

            .top-header {
                padding-bottom: 12px;
                margin-bottom: 16px;
            }

            .top-header .header-left {
                flex: 1;
                min-width: 0;
            }

            .top-header .page-title h4 {
                font-size: 14px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .top-header .page-title small {
                font-size: 10px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .top-header .user-info .user-name {
                font-size: 11px;
                display: none;
            }

            .top-header .user-info {
                padding: 4px 10px 4px 8px;
            }

            .top-header .user-info .avatar {
                width: 26px;
                height: 26px;
                font-size: 10px;
            }
        }

        /* Landscape phones / small tablets */
        @media (max-width: 420px) {
            .sidebar {
                width: 88%;
            }
        }

        /* Desktop Large - Full Width */
        @media (min-width: 1400px) {
            .main-content {
                padding: 24px 36px 32px 28px;
            }

            .top-header .page-title h4 {
                font-size: 20px;
            }
        }

        /* ============================================
           UTILITY
        ============================================ */
        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Smooth scroll */
        .main-content {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

    <!-- ============================================
    SIDEBAR OVERLAY (MOBILE)
    ============================================ -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ============================================
    APP WRAPPER - FULL HEIGHT
    ============================================ -->
    <div class="app-wrapper">

        <!-- ==========================================
        SIDEBAR
        ========================================== -->
        <nav class="sidebar" id="sidebar">
            <!-- Brand -->
            <div class="sidebar-brand">
                <div class="brand-icon"><i class="bi bi-geo-alt-fill"></i></div>
                <div class="brand-text">
                    GeoSchool
                    <small>GIS System</small>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="sidebar-nav">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" 
                       class="nav-link <?= ($active_menu ?? '') === 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-grid-1x2-fill"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- Profil Sekolah (Parent) -->
                <li class="nav-item">
                    <button class="nav-link <?= in_array($active_menu ?? '', ['profil', 'visi', 'kepala', 'lokasi']) ? 'active' : '' ?>" 
                            onclick="toggleSubmenu(this)" type="button">
                        <i class="nav-icon bi bi-building"></i>
                        <span class="nav-text">Profil Sekolah</span>
                        <span class="nav-arrow <?= in_array($active_menu ?? '', ['profil', 'visi', 'kepala', 'lokasi']) ? 'open' : '' ?>">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </button>
                    <ul class="submenu <?= in_array($active_menu ?? '', ['profil', 'visi', 'kepala', 'lokasi']) ? 'open' : '' ?>">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/profil') ?>" 
                               class="nav-link <?= ($active_menu ?? '') === 'profil' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-pencil-square"></i>
                                <span class="nav-text">Edit Profil Sekolah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/visi') ?>" 
                               class="nav-link <?= ($active_menu ?? '') === 'visi' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-eye"></i>
                                <span class="nav-text">Visi & Misi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/kepala') ?>" 
                               class="nav-link <?= ($active_menu ?? '') === 'kepala' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-person-badge"></i>
                                <span class="nav-text">Kepala Sekolah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/lokasi') ?>" 
                               class="nav-link <?= ($active_menu ?? '') === 'lokasi' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-geo-alt"></i>
                                <span class="nav-text">Lokasi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Preview Website -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/preview') ?>" 
                       class="nav-link <?= ($active_menu ?? '') === 'preview' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-eye"></i>
                        <span class="nav-text">Preview Website</span>
                    </a>
                </li>
                <!-- Pengaturan -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/pengaturan') ?>" 
                       class="nav-link <?= ($active_menu ?? '') === 'pengaturan' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-gear-fill"></i>
                        <span class="nav-text">Pengaturan</span>
                    </a>
                </li>
            </ul>

            <!-- Footer - Logout -->
            <div class="sidebar-footer">
                <a href="<?= base_url('logout') ?>" class="nav-link">
                    <i class="nav-icon bi bi-box-arrow-right"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </div>
        </nav>

        <!-- ==========================================
        MAIN CONTENT - FULL REMAINING SPACE
        ========================================== -->
        <main class="main-content" id="mainContent">

            <!-- Top Header -->
            <header class="top-header">
                <div class="header-left">
                    <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle Sidebar">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="page-title">
                        <h4><?= $title ?? 'Dashboard' ?></h4>
                        <small><?= $subtitle ?? '' ?></small>
                    </div>
                </div>
                <div class="header-right">
                    <div class="user-info">
                        <div class="avatar">
                            <?= strtoupper(substr(session()->get('name') ?? 'O', 0, 1)) ?>
                        </div>
                        <span class="user-name"><?= session()->get('name') ?? 'Operator' ?></span>
                    </div>
                </div>
            </header>

            <!-- ==========================================
            PAGE CONTENT - FULL WIDTH
            ========================================== -->
            <div class="page-content">
                <?= $this->renderSection('content') ?>
            </div>

        </main>
    </div>

    <!-- ============================================
    SCRIPTS
    ============================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // ============================================
        // TOGGLE SUBMENU
        // ============================================
        function toggleSubmenu(button) {
            const parent = button.closest('.nav-item');
            const submenu = parent.querySelector('.submenu');
            const arrow = button.querySelector('.nav-arrow');
            
            if (submenu) {
                submenu.classList.toggle('open');
                if (arrow) arrow.classList.toggle('open');
            }
        }

        // ============================================
        // MOBILE SIDEBAR
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('navbarToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');

            // Toggle sidebar
            function toggleSidebar() {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
                document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', toggleSidebar);
            }

            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                    document.body.style.overflow = '';
                });
            }

            // Close on resize to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth > 992) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                    document.body.style.overflow = '';
                }
            });

            // Prevent default for parent menu buttons
            document.querySelectorAll('.sidebar-nav .nav-link[onclick*="toggleSubmenu"]').forEach(function(el) {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                });
            });

            // Keyboard shortcut: Escape to close sidebar
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar.classList.contains('show')) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                    document.body.style.overflow = '';
                }
            });
        });
    </script>

    <?= $this->renderSection('scripts') ?>
</body>
</html>