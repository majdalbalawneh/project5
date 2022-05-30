<?php

session_start();
if(!empty($_SESSION['email'])){
  echo "<style> .restrict{display:none;} </style>";
  echo "<style> .restrict1{display:inline;} </style>";

}else{echo "<style> .restrict{display:inline;} </style>";
echo "<style> .restrict1{display:none;} </style>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../index1.css">
    <link rel="stylesheet" href="../nav.css">
</head>
<body>
<div class="container-fluied">
        <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="">
        <img src="../img/logo_kids.gif" alt="logo" width="50px">
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="../index1.php"><strong>Home</strong>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../product/product.php"><strong>Products</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Welcome/ContactUs.php"><strong>Contact Us</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Welcome/AboutUs.php"><strong>About Us</strong></a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item restrict">
            <a href="../Login/Login.php" class="nav-link waves-effect">
            <strong> Login</strong>
            </a>
          </li>
          <li class="nav-item restrict">
            <a href="../Regestration/Signup.php" class="nav-link waves-effect"><strong>Signup</strong>
            </a>
          </li>
          <li class="nav-item restrict1">
            <a class="nav-link waves-effect" href="../User/User.php">
            <i class="fa fa-user" aria-hidden="true"></i>
              <span class="clearfix d-none d-sm-inline-block"><strong>Account</strong></span>
            </a>
          </li>
         
         

          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Cart/cart.php">
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"><strong>Cart</strong></span>
            </a>
          </li>
          <li class="nav-item restrict1">
            <a href="../Login/logout.php" class="nav-link waves-effect"><strong>Logout</strong>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <div class="container-fluied" style="margin-top:10% ; margin-bottom:8%">
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
                <td colspan="8">
                  <h4 style="color:#e55951"><strong>Products in your cart!</strong></h4>
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
                  <a href="../product/product.php" class="btn btn-info" ><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
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
  </div></div>
    
<footer >
  <div class="footer-area-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-icons">
            <ul>
              <li>
                <a href=""><i style="font-size:27px ; margin-top:4%" class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/company/toysrus/">
                <i style="font-size:27px ; margin-top:4%" class="fab fa-linkedin-in"></i>
                </a>
              </li>
              <li>
                <a href="https://github.com/samaralkhamis/Project5PHP">
                <i style="font-size:27px ; margin-top:4%" class="fab fa-github-alt"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-md-12 col-md-12">
          <div class="credits">
            <a href="#">Privacy Policy</a> | Terms & Condition
          </div>
          <div class="copyright text-center">
            <p>
              &copy; Copyright 2022 .  <strong>KIDSTOYS</strong><br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
                                      </div>
</body>

</html>