#1 = Rock 2 = Paper 3 = Scissors
from random import randint
playerchos = raw_input("Choose R(Rock),P(Paper) or S(Scissors)")
compchos = randint(1,3)
if compchos == 1:
	if playerchos == "R":
		print("Tie")
if compchos == 1:
	if playerchos == "P":
		print("You Win Against Rock")	
if compchos == 1:
	if playerchos == "S":
		print("You Lose Against Rock")	
if compchos == 2:
	if playerchos == "R":
		print("You Lose Against Scissors")
if compchos == 2:
	if playerchos == "P":
		print("Tie")
if compchos == 2:
	if playerchos == "S":
		print("You Win Against Scissors")	
if compchos == 3:
	if playerchos == "R":
		print("You Win Against Rock")	
if compchos == 3:
	if playerchos == "P":
		print("You Lose Against Rock")
if compchos == 3:
	if playerchos == "S":
		print("Tie")		