<?php
$lat = $_GET["lat"];
$lng = $_GET["lng"];
//var_dump($lat, $lng);

if (is_numeric ($lat) and is_numeric ($lng)) {
  $URL = 'http://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lng.'&units=metric&appid=e0f2079a78a7ff7b0d8036d3c798899a';

  // Setup cURL
  $ch = curl_init($URL);

  curl_setopt_array($ch, array(
      CURLOPT_POST => TRUE,
      CURLOPT_RETURNTRANSFER => TRUE
  ));

  // Send the request
  $response = curl_exec($ch);

  // Check for errors
  if($response === FALSE){
      die(curl_error($ch));
  }

  // Decode the response
  header('Content-Type: application/json');
  //$responseData = json_decode($response, TRUE);

  // Print the date from the response
  echo $response;
}


 ?>
