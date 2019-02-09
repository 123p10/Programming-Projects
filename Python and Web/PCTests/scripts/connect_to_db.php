<?php

function getConnection(){
  $servername = constant("servername");
  $username = constant("dbuser");
  $password = constant("dbpassword");
  $dbname = constant("dbname");
  $conn = new mysqli($servername, $username, $password,$dbname);
  return $conn;
}
?>
