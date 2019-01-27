<?php
include_once("../scripts/course_functions.php");
include_once("../scripts/db_functions.php");
include_once("../scripts/teacher_functions.php");
include_once("../scripts/test_functions.php");

$conn = getConnection();

$sql = "SELECT CourseCode FROM Courses";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<a href=teachers.php?CourseCode=" . rawurlencode($row["CourseCode"]) . ">" . $row["CourseCode"] . "</a><br>";
    }
} else {
    echo "0 results";
}
?>
