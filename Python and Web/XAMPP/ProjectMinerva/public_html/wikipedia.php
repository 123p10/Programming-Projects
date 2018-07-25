
<?php
require_once('googleMaps.php');

class Wikipedia{
	private $str;
	function __construct($s){
		$this->str = $s;
	}

	public function query(){
		$url = 'http://en.wikipedia.org/w/api.php?action=query&prop=extracts|info&exintro&titles=' . $this->str . '&format=json&explaintext&redirects&inprop=url&indexpageids';
		$url = str_replace(' ', '%20', $url);
		$json = file_get_contents($url);
		$data = json_decode($json);

		$pageid = $data->query->pageids[0];
		$output = substr($data->query->pages->$pageid->extract,0,1000);

		return $output;

	}
	public static function search($string){
		$url = "http://en.wikipedia.org/w/api.php?action=opensearch&search=". $string ."&limit=10&namespace=0&format=json";
		$url = str_replace(' ', '%20', $url);
		$json = file_get_contents($url);
		$data = json_decode($json);
		return $data[1][0];
		
	}

}
