<!DOCTYPE html>
<html>
<head>

  <title>Weather-API</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Emblema+One&family=Lora&family=Overpass:ital,wght@0,400;1,100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style type="text/css">

/*nav styles*/
 #nav {
  background-color: white;
  box-shadow: 0 6px 20px 0 rgb(0 0 0 / 19%); 
  margin-bottom: 40px;
}
#nav-content {
  height: 70px;
  display: flex;
  align-items: center;
  flex-flow: row wrap;
  font-family: Overpass, sans-serif !important;
}
.logo {
  font-size: 45px;
  color: #196db6;
  font-weight: 800;
}
.home {
  font-size: 25px;
  font-weight: 800;
}
.home a {
  text-decoration: none;
  color: #196db6;
  margin-right: 10px;
  transition: color 200ms;
}
.home a:hover {
  color: #3592e3;
}
.fa-home {
  margin-right: 5px;
}
.alignleft {
width:33.33333%;
text-align:left;
}
.aligncenter {
width:33.33333%;
text-align:center;
}
.alignright {
width:33.33333%;
text-align:right;
}

/*weather styles*/
.bottom-left {
  bottom: 8px;
  left: 16px;
  position: absolute;
  font-size: 1.5em;
}
.box-shadow {
  box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.centered {
  left: 50%;
  position: absolute;
  top: 5%;
  transform: translate(-50%, -50%);
}
.city-name {
  margin-top: 100px;
}
.invalid-zip {
  position: absolute;
  right: 125px;
  top: 10%;
}
.list-style-b {
  width: 200px;
}
.loading-gif {
  display: none;
  height: 50px;
  width: 50px;
  position: absolute;
  top: 65%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.main-col {
  max-width: 1300px; 
  background-color: #ffffff; 
  border-radius: 2%; 
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}
.main-container {
  margin-top: 60px; 
  max-width: 1300px;
}
.mobile-table {
  display: none;
}
.top-left {
  left: 10px;
  position: absolute;
  top: 12px;
}
.top-right {
  position: absolute;
  right: 16px;
  top: 12px;
}
#weather-data {
  font-size: 20px; 
  margin-bottom: 50px;
}

/*media queries*/
@media only screen and (max-width: 365px) {
  .weather-api {
    font-size: 1.7em;
  }
}
@media only screen and (max-width: 400px) {
  .invalid-zip {
    font-size: 0.8em;
    left: 48%;
    position: absolute;
    top: 18%;
    transform: translate(-50%, -50%);
  }
}
@media only screen and (max-width: 460px) {
  .weather-api {
    font-size: 2em;
  }
}
@media only screen and (max-width: 600px) {
  .city-name {
    font-size: 1.4em;
  }
  .invalid-zip {
    font-size: 0.9em;
    left: 48%;
    position: absolute;
    top: 18%;
    transform: translate(-50%, -50%);
  }
  .table {
    display: none;
  }
  .mobile-table {
    display: block;
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
  }
}
@media only screen and (max-width: 920px) {
  .city-name {
    margin-top: 50px;
  }
  .invalid-zip {
    left: 50%;
    position: absolute;
    top: 20%;
    transform: translate(-50%, -50%);
  }
  .top-right {
    margin-top: 75px;
    position: static;
  }
}
@media screen and (max-width: 992px) {
  .nav-link-margin {
    margin-left: 0px;
  }
}

/*element styles*/
td {
  text-align: center;
}
body {
    background-color: #ECF5F9;
}

</style>

</head>
<body>

  <div id="nav" class="container-fluid">
    <div class="row">
      <div id="nav-content" class="col-12">
        <div class="alignleft"></div>
      <div class="logo aligncenter">JF</div>
      <div class="home alignright"><a href="https://johnfedak.com/"><i class="fas fa-home fa-sm"></i>Home</a></div>
    </div>
  </div>
</div>

<div class="container-fluid main-container">
  <div class="row" style="justify-content: center;">
    <div class="col-md-9 main-col">
      <div style="margin-top: 20px;">
        <div class="h1 centered weather-api" style="text-align: center;">Weather API</div>
        <button id="info" type="button" class="btn btn-secondary top-left">
		      Info
		    </button>
        <span id="error" class="text-danger invalid-zip" style="display: none;" ><small>Invalid Zipcode<small></span>
        <div class="top-right">
          <div class="input-group mb-3 list-style-b" style="margin: auto;">
            <input type="text" id="input" class="form-control" placeholder="Enter zip code">
            <div class="input-group-append">
              <button class="btn btn-primary text-light" id="search" type="button"> Search</button>
            </div>
          </div>
        </div>
      <img id="loading-gif" src="loading.gif" class="loading-gif">
      	<span id="show-data" style="display: none;">
          <div id="city-name" class="city-name" style="margin-bottom: 30px;"></div>
          <div id="weather-data"></div>
        </span>
        <i class="bottom-left">data from openweathermap.org<i>
      </div>
    </div>
  </div>
</div>

<!-- Info modal -->
<div class="modal fade" tabindex="-1" id="info-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-body" style="padding: 10px;">
      	<div id="searches-made" style="text-align: center;"></div>
      </div>
      <div class="modal-footer" style="padding: 10px;">
        <button id="close-button" class="btn btn-secondary modal-close">Close</button>
      </div>
    </div>
  </div>
</div>

<iframe style="display: none;" width="650" height="450" src="https://embed.windy.com/embed2.html?lat=30.421&lon=-74.060&detailLat=40.421&detailLon=-74.060&width=650&height=450&zoom=5&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>

<br>

<script type="text/javascript">

$(document).ready(function(){

//This is the default weather that this application will show
  $.get("get_weather.php?zipcode=" + 10001 + "&is_searched=" + 1, function(data){
     if (  data.includes("error")) {

     } else {
     	$.get("get_city_name.php?zipcode="+10001, function(data){
     		$("#city-name").html(data);
     	});
		    $("#error").fadeOut();            
        $("#weather-data").html(data);
        $("#show-data").fadeIn();  
     } 
	   });
});

$("#search").click(function(){
    $("#error").fadeOut();
	  var input = $("#input").val();

	  if (input.length == 5 && $.isNumeric($("#input").val()) == true ) { 
        $("#loading-gif").show();
		    $.get("get_weather.php?zipcode="+input, function(data){
  		     if (  data.includes("error")) {
  		        $("#error").fadeIn();
  		        $("#loading-gif").hide();
  		     } else {
  		     	$.get("get_city_name.php?zipcode="+input, function(data){
    		     	$("#loading-gif").hide();
    		     	$("#city-name").html(data);
  		     	});
  				    $("#error").fadeOut();            
  		        $("#weather-data").html(data);
  		        $("#show-data").fadeIn();            
  		     } 
	   	  });
	  } else {
	    $("#error").fadeIn();
	    $("#loading-gif").hide();
	 }
});

$("#info").click(function(){
	$.get("get_num_of_searches.php", function(data){
		$("#searches-made").html(data);
		$("#info-modal").modal("show");
	});
});

$("#close-button").click(function(){
	$("#info-modal").modal("hide");
});

var input = document.getElementById("input");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("search").click();
  }
});

</script>

</body>
</html>

