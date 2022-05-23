<?php
     include_once './connection.php';  #tama
     #include_once '../Configration/connection.php'; #sama
    
     $reg_name="/^([a-zA-Z' ]+)$/";
     $reg_PhoneNum="/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/";
     $reg_email="/^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z0-9][-\.]{0,1}([a-zA-Z][-\.]{0,1})*[a-zA-Z0-9]\.[a-zA-Z0-9]{1,}([\.\-]{0,1}[a-zA-Z]){0,}[a-zA-Z0-9]{0,}$/i";
     $firstName_done=false;
     $SecName_done=false;
     $LastName_done=false;
     $DateOfBirt_done=false;
     $Number_done=false;
     $Email_done=false;
     $Pass_done=false;
     $ConfirmPassword_done=false;

     if (isset($_POST['submit'])){
     $fname=$_POST['First_Name'];
     $sname=$_POST['Sec_Name'];
     $lname=$_POST['Last_Name'];
     $dob  =$_POST['DOB'];
     $phone=$_POST['Phone_Num'];
     $email=$_POST['Email'];
     $pass=$_POST['Password'];
     $con_pass=$_POST['Con_Password'];


            if(preg_match($reg_name,$fname)){
                // $firstName_check="<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Correct Name </span><br>";
                $firstName_done=true;
            }else{
                $firstName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span><br>";
                $firstName_done=false;
            }

            if(preg_match($reg_name,$sname)){
                // $SecName_check="<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Correct Name </span><br>";
                $SecName_done=true;
            }else{
                $SecName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span><br>";
                $SecName_done=false;
            }

            if(preg_match($reg_name,$lname)){
                // $LastName_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Name </span>";
                $LastName_done=true;
            }else{
                $LastName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span>";
                $LastName_done=false;
            }

            if((floor((time() - strtotime($dob)) / 31556926)) <16){
                $DateOfBirt_check="<span style='color:red ;font-family:Chaparral Pro Light;'>❌ You Are Too Young To Register ! </span>";
                $DateOfBirt_done=false;
        
            }else{
                // $DateOfBirt_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Your age is Legal to Register </span>";
                $DateOfBirt_done=true;
            }


            if(preg_match($reg_PhoneNum,$phone)){
                // $Number_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Phone Number </span>";
                $Number_done=true;
            }else{
                $Number_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Phone Number , Please Enter 14 Number !</span>";
                $Number_done=false;
            }
            

            if(preg_match($reg_email,$email)){
                // $Email_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Email </span>";
                $Email_done=true;
            }else{
                $Email_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Email</span>";
                $Email_done=false;
    
            }
            $uppercase = preg_match('@[A-Z]@', $pass);
            $lowercase = preg_match('@[a-z]@', $pass);
            $number    = preg_match('@[0-9]@', $pass);
            $specialChars = preg_match('@[^\w]@', $pass);
            if($uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
                // $Pass_Check= "<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Your Password Is Strong .</span>";
                $Pass_done=true;
            }else{
                $Pass_Check="<span style='color:red ;font-family:Chaparral Pro Light;'>❌ Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</span>";
                $Pass_done=false;

            }
            
            if($pass == $con_pass){
                $ConfirmPassword_Check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Password Match </span>";
                $ConfirmPassword_done=true;
            }else{
                $ConfirmPassword_Check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Your Password Dosen't Match ! </span>";
                $ConfirmPassword_done=false;

            }}
        

     if($firstName_done && $SecName_done && $LastName_done && $DateOfBirt_done && $Number_done && $Email_done && $ConfirmPassword_done && $Pass_done ){
        $sql= " INSERT INTO register(First_Name, Sec_Name, Last_Name ,DOB, Phone_Num,  Email , Password, Con_Password)
        VALUES ('$fname', '$sname','$lname', '$dob' ,  '$phone','$email', '$pass' , '$con_pass');";

        if(mysqli_query($conn, $sql)){
        header("location:login2.php");
        }else{
        echo "Eroor: ". $sql."<br>". mysqli_error($conn);}}
    else {
        echo '<script language="javascript">';
        echo 'alert("Please Check Your Information")';
        echo '</script>';
        }
    
    
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
    

    <title>Register</title>
</head>
<body>
    <!-- <header>
    <nav>
      <h1 class="logo"><a href="#">Kids Toys</a></h1>
      <ul>
        <li><a style="font-size:20px" href="#">Home</a></li>
        <li><a style="font-size:20px" href="#">Products</a></li>
        <li><a style="font-size:20px" href="#">Contact Us</a></li>
         <li><a style="font-size:20px" href="#">About Us</a></li>
      </ul>
    </nav>
  </header> -->
<img src="https://i.pinimg.com/originals/bb/2e/0e/bb2e0eb86e7705dc5379c23bf8a5ae1e.gif" alt="" class="anima bb">
<img src="https://3u26hb1g25wn1xwo8g186fnd-wpengine.netdna-ssl.com/files/2019/06/noodles-1.gif" alt="" class="anima tt">
    <form  method="post" class="reg-form">
    <fieldset>
    <h1 class="legend"><strong>S</strong>IGNUP</h1><hr>
    <div class="txt">
    <label class="reg-lbl" style="font-size:20px;font-weight: bold;color: green;">First Name</label><br>
    <input type="text" name="First_Name" value="<?php if(isset($fname))echo $fname ?>" ><br>
    <?php if(isset($firstName_check)){echo $firstName_check;} ?><br><br>

    <label class="reg-lbl"style="font-size:20px;font-weight: bold;color: green;">Secound Name</label><br>
    <input type="text" name="Sec_Name" value="<?php if(isset($sname))echo $sname ?>" ><br>
    <?php if(isset($SecName_check)){ echo $SecName_check; } ?> <br><br>

    <label class="reg-lbl"style="font-size:20px;font-weight: bold;color: green;">Family Name</label><br>
    <input type="text" name="Last_Name" value="<?php if(isset($lname))echo $lname ?>" ><br>
    <?php if(isset($LastName_check)){ echo $LastName_check; } ?> <br><br>

    <label class="reg-lbl"style="font-size:20px;font-weight: bold;color: green;">Date Of Birth</label><br>
    <input type="Date" name="DOB"><br>
    <?php if(isset($DateOfBirt_check)){ echo $DateOfBirt_check; } ?><br><br>

    <label class="reg-lbl"style="font-size:20px;font-weight: bold;color: green;">Phone Number</label><br>
    <input type="Number" name="Phone_Num" value="<?php if(isset($phone))echo $phone ?>" ><br>
    <?php if(isset($Number_check)){echo $Number_check;}?><br><br>

    <label class="reg-lbl" style="font-size:20px;font-weight: bold;color: green;">Email</label><br>
    <input type="email" name="Email" value="<?php if(isset($email)){echo $email;} ?>" ><br>
    <?php if(isset($Email_check)){echo $Email_check;}?><br><br>

    <label class="reg-lbl" style="font-size:20px;font-weight: bold;color: green;">Password</label><br>
    <input type="password" name="Password" ><br>
    <?php if(isset($Pass_Check)){echo $Pass_Check;}?><br>

    <label class="reg-lbl" style="font-size:20px;font-weight: bold;color: green;">Confirm Password</label><br>
    <input type="password" name="Con_Password" ><br>
    <?php if(isset($ConfirmPassword_Check)){echo $ConfirmPassword_Check;}?><br><br><br>
    <input type="submit" value="SIGNUP" name="submit"><br><br>
    <span>
    <label class="link">Already have an account !! <a href='login2.php'> Login</a></label><br></span>
    </div></fieldset>
    </form><br> <br> <br>  
    
    
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