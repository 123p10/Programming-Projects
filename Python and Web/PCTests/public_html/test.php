<style>
img {
    image-orientation: from-image;
}
</style>
<a href="index.php">Home</a>
<?php
include_once("../scripts/db_functions.php");
$conn = getConnection();
$sql = "SELECT * FROM Tests WHERE CourseCode='" . $_GET['CourseCode'] . "' AND Teacher='" . $_GET['Teacher'] . "' AND Name='" . $_GET['Test'] . "'";
$result = $conn->query($sql);
if ($result->num_rows <= 0) {
#  echo '<script type="text/javascript">window.location = "index.php"</script>';
}
$sql = "SELECT * FROM Tests WHERE CourseCode='" . $_GET['CourseCode'] . "' AND Teacher='" . $_GET['Teacher'] . "' AND Name='" . $_GET['Test'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $files = glob('' . $row['Link'] . '/*.{jpg,png}', GLOB_BRACE);
      foreach($files as $file)
      {
        echo "<img src=" . $file . " width=50%>";
      }
      $files = glob('' . $row['Link'] . '/*.{pdf,PDF}', GLOB_BRACE);
      foreach($files as $file)
      {
        echo "<iframe src=\"{$file}\" width=\"100%\" style=\"height:100%\"></iframe>";
      }

    }
} else {
    echo "0 results";
}
#echo "<img src='../resources/MHF4U/Kim/Unit1Test/PT1.JPG'>";
?>
