<?php 

$user_zip = $_GET["zipcode"];

$weather_data = "http://api.openweathermap.org/data/2.5/weather?zip=$user_zip,us&appid=61fb057bc3c678622375931e12120e84";
$weather_data_result = json_decode(file_get_contents($weather_data));

$city_name = $weather_data_result->name;

echo "<div style='text-align: center;' class='h4 city-name'>Showing weather data for <i>'$city_name'</i></div>";

?>

 