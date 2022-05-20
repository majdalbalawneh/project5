<?php
session_start();
include_once '../Configration/connection.php';
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
                    $loginPassword_result="<span style=' color:green'>✅ Correct Password</span><br>";
                    $loginPassword_correct=true;

                }else{
                    $loginPassword_result="<span style=' color:red'>❌Incorrect Password</span><br>";
                    $loginPassword_correct=false;
            }
        }
        
    }   
    
    if($loginEmail_correct && $loginPassword_correct)
    {
        header('location:../Welcome/Welcome.php');
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
		header('location:../Admin/Admin.php');
	}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        <form method="post">
                <h1 >Login</h1>
                <p >Welcome back! Login with your credentials</p>
                <label for="loginEmail">Email</label>
                <br>
                <!--Email-->
                <input type="email" name="loginEmail" id="loginEmail" class="form-control"  placeholder="Your Email" required><br>
                <?php if(isset($loginEmail_result)){echo $loginEmail_result;}?>
                <br>
                <!--Password-->
                <label for="loginPassword">Password</label>
                <br>
                <input type="password" name="loginPassword" id="loginPassword" class="form-control"  placeholder="Password" required><br>
                <?php if(isset($loginPassword_result)){echo $loginPassword_result;}?>
                <br>
                <input type="submit" value="Submit" name="submit">
        </form>
</body>
</html>