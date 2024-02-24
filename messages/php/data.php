<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM message WHERE (personB = {$row['uid']}
                OR personA = {$row['uid']}) AND (personA = {$outgoing_id} 
                OR personB = {$outgoing_id}) ORDER BY mid DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['messageContent'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['personA'])){
            ($outgoing_id == $row2['personA']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['uid']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="./chat.php?user_id='. $row['uid'] .'">
                    <div class="content">
                    <img src="./../assets/img/profile-pictures/'. $row['first_name'].$row['last_name'].'.jpg' .'" alt="">
                    <div class="details">
                        <span>'. $row['first_name']. " " . $row['last_name'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>