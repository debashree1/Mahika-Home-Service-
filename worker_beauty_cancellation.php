<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
}
else {
    $username=$_SESSION['username'];
    @$id=$_REQUEST['id'];
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$query="select booking_request from beauty_bookings where id='$id'";
    @$result = mysqli_query($a, $query);
    if ($result)
    {
        while ($row=mysqli_fetch_array($result))
        {
            $booking_request = $row['booking_request'];
        }
        if ($booking_request=="Pending")
        {
            @$q="UPDATE beauty_bookings SET booking_request='Cancelled by worker' where id='$id'";
            @$res = mysqli_query($a, $q);
            if($res)
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
                    <link rel="shortcut icon" href="img/favicon.ico"/>
                    <!-- Icons font CSS-->
                    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                          rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                    <!-- Font special for pages-->
                    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                          rel="stylesheet">

                    <!-- Vendor CSS-->
                    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                    <link href="css/hover-min.css" rel="stylesheet">


                    <!-- Main CSS-->
                    <link href="css/style.css" rel="stylesheet" media="all">
                    <link href="css/main.css" rel="stylesheet" media="all">
                </head>

                <body>
                <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                     style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                    <div class="container">
                        <div class="navbar-header">
                            <a class=" nav-link js-scroll-trigger" href="#top">
                                <img class="img-rounded" src="img/logo.png"/>
                            </a>
                        </div>
                        &nbsp;
                        <a class="navbar-brand " href="#page-top">
                            <h2>
                                <small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small>
                            </h2>
                        </a>
                        <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse"
                                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                                aria-label="Toggle navigation">
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
                <section class="features" id="features" style="background: url(img/bg-pattern.png), -webkit-linear-gradient(left, #6f42c1, #e4606d);">
                    <div class="container">
                        <br><br><br><br><br>
                        <center><h2 style="color: lawngreen;font-size: 40px">Your booking is successfully cancelled.</h2>
                            <br>
                            <br>
                            <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                            <br><br><br><br><br><br>
                        </center>
                    </div>
                </section>
                <!-- Jquery JS-->
                <script src="vendor/jquery1/jquery.min.js"></script>
                <!-- Vendor JS-->
                <script src="vendor/select2/select2.min.js"></script>
                <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
                <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
                <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="js/jquery_date_time_picker.js"></script>
                <script src="js/jquery_date_time_picker1.js"></script>
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

                </html>
                <!-- end document-->
                <?php
            }
            else
            {
                echo "Error";
            }

        }
        else if ($booking_request=='Cancelled by user' or $booking_request=='Cancelled by worker')
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
                <link rel="shortcut icon" href="img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                      rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="css/style.css" rel="stylesheet" media="all">
                <link href="css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small>
                        </h2>
                    </a>
                    <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                            aria-label="Toggle navigation">
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
            <section class="features" id="features" style="background: url(img/bg-pattern.png), -webkit-linear-gradient(left, #6f42c1, #e4606d);">
                <div class="container">
                    <br><br><br><br><br>
                    <center><h2 style="color: lawngreen;font-size: 40px">Your booking is already cancelled.</h2>
                        <br>
                        <br>
                        <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                        <br><br><br><br><br><br>
                    </center>
                </div>
            </section>
            <!-- Jquery JS-->
            <script src="vendor/jquery1/jquery.min.js"></script>
            <!-- Vendor JS-->
            <script src="vendor/select2/select2.min.js"></script>
            <script src="vendor/jquery-validate/jquery.validate.min.js"></script>
            <script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
            <script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="js/jquery_date_time_picker.js"></script>
            <script src="js/jquery_date_time_picker1.js"></script>
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

            </html>
            <!-- end document-->
            <?php
        }
    }
}
?>