<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current
$profile = new User($_GET['user']);
if($user->data()->Teacher == 0){
  Redirect::to("index.php");
}
include "teacher_navbar.php";
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<div class="container">
<?php
if(!$user->isLoggedIn()) {
  Redirect::to("index.php");
}
echo "<h3>This is  " . $profile->data()->FirstName . " " . $profile->data()->LastName . "'s Profile</h3>";
$program = "";
foreach($profile->perms() as $key => $data){
  if($key != "ID" && $key != "Admin"){
    if($data == 1){
      $program = $key;
      break;
    }
  }
}

$db = DB::getInstance();
echo "<h3>Total</h3>";
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th>Courses</th>";
echo "<th>Mandatory Certifications</th>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
$missing = false;
$sql = $db->get($program . "MandatoryCerts",array("id","=",$profile->data()->id));
foreach($sql->first() as $field=>$data){
  if($field != "ID" && $data == 0){
    $missing = true;
  }
}
if($missing == true){
  echo "<td>0</td>";
}
else{
  echo "<td>1</td>";

}
echo "</tr>";
echo "</table>";

#print_r( $list);
echo "<h3>Mandatory Certifications</h3>";
echo "<table class='table table-bordered'>";
$certs = $db->describe($program . 'MandatoryCerts');
echo "<tr>";
foreach($certs->results() as $data){
  if($data->Field != "ID"){
      echo "<th>" . $data->Field . "</th>";
    }
  }
  echo "</tr>";
  echo "<tr>";
  $sql = $db->get($program . "MandatoryCerts",array("id","=",$profile->data()->id));
  foreach($sql->first() as $field=>$data){
    if($field != "ID"){
      echo "<td>" . $data . "</td>";
    }
  }
  echo "</tr>";
echo "</table>"
?>


</div>

</body>
</html>
<style>

</style>
