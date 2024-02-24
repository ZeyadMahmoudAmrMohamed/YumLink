<?php
// $servername = "localhost:3306";
// $username = "root";
// $password = "";
// $dbname = "project";

// $conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed to DB");

// if($conn->connect_error){
//     die("Connection_failed ".$conn->connect_error);
// }

$db_host = 'localhost:3306';
$db_name = 'project';
$db_user = 'root';
$db_pass = '';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>