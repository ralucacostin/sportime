<?php
  include "conectare.php";
  $dbAdapter = $mysqli;

  $facility_name = $_POST['name'];
  $facility_description = $_POST['description'];
  $facility_website = $_POST['website'];
  $facility_activity = $_POST['activity'];
  $facility_opening = $_POST['opening'];
  $facility_closing = $_POST['closing'];
  $facility_address = $_POST['address'];
  $facility_postcode = $_POST['postcode'];

  $facility_opening = $facility_opening.":00:00";
  $facility_closing = $facility_closing.":00:00";

  $result = mysqli_fetch_assoc($mysqli->query("SELECT facility_id FROM facilities_db ORDER BY facility_id DESC LIMIT 1"));
  $facility_id = $result['facility_id'];
  $facility_id++;

  if ($facility_name == null || $facility_description == null || $facility_activity == null || $facility_opening == null || $facility_closing == null || $facility_postcode == null)
  {
    echo "0";
  }
  else {
    $sql1 = "INSERT INTO `facilities_db`(`facility_name`, `facility_id`, `facility_address`, `facility_postcode`, `facility_website`, `facility_description`, `facility_activity`, `facility_opentime_week`, `facility_closetime_week`) VALUES ('$facility_name', '$facility_id', '$facility_address', '$facility_postcode', '$facility_website', '$facility_description', '$facility_activity', '$facility_opening', '$facility_closing')";
    $mysqli->query($sql1);

    echo "1";
  }
?>