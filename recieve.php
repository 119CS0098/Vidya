<?php
require_once "vendor/autoload.php";
use Twilio\TwiML\MessagingResponse;
include_once 'dbh.php';

// Set the content-type to XML to send back TwiML from the PHP Helper Library
header("content-type: text/xml");

$body = $_POST['body'];
$number = $_POST['from'];

$arr = explode(" ", $body);

$qno = $arr[0];
$ans = $arr[1];

$query1 = "INSERT INTO answers VALUES ('$number','$qno','$ans')";

mysqli_query($conn,$query1);

$response = new MessagingResponse();
$response->message(
    "Answer recieved"
);

echo $response;