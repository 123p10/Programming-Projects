<?php
ob_start();
require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$user = new User();
$profile = new User($_POST['user']); //Current

$db = DB::getInstance();
$fields = array();
$program = $_POST['program'];
$certs = $db->describe($program . 'MandatoryCerts');
foreach($certs->results() as $data){
  if($data->Field != "ID"){
      $fields[$data->Field] = $_POST[str_replace(' ', '_', $data->Field)];
  }
}
print_r($fields);
$db->update(strtolower($program . 'MandatoryCerts'),$profile->data()->id,$fields);

$ec = array();
for($i = 1;$i <= 3;$i++){
  $ec["Cert" . $i] = $_POST["Cert" . $i];
}
$db->update(strtolower('electivecerts'),$profile->data()->id,$ec);


header("Location: profile.php?user=" . $_POST['user']);
