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
  <div id="imgdiv">
<img id = "profile_pic" src="<?php echo "profile_pics/" . "{$profile->data()->id}" . ".jpg?" . time();?>" alt="profile_pics/default.jpg" onerror="this.onerror=null;this.src='profile_pics/default.jpg';" >
</div>
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

//Calculate courses
$p2 = $db->get('courses',array("id","=",$profile->data()->id));

#$p is mandatorycourses
#p2 is courses
$courses = json_decode(json_encode($p2->first()), True);
$p3 = $db->get('coursetypes',array('1','=','1'));
$coursetypes = json_decode(json_encode($p3->results()), True);
#  print_r($coursetypes);
$coursefinal = [];
foreach($courses as $data1){
  $bool = false;
  foreach($coursetypes as $data2){
    if($data1 == $data2["Course"]){
      foreach($data2 as $key3=>$data3){
        if($data3 >= 1){
          $bool = true;
          if(!isset($coursefinal[$key3])){$coursefinal[$key3] = 0;}
          $coursefinal[$key3] += $data3;
        }
      }
    }
  }
}
#$coursefinal["Co-op"] = 2;
$p = $db->get('mandatorycourses',array("Program","=",$program));
$p = $p->first();
$arecoursescomplete = 1;
foreach($p as $key1=>$data1){
  if($key1 != "Program" && $data1 >= 1 && (!isset($coursefinal[$key1]) || ($coursefinal[$key1] < $data1))){
    $arecoursescomplete = 0;
  }
}
$ecount = 0;
$ecert = $db->get("electivecerts",array("id","=",$profile->data()->id));
foreach($ecert->first() as $key=>$data){
  if($key != "id"){
    if($data != "N/A"){
      $ecount++;
    }
  }
}
$electivecount = 0;
$tcount = 0;
$ecert = $db->get("electivecerts",array("id","=",$profile->data()->id));
foreach($ecert->first() as $key=>$data){
  if($key != "id"){
    $tcount++;
    if($data != "N/A"){
      $electivecount++;
    }
  }
}


echo "<h3>This is  " . $profile->data()->FirstName . " " . $profile->data()->LastName . "'s Profile in $program</h3>";
echo "<h3>Total</h3>";
echo "<table class='table table-bordered table-responsive-lg'>";
echo "<tr>";
echo "<th>Courses</th>";
echo "<th>Mandatory Certifications</th>";
echo "<th>Elective Certifications</th>";
echo "</tr>";
echo "<tr>";
if($arecoursescomplete == 1){
  echo "<td style=\"background-color:green\">" . "" ."</td>";
}
else{
  echo "<td style=\"background-color:red\">" . "" ."</td>";
}
$missing = false;
$sql = $db->get($program . "MandatoryCerts",array("id","=",$profile->data()->id));
foreach($sql->first() as $field=>$data){
  if($field != "ID" && $data == 0){
    $missing = true;
  }
}
if($missing == false){
  echo "<td style=\"background-color:green; color:green\">" . "Green" ."</td>";
}
else{
  echo "<td style=\"background-color:red; color:red;\">" . "Red" ."</td>";
}
if($ecount >= 3){
  echo "<td style=\"background-color:green; color:green\">" . "Green" ."</td>";
}
else{
  echo "<td style=\"background-color:red; color:red;\">" . "Red" ."</td>";
}



echo "</tr>";
echo "</table>";

#print_r( $list);
echo "<h3>Mandatory Certifications</h3>";
echo "<table class='table table-bordered table-responsive-lg'>";
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


echo "<h3>Elective Certifications</h3>";
echo "<table class='table table-bordered table-responsive-lg'>";
echo "<tr>";
for($i = 1;$i <= $tcount;$i++){
  echo "<th>Elective " . $i . "</th>";
}
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
echo "</table>";

$courseorder = [];
echo "<h3>Courses</h3>";
echo "<table class='table table-bordered table-responsive-lg'>";
echo "<tr>";
echo "<th>Type</th>";
foreach($p as $key=>$data){
  if($key != "Program" && $data != 0){
      echo "<th>" . $key . "</th>";
      $courseorder[] = $key;
    }
  }
  echo "</tr>";
  echo "<tr>";
  echo "<td>Required Courses</tdd>";
  foreach($p as $field=>$data){
    if($field != "Program" && $data != 0){
      echo "<td>" . $data . "</td>";
    }
  }
  echo "</tr>";
  echo "<tr>";
  echo "<td>Courses Taken </td>";



//Print Course nums here
foreach($courseorder as $data){
  $bool = false;
  foreach($coursefinal as $key1=>$data1){
    if($key1 == $data){
      echo "<td>" . $data1 . "</td>";
      $bool = true;
    }
  }
  if(!$bool){
    echo "<td>0</td>";
  }
}

  echo "</tr>";
echo "</table>";
echo "<div style='overflow-x:auto'>";
echo "<br><table class='table table-bordered table-responsive-lg'><tr>";
foreach($courses as $key=>$data){
  if($key != "id"){
    echo "<td>" . $data . "</td>";
  }
}
echo "</tr></table></div>";
if($user->perms()->$program == 1){
echo "<form action='edit_certs.php' method ='post''>";
echo "<br><button type= \"submit\" name=\"EDIT\"style=\"padding: 0% 0 !important\" class=\"btn btn-info btn-lg btn-block\"><h1>Edit Certs</h1></button>";
echo "<input type=\"hidden\" name =\"user\" value=\"". $_GET['user'] ."\"></input>";

echo "</form>";

echo "<form action='edit_coursesT.php' method ='post''>";
echo "<br><button type= \"submit\" name=\"EDIT\"style=\"padding: 0% 0 !important\" class=\"btn btn-info btn-lg btn-block\"><h1>Edit Courses</h1></button>";
echo "<input type=\"hidden\" name =\"user\" value=\"". $_GET['user'] ."\"></input>";
echo "</form>";

echo "<form action='edit_profilepic.php' method ='post''>";
echo "<br><button type= \"submit\" name=\"EDIT\"style=\"padding: 0% 0 !important\" class=\"btn btn-info btn-lg btn-block\"><h1>Edit Profile Picture</h1></button>";
echo "<input type=\"hidden\" name =\"user\" value=\"". $_GET['user'] ."\"></input>";
echo "</form>";



echo "<form action='delete_user.php' method ='post''>";
echo "<br><button type= \"submit\" name=\"Delete\"style=\"padding: 0% 0 !important\" class=\"btn btn-info btn-lg btn-block\" onclick=\"return confirm('Are you sure you would like to delete this user?');\".><h1>Delete Student</h1></button>";
echo "<input type=\"hidden\" name =\"user\" value=\"". $_GET['user'] ."\"></input>";
echo "</form>";
}



?>


</div>

</body>
</html>
<style>
#profile_pic{
  width:200px;
  object-fit: cover;
}
#imgdiv{
  width:200px;
  height:200px;
  overflow: hidden;

}
</style>
