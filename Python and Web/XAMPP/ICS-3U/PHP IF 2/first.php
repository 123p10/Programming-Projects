<?php
	$l = $_GET["length"];
	$h = $_GET["height"];
	#Simple pyramid volume formula you do $l*$l to solve for surface area of the base of the pyramid
	$t = (1/3) * (($l*$l)*$h);
	
	#Its possible to use the ceil() function here but IDK if allowed so I will do this
	#echo ceil($t);
	
	#If the number has a non zero digit after the decimal
	if((int)$t / $t != 1){
		#The number is therefore not whole so we round the number down and add 1 because if there is a decimal that implies that you need more than the whole number
		echo ((int) $t) + 1;
	}
	else{
		#The number is therefore whole so simply output with rounding just to be safe
		echo (int)$t;
	}
?>