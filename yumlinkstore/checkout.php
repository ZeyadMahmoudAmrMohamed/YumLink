<?php session_start();

error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>YumLinkStore</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link href="./img/faviconn.png" rel="icon">
        <link href="./img/faviconn.png" rel="apple-touch-icon">

        <!-- Google Web Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">  -->

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top" style="background-color: #25424C;">

            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl">

                    <a href="/index.php" class="navbar-brand"><span><img src="./img/faviconn.png" style="width: 10%; height: 10%;" alt=""></span><h3 style="display: inline; color: #FFEBDB; font-weight: bold;" class="">YumLinkStore</h3></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarCollapse">
                        <div class="navbar-nav mx-auto" style="color:#FFEBDB">
                            <a href="./../Login_SignUp/index.php" class="nav-item nav-link active" >Home</a>
                            <a href="./shop.php" class="nav-item nav-link">Shop</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >Pages</a>
                                <div class="dropdown-menu m-0  rounded-0" style="color:#FFEBDB;">
                                    <a href="./cart.php" class="dropdown-item">Cart</a>
                                    <a href="./checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="./../Login_SignUp/index.php" class="nav-item nav-link">Timeline</a>
                            <a href="./../Login_SignUp/signout.php" class="nav-item nav-link">Log Out</a>

                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->



    



       

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Checkout</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Checkout</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Billing details</h1>
                <!-- <form action="#"> -->
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            
                <iframe src="./../creditcard/index.php"width="600" height="900" frameborder="0"></iframe>
                            
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Products</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    <form action = "./finalCartTable.php" method='POST'>
                                        
                                        <?php require './finalCartTable.php';?>
                                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4"><?php if($_SESSION['total_amount']) echo intval($_SESSION['total_amount'])+20; else  echo "0";?>.00 egp</p>
                            </div>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <input name="generate_receipt" <?php if(!isset($_GET['cardNumber'])||!(($_SESSION['addedToCart'])||!(true===($_SESSION['addedToCart'])))) echo "disabled"; ?>  type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" value="Place Order">
                    </form>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
        <!-- Checkout Page End -->


        
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        function handleFormSubmission() {
          window.location.href = "index.php"; // Replace with the desired URL
        }
      </script>
    </body>

</html>