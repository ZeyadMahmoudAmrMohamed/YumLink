

<!-- <a href="./../config.php"></a> -->
<?php
error_reporting(E_ERROR | E_PARSE);

        session_start();
        $user_id = $_SESSION['uid'];
        require './../config.php';

        $remove_zero_sql = "DELETE FROM cart WHERE user_id = $user_id AND quantity = 0";
        mysqli_query($conn, $remove_zero_sql);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // echo "hello";
            if (isset($_POST['generate_receipt'])) {
        
        // Update stock quantities in grocery_item table
        $update_stock_sql = "UPDATE grocery_item gi
                             JOIN cart c ON gi.gid = c.item_id
                             SET gi.quantity = gi.quantity - c.quantity
                             WHERE c.user_id = '$user_id'";
        $conn->query($update_stock_sql);

        // Clear user's cart
        $clear_cart_sql = "DELETE FROM cart WHERE user_id = '$user_id'";
        $conn->query($clear_cart_sql);
               // unset($_SESSION['total-amount']);
                // if (isset($_SESSION['addedToCart'])) {
                //     unset($_SESSION['addedToCart']);
                // }
               $_SESSION['addedToCart'] = false;

                header("Location: ./shop.php?order-place='true'");
                exit();
            }
        }

        $sql = "SELECT cart.cart_id, grocery_item.item_name, cart.quantity, grocery_item.price, grocery_item.quantity AS stock
                FROM cart
                JOIN grocery_item ON cart.item_id = grocery_item.gid
                WHERE cart.user_id = $user_id";

        $result = mysqli_query($conn, $sql);

        if ($result && (mysqli_num_rows($result) > 0)) {
            
            $_total = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['quantity'] > 0) {
                    echo "<tr>
            <th scope='row'>
                <div class='d-flex align-items-center mt-2'>";
            echo "<img src = './img/pictures/".$row["item_name"].".jpeg'class='img-fluid rounded-circle' style='width: 90px; height: 90px;' alt=''>
            </div>
            </th>
            ";
            echo "
            <td class='py-5'>".$row['item_name']."
            </td>";
            echo "<td class='py-5'>".$row['price'] ."egp</td>
       ";
            
                echo  "<td class='py-5'>{$row['quantity']}</td>";
                
            
            echo " <td class='py-5'>". ($row['quantity'] * $row['price']) ."egp
        </td>
    </tr>";


                    $_total += $row['quantity'] * $row['price'];
                    
                }
            }
            $_SESSION['total_amount'] = $_total;
           
            



        } else {
            echo "<p>Your cart is empty.</p>";
        }

        mysqli_close($conn);
        ?>
