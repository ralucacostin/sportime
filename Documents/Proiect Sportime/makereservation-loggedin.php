<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Make reservation</title>
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
		<link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
		<link href="assets/css/get-shit-done.css" rel="stylesheet" />
		<link href="assets/css/demo.css" rel="stylesheet" />
		<link href="assets/css/login-register.css" rel="stylesheet" />
		<link href="assets/css/sportime-aboutus.css" rel="stylesheet" />
		<link href="assets/css/get-shit-done.css" rel="stylesheet" />
		<link href="assets/css/footer-menu.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="assets/css/facilities.css">
		<link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
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
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
									Reservations
									<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
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
									<ul class="dropdown-menu account text-center">
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
						</div><!-- /.navbar-collapse -->
					</nav>
					<div class="blurred-container">
						<div class="img-src" style="background-image: url('assets/img/header_img.jpg')"></div>
					</div>
					</div><!--  end navbar -->
				</div>
				<div class="main">
					<div class="container container-fluid facilities">
						<div class="row search">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<div class="input-group">
									<input id="search-box" type="text" class="form-control" placeholder="Search for a facility">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#filters">Filters</button>
										<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
									</span>
								</div>
								<div id="filters" class="row collapse">
									<div class="col-sm-4 text-center">
										<p class="filter-title">Activity:</p>
										<div class="checkbox">
											<label class="filter"><input id="footballCheck" type="checkbox">Football</label>
										</div>
										<div class="checkbox">
											<label class="filter"><input id="basketballCheck" type="checkbox">Basketball</label>
										</div>
										<div class="checkbox">
											<label class="filter"><input id="tennisCheck" type="checkbox">Tennis</label>
										</div>
									</div>
									<div class="col-sm-4 text-center">
										<p class="filter-title">Opening hours:</p>
										<div class="checkbox">
											<label class="filter"><input id="before10Check" type="checkbox">Before 10AM</label>
										</div>
									</div>
									<div class="col-sm-4 text-center">
										<p class="filter-title">Closing hours:</p>
										<div class="checkbox">
											<label class="filter"><input id="after9Check" type="checkbox">After 9PM</label>
										</div>
										<div class="checkbox">
											<label class="filter"><input id="after10Check" type="checkbox">After 10PM</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="col-sm-3">
							<div>
								<div class="row facility-menu facilities-header">

								</div>
								<div id="facilities-body" class="row facility-menu facilities-body">

								</div>
								<div class="row facility-menu facilities-footer">
									<p> Please select a facility</p>
								</div>
							</div>
						</div>
						<div class="col-sm-9">
						<br>
							<div class="row facility-title">
								<h2 id="facilityNameRight">Please select a facility</h2>
							</div>
							<div class="row facility-description">
								<h3 id="facilityDescription"></h3>
							</div>
							<form accept-charset="utf-8" class="form-horizontal">
								<div class="form-group form-group">
									<label class="col-sm-4 control-label" for="websiteInput">Website:</label>
									<div class="col-sm-6">
										<a id="websiteInputLink" href=""><input class="form-control" type="text" id="websiteInput" placeholder="http://www.johndoe.com" value=""readonly></a>
									</div>
								</div>
								<div class="form-group form-group">
									<label class="col-sm-4 control-label" for="activityInput">Main activity available:</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" id="activityInput" placeholder="Football" value="" readonly>
									</div>
								</div>
								<div class="form-group form-group">
									<label class="col-sm-4 control-label" for="openingInput">Opening hours:</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" id="openingInput" placeholder="08:00" value="" readonly>
									</div>
								</div>
								<div class="form-group form-group">
									<label class="col-sm-4 control-label" for="closingInput">Closing hours:</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" id="closingInput" placeholder="22:00" value="" readonly>
									</div>
								</div>
								<div class="form-group form-group">
									<label class="col-sm-4 control-label" for="addressInput">Address:</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" id="addressInput" placeholder="Oxford Rd" value="" readonly>
									</div>
								</div>
								<div class="form-group form-group">
									<label class="col-sm-4 control-label" for="postcodeInput">Post Code:</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" id="postcodeInput" placeholder="M13 0FZ" value="" readonly>
									</div>
								</div>
							</form>
