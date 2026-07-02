<?= $this->include('layouts/header_admin'); ?>
<?= $this->include('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="page-header">

        <div>

            <h1>Visi & Misi Sekolah</h1>

            <p>Lengkapi visi dan misi sekolah yang akan ditampilkan kepada masyarakat.</p>

        </div>

    </div>

    <?php if(session()->getFlashdata('success')) : ?>

        <div class="alert-success">

            <?= session()->getFlashdata('success'); ?>

        </div>

    <?php endif; ?>

    <form action="<?= base_url('admin/update-visi'); ?>" method="post">

        <div class="card">

            <div class="section-title">

                <i class="fa-solid fa-eye"></i>

                <span>Visi Sekolah</span>

            </div>

            <textarea
                name="visi"
                id="visi"
                rows="6"
                placeholder="Masukkan visi sekolah..."><?= $sekolah['visi']; ?></textarea>

            <div class="counter">

                <span id="visiCount">0</span> karakter

            </div>

        </div>

        <div class="card">

            <div class="section-title">

                <i class="fa-solid fa-bullseye"></i>

                <span>Misi Sekolah</span>

            </div>

            <textarea
                name="misi"
                id="misi"
                rows="12"
                placeholder="Masukkan misi sekolah..."><?= $sekolah['misi']; ?></textarea>

            <div class="counter">

                <span id="misiCount">0</span> karakter

            </div>

        </div>

        <button class="btn-save">

            <i class="fa-solid fa-floppy-disk"></i>

            Simpan Visi & Misi

        </button>

    </form>

</div>

<style>

.card{

background:white;

padding:30px;

border-radius:22px;

margin-bottom:25px;

box-shadow:0 8px 25px rgba(0,0,0,.05);

}

.section-title{

display:flex;

align-items:center;

gap:12px;

margin-bottom:20px;

font-size:20px;

font-weight:600;

color:#1e293b;

}

.section-title i{

width:45px;

height:45px;

background:#2563eb;

color:white;

display:flex;

justify-content:center;

align-items:center;

border-radius:12px;

}

textarea{

width:100%;

padding:18px;

border-radius:16px;

border:1px solid #dbeafe;

font-size:15px;

resize:vertical;

outline:none;

transition:.3s;

}

textarea:focus{

border-color:#2563eb;

box-shadow:0 0 0 4px rgba(37,99,235,.08);

}

.counter{

margin-top:10px;

text-align:right;

color:#64748b;

font-size:13px;

}

.btn-save{

background:#2563eb;

color:white;

border:none;

padding:16px 35px;

border-radius:15px;

font-size:15px;

font-weight:bold;

cursor:pointer;

transition:.3s;

}

.btn-save:hover{

background:#1d4ed8;

transform:translateY(-2px);

}

.alert-success{

background:#dcfce7;

padding:16px;

border-radius:15px;

margin-bottom:25px;

color:#166534;

}

</style>

<script>

const visi=document.getElementById('visi');

const misi=document.getElementById('misi');

const visiCount=document.getElementById('visiCount');

const misiCount=document.getElementById('misiCount');

function updateCounter(){

visiCount.innerHTML=visi.value.length;

misiCount.innerHTML=misi.value.length;

}

updateCounter();

visi.addEventListener('keyup',updateCounter);

misi.addEventListener('keyup',updateCounter);

</script>

<?= $this->include('layouts/footer_admin'); ?>