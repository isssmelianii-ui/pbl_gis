<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<div class="main-content">

    <!-- HEADER -->

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        flex-wrap:wrap;
        gap:20px;
    ">

        <div>

            <h1 style="
                font-size:30px;
                color:#0f172a;
                margin-bottom:8px;
            ">

                Dashboard Super Admin

            </h1>

            <p style="
                color:#64748b;
                font-size:14px;
            ">

                Sistem Informasi Pemetaan Sekolah Realtime

            </p>

        </div>

        <div style="
            background:white;
            padding:14px 20px;
            border-radius:14px;
            border:1px solid #e5e7eb;
            font-size:14px;
            color:#475569;
            box-shadow:0 5px 15px rgba(0,0,0,0.03);
        ">

            Halo,
            <b><?= session()->get('name'); ?></b>

        </div>

    </div>

    <!-- CARD STATISTIK -->

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
        gap:20px;
        margin-bottom:30px;
    ">

        <!-- TOTAL SEKOLAH -->

        <div style="
            background:white;
            padding:25px;
            border-radius:20px;
            border:1px solid #e5e7eb;
            box-shadow:0 10px 25px rgba(0,0,0,0.04);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#dbeafe;
                border-radius:16px;
                display:flex;
                justify-content:center;
                align-items:center;
                margin-bottom:18px;
                font-size:24px;
            ">

                🏫

            </div>

            <p style="
                color:#64748b;
                font-size:14px;
                margin-bottom:10px;
            ">

                Total Sekolah

            </p>

            <h2 style="
                font-size:36px;
                color:#0f172a;
            ">

                <?= $totalSekolah; ?>

            </h2>

        </div>

        <!-- TOTAL TK -->

        <div style="
            background:white;
            padding:25px;
            border-radius:20px;
            border:1px solid #e5e7eb;
            box-shadow:0 10px 25px rgba(0,0,0,0.04);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#dcfce7;
                border-radius:16px;
                display:flex;
                justify-content:center;
                align-items:center;
                margin-bottom:18px;
                font-size:24px;
            ">

                🎓

            </div>

            <p style="
                color:#64748b;
                font-size:14px;
                margin-bottom:10px;
            ">

                Total TK

            </p>

            <h2 style="
                font-size:36px;
                color:#0f172a;
            ">

                <?= $totalTK; ?>

            </h2>

        </div>

        <!-- TOTAL SD -->

        <div style="
            background:white;
            padding:25px;
            border-radius:20px;
            border:1px solid #e5e7eb;
            box-shadow:0 10px 25px rgba(0,0,0,0.04);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#fef3c7;
                border-radius:16px;
                display:flex;
                justify-content:center;
                align-items:center;
                margin-bottom:18px;
                font-size:24px;
            ">

                📚

            </div>

            <p style="
                color:#64748b;
                font-size:14px;
                margin-bottom:10px;
            ">

                Total SD

            </p>

            <h2 style="
                font-size:36px;
                color:#0f172a;
            ">

                <?= $totalSD; ?>

            </h2>

        </div>

        <!-- TOTAL SMP -->

        <div style="
            background:white;
            padding:25px;
            border-radius:20px;
            border:1px solid #e5e7eb;
            box-shadow:0 10px 25px rgba(0,0,0,0.04);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#fee2e2;
                border-radius:16px;
                display:flex;
                justify-content:center;
                align-items:center;
                margin-bottom:18px;
                font-size:24px;
            ">

                🏢

            </div>

            <p style="
                color:#64748b;
                font-size:14px;
                margin-bottom:10px;
            ">

                Total SMP

            </p>

            <h2 style="
                font-size:36px;
                color:#0f172a;
            ">

                <?= $totalSMP; ?>

            </h2>

        </div>

    </div>

    <!-- TABEL REALTIME -->

    <div style="
        background:white;
        border-radius:24px;
        padding:25px;
        border:1px solid #e5e7eb;
        box-shadow:0 10px 25px rgba(0,0,0,0.04);
    ">

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            flex-wrap:wrap;
            gap:10px;
        ">

            <div>

                <h2 style="
                    font-size:22px;
                    color:#0f172a;
                    margin-bottom:6px;
                ">

                    Pembaruan Data Realtime

                </h2>

                <p style="
                    color:#64748b;
                    font-size:14px;
                ">

                    Data sekolah terbaru yang diperbarui operator sekolah.

                </p>

            </div>

        </div>

        <div style="overflow-x:auto;">

            <table style="
                width:100%;
                border-collapse:collapse;
            ">

                <thead>

                    <tr style="
                        background:#f8fafc;
                        text-align:left;
                    ">

                        <th style="padding:16px;">
                            Nama Sekolah
                        </th>

                        <th style="padding:16px;">
                            Kecamatan
                        </th>

                        <th style="padding:16px;">
                            Jenjang
                        </th>

                        <th style="padding:16px;">
                            Update Terakhir
                        </th>

                        <th style="padding:16px;">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(!empty($latestSekolah)) : ?>

                        <?php foreach($latestSekolah as $s) : ?>

                            <tr style="
                                border-bottom:1px solid #f1f5f9;
                            ">

                                <td style="padding:16px;">

                                    <?= $s['nama_sekolah']; ?>

                                </td>

                                <td style="padding:16px;">

                                    <?= $s['kecamatan']; ?>

                                </td>

                                <td style="padding:16px;">

                                    <span style="
                                        background:#dbeafe;
                                        color:#2563eb;
                                        padding:8px 14px;
                                        border-radius:30px;
                                        font-size:12px;
                                        font-weight:600;
                                    ">

                                        <?= $s['jenjang']; ?>

                                    </span>

                                </td>

                                <td style="padding:16px;">

                                    <?= $s['updated_at']; ?>

                                </td>

                                <td style="padding:16px;">

                                    <button style="
                                        background:#2563eb;
                                        color:white;
                                        border:none;
                                        padding:10px 16px;
                                        border-radius:10px;
                                        cursor:pointer;
                                    ">

                                        Detail

                                    </button>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>

                            <td colspan="5"
                            style="
                                padding:30px;
                                text-align:center;
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

</div>

<?= $this->include('layouts/footer'); ?>