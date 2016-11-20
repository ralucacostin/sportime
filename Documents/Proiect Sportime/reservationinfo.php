<?php
  include "conectare.php";
  $dbAdapter = $mysqli;

  function getReservations($userID) {
    global $dbAdapter;
    $sql1 = "SELECT `facility_name`, `day`, `month`, `year`, `start_time`, `end_time` FROM reservation_db WHERE user_id = '$userID' ORDER BY `facility_name` ASC, `year` ASC, `day` ASC, `start_time` ASC, `end_time` ASC";
    if (!$result1 = $dbAdapter -> query($sql1))
      die('Eroare'. $dbAdapter -> error);

    $facility_details = array();
    while ($row = mysqli_fetch_assoc($result1))
    {
      $facility_details[] = $row;
    }
    return $facility_details;
  }

  $facility_data = getReservations(6);
  // print_r($facility_data);
  print "<br><br>";

  // foreach ($facility_data as $key)
  //   foreach ($key as $value)
  //     echo $value;
  // print "<br><br>";

  // $sorted_facilities = Array();
  // for ($i = 0; $i < count($facility_data); $i++)
  // {
  //   foreach ($facility_data[$i] as $key => $value)
  //   {
  //     if ($key == "facility_name")
  //       $sorted_facilities[][$key] = $value;
  //     $sorted_facilities = array_map("unserialize", array_unique(array_map("serialize", $sorted_facilities)));
  //     print_r($key." => ".$value);
  //     print "<br>";
  //   }
  //   print "<br>";
  // }

  // print "<br><br>";
  //   foreach ($sorted_facilities as $key => $value)
  //   {
  //     print_r($sorted_facilities[$key]);
  //     print "<br>";
  //   }

$noDupes = array();

foreach ($facility_data as $fac) {
    $facilityIndex = -1; // The index of the facility name, -1 indicates it wasn't found.
    $dateIndex = '';     // The index of the date string, an empty string indicates it wasn't found.
    $timeslotIndex = ''; // The index of the timeslot, an empty string indicates it wasn't found.
    $facDate = "{$fac['day']} {$fac['month']} {$fac['year']}"; // The date string (dd mmm aaaa)

    foreach ($noDupes as $f => $facility) {
         if ($fac['facility_name'] == $facility['facility_name']) {
            // If the facility name was found we take the corresponding index (0, 1, 2, etc.).
            $facilityIndex = $f;

            foreach ($facility['dates'] as $d => $date) {
                if ($facDate == $date['date']) {
                    // If the date string was found we take the corresponding index (date1, date2, date3, etc.).
                    $dateIndex = $d;

                    foreach ($date['timeslots'] as $t => $timeslot) {
                        if ($fac['start_time'] == $timeslot['start_time'] && $fac['end_time'] == $timeslot['end_time']) {
                            // If the timeslot was found we take the corresponding index (timeslot1, timeslot2, timeslot3, etc.).
                            $timeslotIndex = $t;
                            break; // end timeslot loop
                        }
                    }

                    break; // end date loop
                }
            }

            break; // end facility loop
        }
    }

    if ($facilityIndex == -1) {
        // Take the new index for the date and timeslot if-statements
        $facilityIndex = count($noDupes);

        $noDupes[] = array(
            'facility_name' => $fac['facility_name'],
            'dates' => array()
        );
    }

    if ($dateIndex == '') {
        // Calculate the new index for the date (date1, date2, etc.)
        $dateNum = count($noDupes[$facilityIndex]['dates']) + 1;
        $dateIndex = "date{$dateNum}";

        $noDupes[$facilityIndex]['dates'][$dateIndex] = array(
            'date' => $facDate,
            'timeslots' => array()
        );
    }

    if ($timeslotIndex == '') {
        // Calculate the new index for the timeslot (timeslot1, timeslot2, etc.)
        $timeslotNum = count($noDupes[$facilityIndex]['dates'][$dateIndex]['timeslots']) + 1;
        $timeslotIndex = "timeslot{$timeslotNum}";

        $noDupes[$facilityIndex]['dates'][$dateIndex]['timeslots'][$timeslotIndex] = array(
            'start_time' => $fac['start_time'],
            'end_time' => $fac['end_time']
        );
    }
  }

  foreach ($noDupes as $facilities)
  {
    print_r($facilities["facility_name"]);
    // print_r($facilities["dates"]);
    foreach ($facilities["dates"] as $dates => $dateValues)
    {
      print_r($dateValues["date"]);
      foreach($dateValues["timeslots"] as $timeslots => $timeslotValues)
      {
        print "<br>";
        print_r($timeslotValues["start_time"]);
        print "<br>";
        print_r($timeslotValues["end_time"]);
        print "<br>";
      }
      print "<br>";
    }
    print "<br>";
  }
?>