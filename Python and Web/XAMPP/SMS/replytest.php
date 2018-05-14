<?php
require_once('wikipedia.php');
require_once('googleMaps.php');
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
header("content-type: text/xml");
use Twilio\Twiml;
#Above is a bunch of useless shit


$output = "";


$body = $_POST['Body'];
$cmd = "";
$index = strpos($body," ");
$cmd = substr($body,1,$index-1);
$body = substr($body,$index+1);

if($cmd == "wikipedia"){
	$info = Wikipedia::search($body);
	$wiki = new Wikipedia($info);
	$output = "";
	$output .= $wiki->query();
}
else if($cmd == "gmaps"){
	$output = "\\n";
	$gmaps = new GoogleMaps($body);
	$output .= $gmaps->getHeader();
	$output .= $gmaps->getDirections();
	$output = substr($output,0,600);
}
else{
	$output = "Sorry I did not understand that, the command you entered is invalid";
}
$response = new Twiml();
$response->message(
	$output
);

echo $response;






function extractCommand($command){
	$index = strpos($command," ");
	$cmd = substr($command,2,$index-1);
	$body = substr($command,$index+1);
	
}