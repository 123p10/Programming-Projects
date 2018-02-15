<?php
$a1 = $_GET["a1"];
$a2 = $_GET["a2"];
$a3 = $_GET["a3"];
if($a1 + $a2 + $a3 != 180){
	echo "Error";
}
else if($a1 == $a2 && $a3 == $a2){
	echo "Equilateral";
}
else if($a1 == $a2 || $a2 == $a3 || $a1 == $a3){
	echo "Isoceles";
}
else{
	echo "Scalene";
}
?>