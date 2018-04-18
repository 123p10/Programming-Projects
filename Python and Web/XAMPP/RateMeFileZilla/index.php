<?php
ob_start();
require_once ('core/init.php');

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
	Redirect::to('profile.php?user=' . $user->data()->username);
} 
else {
    Redirect::to('landingpage.php');
}