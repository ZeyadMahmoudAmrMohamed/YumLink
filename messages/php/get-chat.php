<?php 
    session_start();
    if(isset($_SESSION['uid'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['uid'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM message LEFT JOIN page_user ON page_user.uid = message.personA
                WHERE (personB = {$outgoing_id} AND personA = {$incoming_id})
                OR (personB = {$incoming_id} AND personA = {$outgoing_id}) ORDER BY mid";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['personA'] == $outgoing_id){
                    $output .= "<div class=' chat outgoing'>
                                <div class='details'>
                                    <p class='message' data-message='{$row['messageContent']}'>". $row['messageContent'] ."</p>
                                </div>
                                </div>";
                                
                }else{
                    // $output .= "<div class='chat incoming'>
                    //             <img src='./../assets/img/profile-pictures/'.$row["first_name"].$row["last_name"].".jpg"."' alt=''>
                    //             <div class='details'>
                    //                 <p data-message='{$row['messageContent']}'>". $row['messageContent'] ."</p>
                    //             </div>
                    //             </div>";

                                $output .= "<div class='message chat incoming'>
                                <img src='./../assets/img/profile-pictures/".$row['first_name'].$row['last_name'].'.jpg'."'alt=''>
                                <div class='details'>
                                    <p class='message' data-message='{$row['messageContent']}'>". $row['messageContent'] ."</p>
                                </div>
                                </div>";
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ./../../Login_SignUp/index.php");
    }

?>
<script>
   document.addEventListener('keydown', function (event) {
            var activeElement = document.activeElement;
            var messageInput = document.getElementById('messageInput');

            if (event.key === 't' && activeElement !== messageInput) {
                var messages = document.querySelectorAll('.message');
                var lastMessage = messages[messages.length - 1];
                var messageText = lastMessage.getAttribute('data-message');

                var speechSynthesis = window.speechSynthesis;
                var speechUtterance = new SpeechSynthesisUtterance(messageText);
                speechSynthesis.speak(speechUtterance);
            }
        });
        document.getElementById('speechToTextButton').addEventListener('click', function () {
            var recognition = new webkitSpeechRecognition(); 

            recognition.onresult = function (event) {
                var transcript = event.results[0][0].transcript;

                document.getElementById('messageInput').value += transcript + ' ';
            };

            recognition.start();
        });
</script>