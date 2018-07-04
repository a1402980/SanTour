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
  //take id of closest section and add +1 to it
  var pageNum = $(this).closest('section').attr('id');
  var num = pageNum.split("-");
  num = parseInt(num[1])+1;
  //console.log(num);
  $(".page").removeClass("active");
  $("#page-"+num).addClass("active");
  changeBG();
});

function changeBG(){

  var x = Math.floor((Math.random() * 9) + 1);

  $("main").removeClass();
  $("main").addClass("bg"+x);

}

$(".img-carousel img").click(function(){
  $(".img-carousel img").removeClass("selected");
  $(this).addClass("selected");
  var strNum = $(this).attr('id');
  var num = strNum.split("-");
  num = parseInt(num[1]);
  $(this).parent().next().val(num);
});

$(".slider").on('input', function () {
    var value = $(this).val();
    $(this).prev().children().removeClass("selected");
    $(this).prev().find('#img-'+value).addClass("selected")
});

$(".accordian .ac-head").click(function(){
  $(".ac-body").slideUp();
  $(this).next().slideDown();
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
