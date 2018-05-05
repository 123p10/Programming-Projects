<?php

ob_start();
require_once ('core/init.php');

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
	if($user->data()->Teacher == 0){
    Redirect::to("student.php");
  }
  else{
    Redirect::to("teacher.php");
  }
}
else {
    Redirect::to('login.php');
}

?>
