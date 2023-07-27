<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
}
else {
    $username=$_SESSION['username'];
    @$card_no=$_REQUEST['card_no'];
    @$ans=$_REQUEST['ans'];
    @$bday=$_REQUEST['bday'];
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    if ($card_no!=null)
    {
        if ($ans==$bday)
        {
            @$q="UPDATE worker_details SET card_no='$card_no' where username='$username'";
            @$res = mysqli_query($a, $q);
            if($res)
            {
                header("Location:worker_card.php");
            }
            else{
                echo "Error";
            }
        }
        else
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
                    <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name'];?></small></h2></a>
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
                <form action="worker_card.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <br><br><br><br>
                <center><h2 class="text-light">Verification Failed</h2></center><br>
                <br><br><br><br><br><br><br>
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
        header("Location:worker_card.php");
    }
}
?>