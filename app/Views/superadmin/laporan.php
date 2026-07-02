<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<style>

    .main-content{
        margin-left:280px;
        padding:30px;
        background:#f8fafc;
        min-height:100vh;
    }

    .page-title{
        text-align:center;
        margin-bottom:30px;
    }

    .page-title h1{
        font-size:32px;
        color:#0f172a;
        margin-bottom:8px;
    }

    .page-title p{
        color:#64748b;
        font-size:14px;
    }

    /* FILTER */

    .filter-box{
        display:flex;
        gap:20px;
        margin-bottom:25px;
        flex-wrap:wrap;
    }

    .filter-select{
        flex:1;
        min-width:250px;
        background:white;
        border:1px solid #e5e7eb;
        padding:16px;
        border-radius:16px;
        outline:none;
        font-size:14px;
    }

    /* REPORT */

    .report-card{
        max-width:950px;
        margin:auto;
        background:white;
        border-radius:24px;
        padding:35px;
        border:1px solid #e5e7eb;
        box-shadow:0 10px 25px rgba(0,0,0,0.05);
    }

    .report-header{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        margin-bottom:30px;
    }

    .report-title h2{
        color:#2563eb;
        font-size:28px;
        margin-bottom:6px;
    }

    .report-title p{
        font-size:13px;
        color:#64748b;
    }

    .report-info{
        text-align:right;
        font-size:13px;
        color:#64748b;
    }

    .line{
        width:100%;
        height:3px;
        background:#2563eb;
        margin-bottom:30px;
        border-radius:10px;
    }

    .rekap-title{
        text-align:center;
        margin-bottom:25px;
    }

    .rekap-title h3{
        font-size:24px;
        margin-bottom:10px;
        color:#0f172a;
    }

    .rekap-title p{
        color:#64748b;
        font-size:14px;
    }

    /* STATS */

    .stats-grid{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:16px;
        margin-bottom:30px;
    }

    .stat-card{
        background:#f8fafc;
        border:1px solid #e5e7eb;
        border-radius:18px;
        padding:20px;
    }

    .stat-card h4{
        font-size:13px;
        color:#64748b;
        margin-bottom:10px;
    }

    .stat-card h2{
        color:#2563eb;
        font-size:30px;
    }

    /* TABLE */

    table{
        width:100%;
        border-collapse:collapse;
        margin-top:20px;
    }

    thead{
        background:#2563eb;
        color:white;
    }

    th{
        padding:16px;
        font-size:14px;
    }

    td{
        padding:16px;
        border-bottom:1px solid #f1f5f9;
        text-align:center;
        font-size:14px;
    }

    tr:hover{
        background:#f8fafc;
    }

    /* PRINT */

    .print-box{
        text-align:right;
        margin-top:25px;
    }

    .print-btn{
        background:#2563eb;
        color:white;
        border:none;
        padding:16px 24px;
        border-radius:16px;
        cursor:pointer;
        font-size:14px;
        font-weight:600;
    }

</style>

<div class="main-content">

    <div class="page-title">

        <h1>
            Pusat Laporan
        </h1>

        <p>
            Generate dan cetak laporan data sekolah.
        </p>

    </div>

    <!-- FILTER -->

    <div class="filter-box">

        <select class="filter-select">

            <option>
                Semua Tingkat
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

    <!-- REPORT -->

    <div class="report-card"
    id="printArea">

        <div class="report-header">

            <div class="report-title">

                <h2>
                    DINAS PENDIDIKAN
                </h2>

                <p>
                    Sistem Informasi Geografis Sekolah
                </p>

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

                <h4>
                    Total Sekolah
                </h4>

                <h2>

                    <?= $totalSekolah; ?>

                </h2>

            </div>

            <div class="stat-card">

                <h4>
                    Total TK
                </h4>

                <h2>

                    <?= $totalTK; ?>

                </h2>

            </div>

            <div class="stat-card">

                <h4>
                    Total SD
                </h4>

                <h2>

                    <?= $totalSD; ?>

                </h2>

            </div>

            <div class="stat-card">

                <h4>
                    Total SMP
                </h4>

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

                <?php foreach($sekolah as $s): ?>

                <tr>

                    <td>

                        <?= $s['nama_sekolah']; ?>

                    </td>

                    <td>

                        <?= $s['jenjang']; ?>

                    </td>

                    <td>

                        <?= $s['kecamatan']; ?>

                    </td>

                    <td>

                        Aktif

                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

    <!-- PRINT -->

    <div class="print-box">

        <button onclick="window.print()"
        class="print-btn">

            Cetak Laporan

        </button>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>