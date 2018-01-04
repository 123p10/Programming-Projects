import PyExchangeRates

print "Some Currencies are \n CAD = Canadian Dollar \n GBP = British Pound \n USD = US Dollar \n EUR = Euro \n AUD = Australian Dollar \n JPY = Japanese Yen \n CHF = Swiss Franc \n MXN = Mexican Peso \n CNY = Chinses Yuan \n RUB = Russian Ruble \n BTC = Bitcoin \n XAU = Gold(Troy Ounce)"
orig = raw_input("What is the first Currency ")
num1 = raw_input("What is the value of that currency ")
finalcur = raw_input("And your other currency ")
#finalval = raw_input("The value of that currency")
if orig != finalcur:
	exchange = PyExchangeRates.Exchange('9b264ffda8bf4c9d83999dc25054484c')     
	a = exchange.withdraw(int(num1), orig)
	print a.convert(finalcur)
if orig == finalcur:
	print "YOU IDIOT it is the same value"