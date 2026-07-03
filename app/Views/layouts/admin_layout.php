<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - GeoSchool GIS</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* ============================================
           ROOT VARIABLES
        ============================================ */
        :root {
            --primary: #1a56db;
            --primary-dark: #1e40af;
            --primary-light: #dbeafe;
            --primary-50: #eff6ff;
            --sidebar-width: 260px;
            --sidebar-collapsed: 0px;
            --header-height: 70px;
            --radius: 12px;
            --shadow: 0 1px 3px rgba(0,0,0,0.06);
            --shadow-hover: 0 8px 30px rgba(26, 86, 219, 0.12);
        }

        /* ============================================
           RESET & BASE - FULL SCREEN
        ============================================ */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body {
            height: 100%;
            font-family: 'Inter', sans-serif;
            background: #f0f4f9;
            overflow: hidden;
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
            background: linear-gradient(180deg, #0f2b5c 0%, #1a56db 100%);
            z-index: 1050;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            overflow-x: hidden;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.08);
            flex-shrink: 0;
        }

        .sidebar::-webkit-scrollbar { width: 3px; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 10px; }

        /* Brand */
        .sidebar-brand {
            padding: 18px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: var(--header-height);
        }

        .sidebar-brand .brand-icon {
            width: 38px;
            height: 38px;
            background: rgba(255,255,255,0.12);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #fff;
            flex-shrink: 0;
        }

        .sidebar-brand .brand-text {
            color: #fff;
            font-weight: 700;
            font-size: 17px;
            letter-spacing: -0.3px;
            white-space: nowrap;
        }

        .sidebar-brand .brand-text small {
            display: block;
            font-weight: 400;
            font-size: 9px;
            opacity: 0.5;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        /* Navigation */
        .sidebar-nav {
            padding: 12px 12px 80px;
            list-style: none;
        }

        .sidebar-nav .nav-item { margin-bottom: 2px; }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
            border: none;
            background: none;
            width: 100%;
            position: relative;
        }

        .sidebar-nav .nav-link:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .sidebar-nav .nav-link.active {
            background: rgba(255,255,255,0.12);
            color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .sidebar-nav .nav-link .nav-icon {
            font-size: 17px;
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
            opacity: 0.5;
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
            padding: 7px 14px 7px 46px;
            font-size: 12.5px;
            font-weight: 400;
            color: rgba(255,255,255,0.5);
        }

        .sidebar-nav .submenu .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.06);
        }

        .sidebar-nav .submenu .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.1);
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
            border-top: 1px solid rgba(255,255,255,0.06);
            background: rgba(0,0,0,0.05);
        }

        .sidebar-footer .nav-link {
            color: rgba(255,255,255,0.5);
            font-size: 13px;
        }

        .sidebar-footer .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.06);
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
            background: #f0f4f9;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-content::-webkit-scrollbar { width: 5px; }
        .main-content::-webkit-scrollbar-track { background: transparent; }
        .main-content::-webkit-scrollbar-thumb { background: #c1c7cd; border-radius: 10px; }

        /* ============================================
           TOP HEADER - STICKY
        ============================================ */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 0 16px 0;
            margin-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            background: #f0f4f9;
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
            font-weight: 700;
            color: #111827;
            margin: 0;
            font-size: 18px;
            line-height: 1.2;
        }

        .top-header .page-title small {
            color: #6b7280;
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
            border: 1px solid #f1f5f9;
        }

        .top-header .user-info .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 12px;
            flex-shrink: 0;
        }

        .top-header .user-info .user-name {
            font-size: 12.5px;
            font-weight: 600;
            color: #111827;
        }

        /* Toggle Button */
        .navbar-toggle {
            display: none;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            font-size: 20px;
            color: #111827;
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
            background: rgba(0,0,0,0.4);
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