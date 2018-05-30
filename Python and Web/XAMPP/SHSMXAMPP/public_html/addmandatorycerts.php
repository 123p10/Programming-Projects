<?php
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$db = DB::getInstance();
$program = $_POST['program'];
$name = $_POST['cert'];
#ALTER TABLE `manufacturingmandatorycerts` ADD `Work` TINYINT(1) NOT NULL DEFAULT '0' AFTER `WHMIS - General`;
print_r($db->query("ALTER TABLE `". strtolower($program) ."mandatorycerts` ADD `{$name}` TINYINT(1) NOT NULL DEFAULT '0' AFTER `ID`"));
print_r( $db->error());
header("Location: index.php");

?>
