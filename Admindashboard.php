<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,300&family=Patrick+Hand&family=Poppins:wght@100;200;300;400&family=Smooch&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
 <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="style2.css">
    <title>admin dashboard</title>

</head>
<body>
<div class="navbar">
       <div class="logo"><img src="img/logo_kids.gif"width="100px"> </div>
       <nav>
<ul style="margin-right: 5%; font-family: 'Nunito', sans-serif;
font-family: 'Patrick Hand', cursive; ">
 <li><a href="./index.html">Home</a></li>
 <li><a href="./product/product.php">Products</a></li>
 <li><a href="./Welcome/ContactUs.html">Contact Us</a></li>
 <li><a href="./Welcome/AboutUs.html">About US</a></li>
</ul> <hr style="width:70%; margin-left: 31%;">
       </nav><nav style="text-align:center;margin-left: 30%; margin-top: -2%; width:50%">
  <h2>Admin Dashboard</h2>
  <a href="index.html"><button class="btn btn-outline-primary" type="button">Logout</button></a>
</nav>
</div>
<hr><br><br>

<!----------iframe------------->
<iframe src="page1.html" frameborder="0" name="iframe" style="position:absolute; width:70%; height: 55em; margin-left:25%; border: outset gray 3px;"> </iframe>
    <!-- Main sidebar -->
<div class="asid"  style =" width: 24%; position:absolute; margin-right:37%; padding-left:2%;">
    <div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed">
        <div class="sidebar-content">
            
            <!-- /Sidebar Category -->
            <div class="sidebar-category sidebar-default">
                <div class="category-title bg-warning">
                   <h4> <span >Users</span></h4>
                </div>
                <div class="category-content">
                    <ul id="fruits-nav" class="nav flex-column">
                    <li class="nav-item">
                            <a href="Admin/Admin.php" class="nav-link" target="iframe">
                            <i class="far fa-eye"></i>
                                view User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Admin/Admin1.php" class="nav-link" target="iframe">
                            <i class="fas fa-pencil-alt"></i>
                                Add or Edit User
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="Admin/update.php" class="nav-link" target="iframe">
                                <i class="far fa-edit"></i>
                               Edit User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Admin/delete.php" class="nav-link" target="iframe">
                            <i class="fas fa-user-times"></i>
                               Remove User
                            </a>
                        </li> -->
                    </ul>
                    <!-- /Nav -->
                </div>
                <!-- /Category Content -->
            </div>
            <!-- /Sidebar Category -->
            <div class="sidebar-category sidebar-default">
                <div class="category-title bg-warning">
                    <h4><span>Categories</span></h4>
                </div>
               
                <div class="category-content">
                    <ul id="sidebar-editable-nav" class="nav flex-column">
                        <li class="nav-item">
                            <a href="Admin_cat/Admin_cat.php" class="nav-link" target="iframe">
                            <i class="far fa-eye"></i>
                                View Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Admin_cat/Admin_cat1.php" class="nav-link" target="iframe">
                                <i class="far fa-edit"></i>
                                Add or Edit  Category
                            </a>
                        </li>
                         <!-- <li class="nav-item">
                            <a href="Admin_cat/update.php" class="nav-link" target="iframe">
                                <i class="far fa-edit"></i>
                                Edit Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Admin_cat/delete.php" class="nav-link" target="iframe">
                            <i class="far fa-trash-alt"></i>
                                Delete Category
                            </a>
                        </li> -->
                    </ul>
                    <!-- /Nav -->
                </div>
                <!-- /Category Content -->
            </div>
            <!-- /Sidebar Category -->
        </div>
        <div class="sidebar-category sidebar-default">
            <div class="category-title bg-warning">
               <h4> <span>Products</span></h4>
            </div>
            <div class="category-content">
                <ul id="sidebar-editable-nav" class="nav flex-column">
                <li class="nav-item">
                        <a href="Admin_pro/Admin_pro1.php" class="nav-link" target="iframe">
                        <i class="far fa-eye"></i>
                            view product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Admin_pro/Admin_pro.php" class="nav-link" target="iframe">
                        <i class="fas fa-pencil-alt"></i>
                            Add or Edit product
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="Admin_pro/update.php" class="nav-link" target="iframe">
                            <i class="far fa-edit"></i>
                            Edit product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Admin_pro/delete.php" class="nav-link" target="iframe">
                        <i class="far fa-trash-alt"></i>
                            Delete product
                        </a> -->
                    <!-- </li> -->
                </ul>
                <!-- /Nav -->
            </div>
            <!-- /Category Content -->
        </div>
    </div>
</div>
<div>
                <!-- <p style="margin-left: 40%;"><strong> Welcome to Admin Panel !</strong> What would you want to do today?</h2><img  src="../img/admin.png" width="50%" ></p> -->
    <!-- /main sidebar -->
 <!-- end content-wrapper -->
</body>
</html>