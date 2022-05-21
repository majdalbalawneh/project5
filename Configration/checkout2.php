<?php

include_once './connection.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $city = $_POST['city'];
   $country = $_POST['country'];

   $cart_query = mysqli_query($conn, "SELECT * FROM cart INNER JOIN products ON products.product_id=cart.product_id");
   $price_total = 0;

   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['product_name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

//    $total_product = implode(', ',$product_name);
//    $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, city, country, total_products, total_price) VALUES('$name','$number','$email','$method','$city','$country','$total_product','$price_total')") or die('query failed');

   if($cart_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span > total : $".$price_total." </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$city.",".$country."</span> </p>
            <p> your payment mode : <span> Cash on delivery </span> </p>

         </div>
            <a href='./landing2.php' class='btn'>Purchase Process Completed</a>
         
            <a href='./product.php' class='btn'>Continue Shopping</a>
         </div>
         
      </div>
      ";
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="checkout2.css">
  <!-- ///////////////// -->
  

</head>
<body>
<div class="navbar">
        <div class="logo"><img src="./img/./logo_kids.gif"width="100px"> </div>
       
        <nav style="font-family: 'Nunito', sans-serif;
 font-family: 'Patrick Hand', cursive;">
 <ul style="margin-right: 5%; font-family: 'Nunito', sans-serif;
 font-family: 'Patrick Hand', cursive;">
 <li><a href="../index.html">Home</a></li>
 <li><a href="../product/product.php">Products</a></li>
 <li><a href="../Welcome/ContactUs.html">Contact Us</a></li>
 <li><a href="../Welcome/AboutUs.html">About US</a></li>
 
 <!-- <li><a href="../Login/Login.php">Login</a></li>
 <li><a href="../Regestration/Signup.php">Sign Up</a></li> -->
 <li><a href="../User/User.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
 <li><a href=""><img style="position:absolute; margin-top:-2.5%; width:4%" src="./img/cart2.png" ></a></li>

 </ul> <hr style="width:70%; margin-left: 31%;">
        </nav>
       
     </div>



<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
        $sql1="SELECT * FROM cart INNER JOIN products ON products.product_id=cart.product_id";
         $select_cart = mysqli_query($conn, $sql1);
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($row = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($row['price'] * $row['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $row['product_name']; ?>(<?= $row['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your phone number</span>
            <input type="number" placeholder="enter your phone number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="" selected>cash on devlivery</option>
              
            </select>
         </div>
        
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="Aqapa" name="city" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="Jordan" name="country" required>
         </div>
         
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>
  
</body>
</html>