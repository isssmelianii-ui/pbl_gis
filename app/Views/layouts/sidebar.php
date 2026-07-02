<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Segoe UI',sans-serif;
    }

    body{
        background:#f8fafc;
        overflow-x:hidden;
    }

    .sidebar{
        width:280px;
        height:100vh;
        position:fixed;
        top:0;
        left:0;
        z-index:999;
        background:linear-gradient(
            180deg,
            #1e3a8a 0%,
            #172554 100%
        );
        padding:28px 22px;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        box-shadow:0 15px 40px rgba(0,0,0,0.15);
        overflow-y:auto;
    }

    /* LOGO */

    .logo-box{
        display:flex;
        align-items:center;
        gap:14px;
        margin-bottom:40px;
    }

    .logo-icon{
        width:62px;
        height:62px;
        border-radius:18px;
        background:rgba(255,255,255,0.12);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:24px;
        color:white;
        flex-shrink:0;
    }

    .logo-text h2{
        font-size:22px;
        line-height:1.3;
        color:white;
        margin-bottom:5px;
        font-weight:700;
    }

    .logo-text p{
        color:#cbd5e1;
        font-size:13px;
    }

    /* USER CARD */

    .user-card{
        background:rgba(255,255,255,0.08);
        border:1px solid rgba(255,255,255,0.08);
        border-radius:24px;
        padding:18px;
        display:flex;
        align-items:center;
        gap:15px;
        margin-bottom:38px;
        backdrop-filter:blur(10px);
    }

    .user-icon{
        width:56px;
        height:56px;
        border-radius:50%;
        background:#2563eb;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:20px;
        color:white;
        flex-shrink:0;
    }

    .user-info h4{
        color:white;
        font-size:16px;
        margin-bottom:5px;
        font-weight:600;
    }

    .user-info p{
        color:#cbd5e1;
        font-size:13px;
    }

    /* MENU TITLE */

    .menu-title{
        color:#94a3b8;
        font-size:12px;
        letter-spacing:2px;
        margin-bottom:18px;
        padding-left:5px;
    }

    /* MENU */

    .menu{
        list-style:none;
        display:flex;
        flex-direction:column;
        gap:10px;
    }

    .menu li a{
        display:flex;
        align-items:center;
        gap:14px;
        padding:16px 18px;
        border-radius:18px;
        color:white;
        text-decoration:none;
        font-size:15px;
        font-weight:500;
        transition:0.3s;
    }

    .menu li a i{
        width:22px;
        text-align:center;
        font-size:17px;
    }

    .menu li a:hover{
        background:rgba(255,255,255,0.08);
    }

    .menu li a.active{
        background:#2563eb;
        box-shadow:0 10px 25px rgba(37,99,235,0.35);
    }

    /* LOGOUT */

    .logout-box{
        margin-top:35px;
    }

    .logout-btn{
        display:flex;
        align-items:center;
        gap:14px;
        padding:18px;
        border-radius:18px;
        background:rgba(239,68,68,0.10);
        border:1px solid rgba(239,68,68,0.20);
        color:#fca5a5;
        text-decoration:none;
        font-size:15px;
        font-weight:600;
        transition:0.3s;
    }

    .logout-btn:hover{
        background:rgba(239,68,68,0.18);
    }

    .logout-btn i{
        font-size:17px;
    }

    /* FOOTER */

    .sidebar-footer{
        margin-top:22px;
        color:#94a3b8;
        font-size:12px;
        text-align:center;
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
                    Super Admin Panel
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

                    Super Administrator

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