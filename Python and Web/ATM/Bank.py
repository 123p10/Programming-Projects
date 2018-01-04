def loggedIn(user):
	with open('Accounts.txt') as f:
		accounts = [x.strip().split(':') for x in f.readlines()]
	for users,balance in accounts:
		if user == users:
			print users + ' your have ' + balance
			raw_input("")
			return;	
check = raw_input('Type Register or Type Login ')
if(check == 'Register'):
	name = raw_input('Type in your Username')
	with open('Passwords.txt') as f:
		x = [x.strip().split(':') for x in f.readlines()]
	for names,passes in x:
		if name != names:
			passwordstr = raw_input('Type in your Password')
			if passwordstr != passes:
				with open("Accounts.txt", "a") as myfile:
					myfile.write ('/n'passwordstr + ':' + name)
					raw_input('OK ' + name + ' Thank you for making an account your password is ' + passwordstr)
	
elif(check == 'Login'):
	login = raw_input('Type in your Username ')
	with open('Passwords.txt') as f:
		  credentials = [x.strip().split(':') for x in f.readlines()]
	for username,password in credentials:
		if(login == username):
			passwrd = raw_input('Type in Your Password ')
			if(passwrd == password):
				print 'Welome '+ username + ' Thank you for trusting us with your Money (**Press Enter**)'
				raw_input("")
				loggedIn(user = username)
else:
	check = raw_input('Type Register or Type Login ')
	

