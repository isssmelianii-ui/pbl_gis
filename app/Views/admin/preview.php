<?= $this->include('layouts/header_admin'); ?>
<?= $this->include('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="page-header">

        <div>

            <h1>Preview Website Sekolah</h1>

            <p>Berikut tampilan website sekolah yang akan dilihat oleh pengunjung.</p>

        </div>

        <a href="<?= base_url('detail-peta?id='.$sekolah['id']); ?>" target="_blank" class="btn-preview">

            <i class="fa-solid fa-arrow-up-right-from-square"></i>

            Buka Website Publik

        </a>

    </div>

    <!-- HERO -->

    <div class="hero">

        <img src="<?= $sekolah['cover'] ? base_url('uploads/cover/'.$sekolah['cover']) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7'; ?>">

        <div class="overlay"></div>

        <div class="hero-content">

            <img
            class="logo"
            src="<?= $sekolah['logo'] ? base_url('uploads/logo/'.$sekolah['logo']) : 'https://cdn-icons-png.flaticon.com/512/3135/3135755.png'; ?>">

            <h1>

                <?= $sekolah['nama_sekolah']; ?>

            </h1>

            <p>

                <?= $sekolah['alamat']; ?>

            </p>

        </div>

    </div>

    <!-- GRID -->

    <div class="preview-grid">

        <!-- PROFIL -->

        <div class="card">

            <h2>Profil Sekolah</h2>

            <table>

                <tr>

                    <td>NPSN</td>

                    <td><?= $sekolah['npsn']; ?></td>

                </tr>

                <tr>

                    <td>Jenjang</td>

                    <td><?= $sekolah['jenjang']; ?></td>

                </tr>

                <tr>

                    <td>Status</td>

                    <td><?= $sekolah['status_sekolah']; ?></td>

                </tr>

                <tr>

                    <td>Akreditasi</td>

                    <td><?= $sekolah['akreditasi']; ?></td>

                </tr>

                <tr>

                    <td>Kurikulum</td>

                    <td><?= $sekolah['kurikulum']; ?></td>

                </tr>

                <tr>

                    <td>Website</td>

                    <td><?= $sekolah['website']; ?></td>

                </tr>

            </table>

        </div>

        <!-- FOTO -->

        <div class="card">

            <img class="foto"

            src="<?= $sekolah['foto'] ? base_url('uploads/sekolah/'.$sekolah['foto']) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7'; ?>">

        </div>

    </div>

    <!-- VISI -->

    <div class="card">

        <h2>Visi</h2>

        <p><?= nl2br($sekolah['visi']); ?></p>

    </div>

    <!-- MISI -->

    <div class="card">

        <h2>Misi</h2>

        <p><?= nl2br($sekolah['misi']); ?></p>

    </div>

    <!-- KEPALA -->

    <div class="kepala">

        <img

        src="<?= $sekolah['foto_kepala'] ? base_url('uploads/kepala/'.$sekolah['foto_kepala']) : 'https://ui-avatars.com/api/?name=Kepala'; ?>">

        <div>

            <h2>

                <?= $sekolah['kepala_sekolah']; ?>

            </h2>

            <small>

                NIP :

                <?= $sekolah['nip_kepala']; ?>

            </small>

            <p>

                <?= nl2br($sekolah['sambutan']); ?>

            </p>

        </div>

    </div>

    <!-- MAP -->

    <div class="card">

        <h2>Lokasi Sekolah</h2>

        <div id="map"></div>

    </div>

</div>

<style>

.hero{

height:420px;

border-radius:25px;

overflow:hidden;

position:relative;

margin-bottom:30px;

}

.hero img{

width:100%;

height:100%;

object-fit:cover;

}

.overlay{

position:absolute;

left:0;

top:0;

right:0;

bottom:0;

background:rgba(0,0,0,.45);

}

.hero-content{

position:absolute;

bottom:40px;

left:40px;

color:white;

}

.logo{

width:100px!important;

height:100px!important;

border-radius:20px;

background:white;

padding:10px;

margin-bottom:20px;

}

.preview-grid{

display:grid;

grid-template-columns:1.2fr 1fr;

gap:25px;

margin-bottom:25px;

}

.card{

background:white;

padding:30px;

border-radius:25px;

box-shadow:0 8px 30px rgba(0,0,0,.05);

margin-bottom:25px;

}

.foto{

width:100%;

height:320px;

object-fit:cover;

border-radius:20px;

}

.kepala{

display:flex;

gap:30px;

background:white;

padding:30px;

border-radius:25px;

margin-bottom:30px;

align-items:center;

}

.kepala img{

width:180px;

height:180px;

border-radius:50%;

object-fit:cover;

}

table{

width:100%;

}

table td{

padding:12px 0;

border-bottom:1px solid #eee;

}

#map{

height:450px;

border-radius:20px;

}

.btn-preview{

background:#2563eb;

padding:15px 25px;

color:white;

border-radius:15px;

font-weight:bold;

}

</style>

<link rel="stylesheet"

href="https://unpkg.com/leaflet/dist/leaflet.css">

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

var map=L.map('map').setView([

<?= $sekolah['latitude'] ?: '-0.947083'; ?>,

<?= $sekolah['longitude'] ?: '100.417181'; ?>

],15);

L.tileLayer(

'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

).addTo(map);

L.marker([

<?= $sekolah['latitude'] ?: '-0.947083'; ?>,

<?= $sekolah['longitude'] ?: '100.417181'; ?>

]).addTo(map);

</script>

<?= $this->include('layouts/footer_admin'); ?>