<?php
include './connection.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update= "UPDATE `cart` SET quantity ='$update_value' WHERE id ='$update_id'";;
   $update_quantity_query = mysqli_query($conn,$update );
   if($update_quantity_query){
      
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./bootstrap.css">

</head>
<body>
<br><br>
<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Shopping Cart</h1>

   <table class="table">
      <thead class="thead-light">
         <th scope="col">Image</th>
         <th scope="col">Name</th>
         <th scope="col">Price</th>
         <th scope="col">Quantity</th>
         <th scope="col">Total price</th>
         <th scope="col">Action</th>
      </thead>
      <tbody>

         <?php 
         $return_cart="SELECT * FROM products INNER JOIN cart ON products.product_id=cart.product_id;";
         $select_cart = mysqli_query($conn, $return_cart);
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="<?php echo $fetch_cart['img']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['product_name']; ?></td>
            <td>$<?php echo number_format($fetch_cart['price']); ?>   </td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php
             
            //     $conn=mysqli_query($conn, $pri);
            //    $row= mysqli_fetch_assoc($select_cart); ##########################$fetch_cart
            echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
             <td><!--<a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a>--></td> 
            <td colspan="3">Cart Total</td>
            <td>$<?php echo $grand_total; ?>  </td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout2.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
   


</body>
</html>