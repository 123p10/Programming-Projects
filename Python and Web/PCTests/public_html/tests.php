<a href="index.php">Home</a><br><br>

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
      echo "<a href=test.php?Teacher=" . rawurlencode($row["Teacher"]) ."&CourseCode=" . rawurlencode($_GET['CourseCode']) ."&Test=" . rawurlencode($row['Name']) . ">" . $row["Name"] . "</a><br>";
    }
} else {
    echo "0 results";
}

?>
