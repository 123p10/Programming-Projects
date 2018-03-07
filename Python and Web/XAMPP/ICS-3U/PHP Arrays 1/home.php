<?php
$numbers = array(3,6,7,9,10);
$t = 0;
foreach($numbers as $i){
	$t += $i;
}
echo "Sum: " . $t . "<br>";
echo "Average: " . $t / count($numbers) . "<br><br>";

$numbers = array(3,6,7,9,10,6,7,2,1);
$t = 0;
foreach($numbers as $i){
	if($i <= 5){
		$t++;
	}
}
echo "There are " . $t . " elements less than or equal to five<br><br>";

$in = 'HELLO';
$input = str_split($in);
$list = array('I','O','S','H','Z','X','N');
$letter = 0;
foreach($input as $i){
	$same = false;
	foreach($list as $a){
		if($i == $a){
			$same = true;
			break;
		}
	}
	if($same == false){
		echo "NO";
		break;
	}
}
if($same == true){
	echo "YES";
}
?>