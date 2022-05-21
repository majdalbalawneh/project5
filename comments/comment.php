<?php
include_once './function.inc.php';
include_once '../Configration/connection.php';
date_default_timezone_set("Asia/Amman");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="comment.css">

</head>
<body>
    <?php
    echo '<form  method="Post" action='.setComments($conn).'>
        <input type="hidden" name="u_id" value="Anounymous">
        <input type="hidden" name="date" value='.date('Y-m-d H:m:s').'>
        <textarea name="msg"  cols="30" rows="10"></textarea><br>
        <input type="submit" name="CommentSubmit" value="Comment">
    </form>' ;

    GetComments($conn);
    ?>
</body>
</html>