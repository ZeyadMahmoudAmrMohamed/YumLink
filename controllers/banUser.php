<?php 
session_start();
require './../config.php';
$adminID = $_SESSION['adminid'];
$sql = "INSERT INTO ban_table ( uid, admin_id) VALUES ({$_GET['uid']} , {$adminID})";

$ret = mysqli_query($conn, $sql);
// $res = mysqli_fetch_assoc($ret);
      if ($ret) {

      echo "User banned Successfuly!";
      if($_GET['loc']==='home')
   { header("Location: ./../admindashboard.php?ban=success");}
    
    else {header("Location: ./../usersControls.php?ban=success");}
     
    }
    else {
        echo "User verification failed!";
        if($_GET['loc']==='home')
        { header("Location: ./../admindashboard.php?ban=failed");}
         
         else {header("Location: ./../usersControls.php?ban=failed");}
    }

?>
