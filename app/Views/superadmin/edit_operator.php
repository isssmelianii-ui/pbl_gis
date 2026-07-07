<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<style>

    .main-content{
        margin-left:280px;
        padding:40px;
        background:#f1f5f9;
        min-height:100vh;
    }

    .page-title{
        margin-bottom:30px;
    }

    .page-title h1{
        font-size:32px;
        color:#0f172a;
        margin-bottom:8px;
        font-weight:700;
    }

    .page-title p{
        color:#64748b;
        font-size:15px;
    }

    .form-card{
        width:100%;
        max-width:700px;
        background:white;
        border-radius:24px;
        padding:40px;
        border:1px solid #e2e8f0;
        box-shadow:0 10px 30px rgba(15,23,42,0.06);
        position:relative;
        overflow:hidden;
    }

    .form-card::before{
        content:"";
        position:absolute;
        top:0;
        left:0;
        right:0;
        height:6px;
        background:linear-gradient(90deg,#0f172a,#1e3a8a,#2563eb);
    }

    .form-group{
        margin-bottom:24px;
    }

    .form-group label{
        display:block;
        margin-bottom:10px;
        font-size:14px;
        font-weight:600;
        color:#1e293b;
    }

    .form-control{
        width:100%;
        padding:16px;
        border-radius:14px;
        border:1.5px solid #dbe3ef;
        outline:none;
        font-size:14px;
        color:#0f172a;
        background:#f8fafc;
        transition:border-color .2s ease, background .2s ease, box-shadow .2s ease;
    }

    .form-control::placeholder{
        color:#94a3b8;
    }

    .form-control:focus{
        border-color:#1e3a8a;
        background:white;
        box-shadow:0 0 0 4px rgba(30,58,138,0.1);
    }

    .form-hint{
        display:block;
        margin-top:8px;
        font-size:12.5px;
        color:#94a3b8;
    }

    .form-actions{
        margin-top:32px;
        padding-top:24px;
        border-top:1px solid #e2e8f0;
    }

    .submit-btn{
        background:linear-gradient(135deg,#1e3a8a,#0f172a);
        color:white;
        border:none;
        padding:16px 28px;
        border-radius:14px;
        cursor:pointer;
        font-weight:600;
        font-size:14px;
        letter-spacing:.2px;
        transition:opacity .2s ease, transform .2s ease;
    }

    .submit-btn:hover{
        opacity:0.92;
        transform:translateY(-1px);
    }

    .submit-btn:active{
        transform:translateY(0);
    }

</style>

<div class="main-content">

    <div class="page-title">

        <h1>
            Edit Operator
        </h1>

        <p>
            Perbarui data akun operator sekolah
        </p>

    </div>

    <div class="form-card">

        <form action="<?= base_url('/superadmin/update-operator/'.$operator['id']); ?>"
        method="post">

            <div class="form-group">

                <label>
                    Nama Operator
                </label>

                <input type="text"
                name="name"
                class="form-control"
                value="<?= $operator['name']; ?>"
                required>

            </div>

            <div class="form-group">

                <label>
                    Email
                </label>

                <input type="email"
                name="email"
                class="form-control"
                value="<?= $operator['email']; ?>"
                required>

            </div>

            <div class="form-group">

                <label>
                    Password Baru
                </label>

                <input type="password"
                name="password"
                class="form-control"
                placeholder="Kosongkan jika tidak ingin mengganti password">

                <span class="form-hint">
                    Isi hanya jika ingin mengganti password lama
                </span>

            </div>

            <div class="form-actions">

                <button type="submit"
                class="submit-btn">

                    Update Operator

                </button>

            </div>

        </form>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>