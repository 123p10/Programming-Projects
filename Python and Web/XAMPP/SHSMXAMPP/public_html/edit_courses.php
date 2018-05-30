<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$user = new User();
$profile = new User(); //Current
if($user->data()->Teacher == 1){
  Redirect::to("index.php");
}
include "student_navbar.php";
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
$db = DB::getInstance();

$p2 = $db->get('courses',array("id","=",$profile->data()->id));
$courses = json_decode(json_encode($p2->first()), True);
echo "<table class='table table-bordered'>";
echo "<h2>Old Courses</h2><tr>";

foreach($courses as $key=>$data){
  if($key != "id"){
    echo "<td>" . $data . "</td>";
  }
}
echo "</tr></table>";
echo "<h2>New Courses</h2>Leave Blank if no Course Selected<br>Use Exact Course Code, no hyphens or suffixes<br>
  <b>e.g</b><br>
  ENG4U0 is Good<br>
  ENG4U0-C is Bad<br><br>
  TMJ4MR is Good<br>
  TMJ4M is Bad<br><br>
";
echo "<form action=\"submit_courses.php\" method=\"post\">";
echo "<table class='table table-bordered'>";
echo "<tr>";
$count = 0;
foreach($courses as $key=>$data){
  if($key != "id"){
    $count++;
    if($count == 9){
      echo "</tr><tr>";
    }
    if(strcmp($data,"N/A") == 0){
      $data = "";
    }
    echo "<td>  <input type=\"text\" name=\"" . $key . "\"class=\"form-control\" value=\"" . $data . "\"/></td>";
  }
}

echo "</tr></table>";
echo "<br><button type= \"submit\" name=\"EDIT\"style=\"padding: 0% 0 !important\" class=\"btn btn-info btn-lg btn-block\"><h1>Submit Courses</h1></button></form>";

?>
