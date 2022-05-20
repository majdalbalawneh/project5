<?php
include_once './connection.php'



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    
    <title>Store</title>
    <style>
        .prod{width: 240px; height: 150px; margin-left: 2%;}
    </style>
</head>
<body>

<div class="navbar">
       <div class="logo"><img src="../img/logo_kids.jpg"width="180px"> </div>
       <nav>
<ul>
<li><a href="">Home</a></li>
<li><a href="">Products</a></li>
<li><a href="">Contact Us</a></li>
<li><a href="">About US</a></li>
<li><a href="">CART</a></li>
<li><select class="custom-select custom-select-sm mb-3">
     <option selected disabled> Change Category </option>
        <?php	$r ="SELECT * FROM categories";
         $res_category=mysqli_query($conn, $r);
		while ($row = mysqli_fetch_array($res_category)) { ?>
          <option><a href="category.php?category=<?php echo $row['category_id']; ?>"><?php echo $row['category_name'];?>
             </a></option>
         <?php
		}
          ?>
 </select></li>
</ul>
       </nav>
    </div>
    <br><br><br>
<section class="section-content ml">
    <div class="container">

        <div class="row">
            <main class="col-md-9">

                <!-- <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto">  </span>

                    </div>
                </header>sect-heading -->

                <div class="row">
                    <?php

							$limit = 9;

							if (isset($_GET['page'])) {
								$page = $_GET['page'];
							} else {
								$page = 2;
							}
							$offset = ($page - 1) * $limit;
							$record_index = ($page - 1) * $limit;
							$product_query = "SELECT * FROM `products` LIMIT $record_index, $limit ";
							$product_result = mysqli_query($conn, $product_query);

							if (mysqli_num_rows($product_result) > 0) {
								while ($row = mysqli_fetch_assoc($product_result)) {
							?>

                    <div class="col-md-4">
                        <form action="cart.php?action=add&id=<?php echo $row["id"]; ?>" method="POST">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">

                                    <img class="prod" src="<?php echo $row['img'];?>">

                                </div> <!-- img-wrap.// -->
                                <figcaption class="info-wrap">
                                    <div class="fix-height">
                                        <a href="product-detail.php?id=<?php echo $row['id']; ?>"
                                            class="title"><?php echo $row['product_name']; ?></a>
                                        <div class="price-wrap mt-2">
                                            <span class="price"><?php echo $row['price']; ?></span>
                                            <!-- <del class="price-old">$1980</del> -->
                                        </div> <!-- price-wrap.// -->
                                    </div>
                                    <!-- col.// -->
                                    <div class="col">
                                        <p class="card-text">Quantity:
                                            <input type="number" min="1" max="25" name="quantity" class="form-control"
                                                value="1" style="width: 60px;">
                                        </p>
                                    </div> <!-- col.// -->
                                    <br>

                                    <input type="hidden" name="hidden_product_name"
                                        value="<?php echo $row["product_name"]; ?>">
                                    <!-- <input type="hidden" name="hidden_img" value="<?php #echo $row["img"]; ?>"> -->
                                                                     
                                   <!-- <img src="<php  
                                    // $qq="SELECT * FROM `products`;";
                                    // $query=mysqli_query($conn,$qq);
                                    // $images = array();
                                    // while ($row = mysqli_fetch_assoc($query)) {
                                    //   $images[] = $row['img'];
                                    // }
                                    
                                    // >">-->
                                    
                                
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                    <input type="submit" name="add" class="btn btn-block btn-info"
                                        value="Add to cart">
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
						echo '  <ul class="pagination">';
						if ($page > 1) {
							echo '<li class="paginate_button page-item previous" id="zero_config_previous"><a href="store.php?page=' . ($page - 1) . '" aria-controls="zero_config" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
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

            </main> <!-- col.// -->

        </div>

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= FOOTER ========================= -->


<!-- ========================= FOOTER END // ========================= -->


<script>
$("input[type='number']").inputSpinner()
</script>
    
</body>
</html>