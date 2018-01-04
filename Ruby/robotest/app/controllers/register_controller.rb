class RegisterController < ApplicationController
  def index
  end
  
  def register
  	if Name.find_by(USER: params[:userinput])
  		fail('exists')
  	else
      success(params[:userinput],params[:passinput])
  	end
  end

  def fail(why)
  	if why == 'exists'
  		redirect_to url_for(:controller => "register", :action => "index",error: 'Exists')
  	end
  end

  def success(u,p)
    UserCtrl.newAccount(u,p)
    redirect_to url_for(:controller => "login", :action => "index")
  end

end
