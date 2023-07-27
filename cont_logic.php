<?php
    session_start();
    @$name=$_REQUEST["name"];
    @$email=$_REQUEST["email"];
    @$phone=$_REQUEST["phone"];
    @$address=$_REQUEST["address"];
    @$message=$_REQUEST["message"];
    $_SESSION['name'] = $name;
    if ($_SESSION["name"]==true) 
    {
    $con=mysqli_connect("localhost","root","","mahika") or die("unable to connect");
    $query="insert into feedback(name,email,phone,address,message) values('$name','$email','$phone','$address','$message')";
    $result=mysqli_query($con,$query);
                if($result) {
                               ?>
                    <!DOCTYPE html>
                    <html>
                    <head>

                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <meta name="description" content="">
                        <meta name="author" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Mahika | Home Service</title>
                        <link rel="shortcut icon" href="img/favicon.ico" />
                        <!-- Bootstrap core CSS -->
                        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

                        <!-- Custom fonts for this template -->
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">

                        <!-- Plugin CSS -->
                        <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

                        <!-- Custom styles for this template -->
                        <link href="css/style.css" rel="stylesheet">
                        <link href="css/hover-min.css" rel="stylesheet">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


                    </head>

                    <body id="page-top">

                    <!-- Navigation -->
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-info" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png" />
                                </a>
                            </div>
                            &nbsp;
                            <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro">Service Expert</small></h2></a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="logout.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="userlogin.php">User Login/Sign Up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="contact.html">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>


                    <section class="features" id="features" style="background:lavender">
                        <div class="container">
                            <div style="text-align: center">
                                <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;margin-top: 150px">Thank you for your feedback. We will soon respond to your query through mail.</h1>
                            </div>
                            <div class="row" style="height: 70px">
                                <div class="col-sm-12 my-auto">
                                    <div class="container-fluid">
                                        <div class="row">

                                        </div>
                    </section>
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
                    <!-- Bootstrap core JavaScript -->
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Plugin JavaScript -->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    
                    <script src="js/new-age.min.js"></script>
                    </body>
                    </html>
                    <?php
                }
                else {
                    echo "Error";
                }
    }
    else {
        header("location:contact.html");
    }

?>