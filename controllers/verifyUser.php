<?php 
require './../config.php';

$sql = "UPDATE page_user SET isVerified= 1 WHERE uid =  " . $_GET['uid'];

$ret = mysqli_query($conn, $sql);
// $res = mysqli_fetch_assoc($ret);
      if ($ret) {

      echo "User verified Successfuly!";
      if($_GET['loc']==='home')
   { header("Location: ./../admindashboard.php?verify=success");}
    
    else {header("Location: ./../usersControls.php?verify=success");}
     
    }
    else {
        echo "User unverification failed!";
        if($_GET['loc']==='home')
        { header("Location: ./../admindashboard.php?verify=failed");}
         
         else {header("Location: ./../usersControls.php?verify=failed");}
    }

?>
