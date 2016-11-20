<?php
	include "conectare.php";

	$user_id = $_POST['user_id'];
	$facility_name = $_POST['facility_name'];
	$reservation_day = $_POST['reservation_day'];
	$reservation_month = $_POST['reservation_month'];
	$reservation_year = $_POST['reservation_year'];
	$reservation_start = $_POST['reservation_start'];
	$reservation_end = $_POST['reservation_end'];

	$insert_reservation = "INSERT INTO `reservation_db`( `user_id`, `facility_name`, `day`, `month`, `year`, `start_time`, `end_time`) VALUES ('$user_id','$facility_name','$reservation_day','$reservation_month','$reservation_year','$reservation_start','$reservation_end')";

	$mysqli->query($insert_reservation);
?>