<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$user = new User();
$profile = new User($_POST['user']); //Current
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
echo "<h2>" . $profile->data()->FirstName . " " . $profile->data()->LastName  . "'s </h2><br><br>";
echo "<h3>Old Mandatory Certifications</h3>";
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
      if($data > 0){
        echo "<td style=\"background-color:green; color:green;\">" . $data . "</td>";
      }
      else{
        echo "<td style=\"background-color:red; color:red;\">" . $data . "</td>";
      }
    }
  }
  echo "</tr>";
echo "</table>";


echo "<h3>Old Elective Certifications</h3>";
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th>Elective 1</th>";
echo "<th>Elective 2</th>";
echo "<th>Elective 3</th>";
echo "<th>Total</th></tr><tr>";
$electivecount = 0;
$ecert = $db->get("electivecerts",array("id","=",$profile->data()->id));
foreach($ecert->first() as $key=>$data){
  if($key != "id"){
    echo "<td>".$data."</td>";
    if($data != "N/A"){
      $electivecount++;
    }
  }
}
echo "<td>".$electivecount."</td>";
echo "</tr>";
echo "</table><br><br>";


echo "<h2>New Mandatory Certifications</h2>
";
echo "<form action=\"submit_certs.php\" method=\"post\">";
echo "<table class='table table-bordered'>";
echo "<tr>";
$count = 0;
$certs = $db->describe($program . 'MandatoryCerts');

foreach($certs->results() as $data){
  if($data->Field != "ID"){
      echo "<th>" . $data->Field . "</th>";
  }
}
$sql = $db->get($program . "MandatoryCerts",array("id","=",$profile->data()->id));

echo "</tr><tr>";
foreach($sql->first() as $key=>$data){
  if(strcasecmp($key,"id") != 0){
    $count++;
    if($count == 9){
      echo "</tr><tr>";
    }
    if(strcmp($data,"N/A") == 0){
      $data = "";
    }
    echo "<td>
      <select name=\"" . $key ."\">";
    if($data > 0){
      echo "
        <option value=\"0\">Incomplete</option>
        <option value=\"1\" selected=\"selected\">Complete</option>";
    }
    else{
      echo "
        <option value=\"0\" selected=\"selected\" >Incomplete</option>
        <option value=\"1\" >Complete</option>";

    }
    echo"</select></td>";
  }
}

echo "</tr></table>";

echo "<h3>New Elective Certifications</h3>";
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th>Elective 1</th>";
echo "<th>Elective 2</th>";
echo "<th>Elective 3</th>";
echo "</tr><tr>";
$ecert = $db->get("electivecerts",array("id","=",$profile->data()->id));
foreach($ecert->first() as $key=>$data){
#  print_r($ecerts->results());
  if($key != "id"){
    $ecerts = $db->get(strtolower($program . "electivecerts"),array("1","=","1"));
    echo "<td><select name=\"".$key."\">";
    foreach($ecerts->results() as $c){
      if($c->Certs == $data){
        echo "<option value=\"" . $c->Certs . "\" selected=\"selected\">" . $c->Certs ."</option>";
      }
      else{
        echo "<option value=\"" . $c->Certs . "\">" . $c->Certs ."</option>";
      }
    }
    if($data == "N/A"){
      echo "<option value=\"N/A\" selected=\"selected\">N/A</option>";
    }
    else{
      echo "<option value=\"N/A\">N/A</option>";
    }
    echo "</select></td>";
  }
}
echo "</tr>";
echo "</table>";



echo "<input type=\"hidden\" name=\"program\" value=\"" . $program . "\"></input>";
echo "<input type=\"hidden\" name=\"user\" value=\"" . $profile->data()->id . "\"></input>";

echo "<br><button type= \"submit\" name=\"EDIT\"style=\"padding: 0% 0 !important\" class=\"btn btn-info btn-lg btn-block\"><h1>Submit Certifications</h1></button></form>";

?>
