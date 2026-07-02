<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<style>

    .main-content{
        margin-left:280px;
        padding:30px;
        background:#f8fafc;
        min-height:100vh;
    }

    /* HEADER */

    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        flex-wrap:wrap;
        gap:20px;
    }

    .page-title h1{
        font-size:30px;
        color:#0f172a;
        margin-bottom:8px;
    }

    .page-title p{
        color:#64748b;
        font-size:14px;
    }

    /* FILTER */

    .top-filter{
        display:flex;
        gap:14px;
        flex-wrap:wrap;
        margin-bottom:25px;
    }

    .search-box{
        width:320px;
        background:white;
        border-radius:18px;
        padding:15px 18px;
        display:flex;
        align-items:center;
        gap:12px;
        border:1px solid #e5e7eb;
        box-shadow:0 5px 15px rgba(0,0,0,0.03);
    }

    .search-box input{
        width:100%;
        border:none;
        outline:none;
        font-size:14px;
    }

    .filter-select{
        background:white;
        border:none;
        padding:15px 18px;
        border-radius:18px;
        border:1px solid #e5e7eb;
        font-size:13px;
        color:#334155;
        outline:none;
        min-width:220px;
        box-shadow:0 5px 15px rgba(0,0,0,0.03);
    }

    /* TABLE */

    .table-card{
        background:white;
        border-radius:24px;
        padding:25px;
        border:1px solid #e5e7eb;
        overflow-x:auto;
        box-shadow:0 10px 25px rgba(0,0,0,0.04);
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    thead{
        background:#f8fafc;
    }

    th{
        padding:18px;
        text-align:left;
        font-size:13px;
        color:#475569;
    }

    td{
        padding:18px;
        border-bottom:1px solid #f1f5f9;
        font-size:14px;
        color:#334155;
    }

    tr:hover{
        background:#f8fafc;
    }

    /* BADGE */

    .badge{
        padding:8px 14px;
        border-radius:30px;
        font-size:12px;
        font-weight:600;
    }

    .tk{
        background:#fee2e2;
        color:#dc2626;
    }

    .sd{
        background:#dbeafe;
        color:#2563eb;
    }

    .smp{
        background:#dcfce7;
        color:#16a34a;
    }

    .status{
        background:#dcfce7;
        color:#16a34a;
    }

    /* BUTTON */

    .detail-btn{
        background:#2563eb;
        color:white;
        padding:10px 16px;
        border-radius:12px;
        text-decoration:none;
        font-size:13px;
        font-weight:600;
        transition:0.3s;
    }

    .detail-btn:hover{
        background:#1d4ed8;
    }

    .website-link{
        color:#2563eb;
        text-decoration:none;
        font-weight:500;
    }

</style>

<div class="main-content">

    <!-- HEADER -->

    <div class="page-header">

        <div class="page-title">

            <h1>
                Data Sekolah
            </h1>

            <p>
                Monitoring data sekolah realtime berdasarkan operator sekolah.
            </p>

        </div>

    </div>

    <!-- FILTER -->

    <div class="top-filter">

        <div class="search-box">

            🔍

            <input type="text"
            placeholder="Cari sekolah...">

        </div>

        <!-- KECAMATAN -->

        <select class="filter-select">

            <option>
                Semua Kecamatan
            </option>

            <option>
                Lintau Buo
            </option>

            <option>
                Lintau Buo Utara
            </option>

            <option>
                Padang Ganting
            </option>

            <option>
                Tanjung Emas
            </option>

        </select>

        <!-- JENJANG -->

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

    </div>

    <!-- TABLE -->

    <div class="table-card">

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
                        Website
                    </th>

                    <th>
                        Status
                    </th>

                    <th>
                        Detail
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

                            <span class="badge 
                            <?= strtolower($s['jenjang']); ?>">

                                <?= $s['jenjang']; ?>

                            </span>

                        </td>

                        <td>

                            <?= $s['kecamatan']; ?>

                        </td>

                        <td>

                            <?php if($s['website'] != '') : ?>

                                <a href="<?= $s['website']; ?>"
                                target="_blank"
                                class="website-link">

                                    Website

                                </a>

                            <?php else : ?>

                                -

                            <?php endif; ?>

                        </td>

                        <td>

                            <span class="badge status">

                                Aktif

                            </span>

                        </td>

                        <td>

                            <a href="<?= base_url('/superadmin/detail-sekolah/'.$s['id']); ?>"
                            class="detail-btn">

                                Detail

                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>

                        <td colspan="6"
                        style="
                            text-align:center;
                            padding:30px;
                            color:#64748b;
                        ">

                            Belum ada data sekolah.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>