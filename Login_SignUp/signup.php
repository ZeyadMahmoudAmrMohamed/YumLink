
<?php
    require 'config.php';
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstname = $_POST['first-name'];
            $lastname = $_POST['last-name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = '@'.$firstname.'_'.$lastname;
        
            // $hashedPassword = hash('sha256',$password, PASSWORD_DEFAULT);
            $hashedPassword = $password;
            $stmt = $pdo->prepare("INSERT INTO page_user (first_name,last_name,user_name, email, pass) VALUES (?, ?, ?,?,?)");
            $stmt->execute([$firstname,$lastname,$username, $email, $hashedPassword]);

            // Redirect or show success message after successful registration
            header("Location: ./index.php?signup_success=true");
            exit();

        }
    } catch (Exception $e) {
        if ($e->getCode() == '23000') {
            // Duplicate entry error handling (unique constraint violation)
            // Redirect or display a message indicating the username is already taken
            header("Location: ./index.php?error=duplicate_username");
            exit();
        } else {
            // Other database-related errors
            echo "Database error: " . $e->getMessage();
        }
    }
?>