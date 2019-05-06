<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 500px;
            width: 500px;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 2
        });

        google.maps.event.addListener(map, 'zoom_changed', function () {
            zoomLevel = map.getZoom();

            console.log(zoomLevel);
            var c = map.getCenter();
            console.log(c.lat());
            console.log(c.lng());
        });

        google.maps.event.addListener(map, 'mouseout', function (event) {
            displayCoordinates(event.latLng);
        });

        // google.maps.event.addListener(map, 'mousemove', function (event) {
        //     displayCoordinates(event.latLng);
        // });

        function displayCoordinates(pnt) {
            var lat = pnt.lat();
            //lat = lat.toFixed(4);
            var lng = pnt.lng();
            //lng = lng.toFixed(4);
            console.log("Latitude: " + lat + "  Longitude: " + lng);
        }
    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpqBT5-yERx15Rlph7U93GLFdgvA-pdmQ&callback=initMap&size=500x500"
        async defer></script>
</body>
</html>