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
if(!$user->isLoggedIn()) {
  Redirect::to("index.php");
}
echo "<h3>Hello " . $user->data()->FirstName . " " . $user->data()->LastName . "</h3>";

$program = "";
foreach($user->perms() as $key => $data){
  if($key != "ID" && $key != "Admin"){
    if(isset($_POST[$key]) == 1){
      $program = $key;
      break;
    }
  }
}
echo $program;

$db = DB::getInstance();
$list = $db->get("login",array('Teacher', '=', "0"))->results();
#print_r( $list);
?>
<br>
<table class="table">
<th>First Name </th>
<th> Last Name </th>
<?php
foreach($list as $key=>$data){
  $id = $data->id;
  echo "<tr>";
  echo "<td>" . "" . "</td>";
  echo "</tr>";
}
?>

</table>


</div>

</body>
</html>
