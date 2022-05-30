<?php
session_start();
if(!empty($_SESSION['email'])){
  echo "<style> .restrict{display:none;} </style>";
  echo "<style> .restrict1{display:inline;} </style>";

}else{echo "<style> .restrict{display:inline;} </style>";
echo "<style> .restrict1{display:none;} </style>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="../index1.css">


    <title>Contact Us</title>
</head>

<body>
<div class="container-fluied">
        <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="">
        <img src="../img/logo_kids.gif" alt="logo" width="50px">
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="../index1.php"><strong>Home</strong>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../product/product.php"><strong>Products</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Welcome/ContactUs.php"><strong>Contact Us</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Welcome/AboutUs.php"><strong>About Us</strong></a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item restrict">
            <a href="../Login/Login.php" class="nav-link waves-effect">
            <strong> Login</strong>
            </a>
          </li>
          <li class="nav-item restrict">
            <a href="../Regestration/Signup.php" class="nav-link waves-effect"><strong>Signup</strong>
            </a>
          </li>
          <li class="nav-item restrict1">
            <a class="nav-link waves-effect" href="../User/User.php">
            <i class="fa fa-user" aria-hidden="true"></i>
              <span class="clearfix d-none d-sm-inline-block"><strong>Account</strong></span>
            </a>
          </li>
         
         

          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Cart/cart.php">
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"><strong>Cart</strong></span>
            </a>
          </li>
          <li class="nav-item restrict1">
            <a href="../Login/logout.php" class="nav-link waves-effect"><strong>Logout</strong>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
         
    <section class="contact" id="contact" style="margin-top:5%">
        <div class="container">
            <div class="heading text-center">
                <h2>Contact
                    <span style="color:#e55951"> Us </span></h2>
                <p>Stay In Touch</p>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="title">
                        <h3 style="color:#e55951">Contact detail</h3>
                    </div>
                    <div class="content">
                        <!-- Info-1 -->
                        <div class="info">
                            <i class="fas fa-mobile-alt"></i>
                            <h4 class="d-inline-block" style="color:#e55951; margin-top:-20%">Call Us :
                                <br>
                                <span>+12457836913 , +12457836913</span></h4>
                        </div>
                        <!-- Info-2 -->
                        <div class="info">
                            <i class="far fa-envelope"></i>
                            <h4 class="d-inline-block" style="color:#e55951; margin-top:-20%">EMAIL Us :
                                <br>
                                <span> KidsToys@gmail.com</span></h4>
                        </div>
                        <!-- Info-3 -->
                        <div class="info">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4 class="d-inline-block" style="color:#e55951 ; margin-top:-20%">ADDRESS :<br>
                                <span>6743 last street , Abcd, Xyz</span></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment" placeholder="Message"></textarea>
                        </div>
                        <button class="btn btn-block" style="background-color:#e55951" type="submit">Send</button>
                    </form>
                </div>
            </div>

            <!--------------------- map section ----------------------->
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13882.352531894103!2d35.0057587!3d29.557486499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sjo!4v1652880476038!5m2!1sen!2sjo" width="100%" height="350px" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> 
        </div>
    </section>
<!-- Start Footer bottom Area -->
<footer >
  <div class="footer-area-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-icons">
            <ul>
              <li>
                <a href=""><i style="font-size:27px ; margin-top:4%" class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/company/toysrus/">
                <i style="font-size:27px ; margin-top:4%" class="fab fa-linkedin-in"></i>
                </a>
              </li>
              <li>
                <a href="https://github.com/samaralkhamis/Project5PHP">
                <i style="font-size:27px ; margin-top:4%" class="fab fa-github-alt"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-md-12 col-md-12">
          <div class="credits">
            <a href="#">Privacy Policy</a> | Terms & Condition
          </div>
          <div class="copyright text-center">
            <p>
              &copy; Copyright 2022 .  <strong>KIDSTOYS</strong><br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>