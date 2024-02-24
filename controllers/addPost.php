<?php

use function PHPSTORM_META\type;

require './../config.php';
// require './../Login_SignUp/config.php';
session_start();
$user = $_SESSION['uid'];
//$list = $_GET['items'];
$ingredients = explode(",", $_SESSION['items']);

//$ingredients = $_GET['items'];
$imgUrl = $_GET['img_url'];
$title = 'food recipe';
// $title = $_GET['title'];
$desc = $_GET['desc'];
$veg = 0;

$num = count($ingredients);
// $veg = $_GET['is_veg'];
// $num = $_GET['numIng'];
//$_GET['item1'] = 'whatever';
//for($i=0;$i<$num;$i++){
//    $ingredients[$i] = $_GET['item'.$i+1]; 
//}

$sql="
insert into post(img_url,title,published_at,is_veg,caption,user_id)
values('./assets/img/posts/$imgUrl','$title',now(),$veg,'$desc','$user')
";
// echo "<p style ='background-color:red;'>{$_GET['img_url']}pppp</p> ppp";
if(!isset($ingredients[0]) || !isset($_GET['img_url'])){
    $_SESSION['empty']=true;
    header("Location: ./../homepage.php");
}
// echo "$sql";
try{
    $ret = mysqli_query($conn,$sql);
    $sql = "select * from post order by published_at desc limit 1";
    $ret = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($ret);
    $num = $row['pid'];
    foreach($ingredients as $i){
        
        $sql = "
        INSERT INTO postingredient(ingredient_name,post_id)
        VALUES ('$i',$num)
        ";
       
        try{
            $ret2 = mysqli_query($conn,$sql);
        }catch(Exception $e){
            $sql = "delete from postingredient where post_id = $num";
            try{
                $ret3 = mysqli_query($conn,$sql);
            }catch(Exception $e){
                echo"$e";
            }
            $sql = "delete from post where pid = $num";
            try{
                $ret4 = mysqli_query($conn,$sql);
                $_SESSION['failed']=true;
    

               header("Location: ./../homepage.php");
            }catch(Exception $e){
                echo"$e";
            }
        }
    }
    $_SESSION['succ'] = true;
    header("Location: ./../homepage.php");
}catch(Exception $e){
    $_SESSION['failed']=true;
    echo 'ay7aga';
   header("Location: ./../homepage.php");
}
//mysqli_free_result($ret);
$conn -> close();
?>
