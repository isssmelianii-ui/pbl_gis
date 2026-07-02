<?= $this->include('layouts/header_admin'); ?>
<?= $this->include('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="page-header">

        <div>

            <h1>Kepala Sekolah</h1>

            <p>Lengkapi informasi Kepala Sekolah beserta sambutannya.</p>

        </div>

    </div>

    <?php if(session()->getFlashdata('success')) : ?>

        <div class="alert-success">

            <?= session()->getFlashdata('success'); ?>

        </div>

    <?php endif; ?>

    <form action="<?= base_url('admin/update-kepala'); ?>"
          method="post"
          enctype="multipart/form-data">

        <div class="kepala-grid">

            <!-- FOTO -->

            <div class="card">

                <h3>Foto Kepala Sekolah</h3>

                <div class="foto-preview">

                    <?php if(!empty($sekolah['foto_kepala'])) : ?>

                        <img
                        id="preview"
                        src="<?= base_url('uploads/kepala/'.$sekolah['foto_kepala']); ?>">

                    <?php else : ?>

                        <img
                        id="preview"
                        src="https://ui-avatars.com/api/?name=Kepala+Sekolah&size=300">

                    <?php endif; ?>

                </div>

                <input
                    type="file"
                    name="foto_kepala"
                    id="foto">

            </div>

            <!-- DATA -->

            <div class="card">

                <h3>Identitas Kepala Sekolah</h3>

                <div class="form-group">

                    <label>Nama Kepala Sekolah</label>

                    <input
                    type="text"
                    name="kepala_sekolah"
                    value="<?= $sekolah['kepala_sekolah']; ?>">

                </div>

                <div class="form-group">

                    <label>NIP</label>

                    <input
                    type="text"
                    name="nip_kepala"
                    value="<?= $sekolah['nip_kepala']; ?>">

                </div>

                <div class="form-group">

                    <label>Sambutan Kepala Sekolah</label>

                    <textarea
                    rows="12"
                    name="sambutan"><?= $sekolah['sambutan']; ?></textarea>

                </div>

                <button class="btn-save">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Simpan Data

                </button>

            </div>

        </div>

    </form>

</div>

<style>

.kepala-grid{

display:grid;

grid-template-columns:320px 1fr;

gap:30px;

}

.card{

background:white;

padding:30px;

border-radius:24px;

box-shadow:0 8px 30px rgba(0,0,0,.05);

}

.card h3{

margin-bottom:25px;

}

.foto-preview{

display:flex;

justify-content:center;

margin-bottom:25px;

}

.foto-preview img{

width:230px;

height:230px;

border-radius:50%;

object-fit:cover;

border:6px solid #eff6ff;

box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.form-group{

margin-bottom:20px;

}

.form-group label{

display:block;

margin-bottom:8px;

font-weight:600;

}

input[type=text],
textarea{

width:100%;

padding:15px;

border-radius:15px;

border:1px solid #dbeafe;

outline:none;

}

textarea{

resize:vertical;

}

.btn-save{

margin-top:15px;

background:#2563eb;

color:white;

border:none;

padding:15px 35px;

border-radius:15px;

cursor:pointer;

font-weight:bold;

font-size:15px;

}

.btn-save:hover{

background:#1d4ed8;

}

.alert-success{

background:#dcfce7;

padding:15px;

border-radius:15px;

margin-bottom:25px;

color:#166534;

}

@media(max-width:900px){

.kepala-grid{

grid-template-columns:1fr;

}

}

</style>

<script>

document.getElementById('foto').onchange=function(e){

const reader=new FileReader();

reader.onload=function(){

document.getElementById('preview').src=reader.result;

}

reader.readAsDataURL(e.target.files[0]);

}

</script>

<?= $this->include('layouts/footer_admin'); ?>