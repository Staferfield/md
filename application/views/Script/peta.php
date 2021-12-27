<!-- leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<!-- Leaflet -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

<script>
    // Atur settingan peta
    var map = L.map('map', {
        center: [-7.7917, 110.4001],
        zoom: 12
    });

    // Buat peta
    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 22,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    // Apabila posisi ketemu kemudian tampilkan ke peta
    function onLocationFound(e) {
        var radius = e.accuracy / 2;

        var locationMarker = L.marker(e.latlng).addTo(map)
            .bindPopup('Kamu berada dalam ' + radius + ' meter dari titik ini').openPopup();

        var locationCircle = L.circle(e.latlng, radius).addTo(map);
    }
    // Tampilkan eror apabila tidak bisa mendapat posisi
    function onLocationError(e) {
        alert(e.message);
    }
    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);

    // jalankan pencarian posisi
    map.locate({
        setView: true,
        maxZoom: 14
    });
    // Icon custom
    const home = L.icon({
    iconUrl: '<?php echo base_url().'assets/img/map-marker-red.png'; ?>',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });
    // Tambahkan marker untuk lokasi motherland 
    const marker0 = L.marker([-7.749689293595227, 110.43469446137313], {icon: home}).bindPopup('MOTHERLAND').addTo(map);
    // Dapatkan geolokasi toko dari database dan buat marker ke dalam map
    <?php
    $i = 1;
    foreach ($toko as $item) {
        echo "const marker" . $i . " = L.marker([" . $item['geo_latt'] . "," . $item['geo_long'] . "]).bindPopup('" . $item['nama'] . "').addTo(map);";
        $i++;
    }
    ?>
</script>