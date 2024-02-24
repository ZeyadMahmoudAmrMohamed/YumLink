<?php 
session_start();
require './../config.php';
$adminID = $_SESSION['adminid'];
$sql = "DELETE FROM post WHERE pid ={$_GET['pid']};";
$delIng = "DELETE FROM postingredient WHERE post_id ={$_GET['pid']} ;";
$delLike = "DELETE FROM post_like WHERE pid ={$_GET['pid']} ;";
$delComm = "DELETE FROM post_comment WHERE pid = {$_GET['pid']};";
$ret1 = mysqli_query($conn,$delIng);
$ret2 = mysqli_query($conn,$delLike);
$ret3 = mysqli_query($conn,$delComm);

$ret = mysqli_query($conn, $sql);
// $res = mysqli_fetch_assoc($ret);
      if ($ret1 && $ret2 && $ret3 && $ret) {

      echo "Post deleted Successfuly!";
      if($_GET['loc']==='home')
   { header("Location: ./../admindashboard.php?postdel=success");}
    
    else {header("Location: ./../usersControls.php?postdel=success");}
     
    }
    else {
        echo "Post deletion failed!";
        if($_GET['loc']==='home')
        { header("Location: ./../admindashboard.php?postdel=failed");}
         
         else {header("Location: ./../usersControls.php?postdel=failed");}
    }

?>
