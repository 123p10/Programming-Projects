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
		for($c = 0;$c <= $a-$r;$c++){
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

<h2>Inverted Vertically Pyramid</h2><br>
<?php
	$a = 15;
	for($i = $a;$i > 0;$i-=2){
		for($c = 0;$c < ($a-$i)/2;$c++){
			echo "&nbsp;&nbsp;";
		}
		for($b = 0;$b < $i;$b++){
			echo "*";
		}
		echo "<br>";
	}

?>
<h2>Inverted Horizontally Pyramid</h2><br>
<?php
	$a = 9;
	for($i = 1;$i <= $a;$i++){
		for($b = 0;$b < ($a-$i);$b++){
			echo "&nbsp;&nbsp;";
		}
		for($c = 0;$c < $i;$c++){
			echo $a - $c;
		}
		echo "<br>";
		
	}

?>
<h2>Sentence Scaling</h2><br>
<?php
	$icon = "ABC";
	$s = 3;
	for($se = 0;$se < $s;$se++){
		for($b = 0;$b < strlen($icon);$b++){
			for($i = 0;$i < $s;$i++){
				echo substr($icon,$b,1);
			}
		}
		echo "<br>";
	}
?>
<h2>Simple Icon Scaling</h2><br>
<?php
	$sc = 2;
	$a = "";
	$x = "";
	$sp = "";
	for($i = 0;$i < $sc;$i++){
		$a .= "* ";
		$x .= "x ";
		$sp .= "&nbsp;&nbsp;&nbsp;";
	}
	for($i = 0;$i < $sc;$i++){
		echo $a . $x . $a . "<br>";
	}
	for($i = 0;$i < $sc;$i++){
		echo $sp . $x . $x . "<br>";
	}
	for($i = 0;$i < $sc;$i++){
		echo $a . $sp . $a . "<br>";
	}
	?>