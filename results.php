<?php
require_once('header.php');
?>

<?php
//$a = $_POST["physical-activity"];
//var_dump($a);

// The data to send to the API
$postData = array(
    'content' => 'With <b>exciting</b> content...'
);

// Setup cURL
$ch = curl_init('http://localhost:3000/itineraries/');

curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
    die(curl_error($ch));
}

// Decode the response
$responseData = json_decode($response, TRUE);

// Print the date from the response
//var_dump($responseData);



 ?>

<main class="bg5">
  <section class="page active">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Okay, heres what we would recommend:</h1>

          </div>
          <div class="col-5">
            <div id="it-map"></div>
            <script>
              //map center
              var mymap = L.map('it-map').setView([46.7985286,8.2296061], 8);

              L.tileLayer('https://tile.osm.ch/switzerland/{z}/{x}/{y}.png', {
              //maxZoom: 15,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
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
          <div class="col-7">
            <div class="accordian">

            <?php foreach ($responseData as $itinerary): ?>

              <div class="ac-head" onclick="updateMap<?php echo $itinerary['_id'] ?>()">
               <span class="score">89%</span><span><?php echo $itinerary['name']; ?></span><?php echo $itinerary['stats']['distance']; ?><span></span> <span><?php echo $itinerary['stats']['time']; ?></span> <i class="arrow_triangle-down toggle-icon"></i>
              </div>
              <div class="ac-body">
                <div class="row">
                  <div class="col-8">
                    <p><?php echo $itinerary['description']; ?></p>
                  </div>

                  <div class="col-4">
                    <h4>weather</h4>
                    <h2>26°C</h2>
                  </div>
                  <div class="col-6">
                    <canvas id="polar-chart" width="100%" height="100px"></canvas>
                    <script type="text/javascript">
                        new Chart(document.getElementById("polar-chart"), {
                        type: 'polarArea',
                        data: {
                          datasets: [
                            {
                              label: "Population (millions)",
                              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                              data: [2478,5267,734,784,433]
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Predicted world population (millions) in 2050'
                          }
                        }
                    });
                    </script>

                    <script>

                    function updateMap<?php echo $itinerary['_id'] ?>(){
                      //map center
                      mymap.setView(new L.LatLng(<?php echo $itinerary['latlng'][0][1].", ".$itinerary['latlng'][0][0]; ?>), 8);

                      // create a red polyline from an array of LatLng points
                      var latlngs = [

                      <?php foreach ($itinerary['latlng'] as $cords): ?>
                        <?php echo "[".$cords[1].",".$cords[0]."],"?>
                      <?php endforeach; ?>

                      ];
                      var polyline = L.polyline(latlngs, {color: 'red'}).addTo(mymap);
                      // zoom the map to the polyline
                      mymap.fitBounds(polyline.getBounds());

                      //add points of interest
                      <?php foreach ($itinerary['poi'] as $poi): ?>
                      L.marker([<?php echo $poi['latlng']['lat'].",".$poi['latlng']['lng'] ?>], {icon: poiIcon}).addTo(mymap)
                       .bindPopup("<img style='max-width:100%; height:50px;' src='<?php echo $poi['image'] ?>' alt='<?php echo $poi['name'] ?>'><br/> <b><?php echo $poi['name'] ?></b> <br/> <span><?php echo $poi['description']?></span>");
                      <?php endforeach; ?>

                      //add points of danger to the map
                      <?php foreach ($itinerary['pod'] as $pod): ?>
                      L.marker([<?php echo $pod['latlng']['lat'].",".$pod['latlng']['lng'] ?>], {icon: podIcon}).addTo(mymap)
                       .bindPopup( "<img style='max-width:100%; height:50px;' src='<?php echo $pod['image'] ?>' alt='<?php echo $pod['name'] ?>'><br/> <b><?php echo $pod['name'] ?></b> <br/> <span><?php echo $pod['description']?></span>");
                      <?php endforeach; ?>


                      }
                    </script>
                  </div>
                  <div class="col-6">
                    <canvas id="polar-charts" width="100%" height="100px"></canvas>
                    <script type="text/javascript">
                        new Chart(document.getElementById("polar-charts"), {
                        type: 'polarArea',
                        data: {
                          datasets: [
                            {
                              label: "Population (millions)",
                              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                              data: [2478,5267,734,784,433]
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Predicted world population (millions) in 2050'
                          }
                        }
                    });
                    </script>
                  </div>
                </div>
              </div>


            <?php endforeach; ?>






                <div class="ac-head">
                 <span class="score">78%</span><span>Zinal bla bal</span> <span>12 km</span> <span>40min</span> <i class="arrow_triangle-down toggle-icon"></i>
                </div>
                <div class="ac-body">
                  <div class="row">
                    <div class="col-8">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                    </div>
                    <div class="col-4">
                      <h4>weather</h4>
                      <h2>26°C</h2>
                    </div>
                    <div class="col-6">
                      <canvas id="polar-chart" width="100%" height="100px"></canvas>
                      <script type="text/javascript">
                          new Chart(document.getElementById("polar-chart"), {
                          type: 'polarArea',
                          data: {
                            datasets: [
                              {
                                label: "Population (millions)",
                                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                data: [2478,5267,734,784,433]
                              }
                            ]
                          },
                          options: {
                            title: {
                              display: true,
                              text: 'Predicted world population (millions) in 2050'
                            }
                          }
                      });
                      </script>
                    </div>
                    <div class="col-6">
                      <canvas id="polar-charts" width="100%" height="100px"></canvas>
                      <script type="text/javascript">
                          new Chart(document.getElementById("polar-charts"), {
                          type: 'polarArea',
                          data: {
                            datasets: [
                              {
                                label: "Population (millions)",
                                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                data: [2478,5267,734,784,433]
                              }
                            ]
                          },
                          options: {
                            title: {
                              display: true,
                              text: 'Predicted world population (millions) in 2050'
                            }
                          }
                      });
                      </script>
                    </div>
                  </div>
                </div>

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
