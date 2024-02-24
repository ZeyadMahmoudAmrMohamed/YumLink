<?php 
session_start();
require './../config.php';
// $sql = "UPDATE `page_user` SET `first_name`=$_GET[firstname],`last_name`=$_GET[lastname],`email`=$_GET[email],`gender`=$_GET[gender],`twitter`= $_GET[twitter],`facebook`=$_GET[facebook],`instagram`=$_GET[instagram],`linkedin`=$_GET[linkedin] WHERE 1";
$query = "UPDATE `page_user` SET `first_name` = ?, `last_name` = ?,`email` = ?,  `gender` = ?, `twitter` = ?, `facebook` = ?, `instagram` = ?,`linkedin` = ? WHERE uid = {$_SESSION['uid']}";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssissss", $_GET['firstname'], $_GET['lastname'],$_GET['email'], $_GET['gender'],$_GET['twitter'],$_GET['facebook'],$_GET['instagram'],$_GET['linkedin']);

// Assign values to variables $username, $gender, $twitter, $facebook, $instagram
// Execute the prepared statement
$stmt->execute();

// $ret = mysqli_query($conn, $sql);
// $res = mysqli_fetch_assoc($ret);
      if ($stmt) {

      echo "User edited Successfuly!";
      
    header("Location: ./../profilepage.php?edit=success");     
    }
    else{
        echo "User edit failed!";
         header("Location: ./../profilepage.php?edit=failed");}
         
        
    

?>
