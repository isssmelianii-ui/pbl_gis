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
        --red-500:#c0392b;
    }

    .main-content {
        margin-left: 280px;
        padding: 32px;
        background: #f5f7fa;
        min-height: 100vh;
        font-family:'Plus Jakarta Sans',sans-serif;
        color:var(--ink-900);
    }

    .main-content .mono{
        font-family:'JetBrains Mono',monospace;
    }

    /* HEADER */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
        flex-wrap: wrap;
        gap: 20px;
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
        gap:9px;
    }

    .page-title .eyebrow::before{
        content:'';
        width:20px;
        height:1px;
        background:var(--gold-500);
    }

    .page-title h1 {
        font-size: 28px;
        font-weight:800;
        color: var(--ink-900);
        margin-bottom: 6px;
        letter-spacing:-0.4px;
    }

    .page-title p {
        color: var(--ink-600);
        font-size: 14px;
    }

    /* FILTER */

    .top-filter {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .search-box {
        width: 300px;
        background: var(--surface);
        border-radius: 12px;
        padding: 0 16px;
        display: flex;
        align-items: center;
        gap: 11px;
        border: 1.5px solid var(--line);
        transition:border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .search-box:focus-within{
        border-color:var(--navy-800);
        box-shadow:0 0 0 3.5px rgba(14,42,71,0.09);
    }

    .search-box i{
        color:var(--ink-400);
        font-size:13px;
        flex-shrink:0;
    }

    .search-box input {
        width: 100%;
        border: none;
        outline: none;
        font-size: 13.5px;
        font-family:inherit;
        padding:13px 0;
        background:transparent;
        color:var(--ink-900);
    }

    .search-box input::placeholder{
        color:var(--ink-400);
    }

    .filter-select {
        background: var(--surface);
        padding: 13px 16px;
        border-radius: 12px;
        border: 1.5px solid var(--line);
        font-size: 13.5px;
        font-family:inherit;
        color: var(--ink-900);
        outline: none;
        min-width: 200px;
        cursor:pointer;
        transition:border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .filter-select:focus{
        border-color:var(--navy-800);
        box-shadow:0 0 0 3.5px rgba(14,42,71,0.09);
    }

    .apply-btn{
        background: var(--navy-900);
        color: white;
        padding: 13px 24px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 700;
        font-family:inherit;
        transition: background 0.15s ease;
        border: none;
        cursor: pointer;
    }

    .apply-btn:hover {
        background: var(--navy-800);
    }

    /* TABLE */

    .table-card {
        background: var(--surface);
        border-radius: 20px;
        padding: 22px;
        border: 1px solid var(--line);
        overflow-x: auto;
        box-shadow: 0 10px 25px rgba(14,42,71,0.05);
    }

    .main-content table {
        width: 100%;
        border-collapse: collapse;
        min-width:720px;
    }

    .main-content thead {
        background: #f8fafc;
    }

    .main-content th {
        padding: 16px;
        text-align: left;
        font-size: 11px;
        font-weight:700;
        letter-spacing:0.6px;
        font-family:'JetBrains Mono',monospace;
        color: var(--ink-400);
        border-bottom:1px solid var(--line);
    }

    .main-content td {
        padding: 17px 16px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 13.5px;
        color: var(--ink-900);
        vertical-align:middle;
    }

    .main-content tbody tr:last-child td{
        border-bottom:none;
    }

    .main-content tbody tr:hover {
        background: #f8fafc;
    }

    /* BADGE */

    .badge {
        padding: 7px 14px;
        border-radius: 30px;
        font-size: 11.5px;
        font-weight: 700;
        display:inline-block;
        color:white;
    }

    .tk {
        background: #5b6b7c;
    }

    .sd {
        background: var(--navy-900);
    }

    .smp {
        background: var(--gold-500);
    }

    .status {
        background:none;
        color: var(--green-500);
        font-weight:600;
        font-size:13px;
        padding:0;
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

    /* BUTTON */

    .aksi-group{
        display:flex;
        gap:9px;
    }

    .detail-btn {
        background: #f0f4f9;
        color: var(--navy-900);
        padding: 9px 15px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 12.5px;
        font-weight: 700;
        transition: background 0.15s ease, color 0.15s ease;
        border: none;
        cursor: pointer;
    }

    .detail-btn:hover {
        background: var(--navy-900);
        color:white;
    }

    .delete-btn {
        background: #fdecec;
        color: var(--red-500);
        padding: 9px 15px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 12.5px;
        font-weight: 700;
        transition: background 0.15s ease, color 0.15s ease;
        border:none;
        cursor:pointer;
    }

    .delete-btn:hover {
        background: var(--red-500);
        color:white;
    }

    .website-link {
        color: var(--navy-900);
        text-decoration: none;
        font-weight: 700;
        font-size:13px;
    }

    .website-link:hover{
        text-decoration:underline;
    }

    .empty-row{
        text-align:center;
        padding:32px;
        color:var(--ink-600);
        font-size:13.5px;
    }

    @media(max-width:992px){

        .main-content{
            margin-left:0;
            padding:88px 20px 20px;
        }

    }

    @media(max-width:700px){

        .search-box, .filter-select{
            width:100%;
        }

        .top-filter{
            flex-direction:column;
        }

    }

</style>

<div class="main-content">

    <!-- HEADER -->

    <div class="page-header">

        <div class="page-title">

            <div class="eyebrow">Manajemen Data</div>

            <h1>
                Data Sekolah
            </h1>

            <p>
                Monitoring data sekolah realtime berdasarkan operator sekolah.
            </p>

        </div>

    </div>

    <!-- FILTER -->

    <form method="GET" class="top-filter">

        <!-- SEARCH -->

        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input type="text" name="keyword" placeholder="Cari sekolah..." value="<?= $keyword ?? ''; ?>">

        </div>

        <!-- KECAMATAN -->

        <select name="kecamatan" class="filter-select">

            <option value="">
                Semua Kecamatan
            </option>

            <option value="Lintau Buo" <?= ($kecamatan == 'Lintau Buo') ? 'selected' : ''; ?>>

                Lintau Buo

            </option>

            <option value="Padang Ganting" <?= ($kecamatan == 'Padang Ganting') ? 'selected' : ''; ?>>

                Padang Ganting

            </option>

            <option value="Tanjung Emas" <?= ($kecamatan == 'Tanjung Emas') ? 'selected' : ''; ?>>

                Tanjung Emas

            </option>

        </select>

        <!-- JENJANG -->

        <select name="jenjang" class="filter-select">

            <option value="">
                Semua Jenjang
            </option>

            <option value="TK" <?= ($jenjang == 'TK') ? 'selected' : ''; ?>>

                TK

            </option>

            <option value="SD" <?= ($jenjang == 'SD') ? 'selected' : ''; ?>>

                SD

            </option>

            <option value="SMP" <?= ($jenjang == 'SMP') ? 'selected' : ''; ?>>

                SMP

            </option>

        </select>

        <!-- BUTTON -->

        <button type="submit" class="apply-btn">

            Terapkan

        </button>

    </form>

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
                        Akreditasi
                    </th>

                    <th>
                        Website
                    </th>

                    <th>
                        Status
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php if (!empty($sekolah)): ?>

                    <?php foreach ($sekolah as $s): ?>

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

                                <?= $s['akreditasi']; ?>

                            </td>

                            <td>

                                <?php if ($s['website'] != ''): ?>

                                    <a href="<?= $s['website']; ?>" target="_blank" class="website-link">

                                        Website

                                    </a>

                                <?php else: ?>

                                    -

                                <?php endif; ?>

                            </td>

                            <td>

                                <span class="badge status">

                                    Aktif

                                </span>

                            </td>

                            <td>

                                <div class="aksi-group">

                                    <!-- DETAIL -->

                                    <a href="<?= base_url('public-website/detail/' . $s['id']); ?>" class="detail-btn">
                                        Detail
                                    </a>

                                    <!-- HAPUS -->

                                    <a href="<?= base_url('/superadmin/hapus-sekolah/' . $s['id']); ?>"
                                        onclick="return confirm('Yakin ingin menghapus data sekolah ini?')" class="delete-btn">

                                        Hapus

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="6" class="empty-row">

                            Belum ada data sekolah.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>