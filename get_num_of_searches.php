<?php  

include '../mysql_variables.php';

$con = mysqli_connect($local_host,$db_username,$db_psw,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query  = "SELECT number_of_searches FROM weatherCounter;";
$result = mysqli_query($con, $query);
$row    = mysqli_fetch_assoc($result);

$num_searches = $row['number_of_searches'];

echo "<p style='font-size: 1.3em; font-style: normal;'>Total searches made: $num_searches</p>";

?>