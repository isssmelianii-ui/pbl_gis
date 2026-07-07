<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<style>

    .stat-card{
        background:#fff;
        border-radius:14px;
        padding:18px 20px;
        box-shadow:var(--shadow);
        border:1px solid #f1f5f9;
        transition:.25s;
        height:100%;
        display:flex;
        align-items:center;
        gap:14px;
    }

    .stat-card:hover{
        transform:translateY(-2px);
        box-shadow:var(--shadow-hover);
    }

    .stat-icon{
        width:44px;
        height:44px;
        border-radius:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:18px;
        color:#fff;
        flex-shrink:0;
    }

    .blue{
        background:#2563eb;
    }

    .cyan{
        background:#0284c7;
    }

    .stat-number{
        font-size:22px;
        font-weight:700;
        color:#111827;
        margin:0;
        line-height:1.2;
    }

    .stat-label{
        font-size:12px;
        color:#6b7280;
        margin:0;
    }

    /* MENU */

    .menu-grid .menu-card{
        background:#fff;
        border-radius:14px;
        padding:18px 20px;
        box-shadow:var(--shadow);
        border:1px solid #f1f5f9;
        transition:.25s;
        text-decoration:none;
        display:block;
        height:100%;
    }

    .menu-grid .menu-card:hover{
        transform:translateY(-3px);
        box-shadow:var(--shadow-hover);
    }

    .menu-icon{
        width:40px;
        height:40px;
        border-radius:10px;
        background:#eff6ff;
        color:#2563eb;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:17px;
        margin-bottom:10px;
    }

    .menu-title{
        font-weight:600;
        color:#111827;
        font-size:14px;
        margin-bottom:4px;
    }

    .menu-desc{
        color:#6b7280;
        font-size:12px;
        margin-bottom:10px;
    }

    .menu-action{
        color:#2563eb;
        font-weight:600;
        font-size:12px;
        display:flex;
        align-items:center;
        gap:4px;
    }

    /* COVER */

    .cover-preview{
        background:#fff;
        border-radius:14px;
        padding:18px 20px;
        box-shadow:var(--shadow);
        border:1px solid #f1f5f9;
        text-align:center;
    }

    .cover-title{
        font-weight:600;
        color:#111827;
        font-size:14px;
        margin-bottom:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:8px;
    }

    .badge-cover{
        font-size:9px;
        padding:2px 10px;
        border-radius:20px;
        font-weight:500;
    }

    .exists{
        background:#d1fae5;
        color:#065f46;
    }

    .empty{
        background:#fee2e2;
        color:#991b1b;
    }

    .cover-wrapper{
        border-radius:12px;
        overflow:hidden;
        background:#f3f4f6;
        border:2px dashed #d1d5db;
    }

    .cover-wrapper img{
        width:100%;
        height:160px;
        object-fit:cover;
        display:block;
    }

    .cover-placeholder{
        height:160px;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        padding:20px;
    }

    .cover-placeholder i{
        font-size:40px;
        color:#9ca3af;
        margin-bottom:8px;
    }

    .cover-placeholder span{
        color:#6b7280;
        font-size:13px;
    }

    .cover-functions{
        font-size:11px;
        color:#6b7280;
        margin-top:8px;
        display:flex;
        justify-content:center;
        gap:16px;
        flex-wrap:wrap;
    }

    .cover-functions span{
        display:inline-flex;
        align-items:center;
        gap:4px;
    }

    .cover-functions i{
        color:#2563eb;
    }

    .btn-upload-cover{
        background:#2563eb;
        color:#fff;
        border:none;
        padding:8px 20px;
        border-radius:8px;
        font-weight:500;
        font-size:12px;
        margin-top:12px;
        display:inline-flex;
        align-items:center;
        gap:6px;
        cursor:pointer;
    }

    /* STATUS */

    .status-card{
        background:#fff;
        border-radius:14px;
        padding:14px 18px;
        box-shadow:var(--shadow);
        border:1px solid #f1f5f9;
        margin-bottom:10px;
    }

    .status-label{
        font-size:10px;
        text-transform:uppercase;
        color:#6b7280;
        font-weight:600;
    }

    .status-value{
        font-weight:600;
        color:#111827;
        font-size:14px;
        margin-top:2px;
    }

    .status-badge{
        display:inline-block;
        padding:4px 12px;
        border-radius:20px;
        font-size:11px;
        font-weight:600;
    }

    .draft{
        background:#fef3c7;
        color:#92400e;
    }

    .inactive{
        background:#fee2e2;
        color:#991b1b;
    }

    /* GREETING */

    .greeting-section h2{
        font-weight:700;
        color:#111827;
        font-size:22px;
        margin:0;
    }

    .greeting-section p{
        color:#6b7280;
        font-size:13px;
        margin-top:4px;
    }

    /* PUBLISH */

    .publish-section{
        background:#fff;
        border-radius:14px;
        padding:20px 24px;
        box-shadow:var(--shadow);
        border:1px solid #f1f5f9;
        margin-top:20px;
    }

    .publish-title{
        font-weight:600;
        color:#111827;
        font-size:14px;
        margin-bottom:2px;
    }

    .publish-desc{
        color:#6b7280;
        font-size:12px;
        margin-bottom:10px;
    }

    .btn-publish{
        background:#059669;
        color:#fff;
        border:none;
        padding:10px 24px;
        border-radius:8px;
        font-weight:600;
        font-size:13px;
        text-decoration:none;
        display:inline-block;
    }

    .btn-publish:hover{
        background:#047857;
        color:#fff;
    }

    .btn-preview{
        background:#2563eb;
        color:#fff;
        border:none;
        padding:10px 24px;
        border-radius:8px;
        font-weight:600;
        font-size:13px;
        text-decoration:none;
        display:inline-block;
        margin-right:10px;
    }

    .btn-preview:hover{
        background:#1d4ed8;
        color:#fff;
    }

