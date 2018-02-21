<?php
	$in = $_GET['in'];
	$t = 0;
	for($i = 1;$i < $in+1;$i++){
		$t += ($i*$i);
	}
	echo $t;
?>