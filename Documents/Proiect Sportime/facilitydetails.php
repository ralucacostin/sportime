<?php
  include "conectare.php";
  $dbAdapter = $mysqli;
  function getFacilities($testName) {
    global $dbAdapter;
    $sql1 = "SELECT * FROM facilities_db WHERE facility_name = '$testName'";
    if (!$result1 = $dbAdapter -> query($sql1))
      die('Eroare'. $dbAdapter -> error);

    $facility_details = array();
    while ($row = mysqli_fetch_assoc($result1))
    {
      $facility_details[] = $row;
    }
    return $facility_details;
  }

  $facility_name = $_POST['fac_name'];

  $facility_data = getFacilities($facility_name);
  $facility_data2 = json_encode($facility_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  print($facility_data2);
?>