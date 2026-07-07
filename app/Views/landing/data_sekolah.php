<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Direktori Sekolah — GeoSchool GIS
    </title>

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
            --bg:#f5f7fa;
            --surface:#ffffff;
            --green-500:#1a8a5f;
            --green-bg:#e6f5ee;
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
            background:var(--bg);
            color:var(--ink-900);
        }

        /* NAVBAR */

        .navbar{
            width:100%;
            height:75px;
            background:rgba(255,255,255,0.92);
            backdrop-filter:blur(10px);
            border-bottom:1px solid var(--line);
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 34px;
            position:sticky;
            top:0;
            z-index:50;
        }

        .logo{
            font-size:17px;
            font-weight:800;
            color:var(--navy-900);
            display:flex;
            align-items:center;
            gap:10px;
            letter-spacing:-0.2px;
        }

        .logo .logo-mark{
            width:34px;
            height:34px;
            border-radius:9px;
            background:var(--navy-900);
            color:var(--gold-400);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:14px;
        }

        .back-btn{
            background:var(--navy-900);
            color:white;
            text-decoration:none;
            padding:11px 22px;
            border-radius:10px;
            font-size:13px;
            font-weight:700;
            display:flex;
            align-items:center;
            gap:8px;
            transition:background 0.15s ease;
        }

        .back-btn:hover{
            background:var(--navy-800);
        }

        .container{
            width:90%;
            max-width:1280px;
            margin:auto;
            padding:48px 0 60px;
        }

        /* HEADER */

        .page-header{
            margin-bottom:36px;
        }

        .page-header .eyebrow{
            font-family:'JetBrains Mono',monospace;
            font-size:12px;
            letter-spacing:1.2px;
            text-transform:uppercase;
            color:var(--gold-500);
            margin-bottom:12px;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .page-header .eyebrow::before{
            content:'';
            width:22px;
            height:1px;
            background:var(--gold-500);
        }

        .page-header h1{
            font-size:38px;
            font-weight:800;
            color:var(--ink-900);
            margin-bottom:14px;
            letter-spacing:-0.4px;
        }

        .page-header p{
            max-width:750px;
            color:var(--ink-600);
            line-height:1.85;
            font-size:14.5px;
        }

        /* STATISTIK */

        .stats-grid{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:18px;
            margin-bottom:40px;
        }

        .stat-card{
            background:var(--surface);
            border:1px solid var(--line);
            border-radius:18px;
            padding:24px;
            transition:transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover{
            transform:translateY(-3px);
            box-shadow:0 12px 28px rgba(14,42,71,0.08);
        }

        .stat-top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:22px;
        }

        .stat-icon{
            width:48px;
            height:48px;
            border-radius:14px;
            background:var(--navy-900);
            color:var(--gold-400);
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:17px;
        }

        .stat-badge{
            font-family:'JetBrains Mono',monospace;
            background:#f0f4f9;
            color:var(--navy-900);
            padding:6px 12px;
            border-radius:30px;
            font-size:10.5px;
            font-weight:700;
            letter-spacing:0.4px;
        }

        .stat-card h2{
            font-size:36px;
            color:var(--ink-900);
            margin-bottom:6px;
            font-weight:800;
        }

        .stat-card p{
            color:var(--ink-600);
            font-size:13.5px;
        }

        /* TABLE */

        .table-card{
            background:var(--surface);
            border-radius:20px;
            border:1px solid var(--line);
            overflow:hidden;
            box-shadow:0 10px 30px rgba(14,42,71,0.05);
        }

        .table-scroll{
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            min-width:760px;
        }

        thead{
            background:#f8fafc;
        }

        th{
            padding:18px 20px;
            text-align:left;
            font-size:11.5px;
            font-weight:700;
            letter-spacing:0.6px;
            color:var(--ink-400);
            border-bottom:1px solid var(--line);
            font-family:'JetBrains Mono',monospace;
        }

        td{
            padding:20px;
            border-bottom:1px solid #f1f5f9;
            font-size:14px;
            color:var(--ink-900);
            vertical-align:middle;
        }

        tbody tr:last-child td{
            border-bottom:none;
        }

        tbody tr{
            transition:background 0.15s ease;
        }

        tbody tr:hover{
            background:#f8fafc;
        }

        .school-name{
            font-size:14.5px;
            font-weight:700;
            color:var(--ink-900);
            margin-bottom:5px;
        }

        .school-address{
            font-size:12.5px;
            color:var(--ink-600);
        }

        .badge{
            padding:6px 14px;
            border-radius:30px;
            font-size:11px;
            font-weight:700;
            color:white;
            display:inline-block;
        }

        .sd{
            background:var(--navy-900);
        }

        .smp{
            background:var(--gold-500);
        }

        .tk{
            background:#5b6b7c;
        }

        .status{
            color:var(--green-500);
            font-weight:600;
            font-size:13px;
            display:inline-flex;
            align-items:center;
            gap:7px;
        }

        .status::before{
            content:'';
            width:7px;
            height:7px;
            border-radius:50%;
            background:var(--green-500);
        }

        .aksi-group{
            display:flex;
            gap:10px;
        }

        .aksi-btn{
            width:36px;
            height:36px;
            border-radius:10px;
            background:#f0f4f9;
            color:var(--navy-900);
            display:flex;
            justify-content:center;
            align-items:center;
            text-decoration:none;
            font-size:13px;
            transition:background 0.15s ease, color 0.15s ease;
        }

        .aksi-btn:hover{
            background:var(--navy-900);
            color:var(--gold-400);
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

            .page-header h1{
                font-size:28px;
            }

        }

    </style>

</head>
<body>

    <!-- NAVBAR -->

    <div class="navbar">

        <div class="logo">
            <span class="logo-mark"><i class="fa-solid fa-map-location-dot"></i></span>
            School GIS
        </div>

        <a href="<?= base_url('/'); ?>"
        class="back-btn">

            <i class="fa-solid fa-arrow-left"></i>
            Kembali

        </a>

    </div>

    <!-- CONTENT -->

    <div class="container">

        <!-- HEADER -->

        <div class="page-header">

            <div class="eyebrow">Data Satuan Pendidikan</div>

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

            <div class="table-scroll">

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

                        <td class="mono"><?= $s['npsn']; ?></td>

                        <td><?= $s['kecamatan']; ?></td>

                        <td>

                            <span class="badge <?= $badge; ?>">

                                <?= $s['jenjang']; ?>

                            </span>

                        </td>

                        <td>

                            <span class="status">

                                Negeri

                            </span>

                        </td>

                        <td>

                            <div class="aksi-group">

                                <!-- DETAIL SEKOLAH -->

                                <a href="<?= base_url('detail-sekolah/' . $s['id']) ?>?from=data-sekolah"
                                class="aksi-btn">

                                    <i class="fa-solid fa-eye"></i>

                                </a>

                                <!-- DETAIL PETA -->

                                <a href="<?= base_url('detail-peta'); ?>?lat=<?= $s['latitude']; ?>&lng=<?= $s['longitude']; ?>&nama=<?= urlencode($s['nama_sekolah']); ?>&from=data-sekolah"
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

    </div>

</body>
</html>