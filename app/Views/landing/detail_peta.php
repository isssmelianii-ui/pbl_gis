<?= $this->include('layouts/header_admin'); ?>
<?= $this->include('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="school-hero-banner">
        <?php 
            // Mengambil background secara dinamis. Jika foto sekolah belum diunggah, otomatis menggunakan placeholder premium.
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
            <h1 class="school-title"><?= $sekolah['name_sekolah'] ?: 'Name Sekolah'; ?></h1>
            <p class="school-subtitle">
                Pengaturan Profil <span class="separator">•</span> NPSN: <?= $sekolah['npsn'] ?: '-'; ?> <span class="separator">•</span> Wilayah Kec. <?= $sekolah['kecamatan'] ?: '-'; ?>
            </p>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert-success">
            <i class="fa fa-check-circle" style="margin-right: 8px;"></i> <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/update-profil'); ?>" method="post" enctype="multipart/form-data">
        
        <div class="profile-grid">
            
            <div class="card">
                <div class="card-header-form">
                    <i class="fa fa-university icon-form"></i>
                    <h3>Informasi Utama Sekolah</h3>
                </div>
                
                <div class="form-group">
                    <label>Nama Sekolah</label>
                    <input type="text" name="name_sekolah" value="<?= $sekolah['name_sekolah']; ?>" placeholder="Masukkan nama sekolah">
                </div>

                <div class="form-group">
                    <label>NPSN</label>
                    <input type="text" name="npsn" value="<?= $sekolah['npsn']; ?>" placeholder="Masukkan nomor NPSN">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Jenjang Sekolah</label>
                        <select name="jenjang">
                            <option value="">Pilih</option>
                            <option value="TK" <?= $sekolah['jenjang']=='TK'?'selected':''; ?>>TK</option>
                            <option value="SD" <?= $sekolah['jenjang']=='SD'?'selected':''; ?>>SD</option>
                            <option value="SMP" <?= $sekolah['jenjang']=='SMP'?'selected':''; ?>>SMP</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status_sekolah" value="<?= $sekolah['status_sekolah']; ?>" placeholder="Contoh: Negeri / Swasta">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Akreditasi</label>
                        <input type="text" name="akreditasi" value="<?= $sekolah['akreditasi']; ?>" placeholder="Contoh: A / B / C">
                    </div>

                    <div class="form-group">
                        <label>Kurikulum</label>
                        <input type="text" name="kurikulum" value="<?= $sekolah['kurikulum']; ?>" placeholder="Contoh: Kurikulum Merdeka">
                    </div>
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" value="<?= $sekolah['kecamatan']; ?>" placeholder="Masukkan nama kecamatan">
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea rows="5" name="alamat" placeholder="Tuliskan alamat jalan, RT/RW, dan kode pos..."><?= $sekolah['alamat']; ?></textarea>
                </div>
            </div>

            <div class="card">
                <div class="card-header-form">
                    <i class="fa fa-map-marker-alt icon-form"></i>
                    <h3>Kontak & Geografis GIS</h3>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="telepon" value="<?= $sekolah['telepon']; ?>" placeholder="Contoh: (021) 123456">
                </div>

                <div class="form-group">
                    <label>Email Sekolah</label>
                    <input type="email" name="email" value="<?= $sekolah['email']; ?>" placeholder="sekolah@email.sch.id">
                </div>

                <div class="form-group">
                    <label>Alamat URL Website</label>
                    <input type="text" name="website" value="<?= $sekolah['website']; ?>" placeholder="www.sekolah.sch.id">
                </div>

                <div class="form-group coordinate-group">
                    <label>Garis Lintang (Latitude)</label>
                    <input type="text" name="latitude" value="<?= $sekolah['latitude']; ?>" placeholder="Contoh: -6.123456">
                </div>

                <div class="form-group coordinate-group">
                    <label>Garis Bujur (Longitude)</label>
                    <input type="text" name="longitude" value="<?= $sekolah['longitude']; ?>" placeholder="Contoh: 106.123456">
                </div>
            </div>

        </div>

        <div class="card mt">
            <div class="card-header-form">
                <i class="fa fa-images icon-form"></i>
                <h3>Berkas Media & Galeri Foto</h3>
            </div>
            
            <div class="upload-grid">
                <div class="upload-box">
                    <label class="upload-label">Gambar Cover Banner</label>
                    <input type="file" name="cover">
                    <?php if($sekolah['cover']) : ?>
                        <div class="preview-wrapper">
                            <img src="<?= base_url('uploads/cover/'.$sekolah['cover']); ?>" alt="Cover">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="upload-box">
                    <label class="upload-label">Logo Institusi</label>
                    <input type="file" name="logo">
                    <?php if($sekolah['logo']) : ?>
                        <div class="preview-wrapper logo-preview">
                            <img src="<?= base_url('uploads/logo/'.$sekolah['logo']); ?>" alt="Logo">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="upload-box">
                    <label class="upload-label">Foto Utama Gedung (BG Banner)</label>
                    <input type="file" name="foto">
                    <?php if($sekolah['foto']) : ?>
                        <div class="preview-wrapper">
                            <img src="<?= base_url('uploads/sekolah/'.$sekolah['foto']); ?>" alt="Foto Sekolah">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="action-footer">
            <button type="submit" class="btn-save">
                <i class="fa fa-save"></i> Simpan Perubahan Profil
            </button>
        </div>

    </form>

</div>

<style>
    body {
        background-color: #f8fafc;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    /* Hero Banner Area di bagian atas Form */
    .school-hero-banner {
        position: relative;
        background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
        border-radius: 16px;
        padding: 45px 35px;
        color: white;
        overflow: hidden;
        margin-bottom: 25px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    .banner-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.3; /* Visibilitas background gambar tajam */
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
        margin-bottom: 12px;
    }
    .badge {
        font-size: 11px;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 30px;
        letter-spacing: 0.3px;
    }
    .badge-status { background-color: #22c55e; color: white; }
    .badge-akreditasi { background-color: #3b82f6; color: white; }
    
    .school-title {
        font-size: 30px;
        font-weight: 700;
        margin: 0 0 8px 0;
        letter-spacing: -0.5px;
    }
    .school-subtitle {
        margin: 0;
        font-size: 13px;
        opacity: 0.85;
    }
    .separator { margin: 0 6px; opacity: 0.5; }

    /* Alert Message */
    .alert-success {
        background: #dcfce7;
        padding: 15px 20px;
        margin-bottom: 25px;
        border-radius: 12px;
        color: #166534;
        font-weight: 500;
        border-left: 5px solid #22c55e;
        display: flex;
        align-items: center;
    }

    /* Grid Layout */
    .profile-grid {
        display: grid;
        grid-template-columns: 1.6fr 1fr;
        gap: 25px;
    }

    /* Card Styling */
    .card {
        background: white;
        padding: 25px 30px;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,.03);
        margin-bottom: 25px;
        border: 1px solid #e2e8f0;
    }
    .card-header-form {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 25px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 12px;
    }
    .icon-form {
        color: #2563eb;
        font-size: 18px;
    }
    .card h3 {
        margin: 0;
        font-size: 16px;
        color: #1e293b;
        font-weight: 700;
    }

    /* Inputs fields controls */
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #475569;
        font-size: 13px;
    }
    input, select, textarea {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        font-size: 14px;
        color: #334155;
        background-color: #fff;
        transition: all 0.2s;
        box-sizing: border-box;
    }
    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    /* Media Upload Area */
    .upload-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .upload-box {
        background: #f8fafc;
        padding: 15px;
        border-radius: 12px;
        border: 1px dashed #cbd5e1;
    }
    .upload-label {
        display: block;
        font-weight: 600;
        font-size: 12px;
        color: #475569;
        margin-bottom: 8px;
    }
    .preview-wrapper {
        margin-top: 12px;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        background: #fff;
        height: 140px;
    }
    .preview-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .logo-preview {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
    }
    .logo-preview img {
        width: auto;
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .mt { margin-top: 20px; }

    /* Footer Action Button */
    .action-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
        margin-bottom: 40px;
    }
    .btn-save {
        background: #2563eb;
        color: white;
        padding: 14px 40px;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        cursor: pointer;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        transition: background 0.2s;
    }
    .btn-save:hover {
        background: #1d4ed8;
    }

    /* Responsive adjustments */
    @media(max-width: 991px){
        .profile-grid { grid-template-columns: 1fr; }
        .upload-grid { grid-template-columns: 1fr; }
    }
    @media(max-width: 576px){
        .form-row { grid-template-columns: 1fr; }
        .school-title { font-size: 24px; }
    }
</style>

<?= $this->include('layouts/footer_admin'); ?>