<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $sekolah['nama_sekolah'] ?? 'Website Sekolah'; ?></title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }

        /* NAVBAR */
        .navbar-custom {
            background: white;
            box-shadow: 0 2px 20px rgba(0,0,0,0.06);
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-custom .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .navbar-custom .brand .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
            background: #1a56db;
        }

        .navbar-custom .brand .brand-text {
            font-weight: 700;
            font-size: 18px;
            color: #111827;
        }

        .navbar-custom .brand .brand-text small {
            display: block;
            font-weight: 400;
            font-size: 10px;
            color: #6b7280;
            text-transform: uppercase;
        }

        /* HERO */
        .hero {
            height: 420px;
            border-radius: 0 0 25px 25px;
            overflow: hidden;
            position: relative;
            margin-bottom: 30px;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.45);
        }

        .hero-content {
            position: absolute;
            bottom: 40px;
            left: 40px;
            color: white;
        }

        .logo-hero {
            width: 100px !important;
            height: 100px !important;
            border-radius: 20px;
            background: white;
            padding: 10px;
            margin-bottom: 20px;
            object-fit: contain;
        }

        /* CONTENT */
        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .preview-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .foto {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 20px;
        }

        .kepala {
            display: flex;
            gap: 30px;
            background: white;
            padding: 30px;
            border-radius: 25px;
            margin-bottom: 30px;
            align-items: center;
        }

        .kepala img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        table td:first-child {
            font-weight: 600;
            color: #6b7280;
            width: 30%;
        }

        #map {
            height: 450px;
            border-radius: 20px;
        }

        .footer-custom {
            background: #0f2b5c;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 30px;
        }

        .footer-custom p {
            margin: 0;
            opacity: 0.6;
            font-size: 13px;
        }

        .footer-custom p i {
            color: #fcd34d;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .preview-grid { grid-template-columns: 1fr; }
            .kepala { flex-direction: column; text-align: center; }
            .hero-content { left: 20px; bottom: 20px; }
            .hero { height: 350px; border-radius: 0 0 16px 16px; }
            .logo-hero { width: 80px !important; height: 80px !important; }
        }

        @media (max-width: 768px) {
            .hero { height: 280px; }
            .hero-content h1 { font-size: 20px; }
            .hero-content p { font-size: 13px; }
            .card { padding: 20px; border-radius: 16px; }
            .kepala { padding: 20px; border-radius: 16px; }
            .kepala img { width: 120px; height: 120px; }
            #map { height: 300px; }
            .foto { height: 200px; }
            .container-custom { padding: 0 16px; }
        }

        @media (max-width: 576px) {
            .hero { height: 220px; }
            .hero-content { left: 16px; bottom: 16px; }
            .hero-content h1 { font-size: 16px; }
            .hero-content p { font-size: 11px; }
            .logo-hero { width: 60px !important; height: 60px !important; padding: 6px; margin-bottom: 10px; }
            .card { padding: 16px; border-radius: 12px; }
            .kepala { padding: 16px; gap: 16px; border-radius: 12px; }
            .kepala img { width: 100px; height: 100px; }
            #map { height: 220px; }
            table td { padding: 8px 0; font-size: 13px; }
            .foto { height: 150px; }
        }
    </style>
