$( document ).ready(function() {

  console.log("Ready!");

$( ".weather-button" ).click(function() {
  var gps = $(this).attr("value")
  var temp = getWeather(gps);
  $(this).next( ".weather-info" ).html(temp);
  $(this).next( ".weather-info" ).removeClass("hidden");
  $(this).remove();
});

$( ".info-trigger" ).click(function() {

$( ".more-info" ).slideToggle()
});


$( ".nav-toggle" ).click(function(){
  //$( "#mobile-links" ).toggle();
  $( "#mobile-links" ).toggleClass("open");
});

});



function getWeather(gps) {
  var mytemp = [];
  $.ajax({
    url: "http://api.openweathermap.org/data/2.5/weather?"+gps+"&units=metric&appid=e0f2079a78a7ff7b0d8036d3c798899a",
    async: false,
    dataType: 'json',
    success: function (json) {
      mytemp = json.main.temp_min;
    }
  });

  return mytemp; // has value of json.whatever

};
