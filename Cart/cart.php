<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css%22%3E">
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,300&family=Patrick+Hand&family=Poppins:wght@100;200;300;400&family=Smooch&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style2.css">
</head>

<body>
<div class="navbar">
        <div class="logo"><img src="../img/logo_kids.gif" width="90px"> </div>

        <nav>
          <ul style="margin-right: 5%; font-family: 'Nunito', sans-serif;
font-family: 'Patrick Hand', cursive; ">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../product/product.php">Products</a></li>
            <li><a href="../Welcome/ContactUs.html">Contact Us</a></li>
            <li><a href="../Welcome/AboutUs.html">About US</a></li>
            <li><a href="../User/User.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
            <li><a href="../Cart/cart.php"><i class="fas fa-shopping-cart"></i></i></a></li>

          </ul>
          <hr style="width:70%; margin-left: 31%;">
        </nav>

      </div>
  <div class="container-fluied">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 style="color:#e55951">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount Code</th>
                <th>Total Price</th>
                <th>
                  <a href="cart.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');">
                  <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
            include_once '../Configration/connection.php';

            if(isset($_POST['update_update_btn'])){
               $update_value = $_POST['update_quantity'];
               $update_id = $_POST['update_quantity_id'];
               $update= "UPDATE cart SET quantity ='$update_value' WHERE product_id ='$update_id'";
               $update_quantity_query = mysqli_query($conn,$update);
   
            };

            if(isset($_GET['remove'])){
              $update_value = $_GET['remove'];
              $update= "DELETE FROM cart WHERE product_id ='$update_value'";
              $update_quantity_query = mysqli_query($conn,$update);
  
           };

           if(isset($_GET['clear'])){
            $update_value = $_GET['clear'];
            $update= "DELETE FROM cart ";
            $update_quantity_query = mysqli_query($conn,$update);

         };
            $stmt = $conn->prepare('SELECT * FROM products INNER JOIN cart ON products.product_id=cart.product_id');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):

              ?>
              <tr>
                <td><?= $row['product_id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['product_id'] ?>">
                <td><img src="<?php echo $row['img'];?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td>
                  $ &nbsp;&nbsp;<?= number_format($row['price'],2); ?>
                </td>
                
                <input type="hidden" class="pprice" value="<?= $row['price'] ?>">
                <td>
                  <!-- <input type="number" class="form-control itemQty" value="" style="width:75px;"> -->
                  <form  method="post">
                  <input type="hidden" name="update_quantity_id" value="<?php echo $row['product_id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $row['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>
              
              </td><?php $sub_total = ($row['price'] * $row['quantity']);?>
               <?php      $grand_total += $sub_total;?>
                <td><?php if($row['code']== "MST2"){
                          echo "- 10%" ;
                         }else{echo "No Discount";}?>
                </td>
                
                <td>$ &nbsp;&nbsp;<?php  if($row['code']== "MST2"){
                                        echo ($sub_total * (100-10) / 100);
                                        }else{echo $sub_total;} ?> </td>
                <td>
                  <a href="cart.php?remove=<?= $row['product_id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');">
                  <i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              
              
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="../product/product.php" class="btn" style="background-color:#e55951"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td><td></td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b>$&nbsp;&nbsp;<?php echo $grand_total; ?></b></td>
                
                <td>
                  <a href="../checkout/checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <footer
            class="text-center text-lg-start text-primary"
            style="background: linear-gradient(to right, rgba(216, 112, 147, 0.377),rgba(216, 112, 147, 0.235), rgba(216, 112, 147, 0.087));margin-top:5%"           
            >
      <!-- //////////////////footer -->
  </div></div></div></div>
  <div class="container-fluied">
    <!-- Footer -->
    <footer class="text-center text-lg-start "
      style="background: linear-gradient(to right,  #e558519a,#e46a6493, rgba(216, 112, 147, 0.215));">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Toys Shop
              </h6>
              <p style="text-align: justify; ">
                Toys shop has announced that Toys store is opening , its separate platform that provides The most
                distinctive games that the child spends his time enjoying and learning, has amassed more than 35 million
                customers.
              </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />


            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact Us</h6>
              <p><i class="fas fa-home mr-3"></i> Aqaba , Jordan</p>
              <p><i class="fas fa-envelope mr-3"></i> info@mail.com</p>
              <p><i class="fas fa-phone mr-3"></i> +960 7710101010</p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

              <!-- linkedin majd -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="https://web.facebook.com/ToysRUsME/?lng=en&subpath=en-qa&_rdc=1&_rdr" role="button"><i
                  class="fab fa-facebook-f"></i></a>


              <br>
             
              <a class="btn btn-primary btn-floating m-1" style="background-color: #333333"
                href="https://github.com/samaralkhamis/Project5PHP" role="button" target="_blank"><i class="fab fa-github"></i></a>
            </div>
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        MST<sup>2</sup>&nbsp; © 2022 Copyright:
        <a href="https://www.orange.jo/ar/pages/default.aspx" target="_blank">Orange.jo</a>

      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->



</body>

</html>