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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amazon Prime Video</title>
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="index1.css">
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="nav.css">
    <html lang="en">
      </head>

      <body>
      <div class="container-fluied">
        <!-- Navbar -->
  <nav class="navbar  navbar-expand-lg navbar-light white scrolling-navbar">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="">
        <img src="img/logo_kids.gif" alt="logo" width="50px">
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
            <a class="nav-link waves-effect" href="#"><strong>Home</strong>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="product/product.php"><strong>Products</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="Welcome/ContactUs.php"><strong>Contact Us</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="Welcome/AboutUs.php"><strong>About Us</strong></a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item restrict">
            <a href="Login/Login.php" class="nav-link waves-effect">
            <strong> Login</strong>
            </a>
          </li>
          <li class="nav-item restrict">
            <a href="Regestration/Signup.php" class="nav-link waves-effect"><strong>Signup</strong>
            </a>
          </li>
          <li class="nav-item restrict1">
            <a class="nav-link waves-effect" href="User/User.php">
            <i class="fa fa-user" aria-hidden="true"></i>
              <span class="clearfix d-none d-sm-inline-block"><strong>Account</strong></span>
            </a>
          </li>
         
         

          <li class="nav-item">
            <a class="nav-link waves-effect" href="Cart/cart.php">
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"><strong>Cart</strong></span>
            </a>
          </li>
          <li class="nav-item restrict1">
            <a href="Login/logout.php" class="nav-link waves-effect"><strong>Logout</strong>
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

          <div class="container-fluied" >
          <div id="header-hero" >
            <div class="header-bg" ><img style="height:80%;" src="https://cdn.discordapp.com/attachments/976113421546307604/980823788109316096/0433e77a3ec66497c64024a621e127b2.jpg" alt="header-image"/>
            <div class="header-content">
              <h1 style="margin-top:10% ; margin-left:45%">Welcome to<span class="logo-style"> KIDS TOy'S</span> store</h1>
              <p style=" width:30% ; margin-left:55% ; margin-top:-2% ; text-align:justify">Toys shop has announced that Toys store is opening , its separate platform that provides The most distinctive games that the child spends his time enjoying.</p>
             <button class="button1" style="margin-left:65% ; background-color:#e55951;"> <span>Shop Now </span>
              </button>
            </div>
          </div> </div></div>
        </header>
        <section id="summer-collection">
          <div class="container">
            <div class="sc-content">
              <h1>summer collection</h1>
              <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
              <a href="product/product.php">discover now</a> </div>
            <div class="sc-media">
              <div class="sc-media-bg"> <img src="https://www.verywellfamily.com/thmb/I8C7BE9WFao8Snf_DJsykF2MRIM=/1500x1500/smart/filters:no_upscale()/girl-playing-dolls-56a8fd373df78cf772a290f8.jpg" alt="sc-image" /> </div>
            </div>
          </div>
        </section>

        <section>
          <div class="rt-container">
            <div class="col-rt-12">
              <div class="Scriptcontent">
                <section id="products">
                  <div class="container">
                <div class="products-header">
                  <h2>popular products</h2>
                </div>
                <div class="slide-container">
                  <div class="wgh-slider">
                    <input class="wgh-slider-target" type="radio" id="slide-1" name="slider" />
                    <input class="wgh-slider-target" type="radio" id="slide-2" name="slider" />
                    <input class="wgh-slider-target" type="radio" id="slide-3" name="slider" checked="checked" />
                    <input class="wgh-slider-target" type="radio" id="slide-4" name="slider" />
                    <input class="wgh-slider-target" type="radio" id="slide-5" name="slider" />
                    <div class="wgh-slider__viewport">
                      <div class="wgh-slider__viewbox">
                        <div class="wgh-slider__container">
                          <div class="wgh-slider-item">
                            <div class="wgh-slider-item__inner">
                              <figure class="wgh-slider-item-figure"><img class="wgh-slider-item-figure__image"
                                  src="img/image-1.jpg" alt="TGirls Play Kitchens" />
                                <figcaption class="wgh-slider-item-figure__caption"><a
                                    href="https://f4.bcbits.com/img/a3905613628_16.jpg">Girls Play Kitchens</a><span>27
                                    JD</span></figcaption>
                              </figure>
                              <label class="wgh-slider-item__trigger" for="slide-1" title="Show product 1"></label>
                            </div>
                          </div>
                          <div class="wgh-slider-item">
                            <div class="wgh-slider-item__inner">
                              <figure class="wgh-slider-item-figure"><img class="wgh-slider-item-figure__image"
                                  src="img/image-2.jpg" alt="Disney Car Toys" />
                                <figcaption class="wgh-slider-item-figure__caption"><a
                                    href="https://f4.bcbits.com/img/a3905613628_16.jpg">Disney Car Toys</a><span>15 JD</span>
                                </figcaption>
                              </figure>
                              <label class="wgh-slider-item__trigger" for="slide-2" title="Show product 2"></label>
                            </div>
                          </div>
                          <div class="wgh-slider-item">
                            <div class="wgh-slider-item__inner">
                              <figure class="wgh-slider-item-figure"><img class="wgh-slider-item-figure__image"
                                  src="img/image-3.jpg" alt="Kids' Electric Vehicles" />
                                <figcaption class="wgh-slider-item-figure__caption"><a
                                    href="https://f4.bcbits.com/img/a3905613628_16.jpg">Kids' Electric Vehicles</a><span>140
                                    JD</span></figcaption>
                              </figure>
                              <label class="wgh-slider-item__trigger" for="slide-3" title="Show product 3"></label>
                            </div>
                          </div>
                          <div class="wgh-slider-item">
                            <div class="wgh-slider-item__inner">
                              <figure class="wgh-slider-item-figure"><img class="wgh-slider-item-figure__image"
                                  src="img/image-4.jpg" alt="block building set" />
                                <figcaption class="wgh-slider-item-figure__caption"><a
                                    href="https://f4.bcbits.com/img/a3905613628_16.jpg">block building set</a><span>80
                                    JD</span></figcaption>
                              </figure>
                              <label class="wgh-slider-item__trigger" for="slide-4" title="Show product 4"></label>
                            </div>
                          </div>
                          <div class="wgh-slider-item">
                            <div class="wgh-slider-item__inner">
                              <figure class="wgh-slider-item-figure"><img class="wgh-slider-item-figure__image"
                                  src="img/image-5.jpg" alt="smart blocks toys" />
                                <figcaption class="wgh-slider-item-figure__caption"><a
                                    href="https://picsum.photos/id/237/480/480">smart blocks toys</a><span>24 JD</span>
                                </figcaption>
                              </figure>
                              <label class="wgh-slider-item__trigger" for="slide-5" title="Show product 5"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- partial -->
      
              </div>
            </div>
          </div>
        </section>

     
        </section>
        <section id="collections">
          <div class="container">
            <div class="c-1">
              <div class="c-1-image-holder"> <img src="https://image.smythstoys.com/zoom/145509.jpg" alt="image"> <p style="text-align:center">DOLLS</p> </div>
            </div>
            <div class="c-2">
              <h2>CATEGORIES</h2>
              <hr style="width:60% ; margin-left:50%"/>
              <div class="c-2-image-holder"> <p style="text-align:right">Electronic Toys</p><img class="left" src="https://www.gannett-cdn.com/presto/2019/11/25/USAT/9da93219-bf63-4b9c-af3c-7c2ecdb7ff23-Toys_and_Clothes.png?width=660&height=372&fit=crop&format=pjpg&auto=webp" alt="">
                <img class="right" src="https://www.toynews-online.biz/wp-content/uploads/electronic-toys.jpg"
                 alt=""><p style="text-align:center">Creative Toys</p></div>
              <p class="button"  style="background-color:#e55951";>view all collections</p>
            </div>
          </div>
        </section>
<div class="container" >
            <div class="d-flex justify-content-around">

        <?php
   include_once 'Configration/connection.php';

  $sql = "SELECT * FROM products WHERE code='MST2';";
  if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){ 
        while($row = mysqli_fetch_array($result)){
            ?>
<div class="product-card ">
		<div class="badge">Hot</div>
		<div class="product-tumb">
        <img style="width:250px" src="<?php echo $row['discount']; ?>">
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
				<div class="product-price"><del><?php echo "Price: ". $row['price']; ?> $</del>
                    </del><br>
                    <span class="price">Price: <?php echo ($row['price']* (100-10) / 100); ?>$
                    </span></div>
                    <input type="hidden" name="hidden_product_name" value="<?php echo $row[" product_name"]; ?>">
                <input type="hidden" name="id_prod" value="<?php echo $row['product_id'] ?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row[" price"]; ?>">

				<div class="product-links">
					<!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
				</div>
			</div>
		</div>
	</div>
<?php }}} ?>
        </div>
</div>
  
<!-- Start Footer bottom Area -->
<footer>
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

</body>
</html>