<?php
	$username = "id5279764_owenb";
	$password = "12345";
	$database = "id5279764_mydatabase";
	$mysqli = new mysqli("localhost", $username, $password, $database);
	$query2="SELECT * FROM tablename";
	$result=$mysqli->query($query2);

#	$mysqli->query("$query");
#	$mysqli->select_db($database) or die( "Unable to select database");

	$mysqli->close();

?>