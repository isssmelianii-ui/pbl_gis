<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<style>
    /* ============================================
       KEPALA SEKOLAH STYLES
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

    .kepala-grid {
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 24px;
    }

    .card-custom {
        background: white;
        padding: 28px 30px;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        border: 1px solid #f1f5f9;
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

    /* Foto Preview */
    .foto-preview {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .foto-preview img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid var(--primary-50);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        background: #f3f4f6;
    }

    .foto-preview img:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 32px rgba(26, 86, 219, 0.15);
    }

    .foto-upload {
        text-align: center;
    }

    .foto-upload input[type="file"] {
        width: 100%;
        padding: 10px 14px;
        border: 1px dashed #d1d5db;
        border-radius: 10px;
        background: #fafbfc;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .foto-upload input[type="file"]:hover {
        border-color: var(--primary);
        background: var(--primary-50);
    }

    .foto-upload .file-hint {
        font-size: 12px;
        color: #6b7280;
        margin-top: 6px;
        display: block;
    }

    /* Form */
    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
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
        font-family: 'Inter', sans-serif;
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
        min-height: 120px;
    }

    /* Button */
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
        margin-top: 8px;
    }

    .btn-save:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(26, 86, 219, 0.3);
    }

    .btn-save i {
        font-size: 18px;
    }

    /* ============================================
       RESPONSIVE
    ============================================ */

    @media (max-width: 992px) {
        .kepala-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .card-custom {
            padding: 22px 24px;
        }

        .foto-preview img {
            width: 160px;
            height: 160px;
        }
    }

    @media (max-width: 768px) {
        .card-custom {
            padding: 18px 20px;
        }

        .foto-preview img {
            width: 140px;
            height: 140px;
        }

        .btn-save {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .card-custom {
            padding: 14px 16px;
            border-radius: 12px;
        }

        .card-custom h3 {
            font-size: 14px;
        }

        .foto-preview img {
            width: 120px;
            height: 120px;
            border-width: 4px;
        }

        .form-control-custom {
            font-size: 13px;
            padding: 8px 12px;
        }

        .btn-save {
            font-size: 13px;
            padding: 10px 20px;
        }

        .alert-success {
            font-size: 13px;
            padding: 12px 16px;
        }
    }
</style>

<!-- ============================================
PAGE HEADER
============================================ -->
<div class="mb-4">
    <h4 class="fw-bold" style="color: #111827; font-size: 18px;">
        <i class="bi bi-person-badge text-primary me-2"></i>
        Kepala Sekolah
    </h4>
    <p class="text-muted" style="font-size: 13px;">Lengkapi informasi Kepala Sekolah beserta sambutannya.</p>
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
<form action="<?= base_url('admin/update-kepala'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="kepala-grid">

        <!-- KIRI: Foto -->
        <div class="card-custom">
            <h3><i class="bi bi-image"></i> Foto Kepala Sekolah</h3>

            <div class="foto-preview">
                <?php if(!empty($sekolah['foto_kepala'])) : ?>
                    <img id="preview" src="<?= base_url('uploads/kepala/'.$sekolah['foto_kepala']); ?>" alt="Foto Kepala Sekolah">
                <?php else : ?>
                    <img id="preview" src="https://ui-avatars.com/api/?name=Kepala+Sekolah&size=300&background=1a56db&color=fff&bold=true" alt="Foto Kepala Sekolah">
                <?php endif; ?>
            </div>

            <div class="foto-upload">
                <input type="file" name="foto_kepala" id="foto" accept="image/*">
                <span class="file-hint"><i class="bi bi-info-circle me-1"></i> Format: JPG, PNG. Maks: 2MB</span>
            </div>
        </div>

        <!-- KANAN: Data -->
        <div class="card-custom">
            <h3><i class="bi bi-person-lines-fill"></i> Identitas Kepala Sekolah</h3>

            <div class="form-group">
                <label>Nama Kepala Sekolah <span class="required">*</span></label>
                <input type="text" class="form-control-custom" name="kepala_sekolah" 
                       value="<?= old('kepala_sekolah', $sekolah['kepala_sekolah'] ?? '') ?>" 
                       placeholder="Masukkan nama kepala sekolah">
            </div>

            <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control-custom" name="nip_kepala" 
                       value="<?= old('nip_kepala', $sekolah['nip_kepala'] ?? '') ?>" 
                       placeholder="Masukkan NIP kepala sekolah">
            </div>

            <div class="form-group">
                <label>Sambutan Kepala Sekolah</label>
                <textarea class="form-control-custom" name="sambutan" rows="8" 
                          placeholder="Masukkan sambutan kepala sekolah"><?= old('sambutan', $sekolah['sambutan'] ?? '') ?></textarea>
            </div>

            <button type="submit" class="btn-save">
                <i class="bi bi-save"></i> Simpan Data
            </button>
        </div>

    </div>
</form>

<!-- ============================================
SCRIPT: PREVIEW FOTO
============================================ -->
<script>
    document.getElementById('foto').onchange = function(e) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('preview').src = reader.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
</script>

<?= $this->endSection() ?>