</style>

<div class="greeting-section mb-3">

    <h2>

        Selamat Datang,

        <span style="color:#2563eb;">

            <?= session()->get('name') ?? 'Operator'; ?>

        </span>

        👋

    </h2>

    <p>
        Kelola data sekolah Anda dengan mudah dan cepat
    </p>

</div>

<div class="row g-3 mb-4">

    <div class="col-6 col-md-6">

        <div class="stat-card">

            <div class="stat-icon blue">

                <i class="bi bi-building"></i>

            </div>

            <div>

                <p class="stat-number">

                    <?= $total_sekolah ?? 0 ?>

                </p>

                <p class="stat-label">

                    Total Sekolah

                </p>

            </div>

        </div>

    </div>

    <div class="col-6 col-md-6">

        <div class="stat-card">

            <div class="stat-icon cyan">

                <i class="bi bi-calendar-check"></i>

            </div>

            <div>

                <p class="stat-number">

                    <?= date('d M Y') ?>

                </p>

                <p class="stat-label">

                    Hari Ini

                </p>

            </div>

        </div>

    </div>

</div>

<div class="row g-4">

    <div class="col-lg-8">

        <h5 class="fw-semibold mb-2"
        style="color:#111827;font-size:16px;">

            <i class="bi bi-grid-3x3-gap-fill text-primary me-2"></i>

            Kelompok Pengelolaan Profil Sekolah

        </h5>

        <p class="text-muted small mb-3">

            Kelola semua informasi sekolah dengan mudah.

        </p>

        <div class="row g-3 menu-grid">

            <div class="col-md-6">

                <a href="<?= base_url('admin/profil') ?>"
                class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <h6 class="menu-title">
                        Edit Profil Sekolah
                    </h6>

                    <p class="menu-desc">
                        Kelola identitas dan informasi sekolah
                    </p>

                </a>

            </div>

            <div class="col-md-6">

                <a href="<?= base_url('admin/visi') ?>"
                class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-eye"></i>
                    </div>

                    <h6 class="menu-title">
                        Visi & Misi
                    </h6>

                    <p class="menu-desc">
                        Kelola visi dan misi sekolah
                    </p>

                </a>

            </div>

            <div class="col-md-6">

                <a href="<?= base_url('admin/kepala') ?>"
                class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-person-badge"></i>
                    </div>

                    <h6 class="menu-title">
                        Kepala Sekolah
                    </h6>

                    <p class="menu-desc">
                        Kelola data kepala sekolah
                    </p>

                </a>

            </div>

            <div class="col-md-6">

                <a href="<?= base_url('admin/lokasi') ?>"
                class="menu-card">

                    <div class="menu-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <h6 class="menu-title">
                        Lokasi
                    </h6>

                    <p class="menu-desc">
                        Atur lokasi dan peta sekolah
                    </p>

                </a>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="cover-preview mb-3">

            <div class="cover-title">

                <i class="bi bi-image text-primary"></i>

                Preview Cover Sekolah

                <?php if(!empty($sekolah) && !empty($sekolah['cover'])): ?>

                    <span class="badge-cover exists">
                        Ada
                    </span>

                <?php else: ?>

                    <span class="badge-cover empty">
                        Kosong
                    </span>

                <?php endif; ?>

            </div>

            <div class="cover-wrapper">

                <?php if(!empty($sekolah) && !empty($sekolah['cover'])): ?>

                    <img src="<?= base_url('uploads/cover/'.$sekolah['cover']); ?>">

                <?php else: ?>

                    <div class="cover-placeholder">

                        <i class="bi bi-image"></i>

                        <span>
                            Cover Belum Diupload
                        </span>

                    </div>

                <?php endif; ?>

            </div>

            <div class="cover-functions">

                <span>
                    <i class="bi bi-check-circle"></i>
                    Halaman Utama
                </span>

                <span>
                    <i class="bi bi-check-circle"></i>
                    Header Website
                </span>

            </div>

            <button class="btn-upload-cover"
            onclick="window.location.href='<?= base_url('admin/profil') ?>'">

                <i class="bi bi-upload"></i>

                <?= (!empty($sekolah) && !empty($sekolah['cover'])) ? 'Ganti Cover' : 'Upload Cover'; ?>

            </button>

        </div>

        <h6 class="fw-semibold mb-2"
        style="color:#111827;font-size:13px;">

            <i class="bi bi-globe2 text-primary me-2"></i>

            Status Website

        </h6>

        <div class="status-card">

            <p class="status-label">
                Status
            </p>

            <p class="status-value">

                <?php if(!empty($sekolah) && ($sekolah['status_publish'] ?? 0) == 1): ?>

                    <span class="status-badge"
                    style="background:#dcfce7;color:#166534;">

                        Published

                    </span>

                <?php else: ?>

                    <span class="status-badge draft">

                        Draft

                    </span>

                <?php endif; ?>

            </p>

        </div>

        <div class="status-card">

            <p class="status-label">
                Website Publik
            </p>

            <p class="status-value">

                <?php if(!empty($sekolah) && ($sekolah['status_publish'] ?? 0) == 1): ?>

                    <span class="status-badge"
                    style="background:#dbeafe;color:#1e40af;">

                        Aktif

                    </span>

                <?php else: ?>

                    <span class="status-badge inactive">

                        Belum Aktif

                    </span>

                <?php endif; ?>

            </p>

        </div>

    </div>

</div>

<div class="publish-section">

    <div class="row align-items-center">

        <div class="col-md-8">

            <div class="publish-title">

                <i class="bi bi-rocket-takeoff text-primary me-2"></i>

                Publikasi Website

            </div>

            <div class="publish-desc">

                Pastikan data sekolah sudah benar sebelum dipublikasikan.

            </div>

        </div>

        <div class="col-md-4 text-md-end mt-3 mt-md-0">

            <?php if(!empty($sekolah)): ?>

                <?php if(($sekolah['status_publish'] ?? 0) == 1): ?>

                    <a href="<?= base_url('detail-sekolah/'.$sekolah['id']); ?>"
                    class="btn-preview">

                        <i class="bi bi-eye me-1"></i>

                        Lihat Website

                    </a>

                <?php else: ?>

                    <a href="<?= base_url('admin/publish/'.$sekolah['id']); ?>"
                    class="btn-publish">

                        <i class="bi bi-globe me-1"></i>

                        Publikasikan

                    </a>

                <?php endif; ?>

            <?php else: ?>

                <button class="btn-publish"
                disabled
                style="opacity:.6;cursor:not-allowed;">

                    Lengkapi Profil Dulu

                </button>

            <?php endif; ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>