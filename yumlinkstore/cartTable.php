

<!-- <a href="./../config.php"></a> -->
        <?php

        session_start();
error_reporting(E_ERROR | E_PARSE);
        
        $user_id = $_SESSION['uid'];
        
        require './../config.php';

        $remove_zero_sql = "DELETE FROM cart WHERE user_id = $user_id AND quantity = 0";
        mysqli_query($conn, $remove_zero_sql);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['update_cart'])) {
                foreach ($_POST['quantity'] as $cart_id => $new_quantity) {
                    $new_quantity = max(0, intval($new_quantity));

                    $stock_query = "SELECT grocery_item.quantity AS stock
                                    FROM cart
                                    JOIN grocery_item ON cart.item_id = grocery_item.gid
                                    WHERE cart.cart_id = $cart_id AND cart.user_id = $user_id";

                    $stock_result = mysqli_query($conn, $stock_query);

                    if ($stock_result && (mysqli_num_rows($stock_result) > 0)) {
                        $stock_row = mysqli_fetch_assoc($stock_result);
                        $max_quantity = $stock_row['stock'];
                        $new_quantity = min($new_quantity, $max_quantity);
                    }

                    $update_sql = "UPDATE cart SET quantity = $new_quantity WHERE cart_id = $cart_id AND user_id = $user_id";
                    mysqli_query($conn, $update_sql);
                }

                header("Location: ./checkout.php");
                exit();
            }
        }

        $sql = "SELECT cart.cart_id, grocery_item.item_name, cart.quantity, grocery_item.price, grocery_item.quantity AS stock
                FROM cart
                JOIN grocery_item ON cart.item_id = grocery_item.gid
                WHERE cart.user_id = $user_id";

        $result = mysqli_query($conn, $sql);

        if ($result && (mysqli_num_rows($result) > 0)) {
            
                // echo"<form id='myForm' method='post' action='" ."./cartTable.php" . "'>";
            $_total = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['quantity'] > 0) {
                    echo "<tr>
            <th scope='row'>
                <div class='d-flex align-items-center'>";
            echo "<img src = './img/pictures/".$row["item_name"].".jpeg'class='img-fluid me-5 rounded-circle' style='width: 80px; height: 80px;' alt=''>
            </div>
            </th>
            ";
            echo "
            <td>
                <p class='mb-0 mt-4'>".$row['item_name']."</p>
            </td>";
            echo "<td>
            <p class='mb-0 mt-4'>".$row['price'] ."egp</p>
        </td>";
            
                echo  "<td>
                <div class='input-group quantity mt-4' style='width: 100px;'>
                    
                    <input type='number' name='quantity[{$row['cart_id']}]' value='{$row['quantity']}' min='0' max='{$row['stock']}'  class='form-control form-control-sm text-center border-0'>
                    
                </div>
            </td>"  ;
            echo " <td>
            <p class='mb-0 mt-4'>". ($row['quantity'] * $row['price']) ."egp</p>
        </td>
    </tr>";


                    $_total += $row['quantity'] * $row['price'];
                    
                }
            }
            // echo "ana ahoooo";
            $_SESSION['total_amount'] = $_total;
           
            $_SESSION['addedToCart']=true;
        } else {
            echo "<p>Your cart is empty.</p>";
        }

        mysqli_close($conn);
        ?>
