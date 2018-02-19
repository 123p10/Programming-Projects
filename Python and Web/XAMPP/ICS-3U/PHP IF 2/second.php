<?php
	$in = $_GET["date"];
	#Ok I understand I am not allowed to use functions
	#The only other way I know how to break up these strings
	#is to make 3 different input boxes which would break the rules of
	#the program.
	$d = explode(' ',$in);
	
	#Check to see if the year is less than greater than or the same
	if($d[2] > (2018-13)){
		echo "Too young";
	}
	else if($d[2] < (2018-13)){
		echo "Old enough";
	}
	else{
		#Check to see if the month is less than greater than or the same
		if($d[1] > 2){
			echo "Too young";
			
		}
		else if($d[1] < 2){
			echo "Old enough";
		}
		else{
			#Check if the day is less than greater than or the same
			if($d[0] < 16){
				echo "Old enough";
			}
			else if($d[0] > 16){
				echo "Too young";
			}
			else{
				#They are just 13 but it has to be "at least"
				echo "Too young";
			}
		}
	}
?>
