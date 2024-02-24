<?php session_start();
require './config.php';
$sql = "SELECT * FROM page_user WHERE uid={$_GET['uid']}";
$ret = mysqli_query($conn, $sql);
if($ret){
  $userinfo = mysqli_fetch_assoc($ret);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Homepage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/posts/faviconn.png" rel="icon">
  <link href="./assets/img/posts/faviconn.png" rel="apple-touch-icon">

 
 
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/css/createPost.css">
  <link href="./assets/css/style.css" rel="stylesheet">
  <!-- <link href="./assets/css/bgstyle.css" rel="stylesheet"> -->
  <script>
    src="https://kit.fontawesome.com/ba57058827.js"
    crossorigin="anonymous"

</script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  
</head>

<body>
  
   <?php 
  if (!isset($_SESSION['username'])) {
    
    header("Location: ./Login_SignUP/index.php"); // Redirect to a different page after login
    exit();
  }
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="./Login_SignUp/index.php" class="logo d-flex align-items-center">
        <img src="./assets/img/posts/faviconn.png" alt="">
        <span class="d-none d-lg-block">YumLink</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" ></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="#">
        <input type="text" id="myInput" onkeyup="myFunction()" name="query" placeholder="Search" title="Search for Profiles, Recipes, Groups">
        <div><ul id="myUL" style="list-style-type: none;">
  
  <?php
  require './config.php';
  $query = "SELECT `uid`, `first_name`, `last_name` FROM `page_user` WHERE 1";
  $ret = mysqli_query($conn, $query);
  if($ret){
      while($row = mysqli_fetch_assoc($ret)){
        echo "<li><a href = './anotherProfilePage.php?uid={$row['uid']}&role=user'>{$row['first_name']}  {$row['first_name']}</a></li>";
      }
  
    }
  ?>
</ul></div>
       
        <button type="submit"  title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="./messages/index.php" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="./profilepage.html" data-bs-toggle="dropdown">
            <!-- profile image -->
            <img src=<?php if($_SESSION['role']==='user') echo "./assets/img/profile-pictures/".$_SESSION['first-name'].$_SESSION['last-name'].'.jpg' ;?>  alt="Profile" class="rounded-circle">
            <!-- profile username -->
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php
              echo $_SESSION['first-name'].' '.$_SESSION['last-name'];
              ?>
            </span>

          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php
              echo $_SESSION['first-name'].' '.$_SESSION['last-name'];
              ?></h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./profilepage.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./Login_SignUp/signout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <!-- style="background-image: url('./assets/img/wave_background.svg');  background-repeat: no-repeat; background-size: cover;" -->
    <!-- <section id="up" ></section>
    <section id="down"></section>
    <section id="left"></section>
    <section id="right"></section> -->
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-heading">Separator</li>

      <li class="nav-item">
        <a class="nav-link " href="./homepage.php">
          <i class="bi bi-grid"></i>
          <span>Recipes Feed</span>
        </a>
      </li><!-- End Dashboard Nav -->
     
      <li class="nav-heading">Separator</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-bookmark"></i>
          <span>Saved Recipes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="./yumlinkstore/shop.php">
          <i class="bi bi-cart2"></i>
          <span>Shopping Cart</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./chat.php">
          <i class="bi bi-chat-left-text"></i>
          <span>Messages</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-bell"></i>
          <span>Notifications</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="./findRecipesIngredients/index.html">
        🍔
          <span>Explore Recipes</span>
        </a>
      </li>

      <li class="nav-heading">Separator</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./profilepage.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="./Login_SignUp/signout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
         
            
         <?php  $sql = "SELECT * FROM post WHERE user_id = {$userinfo['uid']} order by published_at desc "; 
         require "./postdesign.php";?>
          
          
           
            

          </div>

        </div>
            <!-- </div>
          </div>
        </div> -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          
          
          
            <div class="card shadow">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
  
                <img src="<?php echo "./assets/img/profile-pictures/".$userinfo['first_name'].$userinfo['last_name'].'.jpg' ;?>" alt="Profile" class="rounded-circle">
               
                <h2 style="color: #25424C; margin-top: 10%;"> <?php echo $userinfo['first_name'].' '.$userinfo['last_name'];?>   <?php
 if($userinfo['isVerified']==1){
  echo "    <i class='bi bi-patch-check-fill'></i>";
}
?></h2>
<?PHP if($_SESSION['uid']!=$userinfo['uid']) echo "<div>
<a href='./controllers/followUser.php?following=$userinfo[uid]'><button type='button'  class='btn btn-primary'><i class='bi bi-person me-1'></i> follow </button>
</a>
</div>
";?>
                
                <div class="social-links mt-2">
                  <a href="<?php echo isset($userinfo['twitter'])?$userinfo['twitter']:"https://twitter.com/#";?>" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="<?php echo isset($userinfo['facebook'])?$userinfo['facebook']:"https://facebook.com/#";?>" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="<?php echo isset($userinfo['instagram'])?$userinfo['instagram']:"https://instagram.com/#";?>" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="<?php echo isset($userinfo['linkedin'])?$userinfo['linkedin']:"https://linkedin.com/#";?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
  
          
          
          
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>YumLink</span></strong>. No Rights Reserved 
    </div>
   
  </footer>End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>