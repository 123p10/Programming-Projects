<?php
$input = "BONJOUR";
$arr = array();
$vowels = ['A','E','I','O','U'];
$vt = 0;
$ct = 0;
for($i = 0;$i < strlen($input);$i++){
	$flag = false;
	foreach($vowels as $v){
		if($input[$i] == $v){
			$flag = true;
			$vt++;
			break;
		}
	}
	if($flag == false){
		$ct++;
	}
}
echo "Number of Vowels: " . $vt . "<br>Number of Consonants: " . $ct;
?>
<br>
<?php
$in = "212223213";
$arr = [$one,$two,$three];
?>