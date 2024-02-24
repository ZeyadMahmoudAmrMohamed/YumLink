<?php session_start();



?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/faviconn.png" rel="icon">
  <link href="assets/img/faviconn.png" rel="apple-touch-icon">

 
 
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
  <link href="./assets/css/bgstyle.css" rel="stylesheet">
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
        <img src="./assets/img/posts/faviconn.png" alt="Logo">
        <span class="d-none d-lg-block">YumLink</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" ></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="#">
        <input type="text" name="query" placeholder="Search" title="Search for Profiles, Recipes, Groups">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="./profilepage.html" data-bs-toggle="dropdown">
            <!-- profile image -->
            <img src="./assets/img/posts/admin.jpg"  alt="Profile" class="rounded-circle">
            <!-- profile username -->
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php
              echo $_SESSION['username'];
              ?>
            </span>

          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php
                            echo $_SESSION['username'];

              ?></h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
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
    <section id="up" ></section>
    <section id="down"></section>
    <!-- <section id="left"></section>
    <section id="right"></section> -->
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-heading">Separator</li>

      <li class="nav-item">
        <a class="nav-link " href="./admindashboard.php">
          <i class="bi bi-grid"></i>
          <span>Recipes Feed</span>
        </a>
      </li><!-- End Dashboard Nav -->
     
      <li class="nav-heading">Separator</li>

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="./restock.php">
          <i class="bi bi-cart2"></i>
          <span>Store Restock/Add Items</span>
        </a>
      </li>


      <li class="nav-heading">Separator</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./usersPreview.php">
          <i class="bi bi-person"></i>
          <span>Users Preview</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="./usersControls.php">
          <i class="bi bi-person"></i>
          <span>Users Controls</span>
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

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            <div class="d-grid gap-2 mt-3">
        <button id="showFormButton" class="btn btn-secondary">Add New Item</button></div>
        
        <br>
        <?php
require './config.php';
$sql = "SELECT * FROM grocery_item WHERE gid={$_GET['gid']}";
$ret = mysqli_query($conn, $sql);
if($ret){ $row = mysqli_fetch_assoc($ret);}
?>
        <div class="card"  >
            <div class="card-body" >
              <h5 class="card-title">Update Grocery Item Form</h5>

              <!-- Floating Labels Form -->
              <form method="get"  action="./controllers/updateGroceryItem.php" class="row g-3">
                <input type="hidden" name="gid" value='<?php echo $_GET['gid'];?>'>
              <div class="col-md-4">
                  <div class="form-floating">
                    <input value="<?php echo $row['item_name'];?>" required type="text" class="form-control" name="item_name" id="floatingName" placeholder="Item Name">
                    <label for="floatingName">Item Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input value="<?php echo $row['quantity'];?>" required type="number" class="form-control" name="quantity" id="floatingEmail" placeholder="Quantity">
                    <label for="floatingEmail">Quantity</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input value="<?php echo $row['price'];?>" required type="number" class="form-control" name="price" id="floatingPassword" placeholder="Price">
                    <label for="floatingPassword">price</label>
                  </div>
                </div>
                
                <div class="col-md-1">
                  
                    <div class="form-floating">
                      <input value="<?php echo $row['is_veg'];?>" required type="number" min=0 max=1 value=0 class="form-control" name="is_veg" id="floatingCity" placeholder="isVegetarian">
                      <label for="floatingCity">isVeg</label>
                    </div>
                  
                </div>
                <div class="col-md-2">
                  <div class="form-floating mb-3">
                  <input value="<?php echo $row['gType'];?>" required type="text" name="gType" class="form-control"  id="floatingSelect" placeholder="type">

                    <label for="floatingSelect">Type</label>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-floating">
                    <input value="<?php echo $row['gDesc'];?>" required type="text" name="gDesc" class="form-control" id="floatingZip" placeholder="Description">
                    <label for="floatingZip">Description</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>


          

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 

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