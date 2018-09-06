ang <- 3.14
num <- 3
last <- sin(ang)
temp <- sin(ang)
repeat {
	ang <- ang + 10^(-num)
	temp <- sin(ang)
	if(temp < 0){
		ang <- ang - 10^(-num)
		num <- num + 1
		print(sprintf("%.30f",ang))
		if(num >= 25){
			break
		}
	}
	last <- temp
}
