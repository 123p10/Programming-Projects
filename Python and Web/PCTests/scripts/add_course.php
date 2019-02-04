<?php
include_once("constants.php");
include_once("connect_to_db.php");

function add_course($name){
  $conn = getConnection();
  $sql = "INSERT INTO Courses (CourseCode)
  VALUES ('{$name}')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