<!-- 							<div id="mapContainer">
								<div id="map"></div>
							</div>
							<div id="text" class="row"></div> -->
							<div class="row facility-submit">
								<button id="reservationButton" type="submit" class="btn btn-default btn-lg btn-fill" data-toggle="modal" data-target="#reservationModal">Make reservation</button>
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
				<!-- RESERVATION MODAL -->
				<div id="reservationModal" class="modal fade" role="dialog">
					<div class="modal-dialog modal-lg">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Make reservation</h4>
							</div>
							<div class="modal-body">
								<div class="col-sm-3 left-column text-center">
									<h4 id="facility-title" class="facility-title"></h4>
									<form action="" method="get" accept-charset="utf-8">
										<input id="date" type="date" name="Date" value="">
									</form>
								</div>
								<div class="col-sm-9 right-column">
									<div class="row facility-title">
										<h3>Available time slots</h3>
									</div>
									<div>
									<ul id="timeslots"></ul>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button id="create_reservation" type="button" class="btn btn-default btn-fill" data-toggle="modal" data-target="#detailsModal">Next</button>
						</div>
					</div>
				</div>
			</div>
			<!-- RESERVATION MODAL END -->
			<!-- DETAILS MODAL -->
			<div id="detailsModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Review details</h4>
						</div>
						<?php
						  include "conectare.php";
						  session_start();
						  echo '<p id="user_id" hidden>'.$_SESSION['login_user'].'</p>';
						  $sql = "SELECT * FROM users WHERE uid = \"". $_SESSION['login_user']."\"";
						  $user_array = array();
						  $result = $mysqli->query($sql);
						  $row = mysqli_fetch_assoc($result);

						?>
						<div class="modal-body">
							<div id="updateAlertSuccess2" class="alert alert-success text-center" hidden></div>
							<form action="makereservation-loggedin_submit" method="get" accept-charset="utf-8" class="form-horizontal">
								<h4 class="text-align">Please verify the following details before submitting the reservation</h4>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 control-label" for="firstname">First Name:</label>
									<div class="col-sm-10">
										<input class="form-control" value="<?php echo $row['firstname'] ?>" type="text" id="firstname" placeholder="Xulescu Bix">
									</div>
								</div>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 control-label" for="secondname">Last Name:</label>
									<div class="col-sm-10">
										<input class="form-control" value="<?php echo $row['lastname']; ?>" type="text" id="secondname" placeholder="Xulescu Bix">
									</div>
								</div>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 control-label" for="email">E-mail:</label>
									<div class="col-sm-10">
										<input class="form-control" value="<?php echo $row['email']; ?>" type="text" id="email" placeholder="asdf@yahoo.com">
									</div>
								</div>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 control-label" for="mobile">Mobile:</label>
									<div class="col-sm-10">
										<input class="form-control" value="<?php echo $row['mobile']; ?>" type="text" id="mobile" placeholder="+447521 xxx xxx">
									</div>
								</div>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 control-label" for="fac_name_modal">Facility:</label>
									<div class="col-sm-10">
										<input class="form-control disabled-input" type="text" id="fac_name_modal" value="" disabled>
									</div>
								</div>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 control-label" for="timeslot_modal">Time Slot:</label>
									<div class="col-sm-10">
										<input class="form-control disabled-input" type="text" id="timeslot_modal" value="" disabled>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-default btn-fill" data-toggle="modal" name ="edit" id = "edit">Change details</button>
						</div>
					</div>
				</div>
			</div>
			<!-- DETAILS MODAL END -->
		</body>
		<script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
		<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
		<script src="assets/js/gsdk-checkbox.js"></script>
		<script src="assets/js/gsdk-radio.js"></script>
		<script src="assets/js/gsdk-bootstrapswitch.js"></script>
		<script src="assets/js/get-shit-done.js"></script>
		<script src="assets/js/login-register.js" type="text/javascript"></script>
		<script src="assets/js/jquery.mCustomScrollbar.js"></script>
		<script src="assets/js/facilities.js"></script>
		<script src="reservationedit.js"></script>
		<script src="assets/js/fuse.js"></script>
<!-- 		<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLlfrLcQhWRN9TmjZbRceQ6cPmaJvV8uM&callback=initMap" sync defer></script> -->
		<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLlfrLcQhWRN9TmjZbRceQ6cPmaJvV8uM"></script>
		<script src="assets/js/map.js"></script> -->
	</html>