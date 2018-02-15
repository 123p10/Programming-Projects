<?php
	#if(isset($_POST["f"])){
		$input = $_GET["f"];
	#}
	$result = str_split($input);
	
	$w = 0;
	$l = 0;
	foreach($result as $i){
		if($i == "W"){
			$w++;
		}
		if($i == "L"){
			$l++;
		}
	}
	if($w == 5 || $w == 6){
		echo "1";
	}
	else if($w == 3 || $w == 4){
		echo "2";
	}
	else if($w == 1 || $w == 2){
		echo "3";
	}
	else if($w == 0){
		echo "-1";
	}
?>