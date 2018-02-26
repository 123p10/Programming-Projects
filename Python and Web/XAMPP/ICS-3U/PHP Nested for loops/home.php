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
	for($r = 1;$r <= $a;$r++){
		if($r <= $a/2){
			for($c = 1;$c <= $r;$c++){
				echo "*";
			}
		}
		else{
			for($c = $a - $r;$c >= 0;$c--){
				echo "*";
			}
		}
		echo "<br>";
	}
?>