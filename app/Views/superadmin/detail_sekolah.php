<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>

    .main-content{
        margin-left:280px;
        padding:30px;
        background:#f8fafc;
        min-height:100vh;
    }

    .detail-grid{
        display:grid;
        grid-template-columns:1fr 420px;
        gap:25px;
    }

    .detail-card{
        background:white;
        border-radius:24px;
        padding:28px;
        border:1px solid #e5e7eb;
        box-shadow:0 10px 25px rgba(0,0,0,0.04);
    }

    .school-image{
        width:100%;
        height:320px;
        object-fit:cover;
        border-radius:22px;
        margin-bottom:25px;
    }

    .school-title{
        font-size:32px;
        color:#0f172a;
        margin-bottom:10px;
    }

    .school-badge{
        display:inline-block;
        background:#dbeafe;
        color:#2563eb;
        padding:8px 16px;
        border-radius:30px;
        font-size:12px;
        font-weight:600;
        margin-bottom:25px;
    }

    .info-item{
        margin-bottom:20px;
    }

    .info-item h4{
        font-size:14px;
        color:#64748b;
        margin-bottom:8px;
    }

    .info-item p{
        font-size:15px;
        color:#0f172a;
        line-height:1.7;
    }

    .website-btn{
        display:inline-block;
        margin-top:15px;
        background:#2563eb;
        color:white;
        padding:14px 20px;
        border-radius:14px;
        text-decoration:none;
        font-size:14px;
        font-weight:600;
    }

    #map{
        width:100%;
        height:100%;
        min-height:500px;
        border-radius:22px;
    }

</style>

<div class="main-content">

    <div class="detail-grid">

        <!-- LEFT -->

        <div class="detail-card">

            <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop"
            class="school-image">

            <h1 class="school-title">

                <?= $sekolah['nama_sekolah']; ?>

            </h1>

            <div class="school-badge">

                <?= $sekolah['jenjang']; ?>

            </div>

           <div class="info-item">
            <h4>NPSN</h4>
            <p><?= $sekolah['npsn'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Nama Sekolah</h4>
            <p><?= $sekolah['nama_sekolah'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Jenjang</h4>
            <p><?= $sekolah['jenjang'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Status</h4>
            <p><?= $sekolah['status_sekolah'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Akreditasi</h4>
            <p><?= $sekolah['akreditasi'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Kurikulum</h4>
            <p><?= $sekolah['kurikulum'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Kecamatan</h4>
            <p><?= $sekolah['kecamatan'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Alamat</h4>
            <p><?= $sekolah['alamat'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Telepon</h4>
            <p><?= $sekolah['telepon'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Email</h4>
            <p><?= $sekolah['email'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Website</h4>
            <p><?= $sekolah['website'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Visi</h4>
            <p><?= $sekolah['visi'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Misi</h4>
            <p><?= $sekolah['misi'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Kepala Sekolah</h4>
            <p><?= $sekolah['kepala_sekolah'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Latitude</h4>
            <p><?= $sekolah['latitude'] ?? '-'; ?></p>
        </div>

        <div class="info-item">
            <h4>Longitude</h4>
            <p><?= $sekolah['longitude'] ?? '-'; ?></p>
        </div>

            <div class="info-item">

                <h4>
                    Website Sekolah
                </h4>

                <p>

                    <?= $sekolah['website']; ?>

                </p>

                <?php if($sekolah['website'] != '') : ?>

                    <a href="<?= $sekolah['website']; ?>"
                    target="_blank"
                    class="website-btn">

                        Kunjungi Website

                    </a>

                <?php endif; ?>

            </div>

            <div class="info-item">

                <h4>
                    Koordinat
                </h4>

                <p>

                    <?= $sekolah['latitude']; ?>,
                    <?= $sekolah['longitude']; ?>

                </p>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="detail-card">

            <div id="map"></div>

        </div>

    </div>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

    var map = L.map('map').setView([
        <?= $sekolah['latitude']; ?>,
        <?= $sekolah['longitude']; ?>
    ], 15);

    L.tileLayer(
        'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:'OpenStreetMap'
        }
    ).addTo(map);

    L.marker([
        <?= $sekolah['latitude']; ?>,
        <?= $sekolah['longitude']; ?>
    ]).addTo(map)

    .bindPopup(`
        <?= $sekolah['nama_sekolah']; ?>
    `)

    .openPopup();

</script>

<?= $this->include('layouts/footer'); ?>