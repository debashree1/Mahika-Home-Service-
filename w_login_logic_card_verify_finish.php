<?php
session_start();
@$name=$_REQUEST["name"];
@$username=$_REQUEST["username"];
@$service1=$_REQUEST["service1"];
@$rate11=$_REQUEST["rate11"];
@$rate12=$_REQUEST["rate12"];
@$rate13=$_REQUEST["rate13"];
@$service2=$_REQUEST["service2"];
@$rate21=$_REQUEST["rate21"];
@$rate22=$_REQUEST["rate22"];
@$rate23=$_REQUEST["rate23"];
@$service3=$_REQUEST["service3"];
@$rate31=$_REQUEST["rate31"];
@$card_no=$_REQUEST["card_no"];
@$ans=$_REQUEST["ans"];
@$b_day=$_REQUEST["b_day"];
@$password=$_REQUEST['password'];
@$_SESSION['username'] = $username;
if ($_SESSION["username"]==true) {
    if($ans==$b_day)
    {
        $con=mysqli_connect("localhost","root","","mahika") or die("unable to connect");
        $query="update worker_details set service1='$service1' , rate11='$rate11', rate12='$rate12' , rate13='$rate13', service2='$service2', rate21='$rate21',rate22='$rate22',rate23='$rate23', service3='$service3',rate31='$rate31',card_no='$card_no' where username='$username' ";
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
                    <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $name; ?></small></h2></a>
                    <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="w_logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <section class="features" id="features" style="background:lavender">
                <div class="container">
                    <div style="text-align: center">
                        <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;margin-top: 150px">Congrats! Now you can proceed to deliver home service.</h1>
                        <form action="w_login_logic.php" method="post">
                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                            <input type="hidden" name="password" value="<?php echo $password; ?>">
                            <center><input class="cont_button" type="submit" value="Take me to my dashboard"></center>
                        </form>
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
                                <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="index.html">Home</a>
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
                        <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;margin-top: 150px">Oops! Registration is unsuccessful.
                            <br>Please Try again later.</h1>
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
            session_destroy(); //destroy the session
            exit();
        }
    }
    else
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Mahika | Home Service</title>
            <link rel="shortcut icon" href="img/favicon.ico" />
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        </head>
        <body>
        <div class="container-fluid register">
            <br>
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="img/logo.png" alt=""/>
                    <h2 style="font-family: Catamaran">Welcome</h2>
                    <?php
                    echo "<h1>$name</h1>";
                    ?>
                    <br><br>
                    <h3 style="font-family: Catamaran">Credit card details will be used for future transactions and you can update it anytime.</h3>
                </div>
                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="w_logout.php">Log Out</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <h2 class="register-heading">We could not verify card holder. Please Enter proper card details.</h2>
                            <form action="w_login_logic_card_verify.php" method="post">
                                <div class="register-form">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <select name="card_type" required="required" class="form-control">
                                                    <option value="" selected disabled>--Select Credit Card Option--</option>
                                                    <option value="VISA">VISA</option>
                                                    <option value="MasterCard">MasterCard</option>
                                                    <option value="Amex">Amex</option>
                                                    <option value="RuPay">RuPay</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="card_no" class="form-control" placeholder="Card No *" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="c_name" class="form-control" placeholder="Name on Card *" required />
                                            </div>
                                            <div class="form-group">
                                                Expires on *&nbsp;
                                                <div class="row">
                                                    <div class="col-6">
                                                        <select name="month" required="required" class="form-control">
                                                            <option value="" selected disabled>--Select Month--</option>
                                                            <option>January</option>
                                                            <option>February</option>
                                                            <option>March</option>
                                                            <option>April</option>
                                                            <option>May</option>
                                                            <option>June</option>
                                                            <option>July</option>
                                                            <option>August</option>
                                                            <option>September</option>
                                                            <option>October</option>
                                                            <option>November</option>
                                                            <option>December</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <select name="year" required="required" class="form-control">
                                                            <option value="" selected disabled>--Select Year--</option>
                                                            <option>2018</option>
                                                            <option>2019</option>
                                                            <option>2020</option>
                                                            <option>2021</option>
                                                            <option>2022</option>
                                                            <option>2023</option>
                                                            <option>2024</option>
                                                            <option>2025</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="number" name="cvv" class="form-control" placeholder="Enter CVV *" value="" required="" />
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                                    <input type="hidden" name="password" value="<?php echo $password; ?>">
                                    <input type="hidden" name="service1" value="<?php echo $service1; ?>">
                                    <input type="hidden" name="rate11" value="<?php echo $rate11; ?>">
                                    <input type="hidden" name="rate12" value="<?php echo $rate12; ?>">
                                    <input type="hidden" name="rate13" value="<?php echo $rate13; ?>">
                                    <input type="hidden" name="service2" value="<?php echo $service2; ?>">
                                    <input type="hidden" name="rate21" value="<?php echo $rate21; ?>">
                                    <input type="hidden" name="rate22" value="<?php echo $rate22; ?>">
                                    <input type="hidden" name="rate23" value="<?php echo $rate23; ?>">
                                    <input type="hidden" name="service3" value="<?php echo $service3; ?>">
                                    <input type="hidden" name="rate31" value="<?php echo $rate31; ?>">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="submit" class="btnRegister"  value="Next >>"/>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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


        <?php
        session_destroy(); //destroy the session
        exit();
    }
}
else {
    header("location:workerlogin.html");
}

?>