<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style2.css">

    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<div class="navbar">
        <div class="logo"><img src="../img/logo_kids.gif"width="100px"> </div>
       
        <nav style="font-family: 'Nunito', sans-serif;
 font-family: 'Patrick Hand', cursive;">
 <ul style="margin-right: 5%; font-family: 'Nunito', sans-serif;
 font-family: 'Patrick Hand', cursive;">
 <li><a href="../index.html">Home</a></li>
 <li><a href="../product/product.php">Products</a></li>
 <li><a href="../Welcome/ContactUs.html">Contact Us</a></li>
 <li><a href="../Welcome/AboutUs.html">About US</a></li>
 
 <li><a href="../Login/Login.php">Login</a></li>
 <li><a href="../Regestration/Signup.php">Sign Up</a></li>
 <li><a href="../User/User.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
 <li><a href=""><img style="position:absolute; margin-top:-2.5%; width:4%" src="../img/cart2.png" ></a></li>

 </ul> <hr style="width:70%; margin-left: 31%;">
        </nav>
     </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-bottom:5%">
                    <div class="mt-5 mb-5 clearfix">
                        <h1 style="text-align:center">User Information</h1>
                    </div>
                    <?php
                    session_start();
                    // Include config file
                    include_once '../Configration/connection.php';
                    $email= $_SESSION['email'];
                    // Attempt select query execution
                    $sql ="SELECT * FROM register WHERE  Email='$email'; ";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<div class="table-responsive"> ';
                            echo '<table class="table  table-warning table-bordered">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Secound Name</th>";
                                        echo "<th>Family Name</th>";
                                        echo "<th>Phone Number</th>";
                                        echo "<th>Date of Birth</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Password</th>";
                                        echo "<th>Confirm Password</th>";
                                        echo "<th>Edit </th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){

                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['First_Name'] . "</td>";
                                        echo "<td>" . $row['Sec_Name'] . "</td>";
                                        echo "<td>" . $row['Last_Name'] . "</td>";
                                        echo "<td>" . $row['Phone_Num'] . "</td>";
                                        echo "<td>" . $row['DOB'] . "</td>";
                                        echo "<td>" . $row['Email'] . "</td>";
                                        echo "<td>" . $row['Password'] . "</td>";
                                        echo "<td>" . $row['con_Password'] . "</td>";

                                        echo "<td>";
                                            echo '<a href="Update_info.php?id='. $row['id'] .'" style="text_align:center"class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
            </div> 
                </div>
            <div class="container-fluied">
   <!-- Footer -->
   <footer
            class="text-center text-lg-start text-primary"
            style="background: linear-gradient(to right, rgba(216, 112, 147, 0.377),rgba(216, 112, 147, 0.235), rgba(216, 112, 147, 0.087));"           
            >
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
              <p>
                Toys shop has announced that Toys store is opening , its separate platform that provides The most distinctive games that the child spends his time enjoying and learning, has amassed more than 35 million customers.
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Categores</h6>
              <p >
                <a class="text-primary">Electronic Toys</a>
              </p>
              <p>
                <a class="text-primary">Crative Toys</a>
              </p>
              <p>
                <a class="text-primary">Educational Toys</a>
              </p>
              <p>
                <a class="text-primary" >Dolls Toys</a>
              </p>
            </div>
            <!-- Grid column -->
  
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
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #3b5998"
                 href="#!"
                 role="button"
                 ><i class="fab fa-facebook-f"></i
                ></a>
  
              
  
              <!-- github samer -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #dd4b39"
                 href="#!"
                 role="button"
                 ><i class="fab fa-google"></i
                ></a>
  
              
                    <br>
              <!-- Linkedin -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #0082ca"
                 href="https://www.linkedin.com/in/tamara-al-shabatat-060452123/?challengeId=AQFBHTafIZQKgAAAAYAhs1i-oKYMHGzoCp7CFeBZxbEnPZafk74JDnX6xmEwh0tDvN3Eq6-LHqiH4WRl2oxvFyTOX64Dyzv3lQ&submissionId=3ffc26ce-3a62-e516-90b4-716d0cbeeb40"
                 role="button" target="_blank"
                 ><i class="fab fa-linkedin-in"></i
                ></a>
              <!-- Github -->
              <a
                 class="btn btn-primary btn-floating m-1"
                 style="background-color: #333333"
                 href="https://github.com/majdalbalawneh"
                 role="button" target="_blank"
                 ><i class="fab fa-github"></i
                ></a>
            </div>
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        MST<sup>2</sup>&nbsp; © 2022 Copyright:
        <a  href="https://www.orange.jo/ar/pages/default.aspx" target="_blank">Orange.jo</a> 
          
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>
</html>