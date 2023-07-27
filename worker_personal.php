<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
}
else
{
    $username=$_SESSION['username'];
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$query="SELECT * FROM worker_details where username='$username'";
    @$result = mysqli_query($a, $query);
    if($result)
    {
        while ($row=mysqli_fetch_array($result))
        {
            $dbbasis=$row['basis'];
            $dbname=$row['name'];
            $dbemail=$row['email'];
            $dbphone=$row['phone'];
            $dbgender=$row['gender'];
            $dbage=$row['age'];
            $dbcity=$row['city'];
            $dbarea=$row['subarea'];
            $dbaddress=$row['address'];
            $dbpin=$row['pin'];
            $dbquestion=$row['question'];
            $dbdoc=$row['doc'];
            $dbdoc_no=$row['doc_no'];
            $dbcategory=$row['category'];
            $dbservice1=$row['service1'];
            $dbrate11=$row['rate11'];
            $dbrate12=$row['rate12'];
            $dbrate13=$row['rate13'];
            $dbservice2=$row['service2'];
            $dbrate21=$row['rate21'];
            $dbrate22=$row['rate22'];
            $dbrate23=$row['rate23'];
            $dbservice3=$row['service3'];
            $dbrate31=$row['rate31'];
            $dbcertified_level=$row['certified_level'];
            $_SESSION["category"]=$dbcategory;
            if ($dbbasis=='Individual')
            {
                if ($dbcategory=='Repair' or $dbcategory=='Beauty' or $dbcategory=='Photography')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features">
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td><?php echo $dbage; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $dbgender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Security Question</td>
                                        <td><?php echo $dbquestion; ?></td>
                                    </tr>
                                    <tr>
                                    <form action="worker_p_edit.php" method="post">
                                        <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                        <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Personal Details"></td>
                                    </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.'/ Service'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/ Service'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3</td>
                                        <td><?php echo $dbservice3; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate31.'/ Service'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Certified Level</td>
                                        <td><?php echo $dbcertified_level; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
                if ($dbcategory=='Maid')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features">
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td><?php echo $dbage; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $dbgender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Security Question</td>
                                        <td><?php echo $dbquestion; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Personal Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.'/ Day'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/ Day'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3</td>
                                        <td><?php echo $dbservice3; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate31.'/ Day'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Certified Level</td>
                                        <td><?php echo $dbcertified_level; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
                if ($dbcategory=='Tuition')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features">
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td><?php echo $dbage; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $dbgender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Security Question</td>
                                        <td><?php echo $dbquestion; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Personal Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.'/ Month'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/ Month'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3</td>
                                        <td><?php echo $dbservice3; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate31.'/ Month'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Certified Level</td>
                                        <td><?php echo $dbcertified_level; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
                if ($dbcategory=='Renovation')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features" >
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td><?php echo $dbage; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $dbgender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Personal Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.'/ 1BHK'.' , '.'Rs. '.$dbrate12.'/ 2BHK'.' , '.'Rs. '.$dbrate12.'/ 3BHK'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/ 1BHK'.' , '.'Rs. '.$dbrate22.'/ 2BHK'.' , '.'Rs. '.$dbrate23.'/ 3BHK'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Certified Level</td>
                                        <td><?php echo $dbcertified_level; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <td>Security Question</td>
                                        <td><?php echo $dbquestion; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
                if ($dbcategory=='Packers & Movers')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features" >
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td><?php echo $dbage; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $dbgender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Personal Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.' within city'.' , '.'Rs. '.$dbrate12.' per 200km'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.' within city'.' , '.'Rs. '.$dbrate22.' per 200km'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Certified Level</td>
                                        <td><?php echo $dbcertified_level; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <td>Security Question</td>
                                        <td><?php echo $dbquestion; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
            }
            else
            {
                if ($dbcategory=='Repair' or $dbcategory=='Beauty' or $dbcategory=='Photography')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;
                            <?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features">
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Company Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.'/ Service'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/  Service'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3</td>
                                        <td><?php echo $dbservice3; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/Service'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS--
                    >
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
                if ($dbcategory=='Maid')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features" >
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Company Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.'/ Day'; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/ Day'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3</td>
                                        <td><?php echo $dbservice3; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate31.'/ Day'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
                if ($dbcategory=='Tuition')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features">
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Company Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.'/ Month'; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/ Month'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3</td>
                                        <td><?php echo $dbservice3; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service3 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate31.'/ Month'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
                if ($dbcategory=='Renovation')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features" >
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-6">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Company Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="container1 col-md-6">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.'/ 1BHK'.' , '.'Rs. '.$dbrate12.'/ 2BHK'.' , '.'Rs. '.$dbrate13.'/ 3BHK'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.'/ 1BHK'.' , '.'Rs. '.$dbrate22.'/ 2BHK'.' , '.'Rs. '.$dbrate23.'/ 3BHK'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>

                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
                if ($dbcategory=='Packers & Movers')
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Icons font CSS-->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
                        <!-- Font special for pages-->
                        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

                        <!-- Vendor CSS-->
                        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                        <link href="css/hover-min.css" rel="stylesheet">


                        <!-- Main CSS-->
                        <link href="css/main.css" rel="stylesheet" media="all">
                        <link href="css/style.css" rel="stylesheet" media="all">
                    </head>

                    <body>
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;<?php $_SESSION['name']=$dbname; ?>
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features" >
                        <form action="worker_profile.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <h1 class="mb-4 text-light">Professional Details</h1>
                        <center>
                            <div class="row container">
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $dbname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $dbemail; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $dbphone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $dbcity; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td><?php echo $dbarea; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $dbaddress; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pin</td>
                                        <td><?php echo $dbpin; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_p_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Company Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-2"></div>
                                <table class="container1 col-md-5">
                                    <tbody>
                                    <tr>
                                        <td>Work-Basis</td>
                                        <td><?php echo $dbbasis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work-Category</td>
                                        <td><?php echo $dbcategory; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1</td>
                                        <td><?php echo $dbservice1; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service1 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate11.' within city'.' , '.'Rs. '.$dbrate12.' per 200km'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2</td>
                                        <td><?php echo $dbservice2; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Service2 rate</td>
                                        <td><?php echo 'Rs. '.$dbrate21.' within city'.' , '.'Rs. '.$dbrate22.' per 200km'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Work Experience</td>
                                        <td>3years</td>
                                    </tr>
                                    <tr>
                                        <td>Security Question</td>
                                        <td><?php echo $dbquestion; ?></td>
                                    </tr>
                                    <tr>
                                        <form action="worker_s_edit.php" method="post">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                        <td class="col-2" colspan="2"><input style="font-size: 14px" class="btn-link" type="submit" value="Change Service Details"></td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </section>

                    <!-- Jquery JS-->
                    <script src="vendor/jquery1/jquery.min.js"></script>
                    <!-- Vendor JS-->
                    <script src="vendor/select2/select2.min.js"></script>
                    <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                    <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                    <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                    <script src="vendor/datepicker/moment.min.js"></script>
                    <script src="vendor/datepicker/daterangepicker.js"></script>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>

                    <!-- Main JS-->
                    <script src="js/global.js"></script>
                    <footer>
                        <div class="container">
                            <p>&copy; Mahika Home Service. All Rights Reserved.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    </body>
                    <!-- end document-->
                    </html>
                    <?php
                }
            }

        }

    }

}
?>


