<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
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
        <link href="css/style.css" rel="stylesheet" media="all">
        <link href="css/main.css" rel="stylesheet" media="all">
        <link href="css/date_time_picker.css" rel="Stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery2.js"></script>
        <script language="javascript">
            $(document).ready(function () {
                $("#txtdate").datepicker({
                    minDate: 0
                });
            });
        </script>
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
                        <a class="nav-link js-scroll-trigger hvr-glow" href="user_profile.php">User-Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-glow " href="find_service.php">Find-Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-glow " href="user_service.php">Record-Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-glow " href="user_help.php">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-glow " href="u_logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="features" id="features" style="background: url(img/bg-pattern.png), -webkit-linear-gradient(left, #6f42c1, #e4606d);">
        <form action="user_service.php" method="post">
            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
        </form>
        <div class="container">
            <center>
                <b style="color: white;font-size: 50px;font-family: 'Bradley Hand ITC'">Ongoing Service Record</b><br>
                <p style="color: yellow;font-size: 30px">Please select a category from the following...</p><br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <a href="user_maid_ongoing.php" class="col-12 col-md-4 btn hvr-bob" style="color: black;width: 100px;height: 100px;margin-bottom: 10px;background-color: sandybrown;padding-top: 35px">
                        Maid Service
                    </a>
                    <div class="col-md-4"></div>
                    <a href="user_beauty_ongoing.php" class="col-12 col-md-4 btn hvr-bob" style="color: black;width: 100px;height: 100px;margin-bottom: 10px;background-color: lightpink;padding-top: 35px">
                        Beauty Service
                    </a>
                    <a href="user_renovation_ongoing.php" class="col-12 col-md-4 btn hvr-bob" style="color: black;width: 100px;height: 100px;margin-bottom: 10px;background-color: lavender;padding-top: 35px">
                        Renovation Service
                    </a>
                    <a href="user_repair_ongoing.php" class="col-12 col-md-4 btn hvr-bob" style="color: black;width: 100px;height: 100px;margin-bottom: 10px;background-color: wheat;padding-top: 35px">
                        Repair Service
                    </a>

                    <a href="user_movers_ongoing.php" class="col-12 col-md-4 btn hvr-bob" style="color: black;width: 100px;height: 100px;margin-bottom: 10px;background-color:#1da1f2;padding-top: 35px">
                        Packers & Movers Service
                    </a>
                    <a href="user_tuition_ongoing.php" class="col-12 col-md-4 btn hvr-bob" style="color: black;width: 100px;height: 100px;margin-bottom: 10px;background-color: greenyellow;padding-top: 35px">
                        Tuition Service
                    </a>
                    <a href="user_photo_ongoing.php" class="col-12 col-md-4 btn hvr-bob" style="color: black;width: 100px;height: 100px;margin-bottom: 10px;background-color: mediumpurple;padding-top: 35px">
                        Photography Service
                    </a>

                </div>
                <br><br><br>
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
?>
