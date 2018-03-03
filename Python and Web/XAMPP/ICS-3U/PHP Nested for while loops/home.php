<h1>Assignment 3</h1><br>
<h2>1. Multiplication Tables</h2><br>
<table>
<?php
	$x = 10;
	$y = 10;
	#the y axis
	for($r = 1;$r < $y;$r++){
		echo "<tr>";
		#the x axis
		for($c = 1;$c < $x;$c++){
			#multiply the x by the y axis to get the result
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
		#i*i*i*i could be swapped for $i**4 and $i*$i*$i could be swapped for i**3 but I find it easier to read $i*$i*$i*$i
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
#points
$trout = 1;
$pike = 2;
$pickerel = 3;
#maximum points
$total = 2;
#number of fish caught
$count = 0;

#Brute Force Method check all the possible combinations
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
<h2>4. Directions</h2><br>
<?php
	$i = 0;
	$l = array();
	$temp = "";
	$input = "R  QUEEN  R  FOURTH  R  SCHOOL ";
	#Handle this input
	for($i = 0;$i < strlen($input);$i++){
		#Interesting cause this deals with the school issue without having the breakout
		#If there is no space after the input then its not dealt with but backup is necessary
		if(substr($input,$i,1) == " "){
			if($temp != ""){
				if($temp != "SCHOOL"){
					$l[] = $temp; 
					$temp = "";
				}
				else{
					break;
				}
			}
		}
		else{
			$temp .= substr($input,$i,1);
		}
		
	}
	#Reverse the array semi-redundant bus I think its easier to figure out when you reverse the array
	#Rather than reading an array backwards
	$newL = array();
	for($i=sizeof($l)-1; $i>=0; $i--){
      $newL[] = $l[$i];
	}
	#We add home rather than making code messy by having extra if statements
	$newL[] = "your HOME";
	for($i = 0;$i < sizeof($newL);$i++){
		if($newL[$i] == "L"){
			if($i != sizeof($newL)){
				echo "Turn Right on to " . $newL[$i+1] . "<br>";
			}
		}
		if($newL[$i] == "R"){
			echo "Turn Left on to " . $newL[$i+1] . "<br>";
		}

	}
	


?>

