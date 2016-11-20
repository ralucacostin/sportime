<?php
	include "conectare.php";
  $sql = "SELECT * FROM facilities_db";
  $facility_array = array();
  $result = $mysqli->query($sql);
  while ($row = mysqli_fetch_assoc($result))
  {
  	$facility_array[] = $row;
  }

  $facility_names = json_encode($facility_array, JSON_PRETTY_PRINT);
  print_r($facility_names);
?>