<!DOCTYPE html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />



<body>
<?php include(dirname(__DIR__) . '/navbar.php');
include(dirname(__DIR__) . '/sidebar.php');?>

<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
<script src='https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js'></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
<script src="../../public/js/table.js"></script>

<script>
    jQuery(document).ready(function($) {
        $(".clickable-tr").click(function() {
            $(this).addClass('selected').siblings().removeClass('selected');
            var value=$(this).find('th:first').html();
            window.location = $(this).data("href")+"&name="+value;
        });
    });
</script>

<style>
    .clickable-tr{
        cursor: pointer;
        transition: 0.3s;
    }

    .clickable-tr:hover{
        background: lightgrey;
        opacity: 1;

    }
</style>

<div class="mt-4" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
    <div class="container col">
        <label class="mt-3" style="font-size: 25px;">List of events</label>
    </div>

    <div class="container col pb-1 table-responsive table-wrapper-scroll-y">
        <table class="table table-wrapper-scroll-y">
            <thead>
            <tr class="d-flex">
                <th scope="col" class="col-5">Name</th>
                <th scope="col" class="col-5">Place</th>
                <th scope="col" class="col-2">City</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($event as $val):?>
                <tr class="d-flex clickable-tr" data-href="?page=detail">
                    <th scope="col" class="col-5" id><?= $val['eventName']?> </th>
                    <th scope="col" class="col-5"><?= $val['namePlace']?></th>
                    <th scope="col" class="col-2"><?= $val['city']?></th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<!--div id="map"></div-->
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYnppb21lazk3IiwiYSI6ImNqcWNrMTgxNzN3NHg0M2p5Zmdwdmg2c2sifQ.rddDzE5_J3ZCYizZgpuSdA';
    var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
    mapboxClient.geocoding.forwardGeocode({
        query: 'Wellington, New Zealand',
        autocomplete: false,
        limit: 1
    })
        .send()
        .then(function (response) {
            if (response && response.body && response.body.features && response.body.features.length) {
                var feature = response.body.features[0];

                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v9',
                    center: feature.center,
                    zoom: 10
                });
                new mapboxgl.Marker()
                    .setLngLat(feature.center)
                    .addTo(map);
            }
        });
</script>

</body>
</html>
