<?php
    session_start();
    require './config.php';
    require './../config.php';
    try{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usernameoremail = $_POST['email-username'];
            $password = $_POST['password'];
        
            // $hashedPassword = hash('sha256',$password, PASSWORD_DEFAULT);
            $hashedpassword = $password;
            
            $stmtPageUser = $pdo->prepare("SELECT first_name,last_name,uid,email,user_name, pass FROM page_user WHERE email=? OR user_name=?");
            $stmtPageUser->execute([$usernameoremail,$usernameoremail]);
            $stmtAdmin = $pdo->prepare("SELECT adminid,user_name,pass,type_of_authority FROM admin WHERE user_name = ? ");
            $stmtAdmin->execute([$usernameoremail]);

            $user = $stmtPageUser->fetch(PDO::FETCH_ASSOC);
            $admin = $stmtAdmin->fetch(PDO::FETCH_ASSOC);

            if($user){
                if($hashedpassword===$user['pass']){

                    session_start();
                    $_SESSION['username'] = $user['user_name'];
                    $_SESSION['uid'] = $user['uid'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['first-name'] = $user['first_name'];
                    $_SESSION['last-name'] = $user['last_name'];
                    
                    $status = "Active now";
                    $sql2 = mysqli_query($conn, "UPDATE page_user SET status = '{$status}' WHERE uid = {$user['uid']}");
                    if($sql2){
                       // $_SESSION['uid'] = $row['uid'];
                        echo "success";
                    }else{
                        echo "Something went wrong. Please try again!";
                    }
                    $_SESSION['role'] = 'user';
                    header("Location: ./../homepage.php");
                    exit();
                }
                else{
                    header("Location: ./index.php?error=invalid_creds_user");
                }

            }else if($admin){
                if($hashedpassword===$admin['pass']){
                    session_start();
                    $_SESSION['role'] = 'admin';
                    $_SESSION['username'] = $admin['user_name'];
                    $_SESSION['adminid'] = $admin['adminid'];
                    $_SESSION['type_of_authority'] = $admin['type_of_authority'];
                    
                    header("Location: ./../admindashboard.php");
                    exit();
                }else{
                    header("Location: ./index.php?error=invalid_creds_admin");
                }
            }else {
                header("Location: ./index.php?error=user_not_found");

            }
        }
    } catch (Exception $e) {
       
            header("Location: ./index.php?error=sql error try again. {$e->getMessage()}");
            exit();
        
    }
?>