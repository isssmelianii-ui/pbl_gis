<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<style>

    .main-content{
        margin-left:280px;
        padding:30px;
        background:#f1f5f9;
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
        font-weight:700;
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
        max-width:950px;
        margin-left:auto;
        margin-right:auto;
    }

    .filter-select{
        flex:1;
        min-width:250px;
        background:white;
        border:1.5px solid #dbe3ef;
        padding:16px;
        border-radius:14px;
        outline:none;
        font-size:14px;
        color:#0f172a;
        transition:border-color .2s ease, box-shadow .2s ease;
    }

    .filter-select:focus{
        border-color:#1e3a8a;
        box-shadow:0 0 0 4px rgba(30,58,138,0.1);
    }

    /* REPORT */

    .report-card{
        max-width:950px;
        margin:auto;
        background:white;
        border-radius:24px;
        padding:35px;
        border:1px solid #e2e8f0;
        box-shadow:0 10px 30px rgba(15,23,42,0.06);
        position:relative;
        overflow:hidden;
    }

    .report-card::before{
        content:"";
        position:absolute;
        top:0;
        left:0;
        right:0;
        height:6px;
        background:linear-gradient(90deg,#0f172a,#1e3a8a,#2563eb);
    }

    .report-header{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        margin-bottom:30px;
    }

    .report-title h2{
        color:#1e3a8a;
        font-size:28px;
        margin-bottom:6px;
        font-weight:700;
        letter-spacing:.3px;
    }

    .report-title p{
        font-size:13px;
        color:#64748b;
    }

    .report-info{
        text-align:right;
        font-size:13px;
        color:#64748b;
        line-height:1.6;
    }

    .line{
        width:100%;
        height:3px;
        background:linear-gradient(90deg,#1e3a8a,#2563eb);
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
        font-weight:700;
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
        border:1px solid #e2e8f0;
        border-radius:18px;
        padding:20px;
        transition:box-shadow .2s ease;
    }

    .stat-card:hover{
        box-shadow:0 6px 16px rgba(15,23,42,0.06);
    }

    .stat-card h4{
        font-size:13px;
        color:#64748b;
        margin-bottom:10px;
        font-weight:600;
    }

    .stat-card h2{
        color:#1e3a8a;
        font-size:30px;
        font-weight:700;
    }

    /* TABLE */

    table{
        width:100%;
        border-collapse:collapse;
        margin-top:20px;
    }

    thead{
        background:linear-gradient(135deg,#1e3a8a,#0f172a);
        color:white;
    }

    th{
        padding:16px;
        font-size:14px;
        font-weight:600;
        letter-spacing:.2px;
    }

    td{
        padding:16px;
        border-bottom:1px solid #f1f5f9;
        text-align:center;
        font-size:14px;
        color:#334155;
    }

    tbody tr:hover{
        background:#f8fafc;
    }

    /* PRINT BUTTON */

    .print-box{
        text-align:right;
        margin-top:25px;
        max-width:950px;
        margin-left:auto;
        margin-right:auto;
    }

    .print-btn{
        background:linear-gradient(135deg,#1e3a8a,#0f172a);
        color:white;
        border:none;
        padding:16px 24px;
        border-radius:14px;
        cursor:pointer;
        font-size:14px;
        font-weight:600;
        letter-spacing:.2px;
        transition:opacity .2s ease, transform .2s ease;
    }

    .print-btn:hover{
        opacity:0.92;
        transform:translateY(-1px);
    }

    .print-btn:active{
        transform:translateY(0);
    }

    /* =========================
       PRINT AREA
       (sembunyikan semua, tampilkan hanya report-card,
       supaya header/sidebar apapun bentuknya tidak ikut tercetak)
    ========================= */

    @media print {

        body{
            background:white !important;
        }

        /* Sembunyikan SEMUA elemen di body dulu */
        body > *{
            visibility:hidden !important;
        }

        /* Tampilkan ulang hanya report-card dan seluruh isinya */
        .report-card,
        .report-card *{
            visibility:visible !important;
        }

        /* Lepaskan report-card dari layout asli & buat full halaman */
        .report-card{
            position:absolute !important;
            top:0 !important;
            left:0 !important;
            margin:0 !important;
            width:100% !important;
            max-width:100% !important;
            border:none !important;
            box-shadow:none !important;
            border-radius:0 !important;
            padding:20px !important;
        }

        .report-card::before{
            display:none !important;
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
            background:#1e3a8a !important;
            color:white !important;
            -webkit-print-color-adjust:exact;
            print-color-adjust:exact;
        }

        @page{
            margin:15mm;
        }
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

        <button type="submit" class="print-btn">
            Terapkan
        </button>

    </form>

    <!-- REPORT -->

    <div class="report-card">

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

            Cetak Laporan

        </button>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>