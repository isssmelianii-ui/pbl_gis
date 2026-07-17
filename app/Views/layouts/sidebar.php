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
        --line:#e3e8ee;
        --danger-fg:#f5a3a3;
    }

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Plus Jakarta Sans',sans-serif;
    }

    .mono{
        font-family:'JetBrains Mono',monospace;
    }

    body{
        background:#f5f7fa;
        overflow-x:hidden;
    }

    .sidebar{
        width:280px;
        height:100vh;
        position:fixed;
        top:0;
        left:0;
        z-index:10000;
        background:linear-gradient(
            180deg,
            var(--navy-950) 0%,
            var(--navy-900) 55%,
            var(--navy-800) 100%
        );
        padding:28px 20px;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        box-shadow:0 15px 45px rgba(10,29,51,0.25);
        overflow-y:auto;
        color:#eaf0f6;
    }

    .sidebar::-webkit-scrollbar{
        width:5px;
    }

    .sidebar::-webkit-scrollbar-thumb{
        background:rgba(255,255,255,0.15);
        border-radius:10px;
    }

    /* LOGO */

    .logo-box{
        display:flex;
        align-items:center;
        gap:13px;
        margin-bottom:30px;
        padding-bottom:24px;
        border-bottom:1px solid rgba(255,255,255,0.10);
    }

    .logo-icon{
        width:44px;
        height:44px;
        border-radius:13px;
        background:rgba(255,255,255,0.08);
        border:1px solid rgba(255,255,255,0.14);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:18px;
        color:var(--gold-400);
        flex-shrink:0;
    }

    .logo-text h2{
        font-size:16px;
        line-height:1.3;
        color:white;
        margin-bottom:3px;
        font-weight:800;
        letter-spacing:-0.2px;
    }

    .logo-text p{
        color:#93a4b5;
        font-size:11px;
        font-family:'JetBrains Mono',monospace;
        letter-spacing:0.5px;
        text-transform:uppercase;
    }

    /* USER CARD */

    .user-card{
        background:rgba(255,255,255,0.05);
        border:1px solid rgba(255,255,255,0.10);
        border-radius:16px;
        padding:14px 16px;
        display:flex;
        align-items:center;
        gap:13px;
        margin-bottom:30px;
    }

    .user-icon{
        width:42px;
        height:42px;
        border-radius:12px;
        background:var(--gold-500);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:16px;
        color:var(--navy-950);
        flex-shrink:0;
    }

    .user-info{
        min-width:0;
    }

    .user-info h4{
        color:white;
        font-size:14px;
        margin-bottom:3px;
        font-weight:700;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }

    .user-info p{
        color:#93a4b5;
        font-size:11.5px;
    }

    /* MENU TITLE */

    .menu-title{
        color:#7d8fa1;
        font-size:10.5px;
        font-family:'JetBrains Mono',monospace;
        letter-spacing:1.5px;
        margin-bottom:14px;
        padding-left:6px;
    }

    /* MENU */

    .menu{
        list-style:none;
        display:flex;
        flex-direction:column;
        gap:4px;
    }

    .menu li a{
        display:flex;
        align-items:center;
        gap:13px;
        padding:12.5px 14px;
        border-radius:12px;
        color:#c3d0dd;
        text-decoration:none;
        font-size:14px;
        font-weight:600;
        transition:background 0.15s ease, color 0.15s ease;
    }

    .menu li a i{
        width:20px;
        text-align:center;
        font-size:15px;
    }

    .menu li a:hover{
        background:rgba(255,255,255,0.06);
        color:white;
    }

    .menu li a.active{
        background:rgba(214,164,69,0.14);
        color:var(--gold-400);
        position:relative;
    }

    .menu li a.active::before{
        content:'';
        position:absolute;
        left:-20px;
        top:50%;
        transform:translateY(-50%);
        width:3px;
        height:20px;
        background:var(--gold-400);
        border-radius:0 4px 4px 0;
    }

    /* LOGOUT */

    .logout-box{
        margin-top:24px;
        padding-top:20px;
        border-top:1px solid rgba(255,255,255,0.10);
    }

    .logout-btn{
        display:flex;
        align-items:center;
        gap:13px;
        padding:13px 14px;
        border-radius:12px;
        background:rgba(239,68,68,0.08);
        border:1px solid rgba(239,68,68,0.18);
        color:var(--danger-fg);
        text-decoration:none;
        font-size:14px;
        font-weight:700;
        transition:background 0.15s ease;
    }

    .logout-btn:hover{
        background:rgba(239,68,68,0.16);
    }

    .logout-btn i{
        font-size:15px;
    }

    /* FOOTER */

    .sidebar-footer{
        margin-top:18px;
        color:#5f7286;
        font-size:11px;
        font-family:'JetBrains Mono',monospace;
        text-align:center;
    }

    /* =================================
   RESPONSIVE SIDEBAR
================================= */

    @media(max-width:992px){

        .sidebar{
            transform:translateX(-100%);
            transition:transform 0.3s ease;
        }

        .sidebar.active{
            transform:translateX(0);
        }

    }

    @media(max-width:400px){

        .sidebar{
            width:260px;
            padding:24px 16px;
        }

    }

