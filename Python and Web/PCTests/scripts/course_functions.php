<?php

function add_course($conn,$name){
  $sql = "INSERT INTO Courses (CourseCode)
  VALUES ('{$name}')";
  $conn->query($sql);
}
function remove_course($conn,$name){
  $sql = "DELETE FROM Courses WHERE CourseCode='{$name}'";
  $conn->query($sql);
}

?>
