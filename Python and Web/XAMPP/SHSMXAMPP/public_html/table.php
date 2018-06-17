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
<meta name="viewport" content="width=device-width, initial-scale=0.5">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<div class="container">
  <input type="text" id="search" placeholder="Type to search" style="width:100%;">

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
  <table class="table table-bordered" id ="table">
  <th>First Name </th>
  <th> Last Name </th>
    <?php
      $join = $db->query("
      SELECT * FROM
      ((login
      INNER JOIN studentperms ON studentperms.id = login.ID)
      )
      WHERE studentperms." . $program . " = 1;");

    foreach($join->results() as $key=>$data){
      $id = $data->id;
      $Fname = $data->FirstName;
      $Lname = $data->LastName;
      echo "<tr>";
      echo "<td><a href='profile.php?user=" . $id . "'>" . $Fname . "</a></td>";
      echo "<td>" . $Lname . "</td>";
      echo "</tr>";
    }
    ?>

  </table>
  <?php
  if($user->perms()->$program == 1){
     ?>
<form method="post" action="addmandatorycerts.php">
  <div class="form-group">
    <input class="form-control" rows="1" name="cert" style="width:50%; display: inline-block !important; resize:none;"></textarea>
    <input type="hidden" name="program" value="<?php echo $program ?>">
  <button type= "submit" name="" style=" width:50% !important; float:right;height:50% !important;" class="btn btn-info"><b>Add Mandatory Certification</b></button>
</div>
</form>
<form method="post" action="removemanufacturingcerts.php">
  <div class="form-group">
    <select class ="form-control" name="names" style="width:50%; display:inline-block;">
    <?php
      $certs = $db->describe($program . 'MandatoryCerts');
      foreach($certs->results() as $data){
        if($data->Field != "ID"){
            echo "<option value=\"" . $data->Field . "\"> " . $data->Field ."</option>";
        }
      }

    ?>
    </select>
    <input type="hidden" name="program" value="<?php echo $program ?>">
  <button type= "submit" name="" style=" width:50% !important; float:right;height:50% !important;" class="btn btn-info"><b>Remove Mandatory Certification</b></button>
</div>
</form>
<form method="post" action="addelectivecert.php">
  <div class="form-group">
    <input class="form-control" rows="1" name="cert" style="width:50%; display: inline-block !important; resize:none;"></textarea>
    <input type="hidden" name="program" value="<?php echo $program ?>">
  <button type= "submit" name="cer" style=" width:50% !important; float:right;height:50% !important;" class="btn btn-info"><b>Add Elective Certification</b></button>
</div>
</form>
<form method="post" action="changecourses.php">
  <div class="form-group">
    <input type="hidden" name="program" value="<?php echo $program ?>">
  <button type= "submit" name="cer" style="width:100% !important; float:right;height:100% !important;" class="btn btn-info"><h2>Change Course Requirements</h2></button>
</div>
</form>
<br>
<form method="post" action="submit_deleteprogram.php">
  <div class="form-group">
    <input type="hidden" name="program" value="<?php echo $program ?>"><br><br>
  <button type= "submit" name="cer" style="width:100% !important; float:right;height:100% !important;" class="btn btn-info" onclick="return confirm('Are you sure you would like to delete this program?');"

><h2>Delete Program</h2></button>
</div>
</form>




<?php
}
?>
</div>

</body>
</html>
<style>

</style>
<script>
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
