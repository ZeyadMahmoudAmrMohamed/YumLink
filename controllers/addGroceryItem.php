<?php
require './../config.php';
// $sql = "INSERT INTO grocery_item ('quantity' ,  'price' ,  'item_name' ,  'img_url' ,  'is_veg' ,  'type' ,  'desc' ) VALUES ('{$_GET['quantity']}','{$_GET['price']}','{$_GET['item_name']}','{$_GET['item_name']}.jpeg','{$_GET['is_veg']}','{$_GET['type']}','{$_GET['desc']}')";
$sql = "INSERT INTO `grocery_item` (quantity ,  price ,  item_name ,  img_url ,  is_veg ,  gType ,  gDesc ) VALUES ({$_GET['quantity']},{$_GET['price']},'{$_GET['item_name']}','{$_GET['item_name']}.jpeg',{$_GET['is_veg']},'{$_GET['type']}','{$_GET['desc']}')";

// $stmt = $conn->prepare($sql);
// $stmt->bind_param("iisssss", $_GET['quantity'], $_GET['price'], $_GET['item_name'], $_GET['item_name'] . ".jpeg", $_GET['is_veg'], $_GET['type'], $_GET['desc']);
$ret = mysqli_query($conn, $sql);

// Execute the prepared statement
// $ret = mysqli_query($conn, $sql);
if($ret){
    echo "insert success";
    header("Location: ./../restock.php?added=success");
    exit();
}else{
    header("Location: ./../restock.php?added=fail");
    exit();
}

?>