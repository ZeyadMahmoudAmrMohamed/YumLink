<?php
require './config.php';
$sql = "SELECT * FROM page_user WHERE 1";
$ret = mysqli_query($conn, $sql);
if($ret){
    while($row = mysqli_fetch_assoc($ret)){
        echo"
        <tr>
        <td>{$row['uid']}</td>
        <td>{$row['first_name']}</td>
        <td>{$row['last_name']}</td>
        <td>{$row['last_seen']}</td>
        <td>{$row['isVerified']}</td>
        <td><a href='./controllers/verifyUser.php?uid={$row['uid']}&loc=controls'><button class='btn btn-success rounded-pill' type='button'>Verify</button></a></td>
        <td><a href='./controllers/unVerifyUser.php?uid={$row['uid']}&loc=controls'><button class='btn btn-danger rounded-pill' type='button'>UnVerify</button></a></td>
        
        <td><a href='./controllers/banUser.php?uid={$row['uid']}&loc=controls'><button class='btn btn-danger rounded-pill' type='button'>Ban</button></a></td>
        <td><a href='./controllers/unbanUser.php?uid={$row['uid']}&loc=controls'><button class='btn btn-success rounded-pill' type='button'>UnBan</button></a></td>
        </tr>
        ";
    }
    
}

?>