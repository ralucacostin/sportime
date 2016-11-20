<?php

  require_once('config.inc.php');

  $mysqli = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

  if ($mysqli -> connect_error)
  {
	die('Connect Error (' .$mysqli -> connect_errno. ') '. $mysqli -> connect_error);
  }
?>