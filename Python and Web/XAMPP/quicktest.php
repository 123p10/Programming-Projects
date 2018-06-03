<? include "functions.php" ?>
<?php 
 #   $Fname = $_POST['firstname'];
	#$Lname = $_POST['lastname'];
#	$username = $_POST['username'];
#	$password = $_POST['password'];
#	$program = $_POST['program'];

    $servername = "localhost";
    $un1 = "id5285176_josh";
    $pas1 = "123456";
    $dbname = "id5285176_shsmassignment";

// Create connection
#$connection = mysqli_connect($servername, $un1, $pas1, $dbname);
// Check connection
#if (!$connection) {
#    die("Connection failed: " . mysqli_connect_error());
#}

#$sql = "UPDATE users SET firstname = '$Fname', lastname = '$Lname', password = '$password', program = '$program' WHERE username = '$username'";

#if (mysqli_query($connection, $sql)) {
 #   echo "Record updated successfully";
#} else {
#    echo "Error updating record: " . mysqli_error($connection);
#}
#mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SHSM Assignment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<h1 style="font-size:300%"; ><center>SHSM Update- Student</center></h1>
<body background="http://blog.visme.co/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-040.jpg">
<div class="container">
    <div class="col-sm-6">
        <form action="updatestudent_admin.php" method="post">
            <div class="form-group">
                <label for="Fname">First Name</label>
                <input type="text" name="firstname" class="form-control">
            </div>
            <div class="form-group">
                <label for="Lname">Last Name</label>
                <input type="text" name="lastname" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="program">Program Enrolled In</label>
                <input type="text" name="program" class="form-control">
            </div>
            <form action="updatestudent_admin.php"method="post">
            <a href = "updatestudent2_admin"><input class="btn btn-primary" type="submit" style = "background-color: mediumorchid" name="submit" value="Continue"/></a>
        </form>
    <?php
      show_data();
    ?>
    </div>
</div>
</body>
</html>
