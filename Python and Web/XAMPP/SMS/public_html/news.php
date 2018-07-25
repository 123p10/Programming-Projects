<?php
class news{
	private $provider = "";
	//NEWS JSON API KEY DO NOT DELETE
	private $API_KEY = "3e83607434724b3a87c49bed7ea95899";
	function __construct($prov){
		//Check if provider is specifed, else just simple google news
		if(strcasecmp($prov,'cbc') == 0){
			$this->provider = "cbc-news";
		}
		else if(strcasecmp($prov,'bbc') == 0){
			$this->provider = "bbc-news";
		}
		else{$this->provider = "google-news-ca";}
	}
	function trending(){
		
		$url = "https://newsapi.org/v2/top-headlines?sources=" . $this->provider . "&apiKey=" . $this->API_KEY;
		$url = str_replace(' ', '%20', $url);
		$json = file_get_contents($url);
		$data = json_decode($json);
		$output = $data->articles;
		$out = "";
		foreach($output as $title){
			$out .= $title->title . "&#10;" . "&#10;";
		}
		return $out;
		
	}
	
}

?>