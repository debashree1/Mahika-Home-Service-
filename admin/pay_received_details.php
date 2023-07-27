<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:index.php");
}
else
{
    $username=$_SESSION['username'];
    @$category=$_REQUEST['category'];
    if ($category!=null)
    {
        if ($category=='Beauty')
        {
            @$id=$_REQUEST['id'];
            @$service=$_REQUEST['service'];
            @$booking_date=$_REQUEST['booking_date'];
            @$worker_username=$_REQUEST['worker_username'];
            @$customer_username=$_REQUEST['customer_username'];
            @$service_city=$_REQUEST['service_city'];
            @$service_area=$_REQUEST['service_area'];
            @$service_address=$_REQUEST['service_address'];
            @$service_pin=$_REQUEST['service_pin'];
            @$worker_city=$_REQUEST['worker_city'];
            @$worker_area=$_REQUEST['worker_area'];
            @$worker_address=$_REQUEST['worker_address'];
            @$worker_pin=$_REQUEST['worker_pin'];
            @$from_date=$_REQUEST['from_date'];
            @$time=$_REQUEST['time'];
            @$code=$_REQUEST['code'];
            @$code_verified=$_REQUEST['code_verified'];
            @$booking_request=$_REQUEST['booking_request'];
            @$worker_rate=$_REQUEST['worker_rate'];
            @$web_rate_percentage=$_REQUEST['web_rate_percentage'];
            @$transportation_charge=$_REQUEST['transportation_charge'];
            @$transport_included=$_REQUEST['transport_included'];
            @$worker_cost=$_REQUEST['worker_cost'];
            @$web_cost=$_REQUEST['web_cost'];
            @$total=$_REQUEST['total'];
            @$pay_method=$_REQUEST['pay_method'];
            @$user_card_no=$_REQUEST['user_card_no'];
            @$worker_card_no=$_REQUEST['worker_card_no'];
            @$admin_card_no=$_REQUEST['admin_card_no'];
            @$worker_pay_received=$_REQUEST['worker_pay_received'];
            @$website_pay_received=$_REQUEST['website_pay_received'];
            @$actual_work_start_time=$_REQUEST['actual_work_start_time'];
            @$service_finish_time=$_REQUEST['service_finish_time'];
            @$complain_registered=$_REQUEST['complain_registered'];
            @$feedback=$_REQUEST['feedback'];
            @$c_name=$_REQUEST['c_name'];
            @$c_phone=$_REQUEST['c_phone'];
            @$c_email=$_REQUEST['c_email'];
            @$w_name=$_REQUEST['w_name'];
            @$w_phone=$_REQUEST['w_phone'];
            @$w_email=$_REQUEST['w_email'];
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
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                <form action="pay_received.php" method="post">
                    <input type="hidden" name="city" value="<?php echo $service_city; ?>">
                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <div class="container">
                    <div style="text-align: center;margin-top: 60px;">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-auto">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/kk.png" class="user1">
                                                <center><h3 class="text-white">Home Service Details</h3><br></center>
                                                <p style="color: #f1b0b7;">Customer Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                <p style="color: #f1b0b7;">Date from : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from_date; ?></b></p>
                                                <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                <?php
                                                if ($booking_request=='Ongoing')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($booking_request=='Finished')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <p style="color: #f1b0b7;">Work actually finished at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_finish_time." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_address." , ".$service_area." , ".$service_city." , ".$service_pin; ?></b></p>
                                                <p style="color: #f1b0b7;">Booking date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_date; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $user_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/beauty.png" class="user1">
                                                <center><h3 class="text-white">Beauty Professional</h3><br></center>
                                                <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_address." , ".$worker_area ." , ".$worker_pin." , ".$worker_city; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($code!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Code : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code; ?></b></p>
                                                    <p style="color: #f1b0b7;">Code verified : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code_verified; ?></b></p>
                                                    <p style="color: #f1b0b7;">Complain registered? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $complain_registered; ?></b></p>
                                                    <?php
                                                }
                                                if ($feedback!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Feedback : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $feedback." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/pay.png" class="user1">
                                                <center><h3 class="text-white">Payment Info</h3><br></center>
                                                <p style="color: #f1b0b7;">Status : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_request; ?></b></p>
                                                <p style="color: #f1b0b7;">Worker got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Website got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $website_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Admin Card : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $admin_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." / service"; ?></b></p>
                                                <p style="color: #f1b0b7;">Charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate; ?></b></p>
                                                <p style="color: #f1b0b7;">Transport : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$transportation_charge; ?></b></p>
                                                <p style="color: yellow;border-bottom: 2px solid deeppink">Web cost : <b style="color: yellow;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p>
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
        if ($category=='Repair')
        {
            @$id=$_REQUEST['id'];
            @$service=$_REQUEST['service'];
            @$booking_date=$_REQUEST['booking_date'];
            @$worker_username=$_REQUEST['worker_username'];
            @$customer_username=$_REQUEST['customer_username'];
            @$service_city=$_REQUEST['service_city'];
            @$service_area=$_REQUEST['service_area'];
            @$service_address=$_REQUEST['service_address'];
            @$service_pin=$_REQUEST['service_pin'];
            @$worker_city=$_REQUEST['worker_city'];
            @$worker_area=$_REQUEST['worker_area'];
            @$worker_address=$_REQUEST['worker_address'];
            @$worker_pin=$_REQUEST['worker_pin'];
            @$from_date=$_REQUEST['from_date'];
            @$time=$_REQUEST['time'];
            @$code=$_REQUEST['code'];
            @$code_verified=$_REQUEST['code_verified'];
            @$booking_request=$_REQUEST['booking_request'];
            @$worker_rate=$_REQUEST['worker_rate'];
            @$web_rate_percentage=$_REQUEST['web_rate_percentage'];
            @$transportation_charge=$_REQUEST['transportation_charge'];
            @$transport_included=$_REQUEST['transport_included'];
            @$worker_cost=$_REQUEST['worker_cost'];
            @$web_cost=$_REQUEST['web_cost'];
            @$total=$_REQUEST['total'];
            @$pay_method=$_REQUEST['pay_method'];
            @$user_card_no=$_REQUEST['user_card_no'];
            @$worker_card_no=$_REQUEST['worker_card_no'];
            @$admin_card_no=$_REQUEST['admin_card_no'];
            @$worker_pay_received=$_REQUEST['worker_pay_received'];
            @$website_pay_received=$_REQUEST['website_pay_received'];
            @$actual_work_start_time=$_REQUEST['actual_work_start_time'];
            @$service_finish_time=$_REQUEST['service_finish_time'];
            @$complain_registered=$_REQUEST['complain_registered'];
            @$feedback=$_REQUEST['feedback'];
            @$c_name=$_REQUEST['c_name'];
            @$c_phone=$_REQUEST['c_phone'];
            @$c_email=$_REQUEST['c_email'];
            @$w_name=$_REQUEST['w_name'];
            @$w_phone=$_REQUEST['w_phone'];
            @$w_email=$_REQUEST['w_email'];
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
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                <form action="pay_received.php" method="post">
                    <input type="hidden" name="city" value="<?php echo $service_city; ?>">
                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <div class="container">
                    <div style="text-align: center;margin-top: 60px;">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-auto">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/kk.png" class="user1">
                                                <center><h3 class="text-white">Home Service Details</h3><br></center>
                                                <p style="color: #f1b0b7;">Customer Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                <p style="color: #f1b0b7;">Date from : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from_date; ?></b></p>
                                                <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                <?php
                                                if ($booking_request=='Ongoing')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($booking_request=='Finished')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <p style="color: #f1b0b7;">Work actually finished at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_finish_time." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_address." , ".$service_area." , ".$service_city." , ".$service_pin; ?></b></p>
                                                <p style="color: #f1b0b7;">Booking date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_date; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $user_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/repair1.png" class="user1">
                                                <center><h3 class="text-white">Repair Professional</h3><br></center>
                                                <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_address." , ".$worker_area ." , ".$worker_pin." , ".$worker_city; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($code!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Code : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code; ?></b></p>
                                                    <p style="color: #f1b0b7;">Code verified : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code_verified; ?></b></p>
                                                    <p style="color: #f1b0b7;">Complain registered? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $complain_registered; ?></b></p>
                                                    <?php
                                                }
                                                if ($feedback!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Feedback : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $feedback." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/pay.png" class="user1">
                                                <center><h3 class="text-white">Payment Info</h3><br></center>
                                                <p style="color: #f1b0b7;">Status : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_request; ?></b></p>
                                                <p style="color: #f1b0b7;">Worker got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Website got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $website_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Admin Card : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $admin_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." / service"; ?></b></p>
                                                <p style="color: #f1b0b7;">Charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate; ?></b></p>
                                                <p style="color: #f1b0b7;">Transport : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$transportation_charge; ?></b></p>
                                                <p style="color: yellow;border-bottom: 2px solid deeppink">Web cost : <b style="color: yellow;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p>
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
        if ($category=='Renovation')
        {
            @$id=$_REQUEST['id'];
            @$service=$_REQUEST['service'];
            @$booking_date=$_REQUEST['booking_date'];
            @$worker_username=$_REQUEST['worker_username'];
            @$customer_username=$_REQUEST['customer_username'];
            @$service_city=$_REQUEST['service_city'];
            @$service_area=$_REQUEST['service_area'];
            @$service_address=$_REQUEST['service_address'];
            @$service_pin=$_REQUEST['service_pin'];
            @$worker_city=$_REQUEST['worker_city'];
            @$worker_area=$_REQUEST['worker_area'];
            @$worker_address=$_REQUEST['worker_address'];
            @$worker_pin=$_REQUEST['worker_pin'];
            @$from_date=$_REQUEST['from_date'];
            @$time=$_REQUEST['time'];
            @$house_size=$_REQUEST['house_size'];
            @$code=$_REQUEST['code'];
            @$code_verified=$_REQUEST['code_verified'];
            @$booking_request=$_REQUEST['booking_request'];
            @$worker_rate=$_REQUEST['worker_rate'];
            @$web_rate_percentage=$_REQUEST['web_rate_percentage'];
            @$worker_cost=$_REQUEST['worker_cost'];
            @$web_cost=$_REQUEST['web_cost'];
            @$total=$_REQUEST['total'];
            @$pay_method=$_REQUEST['pay_method'];
            @$user_card_no=$_REQUEST['user_card_no'];
            @$worker_card_no=$_REQUEST['worker_card_no'];
            @$admin_card_no=$_REQUEST['admin_card_no'];
            @$worker_pay_received=$_REQUEST['worker_pay_received'];
            @$website_pay_received=$_REQUEST['website_pay_received'];
            @$actual_work_start_time=$_REQUEST['actual_work_start_time'];
            @$service_finish_time=$_REQUEST['service_finish_time'];
            @$complain_registered=$_REQUEST['complain_registered'];
            @$feedback=$_REQUEST['feedback'];
            @$c_name=$_REQUEST['c_name'];
            @$c_phone=$_REQUEST['c_phone'];
            @$c_email=$_REQUEST['c_email'];
            @$w_name=$_REQUEST['w_name'];
            @$w_phone=$_REQUEST['w_phone'];
            @$w_email=$_REQUEST['w_email'];
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
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                <form action="pay_received.php" method="post">
                    <input type="hidden" name="city" value="<?php echo $service_city; ?>">
                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <div class="container">
                    <div style="text-align: center;margin-top: 60px;">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-auto">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/kk.png" class="user1">
                                                <center><h3 class="text-white">Home Service Details</h3><br></center>
                                                <p style="color: #f1b0b7;">Customer Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                <p style="color: #f1b0b7;">House-size : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $house_size; ?></b></p>
                                                <p style="color: #f1b0b7;">Date from : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from_date; ?></b></p>
                                                <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                <?php
                                                if ($booking_request=='Ongoing')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($booking_request=='Finished')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <p style="color: #f1b0b7;">Work actually finished at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_finish_time." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_address." , ".$service_area." , ".$service_city." , ".$service_pin; ?></b></p>
                                                <p style="color: #f1b0b7;">Booking date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_date; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $user_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/painter.png" class="user1">
                                                <center><h3 class="text-white">Renovation Professional</h3><br></center>
                                                <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_address." , ".$worker_area ." , ".$worker_pin." , ".$worker_city; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($code!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Code : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code; ?></b></p>
                                                    <p style="color: #f1b0b7;">Code verified : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code_verified; ?></b></p>
                                                    <p style="color: #f1b0b7;">Complain registered? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $complain_registered; ?></b></p>
                                                    <?php
                                                }
                                                if ($feedback!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Feedback : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $feedback." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/pay.png" class="user1">
                                                <center><h3 class="text-white">Payment Info</h3><br></center>
                                                <p style="color: #f1b0b7;">Status : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_request; ?></b></p>
                                                <p style="color: #f1b0b7;">Worker got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Website got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $website_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Admin Card : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $admin_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." / service"; ?></b></p>
                                                <p style="color: #f1b0b7;">Charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate; ?></b></p>
                                                <p style="color: yellow;border-bottom: 2px solid deeppink">Web cost : <b style="color: yellow;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p>
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
        if ($category=='Maid')
        {
            @$id=$_REQUEST['id'];
            @$service=$_REQUEST['service'];
            @$booking_date=$_REQUEST['booking_date'];
            @$worker_username=$_REQUEST['worker_username'];
            @$customer_username=$_REQUEST['customer_username'];
            @$service_city=$_REQUEST['service_city'];
            @$service_area=$_REQUEST['service_area'];
            @$service_address=$_REQUEST['service_address'];
            @$service_pin=$_REQUEST['service_pin'];
            @$worker_city=$_REQUEST['worker_city'];
            @$worker_area=$_REQUEST['worker_area'];
            @$worker_address=$_REQUEST['worker_address'];
            @$worker_pin=$_REQUEST['worker_pin'];
            @$from_date=$_REQUEST['from_date'];
            @$time=$_REQUEST['time'];
            @$duration=$_REQUEST['duration'];
            @$code=$_REQUEST['code'];
            @$code_verified=$_REQUEST['code_verified'];
            @$booking_request=$_REQUEST['booking_request'];
            @$worker_rate=$_REQUEST['worker_rate'];
            @$web_rate_percentage=$_REQUEST['web_rate_percentage'];
            @$transportation_charge=$_REQUEST['transportation_charge'];
            @$transport_included=$_REQUEST['transport_included'];
            @$worker_cost=$_REQUEST['worker_cost'];
            @$web_cost=$_REQUEST['web_cost'];
            @$total=$_REQUEST['total'];
            @$pay_method=$_REQUEST['pay_method'];
            @$user_card_no=$_REQUEST['user_card_no'];
            @$worker_card_no=$_REQUEST['worker_card_no'];
            @$admin_card_no=$_REQUEST['admin_card_no'];
            @$worker_pay_received=$_REQUEST['worker_pay_received'];
            @$website_pay_received=$_REQUEST['website_pay_received'];
            @$actual_work_start_time=$_REQUEST['actual_work_start_time'];
            @$service_finish_time=$_REQUEST['service_finish_time'];
            @$complain_registered=$_REQUEST['complain_registered'];
            @$feedback=$_REQUEST['feedback'];
            @$c_name=$_REQUEST['c_name'];
            @$c_phone=$_REQUEST['c_phone'];
            @$c_email=$_REQUEST['c_email'];
            @$w_name=$_REQUEST['w_name'];
            @$w_phone=$_REQUEST['w_phone'];
            @$w_email=$_REQUEST['w_email'];
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
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                <form action="pay_received.php" method="post">
                    <input type="hidden" name="city" value="<?php echo $service_city; ?>">
                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <div class="container">
                    <div style="text-align: center;margin-top: 60px;">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-auto">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/kk.png" class="user1">
                                                <center><h3 class="text-white">Home Service Details</h3><br></center>
                                                <p style="color: #f1b0b7;">Customer Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                <p style="color: #f1b0b7;">Duration : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $duration; ?></b></p>
                                                <p style="color: #f1b0b7;">Date from : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from_date; ?></b></p>
                                                <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                <?php
                                                if ($booking_request=='Ongoing')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($booking_request=='Finished')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <p style="color: #f1b0b7;">Work actually finished at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_finish_time." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_address." , ".$service_area." , ".$service_city." , ".$service_pin; ?></b></p>
                                                <p style="color: #f1b0b7;">Booking date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_date; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $user_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/maid.png" class="user1">
                                                <center><h3 class="text-white">Maid Professional</h3><br></center>
                                                <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_address." , ".$worker_area ." , ".$worker_pin." , ".$worker_city; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($code!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Code : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code; ?></b></p>
                                                    <p style="color: #f1b0b7;">Code verified : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code_verified; ?></b></p>
                                                    <p style="color: #f1b0b7;">Complain registered? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $complain_registered; ?></b></p>
                                                    <?php
                                                }
                                                if ($feedback!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Feedback : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $feedback." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/pay.png" class="user1">
                                                <center><h3 class="text-white">Payment Info</h3><br></center>
                                                <p style="color: #f1b0b7;">Status : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_request; ?></b></p>
                                                <p style="color: #f1b0b7;">Worker got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Website got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $website_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Admin Card : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $admin_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." / day"; ?></b></p>
                                                <p style="color: #f1b0b7;">Charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate; ?></b></p>
                                                <p style="color: #f1b0b7;">Transport : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$transportation_charge; ?></b></p>
                                                <p style="color: yellow;border-bottom: 2px solid deeppink">Web cost : <b style="color: yellow;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p>
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
        if ($category=='Packers & Movers')
        {
            @$id=$_REQUEST['id'];
            @$service=$_REQUEST['service'];
            @$booking_date=$_REQUEST['booking_date'];
            @$worker_username=$_REQUEST['worker_username'];
            @$customer_username=$_REQUEST['customer_username'];
            @$origin=$_REQUEST['origin'];
            @$destination=$_REQUEST['destination'];
            @$worker_city=$_REQUEST['worker_city'];
            @$worker_area=$_REQUEST['worker_area'];
            @$worker_address=$_REQUEST['worker_address'];
            @$worker_pin=$_REQUEST['worker_pin'];
            @$from_date=$_REQUEST['from_date'];
            @$time=$_REQUEST['time'];
            @$code=$_REQUEST['code'];
            @$code_verified=$_REQUEST['code_verified'];
            @$booking_request=$_REQUEST['booking_request'];
            @$worker_rate=$_REQUEST['worker_rate'];
            @$web_rate_percentage=$_REQUEST['web_rate_percentage'];
            @$worker_cost=$_REQUEST['worker_cost'];
            @$web_cost=$_REQUEST['web_cost'];
            @$total=$_REQUEST['total'];
            @$pay_method=$_REQUEST['pay_method'];
            @$user_card_no=$_REQUEST['user_card_no'];
            @$worker_card_no=$_REQUEST['worker_card_no'];
            @$admin_card_no=$_REQUEST['admin_card_no'];
            @$worker_pay_received=$_REQUEST['worker_pay_received'];
            @$website_pay_received=$_REQUEST['website_pay_received'];
            @$actual_work_start_time=$_REQUEST['actual_work_start_time'];
            @$service_finish_time=$_REQUEST['service_finish_time'];
            @$complain_registered=$_REQUEST['complain_registered'];
            @$feedback=$_REQUEST['feedback'];
            @$c_name=$_REQUEST['c_name'];
            @$c_phone=$_REQUEST['c_phone'];
            @$c_email=$_REQUEST['c_email'];
            @$w_name=$_REQUEST['w_name'];
            @$w_phone=$_REQUEST['w_phone'];
            @$w_email=$_REQUEST['w_email'];
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
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                <form action="pay_received.php" method="post">
                    <input type="hidden" name="city" value="<?php echo $origin; ?>">
                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <div class="container">
                    <div style="text-align: center;margin-top: 60px;">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-auto">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/kk.png" class="user1">
                                                <center><h3 class="text-white">Home Service Details</h3><br></center>
                                                <p style="color: #f1b0b7;">Customer Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                <p style="color: #f1b0b7;">Origin : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $origin; ?></b></p>
                                                <p style="color: #f1b0b7;">Destination : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $destination; ?></b></p>
                                                <p style="color: #f1b0b7;">Date from : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from_date; ?></b></p>
                                                <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                <?php
                                                if ($booking_request=='Ongoing')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($booking_request=='Finished')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <p style="color: #f1b0b7;">Work actually finished at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_finish_time." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;">Booking date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_date; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $user_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/truck2.png" class="user1">
                                                <center><h3 class="text-white">Packers & Movers Professional</h3><br></center>
                                                <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_address." , ".$worker_area ." , ".$worker_pin." , ".$worker_city; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($code!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Code : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code; ?></b></p>
                                                    <p style="color: #f1b0b7;">Code verified : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code_verified; ?></b></p>
                                                    <p style="color: #f1b0b7;">Complain registered? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $complain_registered; ?></b></p>
                                                    <?php
                                                }
                                                if ($feedback!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Feedback : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $feedback." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/pay.png" class="user1">
                                                <center><h3 class="text-white">Payment Info</h3><br></center>
                                                <p style="color: #f1b0b7;">Status : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_request; ?></b></p>
                                                <p style="color: #f1b0b7;">Worker got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Website got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $website_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Admin Card : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $admin_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." / service"; ?></b></p>
                                                <p style="color: #f1b0b7;">Charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate; ?></b></p>
                                                <p style="color: yellow;border-bottom: 2px solid deeppink">Web cost : <b style="color: yellow;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p>
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
        if ($category=='Tuition')
        {
            @$id=$_REQUEST['id'];
            @$service=$_REQUEST['service'];
            @$booking_date=$_REQUEST['booking_date'];
            @$worker_username=$_REQUEST['worker_username'];
            @$customer_username=$_REQUEST['customer_username'];
            @$service_city=$_REQUEST['service_city'];
            @$service_area=$_REQUEST['service_area'];
            @$service_address=$_REQUEST['service_address'];
            @$service_pin=$_REQUEST['service_pin'];
            @$worker_city=$_REQUEST['worker_city'];
            @$worker_area=$_REQUEST['worker_area'];
            @$worker_address=$_REQUEST['worker_address'];
            @$worker_pin=$_REQUEST['worker_pin'];
            @$from_date=$_REQUEST['from_date'];
            @$time=$_REQUEST['time'];
            @$level=$_REQUEST['level'];
            @$duration=$_REQUEST['duration'];
            @$code=$_REQUEST['code'];
            @$code_verified=$_REQUEST['code_verified'];
            @$booking_request=$_REQUEST['booking_request'];
            @$worker_rate=$_REQUEST['worker_rate'];
            @$web_rate_percentage=$_REQUEST['web_rate_percentage'];
            @$transportation_charge=$_REQUEST['transportation_charge'];
            @$transport_included=$_REQUEST['transport_included'];
            @$worker_cost=$_REQUEST['worker_cost'];
            @$web_cost=$_REQUEST['web_cost'];
            @$total=$_REQUEST['total'];
            @$pay_method=$_REQUEST['pay_method'];
            @$user_card_no=$_REQUEST['user_card_no'];
            @$worker_card_no=$_REQUEST['worker_card_no'];
            @$admin_card_no=$_REQUEST['admin_card_no'];
            @$worker_pay_received=$_REQUEST['worker_pay_received'];
            @$website_pay_received=$_REQUEST['website_pay_received'];
            @$actual_work_start_time=$_REQUEST['actual_work_start_time'];
            @$service_finish_time=$_REQUEST['service_finish_time'];
            @$complain_registered=$_REQUEST['complain_registered'];
            @$feedback=$_REQUEST['feedback'];
            @$c_name=$_REQUEST['c_name'];
            @$c_phone=$_REQUEST['c_phone'];
            @$c_email=$_REQUEST['c_email'];
            @$w_name=$_REQUEST['w_name'];
            @$w_phone=$_REQUEST['w_phone'];
            @$w_email=$_REQUEST['w_email'];
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
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                <form action="pay_received.php" method="post">
                    <input type="hidden" name="city" value="<?php echo $service_city; ?>">
                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <div class="container">
                    <div style="text-align: center;margin-top: 60px;">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-auto">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/kk.png" class="user1">
                                                <center><h3 class="text-white">Home Service Details</h3><br></center>
                                                <p style="color: #f1b0b7;">Customer Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                <p style="color: #f1b0b7;">Level : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $level; ?></b></p>
                                                <p style="color: #f1b0b7;">Duration : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $duration; ?></b></p>
                                                <p style="color: #f1b0b7;">Date from : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from_date; ?></b></p>
                                                <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                <?php
                                                if ($booking_request=='Ongoing')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($booking_request=='Finished')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <p style="color: #f1b0b7;">Work actually finished at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_finish_time." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_address." , ".$service_area." , ".$service_city." , ".$service_pin; ?></b></p>
                                                <p style="color: #f1b0b7;">Booking date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_date; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $user_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/teach.png" class="user1">
                                                <center><h3 class="text-white">Tuition Professional</h3><br></center>
                                                <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_address." , ".$worker_area ." , ".$worker_pin." , ".$worker_city; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($code!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Code : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code; ?></b></p>
                                                    <p style="color: #f1b0b7;">Code verified : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code_verified; ?></b></p>
                                                    <p style="color: #f1b0b7;">Complain registered? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $complain_registered; ?></b></p>
                                                    <?php
                                                }
                                                if ($feedback!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Feedback : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $feedback." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/pay.png" class="user1">
                                                <center><h3 class="text-white">Payment Info</h3><br></center>
                                                <p style="color: #f1b0b7;">Status : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_request; ?></b></p>
                                                <p style="color: #f1b0b7;">Worker got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Website got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $website_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Admin Card : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $admin_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." / month"; ?></b></p>
                                                <p style="color: #f1b0b7;">Charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate; ?></b></p>
                                                <p style="color: #f1b0b7;">Transport : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$transportation_charge; ?></b></p>
                                                <p style="color: yellow;border-bottom: 2px solid deeppink">Web cost : <b style="color: yellow;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p>
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
        if ($category=='Photography')
        {
            @$id=$_REQUEST['id'];
            @$service=$_REQUEST['service'];
            @$booking_date=$_REQUEST['booking_date'];
            @$worker_username=$_REQUEST['worker_username'];
            @$customer_username=$_REQUEST['customer_username'];
            @$service_city=$_REQUEST['service_city'];
            @$service_area=$_REQUEST['service_area'];
            @$service_address=$_REQUEST['service_address'];
            @$service_pin=$_REQUEST['service_pin'];
            @$worker_city=$_REQUEST['worker_city'];
            @$worker_area=$_REQUEST['worker_area'];
            @$worker_address=$_REQUEST['worker_address'];
            @$worker_pin=$_REQUEST['worker_pin'];
            @$from_date=$_REQUEST['from_date'];
            @$time=$_REQUEST['time'];
            @$code=$_REQUEST['code'];
            @$code_verified=$_REQUEST['code_verified'];
            @$booking_request=$_REQUEST['booking_request'];
            @$worker_rate=$_REQUEST['worker_rate'];
            @$web_rate_percentage=$_REQUEST['web_rate_percentage'];
            @$transportation_charge=$_REQUEST['transportation_charge'];
            @$transport_included=$_REQUEST['transport_included'];
            @$worker_cost=$_REQUEST['worker_cost'];
            @$web_cost=$_REQUEST['web_cost'];
            @$total=$_REQUEST['total'];
            @$pay_method=$_REQUEST['pay_method'];
            @$user_card_no=$_REQUEST['user_card_no'];
            @$worker_card_no=$_REQUEST['worker_card_no'];
            @$admin_card_no=$_REQUEST['admin_card_no'];
            @$worker_pay_received=$_REQUEST['worker_pay_received'];
            @$website_pay_received=$_REQUEST['website_pay_received'];
            @$actual_work_start_time=$_REQUEST['actual_work_start_time'];
            @$service_finish_time=$_REQUEST['service_finish_time'];
            @$complain_registered=$_REQUEST['complain_registered'];
            @$feedback=$_REQUEST['feedback'];
            @$c_name=$_REQUEST['c_name'];
            @$c_phone=$_REQUEST['c_phone'];
            @$c_email=$_REQUEST['c_email'];
            @$w_name=$_REQUEST['w_name'];
            @$w_phone=$_REQUEST['w_phone'];
            @$w_email=$_REQUEST['w_email'];
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
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                <form action="pay_received.php" method="post">
                    <input type="hidden" name="city" value="<?php echo $service_city; ?>">
                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <div class="container">
                    <div style="text-align: center;margin-top: 60px;">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-auto">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/kk.png" class="user1">
                                                <center><h3 class="text-white">Home Service Details</h3><br></center>
                                                <p style="color: #f1b0b7;">Customer Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $c_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                <p style="color: #f1b0b7;">Date from : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from_date; ?></b></p>
                                                <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                <?php
                                                if ($booking_request=='Ongoing')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($booking_request=='Finished')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Work actually started at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $actual_work_start_time." "; ?></b></p>
                                                    <p style="color: #f1b0b7;">Work actually finished at : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_finish_time." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_address." , ".$service_area." , ".$service_city." , ".$service_pin; ?></b></p>
                                                <p style="color: #f1b0b7;">Booking date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_date; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $user_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/photo.png" class="user1">
                                                <center><h3 class="text-white">Photography Professional</h3><br></center>
                                                <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_address." , ".$worker_area ." , ".$worker_pin." , ".$worker_city; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                if ($code!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Code : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code; ?></b></p>
                                                    <p style="color: #f1b0b7;">Code verified : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $code_verified; ?></b></p>
                                                    <p style="color: #f1b0b7;">Complain registered? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $complain_registered; ?></b></p>
                                                    <?php
                                                }
                                                if ($feedback!=null)
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Feedback : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $feedback." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                            <div class="loginBox2">
                                                <img src="../img/pay.png" class="user1">
                                                <center><h3 class="text-white">Payment Info</h3><br></center>
                                                <p style="color: #f1b0b7;">Status : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_request; ?></b></p>
                                                <p style="color: #f1b0b7;">Worker got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $worker_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Website got paid? : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $website_pay_received; ?></b></p>
                                                <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                                <?php
                                                if ($pay_method=='Card Payment')
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Admin Card : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $admin_card_no." "; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." / service"; ?></b></p>
                                                <p style="color: #f1b0b7;">Charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate; ?></b></p>
                                                <p style="color: #f1b0b7;">Transport : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$transportation_charge; ?></b></p>
                                                <p style="color: yellow;border-bottom: 2px solid deeppink">Web cost : <b style="color: yellow;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p>

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
    }
    else
    {
        header("Location:bookings.php");
    }
}
?>