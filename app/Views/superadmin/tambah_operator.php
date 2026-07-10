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
    }

    .main-content{
        margin-left:280px;
        padding:40px;
        background:#f5f7fa;
        min-height:100vh;
        font-family:'Plus Jakarta Sans',sans-serif;
        color:var(--ink-900);
    }

    .form-card{
        width:100%;
        max-width:720px;
        background:var(--surface);
        border-radius:22px;
        padding:38px;
        border:1px solid var(--line);
        box-shadow:0 15px 40px rgba(14,42,71,0.06);
    }

    .page-title{
        margin-bottom:32px;
        padding-bottom:24px;
        border-bottom:1px solid var(--line);
    }

    .page-title .eyebrow{
        font-family:'JetBrains Mono',monospace;
        font-size:11.5px;
        letter-spacing:1.2px;
        text-transform:uppercase;
        color:var(--gold-500);
        margin-bottom:12px;
        display:flex;
        align-items:center;
        gap:9px;
    }

    .page-title .eyebrow::before{
        content:'';
        width:20px;
        height:1px;
        background:var(--gold-500);
    }

    .page-title h1{
        font-size:28px;
        font-weight:800;
        color:var(--ink-900);
        margin-bottom:10px;
        letter-spacing:-0.4px;
    }

    .page-title p{
        color:var(--ink-600);
        font-size:14px;
        line-height:1.75;
        max-width:520px;
    }

    .input-group{
        margin-bottom:22px;
    }

    .input-group label{
        display:block;
        margin-bottom:9px;
        font-size:13px;
        font-weight:700;
        color:var(--ink-900);
    }

    .field-box{
        display:flex;
        align-items:center;
        gap:11px;
        border:1.5px solid var(--line);
        border-radius:12px;
        background:#f8fafc;
        padding:0 15px;
        transition:border-color 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
    }

    .field-box:focus-within{
        border-color:var(--navy-800);
        background:white;
        box-shadow:0 0 0 3.5px rgba(14,42,71,0.09);
    }

    .field-box i{
        color:var(--ink-400);
        font-size:14px;
        flex-shrink:0;
    }

    .field-box input{
        width:100%;
        padding:14px 0;
        border:none;
        outline:none;
        background:transparent;
        font-size:14px;
        font-family:inherit;
        color:var(--ink-900);
    }

    .field-box input::placeholder{
        color:var(--ink-400);
    }

    .form-actions{
        display:flex;
        gap:12px;
        margin-top:30px;
        padding-top:24px;
        border-top:1px solid var(--line);
    }

    .submit-btn{
        background:var(--navy-900);
        color:white;
        border:none;
        padding:14.5px 26px;
        border-radius:12px;
        cursor:pointer;
        font-size:14px;
        font-weight:700;
        font-family:inherit;
        display:flex;
        align-items:center;
        gap:9px;
        transition:background 0.15s ease;
    }

    .submit-btn:hover{
        background:var(--navy-800);
    }

    @media(max-width:992px){

        .main-content{
            margin-left:0;
            padding:88px 20px 20px;
        }

    }

    @media(max-width:600px){

        .main-content{
            padding:22px;
        }

        .form-card{
            padding:26px;
        }

        .submit-btn{
            width:100%;
            justify-content:center;
        }

    }

</style>

<div class="main-content">

    <div class="form-card">

        <div class="page-title">

            <div class="eyebrow">Manajemen Akun</div>

            <h1>
                Tambah Operator
            </h1>

            <p>
                Tambahkan akun operator sekolah untuk mengelola data sistem pemetaan sekolah.
            </p>

        </div>

        <form action="<?= base_url('/superadmin/simpan-operator'); ?>"
        method="post">

            <!-- NAMA -->

            <div class="input-group">

                <label>
                    Nama Operator
                </label>

                <div class="field-box">

                    <i class="fa-regular fa-user"></i>

                    <input type="text"
                    name="name"
                    placeholder="Masukkan nama operator..."
                    required>

                </div>

            </div>

            <!-- EMAIL -->

            <div class="input-group">

                <label>
                    Email Operator
                </label>

                <div class="field-box">

                    <i class="fa-regular fa-envelope"></i>

                    <input type="email"
                    name="email"
                    placeholder="Masukkan email operator..."
                    required>

                </div>

            </div>

            <!-- USERNAME -->

            <div class="input-group">

                <label>
                    Username
                </label>

                <div class="field-box">

                    <i class="fa-solid fa-at"></i>

                    <input type="text"
                    name="username"
                    placeholder="Masukkan username..."
                    required>

                </div>

            </div>

            <!-- PASSWORD -->

            <div class="input-group">

                <label>
                    Password
                </label>

                <div class="field-box">

                    <i class="fa-solid fa-lock"></i>

                    <input type="password"
                    name="password"
                    placeholder="Masukkan password..."
                    required>

                </div>

            </div>

            <div class="form-actions">

                <button type="submit"
                class="submit-btn">

                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Operator

                </button>

            </div>

        </form>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>