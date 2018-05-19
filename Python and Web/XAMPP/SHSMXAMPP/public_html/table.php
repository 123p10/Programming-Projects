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
#print_r( $list);
$certs = $db->describe($program . 'mandatorycerts');

#print_r($join->results());
?>
<br>
  <table class="table table-bordered">
  <th>First Name </th>
  <th> Last Name </th>
    <?php
    foreach($certs->results() as $data){
      if($data->Field != "ID"){
          echo "<th>" . $data->Field . "</th>";
        }
      }
      $join = $db->query("
      SELECT * FROM
      ((login
      INNER JOIN studentperms ON studentperms.id = login.ID)
      INNER JOIN ". $program ."mandatorycerts ON ".$program."mandatorycerts.id = login.ID
      )
      WHERE studentperms." . $program . " = 1;
      ");

    foreach($join->results() as $key=>$data){
      $id = $data->id;
      $Fname = $data->FirstName;
      $Lname = $data->LastName;
      $sql = $db->get($program .'mandatorycerts', array('id','=' , $id));
      echo "<tr>";
      echo "<td><a href='profile.php?user=" . $id . "'>" . $Fname . "</a></td>";
      echo "<td>" . $Lname . "</td>";
      foreach($sql->first() as $ke=>$dat){
        if($ke != 'ID'){
            echo "<td>" . $dat . "</td>";

        }
      }
      echo "</tr>";
    }
    ?>

  </table>


</div>

</body>
</html>
<style>

</style>
