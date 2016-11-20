<!doctype html>
<?php
session_start();

?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Sportime</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/get-shit-done.css" rel="stylesheet" />
        <link href="assets/css/demo.css" rel="stylesheet" />
        <link href="assets/css/login-register.css" rel="stylesheet" />
        <link href="assets/css/footer-menu.css" rel="stylesheet" />
        <link href="assets/css/sportime-aboutus.css" rel="stylesheet" />
        <!--     Font Awesome     -->
        <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="navbar-full">
            <div id="navbar">
                <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
                    <div class="alert alert-info">

                    </div>
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="sportime-loggedin.php">
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
                                            <a href="makereservation-loggedin.php">Make A Reservation</a>
                                        </li>
                                        <li>
                                            <a href="reservations-loggedin.php">View Reservations</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="active"><a href="aboutus-loggedin.php">About Us</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <?php
                                    session_start();
                                    if(!empty($_SESSION['login_user']))
                                    {
                                    require_once( 'config.inc.php');
                                    $mysqli = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);
                                    $sql1 = "SELECT firstname FROM users WHERE uid = \"". $_SESSION['login_user']."\"";

                                    $result1 = $mysqli -> query($sql1);
                                    $username = $result1 -> fetch_assoc();
                                    echo '<li class="active"><a href="#">Welcome, ' . $username["firstname"]. '!</a></li>';
                                    $mysqli->close();
                                    }
                                    else
                                        {header('Location: sportime.php');}
                                ?>
                                <li class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    Account
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu text-center" style="transform: translate(25%,0)">
                                        <li>
                                            <a href="editaccount.php">Manage your account</a>
                                        </li>
                                        <?php
                                            include "get_rank.php";
                                        ?>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="sportime-loggedout.php">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="blurred-container">
                    <div class="img-src" style="background-image: url('assets/img/header_img.jpg')"></div>
                </div>
                </div><!--  end navbar -->
            </div>
            <div class="main">
                <div class="container tim-container">
                    <div class="row text-center">
                        <h2>Who are we?</h2>
                        <div class="container">
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="assets/img/aboutus/alexandra.jpg" alt="Alexandra" class="img-circle img-responsive">
                                    <h3>Alexandra</h3>
                                    <p class="text-justify">1st Year Student
                                        Majored in Computer Science and Business Management at the University of Manchester.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="assets/img/aboutus/alice.jpg" alt="Alice" class="img-circle img-responsive">
                                    <h3>Alice</h3>
                                    <p class="text-justify">1st Year Student
                                        Majored in Computer Science and Business Management at the University of Manchester.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="assets/img/aboutus/raluca.jpg" alt="Raluca" class="img-circle img-responsive">
                                    <h3>Raluca</h3>
                                    <p class="text-justify">1st Year Student
                                        Majored in Computer Science and Business Management at the University of Manchester.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="assets/img/aboutus/alexey.jpg" alt="Alexey" class="img-circle img-responsive">
                                    <h3>Alexey</h3>
                                    <p class="text-justify">1st Year Student
                                        Majored in Computer Science and Business Management at the University of Manchester.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="assets/img/aboutus/eugene.jpg" alt="Eugene" class="img-circle img-responsive">
                                    <h3>Eugene</h3>
                                    <p class="text-justify">1st Year Student
                                        Majored in Computer Science and Business Management at the University of Manchester.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="assets/img/aboutus/iulian.jpg" alt="Iulian" class="img-circle img-responsive">
                                    <h3>Iulian</h3>
                                    <p class="text-justify">1st Year Student
                                        Majored in Computer Science and Business Management at the University of Manchester.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="footer">
                        <div class="overlayer">
                            <div class="container">
                                <div class="row support">
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="aboutus-loggedin.php"><button class="btn btn-primary btn-simple footer-menu" >About us</button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="makereservation-loggedin.php"><button class="btn btn-primary btn-simple footer-menu">Make reservation</button></a></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="reservations-loggedin.php"><button class="btn btn-primary btn-simple footer-menu">View reservations</button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="terms-loggeind.php"><button class="btn btn-primary btn-simple footer-menu">Terms and conditions</button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href=""><button class="btn btn-primary btn-simple footer-menu"></button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href=""><button class="btn btn-primary btn-simple footer-menu"></button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href=""><button class="btn btn-primary btn-simple footer-menu"></button></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="privacy-policy-loggedin.php"><button class="btn btn-primary btn-simple footer-menu">Privacy policy</button></a></li>
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
</html>