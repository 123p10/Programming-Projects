<?php
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User();
$user->removeUser($_POST['user']);

header("Location: programs.php");
?>
