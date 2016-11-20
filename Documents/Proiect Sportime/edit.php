<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  
include "conectare.php";

session_start();

$username=$_POST['username1'];
$password= $_POST['password1'];
$firstname = $_POST['firstname1'];
$secondname = $_POST['secondname1'];
$email=$_POST['email1'];
$mobile=$_POST['mobile1'];
$university=$_POST['university1'];	
$address=$_POST['address1'];
$town=$_POST['town1'];
$aboutme=$_POST['aboutme1'];



// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo "Invalid email! Please try again!";
}
else
{

		$sql2 = "UPDATE users SET username = '$username', password = '$password', email = '$email', firstname = '$firstname', lastname = '$secondname', mobile = '$mobile', university = '$university', address = '$address', town = '$town', aboutme = '$aboutme' WHERE uid = \"". $_SESSION['login_user']."\"";
		$result2 = $mysqli->query($sql2);
		if($result2) // Insert query
		{
			echo "You have successfully edited your account!";
		}
		else
		{
			echo "Error!";
		}
}
?>