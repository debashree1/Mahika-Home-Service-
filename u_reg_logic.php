<?php
session_start();
@$name=$_REQUEST["name"];
@$email=$_REQUEST["email"];
@$city=$_REQUEST["city"];
@$area=$_REQUEST["area"];
@$address=$_REQUEST["address"];
@$pin=$_REQUEST["pin"];
@$username=$_REQUEST["username"];
@$phone=$_REQUEST["phone"];
@$password=$_REQUEST["password"];
@$question=$_REQUEST["question"];
@$answer=$_REQUEST["answer"];
@$gender=$_REQUEST["gender"];
@$card_no=$_REQUEST["card_no"];
@$ans=$_REQUEST["ans"];
@$b_day=$_REQUEST["b_day"];
@$pay_method='Card Payment';
@$_SESSION['username'] = $username;
if ($_SESSION["username"]==true)
{
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$query="SELECT username FROM user_details";
    @$result = mysqli_query($a, $query);
    $count=0;
    if($result)
    {
        while ($row=mysqli_fetch_array($result))
        {
            $dbusername=$row['username'];
            if ($username==$dbusername)
            {
                $count=$count + 1;
                break;
            }

        }
        if ($count == 1){
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
                        <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;margin-top: 150px">Oops! Username already exists. Please try again with different username.
                        </h1>
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
        else{if($ans==$b_day)
        {
            $con=mysqli_connect("localhost","root","","mahika") or die("unable to connect");
            $query="insert into user_details(name ,pay_method , email,   city  ,  area   , address, pin, username  ,  phone ,  password  ,  question ,   answer , gender , card_no) values('$name','$pay_method','$email','$city','$area','$address','$pin','$username','$phone','$password','$question','$answer','$gender','$card_no')";
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
                                    <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="u_logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <section class="features" id="features" style="background:lavender">
                    <div class="container">
                        <div style="text-align: center">
                            <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;margin-top: 150px">Congrats! Registration is successful.</h1>
                            <form action="u_dashboard.php" method="post">
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
                        <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 40px;margin-top: 150px">Oops! We could not verify card holder. Registration is unsuccessful.
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
        }}
    }
    else
    {
        echo "Sorry Error";
        session_destroy(); //destroy the session
        exit();
    }
}
else {
    header("location:u_reg.php");
}

?>