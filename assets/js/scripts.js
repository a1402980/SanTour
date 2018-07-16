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

$(".skip").click(function(){
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
  var totalpages = $('.page').length;
  var percentageDone = (num/totalpages) * 100;
  $(".done-percentage").text(Math.round(percentageDone));
  changeBG();
  $(window).scrollTop(0);
}

$(".previous-page").click(function(){
  //take id of closest section and -1 to it
  var pageNum = $(this).closest('section').attr('id');
  var num = pageNum.split("-");
  num = parseInt(num[1])-1;
  $(".page").removeClass("active");
  $("#page-"+num).addClass("active");
  var totalpages = $('.page').length;
  var percentageDone = (num/totalpages) * 100;
  $(".done-percentage").text(Math.round(percentageDone));
  changeBG();
  $(window).scrollTop(0);
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
  $(this).parent('.img-carousel').children().removeClass("selected");
  //$(".img-carousel img").removeClass("selected");
  var classes = $(this).attr("class");
  $("."+classes).addClass("selected");
  var num = parseInt($(this).attr('value'));
  $(this).parent().next(".slider").val(num);
});

$(".preview-slider .slider").on('input', function () {
    var value = $(this).val();
    $(this).prev('.img-carousel').children().removeClass("selected");
    $(this).prev().find('[class^=img-'+value+']').addClass("selected")
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
    console.log(gps);
    getWeather(gps).then(function(weather) {
          console.log(weather);
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

$( ".dropdown .dd-trigger" ).click(function() {
  $(".dropdown ul").slideToggle();
  $(".dropdown .toggle-icon").toggleClass("arrow_triangle-down arrow_triangle-up");
});





});





function getWeather(gps) {
  var mytemp = [];
  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
  return $.ajax({
    url: baseUrl+"/weather.php?"+gps,
    async: true,
    dataType: 'json',
  });


};
