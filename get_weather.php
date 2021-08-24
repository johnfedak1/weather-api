<?php 

include '../mysql_variables.php';

$user_zip    = $_GET["zipcode"];
$is_searched = $_GET["is_searched"];

$weather_data = "http://api.openweathermap.org/data/2.5/weather?zip=$user_zip,us&appid=61fb057bc3c678622375931e12120e84";
$weather_data_result = json_decode(file_get_contents($weather_data));

$description             = ucwords($weather_data_result->weather[0]->description);
$temp                    = floor(9/5*($weather_data_result->main->temp-273.15)+32);
$feels_like              = $weather_data_result->main->feels_like;
$cloudiness_percentage   = $weather_data_result->clouds->all;
$city_name               = $weather_data_result->name;
$timezone                = $weather_data_result->timezone;
$sunrise_time            = $weather_data_result->sys->sunrise;
$sunset_time             = $weather_data_result->sys->sunset;

$temp_format             = floor(9/5*($temp-273.15)+32);
$feels_like_format       = floor(9/5*($feels_like-273.15)+32);

if (is_null($description) || empty($description) ) {
  echo "error";
  exit();
} else {
  echo "
  <table class='table text-center'>
  <thead>
    <tr>
      <th scope='col'>Current Temp</th>
      <th scope='col'>Feels Like</th>
      <th scope='col'>Description</th>
      <th scope='col'>Cloudiness</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>$temp&#8457;</td>
      <td>$feels_like_format&#8457;</td>
      <td>$description</td>
      <td>$cloudiness_percentage%</td>
    </tr>
  </tbody>
</table>

<table class='table mobile-table'>
  <tbody style='border: 1px solid lightgrey;'>
    <tr>
      <th scope='row'>Current Temp</th>
      <td>$temp&#8457;</td>
    </tr>
    <tr>
      <th scope='row'>Feels Like</th>
      <td>$feels_like_format&#8457;</td>
    </tr>
    <tr>
      <th scope='row'>Description</th>
      <td>$description</td>
    </tr>
    <tr>
      <th scope='row'>Cloudiness</th>
      <td>$cloudiness_percentage%</td>
    </tr>
  </tbody>
</table>

 <iframe style='border-radius: 3%; border: 2px solid lightgrey; display: block; margin: auto; width: 85%; height: 275px;' loading='lazy' allowfullscreen src='https://www.google.com/maps/embed/v1/place?key=AIzaSyDz1-7_NjTq5F-naipeVoGjLg4YfVF3CDk
    &q=$user_zip'>
 </iframe>
";

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

#add one to the weather api weatherCounter if the user made a search
if ($is_searched != 1) {
   $search_counter = "UPDATE weatherCounter SET number_of_searches = number_of_searches + 1";
   mysqli_query($con, $search_counter);
 } 

}

?>

 