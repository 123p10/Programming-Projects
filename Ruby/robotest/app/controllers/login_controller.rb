class LoginController < ApplicationController
  def index
  end
  def verify
  	if Name.find_by(USER: params[:userinput]) && Name.find_by(USER: params[:userinput]).PASS == params[:passinput];
		  goHome(params[:userinput])
	  else
		  redirect_to url_for(:controller => "login", :action => "index",error: 'Incorrect')
    end
  end
  def goHome(user)
    reset_session
  	session[:user_name] = user
	  redirect_to url_for(:controller => "home", :action => "index")
  end
  def mobile
  end
end
