<?php

include_once '../Configration/connection.php';

if (!isset($_GET['id'])) {
  $homepath = '../index.html';
  $prodpath = '../product.php';
  $check= '../checkout/checkout.php' ;
  $shoppath = '../product.php';
  $cartpath = '../Cart/cart.php';
  $uuser= '../User/User.php';
  $about='../Welcome/AboutUs.html';
  $cont='../Welcome/ContactUs.html';
  }else{
    $sign = $_GET['id'];
    $homepath = '../index.html?id=' . $sign;
    $shoppath = '../product.php?id=' . $sign;
    $cartpath = '../Cart/cart.php?id=' . $sign;
    $uuser= '../User/User.php?id=' . $sign ;
    $check= '../checkout/checkout.php?id=' . $sign ;
    $about='../Welcome/AboutUs.html?id='. $sign ;
    $cont='../Welcome/ContactUs.html?id='. $sign ;
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
      <title>Document</title>
      <link rel="stylesheet" href="./pro.css">
  </head>
  <body>
      
  
  
  <div class="container" >
      <div class="d-flex justify-content-around">
  
  
  
      
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
  
  
  
      
  <div class="product-card ">
  <!-- <div class="badge">Hot</div> -->
  <div class="product-tumb">
  <img style="width:250px" class="prod" src="<?php echo $row['img'];?>">
  </div>
  
   <?php
  $cat= "SELECT categories.category_name FROM categories INNER JOIN products
         ON products.category_id=categories.category_id;";
         $res=mysqli_query($conn, $cat);
  ?>
  
  <div class="product-details">
  
      <h4><a href="product/singleproduct.php?id=<?php echo $row['product_id']; ?>" class="title">
              <?php echo $row['product_name']; ?>
            </a></h4>
      <p><?php echo $row['description']; ?></p>
      <div class="product-bottom-details">
          <div class="product-price"><del><?php echo $row['price']; ?> $</del>
              </del><br>
              <span class="price">Price: <?php echo ($row['price']* (100-10) / 100); ?>$
              </span></div>
              <input type="hidden" name="hidden_product_name" value="<?php echo $row[" product_name"]; ?>">
          <input type="hidden" name="id_prod" value="<?php echo $row['product_id'] ?>">
          <input type="hidden" name="hidden_price" value="<?php echo $row[" price"]; ?>">
  
          <div class="product-links">
              <!-- <a href=""><i class="fa fa-heart"></i></a> -->
              <a href=""><i class="fa fa-shopping-cart"></i></a>
                           <!-- col.// -->
                           <div class="col" style="text-align:center">
                                          <p class="card-text">Quantity:
                                              <input style="text-align:center" type="number" min="1" max="25" name="quantity" class="form-control"                                               value="1" style="width: 60px;">
                                          </p>
                                          <input type="submit" name="add" class="btn_add" value="Add to cart">
                                      </div> <!-- col.// -->
                                      <br>
                     
                      
          </div>
      </div>
  </div>
  </div>
  
  
  <!--  -->
  <?php  
        }}else{
          echo "<h3>NO DATA FOUND.</h3>";
        } ?>
                  </div> <!-- row end.// -->
  
  
                  <div style="text-align:center" class="col-lg-10">
  
  
          <?php
            $dep_query1 = "SELECT * FROM `products`";
            $result1 = mysqli_query($conn, $dep_query1);
  
            if (mysqli_num_rows($result1) > 0) {
  
              $total_records = mysqli_num_rows($result1);
              $total_pages = ceil($total_records / $limit);
                          // changing the position of the section product
              echo '  <ul class="pagination" style="justify-content: center!important;">';
              if ($page > 1) {
                echo '<li  class="paginate_button page-item previous" id="zero_config_previous"><a href="store.php?page=' . ($page - 1) . '" aria-controls="zero_config" data-dt-idx="0" tabindex="0" class="page-link"style="background-color: #bd2130;border-color: #bd2130!important;"  >Previous</a></li>';
              }
              for ($i = 1; $i < $total_pages; $i++) {
                if ($i == $page) {
                  $active = "active";
                } else {
                  $active = "";
                }
                echo '<li class="paginate_button page-item ' . $active . '"><a href="store.php?page=' . $i . '" aria-controls="zero_config"  class="page-link">' . $i . '</a></li>';
              }
              if ($total_pages > $page) {
                echo '<li class="paginate_button page-item next" id="zero_config_next"><a href="store.php?page=' . ($page + 1) . '" aria-controls="zero_config" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
              }
              echo '</ul>';
  
            ?>
  
            <!-- <?php } ?> -->
                                                              
                                                                
  
    
  
  </div>
  </div>
  </body>
  </html>