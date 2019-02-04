<?php
include_once("../scripts/course_functions.php");
include_once("../scripts/db_functions.php");
include_once("../scripts/teacher_functions.php");
include_once("../scripts/test_functions.php");
$conn = getConnection();
add_new_test($conn,"Data Management","Back","Test 2:Combinations","resources/MDM4U/Back/Test2Combinations");
function add_new_test($conn,$course,$teacher,$name,$link){
  if (!file_exists($link)) {
    mkdir($link, 0777, true);
  }

  add_course($conn,$course);
  add_teacher($conn,$course,$teacher);
  add_test($conn,$course,$teacher,$name,$link);

}
