<a class = "btn btn-default btn-lg btn-danger"  href="index.php">Home</a><br><br>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php
include_once("../scripts/db_functions.php");
$conn = getConnection();
$sql = "SELECT * FROM Teachers WHERE CourseCode='" . $_GET['CourseCode'] . "' AND Teacher='" . $_GET['Teacher'] . "'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  echo '<script type="text/javascript">window.location = "index.php"</script>';
}
$sql = "SELECT * FROM Tests WHERE Teacher='" . $_GET['Teacher'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<a href=\"test.php?Teacher=" . rawurlencode($row["Teacher"]) ."&CourseCode=" . rawurlencode($_GET['CourseCode']) ."&Test=" . rawurlencode($row['Name']) . "\" class=\"btn btn-default btn-block btn-lg\" style=\"font-size:30px\">" . $row["Name"] . "</a><br>";
    }
} else {
    echo "0 results";
}

?>
