<a class = "btn btn-default btn-lg btn-danger"  href="index.php">Home</a><br><br>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<style>
img {
    image-orientation: from-image;
}
</style>
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
