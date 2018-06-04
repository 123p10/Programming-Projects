<?php
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

  $id = $_POST['Course'];

  $sql = "UPDATE `coursetypes` SET ";
  foreach($_POST as $key=>$value){
    if($key != "Course"){
      $sql .= " `{$key}`=$value,";
    }
    #echo $i;
  }
  $sql = substr($sql, 0, -1);
  $sql .= " WHERE `Course`=\"{$id}\"";
  echo $sql;
  $db = DB::getInstance();
  $db->query($sql);
  header('Location:index.php');
?>
