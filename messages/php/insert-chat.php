<?php 
    session_start();
    if(isset($_SESSION['uid'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['uid'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO message (personB, personA, messageContent)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ./../../Login_SignUp/index.php");
    }


    
?>