</head>
<body>

    <!-- ============================================
    NAVBAR
    ============================================ -->
    <nav class="navbar-custom">
        <div class="container-custom">
            <a href="<?= base_url() ?>" class="brand">
                <div class="brand-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div class="brand-text">
                    <?= $sekolah['nama_sekolah'] ?? 'Website Sekolah'; ?>
                    <small>Website Resmi</small>
                </div>
            </a>
        </div>
    </nav>

    <!-- ============================================
    HERO
    ============================================ -->
    <div class="hero">
        <?php 
        $coverPath = $sekolah['cover'] ?? '';
        if(!empty($coverPath)): 
        ?>
            <img src="<?= base_url('uploads/cover/'.$coverPath); ?>" alt="Cover Sekolah">
        <?php else: ?>
            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1200" alt="Cover Default">
        <?php endif; ?>
        <div class="overlay"></div>
        <div class="hero-content">
            <?php 
            $logoPath = $sekolah['logo'] ?? '';
            if(!empty($logoPath)): 
            ?>
                <img class="logo-hero" src="<?= base_url('uploads/logo/'.$logoPath); ?>" alt="Logo Sekolah">
            <?php else: ?>
                <img class="logo-hero" src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Logo Default">
            <?php endif; ?>
            <h1><?= $sekolah['nama_sekolah'] ?? 'Sekolah Anda'; ?></h1>
            <p><?= $sekolah['alamat'] ?? 'Alamat sekolah belum diisi'; ?></p>
        </div>
    </div>

    <!-- ============================================
    CONTENT
    ============================================ -->
    <div class="container-custom">

        <!-- GRID -->
        <div class="preview-grid">
            <!-- PROFIL -->
            <div class="card">
                <h2 style="font-size:18px; font-weight:700; margin-bottom:20px; color:#111827;">
                    <i class="bi bi-info-circle me-2" style="color:#2563eb;"></i> Profil Sekolah
                </h2>
                <table>
                    <tr>
                        <td>NPSN</td>
                        <td><?= $sekolah['npsn'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Jenjang</td>
                        <td><?= $sekolah['jenjang'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $sekolah['status_sekolah'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Akreditasi</td>
                        <td><?= $sekolah['akreditasi'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Kurikulum</td>
                        <td><?= $sekolah['kurikulum'] ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td><?= $sekolah['website'] ?? '-'; ?></td>
                    </tr>
                </table>
            </div>

            <!-- FOTO -->
            <div class="card">
                <?php 
                $fotoPath = $sekolah['foto'] ?? '';
                if(!empty($fotoPath)): 
                ?>
                    <img class="foto" src="<?= base_url('uploads/sekolah/'.$fotoPath); ?>" alt="Foto Sekolah">
                <?php else: ?>
                    <img class="foto" src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600" alt="Foto Default">
                <?php endif; ?>
            </div>
        </div>

        <!-- VISI -->
        <div class="card">
            <h2 style="font-size:18px; font-weight:700; margin-bottom:20px; color:#111827;">
                <i class="bi bi-eye me-2" style="color:#2563eb;"></i> Visi
            </h2>
            <p><?= nl2br($sekolah['visi'] ?? 'Visi sekolah belum diisi'); ?></p>
        </div>

        <!-- MISI -->
        <div class="card">
            <h2 style="font-size:18px; font-weight:700; margin-bottom:20px; color:#111827;">
                <i class="bi bi-list-check me-2" style="color:#2563eb;"></i> Misi
            </h2>
            <p><?= nl2br($sekolah['misi'] ?? 'Misi sekolah belum diisi'); ?></p>
        </div>

        <!-- KEPALA SEKOLAH -->
        <div class="kepala">
            <?php 
            $fotoKepalaPath = $sekolah['foto_kepala'] ?? '';
            if(!empty($fotoKepalaPath)): 
            ?>
                <img src="<?= base_url('uploads/kepala/'.$fotoKepalaPath); ?>" alt="Kepala Sekolah">
            <?php else: ?>
                <img src="https://ui-avatars.com/api/?name=Kepala&background=2563eb&color=fff&size=180" alt="Kepala Sekolah">
            <?php endif; ?>
            <div>
                <h2 style="font-size:20px; font-weight:700; color:#111827; margin:0;"><?= $sekolah['kepala_sekolah'] ?? 'Kepala Sekolah'; ?></h2>
                <small style="color:#6b7280;">NIP : <?= $sekolah['nip_kepala'] ?? '-'; ?></small>
                <p style="margin-top:12px; color:#4b5563; line-height:1.7;"><?= nl2br($sekolah['sambutan'] ?? 'Sambutan kepala sekolah belum diisi'); ?></p>
            </div>
        </div>

        <!-- MAP -->
        <div class="card">
            <h2 style="font-size:18px; font-weight:700; margin-bottom:20px; color:#111827;">
                <i class="bi bi-geo-alt me-2" style="color:#2563eb;"></i> Lokasi Sekolah
            </h2>
            <div id="map"></div>
        </div>

    </div>

    <!-- ============================================
    FOOTER
    ============================================ -->
    <footer class="footer-custom">
        <div class="container-custom">
            <p>
                <i class="bi bi-heart-fill"></i>
                &copy; <?= date('Y') ?> <?= $sekolah['nama_sekolah'] ?? 'Sekolah'; ?> - Website Resmi Sekolah
            </p>
        </div>
    </footer>

    <!-- ============================================
    SCRIPTS
    ============================================ -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        var lat = <?= $sekolah['latitude'] ?? '-0.947083'; ?>;
        var lng = <?= $sekolah['longitude'] ?? '100.417181'; ?>;
        
        var map = L.map('map').setView([lat, lng], 15);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);
        
        L.marker([lat, lng]).addTo(map);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>