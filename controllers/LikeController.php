<?php
session_start();
require '../config.php';
$sql = "insert into post_like(uid,pid,liked_at)
values($_SESSION[user],$_SESSION[post],now())";
$loc = "error.php";
if($_SESSION['loc']=='home'){
    $loc = "../homepage.php";
}else if ($_SESSION['loc']=='user'){
    $loc = "../profile.php";
}
try{
    $ret = mysqli_query($conn,$sql);
    unset($_SESSION['user']);
    unset($_SESSION['post']);
    $_SESSION['succ'] = true;
    header("Location: $loc");
}catch(Exception $e){
    $_SESSION['failed']=true;
    echo"$e";
    header("Location: $loc");
}
$conn->close();
?>