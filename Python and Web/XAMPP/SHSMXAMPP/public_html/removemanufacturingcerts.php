<?php
#ALTER TABLE `manufacturingmandatorycerts` DROP `Work`
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$db = DB::getInstance();
$program = $_POST['program'];
$name = $_POST['names'];
print_r($db->query("ALTER TABLE `". strtolower($program) ."mandatorycerts` DROP `{$name}`"));
header("Location: index.php");

echo $name;
?>
