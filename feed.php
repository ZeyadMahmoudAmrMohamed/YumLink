<?php 
session_start();
require 'config.php';
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM ban_table WHERE uid = $uid";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  //  echo "<div class='alert alert-danger' role='alert'>You are banned!</div>";
    $_SESSION=[];
session_unset();
session_destroy();
header("Location: ./Login_SignUp/index.php");
exit();
  //   header("Location: ./LoginSignUp/signout.php");
  //   exit();
  // echo 'hello';

}
if ($_SESSION['succ'] != null) {
    if ($_SESSION['comment'] != null) {
        echo "<div class='alert alert-success' role='alert'>
    Comment Added!
  </div>";
    } else if ($_SESSION['like'] != null) {
        if($_SESSION['like'] == 'Like'){
        echo "<div class='alert alert-success' role='alert'>
    Like Added!
  </div>";
    }
    else if($_SESSION['like'] == 'Unlike'){
        echo "<div class='alert alert-success' role='alert'>
    Like Removed!
    </div>";
        }
        }
} else if ($_SESSION['failed'] != null) {
    if ($_SESSION['like'] != null) {
        echo "<div class='alert alert-danger' role='alert'>
    Like failed to add!
  </div>";
    }
    else if ($_SESSION['like'] != null) {
        echo "<div class='alert alert-danger' role='alert'>
        Failed to unlike!
        </div>";
    } else if ($_SESSION['comment'] == null || $_SESSION['comment'] != null) {
        echo "<div class='alert alert-danger' role='alert'>
    Comment failed to add!
  </div>";
    }
}
unset($_SESSION['failed']);
unset($_SESSION['succ']);
unset($_SESSION['comment']);
unset($_SESSION['like']);
require './config.php';
$sql="";
if(!isset($_SESSION['adminid'])){
    $sql = "select * from follower where follower_id = $_SESSION[uid]";
}
$ret = mysqli_query($conn, $sql);
    if (mysqli_num_rows($ret) > 0) {
        // sql of user having followers
        $sql = "select * from post 
      join page_user as pu on user_id = pu.uid
      join follower as f on pu.uid = f.following_id
      where f.follower_id = $_SESSION[uid] order by published_at desc";
    require './postdesign.php';
    //   echo 'hello\n';         
    }
 else {
        // no followers user
        $sql = "select * from post order by published_at desc";
        require './postdesign.php';
    //   echo 'hello\n';         

  }
 
if ($ret !== null) mysqli_free_result($ret);
if ($ret3 != null) mysqli_free_result($ret3);
mysqli_close($conn);
  ?>