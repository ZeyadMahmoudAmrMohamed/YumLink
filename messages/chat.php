<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['uid'])){
    header("location: ./../Login_SignUp/index.php");
  }
?>
<?php include_once "header.php"; ?>
<head>
  <link rel="stylesheet" href="./../assets/vendor/bootstrap/css/bootstrap-grid.css">
</head>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM page_user WHERE uid = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="./../assets/img/profile-pictures/<?php echo $row['first_name'].$row['last_name'].'.jpg'; ?>" alt="">
        <div class="details">
          <span><?php echo $row['first_name']. " " . $row['last_name']; ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" id="messageInput" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
        
      </form>
      <div class="d-grid gap-2 mt-3">
                <button class="btn btn-primary" style="margin:2px;padding: 2px;" id="speechToTextButton" type="button">Speech to Text</button>
              </div>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
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
</body>
</html>
