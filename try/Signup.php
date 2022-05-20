<?php
     include_once '../Configration/connection.php';
    
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
                $firstName_check="<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Correct Name </span><br>";
                $firstName_done=true;
            }else{
                $firstName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span><br>";
                $firstName_done=false;
            }

            if(preg_match($reg_name,$sname)){
                $SecName_check="<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Correct Name </span><br>";
                $SecName_done=true;
            }else{
                $SecName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span><br>";
                $SecName_done=false;
            }

            if(preg_match($reg_name,$lname)){
                $LastName_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Name </span>";
                $LastName_done=true;
            }else{
                $LastName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span>";
                $LastName_done=false;
            }

            if((floor((time() - strtotime($dob)) / 31556926)) <16){
                $DateOfBirt_check="<span style='color:red ;font-family:Chaparral Pro Light;'>❌ You Are Too Young To Register ! </span>";
                $DateOfBirt_done=false;
        
            }else{
                $DateOfBirt_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Your age is Legal to Register </span>";
                $DateOfBirt_done=true;
            }


            if(preg_match($reg_PhoneNum,$phone)){
                $Number_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Phone Number </span>";
                $Number_done=true;
            }else{
                $Number_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Phone Number , Please Enter 14 Number !</span>";
                $Number_done=false;
            }
            

            if(preg_match($reg_email,$email)){
                $Email_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Email </span>";
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
                $Pass_Check= "<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Your Password Is Strong .</span>";
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
        header("location:../Login/Login.php");
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
    <title>Document</title>
</head>
<body>
    <form  method="post">
    First Name :<br>
    <input type="text" name="First_Name" value="<?php if(isset($fname))echo $fname ?>"><br>
    <?php if(isset($firstName_check)){echo $firstName_check;} ?><br><br>

    Secound Name :<br>
    <input type="text" name="Sec_Name" value="<?php if(isset($sname))echo $sname ?>"><br>
    <?php if(isset($SecName_check)){ echo $SecName_check; } ?> <br><br>

    Family Name :<br>
    <input type="text" name="Last_Name" value="<?php if(isset($lname))echo $lname ?>"><br>
    <?php if(isset($LastName_check)){ echo $LastName_check; } ?> <br><br>

    Date Of Birth :<br>
    <input type="Date" name="DOB"><br>
    <?php if(isset($DateOfBirt_check)){ echo $DateOfBirt_check; } ?><br><br>

    Phone Number :<br>
    <input type="Number" name="Phone_Num" value="<?php if(isset($phone))echo $phone ?>"><br>
    <?php if(isset($Number_check)){echo $Number_check;}?><br><br>

    Email :<br>
    <input type="email" name="Email" value="<?php if(isset($email)){echo $email;} ?>"><br>
    <?php if(isset($Email_check)){echo $Email_check;}?><br><br>

    Password :<br>
    <input type="password" name="Password"><br>
    <?php if(isset($Pass_Check)){echo $Pass_Check;}?><br><br>

    Confirm Password :<br>
    <input type="password" name="Con_Password"><br>
    <?php if(isset($ConfirmPassword_Check)){echo $ConfirmPassword_Check;}?><br><br>

    <input type="submit" value="SIGNUP" name="submit">
    </form>
    <?php
   

    ?>
</body>
</html>