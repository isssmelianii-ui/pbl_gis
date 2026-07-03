<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<style>
    /* ============================================
       DASHBOARD STYLES
    ============================================ */

    /* ---- Stat Cards ---- */
    .stat-card {
        background: #fff;
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: var(--shadow);
        border: 1px solid #f1f5f9;
        transition: all 0.25s ease;
        height: 100%;
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary-light);
    }

    .stat-card .stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: #fff;
        flex-shrink: 0;
    }

    .stat-card .stat-icon.blue { background: var(--primary); }
    .stat-card .stat-icon.green { background: #059669; }
    .stat-card .stat-icon.orange { background: #d97706; }
    .stat-card .stat-icon.cyan { background: #0284c7; }

    .stat-card .stat-number {
        font-size: 22px;
        font-weight: 700;
        color: #111827;
        margin: 0;
        line-height: 1.2;
    }

    .stat-card .stat-label {
        font-size: 12px;
        color: #6b7280;
        margin: 0;
    }

    /* ---- Menu Cards ---- */
    .menu-grid .menu-card {
        background: #fff;
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: var(--shadow);
        border: 1px solid #f1f5f9;
        transition: all 0.25s ease;
        text-decoration: none;
        display: block;
        height: 100%;
    }

    .menu-grid .menu-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary-light);
    }

    .menu-grid .menu-card .menu-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--primary-50);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        margin-bottom: 10px;
        transition: all 0.25s ease;
    }

    .menu-grid .menu-card:hover .menu-icon {
        background: var(--primary);
        color: #fff;
    }

    .menu-grid .menu-card .menu-title {
        font-weight: 600;
        color: #111827;
        font-size: 14px;
        margin: 0 0 3px 0;
    }

    .menu-grid .menu-card .menu-desc {
        color: #6b7280;
        font-size: 12px;
        margin: 0 0 10px 0;
    }

    .menu-grid .menu-card .menu-action {
        color: var(--primary);
        font-weight: 600;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .menu-grid .menu-card .menu-action i {
        font-size: 11px;
        transition: transform 0.25s ease;
    }

    .menu-grid .menu-card:hover .menu-action i {
        transform: translateX(4px);
    }

    /* ---- Status Cards ---- */
    .status-card {
        background: #fff;
        border-radius: 14px;
        padding: 14px 18px;
        box-shadow: var(--shadow);
        border: 1px solid #f1f5f9;
        margin-bottom: 10px;
    }

    .status-card:last-child { margin-bottom: 0; }

    .status-card .status-label {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #6b7280;
        font-weight: 600;
    }

    .status-card .status-value {
        font-weight: 600;
        color: #111827;
        font-size: 14px;
        margin: 2px 0 0 0;
    }

    .status-badge {
        display: inline-block;
        padding: 2px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .status-badge.draft { background: #fef3c7; color: #92400e; }
    .status-badge.published { background: #d1fae5; color: #065f46; }
    .status-badge.inactive { background: #fee2e2; color: #991b1b; }
    .status-badge.active { background: #dbeafe; color: #1e40af; }

    /* ---- Cover Preview ---- */
    .cover-preview {
        background: #fff;
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: var(--shadow);
        border: 1px solid #f1f5f9;
        text-align: center;
    }

    .cover-preview .cover-title {
        font-weight: 600;
        color: #111827;
        font-size: 14px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .cover-preview .cover-title .badge-cover {
        font-size: 9px;
        padding: 2px 10px;
        border-radius: 20px;
        font-weight: 500;
    }

    .badge-cover.exists { background: #d1fae5; color: #065f46; }
    .badge-cover.empty { background: #fee2e2; color: #991b1b; }

    .cover-preview .cover-wrapper {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        background: #f3f4f6;
        border: 2px dashed #d1d5db;
        transition: all 0.3s ease;
    }

    .cover-preview .cover-wrapper.has-cover {
        border: 2px solid #e5e7eb;
    }

    .cover-preview .cover-wrapper img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        display: block;
    }

    .cover-preview .cover-wrapper .cover-placeholder {
        height: 160px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .cover-preview .cover-wrapper .cover-placeholder i {
        font-size: 40px;
        color: #9ca3af;
        margin-bottom: 8px;
    }

    .cover-preview .cover-wrapper .cover-placeholder span {
        color: #6b7280;
        font-size: 13px;
    }

    .cover-preview .cover-wrapper .cover-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.6));
        padding: 30px 16px 14px;
        text-align: left;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .cover-preview .cover-wrapper:hover .cover-overlay {
        opacity: 1;
    }

    .cover-preview .cover-wrapper .cover-overlay .cover-info {
        color: white;
        font-size: 12px;
    }

    .cover-preview .cover-wrapper .cover-overlay .cover-info i {
        margin-right: 6px;
    }

    .cover-preview .btn-upload-cover {
        background: var(--primary);
        color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 12px;
        transition: all 0.25s ease;
        margin-top: 12px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .cover-preview .btn-upload-cover:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
    }

    .cover-preview .cover-functions {
        font-size: 11px;
        color: #6b7280;
        margin-top: 8px;
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .cover-preview .cover-functions span {
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .cover-preview .cover-functions i {
        font-size: 12px;
        color: var(--primary);
    }

    /* ---- Progress Section ---- */
    .progress-section {
        background: #fff;
        border-radius: 14px;
        padding: 20px 24px;
        box-shadow: var(--shadow);
        border: 1px solid #f1f5f9;
        margin-top: 20px;
    }

    .progress-section .progress-title {
        font-weight: 600;
        color: #111827;
        font-size: 14px;
        margin-bottom: 2px;
    }

    .progress-section .progress-subtitle {
        color: #6b7280;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .progress-section .progress {
        height: 8px;
        border-radius: 10px;
        background: #e5e7eb;
    }

    .progress-section .progress-bar {
        background: linear-gradient(90deg, #1a56db, #3b82f6);
        border-radius: 10px;
        transition: width 0.6s ease;
    }

    .progress-section .progress-text {
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        margin-top: 5px;
    }

    /* ---- Missing Items ---- */
    .missing-items {
        margin-top: 12px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6px 16px;
    }

    .missing-items .missing-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: #6b7280;
        padding: 4px 0;
    }

    .missing-items .missing-item i {
        font-size: 14px;
    }

    .missing-items .missing-item .text-danger { color: #ef4444; }
    .missing-items .missing-item .text-success { color: #16a34a; }

    /* ---- Publish Section ---- */
    .publish-section {
        background: #fff;
        border-radius: 14px;
        padding: 20px 24px;
        box-shadow: var(--shadow);
        border: 1px solid #f1f5f9;
        margin-top: 20px;
    }

    .publish-section .publish-title {
        font-weight: 600;
        color: #111827;
        font-size: 14px;
        margin-bottom: 2px;
    }

    .publish-section .publish-desc {
        color: #6b7280;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .publish-section .btn-publish {
        background: #059669;
        color: #fff;
        border: none;
        padding: 7px 28px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 13px;
        transition: all 0.25s ease;
    }

    .publish-section .btn-publish:hover:not(:disabled) {
        background: #047857;
    }

    .publish-section .btn-publish:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* ---- Greeting ---- */
    .greeting-section h2 {
        font-weight: 700;
        color: #111827;
        font-size: 22px;
        margin: 0;
    }

    .greeting-section p {
        color: #6b7280;
        font-size: 13px;
        margin: 2px 0 0 0;
    }

    /* ---- Responsive ---- */
    @media (max-width: 992px) {
        .greeting-section h2 { font-size: 19px; }
        .stat-card .stat-number { font-size: 19px; }
        .stat-card { padding: 14px 16px; }
        .missing-items { grid-template-columns: 1fr; }
    }

    @media (max-width: 768px) {
        .greeting-section h2 { font-size: 17px; }
        .stat-card { padding: 12px 14px; gap: 10px; }
        .stat-card .stat-icon { width: 36px; height: 36px; font-size: 15px; }
        .stat-card .stat-number { font-size: 17px; }
        .stat-card .stat-label { font-size: 10px; }
        .menu-grid .menu-card { padding: 14px 16px; }
        .cover-preview .cover-wrapper img,
        .cover-preview .cover-wrapper .cover-placeholder { height: 120px; }
        .progress-section { padding: 16px 18px; }
        .publish-section { padding: 16px 18px; }
    }

    @media (max-width: 576px) {
        .greeting-section h2 { font-size: 15px; }
        .stat-card { padding: 10px 12px; gap: 8px; border-radius: 10px; }
        .stat-card .stat-icon { width: 30px; height: 30px; font-size: 12px; border-radius: 8px; }
        .stat-card .stat-number { font-size: 15px; }
        .stat-card .stat-label { font-size: 9px; }
        .menu-grid .menu-card { padding: 12px 14px; border-radius: 10px; }
        .cover-preview .cover-wrapper img,
        .cover-preview .cover-wrapper .cover-placeholder { height: 100px; }
        .cover-preview .cover-wrapper .cover-placeholder i { font-size: 28px; }
        .missing-items { grid-template-columns: 1fr; }
        .cover-preview .cover-functions { flex-direction: column; gap: 4px; }
        .publish-section .btn-publish { width: 100%; }
    }

    /* ============================================
       TOOLTIP UNTUK ITEM KOSONG
    ============================================ */
    .missing-item .tooltip-trigger {
        cursor: help;
        border-bottom: 1px dashed #d1d5db;
    }
</style>

<!-- ============================================
GREETING
============================================ -->
<div class="greeting-section mb-3">
    <h2>
        Selamat Datang, 
        <span style="color: var(--primary);"><?= session()->get('name') ?? 'Operator' ?></span>
        👋
    </h2>
    <p>Kelola data sekolah Anda dengan mudah dan cepat</p>
</div>

<!-- ============================================
STATISTICS ROW
============================================ -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon blue"><i class="bi bi-building"></i></div>
            <div>
                <p class="stat-number"><?= $total_sekolah ?? 0 ?></p>
                <p class="stat-label">Total Sekolah</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon green"><i class="bi bi-check-circle"></i></div>
            <div>
                <p class="stat-number"><?= $progress ?? 0 ?>%</p>
                <p class="stat-label">Kelengkapan</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon orange"><i class="bi bi-list-check"></i></div>
            <div>
                <p class="stat-number"><?= $item_terisi ?? 0 ?>/<?= $total_item ?? 6 ?></p>
                <p class="stat-label">Item Terisi</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-icon cyan"><i class="bi bi-calendar-check"></i></div>
            <div>
                <p class="stat-number"><?= date('d M Y') ?></p>
                <p class="stat-label">Hari Ini</p>
            </div>
        </div>
    </div>
</div>

<!-- ============================================
MAIN CONTENT: 2 COLUMN LAYOUT
============================================ -->
<div class="row g-4">

    <!-- LEFT: Menu Grid -->
    <div class="col-lg-8">
        <h5 class="fw-semibold mb-2" style="color: #111827; font-size: 16px;">
            <i class="bi bi-grid-3x3-gap-fill text-primary me-2"></i>
            Kelompok Pengelolaan Profil Sekolah
        </h5>
        <p class="text-muted small mb-3">Lengkap data sekolah untuk meningkatkan kelengkapan profil</p>

        <div class="row g-3 menu-grid">
            <!-- Edit Profil -->
            <div class="col-md-6">
                <a href="<?= base_url('admin/profil') ?>" class="menu-card">
                    <div class="menu-icon"><i class="bi bi-pencil-square"></i></div>
                    <h6 class="menu-title">Edit Profil Sekolah</h6>
                    <p class="menu-desc">Kelola identitas dan informasi sekolah</p>
                    <div class="menu-action">Kelola <i class="bi bi-chevron-right"></i></div>
                </a>
            </div>

            <!-- Visi & Misi -->
            <div class="col-md-6">
                <a href="<?= base_url('admin/visi') ?>" class="menu-card">
                    <div class="menu-icon"><i class="bi bi-eye"></i></div>
                    <h6 class="menu-title">Visi & Misi</h6>
                    <p class="menu-desc">Kelola visi dan misi sekolah</p>
                    <div class="menu-action">Kelola <i class="bi bi-chevron-right"></i></div>
                </a>
            </div>

            <!-- Kepala Sekolah -->
            <div class="col-md-6">
                <a href="<?= base_url('admin/kepala') ?>" class="menu-card">
                    <div class="menu-icon"><i class="bi bi-person-badge"></i></div>
                    <h6 class="menu-title">Kepala Sekolah</h6>
                    <p class="menu-desc">Kelola data kepala sekolah</p>
                    <div class="menu-action">Kelola <i class="bi bi-chevron-right"></i></div>
                </a>
            </div>

            <!-- Lokasi -->
            <div class="col-md-6">
                <a href="<?= base_url('admin/lokasi') ?>" class="menu-card">
                    <div class="menu-icon"><i class="bi bi-geo-alt"></i></div>
                    <h6 class="menu-title">Lokasi</h6>
                    <p class="menu-desc">Atur lokasi dan peta sekolah</p>
                    <div class="menu-action">Kelola <i class="bi bi-chevron-right"></i></div>
                </a>
            </div>
        </div>
    </div>

    <!-- RIGHT: Status & Cover -->
    <div class="col-lg-4">
        <!-- ==========================================
        PREVIEW COVER SEKOLAH - Dengan Penjelasan
        ========================================== -->
        <div class="cover-preview mb-3">
            <div class="cover-title">
                <i class="bi bi-image text-primary"></i>
                Preview Cover Sekolah
                <?php if(!empty($sekolah['cover'])) : ?>
                    <span class="badge-cover exists"><i class="bi bi-check-circle-fill me-1"></i> Ada</span>
                <?php else : ?>
                    <span class="badge-cover empty"><i class="bi bi-exclamation-circle-fill me-1"></i> Kosong</span>
                <?php endif; ?>
            </div>

            <div class="cover-wrapper <?= !empty($sekolah['cover']) ? 'has-cover' : '' ?>">
                <?php if(!empty($sekolah['cover'])) : ?>
                    <img src="<?= base_url('uploads/cover/'.$sekolah['cover']); ?>" alt="Cover Sekolah">
                <?php else : ?>
                    <div class="cover-placeholder">
                        <i class="bi bi-image"></i>
                        <span>Cover Belum Diupload</span>
                        <small style="color: #9ca3af; font-size: 11px; margin-top: 4px;">
                            <i class="bi bi-info-circle me-1"></i>
                            Upload cover agar website terlihat profesional
                        </small>
                    </div>
                <?php endif; ?>
                
                <!-- Overlay dengan info -->
                <div class="cover-overlay">
                    <div class="cover-info">
                        <i class="bi bi-info-circle"></i>
                        Cover ditampilkan di halaman utama website publik
                    </div>
                </div>
            </div>

            <!-- Fungsi Cover -->
            <div class="cover-functions">
                <span><i class="bi bi-check-circle"></i> Halaman Utama</span>
                <span><i class="bi bi-check-circle"></i> Header Website</span>
                <span><i class="bi bi-check-circle"></i> Preview Publik</span>
            </div>

            <button class="btn-upload-cover" onclick="window.location.href='<?= base_url('admin/profil') ?>'">
                <i class="bi bi-upload"></i> 
                <?= !empty($sekolah['cover']) ? 'Ganti Cover' : 'Upload Cover' ?>
            </button>

            <!-- Keterangan Fungsi Cover -->
            <div style="margin-top: 10px; padding: 10px 14px; background: #f0f4f9; border-radius: 8px; text-align: left;">
                <p style="font-size: 11px; color: #6b7280; margin: 0; line-height: 1.5;">
                    <i class="bi bi-lightbulb text-warning me-1"></i>
                    <strong>Fungsi Cover:</strong> Cover digunakan sebagai <strong>background/banner</strong> 
                    di halaman utama website publik sekolah. Cover yang menarik akan meningkatkan 
                    <strong>citra profesional</strong> sekolah di mata masyarakat.
                </p>
            </div>
        </div>

        <!-- ==========================================
        STATUS WEBSITE
        ========================================== -->
        <h6 class="fw-semibold mb-2" style="color: #111827; font-size: 13px;">
            <i class="bi bi-globe2 text-primary me-2"></i>
            Status Website
        </h6>

        <div class="status-card">
            <p class="status-label">Status</p>
            <p class="status-value">
                <span class="status-badge draft">Draft</span>
                <span class="text-muted" style="font-size: 13px; margin-left: 8px;">Belum Publik</span>
            </p>
        </div>

        <div class="status-card">
            <p class="status-label">Terakhir Diperbarui</p>
            <p class="status-value">
                <?= date('d M Y') ?>
                <span class="text-muted" style="font-size: 13px; display: block;"><?= date('H:i') ?> WIB</span>
            </p>
        </div>

        <div class="status-card">
            <p class="status-label">Website Publik</p>
            <p class="status-value">
                <span class="status-badge inactive">Belum Aktif</span>
                <span class="text-muted" style="font-size: 13px; margin-left: 8px;">Perlu Publik</span>
            </p>
        </div>
    </div>
</div>

<!-- ============================================
PROGRESS SECTION - LENGKAP DENGAN DATA KURANG
============================================ -->
<div class="progress-section">
    <div class="row">
        <div class="col-md-6">
            <div class="progress-title">
                <i class="bi bi-bar-chart-fill text-primary me-2"></i>
                Progress Kelengkapan Profil
            </div>
            <div class="progress-subtitle">Semakin lengkap data, semakin optimal website sekolah Anda.</div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" 
                     style="width: <?= $progress ?? 0 ?>%;" 
                     aria-valuenow="<?= $progress ?? 0 ?>" 
                     aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            <div class="progress-text">
                <?= $progress ?? 0 ?>% Lengkap 
                <span class="text-muted" style="font-weight: 400; font-size: 12px;">
                    (<?= $item_terisi ?? 0 ?> dari <?= $total_item ?? 6 ?> item)
                </span>
            </div>
        </div>
        <div class="col-md-6">
            <div style="margin-top: 6px;">
                <p style="font-size: 13px; font-weight: 600; color: #111827; margin-bottom: 6px;">
                    <i class="bi bi-list-check me-1"></i> Data yang Perlu Dilengkapi:
                </p>
                <div class="missing-items">
                    <?php 
                    $items_map = [
                        'nama_sekolah' => ['label' => 'Nama Sekolah', 'icon' => 'bi-building'],
                        'visi' => ['label' => 'Visi Sekolah', 'icon' => 'bi-eye'],
                        'misi' => ['label' => 'Misi Sekolah', 'icon' => 'bi-list-ul'],
                        'kepala_sekolah' => ['label' => 'Kepala Sekolah', 'icon' => 'bi-person-badge'],
                        'alamat' => ['label' => 'Alamat', 'icon' => 'bi-geo-alt'],
                        'koordinat' => ['label' => 'Koordinat', 'icon' => 'bi-pin-map'],
                    ];
                    
                    foreach($items_map as $key => $item):
                        $is_filled = !empty($sekolah[$key] ?? '');
                    ?>
                        <div class="missing-item">
                            <?php if($is_filled): ?>
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span style="color: #16a34a;"><?= $item['label'] ?></span>
                            <?php else: ?>
                                <i class="bi bi-x-circle-fill text-danger"></i>
                                <span class="text-danger" style="font-weight: 500;">
                                    <?= $item['label'] ?>
                                    <small style="font-weight: 400; color: #6b7280;">(kosong)</small>
                                </span>
                                <a href="<?= base_url('admin/'.$key) ?>" style="font-size: 10px; color: var(--primary); text-decoration: none;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================
PUBLISH SECTION
============================================ -->
<div class="publish-section">
    <div class="row align-items-center">
        <div class="col-md-8">
            <div class="publish-title">
                <i class="bi bi-rocket-takeoff text-primary me-2"></i>
                Status Website
            </div>
            <div class="publish-desc">Kelola status dan publikasi website sekolah</div>
            
            <?php if (($progress ?? 0) < 100): ?>
                <div class="alert alert-warning py-2 px-3 mb-0" style="font-size: 13px; border-radius: 10px;">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                    <strong>Website belum siap dipublikasikan!</strong> 
                    Masih ada <strong><?= $total_item - $item_terisi ?></strong> item data yang harus dilengkapi.
                    <?php if(empty($sekolah['cover'] ?? '')): ?>
                        <br><i class="bi bi-image me-1"></i> Cover sekolah juga belum diupload.
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-success py-2 px-3 mb-0" style="font-size: 13px; border-radius: 10px;">
                    <i class="bi bi-check-circle-fill me-1"></i>
                    <strong>Semua data lengkap!</strong> Website siap dipublikasikan.
                    <?php if(!empty($sekolah['cover'] ?? '')): ?>
                        <br><i class="bi bi-image me-1"></i> Cover sudah terupload.
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <button class="btn-publish" <?= ($progress ?? 0) < 100 ? 'disabled' : '' ?>>
                <i class="bi bi-globe me-1"></i> Publikasikan
            </button>
            <?php if (($progress ?? 0) < 100): ?>
                <div style="font-size: 10px; color: #6b7280; margin-top: 4px;">
                    <i class="bi bi-info-circle me-1"></i>
                    Lengkapi semua data untuk mengaktifkan tombol
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>