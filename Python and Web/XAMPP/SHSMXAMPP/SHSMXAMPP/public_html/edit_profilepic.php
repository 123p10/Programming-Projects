<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current
$profile = new User($_POST['user']);
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
Old Profile Picture
<form action="uploadprofilepic.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    <input type="hidden" name="user" value="<?php echo $profile->data()->id?>">
</form>

<?php
if(!$user->isLoggedIn()) {
  Redirect::to("index.php");
}
?>


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
