<?php 
session_start();
require './../config.php';
$query = "UPDATE `page_user` SET `pass` = ? WHERE uid = {$_SESSION['uid']}";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_POST['newpassword']);

// Assign values to variables $username, $gender, $twitter, $facebook, $instagram
// Execute the prepared statement
$stmt->execute();

// $ret = mysqli_query($conn, $sql);
// $res = mysqli_fetch_assoc($ret);
      if ($stmt) {

      echo "Password changed Successfuly!";
      
    header("Location: ./../profilepage.php?passchange=success");     
    }
    else{
        echo "Password change failed!";
         header("Location: ./../profilepage.php?passchange=failed");}
         
        
    

?>
