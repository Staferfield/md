<script>
    // Script mendapatkan geolokasi
    var latt = document.getElementById("geo_latt");
    var long = document.getElementById("geo_long");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            // Tampilkan alert apabila geolokasi berhasil
            window.alert("Geolokasi tidak didukung");
        }
    }

    function showPosition(position) {
        latt.value = position.coords.latitude;
        long.value = position.coords.longitude;

        // Tampilkan alert apabila geolokasi berhasil
        window.alert("Geolokasi berhasil");
    }

</script>