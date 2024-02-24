<?php 
require './../config.php';

$sql = "UPDATE page_user SET isVerified= 0 WHERE uid =  " . $_GET['uid'];

$ret = mysqli_query($conn, $sql);
// $res = mysqli_fetch_assoc($ret);
      if ($ret) {

      echo "User unverified Successfuly!";
      if($_GET['loc']==='home')
   { header("Location: ./../admindashboard.php?unverify=success");}
    
    else {header("Location: ./../usersControls.php?unverify=success");}
     
    }
    else {
        echo "User verification failed!";
        if($_GET['loc']==='home')
        { header("Location: ./../admindashboard.php?unverify=failed");}
         
         else {header("Location: ./../usersControls.php?unverify=failed");}
    }

?>
