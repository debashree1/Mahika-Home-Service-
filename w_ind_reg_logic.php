<?php
session_start();
@$basis=$_REQUEST["basis"];
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
@$age=$_REQUEST["age"];
@$category=$_REQUEST["category"];
@$doc=$_REQUEST["doc"];
@$doc_no=$_REQUEST["doc_no"];
@$experience=$_REQUEST["experience"];
@$certified_level=$_REQUEST["certified_level"];
@$_SESSION['username'] = $username;
if ($_SESSION["username"]==true)
{
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$query="SELECT username FROM worker_details";
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
                                <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="workerlogin.html">Work as professional</a>
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
        else
        {
            $q="insert into worker_details(basis, name , email,   city  ,  subarea   , address, pin, username  ,  phone ,  password  ,  question ,   answer , gender , age, category, doc, doc_no, experience, certified_level) values('$basis','$name','$email','$city','$area','$address','$pin','$username','$phone','$password','$question','$answer','$gender','$age','$category','$doc','$doc_no','$experience','$certified_level')";
            $result=mysqli_query($a,$q);
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
                                    <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="w_logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <section class="features" id="features" style="background:lavender">
                    <div class="container">
                        <div style="text-align: center">
                            <center><h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 40px;margin-top: 80px;">Congrats! Registration is successful.
                                    Please visit the following Mahika Centre for document verification.<br></h1>
                                <h1 class="mb-5 text-primary" style="font-family:Catamaran;font-size: 25px;margin-top: 5px;">
                                    <?php
                                    @$qw="SELECT * FROM cities where city='$city' ";
                                    @$res1 = mysqli_query($a, $qw);
                                    if ($res1)
                                    {
                                        while ($row=mysqli_fetch_array($res1))
                                        {
                                            $dbcity=$row['city'];
                                            $dbcentre=$row['centre'];
                                            echo $dbcity;
                                            echo " Branch: ";
                                            echo $dbcentre;
                                            echo "<br>Contact No : +91 9434508973";
                                            echo "<br>Email ID : mahikaservice@gmail.com";
                                        }
                                    }
                                    ?>
                                </h1>
                            </center>
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
    }
    else
    {
        echo "Sorry Error";
        session_destroy(); //destroy the session
        exit();
    }
}
else {
    header("location:w_reg.php");
}

?>