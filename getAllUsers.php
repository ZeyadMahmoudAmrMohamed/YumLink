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
        <td>{$row['user_name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['dob']}</td>
        <td>{$row['last_seen']}</td>
        <td>{$row['gender']}</td>
        <td>{$row['isVerified']}</td>
        <td>{$row['createdOn']}</td>
        </tr>
        ";
    }
    
}

?>