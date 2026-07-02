<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<?php if(isset($sekolah)): ?>

<script>

const mapElement = document.getElementById('map');

if(mapElement){

    var lat = <?= isset($sekolah['latitude']) ? $sekolah['latitude'] : '-0.947083' ?>;
var lng = <?= isset($sekolah['longitude']) ? $sekolah['longitude'] : '100.417181' ?>;

    var map = L.map('map').setView([lat,lng],15);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:'© OpenStreetMap'
        }
    ).addTo(map);

    L.marker([lat,lng])

    .addTo(map)

    .bindPopup(`
    <b><?= esc($sekolah['nama_sekolah'] ?? 'Sekolah') ?></b>
    <br>
    <?= esc($sekolah['alamat'] ?? 'Alamat tidak tersedia') ?>
`);

}

</script>

<?php endif; ?>

</body>
</html>