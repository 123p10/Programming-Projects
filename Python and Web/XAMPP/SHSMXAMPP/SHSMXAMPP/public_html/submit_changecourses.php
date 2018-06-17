<?php
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

  $program = $_POST['Program'];

  $sql = "UPDATE `mandatorycourses` SET ";
  foreach($_POST as $key=>$value){
    if($key != "Program"){
      $sql .= " `{$key}`=$value,";
    }
    #echo $i;
  }
  $sql = substr($sql, 0, -1);
  $sql .= " WHERE `Program`=\"{$program}\"";
  echo $sql;
  $db = DB::getInstance();
  $db->query($sql);
  header('Location:index.php');
?>
