<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<style>

    .main-content{
        margin-left:280px;
        padding:40px;
        background:#f8fafc;
        min-height:100vh;
    }

    .page-title{
        margin-bottom:30px;
    }

    .page-title h1{
        font-size:32px;
        color:#0f172a;
        margin-bottom:10px;
    }

    .page-title p{
        color:#64748b;
    }

    .form-card{
        width:100%;
        max-width:700px;
        background:white;
        border-radius:24px;
        padding:35px;
        border:1px solid #e5e7eb;
        box-shadow:0 10px 30px rgba(0,0,0,0.05);
    }

    .form-group{
        margin-bottom:24px;
    }

    .form-group label{
        display:block;
        margin-bottom:10px;
        font-size:14px;
        font-weight:600;
        color:#334155;
    }

    .form-control{
        width:100%;
        padding:16px;
        border-radius:16px;
        border:1px solid #dbe3ef;
        outline:none;
        font-size:14px;
    }

    .form-control:focus{
        border-color:#2563eb;
    }

    .submit-btn{
        background:#2563eb;
        color:white;
        border:none;
        padding:16px 24px;
        border-radius:16px;
        cursor:pointer;
        font-weight:600;
        font-size:14px;
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

            </div>

            <button type="submit"
            class="submit-btn">

                Update Operator

            </button>

        </form>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>