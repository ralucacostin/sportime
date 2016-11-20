<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require('/assets/twilio/Services/Twilio.php');

$name = $_POST['name'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$start = $_POST['start'];
$end = $_POST['end'];

$account_sid = 'ACbbfcdfdbba564cb68f87ce7a7b9a4265';
$auth_token = '4c90c65a27124463b69db7dad3eac901';
$client = new Services_Twilio($account_sid, $auth_token);

$client->account->messages->create(array(
	'To' => "+447521702600",
	'From' => "+447481340927",
	'Body' => "Your reservation for $name on $day $month $year from $start:00 to $end:00 has been successfully created!",
));

echo $message->sid;
?>