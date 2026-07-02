<div class="sidebar">

    <div class="logo">

        <i class="fa-solid fa-school"></i>

        <span>GeoSchool GIS</span>

    </div>

    <div class="menu">

        <a href="<?= base_url('admin/dashboard'); ?>"
           class="<?= uri_string()=='admin/dashboard'?'active':''; ?>">

            <i class="fa-solid fa-house"></i>

            Dashboard

        </a>

        <a href="<?= base_url('admin/data-sekolah'); ?>"
           class="<?= uri_string()=='admin/data-sekolah'?'active':''; ?>">

            <i class="fa-solid fa-school"></i>

            Data Sekolah

        </a>

        <a href="<?= base_url('admin/peta'); ?>"
           class="<?= uri_string()=='admin/peta'?'active':''; ?>">

            <i class="fa-solid fa-map-location-dot"></i>

            Peta Sekolah

        </a>

    </div>

    <div class="logout">

        <a href="<?= base_url('/logout'); ?>">

            <i class="fa-solid fa-right-from-bracket"></i>

            Logout

        </a>

    </div>

</div>

<style>

.sidebar{

    position:fixed;

    left:0;

    top:0;

    width:260px;

    height:100vh;

    background:#0f172a;

    color:white;

    display:flex;

    flex-direction:column;

}

.logo{

    padding:30px;

    font-size:24px;

    font-weight:bold;

    border-bottom:1px solid rgba(255,255,255,.08);

}

.logo i{

    color:#3b82f6;

    margin-right:10px;

}

.menu{

    flex:1;

    padding:20px;

}

.menu a{

    display:flex;

    align-items:center;

    gap:15px;

    padding:16px;

    margin-bottom:12px;

    border-radius:15px;

    color:#cbd5e1;

    transition:.3s;

}

.menu a:hover{

    background:#1e293b;

    color:white;

}

.menu a.active{

    background:#2563eb;

    color:white;

}

.logout{

    padding:20px;

    border-top:1px solid rgba(255,255,255,.08);

}

.logout a{

    display:flex;

    align-items:center;

    gap:12px;

    color:white;

    background:#ef4444;

    padding:15px;

    border-radius:15px;

}

.logout a:hover{

    background:#dc2626;

}

</style>