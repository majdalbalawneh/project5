<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="comment.css">
   <title>Document</title>
</head>
<body>
   
</body>
</html>
<?php
include_once '../Configration/connection.php';
function setComments($conn)
{
  if(isset($_POST['CommentSubmit'])){
   $u_id=$_POST['u_id'];
   $date=$_POST['date'];
   $msg=$_POST['msg'];

   $sql="INSERT INTO comment (u_id, date, msg_txt) VALUES ('$u_id', '$date', '$msg');";
   $result= mysqli_query($conn,$sql);

  }
}

function GetComments($conn)
{
   $sql1="SELECT * FROM comment";
   $result= mysqli_query($conn,$sql1);
   while ($row = mysqli_fetch_assoc($result)) {
   echo "<div class='commentbox'>";
      echo $row['u_id']. "<br>";
      echo $row['date']. "<br>";

      echo $row['msg_txt'];
      echo"</div>";
   }
  
   
}



?>