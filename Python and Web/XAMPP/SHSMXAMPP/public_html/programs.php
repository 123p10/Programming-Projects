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
echo "<h2>" . $user->data()->FirstName . " " . $user->data()->LastName . " you have access to</h2> <br>";
echo "<form action=\"table.php\" method=\"POST\">";
foreach($user->perms() as $key => $data){
  if($key != "ID" && $key != "Admin"){
  #  if($data == 1){
      echo "<button type= \"submit\" name=\"$key\"style=\"padding: 5% 0 !important\" class=\"btn btn-info btn-lg btn-block\"><h1>$key</h1></button>";
  #  }
  }
}
?>
</form>


</div>

</body>
</html>
