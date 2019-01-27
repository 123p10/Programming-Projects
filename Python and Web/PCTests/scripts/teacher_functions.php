<?php

function add_teacher($conn,$course,$teacher){
  $sql = "INSERT INTO Teachers (CourseCode,Teacher)
  VALUES ('{$course}','{$teacher}')";
  $conn->query($sql);
}
