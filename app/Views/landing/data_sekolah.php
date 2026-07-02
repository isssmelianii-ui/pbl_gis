<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Direktori Sekolah
    </title>

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
            background:#f5f7fb;
        }

        /* NAVBAR */

        .navbar{
            width:100%;
            height:75px;
            background:white;
            border-bottom:1px solid #e5e7eb;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 30px;
        }

        .logo{
            font-size:28px;
            font-weight:700;
            color:#2563eb;
        }

        .back-btn{
            background:#2563eb;
            color:white;
            text-decoration:none;
            padding:12px 22px;
            border-radius:12px;
            font-size:14px;
            font-weight:600;
        }

        /* CONTAINER */

        .container{
            width:90%;
            margin:auto;
            padding:45px 0;
        }

        /* HEADER */

        .page-header{
            margin-bottom:40px;
        }

        .page-header h1{
            font-size:44px;
            color:#0f172a;
            margin-bottom:14px;
        }

        .page-header p{
            max-width:750px;
            color:#64748b;
            line-height:1.8;
            font-size:15px;
        }

        /* CARD */

        .stats-grid{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:22px;
            margin-bottom:45px;
        }

        .stat-card{
            background:white;
            border:1px solid #e5e7eb;
            border-radius:24px;
            padding:26px;
            box-shadow:0 8px 25px rgba(0,0,0,0.03);
        }

        .stat-top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }

        .stat-icon{
            width:55px;
            height:55px;
            border-radius:18px;
            background:#eff6ff;
            color:#2563eb;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:20px;
        }

        .stat-badge{
            background:#dbeafe;
            color:#2563eb;
            padding:6px 12px;
            border-radius:30px;
            font-size:11px;
            font-weight:700;
        }

        .stat-card h2{
            font-size:42px;
            color:#0f172a;
            margin-bottom:8px;
        }

        .stat-card p{
            color:#64748b;
            font-size:14px;
        }

        /* FILTER */

        .filter-section{
            background:white;
            border:1px solid #e5e7eb;
            border-radius:24px;
            padding:22px;
            margin-bottom:30px;
            display:flex;
            gap:18px;
            flex-wrap:wrap;
            align-items:center;
        }

        .search-box{
            flex:1;
            min-width:300px;
            position:relative;
        }

        .search-box i{
            position:absolute;
            left:18px;
            top:50%;
            transform:translateY(-50%);
            color:#94a3b8;
        }

        .search-box input{
            width:100%;
            padding:16px 18px 16px 50px;
            border-radius:16px;
            border:1px solid #e5e7eb;
            outline:none;
            font-size:14px;
        }

        .filter-select{
            padding:16px;
            border-radius:16px;
            border:1px solid #e5e7eb;
            outline:none;
            color:#334155;
            font-size:14px;
            min-width:180px;
        }

        /* TABLE */

        .table-card{
            background:white;
            border-radius:24px;
            border:1px solid #e5e7eb;
            overflow:hidden;
            box-shadow:0 8px 25px rgba(0,0,0,0.03);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        thead{
            background:#f8fafc;
        }

        th{
            padding:20px;
            text-align:left;
            font-size:13px;
            color:#64748b;
            border-bottom:1px solid #e5e7eb;
        }

        td{
            padding:22px 20px;
            border-bottom:1px solid #f1f5f9;
            font-size:14px;
            color:#334155;
        }

        tr:hover{
            background:#f8fafc;
        }

        .school-name{
            font-size:15px;
            font-weight:700;
            color:#0f172a;
            margin-bottom:6px;
        }

        .school-address{
            font-size:13px;
            color:#64748b;
        }

        /* BADGE */

        .badge{
            padding:6px 14px;
            border-radius:30px;
            font-size:11px;
            font-weight:700;
            color:white;
        }

        .sd{
            background:#22c55e;
        }

        .smp{
            background:#2563eb;
        }

        .tk{
            background:#f97316;
        }

        /* STATUS */

        .status{
            color:#16a34a;
            font-weight:600;
        }

        /* AKSI */

        .aksi-group{
            display:flex;
            gap:12px;
        }

        .aksi-btn{
            width:38px;
            height:38px;
            border-radius:12px;
            background:#eff6ff;
            color:#2563eb;
            display:flex;
            justify-content:center;
            align-items:center;
            text-decoration:none;
            transition:0.3s;
        }

        .aksi-btn:hover{
            background:#2563eb;
            color:white;
        }

        /* PAGINATION */

        .pagination{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:22px;
            font-size:14px;
            color:#64748b;
        }

        .page-number{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .page-btn{
            width:38px;
            height:38px;
            border-radius:12px;
            background:white;
            border:1px solid #e5e7eb;
            display:flex;
            justify-content:center;
            align-items:center;
            cursor:pointer;
        }

        .page-btn.active{
            background:#2563eb;
            color:white;
            border:none;
        }

        /* FOOTER */

        .footer{
            margin-top:80px;
            padding:25px 0;
            border-top:1px solid #e5e7eb;
            display:flex;
            justify-content:space-between;
            color:#64748b;
            font-size:13px;
        }

        @media(max-width:1100px){

            .stats-grid{
                grid-template-columns:repeat(2,1fr);
            }

        }

        @media(max-width:700px){

            .stats-grid{
                grid-template-columns:1fr;
            }

            .filter-section{
                flex-direction:column;
            }

            .filter-select{
                width:100%;
            }

        }

    </style>

</head>
<body>

    <!-- NAVBAR -->

    <div class="navbar">

        <div class="logo">

            School GIS

        </div>

        <a href="<?= base_url('/'); ?>"
        class="back-btn">

            Kembali

        </a>

    </div>

    <!-- CONTENT -->

    <div class="container">

        <!-- HEADER -->

        <div class="page-header">

            <h1>
                Direktori Sekolah
            </h1>

            <p>
                Akses data sekolah lengkap satuan pendidikan tingkat SD dan SMP di seluruh wilayah administrasi. Data diperbarui secara berkala berdasarkan sistem terintegrasi spasial terbaru.
            </p>

        </div>

        <!-- STATISTIK -->

        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">

                        <i class="fa-solid fa-school"></i>

                    </div>

                    <div class="stat-badge">

                        TOTAL

                    </div>

                </div>

                <h2>

                    <?= $totalSekolah; ?>

                </h2>

                <p>
                    Institusi Pendidikan
                </p>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">

                        <i class="fa-solid fa-book-open"></i>

                    </div>

                </div>

                <h2>

                    <?= $totalSD; ?>

                </h2>

                <p>
                    Sekolah Dasar (SD)
                </p>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">

                        <i class="fa-solid fa-building-columns"></i>

                    </div>

                </div>

                <h2>

                    <?= $totalSMP; ?>

                </h2>

                <p>
                    Sekolah Menengah Pertama
                </p>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">

                        <i class="fa-solid fa-child-reaching"></i>

                    </div>

                </div>

                <h2>

                    <?= $totalTK; ?>

                </h2>

                <p>
                    Taman Kanak-Kanak (TK)
                </p>

            </div>

        </div>

        <!-- FILTER -->

        <div class="filter-section">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text"
                placeholder="Cari nama sekolah atau NPSN...">

            </div>

            <select class="filter-select">

                <option>
                    Semua Jenjang
                </option>

                <option>
                    TK
                </option>

                <option>
                    SD
                </option>

                <option>
                    SMP
                </option>

            </select>

            <select class="filter-select">

                <option>
                    Semua Kecamatan
                </option>

                <option>
                    Lintau Buo
                </option>

                <option>
                    Padang Ganting
                </option>

                <option>
                    Tanjung Emas
                </option>

            </select>

        </div>

        <!-- TABLE -->

        <div class="table-card">

            <table>

                <thead>

                    <tr>

                        <th>
                            NAMA SEKOLAH
                        </th>

                        <th>
                            NPSN
                        </th>

                        <th>
                            KECAMATAN
                        </th>

                        <th>
                            JENJANG
                        </th>

                        <th>
                            STATUS
                        </th>

                        <th>
                            AKSI
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($sekolah as $s): ?>

                    <?php

                        $badge = 'sd';

                        if($s['jenjang'] == 'TK'){
                            $badge = 'tk';
                        }

                        if($s['jenjang'] == 'SMP'){
                            $badge = 'smp';
                        }

                    ?>

                    <tr>

                        <td>

                            <div class="school-name">

                                <?= $s['nama_sekolah']; ?>

                            </div>

                            <div class="school-address">

                                <?= $s['alamat']; ?>

                            </div>

                        </td>

                        <td>

                            <?= $s['npsn']; ?>

                        </td>

                        <td>

                            <?= $s['kecamatan']; ?>

                        </td>

                        <td>

                            <span class="badge <?= $badge; ?>">

                                <?= $s['jenjang']; ?>

                            </span>

                        </td>

                        <td>

                            <span class="status">

                                ● Negeri

                            </span>

                        </td>

                        <td>

                            <div class="aksi-group">

                                <a href="#"
                                class="aksi-btn">

                                    <i class="fa-solid fa-eye"></i>

                                </a>

                                <a href="#"
                                class="aksi-btn">

                                    <i class="fa-solid fa-map-location-dot"></i>

                                </a>

                            </div>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

            <!-- PAGINATION -->

            <div class="pagination">

                <div>

                    Menampilkan 1 - 5 dari
                    <?= $totalSekolah; ?> sekolah

                </div>

                <div class="page-number">

                    <div class="page-btn">

                        <i class="fa-solid fa-chevron-left"></i>

                    </div>

                    <div class="page-btn active">

                        1

                    </div>

                    <div class="page-btn">

                        2

                    </div>

                    <div class="page-btn">

                        3

                    </div>

                    <div class="page-btn">

                        <i class="fa-solid fa-chevron-right"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- FOOTER -->

        <div class="footer">

            <div>

                © 2026 School GIS System

            </div>

            <div>

                Precision Spatial Logic

            </div>

        </div>

    </div>

</body>
</html>