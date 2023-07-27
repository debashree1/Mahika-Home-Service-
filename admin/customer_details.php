<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:index.php");
}
else {
    @$username=$_SESSION['username'];
    @$name=$_REQUEST['name'];
    @$dbusername=$_REQUEST['dbusername'];
    @$city=$_REQUEST['city'];
    @$area=$_REQUEST['area'];
    @$address=$_REQUEST['address'];
    @$pin=$_REQUEST['pin'];
    @$phone=$_REQUEST['phone'];
    @$email=$_REQUEST['email'];
    @$question=$_REQUEST['question'];
    @$gender=$_REQUEST['gender'];
    @$pay_method=$_REQUEST['pay_method'];
    @$card_no=$_REQUEST['card_no'];
    if ($name!=null)
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
            <link rel="shortcut icon" href="../img/favicon.ico" />
            <!-- Icons font CSS-->
            <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
            <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
            <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
            <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

            <!-- Font special for pages-->
            <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

            <!-- Vendor CSS-->
            <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
            <link href="../css/hover-min.css" rel="stylesheet">


            <!-- Main CSS-->
            <link href="../css/style.css" rel="stylesheet" media="all">
            <link href="../css/main.css" rel="stylesheet" media="all">
        </head>

        <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
            <div class="container">
                <div class="navbar-header">
                    <a class=" nav-link js-scroll-trigger" href="#top">
                        <img class="img-rounded" src="../img/logo.png" />
                    </a>
                </div>
                &nbsp;
                <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small></h2></a>
                <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger hvr-glow" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger hvr-glow " href="workers.php">Workers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger hvr-glow " href="customers.php">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger hvr-glow " href="bookings.php">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger hvr-glow " href="queries.php">Queries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger hvr-glow " href="logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="features" id="features" style="background: url(../img/bg-pattern.png), -webkit-linear-gradient(left, #6f42c1, #e4606d);">
            <form action="customers.php" method="post">
                <input type="submit" class="cont_button2 btn-dark" value="<< Back">
            </form>
            <div class="container">
                <div style="text-align: center;margin-top: 60px;">
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 my-auto">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="feature-item" style="text-align:left;padding-left:15px;width: 700px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                        <div class="loginBox2">
                                            <img src="../img/adm.png" class="user1">
                                            <center><h3 class="text-white">Customer Details</h3><br></center>
                                            <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $name; ?></b></p>
                                            <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$phone; ?></b></p>
                                            <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $email; ?></b></p>
                                            <p style="color: #f1b0b7;">Gender : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $gender; ?></b></p>
                                            <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $address." , ".$area ." , ".$pin." , ".$city; ?></b></p>
                                            <p style="color: #f1b0b7;">Username : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $dbusername; ?></b></p>
                                            <p style="color: #f1b0b7;">Security Question : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $question; ?></b></p>
                                            <p style="color: #f1b0b7;">Payment Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                            <?php
                                            if ($pay_method=="Card Payment")
                                            {
                                                ?>
                                                <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $card_no; ?></b></p>
                                                <?php
                                            }
                                            ?>
                                            <br>
                                            <form action="customers_delete.php" method="post">
                                                <input type="hidden" name="dbusername" value="<?php echo $dbusername; ?>">
                                                <input class="btn" style="background-color: yellow;color: black" type="submit" name="" value="Remove Customer?">
                                            </form>
                                        </div>
                                    </div><br>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Jquery JS-->
        <script src="../vendor/jquery1/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="../vendor/select2/select2.min.js"></script>
        <script src="../vendor/jquery-validate/jquery.validate.min.js"></script>
        <script src="../vendor/bootstrap-wizard/bootstrap.min.js"></script>
        <script src="../vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="../vendor/datepicker/moment.min.js"></script>
        <script src="../vendor/datepicker/daterangepicker.js"></script>
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        
        <script src="../js/new-age.min.js"></script>

        <!-- Main JS-->
        <script src="../js/global.js"></script>
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
        header("Location:profile.php");
    }
}
?>




