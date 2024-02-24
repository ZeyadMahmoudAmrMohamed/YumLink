<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <!-- Favicons -->
  <link href="./img/faviconn.png" rel="icon">
  <link href="./img/faviconn.png" rel="apple-touch-icon">


    <link href="./../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="./../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="./../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="./../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  
    <main>
      <div class="box">
        <script>
          if (window.history && window.history.pushState) {
    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function () {
        window.history.pushState(null, null, window.location.href);
    };
}
        </script>
      <?php 
    

    // Check if the user is already logged in
    if (isset($_SESSION['username'])&&$_SESSION['role']==='user') {
        header("Location: ./../homepage.php"); 
        exit();
        // echo $_SESSION['username'];
    }else if(isset($_SESSION['username'])){
      header("Location: ./../admindashboard.php"); 
      exit();
    }
    // print_r($_SESSION);
    // echo "hello world";
    if (isset($_GET['signup_success']) && $_GET['signup_success'] == 'true') {
     echo "<script type='text/javascript'> alert('Welcome Aboard!✅'); </script>";      
    }
    if (isset($_GET['error'])) {  
     if($_GET['error'] === 'duplicate_username'){
      echo"<script type='text/javascript'> alert('Username already exists. Please choose a different username.❌'); </script>";
     } 
     else if($_GET['error'] === 'invalid_creds_user'){
      echo"<script type='text/javascript'> alert('Invalid User Credentials❌'); </script>";
     }
     else if($_GET['error'] === 'invalid_creds_admin'){
      echo"<script type='text/javascript'> alert('Invalid Admin Credentials❌'); </script>";
     }
     else if($_GET['error'] === 'user_not_found'){
      echo"<script type='text/javascript'> alert('User Not Found❌'); </script>";
     }
     else{
      echo"<script type='text/javascript'> alert({$_GET['error']}); </script>";
     }
     
    }
    ?>
        <div class="inner-box">
          <div class="forms-wrap">

            <form  autocomplete="off" novalidate class="sign-in-form needs-validation" action="signin.php" method="post">
              <div class="logo">
                <img src="./img/faviconn.png" alt="YumLinkImage" />
                <h4>YumLink</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registered yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                  name="email-username"
                  type="text"
                  class="input-field"
                  autocomplete="off"
                  required
                  />
                  <label>Email/Username</label>
                  <div class="valid-tooltip valid">
                    Great!✅
                  </div>
                  <div class="invalid-tooltip invalid" >
                    Email is required❌
                  </div>
                </div>
                

                <div class="input-wrap">
                  <input
                    name="password"
                    type="password"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                  <div class="valid-tooltip valid">
                    Cool!✅
                  </div>
                  <div class="invalid-tooltip invalid" >
                    Password is required❌
                  </div>
                </div>
                

                <input type="submit" value="Sign In" class="sign-btn" />

                <p class="text">
                  Forgotten your password or your login details?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form  autocomplete="off" novalidate class="sign-up-form needs-validation" method="post" action="./signup.php">
              <div class="logo">
                <img src="./img/faviconn.png" alt="easyclass" />
                <h4>YumLink</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap input-firstLast" >
                  <input
                  name="first-name"
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    required
                    pattern=".{3,10}" title="Please enter between 3 and 10 characters"

                  />
                  <label>First Name</label>
                  <div class="valid-tooltip valid">
                    Looks good!✅
                  </div>
                  <div class="invalid-tooltip invalid" >
                    3 to 10 characters❌             
                   </div>
                </div>
                <div class="input-wrap input-firstLast"  >
                  <input
                  name="last-name"
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    required
                    pattern=".{3,10}" title="Please enter between 3 and 10 characters"

                  />
                  <label>Last Name</label>
                  <div class="valid-tooltip valid" >
                    Looks good!✅
                  </div>
                  <div class="invalid-tooltip invalid">
                    3 to 10 characters❌              
                     </div>
                </div>

                <div class="input-wrap">
                  <input 
                  name="email"
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                  />
                  
                  <label>Email</label>
                  <div class="valid-tooltip valid">
                    Looks great!✅
                  </div>
                  <div class="invalid-tooltip invalid">
                    email is required❌
                  </div>
                </div>
                

                <div class="input-wrap">
                  <input
                  name="password"
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[a-zA-Z\d\W_]{8,}$"

                  />
                  <label>Password</label>
                  <div class="valid-tooltip valid">
                    Looks fine!✅
                  </div>
                  <div class="invalid-tooltip invalid" style="margin-bottom: 3vh;">
                     8-255 characters❌
                  </div>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel" >
            <div class="images-wrapper">
              <img src="./img/image2ready.jpg" class="image img-1 show" 
              style="border-radius: 1rem; height:91%; width:91%; margin: auto;"
              alt="" />
              <!-- <img src="./img/image2Readyy.png" style="height: 85%;" class="image img-2" alt="" /> -->
              <img src="./img/imaa.jpg" style="border-radius: 1rem; height:91%; width:91%; margin: auto;" class="image img-2" alt="" />
              <!-- <img src="./img/image3ready.png" style="height: 95%;" class="image img-3" alt="" /> -->
              <img src="./img/faviconn.png" style="border-radius: 1rem; height:91%; width:85%; margin: auto;" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group" style="font-size: 3px;">
                  <h2>Create your own Recipes</h2>
                  <h2>Share it with your friends</h2>
                  <h2>Explore new Recipes and Friends!</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
