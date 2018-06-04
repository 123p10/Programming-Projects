<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current
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
$db = DB::getInstance();
if(!$user->isLoggedIn()) {
  Redirect::to("index.php");
}
echo "<h3>Hello " . $user->data()->FirstName . " " . $user->data()->LastName . "</h3>";
if($user->perms()->Admin == 1){
?>
<h2>Teacher Manager</h2>
<table class="table table-bordered" id ="table">
  <tr>
<th>First Name</th>
<th>Last Name</th>
<th>Username</th>
<th>Alter Permissions</th>
<th>Delete User</th>
<?php
foreach($user->perms() as $key => $data){
  if($key != "ID" ){
      echo "<th>{$key}</th>";
  }
}
echo "</tr><tr>";
$table = $db->get('teacherperms',array('1','=','1'));
foreach($table->results() as $use){
  $u = new User($use->ID);
  echo "<td>{$u->data()->FirstName}</td>";
  echo "<td>{$u->data()->LastName}</td>";
  echo "<td>{$u->data()->id}</td>";
  echo "<td><a href=\"alterperms.php?teacher=" . $u->data()->id . "\">" . "Change Permissions for " .$u->data()->FirstName . " " .$u->data()->LastName .  "</a></td>";

  echo "<td><a href=\"deleteteacher.php?teacher=" . $u->data()->id . "\">" . "Delete " .$u->data()->FirstName . " " .$u->data()->LastName .  "</a></td>";

  foreach($use as $key => $data){
    if($key != "ID"){
      echo "<td>{$data}</td>";
    }
  }
  echo "</tr><tr>";
}

?>
</tr>
</table>

<button type= "submit" onclick="location.href = 'addteacher.php';"name="register"style="padding: 0% 0 !important" class="btn btn-info btn-lg btn-block"><h1>Add Teacher</h1></button>
<button type= "submit" onclick="location.href = 'addprogram.php';"name="register"style="padding: 0% 0 !important" class="btn btn-info btn-lg btn-block"><h1>Add Program</h1></button>


<button type= "submit" onclick="location.href = 'addcourse.php';"name="register"style="padding: 0% 0 !important" class="btn btn-info btn-lg btn-block"><h1>Add Course to Type</h1></button>

<?php
}
?>
</table>

<h2>List of Course Types</h2>
<table class="table table-bordered" id ="table">
  <tr>
<?php
$courseT = $db->get('coursetypes',array('1','=','1'));
/*foreach($courseT->first() as $key=>$data){
   echo "<th>{$key}</th>";

}
echo "<tr></tr>";*/
foreach($courseT->results() as $k=>$d){
  foreach($d as $key=>$data){
    if($data > 0){
      echo "<td>$key</td>";
    }
    if($key == "Course"){
      echo "<td><a href=\"edit_coursetype.php?course={$data}\";>$data</a></td>";
    }
  }
  echo "</tr><tr>";
}
?>

</table>
<br><br>
</div>

</body>
</html>
