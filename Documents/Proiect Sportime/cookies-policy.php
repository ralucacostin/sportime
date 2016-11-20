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
                        <h2>Cookie policy</h2>
                    </div>
                    <div class="container">
                            <p>
                                <h3>1. Introduction</h3>
                                1.1 Our website uses cookies. <br><br>
                                1.2 We use cookies to give you the best user experience on our website.By continuing to use the website we will assume you consent to receive all cookies on the Sportime.
                                <br>
                                <h3>2. About Cookies</h3>
                                2.1 Cookies are usually small text files, given ID tags that are stored on your computer's browser directory or program data subfolders. Cookies are created when you use your browser to visit a website that uses cookies to keep track of your movements within the site, help you resume where you left off, remember your registered login, theme selection, preferences, and other customization functions. <br><br>
                                2.2 There cookie may be: <br>
                                - Persistent - This cookie is stored by a web browser and will remain valid until its set expiry date, unless deleted by the user before the expiry date. <br>
                                - Session - This cookie will expire at the end of the user session, when the web browser is closed. <br><br>
                                2.3 Person information stored about you may be linked to the information stored in and obtained from cookies. The information, however, does not personally identify a user. <br><br>
                                2.4 Cookies may be used by web servers to identify and track users as they navigate different pages on a website and identify users returning to a website.<br>
                                <h3>3. Our Cookies</h3>
                                3.1 We use sessions cookies on our website. <br><br>
                                3.2 The name of the cookies that we use on our website, and the purposes for which the are used, are set out below: <br>
                                - We use session cookies to enable the website you are visiting to keep track of your movement from page to page so that you don’t get asked for the same information you’ve already given to the site.
                                <h3>4. Blocking cookies</h3>
                                4.1 Most browsers allow you to refuse to accept cookies,for example:<br><br>
                                a)  In Internet Explorer (version 11) you can block cookies using the cookie handling override settings available by clicking "Tools", "Internet Options", "Privacy" and then “Advanced". <br>
                                b)  In Firefox (version 44) you can block all cookies by clicking "Tools", "Options", "Privacy", selecting "Use custom settings for history" from the drop-down menu, and unticking "Accept cookies from sites”. <br>
                                c)  In Chrome (version 48), you can block all cookies by accessing the "Customize and control" menu, and clicking "Settings", "Show advanced settings" and "Content settings", and then selecting "Block sites from setting any data" under the "Cookies" heading. <br><br>
                                4.2 Blocking all cookies will have a negative impact upon the usability of many websites.
                            </p>
                            <br>
                        </div>
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