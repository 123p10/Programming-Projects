<a class = "btn btn-default btn-lg btn-danger"  href="index.php">Home</a><br><br>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php
include_once("../scripts/db_functions.php");
$conn = getConnection();
$sql = "SELECT CourseCode FROM Courses WHERE CourseCode='" . $_GET['CourseCode'] . "'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  echo '<script type="text/javascript">window.location = "index.php"</script>';
}
$sql = "SELECT * FROM Teachers WHERE CourseCode='" . $_GET['CourseCode']. "'";
#echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<a href=\"tests.php?Teacher=" . rawurlencode($row["Teacher"]) . "&CourseCode=" . rawurlencode($row['CourseCode']) . "\" class=\"btn btn-default btn-block btn-lg\" style=\"font-size:30px\">" . $row["Teacher"] . "</a><br>";
    }
} else {
    echo "0 results";
}

?>
