<?php
$fave = array(
"Tarj"=>"Potato",
"Alex"=>"Rice",
"Nik"=>"Apples",
"Daniel"=>"Grapes",
"Veer"=>"Apples"

);
$food = array();
$biggest = 0;
$biggestKey = "";
foreach($fave as $key=>$f){
	$food[$f] = 0;
}
foreach($fave as $key=>$f){
	$food[$f] += 1;
	if($food[$f] > $biggest){
		$biggest = $food[$f];
		$biggestKey = $f;
	}
}
echo "The most popular food is " . $biggestKey . " with " . $biggest . " people";
?>