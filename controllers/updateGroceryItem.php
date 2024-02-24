<?php
require './../config.php';
// $sql = "INSERT INTO grocery_item ('quantity' ,  'price' ,  'item_name' ,  'img_url' ,  'is_veg' ,  'type' ,  'desc' ) VALUES ('{$_GET['quantity']}','{$_GET['price']}','{$_GET['item_name']}','{$_GET['item_name']}.jpeg','{$_GET['is_veg']}','{$_GET['type']}','{$_GET['desc']}')";
$sql = "UPDATE `grocery_item` SET `quantity`='{$_GET['quantity']}',`price`='{$_GET['price']}',`item_name`='{$_GET['item_name']}',`is_veg`='{$_GET['is_veg']}',`gType`='{$_GET['gType']}',`gDesc`=\"{$_GET['gDesc']}\" WHERE `gid`={$_GET['gid']}";

// $stmt = $conn->prepare($sql);,`img_url`='{$_GET['img_url']}'
// $stmt->bind_param("iisssss", $_GET['quantity'], $_GET['price'], $_GET['item_name'], $_GET['item_name'] . ".jpeg", $_GET['is_veg'], $_GET['type'], $_GET['desc']);
echo $sql.'<br>';
$ret = mysqli_query($conn, $sql);
// Execute the prepared statement
// $ret = mysqli_query($conn, $sql);
if($ret){
    echo "insert success";
    header("Location: ./../restock.php?update=success");
    exit();
}else{
    header("Location: ./../restock.php?update=fail");
    exit();
}

?>