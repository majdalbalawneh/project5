<?php
session_start();
     include_once '../Configration/connection.php';
    
     $reg_name="/^([a-zA-Z' ]+)$/";
     $reg_PhoneNum="/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/";
     $reg_email="/^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z0-9][-\.]{0,1}([a-zA-Z][-\.]{0,1})*[a-zA-Z0-9]\.[a-zA-Z0-9]{1,}([\.\-]{0,1}[a-zA-Z]){0,}[a-zA-Z0-9]{0,}$/i";
     $firstName_done= $SecName_done= $LastName_done= $DateOfBirt_done= $Number_done= $Email_done= $Pass_done= $ConfirmPassword_done="";

     $sql= " SELECT * FROM register ;";
     $result= mysqli_query($conn,$sql);
    $result_check= mysqli_num_rows($result);
    if ($result_check > 0) {
       
      while ($row=mysqli_fetch_assoc($result)) {

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
                $firstName_check="<small style='color:white'> ✅ Correct Name </small><br>";
                $firstName_done=true;
            }else{
                $firstName_check="<br><small style='color:white'>❌ Incorrect Name</small><br>";
                $firstName_done=false;
            }

            if(preg_match($reg_name,$sname)){
                $SecName_check="<small style='color:white'> ✅ Correct Name </small><br>";
                $SecName_done=true;
            }else{
                $SecName_check="<br><small style='color:white'>❌ Incorrect Name</small><br>";
                $SecName_done=false;
            }

            if(preg_match($reg_name,$lname)){
                $LastName_check="<small style='color:white'>✅ Correct Name </small><br>";
                $LastName_done=true;
            }else{
                $LastName_check="<br><small style='color:white'>❌ Incorrect Name</small><br>";
                $LastName_done=false;
            }

            if((floor((time() - strtotime($dob)) / 31556926)) <16){
                $DateOfBirt_check="<span style='color:red ;font-family:Chaparral Pro Light;'>❌ You Are Too Young To Register ! </small><br>";
                $DateOfBirt_done=false;
        
            }else{
                $DateOfBirt_check="<small style='color:white'>✅ Your age is Legal to Register </small><br>";
                $DateOfBirt_done=true;
            }


            if(preg_match($reg_PhoneNum,$phone)){
                $Number_check="<small style='color:white'>✅ Correct Phone Number </small>";
                $Number_done=true;
            }else{
                $Number_check="<small style='color:white'>❌ Incorrect Phone Number (14 digit)</small>";
                $Number_done=false;
            }
            

            if($email===$row['Email']){
                $Email_check="<small style='color:white'>❌ this email has been alrady taken </small>";
                $Email_done=false; 
            }elseif(preg_match($reg_email,$email)){
               $Email_check="<small style='color:white'>✅ Correct Email </small>";
                $Email_done=true;
            }else{
              $Email_check="<small style='color:white'>❌ this email has been alrady taken </small>";
                $Email_done=false;
            }
            $uppercase = preg_match('@[A-Z]@', $pass);
            $lowercase = preg_match('@[a-z]@', $pass);
            $number    = preg_match('@[0-9]@', $pass);
            $specialChars = preg_match('@[^\w]@', $pass);
            if($uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
                $Pass_Check= "<small style='color:white'> ✅ Your Password Is Strong .</small>";
                $Pass_done=true;
            }else{
                $Pass_Check="<small style='color:white'>❌ Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</small>";
                $Pass_done=false;

            }
            
            if($pass == $con_pass){
                $ConfirmPassword_Check="<small style='color:white'>✅ Password Match </small>";
                $ConfirmPassword_done=true;
            }else{
                $ConfirmPassword_Check="<small style='color:white'>❌ Your Password Dosen't Match ! </small>";
                $ConfirmPassword_done=false;

            }}}
        

     if($firstName_done && $SecName_done && $LastName_done && $DateOfBirt_done && $Number_done && $Email_done && $ConfirmPassword_done && $Pass_done ){
        $sql= " INSERT INTO register(First_Name, Sec_Name, Last_Name ,DOB, Phone_Num,  Email , Password, Con_Password)
        VALUES ('$fname', '$sname','$lname', '$dob' ,  '$phone','$email', '$pass' , '$con_pass');";

        if(mysqli_query($conn, $sql)){
        header("location:../Login/Login.php");
        }else{
        echo "Eroor: ". $sql."<br>". mysqli_error($conn);}}
    else {
        echo '<script language="javascript">';
        echo 'alert("Please Check Your Information")';
        echo '</script>';
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
    <link rel="stylesheet" href="signup.css">
    

    <title>Register</title>
</head>
<body>
  <form  method="POST">    
<div style="margin-top=5%" id="wrap">
  <div class="form">
    <div class="form-content">
      <div class="form-container">
        <span class="form-header">SIGNUP</span>
      </div>
        <div class="form-container">
        <div class="case">
        First Name<br>
          <input style="height:30px" class="form-input"  type="text" name="First_Name" value="<?php if(isset($fname))echo $fname ?>" ><br>
          <?php if(isset($firstName_check)){echo $firstName_check;} ?><br><br>

        </div>
      </div>

      <div style="margin-top:-5%" class="form-container">
        <div class="case">
        Secound Name<br>
          <input style="height:30px" class="form-input"  type="text" name="Sec_Name" value="<?php if(isset($sname))echo $sname ?>"><br><?php if(isset($SecName_check)){ echo $SecName_check; } ?> <br><br>

        </div>
      </div>

      <div style="margin-top:-5%" class="form-container">
        <div class="case">
        Last Name<br>
          <input style="height:30px" class="form-input"  type="text" name="Last_Name" value="<?php if(isset($lname))echo $lname ?>" ><br><?php if(isset($LastName_check)){ echo $LastName_check; } ?> <br><br>

        </div>
      </div>

      <div style="margin-top:-5%" class="form-container">
        <div class="case">
        Date Of Birth<br>
          <input style="height:30px" class="form-input"  type="Date" name="DOB" value="<?php if(isset($dob))echo $dob ?>" >
          <br><?php if(isset($DateOfBirt_check)){ echo $DateOfBirt_check; } ?><br><br>
        </div>
      </div>

      <div style="margin-top:-5%" class="form-container">
        <div class="case">
        Phone Number<br>
          <input style="height:30px" class="form-input" type="Number" name="Phone_Num" value="<?php if(isset($phone))echo $phone ?>" ><br><?php if(isset($Number_check)){echo $Number_check;}?><br><br>
        </div>
      </div>

      <div style="margin-top:-5%" class="form-container">
        <div class="case">
        Email<br>
          <input style="height:30px" class="form-input" type="email" name="Email" value="<?php if(isset($email)){echo $email;} ?>" ><br><?php if(isset($Email_check)){echo $Email_check;}?><br><br>

        </div>
      </div>

      <div style="margin-top:-5%" class="form-container">
        <div class="case">
        Password<br>
          <input style="height:30px" class="form-input" type="password" name="Password">
          <br><?php if(isset($Pass_Check)){echo $Pass_Check;}?><br>
        </div>  
      </div>

      <div style="margin-top:-5%" class="form-container">
        <div class="case">
        Confirm Password<br>
          <input style="height:30px" class="form-input" type="password" name="Con_Password">
          <br><?php if(isset($ConfirmPassword_Check)){echo $ConfirmPassword_Check;}?>
        </div>
      </div>


      <div class="form-add-text">
        <span >Already have an account ! <a style="text-decoration:none ; color:#e55951" href='../Login/Login.php'>login</span>
      </div>
      <div class="form-button">
        <button class="btn-login" name="submit" >
          <span class="btn-text">Signup</span>
        </button>
      </div>
    </div>
  </div>
  </div>
</div>

    </form>

</body>
</html>