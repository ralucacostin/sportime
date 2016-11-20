<?php
	include "conectare.php";

	$facility_name = $_POST['name'];
	$mysqli->query("DELETE FROM `facilities_db` WHERE facility_name = '$facility_name'");
	echo "1";
?>