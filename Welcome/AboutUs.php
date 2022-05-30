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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="../index1.css">
    <link rel="stylesheet" href="about.css">
    <title>About Us</title>
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

    <section class="about" id="about" style="margin-top:5%">
        <div class="container">
            <div class="heading text-center" >
                <h2 >About
                    <span style="color:#e55951">Us</span></h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="../img/aboutus3.jpg" alt="about" class="img-fluid" width="100%" id="aboutus-image">
                </div>
                <div class="col-lg-6">
                    <h3 id="about-us-section" style="color:#e55951">KIDS STORE : Where kids are a big deal! </h3>
                    <p>Our website is the beloved brand of kids all over the world…and we know how to have lotsa fun! You can explore awesome DIY play activities, toy reviews, printable fun and, of course, SO many toys! The hottest, the gotta-have-’ems, the new favorite besties and more. Explore incredible collections of kids’ toys online, here at Kids Toys!</p>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>Awesome Design</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>
                                Creative Design</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>Better Client Service</h4>
                        </div>
 
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>
                                Speed And Flexibility</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <!---------------- news-letter-section ----------------------->
        <section class="news-letter" id="News-letter">
            <div class="news ">
              <div class="container">
                <h1 class="news-heading">Subscribe To Get The Latest <br> News About Us</h1>
                <p class="des how-de">Get the Latest news about toys , drop your <br> email below to
                  get daliy update about us</p>
                <form action="">
                  <input type="email"  maxlength="50" required placeholder="Enter your email address">
                  <button class="bt" style="background-color:#e55951">Subscribe</button>
                </form>
              </div>
            </div>
          </section>
    </section>
  
  <section class="aboutUs"> 
    <div id="Aabout">
      <div class="Aabout mm">
        <img src="../img/Majd.gif" alt="" >
        <h2 class="abouth2">Majd Albalawneh</h2>
        <p class="aboutp">
          Full Stack Web Developer
        </p>
        <h1><a href="https://github.com/majdalbalawneh" target="_blank"><i class="fab fa-github"></i></a>
          <a href="https://www.facebook.com/profile.php?id=100028713081196"><i class="fab fa-facebook" target="_blank"></i></a>
          <a href="https://www.linkedin.com/in/majd-al-balawneh-a037411b7/" target="_blank"><i class="fab fa-linkedin"></i></a>
          <a href="https://majdalbalawneh.github.io/project1/" target="_blank"><i class="fas fa-address-card"></i></a>
        </h1>
      </div>
      

  
      <div class="Aabout ss">
        <img src="../img/ss.png" alt="" class="aboutimg">
        <h2 class="abouth2">Samar alkhamis</h2>
        <p class="aboutp">
          Full Stack Web Developer
        </p><br>
        <h1><a href="https://github.com/samaralkhamis" target="_blank"><i class="fab fa-github"></i></a>
          <a href="https://www.facebook.com/samar.alkhamis.98"><i class="fab fa-facebook" target="_blank"></i></a>
          <a href="https://www.linkedin.com/in/samar-alkhamis-942a92151/" target="_blank"><i class="fab fa-linkedin"></i></a>
          <a href="https://samaralkhamis.github.io/Projects/" target="_blank"><i class="fas fa-address-card"></i></a>
        </h1>
      </div>
    
    


      <div class="Aabout tt">
        <img src="../img/tt.png" alt="" class="aboutimg">
        <h2 class="abouth2">Taebah shlouh</h2>
        <p class="aboutp">
          Full Stack Web Developer
        </p><br>
        <h1><a href="https://github.com/taebah-alshlouh" target="_blank"><i class="fab fa-github"></i></a>
          <a href="https://www.facebook.com/profile.php?id=100007055973576"><i class="fab fa-facebook" target="_blank"></i></a>
          <a href="https://www.linkedin.com/in/majd-al-balawneh-a037411b7/" target="_blank"><i class="fab fa-linkedin"></i></a>
          <a href="https://taebah-alshlouh.github.io/project1/" target="_blank"><i class="fas fa-address-card"></i></a>
        </h1>
      </div>
      

     

      <div class="Aabout tttt">
        <img src="../img/100212077.png" alt="" class="aboutimg">
        <h2 class="abouth2">Tamara Alshabatat</h2>
           <p class="aboutp">
            Full Stack Web Developer
          </p>
          <h1><a href="https://github.com/tamara126enad" target="_blank"><i class="fab fa-github"></i></a>
            <a href=" https://www.facebook.com/TamaraAlShbat"><i class="fab fa-facebook" target="_blank"></i></a>
            <a href="https://www.linkedin.com/in/tamara-al-shabatat-060452123/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href=" https://tamara126enad.github.io/Academy-projects/" target="_blank"><i class="fas fa-address-card"></i></a>
          </h1>
       
    
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