
<?php
require_once('googleMaps.php');
class Wikipedia{
	private $str;
	function __construct($s){
		$this->str = $s;
	}

	public function query(){
		//JSON request from wikipedia servers
		$url = 'http://en.wikipedia.org/w/api.php?action=query&prop=extracts|info&exintro&titles=' . $this->str . '&format=json&explaintext&redirects=1&inprop=url&indexpageids';
		$url = str_replace(' ', '%20', $url);
		$json = file_get_contents($url);
		$data = json_decode($json);
		//Get the basic summary
		$pageid = $data->query->pageids[0];
		$output = substr($data->query->pages->$pageid->extract,0,3000);

		return $output;

	}
	public static function search($string){
		//If there is disambiguations on wikipedia i.e article does not exist
		//Search on Wikipedia giving user options
		$url = "http://en.wikipedia.org/w/api.php?action=opensearch&search=". $string ."&limit=10&namespace=0&format=json";
		$url = str_replace(' ', '%20', $url);
		$json = file_get_contents($url);
		$data = json_decode($json);
		return $data[1][0];

	}
	public function getTitle(){
		$url = 'http://en.wikipedia.org/w/api.php?action=query&prop=extracts|info&exintro&titles=' . $this->str . '&format=json&explaintext&redirects=1&inprop=url&indexpageids';
		$url = str_replace(' ', '%20', $url);
		$json = file_get_contents($url);
		$data = json_decode($json);
		//Get the basic summary
		$pageid = $data->query->pageids[0];
		$title = substr($data->query->pages->$pageid->title,0,1300);
		return $title;
	}
	public function getTableOfContents(){
		$url = 'https://en.wikipedia.org/w/api.php?action=parse&format=json&prop=sections&page='. $this->str .'&redirects';
		$url = str_replace(' ', '%20', $url);
		$json = file_get_contents($url);
		$data = json_decode($json);
		//Get the basic summary
		$pageid = $data->parse->sections;
		$output = "<T>";
		foreach($pageid as $a){
			if($a->toclevel == 1){
		#		echo $a->anchor . "<br>";
				$output .= "/S" . $a->anchor . "/s";

			}
		}
		$output .= "</T>";
	//	$title = substr($data->query->pages->$pageid->title,0,1300);
		//return $title;
		return $output;
	}

}
