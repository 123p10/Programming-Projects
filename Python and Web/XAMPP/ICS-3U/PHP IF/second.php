<?php
$m = $_GET['m'];
$d = $_GET['d'];
if($m > 9){
	echo "After";
}
else if($m < 9){
	echo "Before";
}
else if($d < 21){
	echo "Before";
}
else if($d > 21){
	echo "After";
}
else if($d == 21){
	echo "Special";
}
?>