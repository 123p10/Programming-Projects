<?php
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$db = DB::getInstance();
$program = $_POST['program'];
print_r( $db->query("ALTER TABLE `coursetypes` ADD `{$program}` TINYINT(1) NOT NULL DEFAULT '0' AFTER `Manufacturing`;"));
#CREATE TABLE `id5583841_db`.`constructionelectivecerts` ( `Certs` VARCHAR(128) NOT NULL ) ENGINE = InnoDB;
$db->query("CREATE TABLE `id5583841_db`.`{$program}electivecerts` ( `Certs` VARCHAR(128) NOT NULL ) ENGINE = InnoDB;");
$db->query("CREATE TABLE `id5583841_db`.`{$program}mandatorycerts` ( `ID` VARCHAR(10) NOT NULL ) ENGINE = InnoDB;");
#ALTER TABLE `mandatorycourses` ADD `Construction` TINYINT NOT NULL AFTER `Justice`;
$db->query("ALTER TABLE `mandatorycourses` ADD `{$program}` TINYINT NOT NULL DEFAULT '0' AFTER `Manufacturing`;");
#ALTER TABLE `studentperms` ADD `Construction` TINYINT NOT NULL DEFAULT '0' AFTER `ID`;
$db->query("ALTER TABLE `studentperms` ADD `{$program}` TINYINT NOT NULL DEFAULT '0' AFTER `ID`;");
$db->query("ALTER TABLE `teacherperms` ADD `{$program}` TINYINT NOT NULL DEFAULT '0' AFTER `ID`;");
$db->query("INSERT INTO `mandatorycourses` (`Program`) VALUES (\"{$program}\")");
header("Location: index.php");
?>
