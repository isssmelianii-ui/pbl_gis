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

        .container{
            width:90%;
            margin:auto;
            padding:45px 0;
        }

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

        .status{
            color:#16a34a;
            font-weight:600;
        }

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

        @media(max-width:1100px){

            .stats-grid{
                grid-template-columns:repeat(2,1fr);
            }

        }

        @media(max-width:700px){

            .stats-grid{
                grid-template-columns:1fr;
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
                Akses data sekolah lengkap satuan pendidikan tingkat SD dan SMP di seluruh wilayah administrasi.
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

                <h2><?= $totalSekolah; ?></h2>

                <p>Institusi Pendidikan</p>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">

                        <i class="fa-solid fa-book-open"></i>

                    </div>

                </div>

                <h2><?= $totalSD; ?></h2>

                <p>Sekolah Dasar (SD)</p>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">

                        <i class="fa-solid fa-building-columns"></i>

                    </div>

                </div>

                <h2><?= $totalSMP; ?></h2>

                <p>Sekolah Menengah Pertama</p>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-icon">

                        <i class="fa-solid fa-child-reaching"></i>

                    </div>

                </div>

                <h2><?= $totalTK; ?></h2>

                <p>Taman Kanak-Kanak (TK)</p>

            </div>

        </div>

        <!-- TABLE -->

        <div class="table-card">

            <table>

                <thead>

                    <tr>

                        <th>NAMA SEKOLAH</th>
                        <th>NPSN</th>
                        <th>KECAMATAN</th>
                        <th>JENJANG</th>
                        <th>STATUS</th>
                        <th>AKSI</th>

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

                        <td><?= $s['npsn']; ?></td>

                        <td><?= $s['kecamatan']; ?></td>

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

                                <!-- DETAIL SEKOLAH -->

                                <a href="<?= base_url('detail-sekolah/'.$s['id']); ?>"
                                class="aksi-btn">

                                    <i class="fa-solid fa-eye"></i>

                                </a>

                                <!-- DETAIL PETA -->

                                <a href="<?= base_url('detail-peta?id='.$s['id']); ?>"
                                class="aksi-btn">

                                    <i class="fa-solid fa-map-location-dot"></i>

                                </a>

                            </div>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</body>
</html>