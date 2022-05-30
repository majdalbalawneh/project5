<?php

include_once '../Configration/connection.php';
session_start();
if(!empty($_SESSION['email'])){
  echo "<style> .restrict{display:none;} </style>";
  echo "<style> .restrict1{display:inline;} </style>";

}else{echo "<style> .restrict{display:inline;} </style>";
echo "<style> .restrict1{display:none;} </style>";
}
 

if(isset($_GET['add'])){
  $quantity=$_GET['quantity'];
    $add_id = $_GET['add'];
    $id=$_GET['id_prod'];
    $adding="INSERT INTO `cart`(`product_id`, `quantity`) VALUES ('$id','$quantity');";
    mysqli_query($conn,$adding);
 };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,300&family=Patrick+Hand&family=Poppins:wght@100;200;300;400&family=Smooch&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../nav.css">
    <link rel="stylesheet" href="../index1.css">
    <title>Store</title>
    <style>
        .prod{width: 240px; height: 150px; margin-left: 2%;}
    </style>
</head>
<body>
<div class="container-fluied">
        <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light white scrolling-navbar">

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
            <a class="nav-link waves-effect" href="../index1.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../product/product.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Welcome/ContactUs.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Welcome/AboutUs.php">About Us</a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item restrict">
            <a href="../Login/Login.php" class="nav-link waves-effect">
             Login
            </a>
          </li>
          <li class="nav-item restrict">
            <a href="../Regestration/Signup.php" class="nav-link waves-effect">Signup
            </a>
          </li>
          <li class="nav-item restrict1">
            <a class="nav-link waves-effect" href="../User/User.php">
            <i class="fa fa-user" aria-hidden="true"></i>
              <span class="clearfix d-none d-sm-inline-block">Account</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Cart/cart.php">
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block">Cart</span>
            </a>
          </li>
          <li class="nav-item restrict1">
            <a href="../Login/logout.php" class="nav-link waves-effect">Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
  <ul type="none" style="margin-left:20px;margin-top:9%; border:2px solid #ffcdcd; width:10%; padding:10px;  ">
<li>Category</li>
  <li style="padding-top:20px;" ><a href="../product/product.php">Creative Toys</a></li>
  <!-- <li><a href=""></a>Dolls</li> -->
  <li style="padding-top:20px;" ><a href="../product/store.php">Educational Toys</a></li>
  <li style="padding-top:20px;" ><a href="../product/store2.php">Electronic Toys</a></li>
</ul>
  <h1 style="margin-left:40%;margin-top:-23% ">Educational Toys</h1>
<section class="section-content ml" style="margin-top:-18%">
    <div class="container-fluied">

        <div class="row" style="justify-content: center!important;">
            <main class="col-md-9">

                <div class="row" >
                    <?php

							$limit = 9;

							if (isset($_GET['page'])) {
								$page = $_GET['page'];
							} else {
								$page = 1;
							}
							$offset = ($page - 1) * $limit;
							$record_index = ($page - 1) * $limit;
							$product_query = "SELECT * FROM `products` LIMIT $record_index, $limit ";
							$product_result = mysqli_query($conn, $product_query);

							if (mysqli_num_rows($product_result) > 0) {
								while ($row = mysqli_fetch_assoc($product_result)) {
							?>

                    <div class="col-md-4">  
                        <!-- cart.php?id=<?php echo $row["product_id"]; ?>###################################################### -->
                        <form action="" method="GET">
                            <figure class="card card-product-grid">
                                <div class="img-wrap"  style="text-align:center">
                                    <img class="prod" src="<?php echo $row['img'];?>">
                                    <!-- ################################################### -->
                                    <label><?php 
                                   $cat= "SELECT categories.category_name FROM categories INNER JOIN products
                                   ON products.category_id=categories.category_id;";
                                   $res=mysqli_query($conn, $cat);
                                
                                  ?></label><br>

                                </div> 
                                <figcaption class="info-wrap">
                                    <div class="fix-height"style="text-align:center">
                                        <a href="singleproduct.php?id=<?php echo $row['product_id']; ?>"
                                            class="title"><?php echo $row['product_name']; ?></a>

                                        <div class="price-wrap mt-2">
                                            <span class="price">Price: <?php echo $row['price']; ?> $</span>
                                        </div> 
                                    </div>
                                    <!-- col.// -->
                                    <div class="col" style="text-align:center">
                                        <p class="card-text">Quantity:
                                            <input style="text-align:center" type="number" min="1" max="25" name="quantity" class="form-control"                                               value="1" style="width: 60px;">
                                        </p>
                                    </div> <!-- col.// -->
                                    <br>

                                    <input type="hidden" name="hidden_product_name"
                                        value="<?php echo $row["product_name"]; ?>">
                                            <input type="hidden" name="id_prod" value="<?php echo $row['product_id'] ?>">
                                            
                                            <!-- <input type="hidden" name="id_user"> -->
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                    <!----------------------------- change the color of the buttons 21-5-2022 at 6:22pm ------------------------>
                                    <input type="submit" name="add" class="btn-warning btn-info" value="Add to cart">
                                </figcaption>
                            </figure>
                        </form>
                    </div> <!-- col.// -->

                    <?php  }
			}else{
				echo "<h3>NO DATA FOUND.</h3>";
			} ?>
                </div> <!-- row end.// -->


                <div style="text-align:center" class="col-lg-12">


				<?php
					$dep_query1 = "SELECT * FROM `products`";
					$result1 = mysqli_query($conn, $dep_query1);

					if (mysqli_num_rows($result1) > 0) {

						$total_records = mysqli_num_rows($result1);
						$total_pages = ceil($total_records / $limit);
                        // changing the position of the section product
						echo '  <ul class="pagination" style="justify-content: center!important;">';
						if ($page > 1) {
							echo '<li  class="paginate_button page-item previous" id="zero_config_previous"><a href="store.php?page=' . ($page - 1) . '" aria-controls="zero_config" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
						}
						for ($i = 1; $i < $total_pages; $i++) {
							if ($i == $page) {
								$active = "active";
							} else {
								$active = "";
							}
							echo '<li class="paginate_button page-item ' . $active . '"><a href="store2.php?page=' . $i . '" aria-controls="zero_config"  class="page-link">' . $i . '</a></li>';
						}
						if ($total_pages > $page) {
							echo '<li class="paginate_button page-item next" id="zero_config_next"><a href="store2.php?page=' . ($page + 1) . '" aria-controls="zero_config" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
						}
						echo '</ul>';

					?>

					<!-- <?php } ?> -->
                                                            
                                                              

                </div>

            </main> <!-- col.// -->

        </div>

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
       
<!-- Start Footer bottom Area -->
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



<script>
$("input[type='number']").inputSpinner()
</script>
    
</body>
</html>