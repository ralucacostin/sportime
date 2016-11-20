<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Sportime</title>
        <link rel  ="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <link href ="bootstrap3/css/bootstrap.css" rel="stylesheet" />
        <link href ="assets/css/get-shit-done.css" rel="stylesheet" />
        <link href ="assets/css/demo.css" rel="stylesheet" />
        <link href ="assets/css/login-register.css" rel="stylesheet" />
        <link href ="assets/css/footer-menu.css" rel="stylesheet" />
        <!--     Font Awesome     -->
        <link href ="bootstrap3/css/font-awesome.css" rel="stylesheet">
        <link href ='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
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
                            <a class="navbar-brand" href="sportime.html">
                                <img src="assets/img/logo.png" alt="Sportime" />
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="aboutus.php">About Us</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><button class="btn btn-default" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</button></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                            <?php
                            session_start();
                            session_unset($_SESSION['login_user']);
                            echo '<li class="active"><a href="#">You have been logged out successfully!</a></li>';
                            ?>
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
                        <div class="row tim-row">
                            <div class="col-md-3 col-md-offset-1">
                                <h3>What is Sportime?</h3>
                            </div>
                            <div class="col-md-7">
                                <p class="text-justify">
                                    Sportime is a web application that allows people to make reservations on sport facilities in Manchester at a more efficient and less time-consuming way.
                                </p>
                            </div>
                        </div>
                        <div class="row tim-row">
                            <div class="col-md-3 col-md-offset-1">
                                <h3>How it works</h3>
                            </div>
                            <div class="col-md-7">
                                <p class="text-justify">
                                    Sportime contains a list of facilities in Manchester. People will have to log in or to create an account to access the reservation page. Then they will chose the facility they would like to make a reservation, pick a date, a time and complete their details and the reservation will be made.
                                </p>
                            </div>
                        </div>
                        <div class="row tim-row">
                            <div class="col-md-3 col-md-offset-1">
                                <h3>Facilities</h3>
                            </div>
                            <div class="col-md-7">
                                <p class="text-justify">
                                    Sportime focuses on the facilities that are in situated in Manchester. This is because it is considerably closer for the students who study in Manchester. The facilities we show have a range of different activities and facilities that one can choose from. This is essentially to create a variety of facilities that are available. This also encourages the students to try out new sports. The activities in the facilities range from the popular football, basketball, and tennis to the Zumba, squash and yoga. 
                                </p>
                            </div>
                        </div>
                    </div>
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
                                <h4 class="modal-title">Login</h4>
                                <div class="content text-center"><h5>Use your University credentials</h5></div>
                            </div>
                            <div class="modal-body">
                                <div class="box">
                                    <div class="content">
                                        <div class="error"></div>
                                        <div class="form loginBox">
                                            <form method="post" action="" accept-charset="UTF-8">
                                                <input id="email2" class="form-control" type="text" placeholder="University ID" name="id">
                                                <input id="password2" class="form-control" type="password" placeholder="Password" name="password">
                                                <input class="btn btn-default btn-login" type="submit" value="Login">
                                                <p>You don't have an account yet? <a href="registration.php">Register</a></p>
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