$( document ).ready(function() {

  console.log("Ready!");


$( ".info-trigger" ).click(function() {

$( ".more-info" ).slideToggle()
});


$( ".nav-toggle" ).click(function(){
  $( "#mobile-links" ).toggleClass("open");
});


$(".map-canton").click(function(){
  if ($(this).attr('id') == "VS") {
    $("#canton-select").val($(this).attr('id'));
    $("#map .map-canton").removeClass("selected");
    $(this).addClass("selected")
  }else {
    alert("Unfortunetly only Valais is currently available for SanTour. More cantons will be supported in the future.");
  }

});

$(".next-page").click(function(){
  var context = $(this);
  nextPage(context);
});

  function nextPage(current){
    //take id of closest section and add +1 to it
    var pageNum = current.closest('section').attr('id');
    var num = pageNum.split("-");
    num = parseInt(num[1])+1;
    $(".page").removeClass("active");
    $("#page-"+num).addClass("active");
    changeBG();
    $(window).scrollTop(0);
  }

$(".skip").click(function(){
  var context = $(this);
  nextPage(context);
});

function changeBG(){

  var x = Math.floor((Math.random() * 9) + 1);

  $("main").removeClass();
  $("main").addClass("bg"+x);

}

$("#mount-slider .slider").on('input', function () {
    var value = $(this).val();
    $("#mount-slider .mount").hide();
    $("#mount-slider .mount-"+value).show();
});

$(".img-carousel img").click(function(){
  $(".img-carousel img").removeClass("selected");
  $(this).addClass("selected");
  var strNum = $(this).attr('id');
  var num = strNum.split("-");
  num = parseInt(num[1]);
  $(this).parent().next().val(num);
});

$(".preview-slider .slider").on('input', function () {
    var value = $(this).val();
    $(this).prev().children().removeClass("selected");
    $(this).prev().find('#img-'+value).addClass("selected")
});

$(".accordian .ac-head").click(function(){
  if (!$(this).next(".ac-body").hasClass("active")) {
    $(".ac-body").slideUp();
    $(".ac-body").removeClass("active");
    $(this).next(".ac-body").addClass("active");
    $(this).next(".ac-body").slideDown();
  }else{
    $(".ac-body").removeClass("active");
    $(this).next(".ac-body").slideUp();
  }
  $(this).children(".toggle-icon").toggleClass("arrow_triangle-down arrow_triangle-up");
});



$( ".accordian .ac-head" ).click(function() {
  if($(this).next(".ac-body").find(".weather-temp").text().length == 0){
    var gps = $(this).attr("value")
    var temp;
    var that = $(this);
    getWeather(gps).then(function(weather) {
          temp = weather.main.temp;
          var iconCode = weather.weather[0].icon
          var icon = 'http://openweathermap.org/img/w/'+iconCode+'.png'
          that.next(".ac-body").find( ".spinner" ).remove();
          that.next(".ac-body").find( ".weather-icon" ).attr("src", icon);
          that.next(".ac-body").find( ".weather-icon" ).show();
          that.next(".ac-body").find( ".weather-temp" ).text(temp + "°C");
          that.next(".ac-body").find( ".weather-temp" ).show();


    });
  }


});



});





function getWeather(gps) {
  var mytemp = [];
  return $.ajax({
    url: "http://localhost:8080/SanTour/weather.php?"+gps,
    async: true,
    dataType: 'json',
  });


};
