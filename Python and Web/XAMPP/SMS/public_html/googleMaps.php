<?php
class GoogleMaps{
	//This is the google maps API KEY
#	private $APIKEY = "AIzaSyBl7-D9TPPYlnvmdElOIh6pBDAkV6GPC4k";
#	private $APIKEY = "AIzaSyCz03ney0IlkV6nQRkhdrcBPkDZWEl_xys";
	private $APIKEY = "llsCyJOoonmBNiJwteZ8IBRFnQCrlIJn";
	//DO NOT CHANGE THIS ^^^^
	private $loc1 = "";
	private $loc2 = "";
	function __construct($input){
		$this->decode($input);
	}

	function decode($s){

		#Break up and get both locations, break at the comma
		$index = strpos($s,"*");
		$loc1 = substr($s,0,$index);
		$loc2 = substr($s,$index + 1);
		$loc1 = str_replace(' ', '+', $loc1);
		$loc2 = str_replace(' ', '+', $loc2);

		$this->loc1 = $loc1;
		$this->loc2 = $loc2;
	}
	public function getHeader(){
		$query = "https://www.mapquestapi.com/directions/v2/route?key=" . $this->APIKEY . "&from=". $this->loc1 ."&to=" . $this->loc2 . "&outFormat=json&ambiguities=ignore&routeType=fastest&doReverseGeocode=false&enhancedNarrative=false&avoidTimedConditions=false";
		$json = file_get_contents($query);
		$data = json_decode($json);
		$route = $data->route;
		$output = "&#10;". "&#10;". $route->locations[0]->street . " to " .  $route->locations[1]->street . "&#10;";
		return $output;
	}
	public function getDirections(){
		$query = "https://www.mapquestapi.com/directions/v2/route?key=" . $this->APIKEY . "&from=". $this->loc1 ."&to=" . $this->loc2 . "&outFormat=json&ambiguities=ignore&routeType=fastest&doReverseGeocode=false&enhancedNarrative=false&avoidTimedConditions=false";
		$json = file_get_contents($query);
		$data = json_decode($json);
		$route = $data->route->legs[0];
		$output="";
		#print_r($route);
		#echo $query;
		foreach($route->maneuvers as $data){
			$output .= "/D" . strip_tags($data->narrative) . "/d";
		}
		$y = str_replace("Turn left", "Left", $output);
		$x = str_replace("Turn right", "Right", $y);
		$z = str_replace("Destination will be on", "&#10; Destination on", $x);
		$w = str_replace("Continue to follow", "&#10; Follow", $z);

		return $w;
	}



/* GMAPS
	public function getDirections(){

		$output = "";
		$first = $this->loc1;
		$second = $this->loc2;
		//JSON request from google maps
		$url = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $first . "&destination=" . $second . "&key=" . $this->APIKEY;
		$json = file_get_contents($url);
		$data = json_decode($json);
		//Extract the Directions
		$route = $data->routes[0]->legs[0]->steps;

		//Simplify route directions to be more space and speed efficent
		foreach($route as $data){
			$output .= strip_tags($data->html_instructions) . " &#10; ";
			$y = str_replace("Turn left", "<-", $output);
			$x = str_replace("Turn right", "->", $y);
			$z = str_replace("Destination will be on", "&#10; Destination will be on", $x);
			$w = str_replace("Continue to follow", "&#10; Continue to follow", $z);
		}
		return $w;
	}

	public function getHeader(){
		$output = "";
		$first = $this->loc1;
		$second = $this->loc2;
		//JSON Request from google maps
		$url = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $first . "&destination=" . $second . "&key=" . $this->APIKEY;
		$json = file_get_contents($url);
		$data = json_decode($json);
		//Get the Basic Information/Data
		$route = $data->routes[0]->legs[0];
		//Show the two locations
		$output .= "&#10;". "&#10;". $route->start_address . " to " .  $route->end_address . "&#10;";
		//Show distance and estimated time
		$output .= "This will take a total of " . $route->distance->text . " and driving will take " . $route->duration->text . "&#10;";
		$output .= $url;
		return $output;

	}*/

}
