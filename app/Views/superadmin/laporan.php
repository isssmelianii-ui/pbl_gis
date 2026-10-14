<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

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
        --surface:#ffffff;
        --green-500:#1a8a5f;
    }

    .main-content{
        margin-left:280px;
        padding:32px;
        background:#f5f7fa;
        min-height:100vh;
        font-family:'Plus Jakarta Sans',sans-serif;
        color:var(--ink-900);
    }

    .main-content .mono{
        font-family:'JetBrains Mono',monospace;
    }

    .page-title{
        text-align:center;
        margin-bottom:28px;
    }

    .page-title .eyebrow{
        font-family:'JetBrains Mono',monospace;
        font-size:11.5px;
        letter-spacing:1.2px;
        text-transform:uppercase;
        color:var(--gold-500);
        margin-bottom:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:9px;
    }

    .page-title .eyebrow::before,
    .page-title .eyebrow::after{
        content:'';
        width:20px;
        height:1px;
        background:var(--gold-500);
    }

    .page-title h1{
        font-size:28px;
        font-weight:800;
        color:var(--ink-900);
        margin-bottom:8px;
        letter-spacing:-0.4px;
    }

    .page-title p{
        color:var(--ink-600);
        font-size:14px;
    }

    /* FILTER */

    .filter-box{
        display:flex;
        gap:14px;
        margin-bottom:24px;
        flex-wrap:wrap;
        max-width:950px;
        margin-left:auto;
        margin-right:auto;
    }

    .filter-select{
        flex:1;
        min-width:230px;
        background:var(--surface);
        border:1.5px solid var(--line);
        padding:14px 16px;
        border-radius:12px;
        outline:none;
        font-size:13.5px;
        font-family:inherit;
        color:var(--ink-900);
        cursor:pointer;
        transition:border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .filter-select:focus{
        border-color:var(--navy-800);
        box-shadow:0 0 0 3.5px rgba(14,42,71,0.09);
    }

    .apply-btn{
        background:var(--navy-900);
        color:white;
        border:none;
        padding:14px 24px;
        border-radius:12px;
        cursor:pointer;
        font-size:13.5px;
        font-weight:700;
        font-family:inherit;
        transition:background 0.15s ease;
    }

    .apply-btn:hover{
        background:var(--navy-800);
    }

    /* REPORT */

    .report-card{
        max-width:950px;
        margin:auto;
        background:var(--surface);
        border-radius:20px;
        padding:34px;
        border:1px solid var(--line);
        box-shadow:0 12px 30px rgba(14,42,71,0.06);
    }

    .report-header{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        margin-bottom:26px;
    }

    .report-title{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .report-logo{
        width:48px;
        height:48px;
        border-radius:13px;
        background:var(--navy-900);
        color:var(--gold-400);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:19px;
        flex-shrink:0;
    }

    .report-title h2{
        color:var(--navy-900);
        font-size:22px;
        margin-bottom:4px;
        font-weight:800;
        letter-spacing:-0.2px;
    }

    .report-title p{
        font-size:13px;
        color:var(--ink-600);
    }

    .report-info{
        text-align:right;
        font-size:12.5px;
        color:var(--ink-600);
        font-family:'JetBrains Mono',monospace;
        line-height:1.7;
    }

    .line{
        width:100%;
        height:2px;
        background:var(--gold-500);
        margin-bottom:28px;
        border-radius:10px;
    }

    .rekap-title{
        text-align:center;
        margin-bottom:24px;
    }

    .rekap-title h3{
        font-size:21px;
        margin-bottom:8px;
        color:var(--ink-900);
        font-weight:800;
    }

    .rekap-title p{
        color:var(--ink-600);
        font-size:13.5px;
    }

    /* STATS */

    .stats-grid{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:14px;
        margin-bottom:28px;
    }

    .stat-card{
        background:#f8fafc;
        border:1px solid var(--line);
        border-radius:16px;
        padding:18px;
    }

    .stat-card h4{
        font-size:11.5px;
        color:var(--ink-600);
        margin-bottom:9px;
        font-weight:700;
        font-family:'JetBrains Mono',monospace;
        text-transform:uppercase;
        letter-spacing:0.4px;
    }

    .stat-card h2{
        color:var(--navy-900);
        font-size:27px;
        font-weight:800;
    }

    /* TABLE */

    .main-content table{
        width:100%;
        border-collapse:collapse;
        margin-top:18px;
    }

    .main-content thead{
        background:var(--navy-900);
        color:white;
    }

    .main-content th{
        padding:15px;
        font-size:12.5px;
        font-weight:700;
    }

    .main-content td{
        padding:15px;
        border-bottom:1px solid #f1f5f9;
        text-align:center;
        font-size:13.5px;
        color:var(--ink-900);
    }

    .main-content tbody tr:hover{
        background:#f8fafc;
    }

    .status-aktif{
        color:var(--green-500);
        font-weight:600;
        display:inline-flex;
        align-items:center;
        gap:6px;
    }

    .status-aktif::before{
        content:'';
        width:6px;
        height:6px;
        border-radius:50%;
        background:var(--green-500);
    }

    /* PRINT BUTTON */

    .print-box{
        text-align:right;
        margin-top:22px;
        max-width:950px;
        margin-left:auto;
        margin-right:auto;
    }

    .print-btn{
        background:var(--navy-900);
        color:white;
        border:none;
        padding:14px 24px;
        border-radius:12px;
        cursor:pointer;
        font-size:13.5px;
        font-weight:700;
        font-family:inherit;
        display:inline-flex;
        align-items:center;
        gap:9px;
        transition:background 0.15s ease;
    }

    .print-btn:hover{
        background:var(--navy-800);
    }

    /* =========================
       PRINT AREA
    ========================= */

    @media print {

        body{
            background:white !important;
        }

        /* Hilangkan sidebar dan elemen lain */
        .sidebar,
        .sidebar-admin,
        .page-title,
        .filter-box,
        .print-box,
        header,
        nav,
        footer{
            display:none !important;
        }

        /* Full halaman */
        .main-content{
            margin:0 !important;
            padding:0 !important;
            width:100% !important;
            background:white !important;
        }

        /* Hanya cetak laporan */
        .report-card{
            max-width:100% !important;
            width:100% !important;
            border:none !important;
            box-shadow:none !important;
            border-radius:0 !important;
            padding:20px !important;
        }

        /* Rapikan statistik */
        .stats-grid{
            grid-template-columns:repeat(4,1fr);
            gap:10px;
        }

        .stat-card{
            border:1px solid #ddd;
            background:#fff;
        }

        table{
            width:100%;
        }

        th{
            background:#0e2a47 !important;
            color:white !important;
        }

        @page{
            margin:15mm;
        }
    }

    @media(max-width:992px){

        .main-content{
            margin-left:0;
            padding:88px 20px 20px;
        }

    }

    @media(max-width:700px){

        .report-header{
            flex-direction:column;
            gap:14px;
        }

        .report-info{
            text-align:left;
        }

        .stats-grid{
            grid-template-columns:repeat(2,1fr);
        }

    }

</style>

<div class="main-content">

    <div class="page-title">

        <div class="eyebrow">Pelaporan Data</div>

        <h1>
            Pusat Laporan
        </h1>

        <p>
            Generate dan cetak laporan data sekolah.
        </p>

    </div>

    <!-- FILTER -->

    <form method="GET" class="filter-box">

        <!-- FILTER JENJANG -->

        <select name="jenjang" class="filter-select">

            <option value="">
                Semua Tingkat
            </option>

            <option value="TK"
            <?= ($jenjang == 'TK') ? 'selected' : ''; ?>>
                TK
            </option>

            <option value="SD"
            <?= ($jenjang == 'SD') ? 'selected' : ''; ?>>
                SD
            </option>

            <option value="SMP"
            <?= ($jenjang == 'SMP') ? 'selected' : ''; ?>>
                SMP
            </option>

        </select>

        <!-- FILTER KECAMATAN -->

        <select name="kecamatan" class="filter-select">

            <option value="">
                Semua Kecamatan
            </option>

            <option value="Lintau Buo"
            <?= ($kecamatan == 'Lintau Buo') ? 'selected' : ''; ?>>
                Lintau Buo
            </option>

            <option value="Padang Ganting"
            <?= ($kecamatan == 'Padang Ganting') ? 'selected' : ''; ?>>
                Padang Ganting
            </option>

            <option value="Tanjung Emas"
            <?= ($kecamatan == 'Tanjung Emas') ? 'selected' : ''; ?>>
                Tanjung Emas
            </option>

        </select>

        <!-- BUTTON -->

        <button type="submit" class="apply-btn">
            Terapkan
        </button>

    </form>

    <!-- REPORT -->

    <div class="report-card">

        <div class="report-header">

            <div class="report-title">

                <div class="report-logo">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>

                <div>

                    <h2>
                        DINAS PENDIDIKAN
                    </h2>

                    <p>
                        Sistem Informasi Geografis Sekolah
                    </p>

                </div>

            </div>

            <div class="report-info">

                ID Laporan:
                ARSP-2026-001
                <br>

                Tanggal:
                <?= date('d F Y'); ?>

            </div>

        </div>

        <div class="line"></div>

        <div class="rekap-title">

            <h3>
                REKAPITULASI DATA SEKOLAH
            </h3>

            <p>
                Data realtime sekolah wilayah Kabupaten Tanah Datar.
            </p>

        </div>

        <!-- STATISTIK -->

        <div class="stats-grid">

            <div class="stat-card">

                <h4>Total Sekolah</h4>

                <h2>
                    <?= $totalSekolah; ?>
                </h2>

            </div>

            <div class="stat-card">

                <h4>Total TK</h4>

                <h2>
                    <?= $totalTK; ?>
                </h2>

            </div>

            <div class="stat-card">

                <h4>Total SD</h4>

                <h2>
                    <?= $totalSD; ?>
                </h2>

            </div>

            <div class="stat-card">

                <h4>Total SMP</h4>

                <h2>
                    <?= $totalSMP; ?>
                </h2>

            </div>

        </div>

        <!-- TABLE -->

        <table>

            <thead>

                <tr>

                    <th>
                        Nama Sekolah
                    </th>
                    <th>
                        Akreditasi
                    </th>

                    <th>
                        Jenjang
                    </th>

                    <th>
                        Kecamatan
                    </th>

                    <th>
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php if(!empty($sekolah)) : ?>

                    <?php foreach($sekolah as $s): ?>

                    <tr>

                        <td>
                            <?= $s['nama_sekolah']; ?>
                        </td>
                        <td>
                            <?= $s['akreditasi']; ?>
                        </td>

                        <td>
                            <?= $s['jenjang']; ?>
                        </td>

                        <td>
                            <?= $s['kecamatan']; ?>
                        </td>

                        <td>
                            <span class="status-aktif">Aktif</span>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>

                        <td colspan="4">
                            Tidak ada data ditemukan.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

    <!-- PRINT -->

    <div class="print-box">

        <button onclick="window.print()" class="print-btn">

            <i class="fa-solid fa-print"></i>
            Cetak Laporan

        </button>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>