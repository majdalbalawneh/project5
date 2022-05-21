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
    <!-- <link rel="stylesheet" href="../css/admin.css"> -->
    <style>
         <?php include "./css/admin.css" ?>
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
      <!-- /main sidebar -->
      <div class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Users Details</h2>
                        <a href="create.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New User</a>
                    </div>
                    <?php
                    // Include config file
                    include_once '../connection.php';
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM register;";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped" style="width: 20%; height: 10%; margin:4% 5%">';
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
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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
 <!-- Main sidebar -->
 <!-- <div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed">
        <div class="sidebar-content"> -->

            
            <!-- /Sidebar Category -->
            <!-- <div class="sidebar-category sidebar-default">
                <div class="category-title">
                    <span>DASHBOARD</span>
                </div>
                <div class="category-content">
                    <ul id="fruits-nav" class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Products
                            </a>
                        </li>
                    </ul> -->
                    <!-- /Nav -->
                <!-- </div> -->
                <!-- /Category Content -->
            <!-- </div> -->
            <!-- Sidebar Category -->
           <!-- <div class="sidebar-category sidebar-default">
                <div class="category-title">
                    <span>Contenu éditable</span>
                </div>
                <div class="category-content">
                    <ul id="sidebar-editable-nav" class="nav flex-column">
                        <li class="nav-item">
                            <a href="/admin/customers" class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/resettest" class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                reset test
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/usersprofiles" class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                users profiles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/users" class="nav-link active">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                users
                            </a>
                        </li>
                    </ul>
                    /Nav
                </div>-->
                <!-- /Category Content -->
            <!-- </div> -->
            <!-- /Sidebar Category -->
            
        </div>
    </div>
  
</body>
</html>