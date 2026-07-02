<?= $this->include('layouts/header_admin'); ?>
<?= $this->include('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="page-header">

        <div>

            <h1>Lokasi Sekolah</h1>

            <p>Tentukan lokasi sekolah pada peta. Marker dapat digeser atau klik pada peta.</p>

        </div>

    </div>

    <?php if(session()->getFlashdata('success')) : ?>

    <div class="alert-success">

        <?= session()->getFlashdata('success'); ?>

    </div>

    <?php endif; ?>

    <form action="<?= base_url('admin/update-lokasi'); ?>" method="post">

        <div class="card">

            <div id="map"></div>

        </div>

        <div class="card mt">

            <div class="grid-input">

                <div>

                    <label>Latitude</label>

                    <input
                    id="latitude"
                    type="text"
                    name="latitude"
                    value="<?= $sekolah['latitude']; ?>">

                </div>

                <div>

                    <label>Longitude</label>

                    <input
                    id="longitude"
                    type="text"
                    name="longitude"
                    value="<?= $sekolah['longitude']; ?>">

                </div>

            </div>

            <button class="btn-save">

                Simpan Lokasi

            </button>

        </div>

    </form>

</div>

<style>

.card{

background:white;

padding:25px;

border-radius:22px;

box-shadow:0 8px 25px rgba(0,0,0,.05);

}

.mt{

margin-top:25px;

}

#map{

height:550px;

border-radius:18px;

}

.grid-input{

display:grid;

grid-template-columns:1fr 1fr;

gap:20px;

}

label{

display:block;

margin-bottom:10px;

font-weight:600;

}

input{

width:100%;

padding:15px;

border-radius:15px;

border:1px solid #dbeafe;

font-size:15px;

}

.btn-save{

margin-top:25px;

background:#2563eb;

color:white;

padding:15px 35px;

border:none;

border-radius:15px;

font-size:15px;

font-weight:bold;

cursor:pointer;

}

.alert-success{

background:#dcfce7;

padding:15px;

border-radius:15px;

margin-bottom:20px;

color:#166534;

}

@media(max-width:768px){

.grid-input{

grid-template-columns:1fr;

}

}

</style>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css">

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

var lat = <?= $sekolah['latitude'] ?: '-0.947083'; ?>;

var lng = <?= $sekolah['longitude'] ?: '100.417181'; ?>;

var map = L.map('map').setView([lat,lng],13);

L.tileLayer(

'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

{

maxZoom:19

}

).addTo(map);

var marker=L.marker(

[lat,lng],

{

draggable:true

}

).addTo(map);

marker.on('dragend',function(e){

var p=e.target.getLatLng();

document.getElementById('latitude').value=p.lat;

document.getElementById('longitude').value=p.lng;

});

map.on('click',function(e){

marker.setLatLng(e.latlng);

document.getElementById('latitude').value=e.latlng.lat;

document.getElementById('longitude').value=e.latlng.lng;

});

</script>

<?= $this->include('layouts/footer_admin'); ?>