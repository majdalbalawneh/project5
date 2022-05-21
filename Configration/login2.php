<?php
session_start();

include_once './connection.php';  #tama
#include_once '../Configration/connection.php'; #sama


if (isset($_POST['submit'])){
     
    $loginEmail=$_POST['loginEmail'];
    $_SESSION['email']=$loginEmail;
    $loginPassword=$_POST['loginPassword'];
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
                    // $loginPassword_result="<span style=' color:green'>✅ Correct Password</span><br>";
                    $loginPassword_correct=true;

                }else{
                    $loginPassword_result="<span style=' color:red'>❌Incorrect Password</span><br>";
                    $loginPassword_correct=false;
            }
        }
        
    }   
    
    if($loginEmail_correct && $loginPassword_correct)
    {
        header('location:landing2.html');
        $row['last-login']= date("d-m-Y - h:i:sa");
        
    }else
    echo '<script language="javascript">';
    echo 'alert("Incorrect Information")'; 
    echo '</script>';

    
    if($loginEmail=="admin@gmail.com"){
		if($loginPassword== "AdminAdmin1"){
            // $loginEmail_result="<span style=' color:green'>✅ Correct Email</span><br>";
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
		header('location:../Admin/Admin.php');
	}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./style1.css">
    <title>Login</title>
</head>
<body>
        <form method="post" class="reg-form">
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
                <input type="submit" value="Submit" name="submit"><br><br>
                <span> <label class="link"> Don`t have an account !!<a href='./register.php'>Sign Up</a></label></span><br>
                </div>
                <!-- Regestration/Signup.php -->
</fieldset>
        </form>


        <marquee behavior="alternate">
    <img src="https://img.freepik.com/free-vector/kids-train-toy-cartoon-style-vector-illustration-isolated-white-background_356415-1272.jpg?size=626&ext=jpg" alt="">
  </marquee>



  <div class="container-fluied">
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background-color: #929fba"
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
              Unique kids has announced that Toys store is opening , its separate platform that provides The most distinctive games that the child spends his time enjoying and learning, has amassed more than 35 million customers.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Categores</h6>
            <p>
              <a class="text-white">Electronic Toys</a>
            </p>
            <p>
              <a class="text-white">Crative Toys</a>
            </p>
            <p>
              <a class="text-white">Educational Toys</a>
            </p>
            <p>
              <a class="text-white">Dolls Toys</a>
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
            <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

            <!-- Facebook -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #3b5998"
               href="#!"
               role="button"
               ><i class="fab fa-facebook-f"></i
              ></a>

            <!-- Twitter -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #55acee"
               href="#!"
               role="button"
               ><i class="fab fa-twitter"></i
              ></a>

            <!-- Google -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #dd4b39"
               href="#!"
               role="button"
               ><i class="fab fa-google"></i
              ></a>

            <!-- Instagram -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #ac2bac"
               href="#!"
               role="button"
               ><i class="fab fa-instagram"></i
              ></a>

            <!-- Linkedin -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #0082ca"
               href="#!"
               role="button"
               ><i class="fab fa-linkedin-in"></i
              ></a>
            <!-- Github -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #333333"
               href="#!"
               role="button"
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
      Â© 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/"
         >MDBootstrap.com</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</div>
</body>
</html>