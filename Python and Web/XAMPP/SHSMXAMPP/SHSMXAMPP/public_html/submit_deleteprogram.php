<?php
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$user = new User();
$db = DB::getInstance();
$program = $_POST['program'];
$users = $db->get('studentperms',array("{$program}",'=','1'));
foreach($users->results() as $u){
  $user->removeUser($u->ID);
}

$db->query("ALTER TABLE `coursetypes` DROP COLUMN `{$program}`;");

$db->query("DROP TABLE {$program}electivecerts");
$db->query("DROP TABLE {$program}mandatorycerts");

#ALTER TABLE `mandatorycourses` ADD `Construction` TINYINT NOT NULL AFTER `Justice`;
$db->query("ALTER TABLE `mandatorycourses` DROP COLUMN `{$program}`;");
$db->query("ALTER TABLE `studentperms` DROP COLUMN `{$program}`;");
$db->query("ALTER TABLE `teacherperms` DROP COLUMN `{$program}`;");

#ALTER TABLE `studentperms` ADD `Construction` TINYINT NOT NULL DEFAULT '0' AFTER `ID`;
$db->query("DELETE FROM `mandatorycourses` WHERE `Program`=\"{$program}\"");
header("Location: index.php");

?>
