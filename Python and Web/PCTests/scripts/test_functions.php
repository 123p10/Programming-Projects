<?php
function add_test($conn,$course,$teacher,$name,$link){
  $sql = "INSERT INTO Tests (CourseCode,Teacher,Name,Link)
  VALUES ('{$course}','{$teacher}','{$name}','{$link}')";
  $conn->query($sql);
}
