<?php
$marks = array(
"Veer"=>[90,98,92,80,99],
"Paul"=>[90,87,80,85,90],
"Tarj"=>[84,93,82,94,93],
"Owen"=>[79,82,70,85,92],
"Alex"=>[84,80,75,32,84],
"Josh"=>[78,80,83,94,83]
);
$sum = 0;
$studentmean = array();
foreach($marks as $key=>$arr){
	$mean = 0;
	foreach($arr as $k=>$val){
		$mean += $val;
	}
	$mean /= count($arr);
	$studentmean[$key] = $mean;  
}
$lowestMark = 101;
$lowestKey = "";
$highestMark = 0;
$highestKey = "";
foreach($studentmean as $key=>$mark){
	echo $key . "'s average is " . $mark . "%<br>";
	$sum += $mark;
	if($mark < $lowestMark){
		$lowestMark = $mark;
		$lowestKey = $key;
	}
	if($mark > $highestMark){
		$highestMark = $mark;
		$highestKey = $key;
	}
}
$sum /= count($studentmean);
echo "The total class average is " . $sum . "%<br>";
echo $lowestKey . " has the lowest mark at " . $lowestMark . "%<br>";
echo $highestKey . " has the highest mark at " . $highestMark . "%<br>";?>