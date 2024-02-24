<?php
session_start();
require "./../config.php";
$status = "Offline now";
$d = date("Y-m-d H:i:s");
if(isset($_SESSION['uid']))
$sql = mysqli_query($conn, "UPDATE page_user SET status = '{$status}',last_seen = '{$d}' WHERE uid={$_SESSION['uid']}");
         
$_SESSION=[];
session_unset();
session_destroy();
header("Location: ./index.php");
exit();

?>