<?php 
session_start();
require './../config.php';
$adminID = $_SESSION['adminid'];
$sql = "DELETE FROM ban_table WHERE admin_id = {$adminID} AND  uid={$_GET['uid']}";

$ret = mysqli_query($conn, $sql);
// $res = mysqli_fetch_assoc($ret);
      if ($ret) {

      echo "User unbanned Successfuly!";
      if($_GET['loc']==='home')
   { header("Location: ./../admindashboard.php?unban=success");}
    
    else {header("Location: ./../usersControls.php?unban=success");}
     
    }
    else {
        echo "User unban failed!";
        if($_GET['loc']==='home')
        { header("Location: ./../admindashboard.php?unban=failed");}
         
         else {header("Location: ./../usersControls.php?unban=failed");}
    }

?>
