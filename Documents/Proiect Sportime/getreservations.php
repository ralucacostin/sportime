  <?php
  session_start();
  include "conectare.php";
  $dbAdapter = $mysqli;

  function getReservations($userID) {
    global $dbAdapter;
    $sql1 = "SELECT `facility_name`, `day`, `month`, `year`, `start_time`, `end_time`
             FROM reservation_db
             WHERE user_id = $userID
             ORDER BY `facility_name` ASC, `year` ASC, case `month` when 'Jan' then 1 when 'Feb' then 2 when 'Mar' then 3 when 'Apr' then 4 when 'May' then 5 when 'Jun' then 6 when 'Jul' then 7 when 'Aug' then 8 when 'Sep' then 9 when 'Oct' then 10 when 'Nov' then 11 when 'Dec' then 12 end, `day` ASC, `start_time` ASC, `end_time` ASC";
    if (!$result1 = $dbAdapter -> query($sql1))
      die('Eroare'. $dbAdapter -> error);

    $facility_details = array();
    while ($row = mysqli_fetch_assoc($result1))
    {
      $facility_details[] = $row;
    }
    return $facility_details;
  }

  $facility_data = getReservations($_SESSION['login_user']);

$noDupes = array();

foreach ($facility_data as $fac) {
    $facilityIndex = -1;
    $dateIndex = '';
    $timeslotIndex = '';
    $facDate = "{$fac['day']} {$fac['month']} {$fac['year']}";

    foreach ($noDupes as $f => $facility) {
         if ($fac['facility_name'] == $facility['facility_name']) {
            $facilityIndex = $f;

            foreach ($facility['dates'] as $d => $date) {
                if ($facDate == $date['date']) {
                    $dateIndex = $d;

                    foreach ($date['timeslots'] as $t => $timeslot) {
                        if ($fac['start_time'] == $timeslot['start_time'] && $fac['end_time'] == $timeslot['end_time']) {
                            $timeslotIndex = $t;
                            break;
                        }
                    }
                    break;
                }
            }
            break;
        }
    }

    if ($facilityIndex == -1) {
        $facilityIndex = count($noDupes);

        $noDupes[] = array(
            'facility_name' => $fac['facility_name'],
            'dates' => array()
        );
    }

    if ($dateIndex == '') {
        $dateNum = count($noDupes[$facilityIndex]['dates']) + 1;
        $dateIndex = "date{$dateNum}";

        $noDupes[$facilityIndex]['dates'][$dateIndex] = array(
            'date' => $facDate,
            'timeslots' => array()
        );
    }

    if ($timeslotIndex == '') {
        $timeslotNum = count($noDupes[$facilityIndex]['dates'][$dateIndex]['timeslots']) + 1;
        $timeslotIndex = "timeslot{$timeslotNum}";

        $noDupes[$facilityIndex]['dates'][$dateIndex]['timeslots'][$timeslotIndex] = array(
            'start_time' => $fac['start_time'],
            'end_time' => $fac['end_time']
        );
    }
  }

    $count = 0;

    echo "<div>";
    echo '<h1 class="title">View Reservations</h1>';
    echo "</div>";
    echo '<div id="reservations">';

    foreach ($noDupes as $facilities)
      {
        echo '<div class="row">';
        echo '<div class="col-sm-12">';
        echo '<h2 id="facility_name'.$count.'" class="facility-title">'.$facilities["facility_name"].'</h2>';

        foreach ($facilities["dates"] as $dates => $dateValues)
        {
          echo '<div class="row">';
          echo '<div class="col-sm-6">';
          echo '<h4 id="facility_date'.$count.'" class="facility-date">'.$dateValues["date"].'</h4>';
          echo '</div>';

          echo '<div class="col-sm-6 right-column">';
          echo '<ul>';
          foreach($dateValues["timeslots"] as $timeslots => $timeslotValues)
          {
            echo '<p id="start_time'.$count.'" hidden>'.$timeslotValues["start_time"].'</p>';
            echo '<p id="end_time'.$count.'" hidden>'.$timeslotValues["end_time"].'</p>';

            echo '<li class="row time-slot text-align">';
            echo '<h4 class="display_inline">'.$timeslotValues["start_time"].':00 - '.$timeslotValues["end_time"].':00</h4><i id="delete'.$count.'" class="fa fa-trash-o"></i>';
            echo '</li>';
            $count++;
          }
          echo '</ul>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';
      }

      echo '</div>';
?>