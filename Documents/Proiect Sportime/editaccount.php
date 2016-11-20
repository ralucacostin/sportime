<!doctype html>
<?php
  include "conectare.php";
  session_start();
  $sql = "SELECT * FROM users WHERE uid = \"". $_SESSION['login_user']."\"";
  $user_array = array();
  $result = $mysqli->query($sql);
  $row = mysqli_fetch_assoc($result);

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
        <link rel="stylesheet" type="text/css" href="assets/css/facilities.css">
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
                            <a class="navbar-brand" href="sportime-loggedin.php">
                                <img src="assets/img/logo.png" alt="Sportime" />
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <!-- LOGGED OUT MENU
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="aboutus.html">About Us</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><button class="btn btn-default" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</button></li>
                            </ul>
                            </div> -->
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
                            <h2>Edit account</h2>
                            <div class="container">
                                <div class="form">
                                    <form method="post" accept-charset="utf-8" class="form-horizontal" action = "">
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="username">Username:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['username']; ?>" type="text" id="username" placeholder="john.doe">
                                            </div>
                                            <div class="col-sm-4"></div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="password">Password:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['password']; ?>" type="password" id="password" placeholder="Password">
                                                <div class="col-sm-4"></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="firstname">First Name:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['firstname']; ?>" type="text" id="firstname" placeholder="John">
                                            </div>
                                            <div class="col-sm-4"></div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="secondname">Last Name:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['lastname']; ?>" type="text" id="secondname" placeholder="Doe">
                                            </div>
                                            <div class="col-sm-4"></div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="email">E-mail:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['email']; ?>" type="text" id="email" placeholder="johndoe@sportime.net">
                                                <div class="col-sm-4"></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="mobile">Mobile:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['mobile']; ?>" type="text" id="mobile" placeholder="0712321312312">
                                                <div class="col-sm-4"></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="university">University:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['university']; ?>" type="text" id="university" placeholder="The University of Manchester">
                                                <div class="col-sm-4"></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="address">Address:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['address']; ?>" type="text" id="address" placeholder="Oxford Rd">
                                                <div class="col-sm-4"></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="town">Town:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['town']; ?>" type="text" id="town" placeholder="Manchester">
                                                <div class="col-sm-4"></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="col-sm-4 control-label" for="aboutme">About Me:</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" value="<?php echo $row['aboutme']; ?>" type="text" id="aboutme" placeholder="Computer Science student">
                                                <div class="col-sm-4"></div>
                                            </div>
                                        </div>
                                        <input class="btn btn-default btn-lg btn-fill" type="submit" value="Edit account" name="edit" id="edit">
                                    </form>
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
            <script src="editaccount.js" type="text/javascript"></script>
        </html>