<?php
	include "conectare.php";

	$facility_name = $_POST['facility_name'];
	$facility_day = $_POST['reservation_day'];
	$facility_month = $_POST['reservation_month'];
	$facility_year = $_POST['reservation_year'];

	$timeslots = array();

	$result = $mysqli->query("SELECT start_time FROM reservation_db WHERE facility_name = '$facility_name' AND day = '$facility_day' AND month = '$facility_month' AND year = '$facility_year' ORDER BY start_time ASC");

	while ($row = mysqli_fetch_assoc($result))
	{
		$timeslots[] = $row;
	}

	$timeslots = json_encode($timeslots, JSON_PRETTY_PRINT);
	print_r($timeslots);
?>