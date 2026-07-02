<?= $this->include('layouts/header_admin'); ?>
<?= $this->include('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="school-hero-banner">
        <?php 
            // Mengatur gambar background secara dinamis dari database.
            // Jika kolom foto/gambar kosong, akan otomatis memakai placeholder gambar sekolah dari Unsplash yang kualitasnya tajam.
            $gambar_bg = (isset($sekolah['foto']) && $sekolah['foto'] != '') 
                ? base_url('uploads/sekolah/' . $sekolah['foto']) 
                : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200'; 
        ?>
        <div class="banner-overlay" style="background-image: url('<?= $gambar_bg; ?>');"></div>
        
        <div class="banner-content">
            <div class="badge-row">
                <span class="badge badge-status"><?= ($sekolah['status_sekolah'] ?? 'Negeri') == 'Negeri' ? 'Sekolah Negeri' : 'Sekolah Swasta'; ?></span>
                <span class="badge badge-akreditasi">Terakreditasi <?= $sekolah['akreditasi'] ?? '-'; ?></span>
            </div>
            <h1 class="school-title"><?= $sekolah['nama_sekolah'] ?? 'Nama Sekolah'; ?></h1>
            <p class="school-subtitle">
                NPSN: <?= $sekolah['npsn'] ?? '-'; ?> <span class="separator">•</span> Kecamatan <?= $sekolah['kecamatan'] ?? '-'; ?>
            </p>
        </div>
    </div>

    <div class="action-navigation-bar">
        <a href="<?= base_url('admin/data-sekolah'); ?>" class="btn-nav-back">
            <i class="fa fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <a href="#lokasi-peta" class="btn-nav-map">
            <i class="fa fa-map-marked-alt"></i> Lihat di Peta
        </a>
    </div>

    <div class="dashboard-grid">
        
        <div class="grid-col-left">
            
            <div class="gis-card">
                <div class="gis-card-header">
                    <div class="icon-wrapper"><i class="fa fa-info-circle"></i></div>
                    <h3>Identitas Sekolah</h3>
                </div>
                <div class="gis-card-body">
                    <div class="info-display-grid">
                        <div class="info-item">
                            <div class="info-label">NPSN</div>
                            <div class="info-value text-bold"><?= $sekolah['npsn'] ?? '-'; ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Status Sekolah</div>
                            <div class="info-value"><?= $sekolah['status_sekolah'] ?? '-'; ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Akreditasi</div>
                            <div class="info-value">
                                <span class="text-bold">Grade <?= $sekolah['akreditasi'] ?? '-'; ?></span> 
                                <span class="mini-badge-score">94/100</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Kurikulum</div>
                            <div class="info-value text-bold"><?= $sekolah['kurikulum'] ?? '-'; ?></div>
                        </div>
                    </div>
                    
                    <div class="info-item full-width-info">
                        <div class="info-label">Alamat Lengkap</div>
                        <div class="info-value address-text"><?= $sekolah['alamat'] ?? '-'; ?></div>
                    </div>
                </div>
            </div>

            <div class="gis-card" id="lokasi-peta">
                <div class="gis-card-header">
                    <div class="icon-wrapper"><i class="fa fa-map-marker-alt"></i></div>
                    <h3>Lokasi Geografis</h3>
                </div>
                <div class="gis-card-body-map">
                    <div class="map-container-wrapper">
                        <div class="map-display-mock">
                            <div class="map-pin-center">
                                <div class="pulse-ring"></div>
                                <i class="fa fa-map-pin"></i>
                            </div>
                            
                            <div class="map-zoom-controls">
                                <button type="button">+</button>
                                <button type="button">-</button>
                            </div>

                            <div class="coordinates-floating-badge">
                                <div class="coord-item">
                                    <span class="coord-label">Latitude</span>
                                    <span class="coord-val"><?= $sekolah['latitude'] ?? '-'; ?></span>
                                </div>
                                <div class="coord-divider"></div>
                                <div class="coord-item">
                                    <span class="coord-label">Longitude</span>
                                    <span class="coord-val"><?= $sekolah['longitude'] ?? '-'; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="grid-col-right">
            
            <div class="gis-card">
                <div class="gis-card-header">
                    <div class="icon-wrapper"><i class="fa fa-phone-alt"></i></div>
                    <h3>Kontak & Media</h3>
                </div>
                <div class="gis-card-body">
                    <div class="contact-list-wrapper">
                        
                        <div class="contact-item">
                            <div class="contact-icon-circle">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-text-block">
                                <span class="contact-label">Telepon</span>
                                <span class="contact-value"><?= $sekolah['telepon'] ?? '-'; ?></span>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-circle">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-text-block">
                                <span class="contact-label">Email</span>
                                <span class="contact-value text-lowercase"><?= $sekolah['email'] ?? '-'; ?></span>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-circle">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="contact-text-block">
                                <span class="contact-label">Situs Web</span>
                                <span class="contact-value text-lowercase"><?= $sekolah['website'] ?? '-'; ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="gis-card">
                <div class="gis-card-body compact-padding">
                    <div class="operational-title">JAM OPERASIONAL</div>
                    <div class="operational-table">
                        <div class="op-row">
                            <span class="op-day">Senin - Kamis</span>
                            <span class="op-time text-blue">07:30 - 15:00</span>
                        </div>
                        <div class="op-row">
                            <span class="op-day">Jumat</span>
                            <span class="op-time text-blue">07:30 - 11:30</span>
                        </div>
                        <div class="op-row">
                            <span class="op-day">Sabtu</span>
                            <span class="op-time text-blue">07:30 - 13:00</span>
                        </div>
                        <div class="op-row disabled-day">
                            <span class="op-day">Minggu</span>
                            <span class="op-time">Tutup</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="verification-badges-row">
                <span class="v-badge badge-green">
                    <i class="fa fa-check-circle"></i> Data terverifikasi
                </span>
                <span class="v-badge badge-blue">
                    <i class="fa fa-sync-alt"></i> Update 2026
                </span>
            </div>

        </div>

    </div>

</div>

<style>
    body {
        background-color: #f8fafc;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    /* Hero Banner Area */
    .school-hero-banner {
        position: relative;
        /* Perpaduan gradasi warna gelap premium */
        background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
        border-radius: 16px;
        padding: 50px 35px;
        color: white;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    .banner-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.28; /* Dinaikkan dari 0.15 agar gambar sekolah jauh lebih jelas terlihat */
        mix-blend-mode: overlay;
        z-index: 1;
    }
    .banner-content {
        position: relative;
        z-index: 2;
    }
    .badge-row {
        display: flex;
        gap: 8px;
        margin-bottom: 14px;
    }
    .badge {
        font-size: 11px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 30px;
        letter-spacing: 0.3px;
    }
    .badge-status { background-color: #22c55e; color: white; }
    .badge-akreditasi { background-color: #3b82f6; color: white; }
    
    .school-title {
        font-size: 32px;
        font-weight: 700;
        margin: 0 0 10px 0;
        letter-spacing: -0.5px;
    }
    .school-subtitle {
        margin: 0;
        font-size: 14px;
        opacity: 0.85;
        font-weight: 400;
    }
    .separator { margin: 0 8px; opacity: 0.6; }

    /* Action Navigation Bar Row */
    .action-navigation-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        padding: 14px 24px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        margin-bottom: 25px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.01);
    }
    .btn-nav-back {
        color: #334155;
        background: transparent;
        text-decoration: none;
        font-weight: 600;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        transition: all 0.2s;
    }
    .btn-nav-back:hover {
        background: #f8fafc;
        border-color: #94a3b8;
    }
    .btn-nav-map {
        background: #0f172a;
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background 0.2s;
    }
    .btn-nav-map:hover {
        background: #1e293b;
    }

    /* Grid Layout System */
    .dashboard-grid {
        display: grid;
        grid-template-columns: 1.6fr 1fr;
        gap: 25px;
    }

    @media (max-width: 991px) {
        .dashboard-grid { grid-template-columns: 1fr; }
    }

    /* GIS Cards Struct */
    .gis-card {
        background: white;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        margin-bottom: 25px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }
    .gis-card-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 16px 24px;
        border-bottom: 1px solid #f1f5f9;
    }
    .icon-wrapper {
        color: #2563eb;
        font-size: 15px;
        display: flex;
        align-items: center;
    }
    .gis-card-header h3 {
        margin: 0;
        font-size: 15px;
        font-weight: 700;
        color: #1e293b;
    }
    .gis-card-body {
        padding: 24px;
    }
    .gis-card-body.compact-padding {
        padding: 24px;
    }

    /* Read-Only Info Fields Grid */
    .info-display-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-bottom: 24px;
    }
    .info-item {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .info-label {
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
    }
    .info-value {
        font-size: 14px;
        color: #1e293b;
    }
    .text-bold {
        font-weight: 700;
    }
    .mini-badge-score {
        font-size: 11px;
        background: #e6f4ea;
        color: #137333;
        padding: 2px 6px;
        border-radius: 4px;
        font-weight: 600;
        margin-left: 6px;
    }
    .full-width-info {
        border-top: 1px solid #f1f5f9;
        padding-top: 20px;
    }
    .address-text {
        line-height: 1.6;
        color: #334155;
    }

    /* Map Section Visualizer */
    .gis-card-body-map {
        padding: 16px;
    }
    .map-container-wrapper {
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }
    .map-display-mock {
        height: 320px;
        background: #cbd5e1 url('https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=1000') center center / cover no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .map-pin-center {
        position: relative;
        color: #2563eb;
        font-size: 38px;
        z-index: 5;
    }
    .pulse-ring {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        border: 3px solid #2563eb;
        border-radius: 50%;
        height: 50px; width: 50px;
        animation: mapPulse 2s ease-out infinite;
        opacity: 0;
    }
    @keyframes mapPulse {
        0% { transform: translate(-50%, -50%) scale(0.1); opacity: 0; }
        50% { opacity: 0.4; }
        100% { transform: translate(-50%, -50%) scale(1.2); opacity: 0; }
    }
    .map-zoom-controls {
        position: absolute;
        top: 15px; right: 15px;
        display: flex;
        flex-direction: column;
        border-radius: 6px;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .map-zoom-controls button {
        width: 32px; height: 32px;
        background: white; border: none;
        font-weight: 700; font-size: 18px;
        color: #475569; cursor: pointer;
    }
    .map-zoom-controls button:first-child { border-bottom: 1px solid #f1f5f9; }

    /* Floating Coordinates Badge */
    .coordinates-floating-badge {
        position: absolute;
        bottom: 15px; left: 15px;
        background: white;
        padding: 10px 16px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }
    .coord-item {
        display: flex;
        flex-direction: column;
    }
    .coord-label {
        font-size: 10px;
        color: #94a3b8;
        font-weight: 600;
        text-transform: uppercase;
    }
    .coord-val {
        font-size: 12px;
        font-weight: 700;
        color: #2563eb;
    }
    .coord-divider {
        width: 1px;
        height: 24px;
        background-color: #e2e8f0;
    }

    /* Contact List Components */
    .contact-list-wrapper {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .contact-icon-circle {
        width: 42px; height: 42px;
        border-radius: 50%;
        background-color: #eff6ff;
        color: #3b82f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }
    .contact-text-block {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .contact-label {
        font-size: 11px;
        color: #64748b;
        font-weight: 500;
    }
    .contact-value {
        font-size: 13px;
        font-weight: 600;
        color: #1e293b;
    }
    .text-lowercase { text-transform: lowercase; }

    /* Operational Schedule Hours */
    .operational-title {
        font-size: 11px;
        font-weight: 700;
        color: #475569;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
    }
    .operational-table {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .op-row {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: #334155;
    }
    .op-time {
        font-weight: 700;
    }
    .text-blue { color: #2563eb; }
    .disabled-day {
        color: #94a3b8;
    }

    /* Verification Status Pill Flags */
    .verification-badges-row {
        display: flex;
        gap: 10px;
        margin-top: -10px;
        justify-content: flex-start;
    }
    .v-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 30px;
    }
    .badge-green { background-color: #e6f4ea; color: #137333; }
    .badge-blue { background-color: #e8f0fe; color: #1a73e8; }
</style>

<?= $this->include('layouts/footer_admin', ['sekolah' => $sekolah_map ?? []]); ?>