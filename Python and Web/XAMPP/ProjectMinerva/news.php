<?php
$n = new news();
echo $n->trending("cbc-news");
class news{

	private $API_KEY = "3e83607434724b3a87c49bed7ea95899";
	function __construct(){
		
	}
	function trending($provider){
		$url = "https://newsapi.org/v2/top-headlines?sources=" . $provider . "&apiKey=" . $this->API_KEY;
		$url = str_replace(' ', '%20', $url);
		$json = file_get_contents($url);
		$data = json_decode($json);
		$output = $data->articles;
		#print_r($output);
		$out = "";
		foreach($output as $title){
			$out .= $title->title . "&#10;";
		}
		return $out;
		
	}
	
}

?>