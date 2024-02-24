<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['uid'])){
    header("location: ./../Login_SignUp/index.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM page_user WHERE uid = {$_SESSION['uid']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <!-- <img src="./../assets/img/profile-pictures/" alt=""> -->
          <img src="<?php echo "./../assets/img/profile-pictures/".$row['first_name'].$row['last_name'].'.jpg' ;?> " alt="">
          <div class="details">
            <span><?php echo $row['first_name']. " " . $row['last_name'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
      </header>
      <div class="search">
        <span class="text">Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
