<!doctype html>
<?php
session_start();
if(!empty($_SESSION['login_user']))
{
header('Location: aboutus.php');
}
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
                <!--
                navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange
                -->
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
                            <a class="navbar-brand" href="sportime.php">
                                <img src="assets/img/logo.png" alt="Sportime" />
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <!--LOGGED OUT MENU-->
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="aboutus.php">About Us</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><button class="btn btn-default" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</button></li>
                            </ul>
                            </div><!-- /.navbar-collapse -->
                            <!--LOGGED IN MENU
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
                                <li class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    Teams
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu text-center" style="transform: translate(-20%,0)">
                                        <li>
                                            <a href="createteam.html">Create A Team</a>
                                        </li>
                                        <li>
                                            <a href="manageteams.html">Manage Your Teams</a>
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
                        </div>
                        -->
                        </div><!-- /.container-fluid -->
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
                    <div class="footer">
                        <div class="overlayer">
                            <div class="container">
                                <div class="row support">
                                    <div class="col-sm-3 footer-column">
                                        <ul>
                                            <li><a href="aboutus.php"><button class="btn btn-primary btn-simple footer-menu" >About us</button></a></li>
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
                                            <li><a href="terms.html"><button class="btn btn-primary btn-simple footer-menu">Terms and conditions</button></a></li>
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
                                            <li><a href="privacy-policy.html"><button class="btn btn-primary btn-simple footer-menu">Privacy policy</button></a></li>
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
                                <div class="content text-center"><h5>Use your credentials</h5></div>
                            </div>
                            <div class="modal-body">
                                <div class="box">
                                    <div class="content">
                                        <div class="error"></div>
                                        <div class="form loginBox">
                                            <form method="post" action="/login" accept-charset="UTF-8">
                                                <input id="email2" class="form-control" type="text" placeholder="Username" name="id">
                                                <input id="password2" class="form-control" type="password" placeholder="Password" name="password">
                                                <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                                <p>You don't have an account yet? <a href="registration.php">Register</a></p>
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
        </html>