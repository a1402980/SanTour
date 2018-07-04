<?php
require_once('header.php');
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

            	var mymap = L.map('it-map').setView([46.2764737,7.4349203], 13);



            	L.tileLayer('https://tile.osm.ch/switzerland/{z}/{x}/{y}.png', {
            	maxZoom: 15,
            	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            	bounds: [[45, 5], [48, 11]]
            	}).addTo(mymap);

            	L.marker([46.2764737,7.4349203]).addTo(mymap)
            		.bindPopup("<b>Point of danger</b>");

            	// create a red polyline from an array of LatLng points
            	var latlngs = [
            		[46.276,7.434],
            		[46.277,7.435],
            		[46.278,7.436]
            	];
            	var polyline = L.polyline(latlngs, {color: 'red'}).addTo(mymap);
            	// zoom the map to the polyline
            	mymap.fitBounds(polyline.getBounds());



            </script>
          </div>
          <div class="col-7">

              <div class="accordian">
                <div class="ac-head">
                 <span class="score">89%</span><span>Zinal bla bal</span> <span>40min</span> <i class="arrow_triangle-down toggle-icon"></i>
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

                <div class="ac-head">
                 <span class="score">89%</span><span>Zinal bla bal</span> <span>40min</span> <i class="arrow_triangle-down toggle-icon"></i>
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
