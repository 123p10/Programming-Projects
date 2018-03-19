<h1>Address Book</h1>
<?php
$book = array(
"Tarj"=>9054166477,
"Alex"=>4162741234,
"Nik" =>6473142741,
"David"=>4165244324,
"Kush"=>9052743244
);
foreach($book as $name=>$num){
	echo $name . "'s number is " . $num . "<br>";
}

?>
<br>
<h1>Mark Book</h1>
<?php
$book = array(
"Tarj"=> 78,
"Alex"=>85,
"Nik" =>72,
"David"=>63,
"Kush"=>87,
"Owen"=> 90
);
foreach($book as $name=>$num){
	echo $name . " has an average of " . $num . "%<br>";
}

?>
<br>
<h1>Calculating the Average</h1>
<?php
	$mean = 0;
	
	#These vars store the lowest/highest mark found and the key stored as a string
	$lowestValue = 101;
	$lowestKey;
	$highestValue = 0;
	$highestKey;
	foreach($book as $name=>$num){
		#Sum all the numbers in array
		$mean += $num;
		if($num < $lowestValue){
			$lowestValue = $num;
			$lowestKey = $name;
		}
		if($num > $highestValue){
			$highestValue = $num;
			$highestKey = $name;
		}

	}
	#Divde the sum of all the numbers by the amount of numbers or the length of array
	$mean /= count($book);
	echo "The class average is " . round($mean) . "%<br>";
	echo $lowestKey . " has the lowest mark at " . $lowestValue . "%<br>";
	echo $highestKey . " has the highest mark at " . $highestValue . "%<br>";
	
	echo "<br>";
	arsort($book);
	#$count acts as an index for our array and works so that there is a numbered ranking
	$count = 1;
	foreach($book as $name=>$num){
		echo $count . ". " . $name . ": " . $num . "<br>";
		$count++;
	}
?>
