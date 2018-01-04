class UserCtrl < ApplicationRecord
	def self.newAccount(user,pass)
  		account = Name.create(USER: user,PASS:pass)
	end
end
