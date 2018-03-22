<?php
function average_Num($a,$b,$c,$d){
	$sum = 0;
	$sum += ($a + $b + $c + $d);
	return $sum;
}
echo "The average of 1,2,3,4 is " . average_Num(3,1,2,4);


?>
<h2>
Occurences in string
</h2>
<?php
$word = "hoolo";
$find = "o";
echo letter_occurences($word,$find);

function letter_occurences($w,$f){
	$sum = 0;
	for($i = 0;$i < strlen($w);$i++){
		if(substr($w,$i,1) == $f){
			$sum++;
		}
	}
	return $sum;
}
?>