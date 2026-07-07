<?= $this->include('layouts/header'); ?>
<?= $this->include('layouts/sidebar'); ?>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<style>
    .main-content {
        margin-left: 280px;
        padding: 30px;
        background: #f8fafc;
        min-height: 100vh;
    }

    /* ===== TOMBOL KEMBALI ===== */
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: #ffffff;
        border-radius: 50px;
        border: 1px solid #e5e7eb;
        color: #1e293b;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        position: relative;
        z-index: 10;
        cursor: pointer;
    }

    .btn-back:hover {
        background: #f1f5f9;
        border-color: #2563eb;
        color: #2563eb;
        transform: translateX(-4px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
    }

    .btn-back i {
        font-size: 18px;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 420px;
        gap: 25px;
    }

    .detail-card {
        background: white;
        border-radius: 24px;
        padding: 28px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
    }

    .school-image {
        width: 100%;
        height: 320px;
        object-fit: cover;
        border-radius: 22px;
        margin-bottom: 25px;
    }

    .school-title {
        font-size: 32px;
        color: #0f172a;
        margin-bottom: 10px;
    }

    .school-badge {
        display: inline-block;
        background: #dbeafe;
        color: #2563eb;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 25px;
    }

    .info-item {
        margin-bottom: 20px;
    }

    .info-item h4 {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 8px;
    }

    .info-item p {
        font-size: 15px;
        color: #0f172a;
        line-height: 1.7;
    }

    .website-btn {
        display: inline-block;
        margin-top: 15px;
        background: #2563eb;
        color: white;
        padding: 14px 20px;
        border-radius: 14px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .website-btn:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
    }

    #map {
        width: 100%;
        height: 100%;
        min-height: 500px;
        border-radius: 22px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }
        .main-content {
            margin-left: 0;
            padding: 20px;
        }
    }

    @media (max-width: 768px) {
        .school-image {
            height: 220px;
        }
        .school-title {
            font-size: 24px;
        }
        #map {
            min-height: 350px;
        }
    }

    @media (max-width: 576px) {
        .school-image {
            height: 180px;
        }
        .school-title {
            font-size: 20px;
        }
        .detail-card {
            padding: 16px;
        }
        .btn-back {
            width: 100%;
            justify-content: center;
        }
        #map {
            min-height: 280px;
        }
    }
</style>

<div class="main-content">

    <!-- ===== TOMBOL KEMBALI DINAMIS ===== -->
    <?php
    $role = session()->get('role') ?? 'pengunjung';
    $backUrl = base_url('/');

    switch (strtolower($role)) {
        case 'superadmin':
            $backUrl = base_url('superadmin/data-sekolah');
            break;
        case 'admin':
        case 'operator':
            $backUrl = base_url('admin/preview');
            break;
        default:
            $backUrl = base_url('/');
            break;
    }
    ?>
    <a href="<?= esc($backUrl); ?>" class="btn-back">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <!-- ===== CEK APAKAH DATA SEKOLAH ADA ===== -->
    <?php if (empty($sekolah)): ?>
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Data sekolah tidak ditemukan.
        </div>
    <?php else: ?>

        <div class="detail-grid">

            <!-- ===== LEFT COLUMN ===== -->
            <div class="detail-card">

                <!-- FOTO SEKOLAH -->
                <img src="<?= !empty($sekolah['foto']) ? base_url('uploads/sekolah/' . esc($sekolah['foto'])) : 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop'; ?>"
                     class="school-image"
                     alt="Foto Sekolah">

                <h1 class="school-title"><?= esc($sekolah['nama_sekolah'] ?? 'Sekolah'); ?></h1>

                <div class="school-badge">
                    <?= esc($sekolah['jenjang'] ?? 'Jenjang'); ?>
                </div>

                <div class="info-item">
                    <h4>NPSN</h4>
                    <p><?= esc($sekolah['npsn'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Status</h4>
                    <p><?= esc($sekolah['status_sekolah'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Akreditasi</h4>
                    <p><?= esc($sekolah['akreditasi'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Kurikulum</h4>
                    <p><?= esc($sekolah['kurikulum'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Kecamatan</h4>
                    <p><?= esc($sekolah['kecamatan'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Alamat</h4>
                    <p><?= esc($sekolah['alamat'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Telepon</h4>
                    <p><?= esc($sekolah['telepon'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Email</h4>
                    <p><?= esc($sekolah['email'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Website</h4>
                    <p>
                        <?php if (!empty($sekolah['website'])): ?>
                            <a href="<?= esc($sekolah['website']); ?>" target="_blank" class="website-btn">
                                <i class="bi bi-globe me-1"></i> Kunjungi Website
                            </a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </p>
                </div>

                <div class="info-item">
                    <h4>Visi</h4>
                    <p><?= nl2br(esc($sekolah['visi'] ?? 'Belum diisi')); ?></p>
                </div>

                <div class="info-item">
                    <h4>Misi</h4>
                    <p><?= nl2br(esc($sekolah['misi'] ?? 'Belum diisi')); ?></p>
                </div>

                <div class="info-item">
                    <h4>Kepala Sekolah</h4>
                    <p><?= esc($sekolah['kepala_sekolah'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>NIP Kepala Sekolah</h4>
                    <p><?= esc($sekolah['nip_kepala'] ?? '-'); ?></p>
                </div>

                <div class="info-item">
                    <h4>Sambutan</h4>
                    <p><?= nl2br(esc($sekolah['sambutan'] ?? 'Belum diisi')); ?></p>
                </div>

                <div class="info-item">
                    <h4>Koordinat</h4>
                    <p>
                        Lat: <?= esc($sekolah['latitude'] ?? '-'); ?>,
                        Lng: <?= esc($sekolah['longitude'] ?? '-'); ?>
                    </p>
                </div>
            </div>

            <!-- ===== RIGHT COLUMN - MAP ===== -->
            <div class="detail-card">
                <div id="map"></div>
            </div>

        </div>

    <?php endif; ?>

</div>

<!-- ===== SCRIPTS ===== -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    <?php if (!empty($sekolah) && !empty($sekolah['latitude']) && !empty($sekolah['longitude'])): ?>
        var lat = <?= esc($sekolah['latitude']); ?>;
        var lng = <?= esc($sekolah['longitude']); ?>;

        var map = L.map('map').setView([lat, lng], 15);

        L.tileLayer(
            'https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap'
            }
        ).addTo(map);

        L.marker([lat, lng])
            .addTo(map)
            .bindPopup('<?= esc($sekolah['nama_sekolah'] ?? 'Lokasi Sekolah'); ?>')
            .openPopup();
    <?php else: ?>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('map').innerHTML = `
                <div style="display:flex;align-items:center;justify-content:center;height:100%;background:#f1f5f9;border-radius:22px;color:#64748b;font-size:16px;min-height:500px;">
                    <i class="bi bi-geo-alt-slash me-2"></i> Koordinat belum diatur
                </div>
            `;
        });
    <?php endif; ?>
</script>

<?= $this->include('layouts/footer'); ?>