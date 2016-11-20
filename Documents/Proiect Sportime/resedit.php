<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  
include "conectare.php";

session_start();

$firstname = $_POST['firstname1'];
$secondname = $_POST['secondname1'];
$email = $_POST['email1'];
$mobile=$_POST['mobile1'];

$sql2 = "UPDATE users SET firstname = '$firstname', lastname = '$secondname', mobile = '$mobile', email = '$email' WHERE uid = \"". $_SESSION['login_user']."\"";
$result2 = $mysqli->query($sql2);
if($result2) // Insert query
{
	echo "You have successfully edited your account!";
}
else
{
	echo "Error!";
}

?>