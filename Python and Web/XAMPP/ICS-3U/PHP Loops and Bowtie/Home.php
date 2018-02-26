<h1>Assignment 2</h1><br>
<h2>Exercise 3</h2><br>
<?php
	$a = 5;
	for($i = 0;$i < $a;$i++){
		for($j = 0;$j < $a;$j++){
			echo "*";
		}
		echo "<br>";
	}

?>
<h2>Exercise 3</h2><br>
<?php
	$a = 5;
	for($r = 1;$r <= $a;$r++){
		for($c = 1;$c <= $r;$c++){
			echo "*";
		}
		echo "<br>";
	}
?>
<h2>Exercise 4</h2><br>
<?php
	$a = 5;
	for($r = 1;$r <= $a;$r++){
		for($c = $a - $r;$c >= 0;$c--){
			echo "*";
		}
		echo "<br>";
	}
?>
<h2>Exercise 5</h2><br>
<?php
	$a = 5;
	for($r = 1;$r <= $a/2;$r++){
		for($c = 1;$c <= $r;$c++){
			echo "*";
		}
		echo "<br>";
	}
	for($r = $a/2+1;$r > 1;$r--){
		for($c = 1;$c <= $r;$c++){
			echo "*";
		}
		echo "<br>";
	}

?>
<h2>Bowtie</h2>
<?php
	$a = 5;
	for($r = -$a;$r <= $a;$r++){
		for($c = -$a;$c <= $a;$c++){
			if($r*$r <= $c*$c){
				echo " * ";
			}
			else{
				echo " &nbsp;&nbsp; ";
			}
		}
		echo "<br>";
	}

?>

<h2>Pyramid</h2>
<?php 
	$w = 15;
	for($r = 1;$r <= $w;$r+=2){
		for($f = 1;$f <= ($w-$r)/2;$f++){
			echo "&nbsp;&nbsp;";
		}
		for($a = 0;$a < $r;$a++){
			echo "*";
		}
		echo "<br>";
	}
?>
