<?php
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$user = new User();
$db = DB::getInstance();
$fields = array();
for($i = 1;$i <= 16;$i++){
  $out = $_POST["Course" . $i];
  if(ctype_space($out) == true || $out == ""){
    $out = "N/A";
  }
  $fields["Course" . $i] = $out;
}
$db->update('courses',$user->data()->id,$fields);
header("Location: index.php");
