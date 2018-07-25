<?php
#$gmap = new GoogleMaps("365 Orano Ave Mississauga,70 Mineola Rd. Mississauga");
#echo $gmap->getHeader();

#echo $gmap->getDirections();
class GoogleMaps{
	//This is the google maps API KEY
	private $APIKEY = "AIzaSyBl7-D9TPPYlnvmdElOIh6pBDAkV6GPC4k";
	//DO NOT CHANGE THIS ^^^^
	private $loc1 = "";
	private $loc2 = "";
	function __construct($input){
		$this->decode($input);
	}
	
	function decode($s){
		$index = strpos($s,",");
		$loc1 = substr($s,0,$index);
		$loc2 = substr($s,$index + 1);
		$loc1 = str_replace(' ', '+', $loc1);
		$loc2 = str_replace(' ', '+', $loc2);

		$this->loc1 = $loc1;
		$this->loc2 = $loc2;
	}
	public function getDirections(){
		$output = "";
		$first = $this->loc1;
		$second = $this->loc2;
		$url = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $first . "&destination=" . $second . "&key=" . $this->APIKEY;
		$json = file_get_contents($url);
		$data = json_decode($json);
		$route = $data->routes[0]->legs[0]->steps;
		foreach($route as $data){
			$output .= " " . strip_tags($data->html_instructions) . " \n ";
		} 
		return $output;
	}
	public function getHeader(){
		$output = "";
		$first = $this->loc1;
		$second = $this->loc2;
		$url = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $first . "&destination=" . $second . "&key=" . $this->APIKEY;
		$json = file_get_contents($url);
		$data = json_decode($json);
		$route = $data->routes[0]->legs[0];
		$output .= $route->start_address . " -> " .  $route->end_address . "\n";
		$output .= "This will take a total of " . $route->distance->text . " and driving will take " . $route->duration->text . "\n";
		return $output;

	}
}