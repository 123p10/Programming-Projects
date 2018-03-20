<h1>Shuffle Music Player</h1>
<?php
#get the value from the shift text input
if(isset($_GET['shift'])){
	$shift = $_GET['shift'];
}
else{
	#If no buttons clicked then set our shift to 0
	$shift = 0;
}

$str = "ABCDE";
$final = "";
#ABCDE -> BCDEA

#IF left button clicked
if(isset($_GET['left'])){
	#Loop through all the elements past the looped text
	for($i = $shift;$i < strlen($str);$i++){
		#Add the text that should not be looped to the start of the output string
		$final .= $str[$i];
	}
	for($i = 0;$i < $shift;$i++){
		#Append the text that should be looped to the end of the output string
		$final .= $str[$i];
	}
}
#if right button clicked
if(isset($_GET['right'])){
	#Get the characters at the end of the string with the length of our shift and put at the start
	#of the output string
	for($i = strlen($str)-$shift;$i < strlen($str);$i++){
		$final .= $str[$i];
	}
	#Append the rest of the text to the output string
	for($i = 0;$i < strlen($str)-$shift;$i++){
		$final .= $str[$i];
	}
}
?>
<form action='home.php' method='get'>
  <span name="string"><?php echo $final; ?></span><br><br>
  <button type='submit' name='left'>Left</button>
  <button type='submit' name='right'>Right</button>
  Shift:<input type="text" name="shift"><br>
</form>