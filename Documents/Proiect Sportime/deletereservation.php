<?php
	include "conectare.php";
	$user_id = $_POST['uid'];
	$facility_name = $_POST['f_name'];
	$day = $_POST['r_day'];
	$month = $_POST['r_month'];
	$year = $_POST['r_year'];
	$start_time = $_POST['r_start_time'];
	$end_time = $_POST['r_end_time'];

	$delete = "DELETE FROM `reservation_db` WHERE user_id = '$user_id' AND facility_name = '$facility_name' AND day = '$day' AND month = '$month' AND year = '$year' AND start_time = '$start_time' AND end_time = '$end_time'";

	$mysqli->query($delete);
?>