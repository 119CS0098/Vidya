<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
include_once 'dbh.php';

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACb441f37c6fc5694f4c4c85eb3cbe0f4c';
$auth_token = '485462fcf60cb3bd4dc586fbfea14183';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+12242880257";

$client = new Client($account_sid, $auth_token);

// $number = array("+918093737602", "+918093737602");
// $arrlength = count($number);

$query = 'SELECT * FROM student';

$result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($result)){
	   	$client->messages->create(
    // Where to send a text message (your cell phone?)
    		$row['pnumber'],
		    array(
		        'from' => $twilio_number,
		        'body' => 'Exam starts in 10mins. Instructions for test:...... Send ans in format (q_no <space> answer)'
		    )
		);
	}
	header("location:vidya_56a83a.webflow.io/vidya-56a83a.webflow.io/timer.php");

?>