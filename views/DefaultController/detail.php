<!DOCTYPE HTML>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />

<body id="parentID">
<?php include(dirname(__DIR__) . '/navbar.php');
include(dirname(__DIR__) . '/sidebar.php');?>

<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<script src='https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js'></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <div class="mt-4" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
        <div class="container col">
            <label class="mt-3" style="font-size: 25px;"><img src="https://img.icons8.com/ios/50/000000/info.png" width="22px" height="22px" > Event details</label>
        </div>
        <div class="container col">
            <label class="mt-2" style="font-size: 18px">Basic Information</label>
            <div>
                <h4><?= $event['eventName']?></h4>
            </div>
            <div>
                <h5>Description:</h5>
            </div>
            <div>
                <h6><?= ($event['description']!=null) ? $event['description']:"Empty description" ?></h6>
            </div>
            <div>
                <h5>Begin Date: <?= $event['beginDate']?></h5>
            </div>
            <div>
                <h5>End Date: <?= $event['endDate']?></h5>
            </div>
        </div>
        <div class="container col">
            <label class="mt-1" style="font-size: 18px">Author</label>
            <div>
                <h6>Full Name: <?= $event['name']." ".$event['surname']?></h6>
            </div>
            <div>
                <h6>Email: <?= $event['email']?></h6>
            </div>
        </div>
        <div class="container col" style="border-top: 1px solid grey;">
            <label class="mt-3" style="font-size: 18px; margin-bottom: 220px">Localization</label>
        </div>
        <nav id="map" style="position:absolute !important;margin-top: 10px"></nav>

    </div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYnppb21lazk3IiwiYSI6ImNqcWNrMTgxNzN3NHg0M2p5Zmdwdmg2c2sifQ.rddDzE5_J3ZCYizZgpuSdA';
    var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
    mapboxClient.geocoding.forwardGeocode({
        query: '<?= $event['namePlace']?>',
        autocomplete: false,
        limit: 1
    })
        .send()
        .then(function (response) {
            if (response && response.body && response.body.features && response.body.features.length) {
                var feature = response.body.features[0];

                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v10',
                    center: feature.center,
                    zoom: 15
                });
                new mapboxgl.Marker()
                    .setLngLat(feature.center)
                    .addTo(map);
            }
        });
</script>
</body>
</html>
