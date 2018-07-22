$( document ).ready(function() {

  console.log("Ready!");
  //Cookies.remove("saved-users");



$( ".info-trigger" ).click(function() {

$( ".more-info" ).slideToggle()
});


$( ".nav-toggle" ).click(function(){
  $( "#mobile-links" ).toggleClass("open");
});




$(".next-page").click(function(){
  if ($(this).hasClass("skip-physical")) {
    skipPhysical();
  }else {
    var context = $(this);
    nextPage(context);
  }

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
  //special case for physical questions. If pressed back, take back to beginning of physical evaluation
  if (num == 6) {
    backToPhysical();
  }else {
    $(".page").removeClass("active");
    $("#page-"+num).addClass("active");
    var totalpages = $('.page').length;
    var percentageDone = (num/totalpages) * 100;
    $(".done-percentage").text(Math.round(percentageDone));
    changeBG();
    $(window).scrollTop(0);
  }

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
  $(".toggle-icon").removeClass("arrow_triangle-up").addClass("arrow_triangle-down");
  $(this).children(".toggle-icon").toggleClass("arrow_triangle-down arrow_triangle-up");
});



$( ".accordian .ac-head" ).click(function() {
  if($(this).next(".ac-body").find(".weather-temp").text().length == 0){
    var gps = $(this).attr("value");
    var temp;
    var that = $(this);
    getWeather(gps).then(function(weather) {
          temp = weather.main.temp;
          var iconCode = weather.weather[0].icon;
          var icon = 'http://openweathermap.org/img/w/'+iconCode+'.png';
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



$(".pain").change(function() {
    if(this.checked) {
      $('.no-pain').prop('checked', false); // Unchecks no pain option
    }
});

$(".no-pain").change(function() {
    if(this.checked) {
      $('.pain').prop('checked', false); // Unchecks pain options
    }
});

$(".no-mobility").change(function() {
    if(this.checked) {
      $('.full-mobility').prop('checked', false); // Unchecks full mobility
    }
});

$(".full-mobility").change(function() {
    if(this.checked) {
      $('.no-mobility').prop('checked', false); // Unchecks mobility limitations
    }
});

//branching logic to skip further physical questions
$(".physical-1").change(function() {
  if ($('input[name=physical-activity]:checked').val() == 0) {
    $("#pageskipperone").removeClass("next-page");
    $("#pageskipperone").addClass("skip-physical");
  }else {
    $("#pageskipperone").addClass("next-page");
    $("#pageskipperone").removeClass("skip-physical");
  }
});

//branching logic to skip further physical questions
$(".physical-2").change(function() {
  if ($('input[name=physical-activity]:checked').val() == 67) {
    $("#pageskippertwo").removeClass("next-page");
    $("#pageskippertwo").addClass("skip-physical");
  }else {
    $("#pageskippertwo").addClass("next-page");
    $("#pageskippertwo").removeClass("skip-physical");
  }
});

//skip the rest of the physical questions
function skipPhysical(){
  var num = 7;
  $(".page").removeClass("active");
  $("#page-"+num).addClass("active");
  var totalpages = $('.page').length;
  var percentageDone = (num/totalpages) * 100;
  $(".done-percentage").text(Math.round(percentageDone));
  changeBG();
  $(window).scrollTop(0);
}
//special case for back press on question after
function backToPhysical(){
  var num = 4;
  $(".page").removeClass("active");
  $("#page-"+num).addClass("active");
  var totalpages = $('.page').length;
  var percentageDone = (num/totalpages) * 100;
  $(".done-percentage").text(Math.round(percentageDone));
  changeBG();
  $(window).scrollTop(0);
}
    $(".user-box").click(function(){
  var index = $(this).attr('value');
  $("#user-"+index).submit();
});

//change the canton in the cookie forms
$("#canton-select").change(function() {
  var canton = $(this).val();
  $("input[type='text'][name='canton']").attr('value', canton);
});

$(".user-box .icon_close").click(function(){
  var index = $(this).attr('value');
  var cookie_name = "saved-users";
  var cookie = unserialize(Cookies.get(cookie_name));

  //if user is the only one, delete whole cookie
  if (cookie.length == 1 ) {
    Cookies.remove(cookie_name);
  }else {
    delete cookie[index];
    cookie = serialize(cookie);
    Cookies.set(cookie_name, cookie);
  }

  $(this).parent().remove();
});

//set default canton value for cookie forms
if($(".cookie-form").length != 0) {
  var canton = $("#canton-select").val();
  $("input[type='text'][name='canton']").attr('value', canton);
}

//cookie policy
var cook = Cookies.get('cookies');
if (cook !== 'true') {
  $('#cookie-info').show();
}

$("#cookie-info i").click(function(){
  Cookies.set('cookies', 'true');
  $('#cookie-info').hide();
});

});

//stop form from sending with enter press
$(document).on("keypress", "form", function(event) {
    return event.keyCode != 13;
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


}
