<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<style>
    /* ============================================
       LOKASI SEKOLAH STYLES
    ============================================ */

    .alert-success {
        background: #dcfce7;
        padding: 15px 20px;
        border-radius: 12px;
        color: #166534;
        margin-bottom: 20px;
        border-left: 4px solid #22c55e;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-success i {
        font-size: 18px;
    }

    .card-custom {
        background: white;
        padding: 24px 28px;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        border: 1px solid #f1f5f9;
    }

    .card-custom .card-title {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-custom .card-title i {
        color: var(--primary);
    }

    .mt { margin-top: 20px; }

    /* ============================================
       MAP
    ============================================ */
    #map {
        height: 480px;
        border-radius: 14px;
        z-index: 1;
    }

    .map-controls {
        display: flex;
        gap: 10px;
        margin-top: 12px;
        flex-wrap: wrap;
    }

    .map-controls .btn-map {
        padding: 8px 16px;
        border: none;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f3f4f6;
        color: #374151;
    }

    .map-controls .btn-map:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-1px);
    }

    .map-controls .btn-map.primary {
        background: var(--primary);
        color: white;
    }

    .map-controls .btn-map.primary:hover {
        background: var(--primary-dark);
    }

    .map-controls .btn-map.danger {
        background: #ef4444;
        color: white;
    }

    .map-controls .btn-map.danger:hover {
        background: #dc2626;
    }

    .map-controls .btn-map.success {
        background: #22c55e;
        color: white;
    }

    .map-controls .btn-map.success:hover {
        background: #16a34a;
    }

    /* ============================================
       INPUT GRID
    ============================================ */
    .grid-input {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 16px;
    }

    .grid-input .form-group {
        margin-bottom: 0;
    }

    .grid-input label {
        display: block;
        margin-bottom: 4px;
        font-weight: 600;
        font-size: 13px;
        color: #374151;
    }

    .grid-input label i {
        color: var(--primary);
        margin-right: 4px;
    }

    .grid-input input {
        width: 100%;
        padding: 10px 14px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        font-size: 14px;
        transition: all 0.2s ease;
        background: #fafbfc;
        font-family: 'Inter', sans-serif;
    }

    .grid-input input:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(26, 86, 219, 0.1);
        background: #fff;
    }

    .grid-input input:disabled {
        background: #f3f4f6;
        cursor: not-allowed;
    }

    .grid-input .input-hint {
        font-size: 11px;
        color: #6b7280;
        margin-top: 4px;
        display: block;
    }

    /* ============================================
       INFO BOX
    ============================================ */
    .info-box {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-top: 16px;
    }

    .info-box .info-item {
        background: #f8fafc;
        padding: 14px 16px;
        border-radius: 12px;
        border: 1px solid #f1f5f9;
        text-align: center;
    }

    .info-box .info-item .info-value {
        font-weight: 700;
        font-size: 16px;
        color: #111827;
        display: block;
    }

    .info-box .info-item .info-label {
        font-size: 11px;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 2px;
        display: block;
    }

    .info-box .info-item .info-value.green { color: #16a34a; }
    .info-box .info-item .info-value.blue { color: var(--primary); }
    .info-box .info-item .info-value.orange { color: #d97706; }

    /* ============================================
       BUTTON SAVE
    ============================================ */
    .btn-save {
        background: var(--primary);
        color: white;
        padding: 12px 32px;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(26, 86, 219, 0.25);
        margin-top: 16px;
    }

    .btn-save:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(26, 86, 219, 0.3);
    }

    .btn-save i {
        font-size: 18px;
    }

    .btn-save:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    .btn-group-actions {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }

    /* ============================================
       RESPONSIVE
    ============================================ */
    @media (max-width: 992px) {
        .info-box {
            grid-template-columns: repeat(2, 1fr);
        }
        .grid-input {
            grid-template-columns: 1fr 1fr;
        }
        .card-custom {
            padding: 20px 22px;
        }
    }

    @media (max-width: 768px) {
        #map {
            height: 350px;
        }
        .info-box {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .grid-input {
            grid-template-columns: 1fr;
            gap: 12px;
        }
        .card-custom {
            padding: 16px 18px;
        }
        .map-controls .btn-map {
            font-size: 12px;
            padding: 6px 12px;
        }
        .btn-save {
            width: 100%;
            justify-content: center;
        }
        .btn-group-actions {
            flex-direction: column;
            width: 100%;
        }
        .btn-group-actions .btn-save {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        #map {
            height: 280px;
            border-radius: 10px;
        }
        .info-box {
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }
        .info-box .info-item {
            padding: 10px 12px;
        }
        .info-box .info-item .info-value {
            font-size: 14px;
        }
        .info-box .info-item .info-label {
            font-size: 10px;
        }
        .card-custom {
            padding: 12px 14px;
            border-radius: 12px;
        }
        .map-controls {
            gap: 6px;
        }
        .map-controls .btn-map {
            font-size: 11px;
            padding: 5px 10px;
            border-radius: 8px;
        }
    }

    /* ============================================
       ANIMATION
    ============================================ */
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .pulse-animation {
        animation: pulse 2s ease-in-out 3;
    }
</style>

<!-- ============================================
PAGE HEADER
============================================ -->
<div class="mb-4">
    <h4 class="fw-bold" style="color: #111827; font-size: 18px;">
        <i class="bi bi-geo-alt text-primary me-2"></i>
        Lokasi Sekolah
    </h4>
    <p class="text-muted" style="font-size: 13px;">
        <i class="bi bi-info-circle me-1"></i>
        Tentukan lokasi sekolah pada peta. Marker dapat digeser atau klik pada peta.
    </p>
</div>

<!-- ============================================
FLASH MESSAGE
============================================ -->
<?php if(session()->getFlashdata('success')) : ?>
    <div class="alert-success">
        <i class="bi bi-check-circle-fill"></i>
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')) : ?>
    <div class="alert-danger" style="background:#fee2e2;padding:15px 20px;border-radius:12px;color:#991b1b;margin-bottom:20px;border-left:4px solid #ef4444;display:flex;align-items:center;gap:10px;">
        <i class="bi bi-exclamation-circle-fill"></i>
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- ============================================
FORM
============================================ -->
<form action="<?= base_url('admin/update-lokasi'); ?>" method="post" id="formLokasi">
    <?= csrf_field() ?>

    <!-- MAP -->
    <div class="card-custom">
        <div class="card-title">
            <i class="bi bi-map"></i>
            Peta Lokasi Sekolah
            <span class="badge bg-primary ms-2" style="font-size: 10px; font-weight: 400;">
                <i class="bi bi-geo-fill me-1"></i> Interaktif
            </span>
        </div>

        <div id="map"></div>

        <!-- Map Controls -->
        <div class="map-controls">
            <button type="button" class="btn-map primary" onclick="goToSchool()">
                <i class="bi bi-geo-alt-fill"></i> Pusatkan Sekolah
            </button>
            <button type="button" class="btn-map" onclick="zoomIn()">
                <i class="bi bi-zoom-in"></i> Zoom In
            </button>
            <button type="button" class="btn-map" onclick="zoomOut()">
                <i class="bi bi-zoom-out"></i> Zoom Out
            </button>
            <button type="button" class="btn-map success" onclick="getCurrentLocation()">
                <i class="bi bi-crosshair"></i> Lokasi Saya
            </button>
            <button type="button" class="btn-map danger" onclick="resetLocation()">
                <i class="bi bi-arrow-counterclockwise"></i> Reset
            </button>
            <button type="button" class="btn-map" onclick="copyCoordinates()">
                <i class="bi bi-clipboard"></i> Salin Koordinat
            </button>
        </div>
    </div>

    <!-- COORDINATES INPUT -->
    <div class="card-custom mt">
        <div class="card-title">
            <i class="bi bi-pin-map"></i>
            Koordinat Sekolah
        </div>

        <div class="grid-input">
            <div class="form-group">
                <label><i class="bi bi-arrow-up"></i> Latitude</label>
                <input type="text" id="latitude" name="latitude" 
                       value="<?= old('latitude', $sekolah['latitude'] ?? '') ?>" 
                       placeholder="Contoh: -6.123456" readonly>
                <span class="input-hint"><i class="bi bi-info-circle me-1"></i> Otomatis dari peta</span>
            </div>
            <div class="form-group">
                <label><i class="bi bi-arrow-right"></i> Longitude</label>
                <input type="text" id="longitude" name="longitude" 
                       value="<?= old('longitude', $sekolah['longitude'] ?? '') ?>" 
                       placeholder="Contoh: 106.123456" readonly>
                <span class="input-hint"><i class="bi bi-info-circle me-1"></i> Otomatis dari peta</span>
            </div>
            <div class="form-group">
                <label><i class="bi bi-globe2"></i> URL Google Maps</label>
                <input type="text" id="gmaps_url" class="form-control" 
                       placeholder="Klik 'Salin Koordinat' untuk buka" readonly 
                       style="cursor: pointer;" onclick="openGoogleMaps()">
                <span class="input-hint">
                    <i class="bi bi-box-arrow-up-right me-1"></i>
                    Klik untuk buka di Google Maps
                </span>
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <div class="info-item">
                <span class="info-value blue" id="displayLat"><?= number_format($sekolah['latitude'] ?? 0, 6) ?></span>
                <span class="info-label"><i class="bi bi-arrow-up me-1"></i> Latitude</span>
            </div>
            <div class="info-item">
                <span class="info-value blue" id="displayLng"><?= number_format($sekolah['longitude'] ?? 0, 6) ?></span>
                <span class="info-label"><i class="bi bi-arrow-right me-1"></i> Longitude</span>
            </div>
            <div class="info-item">
                <span class="info-value green" id="displayStatus">
                    <i class="bi bi-check-circle-fill"></i> Terdeteksi
                </span>
                <span class="info-label"><i class="bi bi-satellite me-1"></i> Status</span>
            </div>
            <div class="info-item">
                <span class="info-value orange" id="displayZoom">Zoom: 13</span>
                <span class="info-label"><i class="bi bi-arrows-expand me-1"></i> Level Peta</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="btn-group-actions">
            <button type="submit" class="btn-save" id="btnSubmit">
                <i class="bi bi-save"></i> Simpan Lokasi
            </button>
            <button type="button" class="btn-save" style="background: #6b7280; box-shadow: none; margin-top: 16px;" 
                    onclick="openGoogleMaps()">
                <i class="bi bi-box-arrow-up-right"></i> Buka Google Maps
            </button>
        </div>
    </div>

</form>

<!-- ============================================
LEAFLET JS & CSS
============================================ -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- ============================================
SCRIPT: MAP & FITUR UNIK
============================================ -->
<script>
    // ============================================
    // INIT MAP
    // ============================================
    var defaultLat = <?= $sekolah['latitude'] ?: '-0.947083'; ?>;
    var defaultLng = <?= $sekolah['longitude'] ?: '100.417181'; ?>;
    
    var map = L.map('map', {
        center: [defaultLat, defaultLng],
        zoom: 13,
        zoomControl: false
    });

    // Tile Layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Custom Marker dengan Icon
    var schoolIcon = L.divIcon({
        className: 'custom-marker',
        html: '<div style="background:#1a56db;width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;border:3px solid white;box-shadow:0 4px 12px rgba(26,86,219,0.4);"><i class="bi bi-geo-alt-fill" style="color:white;font-size:18px;"></i></div>',
        iconSize: [36, 36],
        iconAnchor: [18, 36]
    });

    // Marker
    var marker = L.marker([defaultLat, defaultLng], {
        draggable: true,
        icon: schoolIcon
    }).addTo(map);

    // Circle area
    var circle = L.circle([defaultLat, defaultLng], {
        color: '#1a56db',
        fillColor: '#1a56db',
        fillOpacity: 0.08,
        radius: 100
    }).addTo(map);

    // ============================================
    // UPDATE FUNCTIONS
    // ============================================
    function updateLocation(lat, lng) {
        // Update inputs
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
        
        // Update display
        document.getElementById('displayLat').textContent = lat.toFixed(6);
        document.getElementById('displayLng').textContent = lng.toFixed(6);
        
        // Update marker & circle
        marker.setLatLng([lat, lng]);
        circle.setLatLng([lat, lng]);
        
        // Update Google Maps URL
        document.getElementById('gmaps_url').value = 
            'https://www.google.com/maps?q=' + lat + ',' + lng;
        
        // Update status
        document.getElementById('displayStatus').innerHTML = 
            '<i class="bi bi-check-circle-fill"></i> Terupdate';
        document.getElementById('displayStatus').style.color = '#16a34a';
        
        // Zoom display
        document.getElementById('displayZoom').textContent = 'Zoom: ' + map.getZoom();
    }

    // ============================================
    // EVENT: DRAG MARKER
    // ============================================
    marker.on('dragend', function(e) {
        var p = e.target.getLatLng();
        updateLocation(p.lat, p.lng);
    });

    // ============================================
    // EVENT: CLICK MAP
    // ============================================
    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        updateLocation(e.latlng.lat, e.latlng.lng);
    });

    // ============================================
    // EVENT: ZOOM CHANGE
    // ============================================
    map.on('zoomend', function() {
        document.getElementById('displayZoom').textContent = 'Zoom: ' + map.getZoom();
    });

    // ============================================
    // FITUR UNIK 1: PUSATKAN SEKOLAH
    // ============================================
    function goToSchool() {
        var lat = parseFloat(document.getElementById('latitude').value) || defaultLat;
        var lng = parseFloat(document.getElementById('longitude').value) || defaultLng;
        map.flyTo([lat, lng], 15, {
            duration: 1.5,
            easeLinearity: 0.25
        });
        document.getElementById('displayStatus').innerHTML = 
            '<i class="bi bi-geo-alt-fill"></i> Dipusatkan';
        document.getElementById('displayStatus').style.color = '#d97706';
        setTimeout(function() {
            document.getElementById('displayStatus').innerHTML = 
                '<i class="bi bi-check-circle-fill"></i> Terdeteksi';
            document.getElementById('displayStatus').style.color = '#16a34a';
        }, 2000);
    }

    // ============================================
    // FITUR UNIK 2: ZOOM IN
    // ============================================
    function zoomIn() {
        map.zoomIn();
    }

    // ============================================
    // FITUR UNIK 3: ZOOM OUT
    // ============================================
    function zoomOut() {
        map.zoomOut();
    }

    // ============================================
    // FITUR UNIK 4: LOKASI SAYA (GEOLOCATION)
    // ============================================
    function getCurrentLocation() {
        if (navigator.geolocation) {
            document.getElementById('displayStatus').innerHTML = 
                '<i class="bi bi-hourglass-split"></i> Mendeteksi...';
            document.getElementById('displayStatus').style.color = '#d97706';
            
            navigator.geolocation.getCurrentPosition(
                function(pos) {
                    var lat = pos.coords.latitude;
                    var lng = pos.coords.longitude;
                    updateLocation(lat, lng);
                    map.flyTo([lat, lng], 16, {
                        duration: 1.5,
                        easeLinearity: 0.25
                    });
                    document.getElementById('displayStatus').innerHTML = 
                        '<i class="bi bi-check-circle-fill"></i> Lokasi ditemukan';
                    document.getElementById('displayStatus').style.color = '#16a34a';
                    
                    // Tampilkan notifikasi
                    showToast('Lokasi berhasil ditemukan!', 'success');
                },
                function(error) {
                    document.getElementById('displayStatus').innerHTML = 
                        '<i class="bi bi-exclamation-triangle-fill"></i> Gagal';
                    document.getElementById('displayStatus').style.color = '#ef4444';
                    showToast('Gagal mendapatkan lokasi. Pastikan GPS aktif.', 'danger');
                }
            );
        } else {
            showToast('Browser tidak mendukung geolokasi.', 'warning');
        }
    }

    // ============================================
    // FITUR UNIK 5: RESET LOKASI
    // ============================================
    function resetLocation() {
        updateLocation(defaultLat, defaultLng);
        map.flyTo([defaultLat, defaultLng], 13, {
            duration: 1.2,
            easeLinearity: 0.25
        });
        document.getElementById('displayStatus').innerHTML = 
            '<i class="bi bi-arrow-counterclockwise"></i> Direset';
        document.getElementById('displayStatus').style.color = '#d97706';
        setTimeout(function() {
            document.getElementById('displayStatus').innerHTML = 
                '<i class="bi bi-check-circle-fill"></i> Terdeteksi';
            document.getElementById('displayStatus').style.color = '#16a34a';
        }, 2000);
        showToast('Lokasi direset ke default', 'info');
    }

    // ============================================
    // FITUR UNIK 6: SALIN KOORDINAT
    // ============================================
    function copyCoordinates() {
        var lat = document.getElementById('latitude').value;
        var lng = document.getElementById('longitude').value;
        var text = lat + ', ' + lng;
        
        if (navigator.clipboard) {
            navigator.clipboard.writeText(text).then(function() {
                showToast('Koordinat disalin: ' + text, 'success');
            });
        } else {
            // Fallback
            var input = document.createElement('input');
            input.value = text;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
            showToast('Koordinat disalin: ' + text, 'success');
        }
    }

    // ============================================
    // FITUR UNIK 7: BUKA GOOGLE MAPS
    // ============================================
    function openGoogleMaps() {
        var lat = document.getElementById('latitude').value;
        var lng = document.getElementById('longitude').value;
        var url = 'https://www.google.com/maps?q=' + lat + ',' + lng;
        window.open(url, '_blank');
    }

    // ============================================
    // FITUR UNIK 8: TOAST NOTIFICATION
    // ============================================
    function showToast(message, type) {
        var colors = {
            success: '#16a34a',
            danger: '#ef4444',
            warning: '#d97706',
            info: '#1a56db'
        };
        
        var toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: ${colors[type] || '#1a56db'};
            color: white;
            padding: 14px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            z-index: 9999;
            animation: slideUp 0.4s ease;
            max-width: 400px;
            font-family: 'Inter', sans-serif;
        `;
        toast.innerHTML = message;
        document.body.appendChild(toast);
        
        setTimeout(function() {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.3s ease';
            setTimeout(function() {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }

    // ============================================
    // INIT: SET DEFAULT
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        var lat = parseFloat(document.getElementById('latitude').value) || defaultLat;
        var lng = parseFloat(document.getElementById('longitude').value) || defaultLng;
        updateLocation(lat, lng);
        
        // Set Google Maps URL
        document.getElementById('gmaps_url').value = 
            'https://www.google.com/maps?q=' + lat + ',' + lng;
    });

    // ============================================
    // SHORTCUT: CTRL + ENTER = SUBMIT
    // ============================================
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            document.getElementById('formLokasi').submit();
        }
    });

    // ============================================
    // CSS UNTUK ANIMASI TOAST
    // ============================================
    var style = document.createElement('style');
    style.textContent = `
        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .custom-marker {
            background: transparent;
            border: none;
        }
    `;
    document.head.appendChild(style);
</script>

<?= $this->endSection() ?>