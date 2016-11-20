<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once( "conectare.php");
session_start();

if(isset($_POST['username']) && isset($_POST['password']))
{
// username and password sent from Form
$username=$_POST['username']; 
//Here converting passsword into MD5 encryption. 
$password=$_POST['password']; 

$result=$mysqli->query("SELECT uid FROM users WHERE username='${username}' and password='${password}'");
$rowcount=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
// // If result matched $username and $password, table row  must be 1 row
// var_dump($row);
if($rowcount==1)
{
$_SESSION['login_user']=$row['uid']; //Storing user session value.
echo $row['uid'];
}

}
?>