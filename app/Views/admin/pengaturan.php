<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<style>

    :root{
        --navy-950:#0a1d33;
        --navy-900:#0e2a47;
        --navy-800:#153a5f;
        --gold-500:#c08a28;
        --gold-400:#d6a445;
        --ink-900:#1c2733;
        --ink-600:#54626f;
        --ink-400:#8b97a3;
        --line:#e3e8ee;
    }

    .settings-header{
        margin-bottom:28px;
    }

    .settings-header .eyebrow{
        font-family:'JetBrains Mono',monospace;
        font-size:11.5px;
        letter-spacing:1.2px;
        text-transform:uppercase;
        color:var(--gold-500);
        margin-bottom:10px;
        display:flex;
        align-items:center;
        gap:9px;
    }

    .settings-header .eyebrow::before{
        content:'';
        width:20px;
        height:1px;
        background:var(--gold-500);
    }

    .settings-header h2{
        font-size:24px;
        font-weight:800;
        color:var(--ink-900);
        margin-bottom:6px;
        letter-spacing:-0.3px;
        display:flex;
        align-items:center;
        gap:12px;
    }

    .settings-header h2 .icon-badge{
        width:38px;
        height:38px;
        border-radius:11px;
        background:var(--navy-900);
        color:var(--gold-400);
        display:inline-flex;
        align-items:center;
        justify-content:center;
        font-size:16px;
        flex-shrink:0;
    }

    .settings-header p{
        color:var(--ink-600);
        font-size:14px;
        margin:0;
    }

    /* ALERT */

    .alert-success{
        background:#e6f5ee;
        color:#1a8a5f;
        border:1px solid rgba(26,138,95,0.18);
        border-radius:12px;
    }

    .alert-danger{
        background:#fdecec;
        color:#b3261e;
        border:1px solid rgba(179,38,30,0.18);
        border-radius:12px;
    }

    /* CARD */

    .settings-card{
        border:1px solid var(--line) !important;
        box-shadow:0 12px 30px rgba(14,42,71,0.06) !important;
        max-width:640px;
    }

    .settings-card .card-body{
        padding:32px !important;
    }

    @media(max-width:576px){

        .settings-card .card-body{
            padding:22px !important;
        }

    }

    /* FORM */

    .form-label{
        font-size:13px;
        font-weight:700 !important;
        color:var(--ink-900);
        margin-bottom:8px;
    }

    .form-control{
        border:1.5px solid var(--line);
        border-radius:11px;
        padding:12px 14px;
        font-size:14px;
        color:var(--ink-900);
        background:#f8fafc;
        transition:border-color 0.15s ease, background 0.15s ease, box-shadow 0.15s ease;
    }

    .form-control::placeholder{
        color:var(--ink-400);
    }

    .form-control:focus{
        border-color:var(--navy-800);
        background:#fff;
        box-shadow:0 0 0 3.5px rgba(14,42,71,0.09);
    }

    .settings-card hr{
        margin:26px 0;
        border-color:var(--line);
        opacity:1;
    }

    .settings-hint{
        font-family:'JetBrains Mono',monospace;
        font-size:11px;
        letter-spacing:0.6px;
        text-transform:uppercase;
        color:var(--ink-400);
        margin-bottom:16px;
    }

    /* BUTTON */

    .btn-primary{
        background:var(--navy-900) !important;
        border-color:var(--navy-900) !important;
        font-weight:700;
        font-size:13.5px;
        padding:12px 24px !important;
        border-radius:11px !important;
        display:inline-flex;
        align-items:center;
        gap:9px;
        transition:background 0.15s ease, border-color 0.15s ease;
    }

    .btn-primary:hover,
    .btn-primary:focus{
        background:var(--navy-800) !important;
        border-color:var(--navy-800) !important;
    }

    .text-primary{
        color:var(--navy-900) !important;
    }

    @media(max-width:576px){

        .btn-primary{
            width:100%;
            justify-content:center;
        }

    }

</style>

<div class="container-fluid">

    <div class="settings-header">

        <div class="eyebrow">Manajemen Akun</div>

        <h2>
            <span class="icon-badge"><i class="bi bi-gear-fill"></i></span>
            Pengaturan Akun
        </h2>

        <p>
            Kelola informasi akun operator.
        </p>

    </div>

    <?php if(session()->getFlashdata('success')) : ?>

        <div class="alert alert-success">

            <?= session()->getFlashdata('success'); ?>

        </div>

    <?php endif; ?>

    <?php if(session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger">

            <?= session()->getFlashdata('error'); ?>

        </div>

    <?php endif; ?>

    <div class="card shadow-sm border-0 rounded-4 settings-card">

        <div class="card-body p-4">

            <form action="<?= base_url('admin/update-pengaturan') ?>" method="post">

                <?= csrf_field() ?>

                <div class="settings-hint">Informasi Akun</div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Nama

                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="<?= esc($user['name']) ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= esc($user['email']) ?>"
                        required>

                </div>

                <hr>

                <div class="settings-hint">Ubah Kata Sandi</div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Password Baru

                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengganti">

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Konfirmasi Password

                    </label>

                    <input
                        type="password"
                        name="konfirmasi"
                        class="form-control"
                        placeholder="Ulangi password baru">

                </div>

                <button
                    type="submit"
                    class="btn btn-primary px-4">

                    <i class="bi bi-check-circle"></i>

                    Simpan Perubahan

                </button>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>