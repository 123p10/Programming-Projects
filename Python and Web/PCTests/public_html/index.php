 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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

      echo "<a href=\"teachers.php?CourseCode=" . rawurlencode($row["CourseCode"]) . "\" class=\"btn btn-default btn-block btn-lg\" style=\"font-size:30px\">" . $row["CourseCode"] . "</a>";
    }
} else {
    echo "0 results";
}
?>
