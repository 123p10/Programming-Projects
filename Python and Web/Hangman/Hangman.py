TotalPoints = 0
Life = 5
LettersGuessed = ""
Answer = raw_input(' Well now Player 1 what is your choice ')
AnswerNum = len(Answer)
print 'Player 2 it is a',AnswerNum,'letter word including spaces.'
print 'Now Guess'
Guess = raw_input(' Now choose a letter ')

if Guess in Answer:
	TotalPoints += 1
	newAnswer = Answer.replace(Guess, "")
	ListAns = list(Answer)
	print newAnswer

else:

	TotalPoints -= 1
	Life -= 1

