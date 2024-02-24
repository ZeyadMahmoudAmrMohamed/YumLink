<?php
require './config.php';
$sql = "SELECT * FROM grocery_item WHERE 1";
$ret = mysqli_query($conn, $sql);
if($ret){
    while($row = mysqli_fetch_assoc($ret)){
        echo"
        <tr>
        <td>{$row['gid']}</td>
        <td>{$row['item_name']}</td>
        <td>{$row['quantity']}</td>
        <td>{$row['price']}</td>
        <td>{$row['gType']}</td>
        <td>{$row['gDesc']}</td>
        <td><img width='300' height='300' src='./yumlinkstore/img/pictures/{$row['img_url']}'></td>
        <td><a href='./updateGItem.php?gid={$row['gid']}&loc=controls'><button class='btn btn-success rounded-pill' type='button'>Update</button></a></td>
        <td><a href='./controllers/deleteGItem.php?gid={$row['gid']}&loc=controls'><button class='btn btn-danger rounded-pill' type='button'>Delete</button></a></td>
        </tr>
        ";
    }
    
}

?>