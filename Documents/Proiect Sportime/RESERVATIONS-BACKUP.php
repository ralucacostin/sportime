<!doctype html>
<html lang="en">
<?php
  session_start();
  echo '<p id="user_id" hidden>'.$_SESSION['login_user'].'</p>';
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
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Sportime</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/get-shit-done.css" rel="stylesheet" />
        <link href="assets/css/demo.css" rel="stylesheet" />
        <link href="assets/css/login-register.css" rel="stylesheet" />
        <link href="assets/css/sportime-aboutus.css" rel="stylesheet" />
        <link href="assets/css/get-shit-done.css" rel="stylesheet" />
        <link href="assets/css/footer-menu.css" rel="stylesheet" />
        <link href="assets/css/viewreservations.css" rel="stylesheet" />
        <!--     Font Awesome     -->
        <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="navbar-full">
            <div id="navbar">
                <!--
                navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange
                -->
                <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
                    <div class="alert alert-info"><div class="container"></div></div>
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="sportime.html">
                                <img src="assets/img/logo.png" alt="Sportime" />
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    Reservations
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu text-center">
                                        <li>
                                            <a href="makereservation.html">Make A Reservation</a>
                                        </li>
                                        <li>
                                            <a href="reservations.html">View Reservations</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="active"><a href="aboutus.html">About Us</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    Account
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu text-center" style="transform: translate(25%,0)">
                                        <li>
                                            <a href="makereservation.html">Manage your account</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#top">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                    <div class="blurred-container">
                        <div class="img-src" style="background-image: url('assets/img/header_img.jpg')"></div>
                    </div>
                </div>
            </div>
                <div class="main">
                    <div class="body">
                    <div id="success-alert-index"></div>
                        <div class="container tim-container">
                            <div>
                                <h1 class="title">View Reservations</h1>
                            </div>

                            <div class="reservations">
                                <?php
                                    $count = 0;
                                    foreach ($noDupes as $facilities)
                                      {
                                        echo '<div class="col-sm-12 left-column">';
                                        echo '<h2 id="facility_name'.$count.'" class="facility-title">'.$facilities["facility_name"].'</h2>';
                                        echo '</div>';

                                        foreach ($facilities["dates"] as $dates => $dateValues)
                                        {
                                          echo '<div class="col-sm-3 left-column">';
                                          echo '<h4 id="facility_date'.$count.'" class="facility-title">'.$dateValues["date"].'</h4>';
                                          echo '</div>';

                                          echo '<div class="col-sm-9 right-column">';
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
                                        }
                                      }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="overlayer">
                            <div class="container">
                                <div class="row support">
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="aboutus.html"><button class="btn btn-primary btn-simple footer-menu" >About us</button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="makereservation.html"><button class="btn btn-primary btn-simple footer-menu">Make reservation</button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="reservations.html"><button class="btn btn-primary btn-simple footer-menu">View reservations</button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><button class="btn btn-primary btn-simple footer-menu" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="credits">
                                        &copy; 2016 Sportime, made with <i class="fa fa-heart heart" alt="love"></i> for sports.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--MODAL LOGIN FORM-->
                <div class="modal fade login" id="loginModal">
                    <div class="modal-dialog login animated">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Welcome!</h4>
                                <div class="content text-center"><h5>Use your University credentials</h5></div>
                            </div>
                            <div class="modal-body">
                                <div class="box">
                                    <div class="content">
                                        <div class="error"></div>
                                        <div class="form loginBox">
                                            <form method="post" action="/login" accept-charset="UTF-8">
                                                <input id="email" class="form-control" type="text" placeholder="University ID" name="id">
                                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                                <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="content registerBox" style="display:none;">
                                        <div class="form">
                                            <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                                <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--MODAL LOGIN FORM END -->
            </body>
            <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
            <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
            <script src="assets/js/gsdk-checkbox.js"></script>
            <script src="assets/js/gsdk-radio.js"></script>
            <script src="assets/js/gsdk-bootstrapswitch.js"></script>
            <script src="assets/js/get-shit-done.js"></script>
            <script src="assets/js/custom.js"></script>
            <script src="assets/js/login-register.js" type="text/javascript"></script>
            <script src="assets/js/delete-reservation.js"></script>
        </html>