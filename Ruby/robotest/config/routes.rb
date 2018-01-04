Rails.application.routes.draw do
  get 'register/index'

  devise_for :users
  get 'home/index'
  root 'home#gotochat'

  get 'login/index'
  root 'login#index'
  match '/login',      to: 'login#verify',        via: 'post'
  match '/register',      to: 'register#register',        via: 'post'
  match '/home',      to: 'home#logout',        via: 'post'
end
