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
                    $loginPassword_result="<br><small style='color:white'>✅ Correct Password</small><br>";
                    $loginPassword_correct=true;
                   
                }else{
                    $loginPassword_result="<br><small style='color:white'>❌Incorrect Password</small><br>";
                    $loginPassword_correct=false;
            }
        }
        
    }   
    
    if($loginEmail_correct && $loginPassword_correct){
        header('location:../product/product.php');
      
        $row['last-login']= date("d-m-Y - h:i:sa");
        
    }else
    echo '<script language="javascript">';
    echo 'alert("Incorrect Information")'; 
    echo '</script>';

    
    if($loginEmail=="admin@gmail.com"){
		if($loginPassword== "AdminAdmin1"){
            $loginEmail_result="<br><small style='color:white'>✅ Correct Email</small><br>";
			$adminEmail_correct=true;
			$adminPass_correct=true;
	
		}else{
			$loginPassword_result="<br><small style='color:white'>❌Incorrect Password</small><br>";
	    	$adminPass_correct=false;
		}
	}else{
		$loginEmail_result="<br><small style='color:white'>❌Incorrect Password or Email</small><br>";
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
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <style>
      body{
        background-color:white;
      }
    </style>
</head>
<body>
<div id="wrap">
<form method="GET">
  <div class="form">
    <h1 class="form-header">LOGIN</h1>
    <div class="form-content">
      <div class="form-container">
        <div class="case">
          <input type="email" name="loginEmail" id="loginEmail"   placeholder="Email" class="form-input">
          <?php if(isset($loginEmail_result)){echo $loginEmail_result;}?>
        </div>
      </div>
      <div class="form-container">
        <div class="case">
          <input type="password" name="loginPassword" id="loginPassword"  placeholder="Password" class="form-input">
          <?php if(isset($loginPassword_result)){echo $loginPassword_result;}?>
        </div>
      </div>
      <div class="form-add-text">
      <span class="btn-text">Don't have an account <a style="text-decoration:none ; color:#e55951" href="../Regestration/Signup.php" >Sign Up!</span>
      </div>
      <div class="form-button">
        <button type="submit" name="submit" class="btn-login">
          <span class="btn-text" >Log in</span>
        </button>
      </div>
    </div>
  </div>
     
</div>
</form>
</body>
</html>