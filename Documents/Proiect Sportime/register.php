<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  
include "conectare.php";


$username=$_POST['username1'];
$password= $_POST['password1'];
$firstname = $_POST['firstname1'];
$secondname = $_POST['secondname1'];
$email=$_POST['email1'];
$mobile=$_POST['mobile1'];


// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo "Invalid email! Please try again!";
}
else
{
	$sql1="SELECT * FROM users WHERE username='$username'";
	$result = $mysqli->query($sql1);
	if(!$result->num_rows)
	{
		$sql2 = "INSERT INTO users(username, password, firstname, lastname, email, mobile) VALUES ('$username', '$password', '$firstname', '$secondname', '$email', '$mobile')";
		$result2 = $mysqli->query($sql2);
		if($result2) // Insert query
		{
			echo "You have successfully registered!";
		}
		else
		{
			echo "Error!";
		}
	}
	else
	{
		echo "This username is already registered! Please, try again!";
	}
}
?>