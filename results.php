<?php
require_once('header.php');
// The data to send to the API
$postData = array(
    'content' => 'With <b>exciting</b> content...'
);
// Setup cURL
$ch = curl_init('http://localhost:3003/itineraries/');
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
$user_info = $_POST;


//save the users preferences if the username is set
if (!empty ($user_info['username'])) {
   $cookie_name = "saved-users";
  if (isset($_COOKIE[$cookie_name])) {
     $saved_users = unserialize($_COOKIE[$cookie_name]);
     $nmbr = count($saved_users);
     if ( $nmbr >= 4) {
       //if over 4 users saved, delete one before adding a new one
       $saved_users = array_slice($saved_users,-3,3);
       array_push ($saved_users, $user_info);
       setcookie($cookie_name, serialize($saved_users), time() + (86400 * 7), "/"); //save for 7 days
     }else {
        array_push ($saved_users, $user_info);
        setcookie($cookie_name, serialize($saved_users), time() + (86400 * 7), "/"); //save for 7 days
      }
    }else {
       //if no users saved, create and array and add user info to it
       $cookie_value = array(); array_push ($cookie_value, $user_info);
       setcookie($cookie_name, serialize($cookie_value), time() + (86400 * 7), "/"); //save for 7 days
     }
}

//take username out so the itineraries can be scored
unset($user_info['username']);
//canton is not needed for the front-end but it is useful in the future
unset($user_info['canton']);

//checking for unfilled fields
if (!$user_info['physical-activity']) {
   $user_info['physical-activity'] = 0;
 }
 if (!$user_info['walking-help']) {
    $user_info['walking-help'] = 0;
  }
  if (!$user_info['walking-speed']) { $user_info['walking-speed'] = 0; }
  if (!$user_info['walking-time']) { $user_info['walking-time'] = 0; }
  if (!$user_info['mounting']) { $user_info['mounting'] = 0; }
  if (!$user_info['fear-of-heights']) { $user_info['fear-of-heights'] = 0; }
  if (!$user_info['balance']) { $user_info['balance'] = 0; }

  //calcualte the total of walking confidence
  $walkingTotal = $user_info['walking-confidence-1'] + $user_info['walking-confidence-2'] + $user_info['walking-confidence-3'];
  unset($user_info['walking-confidence-1'],$user_info['walking-confidence-2'],$user_info['walking-confidence-3']);
  $user_info['walking-confidence'] = $walkingTotal;

  //calculate the total pain points
  if (!$user_info['pain'] and $user_info['pain-1'] || $user_info['pain-2'] || $user_info['pain-3'] || $user_info['pain-4']) {
    $user_info['pain'] = 100 - ($user_info['pain-1'] + $user_info['pain-2'] + $user_info['pain-3'] + $user_info['pain-4']);
    unset($user_info['pain-1'],$user_info['pain-2'],$user_info['pain-3'],$user_info['pain-4']);
  }else {
    $user_info['pain'] = 100;
    }

  //calculate the total mobility points
  if (!$user_info['mobility'] and $user_info['mobility-1'] || $user_info['mobility-2'] ||$user_info['mobility-3']) { $user_info['mobility'] = 100 - ($user_info['mobility-1'] + $user_info['mobility-2'] + $user_info['mobility-3']);
    unset($user_info['mobility-1'],$user_info['mobility-2'],$user_info['mobility-3']);
  }else {
    $user_info['mobility'] = 100;
  }
 ?>

