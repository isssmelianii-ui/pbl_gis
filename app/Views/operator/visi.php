<?= $this->include('layouts/header_operator'); ?>

<?= $this->include('layouts/sidebar_operator'); ?>

<div class="main-content">

    <div class="page-header">

        <div>

            <h1>Visi & Misi Sekolah</h1>

            <p>
                Kelola visi dan misi sekolah.
            </p>

        </div>

    </div>

    <?php if(session()->getFlashdata('success')): ?>

        <div class="alert-success">

            <?= session()->getFlashdata('success'); ?>

        </div>

    <?php endif; ?>

    <div class="card">

        <form
        action="<?= base_url('operator/update-visi'); ?>"
        method="post">

            <div class="form-group">

                <label>

                    Visi Sekolah

                </label>

                <textarea
                name="visi"
                rows="5"><?= $sekolah['visi']; ?></textarea>

            </div>

            <div class="form-group">

                <label>

                    Misi Sekolah

                </label>

                <textarea
                name="misi"
                rows="10"><?= $sekolah['misi']; ?></textarea>

            </div>

            <button
            class="btn-save">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

<style>

.card{

background:white;

padding:30px;

border-radius:22px;

box-shadow:0 10px 30px rgba(0,0,0,.05);

}

.form-group{

margin-bottom:25px;

}

.form-group label{

display:block;

margin-bottom:10px;

font-weight:600;

}

textarea{

width:100%;

padding:18px;

border-radius:15px;

border:1px solid #dbeafe;

resize:vertical;

font-size:14px;

outline:none;

}

textarea:focus{

border-color:#2563eb;

}

.btn-save{

padding:15px 30px;

border:none;

background:#2563eb;

color:white;

border-radius:15px;

cursor:pointer;

font-weight:600;

}

.alert-success{

background:#dcfce7;

padding:18px;

margin-bottom:25px;

border-radius:15px;

color:#166534;

}

</style>

<?= $this->include('layouts/footer_operator'); ?>