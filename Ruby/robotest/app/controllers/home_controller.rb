class HomeController < ApplicationController
  def index
  	@user = session[:user_name]
    @name = "Home";
  end
  def logout
  	reset_session
  	redirect_to url_for(:controller => "login", :action => "index")
  end
  def gotochat
  		redirect_to url_for(:controller => "login", :action => "index")
  end
end
