<?php
require_once('header.php');
?>
<main class="bg4">
  <section class="page active">
    <div class="container" style="padding-top: 4.5em;">
      <div class="row">
        <div class="col-12">
              <div id="the-map" style="height:300px; width: 100%;"></div>
              <script>
                  //map center to center of Switzerland
                  var mymap = L.map('the-map').setView([46.7985286,8.2296061], 8);
                  L.tileLayer('https://tile.osm.ch/switzerland/{z}/{x}/{y}.png', {
                      //maxZoom: 15,
                      attribution: '',
                      bounds: [[45, 5], [48, 11]]
                  }).addTo(mymap);
                  var poiIcon = L.icon({
                      iconUrl: '<?php echo URL_DIR ?>/assets/img/point_of_interest.png',
                      iconSize:     [36, 43.2], // size of the icon
                      iconAnchor:   [18, 43.2], // point of the icon which will correspond to marker's location
                      popupAnchor:  [0, -43.2] // point from which the popup should open relative to the iconAnchor
                  });
                  var podIcon = L.icon({
                      iconUrl: '<?php echo URL_DIR ?>/assets/img/point_of_danger.png',
                      iconSize:     [36, 43.2], // size of the icon
                      iconAnchor:   [18, 43.2], // point of the icon which will correspond to marker's location
                      popupAnchor:  [0, -43.2] // point from which the popup should open relative to the iconAnchor
                  });
              </script>
        </div>
        <div class="col-12">
          <input class="name-box" style="width:100%" type="text" placeholder="Itinerary name..." name="" value="">
        </div>
        <div class="col-12 center">
          <button type="button" name="button" style="width:100%;">Start</button>
        </div>
        <div class="white-container">
          <div class="row">
            <div class="col-12 center">
              <p class="left" style="margin:0;">Latitude: unknown</span> <p class="right" style="margin:0;">Longitude: unknown</span>
            </div>
            <div class="col-6" style="width:46%;">
              <i class="icon_clock_alt"></i> <p style="display:inline; margin:0;">0:00</p>
            </div>
            <div class="col-6" style="width:46%;">
              <i class="icon_compass"></i> <p style="display:inline; margin:0;">0.0</p>
            </div>
            <div class="col-6" style="width:46%;">
              <button type="button" name="button" style="width:100%; background-color: #B6F890;">Add POD</button>
            </div>
            <div class="col-6" style="width:46%;">
              <button type="button" name="button" style="width:100%; background-color: #ff9190;">Add POI</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>




<?php
require_once('footer.php');
?>
