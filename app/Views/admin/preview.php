<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<style>
    .hero {
        height: 420px;
        border-radius: 25px;
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
        pointer-events: none;
    }
    .hero-content {
        position: absolute;
        bottom: 40px;
        left: 40px;
        color: white;
    }
    .logo {
        width: 100px !important;
        height: 100px !important;
        border-radius: 20px;
        background: white;
        padding: 10px;
        margin-bottom: 20px;
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
    #map {
        height: 450px;
        border-radius: 20px;
    }

    .btn-preview {
        background: #2563eb;
        padding: 12px 24px;
        color: white;
        border-radius: 15px;
        font-weight: bold;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .btn-preview:hover {
        background: #1d4ed8;
        color: white;
        transform: translateY(-2px);
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 12px;
    }
    .page-header h1 {
        font-size: 24px;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }
    .page-header p {
        color: #6b7280;
        margin: 4px 0 0 0;
        font-size: 14px;
    }

    /* Tombol Kembali */
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: white;
        border-radius: 60px;
        border: 1px solid #e5e7eb;
        color: #1e293b;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-bottom: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        position: relative;
        z-index: 999;
        cursor: pointer;
    }
    .btn-back:hover {
        background: #f1f5f9;
        border-color: #2563eb;
        color: #2563eb;
        transform: translateX(-4px);
        box-shadow: 0 4px 12px rgba(37,99,235,0.15);
    }
    .btn-back i {
        font-size: 18px;
    }

    @media (max-width: 992px) {
        .preview-grid { grid-template-columns: 1fr; }
        .kepala { flex-direction: column; text-align: center; }
        .hero-content { left: 20px; bottom: 20px; }
        .hero { height: 350px; }
        .logo { width: 80px !important; height: 80px !important; }
    }

    @media (max-width: 768px) {
        .page-header { flex-direction: column; align-items: flex-start; }
        .hero { height: 280px; border-radius: 16px; }
        .hero-content h1 { font-size: 20px; }
        .hero-content p { font-size: 13px; }
        .card { padding: 20px; }
        .kepala img { width: 120px; height: 120px; }
        #map { height: 300px; }
        .foto { height: 200px; }
        .btn-preview { width: 100%; justify-content: center; }
    }

    @media (max-width: 576px) {
        .hero { height: 220px; }
        .hero-content { left: 16px; bottom: 16px; }
        .hero-content h1 { font-size: 16px; }
        .hero-content p { font-size: 11px; }
        .logo { width: 60px !important; height: 60px !important; padding: 6px; margin-bottom: 10px; }
        .card { padding: 16px; border-radius: 16px; }
        .kepala { padding: 16px; gap: 16px; }
        .kepala img { width: 100px; height: 100px; }
        #map { height: 220px; }
        table td { padding: 8px 0; font-size: 13px; }
    }
</style>

<!-- ===== TOMBOL KEMBALI DINAMIS ===== -->
<?php
$role = session()->get('role') ?? 'pengunjung';
$backUrl = base_url('/');
switch (strtolower($role)) {
    case 'superadmin':
        $backUrl = base_url('superadmin/dashboard');
        break;
    case 'admin':
    case 'operator':
        $backUrl = base_url('admin/dashboard');
        break;
    default:
        $backUrl = base_url('/');
        break;
}
?>
<!-- ===== PAGE HEADER ===== -->
<div class="page-header">
    <div>
        <h1><i class="bi bi-eye me-2"></i> Preview Website Sekolah</h1>
        <p>Berikut tampilan website sekolah yang akan dilihat oleh pengunjung.</p>
    </div>
    <a href="<?= base_url('public-website/detail/' . ($sekolah['id'] ?? 0)); ?>" target="_blank" class="btn-preview">
        <i class="bi bi-box-arrow-up-right"></i> Buka Website Publik
    </a>
</div>

<!-- ===== HERO ===== -->
<div class="hero">
    <img src="<?= ($sekolah['cover'] ?? '') ? base_url('uploads/cover/'.$sekolah['cover']) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7'; ?>">
    <div class="overlay"></div>
    <div class="hero-content">
        <img class="logo" src="<?= ($sekolah['logo'] ?? '') ? base_url('uploads/logo/'.$sekolah['logo']) : 'https://cdn-icons-png.flaticon.com/512/3135/3135755.png'; ?>">
        <h1><?= $sekolah['nama_sekolah'] ?? 'Sekolah Anda'; ?></h1>
        <p><?= $sekolah['alamat'] ?? 'Alamat belum diisi'; ?></p>
    </div>
</div>

<!-- ===== GRID ===== -->
<div class="preview-grid">
    <!-- PROFIL -->
    <div class="card">
        <h2><i class="bi bi-info-circle me-2" style="color:#2563eb;"></i> Profil Sekolah</h2>
        <table>
            <tr><td>NPSN</td><td><?= $sekolah['npsn'] ?? '-'; ?></td></tr>
            <tr><td>Jenjang</td><td><?= $sekolah['jenjang'] ?? '-'; ?></td></tr>
            <tr><td>Status</td><td><?= $sekolah['status_sekolah'] ?? '-'; ?></td></tr>
            <tr><td>Akreditasi</td><td><?= $sekolah['akreditasi'] ?? '-'; ?></td></tr>
            <tr><td>Kurikulum</td><td><?= $sekolah['kurikulum'] ?? '-'; ?></td></tr>
            <tr><td>Website</td><td><?= $sekolah['website'] ?? '-'; ?></td></tr>
        </table>
    </div>

    <!-- FOTO -->
    <div class="card">
        <img class="foto" src="<?= ($sekolah['foto'] ?? '') ? base_url('uploads/sekolah/'.$sekolah['foto']) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7'; ?>">
    </div>
</div>

<!-- ===== VISI ===== -->
<div class="card">
    <h2><i class="bi bi-eye me-2" style="color:#2563eb;"></i> Visi</h2>
    <p><?= nl2br($sekolah['visi'] ?? 'Visi belum diisi'); ?></p>
</div>

<!-- ===== MISI ===== -->
<div class="card">
    <h2><i class="bi bi-list-check me-2" style="color:#2563eb;"></i> Misi</h2>
    <p><?= nl2br($sekolah['misi'] ?? 'Misi belum diisi'); ?></p>
</div>

<!-- ===== KEPALA ===== -->
<div class="kepala">
    <img src="<?= ($sekolah['foto_kepala'] ?? '') ? base_url('uploads/kepala/'.$sekolah['foto_kepala']) : 'https://ui-avatars.com/api/?name=Kepala&background=2563eb&color=fff&size=180'; ?>">
    <div>
        <h2><?= $sekolah['kepala_sekolah'] ?? 'Kepala Sekolah'; ?></h2>
        <small>NIP : <?= $sekolah['nip_kepala'] ?? '-'; ?></small>
        <p><?= nl2br($sekolah['sambutan'] ?? 'Sambutan belum diisi'); ?></p>
    </div>
</div>

<!-- ===== MAP ===== -->
<div class="card">
    <h2><i class="bi bi-geo-alt me-2" style="color:#2563eb;"></i> Lokasi Sekolah</h2>
    <div id="map"></div>
</div>

<!-- ===== SCRIPTS ===== -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
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

<?= $this->endSection() ?>