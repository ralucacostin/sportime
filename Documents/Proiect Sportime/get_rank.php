<?php
	include "conectare.php";
	session_start();

  $uid = $_SESSION['login_user'];
  $rank = mysqli_fetch_assoc($mysqli->query("SELECT rank FROM users WHERE uid = $uid"));
  $rank = $rank['rank'];

  if ($rank == "admin")
  {
		echo "<li>";
			echo '<a href="management-loggedin.php">Management</a>';
		echo "</li>";
	}
?>