<?php
  $hostname = "localhost:3306";
  $username = "root";
  $password = "";
  $dbname = "project";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
