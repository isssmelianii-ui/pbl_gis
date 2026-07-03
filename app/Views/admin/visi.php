<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<style>
    .card-custom {
        background: white;
        padding: 28px 30px;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        border: 1px solid #f1f5f9;
    }

    .card-custom h4 {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 4px;
    }

    .card-custom .subtitle {
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        font-size: 13px;
        color: #374151;
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

    textarea.form-control-custom {
        resize: vertical;
        min-height: 100px;
    }

    .char-count {
        font-size: 12px;
        color: #6b7280;
        margin-top: 4px;
        display: block;
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

    .alert-success {
        background: #dcfce7;
        padding: 15px 20px;
        border-radius: 12px;
        color: #166534;
        margin-bottom: 20px;
        border-left: 4px solid #22c55e;
    }

    @media (max-width: 576px) {
        .card-custom { padding: 18px 16px; }
        .btn-save { width: 100%; justify-content: center; }
    }
</style>

<!-- ============================================
PAGE HEADER
============================================ -->
<div class="mb-4">
    <h4 class="fw-bold" style="color: #111827; font-size: 18px;">
        <i class="bi bi-eye text-primary me-2"></i>
        Visi & Misi Sekolah
    </h4>
    <p class="text-muted" style="font-size: 13px;">Lengkap visi dan misi sekolah yang akan ditampilkan kepada masyarakat.</p>
</div>

<!-- ============================================
FLASH MESSAGE
============================================ -->
<?php if(session()->getFlashdata('success')) : ?>
    <div class="alert-success">
        <i class="bi bi-check-circle-fill me-2"></i>
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- ============================================
FORM
============================================ -->
<div class="card-custom">
    <form action="<?= base_url('admin/update-visi'); ?>" method="post">
        <?= csrf_field() ?>

        <!-- Visi -->
        <div class="form-group">
            <label for="visi">Visi Sekolah</label>
            <textarea class="form-control-custom" id="visi" name="visi" rows="4" 
                      placeholder="Masukkan visi sekolah..." 
                      oninput="updateCharCount('visi', 'visiCount')"><?= old('visi', $sekolah['visi'] ?? '') ?></textarea>
            <span class="char-count" id="visiCount">0 karakter</span>
        </div>

        <!-- Misi -->
        <div class="form-group">
            <label for="misi">Misi Sekolah</label>
            <textarea class="form-control-custom" id="misi" name="misi" rows="4" 
                      placeholder="Masukkan misi sekolah..." 
                      oninput="updateCharCount('misi', 'misiCount')"><?= old('misi', $sekolah['misi'] ?? '') ?></textarea>
            <span class="char-count" id="misiCount">0 karakter</span>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-save">
            <i class="bi bi-save"></i> Simpan Visi & Misi
        </button>
    </form>
</div>

<script>
    function updateCharCount(textareaId, counterId) {
        const textarea = document.getElementById(textareaId);
        const counter = document.getElementById(counterId);
        if (textarea && counter) {
            counter.textContent = textarea.value.length + ' karakter';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateCharCount('visi', 'visiCount');
        updateCharCount('misi', 'misiCount');
    });
</script>

<?= $this->endSection() ?>