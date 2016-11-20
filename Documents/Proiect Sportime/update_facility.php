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

  if ($facility_name == null || $facility_description == null || $facility_activity == null || $facility_opening == null || $facility_closing == null || $facility_postcode == null)
  {
    echo "0";
  }
  else {
    $sql1 = "UPDATE `facilities_db` SET `facility_name` = '$facility_name', `facility_description` = '$facility_description', `facility_website` = '$facility_website', `facility_activity` = '$facility_activity', `facility_opentime_week` = '$facility_opening', `facility_closetime_week` = '$facility_closing', `facility_address` = '$facility_address', `facility_postcode` = '$facility_postcode' WHERE `facility_name` = '$facility_name'";
    $mysqli->query($sql1);

    echo "1";
  }
?>