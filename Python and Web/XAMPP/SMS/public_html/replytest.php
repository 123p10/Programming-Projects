<?php
require_once('wikipedia.php');
require_once('news.php');
require_once('googleMaps.php');
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
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









$output = "&#10;";
$body = $_POST['Body'];
$cmd = "";


$spot = (stripos($body, "eve")+4);



//All this gets the command extracted
$gosh = substr($body,0,$spot);

$body = str_replace($gosh,"",$body);

$index = strpos($body," ");

$cmd = substr($body,0,$index);

$body = substr($body,$index+1);

//Check which command was used
if(strcasecmp($cmd, 'wiki') == 0){
	$info = Wikipedia::search($body);
	$wiki = new Wikipedia($info);
	$output .= $wiki->query();
}
else if(strcasecmp($cmd, 'directions')==0){
	$gmaps = new GoogleMaps($body);
	$output .= $gmaps->getHeader();
	$output .= $gmaps->getDirections();
}
else if(strcasecmp($cmd,'news') == 0){
	$news = new news($body);
	$output .= $news->trending();
}

else if(strcasecmp($cmd, 'weather') == 0){
	$output .= "We are still working on this update!";
}

//Easter eggs beyond this point
else if(strcasecmp($cmd, 'creator') == 0){
	$output .= "&#10;". "This was created by 4 highschool students from Port Credit Secondary School". "&#10;". "Created by, Owen Brake, Tarj Tandel, Alex Shehdula and Veer Khurana";
}

else if(strcasecmp($cmd, 'hack') == 0){
	$output .= "&#10;". "deFiNe a hAcK?";
}

else if(strcasecmp($cmd, 'whatAreyou') == 0){
	$output .= " :)" . "&#10;" . "I am Eve. I am your personal offline assistant. You can ask me questions without the use of data, and I will respond! Currently you can ask me questions such as, 'what is the news?', or directions from 2 locations. In the future I will be able to become more personal as I will expand my knowledge about you. Very shortly you will be able to ask more comlicated questions.";
}

else if(strcasecmp($cmd, 'help') == 0){
	$output .= "Certain promts you can use are:&#10;News (BBC or CBC) &#10;Directions (First Location, Second Location) &#10;Wikipedia (article name) &#10;Weather (Location) &#10; ";

}

else if(strcasecmp($cmd, 'Giovanni') == 0){
	$output .= "&#10;". "MARTINNNNNNNNNNNNNNNNNN!";
}

else if(strcasecmp($cmd, 'Nav') == 0){
	$output .= "Lately I dont wanna sleep". "&#10;";
	$output .= "'Cause my life feels better than my dreams";
}
//Easter eggs are done
//If command does not exist throw error
else{
	$output = "Sorry I did not understand that, the command you entered is invalid";
}



//BEFORE OUTPUTTING CUT TO <1600 characters we will say 1400 because Twilio has watermark
#	$output = replaceNewLine($output);
	$output = substr($output,0,1400);



//Send Response
$response = new Twiml();
$response->message(
	$output
);

echo $response;




//Get the command and body out of the input
function extractCommand($command){
	$index = strpos($command," ");
	$cmd = substr($command,2,$index-1);
	$body = substr($command,$index+1);

}
