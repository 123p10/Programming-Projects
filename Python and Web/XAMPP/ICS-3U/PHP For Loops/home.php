<?php
	for($i = 0;$i < 9;$i++){
		echo "abc ";
	}
	echo "<br>";
	
	for($i = 0;$i < 9;$i++){
		echo "xyz ";
	}
	echo "<br>";
	
	for($i = 1;$i < 10;$i++){
		echo $i . " ";
	}
	echo "<br>";
	for($i = 0;$i < 6;$i++){
		$a = array('A','B','C','D','E','F','G','H','I','J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W','X ','Y','Z');
		echo "Item: " . $a[$i] . "<br>";
	}
	echo "<br>";
?>

<form action="first.php" method="get">
User Input: <input type="text" name="in"><br>
<input type="submit">
</form>
<br>
<?php
	for($i = 0; $i < 13;$i++){
		echo $i . " x 8 = " . ($i*8) . "<br>";
	}

?>