</style>

<div class="sidebar">

    <div>

        <!-- LOGO -->

        <div class="logo-box">

            <div class="logo-icon">

                <i class="fa-solid fa-school"></i>

            </div>

            <div class="logo-text">

                <h2>
                    GeoSchool GIS
                </h2>

                <p>
                    DINAS PENDIDIKAN
                </p>

            </div>

        </div>

        <!-- USER -->

        <div class="user-card">

            <div class="user-icon">

                <i class="fa-solid fa-user"></i>

            </div>

            <div class="user-info">

                <h4>

                    <?= session()->get('name'); ?>

                </h4>

                <p>

                    DINAS PENDIDIKAN

                </p>

            </div>

        </div>

        <!-- MENU -->

        <div class="menu-title">

            MENU UTAMA

        </div>

        <ul class="menu">

            <li>

                <a href="<?= base_url('/superadmin/dashboard'); ?>"
                class="<?= uri_string() == 'superadmin/dashboard' ? 'active' : '' ?>">

                    <i class="fa-solid fa-house"></i>

                    Dashboard

                </a>

            </li>

            <li>

                <a href="<?= base_url('/superadmin/peta'); ?>"
                class="<?= uri_string() == 'superadmin/peta' ? 'active' : '' ?>">

                    <i class="fa-solid fa-map-location-dot"></i>

                    Peta Sekolah

                </a>

            </li>

            <li>

                <a href="<?= base_url('/superadmin/data-sekolah'); ?>"
                class="<?= uri_string() == 'superadmin/data-sekolah' ? 'active' : '' ?>">

                    <i class="fa-solid fa-school"></i>

                    Data Sekolah

                </a>

            </li>

            <li>

                <a href="<?= base_url('/superadmin/data-operator'); ?>"
                class="<?= uri_string() == 'superadmin/data-operator' ? 'active' : '' ?>">

                    <i class="fa-solid fa-users"></i>

                    Data Operator

                </a>

            </li>

            <li>

                <a href="<?= base_url('/superadmin/laporan'); ?>"
                class="<?= uri_string() == 'superadmin/laporan' ? 'active' : '' ?>">

                    <i class="fa-solid fa-chart-column"></i>

                    Laporan

                </a>

            </li>
            <li>
                <a href="<?= base_url('/superadmin/pengaturan'); ?>"
                class="<?= uri_string() == 'superadmin/pengaturan' ? 'active' : '' ?>">

                    <i class="fa-solid fa-gear"></i>

                    Pengaturan

                </a>
            </li>

        </ul>

    </div>

    <!-- BOTTOM -->

    <div>

        <div class="logout-box">

            <a href="<?= base_url('/logout'); ?>"
            class="logout-btn">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </a>

        </div>

        <div class="sidebar-footer">

            © 2026 GeoSchool GIS

        </div>

    </div>

</div>