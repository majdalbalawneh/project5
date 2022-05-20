<!-- php?
session_start ();
require './connection.php';
require './cart.php';

// Save new order
mysqli_query($conn, 'insert into orders(name, datecreation, status, username)
values("New Order", "'.date('Y-m-d').'", 0, "acc2")');
$ordersid = mysqli_insert_id($conn);

// Save order details for new order
$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
for($i=0; $i<count($cart); $i++) {
	mysqli_query($con, 'insert into ordersdetail(productid, ordersid, price, quantity)
values('.$cart[$i]->id.', '.$ordersid.','.$cart[$i]->price.', '.$cart[$i]->quantity.')');
}

// Clear all products in cart
unset($_SESSION['cart']);


Thanks for buying products. Click <a href="index.php">here</a> to continue buy product. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
<div class="container">
  <div class="title">
      <h2>Product Order Form</h2>
  </div>
<!--  -->
<?php
$select_cart=mysqli_query($conn,"SELECT *FROM `cart`");
$total=0;
$grand_total= 0;
if(mysqli_num_rows($select_cart)>0){
    while($fetch_cart = mysgli_fech_assoc($select_cart)){
       $total_price=number_format($fetch_cart)['price'] * $fetch_cart['quqntity'];
       $grand_total= $total += $total_price;

       ?>
       

<span><?= $fetch_cart['name'];?>(<?=$fetch_cart['quantity'];?>)</span>;
<?php

}else{
  
echo "<span> your cart is empety!</span>";

}
};
?>
<div class="d-flex">
  <form action="" method="">
    <label>
      <span class="fname">First Name <span class="required">*</span></span>
      <input type="text" name="fname">
    </label>
    <label>
      <span class="lname">Last Name <span class="required">*</span></span>
      <input type="text" name="lname">
    </label>
    <label>
      <span>Country <span class="required">*</span></span>
      <select name="selection">
        <option value="select">Select a country...</option>
        <option value="AFG">Jordan</option>
   
      </select>
    </label>
    <label>
      <span>Town / City <span class="required">*</span></span>
      <input type="text" name="city"> 
    </label>
    <label>
      <span>Phone <span class="required">*</span></span>
      <input type="tel" name="city"> 
    </label>
    <label>
      <span>Email Address <span class="required">*</span></span>
      <input type="email" name="city"> 
    </label>
  </form>
  <div class="Yorder">
    <table>
      <tr>
        <th colspan="2">Your order</th>
      </tr>
      <tr>
        <td>Product Name x 2(Qty)</td>
        <td>$88.00</td>
      </tr>
      <tr>
        <td>Subtotal</td>
        <td>$88.00</td>
      </tr>
      <tr>
        <td>Shipping</td>
        <td>Free shipping</td>
      </tr>
    </table><br>
  
    <p>
        Make your payment  Cash on Delivery.
    </p>
    <div>
      <input type="radio" name="dbt" value="cd"> 
    </div>
    
    <button type="button">Place Order</button>
  </div><!-- Yorder -->
 </div>
</div>
</body>
</html>