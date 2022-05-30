<?php
session_start();
include_once '../Configration/connection.php';
if (isset($_GET['submit'])){
     
    $loginEmail=$_GET['loginEmail'];
    $_SESSION['email']=$loginEmail;
    $loginPassword=$_GET['loginPassword']; 
  $loginPassword=$_SESSION['loginPassword'];
    echo  $loginPassword."<br>";
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
                    $loginPassword_result="<br><small style='color:white'>✅ Correct Password</small><br>";
                    $loginPassword_correct=true;
                   
                }else{
                    $loginPassword_result="<br><small style='color:white'>❌Incorrect Password</small><br>";
                    $loginPassword_correct=false;
            }
        }
        
    }   
    
    if($loginEmail_correct && $loginPassword_correct){
        header('location:../index1.php');
      
        $row['last-login']= date("d-m-Y - h:i:sa");
        
    }else
    echo '<script language="javascript">';
    echo 'alert("❌ Incorrect Information")'; 
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
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <style>
      body{
  background:url('../img/login.png') no-repeat , linear-gradient(to right,#A0BCC2,  #DAE5D0 , #FEFBE7 , #FFCAC2);  
  background-size: 100% 140% ;   }

 .login-cont{
   border: 2px #000 double;
   width: 26%;
   background-color:rgba(255, 255, 255, 0.4);
   margin-left: 60%;
   margin-top: 10%;
   padding: 20px 50px 50px ;
   border-top-right-radius: 30px;
   border-bottom-left-radius: 30px;
 }

 .form-inputt{border-radius: 10px;
 border: none;
 border-bottom: gray 1px solid;
font-size: 20px;
padding: 10px;}

.bttn-login{border-radius: 10px;
width: 60%;
font-size: x-large;
font-family: 'Courier New', Courier, monospace;
background: #C3DBD9;
border: 1px #8FBDD3 solid ;}

.ll{color: #e55951;
font-size: xx-large;}

.bttn-login:hover{background: #8FBDD3;}
    </style>
</head>
<body>

<div class="login-cont">
    <div class="login-form">
    <form method="GET">
         <h2 class="form-header-login"><span class="ll">L</span>OGIN</h2><hr><br>
        
              <input type="email" name="loginEmail" id="loginEmail" placeholder="Email" class="form-inputt"><br><br>
              <?php if(isset($loginEmail_result)){echo $loginEmail_result;}?>
         
              <input type="password" name="loginPassword" id="loginPassword"  placeholder="Password" class="form-inputt">
              <?php if(isset($loginPassword_result)){echo $loginPassword_result;}?>
          
          <h4 class="btttn-login">Don't have an account <a style="color:#694E4E" href="../Regestration/Signup.php" >Sign Up!</h4>
          
            <button type="submit" name="submit" class="bttn-login">
              <strong class="btttn-login" >Log in</strong>
            </button>
</form>
</div>
</div>

</body>
</html>