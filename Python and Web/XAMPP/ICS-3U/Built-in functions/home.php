<h2>Count Function</h2>
input: [3,2,1,3]<br>
<br>
count();<br>
<?php
	echo count([3,2,1,3]);

?>
<br>
my_count();
<br>
<?php
	function my_count($arr){
		$list = 0;
		foreach($arr as $i){
			$list++;
		}
		return $list;
	}
	echo my_count([3,2,1,3]);
?>
<h2>strlen Function</h2>
input: "Hello Joe"<br>
<br>
strlen();<br>
<?php
echo strlen("Hello Joe");
?>
<br>
my_strlen();<br>

NOTE There is a an @ identifier ahead of the input so as to hide the error
<br>
<?php
	function my_strlen($str){
		$list = 0;
		while(@$str[$list] != ""){
			$list++;
		}
		return $list;
	}
	echo my_strlen("Hello Joe");

?>
<h2>explode function</h2>
input: " ","these are multiple words"
<br>
explode();
<br>
<?php
print_r(explode(" ","these are multiple words"));
?>
<br>
my_explode();
<br>
<?php
	function my_explode($del,$str){
		$arr=[];
		$word = "";
		for($i = 0;$i < strlen($str);$i++){
			if($str[$i] == $del){
				$arr[] = $word;
				$word = "";
				continue;
			}
			else if($i == strlen($str)-1){
				$word .= $str[$i];
				$arr[] = $word;
				$word = "";
				continue;
			}
			else{
				$word .= $str[$i];
			}
		}
		return $arr;
	}
	print_r(my_explode(" ","these are multiple words"));
?>
<br>
<h2>Implode</h2>
input: ["combine","these","terms"]
<br>
implode();<br>
<?php
echo implode(" ", ["combine","these","terms"]);
?>
<br>
my_implode();
<br>
<?php
	function my_implode($del,$arr){
		$words = "";
		foreach($arr as $str){
			$words .= $str . $del;
		}
		return $words;
	}
	echo my_implode(" ",["combine","these","terms"]);

?>
<br>
<h2>Minimum</h2>
input: [3,2,9,1]
<br>
min();
<br>
<?php
echo min([3,2,9,1]);
?>
<br>
my_min();
<br>
<?php
	function my_min($arr){
		$lowest = $arr[0];
		foreach($arr as $val){
			if($val < $lowest){
				$lowest = $val;
			}
		}
		return $lowest;
	}
	echo my_min([3,2,9,1]);
?>
<br>
<h2>Maximum</h2>
input: [3,2,9,1]
<br>
max();
<br>
<?php echo max([3,2,9,1]);?>
<br>
my_max();
<br>
<?php
function my_max($arr){
	$highest = $arr[0];
	foreach($arr as $val){
		if($val > $highest){
			$highest = $val;
		}
	}
	return $highest;
}
echo my_max([3,2,9,1]);
?>
<h2>Substring</h2>
<br>
input: "Hello World",6,5
<br>
substr();
<br>
<?php
	echo substr("Hello World",6,5);
?><br>
my_substr();
<br>
<?php
	function my_substr($str,$start,$len){
		$word = "";
		for($i = $start;$i < $start + $len;$i++){
			$word .= $str[$i];
		}
		return $word;
	}
	echo my_substr("Hello World",6,5);
?>
<h2>String Position</h2>
input: Hello World Nice, "ld"
<br>
strpos();
<br>
<?php
	echo strpos("Hello World Nice","ld");
?>
<br>
my_strpos();
<br>
<?php
	function my_strpos($str,$search){
		for($i = 0;$i < strlen($str) - strlen($search);$i++){
			$word = "";
			for($j = $i;$j < strlen($search)+$i;$j++){
				$word .= $str[$j];
			}
			if($word == $search){
				return $i;
			}
		}
		return false;	
	}
	echo my_strpos("Hello World Nice","ld");
?>



