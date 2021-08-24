<!DOCTYPE html>
<html>
<head>
	<title>Weather-API</title>

	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style type="text/css">

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
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.main-col {
  max-width: 1300px; 
  background-color: #f2f2f2; 
  border-radius: 2%; 
  border: 1px solid lightgrey;
}
.main-container {
  margin-top: 60px; 
  max-width: 1300px;
}
.mobile-table {
  display: none;
}
.navbar {
  border-radius: 0;
  margin-bottom: 0;
}
.nav-brand {
  text-decoration: none; 
  color: inherit; 
  margin-top: 5px;
}
.nav-link-margin {
  margin-left: 10px;
}
.search-bar-margin {
  margin-top: 25px;
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
@media only screen and (max-width: 600px) {
  .city-name {
    font-size: 1.4em;
  }
}
@media only screen and (max-width: 920px) {
  .city-name {
    margin-top: 50px;
  }
}
@media only screen and (max-width: 920px) {
  .invalid-zip {
    left: 50%;
    position: absolute;
    top: 20%;
    transform: translate(-50%, -50%);
  }
}
@media only screen and (max-width: 600px) {
  .invalid-zip {
    font-size: 0.9em;
    left: 48%;
    position: absolute;
    top: 18%;
    transform: translate(-50%, -50%);
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
@media only screen and (max-width: 600px) {
  .table {
    display: none;
  }
}
@media only screen and (max-width: 600px) {
  .mobile-table {
    display: block;
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
  }
}
@media only screen and (max-width: 920px) {
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
@media only screen and (max-width: 460px) {
  .weather-api {
    font-size: 2em;
  }
}
@media only screen and (max-width: 365px) {
  .weather-api {
    font-size: 1.7em;
  }
}
td {
  text-align: center;
}

</style>

</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-light bg-light box-shadow">
  <a class="h3 nav-brand" href="#">John Fedak</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link nav-link-margin" aria-current="page" href="https://johnfedak.com/">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Projects
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="https://johnfedak.com/quacker/">Social Media</a>
          <a class="dropdown-item active" href="https://johnfedak.com/projects/weather/">Weather API</a>
           <a class="dropdown-item" href="https://johnfedak.com/projects/notes/">Notes</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

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

