<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<style>

    .main-content{
        margin-left:280px;
        padding:40px;
        background:#f8fafc;
        min-height:100vh;
    }

    .form-card{
        width:100%;
        max-width:760px;
        background:white;
        border-radius:28px;
        padding:35px;
        border:1px solid #e5e7eb;
        box-shadow:0 15px 35px rgba(0,0,0,0.05);
    }

    .page-title{
        margin-bottom:35px;
    }

    .page-title h1{
        font-size:34px;
        color:#0f172a;
        margin-bottom:10px;
    }

    .page-title p{
        color:#64748b;
        font-size:14px;
        line-height:1.7;
    }

    .input-group{
        margin-bottom:24px;
    }

    .input-group label{
        display:block;
        margin-bottom:10px;
        font-size:14px;
        font-weight:600;
        color:#334155;
    }

    .input-group input{
        width:100%;
        padding:16px 18px;
        border-radius:18px;
        border:1px solid #dbe3ef;
        outline:none;
        font-size:14px;
        transition:0.3s;
    }

    .input-group input:focus{
        border-color:#2563eb;
        box-shadow:0 0 0 4px rgba(37,99,235,0.10);
    }

    .submit-btn{
        background:#2563eb;
        color:white;
        border:none;
        padding:16px 26px;
        border-radius:18px;
        cursor:pointer;
        font-size:14px;
        font-weight:600;
        transition:0.3s;
    }

    .submit-btn:hover{
        background:#1d4ed8;
    }

</style>

<div class="main-content">

    <div class="form-card">

        <div class="page-title">

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

                <input type="text"
                name="name"
                placeholder="Masukkan nama operator..."
                required>

            </div>

            <!-- EMAIL -->

            <div class="input-group">

                <label>
                    Email Operator
                </label>

                <input type="email"
                name="email"
                placeholder="Masukkan email operator..."
                required>

            </div>

            <!-- USERNAME -->

            <div class="input-group">

                <label>
                    Username
                </label>

                <input type="text"
                name="username"
                placeholder="Masukkan username..."
                required>

            </div>

            <!-- PASSWORD -->

            <div class="input-group">

                <label>
                    Password
                </label>

                <input type="password"
                name="password"
                placeholder="Masukkan password..."
                required>

            </div>

            <button type="submit"
            class="submit-btn">

                Simpan Operator

            </button>

        </form>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>