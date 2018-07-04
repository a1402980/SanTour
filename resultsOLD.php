<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Santour</title>
  <meta name="description" content="Hiking webapp">
  <meta name="author" content="Mikko Lerto">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-simpleWeather.min.js"></script>

  <?php
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   ?>


</head>
<?php
  $json_string = file_get_contents("track 2.json");
  $track_json = json_decode($json_string);
  $img = $track_json->image;
 ?>

<body>
  <div id="map"></div>
  <ul class="tracklist">
    <li>
      <a target="_blank" href="<?php echo $track_json->url ?>">
        <div class="track-thumbnail" style="background-image: url('<?php echo $img ?>');">
        </div><?php echo $track_json->name ?><div class="track-score green">97%</div></a>
      <button class="weather-button" type="button" value="<?php echo 'lat='.$track_json->latlng[0]->lat.'&lon='.$track_json->latlng[0]->lng ?>">Weather</button>
      <div class="weather-info hidden"></div>
    </li>
    <li>Lorem track 1</li>
    <li>Lorem track 2</li>
    <li>Lorem track 3</li>
    <li>Lorem track 4</li>
  </ul>

  <a class="info-trigger" href="#">More info:</a>
  <div hidden class="more-info">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>



   <script>
     var hiketrack = [
       <?php
       //loop through the map coordinates for the polygon line in the map
       foreach ($track_json->latlng as $row) {
         echo "{lat: ".$row->lat.", lng: ".$row->lng."},\n";
       }
        ?>
     ];

     var pods = [
       <?php
       foreach ($track_json->pod as $podrow) {
         $name = $podrow->name;
         $lng = $podrow->latlng->lng;
         $lat = $podrow->latlng->lat;

         echo "['<b>Point of danger:</b><br>".$name."', ".$lat.", ".$lng."],";
       }
        ?>
     ];

     var pois = [
       <?php
       foreach ($track_json->poi as $poirow) {
         $name = $poirow->name;
         $lng = $poirow->latlng->lng;
         $lat = $poirow->latlng->lat;

         echo "['<b>Point of interest:</b><br>".$name."', ".$lat.", ".$lng."],";
       }
        ?>
     ]

   </script>

  <script>

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: 46.3839145928, lng: 8.1842119952},
        mapTypeId: 'roadmap'
      });

      var flightPath = new google.maps.Polyline({
        path: hiketrack,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
      });

      var infowindow = new google.maps.InfoWindow();

      var marker, i;

      for (i = 0; i < pods.length; i++) {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(pods[i][1], pods[i][2]),
          map: map
        });
        marker.setIcon('img/pod5.png');

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(pods[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
        }

        for (i = 0; i < pois.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(pois[i][1], pois[i][2]),
            map: map
          });
          marker.setIcon('img/poi.png');

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(pois[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
          }

      flightPath.setMap(map);
    }

    $.simpleWeather({

    location: '<?php echo $track_json->latlng[0]->lat.','.$track_json->latlng[0]->lng ?>',
    woeid: '',
    unit: 'c',
    success: function(weather) {
      html = '<hb><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</hb>';
      // html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
      // html += '<li class="currently">'+weather.currently+'</li>';
      // html += '<li>'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';

      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });

  </script>



  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUnnnXHWUQLp6DeQDHJwbBx3bcVeAbm1w&callback=initMap">
  </script>

  <script src="js/scripts.js"></script>
</body>
</html>
