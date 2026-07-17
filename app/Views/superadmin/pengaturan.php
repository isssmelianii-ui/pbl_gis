<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

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
        --surface:#ffffff;
        --green-bg:#e6f5ee;
        --green-fg:#1a8a5f;
        --danger-bg:#fdecec;
        --danger-fg:#b3261e;
    }

    .main-content{
        margin-left:280px;
        padding:32px;
        background:#f5f7fa;
        min-height:100vh;
        font-family:'Plus Jakarta Sans',sans-serif;
        color:var(--ink-900);
    }

    .main-content .mono{
        font-family:'JetBrains Mono',monospace;
    }

    /* HEADER */

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

    .settings-header h1{
        font-size:28px;
        font-weight:800;
        color:var(--ink-900);
        margin-bottom:6px;
        letter-spacing:-0.4px;
    }

    .settings-header p{
        color:var(--ink-600);
        font-size:14px;
    }

    /* ALERT */

    .alert-box{
        padding:14px 16px;
        border-radius:12px;
        margin-bottom:22px;
        font-size:13.5px;
    }

    .alert-success{
        background:var(--green-bg);
        color:var(--green-fg);
        border:1px solid rgba(26,138,95,0.18);
    }

    .alert-error{
        background:var(--danger-bg);
        color:var(--danger-fg);
        border:1px solid rgba(179,38,30,0.18);
    }

    /* CARD */

    .settings-card{
        background:var(--surface);
        border-radius:20px;
        padding:34px;
        border:1px solid var(--line);
        box-shadow:0 12px 30px rgba(14,42,71,0.06);
        max-width:640px;
    }

    .settings-hint{
        font-family:'JetBrains Mono',monospace;
        font-size:11px;
        letter-spacing:0.6px;
        text-transform:uppercase;
        color:var(--ink-400);
        margin-bottom:16px;
    }

    .settings-card hr{
        margin:26px 0;
        border:none;
        border-top:1px solid var(--line);
    }

    /* FORM */

    .form-group{
        margin-bottom:22px;
    }

    .form-group label{
        display:block;
        font-weight:700;
        font-size:13px;
        color:var(--ink-900);
        margin-bottom:9px;
    }

    .field-box{
        position:relative;
    }

    .field-box input{
        width:100%;
        padding:13.5px 15px;
        border:1.5px solid var(--line);
        border-radius:12px;
        font-size:14px;
        font-family:inherit;
        color:var(--ink-900);
        background:#f8fafc;
        outline:none;
        transition:border-color 0.15s ease, background 0.15s ease, box-shadow 0.15s ease;
    }

    .field-box input::placeholder{
        color:var(--ink-400);
    }

    .field-box input:focus{
        border-color:var(--navy-800);
        background:#fff;
        box-shadow:0 0 0 3.5px rgba(14,42,71,0.09);
    }

    .field-box input[type="password"]{
        padding-right:46px;
    }

    .field-box .toggle-eye{
        position:absolute;
        right:15px;
        top:50%;
        transform:translateY(-50%);
        cursor:pointer;
        color:var(--ink-400);
        font-size:14px;
        transition:color 0.15s ease;
    }

    .field-box .toggle-eye:hover{
        color:var(--ink-600);
    }

    /* Sembunyikan ikon reveal-password bawaan browser */
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear{
        display:none;
    }

    /* BUTTON */

    .submit-btn{
        background:var(--navy-900);
        color:white;
        border:none;
        padding:14px 26px;
        border-radius:12px;
        font-size:14px;
        font-weight:700;
        font-family:inherit;
        cursor:pointer;
        display:inline-flex;
        align-items:center;
        gap:9px;
        transition:background 0.15s ease;
    }

    .submit-btn:hover{
        background:var(--navy-800);
    }

    /* ================================
       RESPONSIVE
    ================================ */

    @media(max-width:992px){

        .main-content{
            margin-left:0;
            padding:88px 20px 20px;
        }

    }

    @media(max-width:600px){

        .main-content{
            padding:80px 16px 16px;
        }

        .settings-card{
            padding:22px;
        }

        .submit-btn{
            width:100%;
            justify-content:center;
        }

    }

</style>

<div class="main-content">

    <!-- HEADER -->

    <div class="settings-header">

        <div class="eyebrow">Manajemen Akun</div>

        <h1>
            Pengaturan Akun
        </h1>

        <p>
            Kelola informasi akun Super Admin.
        </p>

    </div>

    <!-- CARD -->

    <div class="settings-card">

        <?php if(session()->getFlashdata('success')) : ?>

            <div class="alert-box alert-success">

                <?= session()->getFlashdata('success'); ?>

            </div>

        <?php endif; ?>

        <?php if(session()->getFlashdata('error')) : ?>

            <div class="alert-box alert-error">

                <?= session()->getFlashdata('error'); ?>

            </div>

        <?php endif; ?>

        <form action="<?= base_url('superadmin/update-pengaturan'); ?>" method="post">

            <?= csrf_field(); ?>

            <div class="settings-hint">Informasi Akun</div>

            <!-- NAMA -->

            <div class="form-group">

                <label>
                    Nama
                </label>

                <div class="field-box">

                    <input
                        type="text"
                        name="name"
                        value="<?= $user['name']; ?>"
                        required
                    >

                </div>

            </div>

            <!-- EMAIL -->

            <div class="form-group">

                <label>
                    Email
                </label>

                <div class="field-box">

                    <input
                        type="email"
                        name="email"
                        value="<?= $user['email']; ?>"
                        required
                    >

                </div>

            </div>

            <hr>

            <div class="settings-hint">Ubah Kata Sandi</div>

            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Password Baru
                </label>

                <div class="field-box">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Kosongkan jika tidak ingin mengganti password"
                    >

                    <i
                        class="fa-solid fa-eye toggle-eye"
                        onclick="togglePassword('password',this)"
                    ></i>

                </div>

            </div>

            <!-- KONFIRMASI PASSWORD -->

            <div class="form-group" style="margin-bottom:30px;">

                <label>
                    Konfirmasi Password
                </label>

                <div class="field-box">

                    <input
                        type="password"
                        id="konfirmasi"
                        name="konfirmasi"
                        placeholder="Masukkan kembali password"
                    >

                    <i
                        class="fa-solid fa-eye toggle-eye"
                        onclick="togglePassword('konfirmasi',this)"
                    ></i>

                </div>

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                class="submit-btn"
            >

                <i class="fa-solid fa-floppy-disk"></i>

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

<script>

function togglePassword(id,icon){

    let input=document.getElementById(id);

    if(input.type==="password"){

        input.type="text";

        icon.classList.remove("fa-eye");

        icon.classList.add("fa-eye-slash");

    }else{

        input.type="password";

        icon.classList.remove("fa-eye-slash");

        icon.classList.add("fa-eye");

    }

}

</script>

<?= $this->include('layouts/footer'); ?>