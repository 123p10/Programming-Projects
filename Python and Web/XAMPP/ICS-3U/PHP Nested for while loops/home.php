<h1>Assignment 3</h1><br>
<h2>1. Multiplication Tables</h2><br>
<table>
<?php
	$x = 10;
	$y = 10;
	for($r = 1;$r < $y;$r++){
		echo "<tr>";
		for($c = 1;$c < $x;$c++){
			echo "<td>" . $r * $c . "</td>";
		}
		echo "</tr>";
		
	}
?>
</table>

<style>
	table,td{
		border: 1px solid black;
		border-collapse: collapse;
	}
	table{
		width: 200px;
		height: 200px;
	}

</style>
<br>
<h2>2. Weather Balloon</h2><br>
Input:<br>
h = 30<br>
M = 10<br><br>
<?php
	$t = 0;
	$h = 30;
	$a = 0;
	$M = 10;
	$i = 1;
	while($i <= $M){
		$a = -6*($i*$i*$i*$i) + $h*($i*$i*$i) + 2*($i*$i) + $i;
		if($a <= 0){
			echo "The balloon first touches ground at hour: \n" . $i;
			break;
		}
		
		$i++;
	}
	if($i > $M){
		echo "The balloon does not touch the ground in the given time";
	}
?>
<br>
<h2>3. Fish</h2><br>
<?php
$trout = 1;
$pike = 2;
$pickerel = 3;
$total = 2;
$count = 0;
for($t = 0;$t <= $total;$t++){
	for($p = 0;$p <= $total;$p++){
		for($pi = 0;$pi <= $total;$pi++){
			if(($trout * $t) + ($pike * $p) + ($pickerel * $pi) <= $total && $t + $p + $pi != 0){
				echo $t . " Brown Trout, " . $p . " Northern Pike, " . $pi . " Yellow Pickerel <br>";
				$count++;
			}
		}
	}
}
echo "Number of ways to catch fish: " . $count . "<br>";
?>


