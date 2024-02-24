<?php 
session_start();
require './../config.php';
$query = "INSERT INTO `follower`(`follower_id`, `following_id`) VALUES (?,?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $_SESSION['uid'],$_GET['following']);

// Assign values to variables $username, $gender, $twitter, $facebook, $instagram
// Execute the prepared statement
try{
$stmt->execute();
}
catch(Exception $e){
    echo "follow failed!";
    header("Location: ./../anotherProfilePage.php?uid={$_GET['following']}&follow=failed");
}
// $ret = mysqli_query($conn, $sql);
// $res = mysqli_fetch_assoc($ret);
      if ($stmt) {

      echo "followed Successfuly!";
      
    header("Location: ./../anotherProfilePage.php?uid={$_GET['following']}&follow=success");     
    }
    // else{
    //     echo "follow failed!";
    //      header("Location: ./../anotherProfilePage.php?uid={$_GET['following']}&follow=failed");}
         
        
    

?>
