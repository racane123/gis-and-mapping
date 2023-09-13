<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<style>
#map{
    height: 500px;
}
</style>
<div id="map"></div>

<script>
    var map = L.map('map', {
        minZoom: 16,
        maxBounds: [
        //south west
        [14.7479, 121.0307],
        //north east
        [14.7479, 121.0307]
    ], 
    }).setView([14.7479, 121.0307],16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom:16,
        attribution: '<a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map);

    var popup = L.popup();

    function onClickMe(e){
        popup
        .setLatLng(e.latlng)
        .setContent("you've Clicked map at: " + e.latlng)
        .openOn(map);
    }
    map.on('click', onClickMe);

</script>

