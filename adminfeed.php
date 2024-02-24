<?php
require './config.php';
$aid = $_SESSION['adminid'];
$authority = $_SESSION['type_of_authority'];
// echo $authority;
// if ($_SESSION['succ'] != null) {
//     if ($_SESSION['comment'] != null) {
//         echo "<div class='alert alert-success' role='alert'>
//     Comment Added!
//   </div>";
//     } else if ($_SESSION['like'] != null) {
//         if($_SESSION['like'] == 'Like'){
//         echo "<div class='alert alert-success' role='alert'>
//     Like Added!
//   </div>";
//     }
//     else if($_SESSION['like'] == 'Unlike'){
//         echo "<div class='alert alert-success' role='alert'>
//     Like Removed!
//     </div>";
//         }
//         }
// } else if ($_SESSION['failed'] != null) {
//     if ($_SESSION['like'] != null) {
//         echo "<div class='alert alert-danger' role='alert'>
//     Like failed to add!
//   </div>";
//     }
//     else if ($_SESSION['like'] != null) {
//         echo "<div class='alert alert-danger' role='alert'>
//         Failed to unlike!
//         </div>";
//     } else if ($_SESSION['comment'] == null || $_SESSION['comment'] != null) {
//         echo "<div class='alert alert-danger' role='alert'>
//     Comment failed to add!
//   </div>";
//     }
// }
unset($_SESSION['failed']);
unset($_SESSION['succ']);
unset($_SESSION['comment']);
unset($_SESSION['like']);

$sql="";
 $sql = "select * from post order by published_at desc";
require './adminpostdesign.php';
            

  
 
if ($ret !== null) mysqli_free_result($ret);
if ($ret3 != null) mysqli_free_result($ret3);
mysqli_close($conn);
  ?>