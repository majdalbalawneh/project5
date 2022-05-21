<?php
session_start();
include_once '../Configration/connection.php';
if (isset($_GET['submit'])){
     
    $loginEmail=$_GET['loginEmail'];
    $_SESSION['email']=$loginEmail;
    $loginPassword=$_GET['loginPassword'];
    $adminEmail_correct=true;
    $adminPass_correct=true;
    $loginEmail_correct =true;
    $loginPassword_correct=true;
    $sql1="SELECT * FROM register WHERE Email='$loginEmail';";
    $result= mysqli_query($conn,$sql1);
    $result_check= mysqli_num_rows($result);
    if ($result_check > 0) {
       
        while ($row=mysqli_fetch_assoc($result)) {

            print_r($row['Email']);
            print_r($row['Password']);

                if(($loginPassword==$row['Password'])){
                    $loginPassword_result="<span style=' color:green'>✅ Correct Password</span><br>";
                    $loginPassword_correct=true;
                   
                }else{
                    $loginPassword_result="<span style=' color:red'>❌Incorrect Password</span><br>";
                    $loginPassword_correct=false;
            }
        }
        
    }   
    
    if($loginEmail_correct && $loginPassword_correct){
        header('location:../index.html');
      
        $row['last-login']= date("d-m-Y - h:i:sa");
        
    }else
    echo '<script language="javascript">';
    echo 'alert("Incorrect Information")'; 
    echo '</script>';

    
    if($loginEmail=="admin@gmail.com"){
		if($loginPassword== "AdminAdmin1"){
            $loginEmail_result="<span style=' color:green'>✅ Correct Email</span><br>";
			$adminEmail_correct=true;
			$adminPass_correct=true;
	
		}else{
			$loginPassword_result="<span style=' color:red'>❌Incorrect Password</span><br>";
	    	$adminPass_correct=false;
		}
	}else{
		$loginEmail_result="<span style=' color:red'>❌Incorrect Email or Password</span><br>";
		$adminEmail_correct=false;
	}
	if ($adminEmail_correct && $adminPass_correct ){
		header('location:../Admindashboard.php');
	}
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
    <link rel="stylesheet" href="style1.css">
    <title>Login</title>
</head>
<body>

<div class="navbar">
       <div class="logo"><img src="../img/logo_kids.gif"width="100px"> </div>
      
       <nav style="font-family: 'Nunito', sans-serif;
font-family: 'Patrick Hand', cursive;">
<ul style="margin-right: 5%; font-family: 'Nunito', sans-serif;
font-family: 'Patrick Hand', cursive;">
<li><a href="../index.html">Home</a></li>
<li><a href="../product/product.php">Products</a></li>
<li><a href="../Welcome/ContactUs.html">Contact Us</a></li>
<li><a href="../Welcome/AboutUs.html">About US</a></li>

<li><a href="../Login/Login.php">Login</a></li>
<li><a href="../Regestration/Signup.php">Sign Up</a></li>
<li><a href=""><img style="position:absolute; margin-top:-2.5%; width:4%" src="../img/cart2.png" ></a></li>

</ul> <hr style="width:70%; margin-left: 31%;">
</nav>
      
    </div>
    
        <form method="GET" class="reg-form">
        <fieldset>
        <h1 class="legend"><strong>L</strong>OGIN</h1><hr>
                <p class="welc">Welcome back! Login with your credentials</p>
                <div class="txt">
                <label class="reg-lbl" style="font-size:20px;font-weight: bold;color: green;">Email</label>
                <br>
                <!--Email-->
                <input type="email" name="loginEmail" id="loginEmail"   placeholder="Your Email" required ><br>
                <?php if(isset($loginEmail_result)){echo $loginEmail_result;}?>
                <br>
                <!--Password-->
                <label class="reg-lbl" style="font-size:20px;font-weight: bold;color: green;">Password</label>
                <br>
                <input type="password" name="loginPassword" id="loginPassword"   placeholder="Password" required><br>
                <?php if(isset($loginPassword_result)){echo $loginPassword_result;}?>
                <br>
                <input class="btn btn-warning"type="submit" value="Submit" name="submit">
<br><br>
                <span> <label class="link"> Don`t have an account !!<a href='../Regestration/Signup.php'>Sign Up</a></label></span><br>
                </div>
                <!-- Regestration/Signup.php -->
</fieldset>
        </form>


        <marquee behavior="alternate">
    <img src="https://img.freepik.com/free-vector/kids-train-toy-cartoon-style-vector-illustration-isolated-white-background_356415-1272.jpg?size=626&ext=jpg" alt="">
  </marquee>


<!-- //////////////////footer -->
<div class="container-fluied">
    <!-- Footer -->
    <footer
            class="text-center text-lg-start text-primary"
            style="background: linear-gradient(to right, rgba(216, 112, 147, 0.377),rgba(216, 112, 147, 0.235), rgba(216, 112, 147, 0.087));"           
            >
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Toys Shop
              </h6>
              <p>
                Toys shop has announced that Toys store is opening , its separate platform that provides The most distinctive games that the child spends his time enjoying and learning, has amassed more than 35 million customers.
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Categores</h6>
              <p >
                <a class="text-primary">Electronic Toys</a>
              </p>
              <p>
                <a class="text-primary">Crative Toys</a>
              </p>
              <p>
                <a class="text-primary">Educational Toys</a>
              </p>
              <p>
                <a class="text-primary" >Dolls Toys</a>
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact Us</h6>
              <p><i class="fas fa-home mr-3"></i> Aqaba , Jordan</p>
              <p><i class="fas fa-envelope mr-3"></i> info@mail.com</p>
              <p><i class="fas fa-phone mr-3"></i> +960 7710101010</p>
            </div>
            <!-- Grid column -->
  
            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
  
              <!-- linkedin majd -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #3b5998"
                 href="#!"
                 role="button"
                 ><i class="fab fa-facebook-f"></i
                ></a>
  
              
  
              <!-- github samer -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #dd4b39"
                 href="#!"
                 role="button"
                 ><i class="fab fa-google"></i
                ></a>
  
              
                    <br>
              <!-- Linkedin -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #0082ca"
                 href="https://www.linkedin.com/in/tamara-al-shabatat-060452123/?challengeId=AQFBHTafIZQKgAAAAYAhs1i-oKYMHGzoCp7CFeBZxbEnPZafk74JDnX6xmEwh0tDvN3Eq6-LHqiH4WRl2oxvFyTOX64Dyzv3lQ&submissionId=3ffc26ce-3a62-e516-90b4-716d0cbeeb40"
                 role="button" target="_blank"
                 ><i class="fab fa-linkedin-in"></i
                ></a>
              <!-- Github -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #333333"
                 href="https://github.com/majdalbalawneh"
                 role="button" target="_blank"
                 ><i class="fab fa-github"></i
                ></a>
            </div>
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        MST<sup>2</sup>&nbsp; © 2022 Copyright:
        <a  href="https://www.orange.jo/ar/pages/default.aspx" target="_blank">Orange.jo</a> 
          
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->


</body>
</html>