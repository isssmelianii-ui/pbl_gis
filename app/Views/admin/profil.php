<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<style>
    .alert-success {
        background: #dcfce7;
        padding: 15px 20px;
        border-radius: 12px;
        color: #166534;
        margin-bottom: 20px;
        border-left: 4px solid #22c55e;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
    }

    .card-custom {
        background: white;
        padding: 28px 30px;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        border: 1px solid #f1f5f9;
        margin-bottom: 24px;
    }

    .card-custom h3 {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f1f5f9;
    }

    .card-custom h3 i {
        color: var(--primary);
        margin-right: 8px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    data .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        font-size: 13px;
        color: #374151;
    }

    .form-group label .required {
        color: #ef4444;
        margin-left: 2px;
    }

    .form-control-custom {
        width: 100%;
        padding: 10px 14px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        font-size: 14px;
        transition: all 0.2s ease;
        background: #fafbfc;
    }

    .form-control-custom:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(26, 86, 219, 0.1);
        background: #fff;
    }

    .form-control-custom:hover {
        border-color: #9ca3af;
    }

    textarea.form-control-custom {
        resize: vertical;
        min-height: 80px;
    }

    select.form-control-custom {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236b7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        padding-right: 36px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .upload-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .upload-grid .upload-item {
        text-align: center;
    }

    .upload-grid .upload-item label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 13px;
        color: #374151;
    }

    .upload-grid .upload-item input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px dashed #d1d5db;
        border-radius: 10px;
        background: #fafbfc;
        font-size: 13px;
        cursor: pointer;
    }

    .upload-grid .upload-item input[type="file"]:hover {
        border-color: var(--primary);
        background: var(--primary-50);
    }

    .upload-grid .upload-item .preview-image {
        width: 100%;
        height: 140px;
        object-fit: cover;
        margin-top: 10px;
        border-radius: 12px;
        border: 1px solid #f1f5f9;
    }

    .upload-grid .upload-item .preview-placeholder {
        width: 100%;
        height: 140px;
        background: #f3f4f6;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 13px;
        border: 1px dashed #d1d5db;
        margin-top: 10px;
    }

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
    }

    .btn-save:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(26, 86, 219, 0.3);
    }

    .btn-save i {
        font-size: 18px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .profile-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .card-custom {
            padding: 20px 22px;
        }
    }

    @media (max-width: 768px) {
        .upload-grid {
            grid-template-columns: 1fr 1fr;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .card-custom {
            padding: 16px 18px;
        }

        .btn-save {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .upload-grid {
            grid-template-columns: 1fr;
        }

        .upload-grid .upload-item .preview-image,
        .upload-grid .upload-item .preview-placeholder {
            height: 100px;
        }
    }
</style>

<!-- ============================================
PAGE HEADER
============================================ -->
<div class="mb-4">
    <h4 class="fw-bold" style="color: #111827; font-size: 18px;">
        <i class="bi bi-building text-primary me-2"></i>
        Edit Profil Sekolah
    </h4>
    <p class="text-muted" style="font-size: 13px;">Lengkapi informasi sekolah agar tampil pada website publik.</p>
</div>

<!-- ============================================
FLASH MESSAGE
============================================ -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert-success">
        <i class="bi bi-check-circle-fill me-2"></i>
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert-danger"
        style="background:#fee2e2;padding:15px 20px;border-radius:12px;color:#991b1b;margin-bottom:20px;border-left:4px solid #ef4444;">
        <i class="bi bi-exclamation-circle-fill me-2"></i>
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- ============================================
FORM
============================================ -->
<form action="<?= base_url('admin/update-profil'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- GRID: Informasi Sekolah + Kontak -->
    <div class="profile-grid">

        <!-- KIRI: Informasi Sekolah -->
        <div class="card-custom">
            <h3><i class="bi bi-info-circle"></i> Informasi Sekolah</h3>

            <div class="form-group">
                <label>Nama Sekolah <span class="required">*</span></label>
                <input type="text" name="nama_sekolah" class="form-control-custom"
                    value="<?= old('nama_sekolah', $sekolah['nama_sekolah'] ?? '') ?>"
                    placeholder="Masukkan nama sekolah">
            </div>

            <div class="form-group">
                <label>NPSN</label>
                <input type="text" name="npsn" class="form-control-custom"
                    value="<?= old('npsn', $sekolah['npsn'] ?? '') ?>" placeholder="Masukkan NPSN">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jenjang</label>
                    <select name="jenjang" class="form-control-custom">
                        <option value="">Pilih Jenjang</option>
                        <option value="TK" <?= ($sekolah['jenjang'] ?? '') == 'TK' ? 'selected' : '' ?>>TK</option>
                        <option value="SD" <?= ($sekolah['jenjang'] ?? '') == 'SD' ? 'selected' : '' ?>>SD</option>
                        <option value="SMP" <?= ($sekolah['jenjang'] ?? '') == 'SMP' ? 'selected' : '' ?>>SMP</option>
                </div>
                <div class="form-group">
                    <label>Status Sekolah</label>
                    <input type="text" name="status_sekolah" class="form-control-custom"
                        value="<?= old('status_sekolah', $sekolah['status_sekolah'] ?? '') ?>"
                        placeholder="Contoh: Negeri / Swasta">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Akreditasi</label>
                    <input type="text" name="akreditasi" class="form-control-custom"
                        value="<?= old('akreditasi', $sekolah['akreditasi'] ?? '') ?>" placeholder="Contoh: A / B / C">
                </div>
                <div class="form-group">
                    <label>Kurikulum</label>
                    <input type="text" name="kurikulum" class="form-control-custom"
                        value="<?= old('kurikulum', $sekolah['kurikulum'] ?? '') ?>"
                        placeholder="Contoh: 2013 / Merdeka">
                </div>
            </div>

            <div class="form-group">
    <label>Kecamatan</label>
    <select name="kecamatan" class="form-control-custom">
        <option value="">Pilih Kecamatan</option>
        <?php
        $kecamatanOptions = ['Tanjung Emas', 'Padang Ganting', 'Lintau Buo'];
        $selectedKecamatan = old('kecamatan', $sekolah['kecamatan'] ?? '');
        foreach ($kecamatanOptions as $kec) :
        ?>
            <option value="<?= $kec; ?>" <?= ($selectedKecamatan == $kec) ? 'selected' : ''; ?>>
                <?= $kec; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control-custom" rows="4"
                    placeholder="Masukkan alamat lengkap"><?= old('alamat', $sekolah['alamat'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- KANAN: Kontak Sekolah -->
        <div class="card-custom">
            <h3><i class="bi bi-phone"></i> Kontak Sekolah</h3>

            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control-custom"
                    value="<?= old('telepon', $sekolah['telepon'] ?? '') ?>" placeholder="Masukkan nomor telepon">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control-custom"
                    value="<?= old('email', $sekolah['email'] ?? '') ?>" placeholder="Masukkan email sekolah">
            </div>

            <div class="form-group">
                <label>Website</label>
                <input type="text" name="website" class="form-control-custom"
                    value="<?= old('website', $sekolah['website'] ?? '') ?>" placeholder="Masukkan website sekolah">
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input type="text" name="latitude" class="form-control-custom"
                    value="<?= old('latitude', $sekolah['latitude'] ?? '') ?>" placeholder="Contoh: -6.123456">
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input type="text" name="longitude" class="form-control-custom"
                    value="<?= old('longitude', $sekolah['longitude'] ?? '') ?>" placeholder="Contoh: 106.123456">
            </div>
        </div>
    </div>

    <!-- ============================================
    MEDIA SEKOLAH
    ============================================ -->
    <div class="card-custom">
        <h3><i class="bi bi-image"></i> Media Sekolah</h3>

        <div class="upload-grid">
            <div class="upload-item">
                <label>Cover Sekolah</label>
                <input type="file" name="cover" accept="image/*">
                <?php if (!empty($sekolah['cover'])): ?>
                    <img src="<?= base_url('uploads/cover/' . $sekolah['cover']); ?>" class="preview-image" alt="Cover">
                <?php else: ?>
                    <div class="preview-placeholder">
                        <span><i class="bi bi-image me-1"></i> Belum ada cover</span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="upload-item">
                <label>Logo Sekolah</label>
                <input type="file" name="logo" accept="image/*">
                <?php if (!empty($sekolah['logo'])): ?>
                    <img src="<?= base_url('uploads/logo/' . $sekolah['logo']); ?>" class="preview-image" alt="Logo">
                <?php else: ?>
                    <div class="preview-placeholder">
                        <span><i class="bi bi-image me-1"></i> Belum ada logo</span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="upload-item">
                <label>Foto Sekolah</label>
                <input type="file" name="foto" accept="image/*">
                <?php if (!empty($sekolah['foto'])): ?>
                    <img src="<?= base_url('uploads/sekolah/' . $sekolah['foto']); ?>" class="preview-image" alt="Foto">
                <?php else: ?>
                    <div class="preview-placeholder">
                        <span><i class="bi bi-image me-1"></i> Belum ada foto</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ============================================
    SUBMIT BUTTON
    ============================================ -->
    <button type="submit" class="btn-save">
        <i class="bi bi-save"></i> Simpan Profil Sekolah
    </button>

</form>

<?= $this->endSection() ?>