<main class="bg5">
  <?php
  echo "<br> <br> <br> <br> <br> ";
  foreach ($user_info as $key => $value)
      echo $key.'='.$value.'<br />';
   ?>
  <section class="page active">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Okay, heres what we would recommend:</h1>

          </div>
          <div class="col-5">
            <div id="it-map"></div>
            <script>
              //map center to center of Switzerland
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

          <?php foreach ($responseData as $key => $itinerary): ?>

            <?php
            //calculate differences between users attributes and itinerarys attributes
            $a = $user_info;
            $b = $itinerary['attributes'];
            $c = 0;
            foreach ($a as $k=>$v) {
                if ($v == $b[$k]) $c++;
            }
            $percentage = ($c/count($a))*100;
            $responseData[$key]['score'] = $percentage;
            ?>

          <?php endforeach; ?>

          <?php
             usort($responseData, function ($item1, $item2) {
                 return $item2['score'] <=> $item1['score'];
             });
           ?>

          <div class="col-7">
            <div class="accordian">

            <?php foreach ($responseData as $itinerary): ?>


              <?php
              $percentage = $itinerary['score'];
              switch ($percentage) {
                  case $percentage >= 70:
                      $color = 'green';
                      break;
                  case $percentage < 70 and $percentage >= 40:
                      $color = 'orange';
                      break;
                  case $percentage < 40:
                      $color = 'red';
                      break;
              }
              ?>

              <div class="ac-head" onclick="updateMap<?php echo $itinerary['_id'] ?>()" value="<?php echo 'lat='.$itinerary['latlng'][0][0].'&lng='.$itinerary['latlng'][0][1] ?>">
               <span class="score <?php echo $color ?>"><?php echo round($percentage) ?></span><span><?php echo $itinerary['name']; ?></span><?php echo $itinerary['info']['distance']; ?><span></span> <span><?php echo $itinerary['info']['time']; ?></span> <i class="arrow_triangle-down toggle-icon"></i>
              </div>
              <div class="ac-body">
                <div class="row">
                  <div class="col-9">
                    <h4>Description</h4>
                    <p><?php echo $itinerary['description']; ?></p>
                  </div>

                  <div class="col-3 weather center">
                    <h4>Weather</h4>
                    <div class="icon_loading spinner">

                    </div>
                    <img class="weather-icon" src="" hidden alt="">
                    <span class="weather-temp" hidden></span>


                  </div>
                  <div class="col-12">
                    <a href="<?php echo $itinerary['url']; ?>" target="_blank"> <button type="button">Snukr <i class="icon_map"></i> </button></a>
                    <a href="<?php echo URL_DIR . 'assets/gpx/' . $itinerary['name'] . '.gpx' ?>" download> <button type="button">GPX file <i class="icon_download"> </i> </button></a>
                    <?php $transportUrl = "https://timetable.search.ch/?from=&to=snap%3A" . $itinerary['latlng'][0][0] . "%2C" . $itinerary['latlng'][0][1] . "&time=&date=&time_type=depart" ?>
                    <a href="<?php echo $transportUrl ?>" target="_blank" > <button type="button">Public transport <i class="icon_pin_alt"></i> </button> </a>
                  </div>
                  <div class="col-12">
                    <span>Trail type: <?php echo $itinerary['info']['trail-type'] ?> trail</span> <a href="<?php echo URL_DIR ?>about.php#trails" target="_blank"><i class="icon_question_alt2"></i></a>
                    <div class="<?php echo $itinerary['info']['trail-type'] ?>"></div>
                  </div>
                  <div class="col-12">
                    <canvas id="altitude-<?php echo $itinerary['_id'] ?>" width="50" height="25"></canvas>
                    <script type="text/javascript">
                    new Chart(document.getElementById("altitude-<?php echo $itinerary['_id'] ?>"), {
                    type: 'line',
                    data: {
                      labels: [
                        <?php foreach ($itinerary['latlng'] as $key => $altitude): ?>
                          <?php echo $key.",";?>
                        <?php endforeach; ?>
                      ],
                      datasets: [{
                          data: [
                            <?php foreach ($itinerary['latlng'] as $altitude): ?>
                              <?php echo $altitude[2].",";?>
                            <?php endforeach; ?>
                          ],
                          label: "Meters",
                          borderColor: "#B6F890",
                          fill: false
                        }
                      ]
                    },
                    options: {
                      title: {
                        display: true,
                        text: 'Altitude profile'
                      },
                      legend: {
                        display: false,
                      },
                      elements: { point: { radius: 0 } }
                      },
                    });
                    </script>
                  </div>
                  <div class="col-6">
                    <canvas id="user-chart<?php echo $itinerary['_id'] ?>" width="100%" height="100px"></canvas>
                    <script type="text/javascript">
                    new Chart(document.getElementById("user-chart<?php echo $itinerary['_id'] ?>"), {
                        type: 'radar',
                        data: {
                          labels: [
                            <?php
                            $chart_user = $user_info;
                          	ksort($chart_user); ?>
                            <?php foreach ($chart_user as $key => $user_attribute): ?>
                              <?php echo '"'.$key.'"'.",";?>
                            <?php endforeach; ?>
                          ],
                          datasets: [
                            {
                              label: "User score",
                              fill: true,
                              backgroundColor: "rgba(179,181,198,0.2)",
                              borderColor: "#B6F890",
                              pointBorderColor: "#fff",
                              pointBackgroundColor: "rgba(179,181,198,1)",
                              data: [
                                <?php foreach ($user_info as $user_attribute): ?>
                                  <?php echo $user_attribute.",";?>
                                <?php endforeach; ?>
                              ]
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Your attributes'
                          },
                          elements: { point: { radius: 0 } },
                          scale: { pointLabels: { fontSize: 8 } }
                        }
                    });
                    </script>
                  </div>

                  <div class="col-6">
                    <canvas id="itinerary-chart<?php echo $itinerary['_id'] ?>" width="100%" height="100px"></canvas>
                    <script type="text/javascript">
                    new Chart(document.getElementById("itinerary-chart<?php echo $itinerary['_id'] ?>"), {
                        type: 'radar',
                        data: {
                          labels: [
                            <?php
                            $chart_itinerary = $itinerary['attributes']; ?> <?php
                            ksort($chart_itinerary); ?>
                            <?php foreach ($chart_itinerary as $key => $itinerary_attribute): ?>
                              <?php echo '"'.$key.'"'.",";?>
                            <?php endforeach; ?>
                          ],
                          datasets: [
                            {
                              label: "Itinerary score",
                              fill: true,
                              backgroundColor: "rgba(179,181,198,0.2)",
                              borderColor: "#DFD285",
                              pointBorderColor: "#fff",
                              pointBackgroundColor: "rgba(179,181,198,1)",
                              data: [
                                <?php foreach ($itinerary['attributes'] as $itinerary_attribute): ?>
                                  <?php echo $itinerary_attribute.",";?>
                                <?php endforeach; ?>
                              ]
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Itinerary attribute'
                          },
                          elements: { point: { radius: 0 } },
                          scale: { pointLabels: { fontSize: 8 } }
                        }
                    });
                    </script>
                  </div>

                    <script>
                    function updateMap<?php echo $itinerary['_id'] ?>(){
                      //restart map
                      mymap.remove()
                      //map center
                      mymap = L.map('it-map').setView([<?php echo $itinerary['latlng'][0][0].", ".$itinerary['latlng'][0][1]; ?>], 8);
                      L.tileLayer('https://tile.osm.ch/switzerland/{z}/{x}/{y}.png', {
                      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                      bounds: [[45, 5], [48, 11]]
                      }).addTo(mymap);
                      //map center
                      mymap.setView(new L.LatLng(<?php echo $itinerary['latlng'][0][0].", ".$itinerary['latlng'][0][1]; ?>), 8);
                      // create a red polyline from an array of LatLng points
                      var latlngs = [
                      //print all the gps points
                      <?php foreach ($itinerary['latlng'] as $cords): ?>
                        <?php echo "[".$cords[0].",".$cords[1]."],"?>
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
              </div>


            <?php endforeach; ?>


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
