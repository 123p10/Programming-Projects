<?php
	#3 possible solutions
	# #1 IF statements up to 10
	#    Solve each number up to 10 seperately then put an if statement with the solution
	# #2 Bruteforce 
	#	 Solution used below, most reliable, go through each number less than n and check if they add with another number to get n
	# #3 Mathematical
	#	 Maybe possible to just input ot formula where $n=floor(n/2)+1;
	$n = $_GET["n"];
	$t = 0;
	#We do n/2 here because we dont want to repeat ourselves if we do 8=2+4 we dont want to do 8=4+2 so we just run all numbers that are half or less
	for ($x = 0; $x <= $n/2; $x++) {
		for($y = 0;$y <= $n;$y++){
			if($x + $y == $n){
				#add to our running total
				$t++;
			}
		}
	} 
	echo $t;
	
	#1
	
	#2
	#1 1
	
	#3
	#2 1
	
	#4
	#3 1
	#2 2
	
	#5
	#4 1
	#3 2
	
	#6
	#5 1
	#4 2
	#3 3
	
	#7
	#6 1
	#5 2
	#4 3
	
	#Possible mathematical solution
	#Requires more testing;
	#Above solution more reliable
	# floor(n/2)+1
	# floor(1/2)+1 = 1;
	# floor(2/2)+1 = 2;
	# floor(3/2)+1 = 2; 
	# floor(4/2)+1 = 3;
	# floor(5/2)+1 = 3;
	# floor(6/2)+1 = 4;
	# floor(7/2)+1 = 4;
?>