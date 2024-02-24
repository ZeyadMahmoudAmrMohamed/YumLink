<?php
//  error_reporting(E_ALL);ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);
    require "./../config.php";
        session_start();
        // var_dump($_POST);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $selectedItemId = $_POST["item_id"];
        // echo $selectedItemId;
        // echo $selectedItemId;
        // $selectedQuantity = $_POST["quantity"];
        if (isset($_SESSION['uid']) ) {
            $userId = $_SESSION['uid'];
            // echo $userId;
            $checkCartSql = "SELECT * FROM cart WHERE user_id = '$userId' AND item_id = '$selectedItemId'";
            
            // echo $selectedItemId;
            // $checkCartResult = $conn->query($checkCartSql);
            $checkCartResult = mysqli_query($conn,$checkCartSql);


            if (mysqli_num_rows($checkCartResult) > 0) {
                
                $updateCartSql = "UPDATE cart SET quantity = quantity +1 WHERE user_id = '{$userId}' AND item_id = '{$selectedItemId}'";
                // $conn->query($updateCartSql);
                mysqli_query($conn,$updateCartSql);
            } else {
                $addToCartSql = "INSERT INTO cart (user_id, item_id, quantity) VALUES ('$userId', '$selectedItemId', '1')";
                // $conn->query($addToCartSql);
                mysqli_query($conn,$addToCartSql);
            }
            echo "<div class='alert alert-success' role='alert'>
            Item added to cart successfully!
          </div>";
            //echo "<p style='color: green;'></p>";
        } else {
            header("Location: ./../Login_SignUp/index.php");
            exit();

        }
    }
        $sql = "SELECT * FROM grocery_item";
       // $result = $conn->query($sql);
              $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            // $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='col-md-6 col-lg-6 col-xl-4'>
                <div class='rounded position-relative fruite-item'>
                    <div class='fruite-img'>";
                echo "<img src = './img/pictures/".$row["img_url"]."'class='img-fluid w-100 rounded-top' alt=''>
                </div>
                <div class='text-white bg-secondary px-3 py-1 rounded position-absolute' style='top: 10px; left: 10px;'>"
                .$row['gType']."</div><div class='p-4 border border-secondary border-top-0 rounded-bottom'>
                <h4>".$row['item_name']."</h4><p>".$row['gDesc']."</p> <div class='d-flex justify-content-between flex-lg-wrap'>
                <p class='text-dark fs-5 fw-bold mb-0'>".$row['price']." £ /kg</p><form id='myForm' method='POST' action ='{$_SERVER['PHP_SELF']}'>
                <input type='hidden' name='item_id' value='" . $row["gid"] . "'>";
                // echo $row['gid'];
                echo "<input type='hidden' name='quantity' value='1'>";
                echo "<button type='submit' onclick='submitForm()' class='btn border border-secondary rounded-pill px-3 text-primary";
                if($row["quantity"] <= 0){
                    echo " disabled'>";
                }else {
                    echo " '>";
                }

                echo "Add  <i class='fa fa-shopping-bag me-2 text-primary'></i></button></form>
                
                </div>
            </div>
        </div>
    </div> ";
            }
            echo "<script>
            function submitForm() {
                var form = document.getElementById('myForm');
                var num = document.getElementById('item_id');
                console.log(num);
                form.submit();
            }
            </script>";
        }else{
            echo "zero results";
        }
       $conn->close();
?>