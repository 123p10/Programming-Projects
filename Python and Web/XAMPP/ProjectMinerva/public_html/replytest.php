<?php
require_once('wikipedia.php');
require_once('googleMaps.php');
header("content-type: text/xml");
use Twilio\Twiml;
//Put all classes above and external apis


/*
Also Put these in-line in the classes

TODO:
Format Google Maps better
Make Driver Class OOP
Get Whiteboard
*/


/*
Formatting Rules
1.A new line indicator is automatically added at start of the output
2. For formatting I simplified it so use \n character whenever to create a new line
	I have a function which will replace the new line character with the actual new line
	character &#10;
3. Formatting will look differently on each phone, thats just gonna happen don't worry too much
	about it it just has to be legible
4. All formatting should be done in the classes, this is the driver file, I will be 99.999% probably
	changing this file to become OOP(Object Oriented Programming)
5. Comment alot and keep the code neat, they will be checking the code

*/









$output = "&#10;\n";
$body = $_POST['Body'];
$cmd = "";
$index = strpos($body," ");
$cmd = substr($body,1,$index-1);
$body = substr($body,$index+1);

if($cmd == "wikipedia"){
	$info = Wikipedia::search($body);
	$wiki = new Wikipedia($info);
	$output .= $wiki->query();
}
else if($cmd == "gmaps"){
	$gmaps = new GoogleMaps($body);
	$output .= $gmaps->getHeader();
	$output .= $gmaps->getDirections();
}
else{
	$output = "Sorry I did not understand that, the command you entered is invalid";
}
//BEFORE OUTPUTTING CUT TO <1600 characters we will say 1400 because Twilio has watermark
	$output = replaceNewLine($output);
	$output = substr($output,0,1400);



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
function replaceNewLine($in){
	$out = str_replace("\n","&#10;",$in);
	return $out;
}
