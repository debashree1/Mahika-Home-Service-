<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:index.php");
}
else {
    @$username=$_SESSION['username'];
    @$city=$_REQUEST['city'];
    @$category=$_REQUEST['category'];
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    if ($city!=null)
    {
        if ($category=='Beauty')
        {
            @$q="SELECT * FROM beauty_bookings where service_city='$city' and website_pay_received='Yes'";
            @$res = mysqli_query($a, $q);
            if ($res)
            {
                $rowcount=mysqli_num_rows($res);
                if ($rowcount!=0)
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

                    <section class="features tb bb" id="features" >
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Paid beauty service in <?php echo $city; ?> are..</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Worker Name</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer Name</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">City</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Work Status</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Website Payment</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Paid?</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($res))
                            {
                                $dbid = $row['id'];
                                $dbservice = $row['service'];
                                $dbbooking_date = $row['booking_date'];
                                $dbbooking_request = $row['booking_request'];
                                $dbservice_city = $row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address= $row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbworker_username = $row['worker_username'];
                                $dbcustomer_username = $row['customer_username'];
                                $dbfrom_date = $row['from_date'];
                                $dbtime = $row['time'];
                                $dbcode = $row['code'];
                                $dbcode_verified = $row['code_verified'];
                                $dbworker_rate = $row['worker_rate'];
                                $dbweb_rate_percentage = $row['web_rate_percentage'];
                                $dbtransportation_charge = $row['transportation_charge'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost = $row['worker_cost'];
                                $dbweb_cost = $row['web_cost'];
                                $dbtotal = $row['total'];
                                $dbpay_method= $row['pay_method'];
                                $dbworker_card_no= $row['worker_card_no'];
                                $dbadmin_card_no= $row['admin_card_no'];
                                $dbuser_card_no= $row['user_card_no'];
                                $dbworker_pay_received= $row['worker_pay_received'];
                                $dbwebsite_pay_received= $row['website_pay_received'];
                                $dbactual_work_start_time= $row['actual_work_start_time'];
                                $dbservice_finish_time= $row['service_finish_time'];
                                $dbcomplain_registered= $row['complain_registered'];
                                $dbfeedback= $row['feedback'];
                                $q1="select * from user_details where username='$dbcustomer_username'";
                                $res1 = mysqli_query($a, $q1);
                                if ($res1)
                                {
                                    while ($row=mysqli_fetch_array($res1))
                                    {
                                        $dbc_name = $row['name'];
                                        $dbc_phone = $row['phone'];
                                        $dbc_email = $row['email'];
                                    }
                                }
                                $q2="select * from worker_details where username='$dbworker_username'";
                                $res2 = mysqli_query($a, $q2);
                                if ($res2)
                                {
                                    while ($row=mysqli_fetch_array($res2))
                                    {
                                        $dbw_name = $row['name'];
                                        $dbw_phone = $row['phone'];
                                        $dbw_email = $row['email'];
                                        $dbworker_city = $row['city'];
                                        $dbworker_area = $row['subarea'];
                                        $dbworker_address = $row['address'];
                                        $dbworker_pin = $row['pin'];
                                    }
                                }
                                ?>
                                <tr class="row" style="background-color: lavender;color: #117a8b">
                                    <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbw_name; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbc_name; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbservice_city; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbbooking_request; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbweb_cost; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbwebsite_pay_received; ?></td>
                                    <form action="pay_received_details.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                        <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="booking_date" value="<?php echo $dbbooking_date; ?>">
                                        <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                        <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                        <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                        <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                        <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                        <input type="hidden" name="worker_username" value="<?php echo $dbworker_username; ?>">
                                        <input type="hidden" name="customer_username" value="<?php echo $dbcustomer_username; ?>">
                                        <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                        <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                        <input type="hidden" name="code" value="<?php echo $dbcode; ?>">
                                        <input type="hidden" name="code_verified" value="<?php echo $dbcode_verified; ?>">
                                        <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                        <input type="hidden" name="web_rate_percentage" value="<?php echo $dbweb_rate_percentage; ?>">
                                        <input type="hidden" name="transportation_charge" value="<?php echo $dbtransportation_charge; ?>">
                                        <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                        <input type="hidden" name="worker_cost" value="<?php echo $dbworker_cost; ?>">
                                        <input type="hidden" name="web_cost" value="<?php echo $dbweb_cost; ?>">
                                        <input type="hidden" name="total" value="<?php echo $dbtotal; ?>">
                                        <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                        <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                        <input type="hidden" name="admin_card_no" value="<?php echo $dbadmin_card_no; ?>">
                                        <input type="hidden" name="user_card_no" value="<?php echo $dbuser_card_no; ?>">
                                        <input type="hidden" name="worker_pay_received" value="<?php echo $dbworker_pay_received; ?>">
                                        <input type="hidden" name="website_pay_received" value="<?php echo $dbwebsite_pay_received; ?>">
                                        <input type="hidden" name="actual_work_start_time" value="<?php echo $dbactual_work_start_time; ?>">
                                        <input type="hidden" name="service_finish_time" value="<?php echo $dbservice_finish_time; ?>">
                                        <input type="hidden" name="complain_registered" value="<?php echo $dbcomplain_registered; ?>">
                                        <input type="hidden" name="feedback" value="<?php echo $dbfeedback; ?>">
                                        <input type="hidden" name="c_name" value="<?php echo $dbc_name; ?>">
                                        <input type="hidden" name="c_email" value="<?php echo $dbc_email; ?>">
                                        <input type="hidden" name="c_phone" value="<?php echo $dbc_phone; ?>">
                                        <input type="hidden" name="w_name" value="<?php echo $dbw_name; ?>">
                                        <input type="hidden" name="w_email" value="<?php echo $dbw_email; ?>">
                                        <input type="hidden" name="w_phone" value="<?php echo $dbw_phone; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="worker_city" value="<?php echo $dbworker_city; ?>">
                                        <input type="hidden" name="worker_area" value="<?php echo $dbworker_area; ?>">
                                        <input type="hidden" name="worker_address" value="<?php echo $dbworker_address; ?>">
                                        <input type="hidden" name="worker_pin" value="<?php echo $dbworker_pin; ?>">
                                        <td class="col-sm-1"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                    </form>
                                </tr>
                                <?php
                                $i=$i+1;
                            }

                            ?>
                            </tbody>
                        </table><br><br>

                        <br><br><br>
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
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">No paid beauty service found in <?php echo $city; ?></h2>
                                <br><br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                                <br><br><br>
                            </center>
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
        }
        if ($category=='Repair')
        {
            @$q="SELECT * FROM repair_bookings where service_city='$city' and website_pay_received='Yes'";
            @$res = mysqli_query($a, $q);
            if ($res)
            {
                $rowcount=mysqli_num_rows($res);
                if ($rowcount!=0)
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

                    <section class="features tb bb" id="features" >
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Paid repair service in <?php echo $city; ?> are..</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Worker Name</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer Name</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">City</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Work Status</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Website Payment</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Paid?</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($res))
                            {
                                $dbid = $row['id'];
                                $dbservice = $row['service'];
                                $dbbooking_date = $row['booking_date'];
                                $dbbooking_request = $row['booking_request'];
                                $dbservice_city = $row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address= $row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbworker_username = $row['worker_username'];
                                $dbcustomer_username = $row['customer_username'];
                                $dbfrom_date = $row['from_date'];
                                $dbtime = $row['time'];
                                $dbcode = $row['code'];
                                $dbcode_verified = $row['code_verified'];
                                $dbworker_rate = $row['worker_rate'];
                                $dbweb_rate_percentage = $row['web_rate_percentage'];
                                $dbtransportation_charge = $row['transportation_charge'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost = $row['worker_cost'];
                                $dbweb_cost = $row['web_cost'];
                                $dbtotal = $row['total'];
                                $dbpay_method= $row['pay_method'];
                                $dbworker_card_no= $row['worker_card_no'];
                                $dbadmin_card_no= $row['admin_card_no'];
                                $dbuser_card_no= $row['user_card_no'];
                                $dbworker_pay_received= $row['worker_pay_received'];
                                $dbwebsite_pay_received= $row['website_pay_received'];
                                $dbactual_work_start_time= $row['actual_work_start_time'];
                                $dbservice_finish_time= $row['service_finish_time'];
                                $dbcomplain_registered= $row['complain_registered'];
                                $dbfeedback= $row['feedback'];
                                $q1="select * from user_details where username='$dbcustomer_username'";
                                $res1 = mysqli_query($a, $q1);
                                if ($res1)
                                {
                                    while ($row=mysqli_fetch_array($res1))
                                    {
                                        $dbc_name = $row['name'];
                                        $dbc_phone = $row['phone'];
                                        $dbc_email = $row['email'];
                                    }
                                }
                                $q2="select * from worker_details where username='$dbworker_username'";
                                $res2 = mysqli_query($a, $q2);
                                if ($res2)
                                {
                                    while ($row=mysqli_fetch_array($res2))
                                    {
                                        $dbw_name = $row['name'];
                                        $dbw_phone = $row['phone'];
                                        $dbw_email = $row['email'];
                                        $dbworker_city = $row['city'];
                                        $dbworker_area = $row['subarea'];
                                        $dbworker_address = $row['address'];
                                        $dbworker_pin = $row['pin'];
                                    }
                                }
                                ?>
                                <tr class="row" style="background-color: lavender;color: #117a8b">
                                    <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbw_name; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbc_name; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbservice_city; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbbooking_request; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbweb_cost; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbwebsite_pay_received; ?></td>
                                    <form action="pay_received_details.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                        <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="booking_date" value="<?php echo $dbbooking_date; ?>">
                                        <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                        <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                        <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                        <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                        <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                        <input type="hidden" name="worker_username" value="<?php echo $dbworker_username; ?>">
                                        <input type="hidden" name="customer_username" value="<?php echo $dbcustomer_username; ?>">
                                        <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                        <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                        <input type="hidden" name="code" value="<?php echo $dbcode; ?>">
                                        <input type="hidden" name="code_verified" value="<?php echo $dbcode_verified; ?>">
                                        <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                        <input type="hidden" name="web_rate_percentage" value="<?php echo $dbweb_rate_percentage; ?>">
                                        <input type="hidden" name="transportation_charge" value="<?php echo $dbtransportation_charge; ?>">
                                        <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                        <input type="hidden" name="worker_cost" value="<?php echo $dbworker_cost; ?>">
                                        <input type="hidden" name="web_cost" value="<?php echo $dbweb_cost; ?>">
                                        <input type="hidden" name="total" value="<?php echo $dbtotal; ?>">
                                        <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                        <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                        <input type="hidden" name="admin_card_no" value="<?php echo $dbadmin_card_no; ?>">
                                        <input type="hidden" name="user_card_no" value="<?php echo $dbuser_card_no; ?>">
                                        <input type="hidden" name="worker_pay_received" value="<?php echo $dbworker_pay_received; ?>">
                                        <input type="hidden" name="website_pay_received" value="<?php echo $dbwebsite_pay_received; ?>">
                                        <input type="hidden" name="actual_work_start_time" value="<?php echo $dbactual_work_start_time; ?>">
                                        <input type="hidden" name="service_finish_time" value="<?php echo $dbservice_finish_time; ?>">
                                        <input type="hidden" name="complain_registered" value="<?php echo $dbcomplain_registered; ?>">
                                        <input type="hidden" name="feedback" value="<?php echo $dbfeedback; ?>">
                                        <input type="hidden" name="c_name" value="<?php echo $dbc_name; ?>">
                                        <input type="hidden" name="c_email" value="<?php echo $dbc_email; ?>">
                                        <input type="hidden" name="c_phone" value="<?php echo $dbc_phone; ?>">
                                        <input type="hidden" name="w_name" value="<?php echo $dbw_name; ?>">
                                        <input type="hidden" name="w_email" value="<?php echo $dbw_email; ?>">
                                        <input type="hidden" name="w_phone" value="<?php echo $dbw_phone; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="worker_city" value="<?php echo $dbworker_city; ?>">
                                        <input type="hidden" name="worker_area" value="<?php echo $dbworker_area; ?>">
                                        <input type="hidden" name="worker_address" value="<?php echo $dbworker_address; ?>">
                                        <input type="hidden" name="worker_pin" value="<?php echo $dbworker_pin; ?>">
                                        <td class="col-sm-1"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                    </form>
                                </tr>
                                <?php
                                $i=$i+1;
                            }

                            ?>
                            </tbody>
                        </table><br><br>

                        <br><br><br>
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
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">No paid repair service found in <?php echo $city; ?></h2>
                                <br><br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                                <br><br><br>
                            </center>
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
        }
        if ($category=='Renovation')
        {
            @$q="SELECT * FROM renovation_bookings where service_city='$city' and website_pay_received='Yes'";
            @$res = mysqli_query($a, $q);
            if ($res)
            {
                $rowcount=mysqli_num_rows($res);
                if ($rowcount!=0)
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

                    <section class="features tb bb" id="features" >
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Paid renovation service in <?php echo $city; ?> are..</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Worker Name</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer Name</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">City</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Work Status</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Website Payment</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Paid?</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($res))
                            {
                                $dbid = $row['id'];
                                $dbservice = $row['service'];
                                $dbbooking_date = $row['booking_date'];
                                $dbbooking_request = $row['booking_request'];
                                $dbservice_city = $row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address= $row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbworker_username = $row['worker_username'];
                                $dbcustomer_username = $row['customer_username'];
                                $dbfrom_date = $row['from_date'];
                                $dbtime = $row['time'];
                                $dbhouse_size = $row['house_size'];
                                $dbcode = $row['code'];
                                $dbcode_verified = $row['code_verified'];
                                $dbworker_rate = $row['worker_rate'];
                                $dbweb_rate_percentage = $row['web_rate_percentage'];
                                $dbworker_cost = $row['worker_cost'];
                                $dbweb_cost = $row['web_cost'];
                                $dbtotal = $row['total'];
                                $dbpay_method= $row['pay_method'];
                                $dbworker_card_no= $row['worker_card_no'];
                                $dbadmin_card_no= $row['admin_card_no'];
                                $dbuser_card_no= $row['user_card_no'];
                                $dbworker_pay_received= $row['worker_pay_received'];
                                $dbwebsite_pay_received= $row['website_pay_received'];
                                $dbactual_work_start_time= $row['actual_work_start_time'];
                                $dbservice_finish_time= $row['service_finish_time'];
                                $dbcomplain_registered= $row['complain_registered'];
                                $dbfeedback= $row['feedback'];
                                $q1="select * from user_details where username='$dbcustomer_username'";
                                $res1 = mysqli_query($a, $q1);
                                if ($res1)
                                {
                                    while ($row=mysqli_fetch_array($res1))
                                    {
                                        $dbc_name = $row['name'];
                                        $dbc_phone = $row['phone'];
                                        $dbc_email = $row['email'];
                                    }
                                }
                                $q2="select * from worker_details where username='$dbworker_username'";
                                $res2 = mysqli_query($a, $q2);
                                if ($res2)
                                {
                                    while ($row=mysqli_fetch_array($res2))
                                    {
                                        $dbw_name = $row['name'];
                                        $dbw_phone = $row['phone'];
                                        $dbw_email = $row['email'];
                                        $dbworker_city = $row['city'];
                                        $dbworker_area = $row['subarea'];
                                        $dbworker_address = $row['address'];
                                        $dbworker_pin = $row['pin'];
                                    }
                                }
                                ?>
                                <tr class="row" style="background-color: lavender;color: #117a8b">
                                    <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbw_name; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbc_name; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbservice_city; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbbooking_request; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbweb_cost; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbwebsite_pay_received; ?></td>
                                    <form action="pay_received_details.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                        <input type="hidden" name="house_size" value="<?php echo $dbhouse_size; ?>">
                                        <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="booking_date" value="<?php echo $dbbooking_date; ?>">
                                        <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                        <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                        <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                        <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                        <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                        <input type="hidden" name="worker_username" value="<?php echo $dbworker_username; ?>">
                                        <input type="hidden" name="customer_username" value="<?php echo $dbcustomer_username; ?>">
                                        <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                        <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                        <input type="hidden" name="code" value="<?php echo $dbcode; ?>">
                                        <input type="hidden" name="code_verified" value="<?php echo $dbcode_verified; ?>">
                                        <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                        <input type="hidden" name="web_rate_percentage" value="<?php echo $dbweb_rate_percentage; ?>">
                                        <input type="hidden" name="worker_cost" value="<?php echo $dbworker_cost; ?>">
                                        <input type="hidden" name="web_cost" value="<?php echo $dbweb_cost; ?>">
                                        <input type="hidden" name="total" value="<?php echo $dbtotal; ?>">
                                        <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                        <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                        <input type="hidden" name="admin_card_no" value="<?php echo $dbadmin_card_no; ?>">
                                        <input type="hidden" name="user_card_no" value="<?php echo $dbuser_card_no; ?>">
                                        <input type="hidden" name="worker_pay_received" value="<?php echo $dbworker_pay_received; ?>">
                                        <input type="hidden" name="website_pay_received" value="<?php echo $dbwebsite_pay_received; ?>">
                                        <input type="hidden" name="actual_work_start_time" value="<?php echo $dbactual_work_start_time; ?>">
                                        <input type="hidden" name="service_finish_time" value="<?php echo $dbservice_finish_time; ?>">
                                        <input type="hidden" name="complain_registered" value="<?php echo $dbcomplain_registered; ?>">
                                        <input type="hidden" name="feedback" value="<?php echo $dbfeedback; ?>">
                                        <input type="hidden" name="c_name" value="<?php echo $dbc_name; ?>">
                                        <input type="hidden" name="c_email" value="<?php echo $dbc_email; ?>">
                                        <input type="hidden" name="c_phone" value="<?php echo $dbc_phone; ?>">
                                        <input type="hidden" name="w_name" value="<?php echo $dbw_name; ?>">
                                        <input type="hidden" name="w_email" value="<?php echo $dbw_email; ?>">
                                        <input type="hidden" name="w_phone" value="<?php echo $dbw_phone; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="worker_city" value="<?php echo $dbworker_city; ?>">
                                        <input type="hidden" name="worker_area" value="<?php echo $dbworker_area; ?>">
                                        <input type="hidden" name="worker_address" value="<?php echo $dbworker_address; ?>">
                                        <input type="hidden" name="worker_pin" value="<?php echo $dbworker_pin; ?>">
                                        <td class="col-sm-1"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                    </form>
                                </tr>
                                <?php
                                $i=$i+1;
                            }

                            ?>
                            </tbody>
                        </table><br><br>

                        <br><br><br>
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
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">No Paid renovation service found in <?php echo $city; ?></h2>
                                <br><br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                                <br><br><br>
                            </center>
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
        }
        if ($category=='Maid')
        {
            @$q="SELECT * FROM maid_bookings where service_city='$city' and website_pay_received='Yes'";
            @$res = mysqli_query($a, $q);
            if ($res)
            {
                $rowcount=mysqli_num_rows($res);
                if ($rowcount!=0)
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

                    <section class="features tb bb" id="features" >
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Paid maid service in <?php echo $city; ?> are..</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Worker Name</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer Name</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">City</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Work Status</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Website Payment</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Paid?</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($res))
                            {
                                $dbid = $row['id'];
                                $dbservice = $row['service'];
                                $dbbooking_date = $row['booking_date'];
                                $dbbooking_request = $row['booking_request'];
                                $dbservice_city = $row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address= $row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbworker_username = $row['worker_username'];
                                $dbcustomer_username = $row['customer_username'];
                                $dbfrom_date = $row['from_date'];
                                $dbtime = $row['time'];
                                $dbcode = $row['code'];
                                $dbcode_verified = $row['code_verified'];
                                $dbworker_rate = $row['worker_rate'];
                                $dbweb_rate_percentage = $row['web_rate_percentage'];
                                $dbtransportation_charge = $row['transportation_charge_day'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost = $row['worker_cost'];
                                $dbweb_cost = $row['web_cost'];
                                $dbtotal = $row['total'];
                                $dbduration = $row['duration'];
                                $dbpay_method= $row['pay_method'];
                                $dbworker_card_no= $row['worker_card_no'];
                                $dbadmin_card_no= $row['admin_card_no'];
                                $dbuser_card_no= $row['user_card_no'];
                                $dbworker_pay_received= $row['worker_pay_received'];
                                $dbwebsite_pay_received= $row['website_pay_received'];
                                $dbactual_work_start_time= $row['actual_work_start_time'];
                                $dbservice_finish_time= $row['service_finish_time'];
                                $dbcomplain_registered= $row['complain_registered'];
                                $dbfeedback= $row['feedback'];
                                $q1="select * from user_details where username='$dbcustomer_username'";
                                $res1 = mysqli_query($a, $q1);
                                if ($res1)
                                {
                                    while ($row=mysqli_fetch_array($res1))
                                    {
                                        $dbc_name = $row['name'];
                                        $dbc_phone = $row['phone'];
                                        $dbc_email = $row['email'];
                                    }
                                }
                                $q2="select * from worker_details where username='$dbworker_username'";
                                $res2 = mysqli_query($a, $q2);
                                if ($res2)
                                {
                                    while ($row=mysqli_fetch_array($res2))
                                    {
                                        $dbw_name = $row['name'];
                                        $dbw_phone = $row['phone'];
                                        $dbw_email = $row['email'];
                                        $dbworker_city = $row['city'];
                                        $dbworker_area = $row['subarea'];
                                        $dbworker_address = $row['address'];
                                        $dbworker_pin = $row['pin'];
                                    }
                                }
                                ?>
                                <tr class="row" style="background-color: lavender;color: #117a8b">
                                    <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbw_name; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbc_name; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbservice_city; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbbooking_request; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbweb_cost; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbwebsite_pay_received; ?></td>
                                    <form action="pay_received_details.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                        <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="booking_date" value="<?php echo $dbbooking_date; ?>">
                                        <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                        <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                        <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                        <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                        <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                        <input type="hidden" name="worker_username" value="<?php echo $dbworker_username; ?>">
                                        <input type="hidden" name="customer_username" value="<?php echo $dbcustomer_username; ?>">
                                        <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                        <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                        <input type="hidden" name="code" value="<?php echo $dbcode; ?>">
                                        <input type="hidden" name="code_verified" value="<?php echo $dbcode_verified; ?>">
                                        <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                        <input type="hidden" name="web_rate_percentage" value="<?php echo $dbweb_rate_percentage; ?>">
                                        <input type="hidden" name="transportation_charge" value="<?php echo $dbtransportation_charge; ?>">
                                        <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                        <input type="hidden" name="worker_cost" value="<?php echo $dbworker_cost; ?>">
                                        <input type="hidden" name="web_cost" value="<?php echo $dbweb_cost; ?>">
                                        <input type="hidden" name="total" value="<?php echo $dbtotal; ?>">
                                        <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                        <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                        <input type="hidden" name="admin_card_no" value="<?php echo $dbadmin_card_no; ?>">
                                        <input type="hidden" name="user_card_no" value="<?php echo $dbuser_card_no; ?>">
                                        <input type="hidden" name="worker_pay_received" value="<?php echo $dbworker_pay_received; ?>">
                                        <input type="hidden" name="website_pay_received" value="<?php echo $dbwebsite_pay_received; ?>">
                                        <input type="hidden" name="actual_work_start_time" value="<?php echo $dbactual_work_start_time; ?>">
                                        <input type="hidden" name="service_finish_time" value="<?php echo $dbservice_finish_time; ?>">
                                        <input type="hidden" name="complain_registered" value="<?php echo $dbcomplain_registered; ?>">
                                        <input type="hidden" name="feedback" value="<?php echo $dbfeedback; ?>">
                                        <input type="hidden" name="duration" value="<?php echo $dbduration; ?>">
                                        <input type="hidden" name="c_name" value="<?php echo $dbc_name; ?>">
                                        <input type="hidden" name="c_email" value="<?php echo $dbc_email; ?>">
                                        <input type="hidden" name="c_phone" value="<?php echo $dbc_phone; ?>">
                                        <input type="hidden" name="w_name" value="<?php echo $dbw_name; ?>">
                                        <input type="hidden" name="w_email" value="<?php echo $dbw_email; ?>">
                                        <input type="hidden" name="w_phone" value="<?php echo $dbw_phone; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="worker_city" value="<?php echo $dbworker_city; ?>">
                                        <input type="hidden" name="worker_area" value="<?php echo $dbworker_area; ?>">
                                        <input type="hidden" name="worker_address" value="<?php echo $dbworker_address; ?>">
                                        <input type="hidden" name="worker_pin" value="<?php echo $dbworker_pin; ?>">
                                        <td class="col-sm-1"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                    </form>
                                </tr>
                                <?php
                                $i=$i+1;
                            }

                            ?>
                            </tbody>
                        </table><br><br>

                        <br><br><br>
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
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">No paid maid service found in <?php echo $city; ?></h2>
                                <br><br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                                <br><br><br>
                            </center>
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
        }
        if ($category=='Packers & Movers')
        {
            @$q="SELECT * FROM movers_bookings where origin='$city' and website_pay_received='Yes'";
            @$res = mysqli_query($a, $q);
            if ($res)
            {
                $rowcount=mysqli_num_rows($res);
                if ($rowcount!=0)
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

                    <section class="features tb bb" id="features" >
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Paid packers & movers service in <?php echo $city; ?> are..</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Worker Name</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer Name</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">City</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Work Status</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Website Payment</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Paid?</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($res))
                            {
                                $dbid = $row['id'];
                                $dbservice = $row['service'];
                                $dbbooking_date = $row['booking_date'];
                                $dbbooking_request = $row['booking_request'];
                                $dborigin = $row['origin'];
                                $dbdestination = $row['destination'];
                                $dbworker_username = $row['worker_username'];
                                $dbcustomer_username = $row['customer_username'];
                                $dbfrom_date = $row['from_date'];
                                $dbtime = $row['time'];
                                $dbcode = $row['code'];
                                $dbcode_verified = $row['code_verified'];
                                $dbworker_rate = $row['worker_rate'];
                                $dbweb_rate_percentage = $row['web_rate_percentage'];
                                $dbworker_cost = $row['worker_cost'];
                                $dbweb_cost = $row['web_cost'];
                                $dbtotal = $row['total'];
                                $dbpay_method= $row['pay_method'];
                                $dbworker_card_no= $row['worker_card_no'];
                                $dbadmin_card_no= $row['admin_card_no'];
                                $dbuser_card_no= $row['user_card_no'];
                                $dbworker_pay_received= $row['worker_pay_received'];
                                $dbwebsite_pay_received= $row['website_pay_received'];
                                $dbactual_work_start_time= $row['actual_work_start_time'];
                                $dbservice_finish_time= $row['service_finish_time'];
                                $dbcomplain_registered= $row['complain_registered'];
                                $dbfeedback= $row['feedback'];
                                $q1="select * from user_details where username='$dbcustomer_username'";
                                $res1 = mysqli_query($a, $q1);
                                if ($res1)
                                {
                                    while ($row=mysqli_fetch_array($res1))
                                    {
                                        $dbc_name = $row['name'];
                                        $dbc_phone = $row['phone'];
                                        $dbc_email = $row['email'];
                                    }
                                }
                                $q2="select * from worker_details where username='$dbworker_username'";
                                $res2 = mysqli_query($a, $q2);
                                if ($res2)
                                {
                                    while ($row=mysqli_fetch_array($res2))
                                    {
                                        $dbw_name = $row['name'];
                                        $dbw_phone = $row['phone'];
                                        $dbw_email = $row['email'];
                                        $dbworker_city = $row['city'];
                                        $dbworker_area = $row['subarea'];
                                        $dbworker_address = $row['address'];
                                        $dbworker_pin = $row['pin'];
                                    }
                                }
                                ?>
                                <tr class="row" style="background-color: lavender;color: #117a8b">
                                    <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbw_name; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbc_name; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dborigin; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbbooking_request; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbweb_cost; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbwebsite_pay_received; ?></td>
                                    <form action="pay_received_details.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                        <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="booking_date" value="<?php echo $dbbooking_date; ?>">
                                        <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                        <input type="hidden" name="origin" value="<?php echo $dborigin; ?>">
                                        <input type="hidden" name="destination" value="<?php echo $dbdestination; ?>">
                                        <input type="hidden" name="worker_username" value="<?php echo $dbworker_username; ?>">
                                        <input type="hidden" name="customer_username" value="<?php echo $dbcustomer_username; ?>">
                                        <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                        <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                        <input type="hidden" name="code" value="<?php echo $dbcode; ?>">
                                        <input type="hidden" name="code_verified" value="<?php echo $dbcode_verified; ?>">
                                        <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                        <input type="hidden" name="web_rate_percentage" value="<?php echo $dbweb_rate_percentage; ?>">
                                        <input type="hidden" name="worker_cost" value="<?php echo $dbworker_cost; ?>">
                                        <input type="hidden" name="web_cost" value="<?php echo $dbweb_cost; ?>">
                                        <input type="hidden" name="total" value="<?php echo $dbtotal; ?>">
                                        <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                        <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                        <input type="hidden" name="admin_card_no" value="<?php echo $dbadmin_card_no; ?>">
                                        <input type="hidden" name="user_card_no" value="<?php echo $dbuser_card_no; ?>">
                                        <input type="hidden" name="worker_pay_received" value="<?php echo $dbworker_pay_received; ?>">
                                        <input type="hidden" name="website_pay_received" value="<?php echo $dbwebsite_pay_received; ?>">
                                        <input type="hidden" name="actual_work_start_time" value="<?php echo $dbactual_work_start_time; ?>">
                                        <input type="hidden" name="service_finish_time" value="<?php echo $dbservice_finish_time; ?>">
                                        <input type="hidden" name="complain_registered" value="<?php echo $dbcomplain_registered; ?>">
                                        <input type="hidden" name="feedback" value="<?php echo $dbfeedback; ?>">
                                        <input type="hidden" name="c_name" value="<?php echo $dbc_name; ?>">
                                        <input type="hidden" name="c_email" value="<?php echo $dbc_email; ?>">
                                        <input type="hidden" name="c_phone" value="<?php echo $dbc_phone; ?>">
                                        <input type="hidden" name="w_name" value="<?php echo $dbw_name; ?>">
                                        <input type="hidden" name="w_email" value="<?php echo $dbw_email; ?>">
                                        <input type="hidden" name="w_phone" value="<?php echo $dbw_phone; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="worker_city" value="<?php echo $dbworker_city; ?>">
                                        <input type="hidden" name="worker_area" value="<?php echo $dbworker_area; ?>">
                                        <input type="hidden" name="worker_address" value="<?php echo $dbworker_address; ?>">
                                        <input type="hidden" name="worker_pin" value="<?php echo $dbworker_pin; ?>">
                                        <td class="col-sm-1"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                    </form>
                                </tr>
                                <?php
                                $i=$i+1;
                            }

                            ?>
                            </tbody>
                        </table><br><br>

                        <br><br><br>
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
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">No paid packers & movers service found in <?php echo $city; ?></h2>
                                <br><br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                                <br><br><br>
                            </center>
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
        }
        if ($category=='Tuition')
        {
            @$q="SELECT * FROM tuition_bookings where service_city='$city' and website_pay_received='Yes'";
            @$res = mysqli_query($a, $q);
            if ($res)
            {
                $rowcount=mysqli_num_rows($res);
                if ($rowcount!=0)
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

                    <section class="features tb bb" id="features" >
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Paid tuition service in <?php echo $city; ?> are..</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Worker Name</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer Name</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">City</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Work Status</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Website Payment</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Paid?</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($res))
                            {
                                $dbid = $row['id'];
                                $dbservice = $row['service'];
                                $dbbooking_date = $row['booking_date'];
                                $dbbooking_request = $row['booking_request'];
                                $dbservice_city = $row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address= $row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbworker_username = $row['worker_username'];
                                $dbcustomer_username = $row['customer_username'];
                                $dbfrom_date = $row['from_date'];
                                $dbtime = $row['time'];
                                $dbduration = $row['duration'];
                                $dblevel = $row['level'];
                                $dbcode = $row['code'];
                                $dbcode_verified = $row['code_verified'];
                                $dbworker_rate = $row['worker_rate'];
                                $dbweb_rate_percentage = $row['web_rate_percentage'];
                                $dbtransportation_charge = $row['transportation_charge_month'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost = $row['worker_cost'];
                                $dbweb_cost = $row['web_cost'];
                                $dbtotal = $row['total'];
                                $dbpay_method= $row['pay_method'];
                                $dbworker_card_no= $row['worker_card_no'];
                                $dbadmin_card_no= $row['admin_card_no'];
                                $dbuser_card_no= $row['user_card_no'];
                                $dbworker_pay_received= $row['worker_pay_received'];
                                $dbwebsite_pay_received= $row['website_pay_received'];
                                $dbactual_work_start_time= $row['actual_work_start_time'];
                                $dbservice_finish_time= $row['service_finish_time'];
                                $dbcomplain_registered= $row['complain_registered'];
                                $dbfeedback= $row['feedback'];
                                $q1="select * from user_details where username='$dbcustomer_username'";
                                $res1 = mysqli_query($a, $q1);
                                if ($res1)
                                {
                                    while ($row=mysqli_fetch_array($res1))
                                    {
                                        $dbc_name = $row['name'];
                                        $dbc_phone = $row['phone'];
                                        $dbc_email = $row['email'];
                                    }
                                }
                                $q2="select * from worker_details where username='$dbworker_username'";
                                $res2 = mysqli_query($a, $q2);
                                if ($res2)
                                {
                                    while ($row=mysqli_fetch_array($res2))
                                    {
                                        $dbw_name = $row['name'];
                                        $dbw_phone = $row['phone'];
                                        $dbw_email = $row['email'];
                                        $dbworker_city = $row['city'];
                                        $dbworker_area = $row['subarea'];
                                        $dbworker_address = $row['address'];
                                        $dbworker_pin = $row['pin'];
                                    }
                                }
                                ?>
                                <tr class="row" style="background-color: lavender;color: #117a8b">
                                    <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbw_name; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbc_name; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbservice_city; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbbooking_request; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbweb_cost; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbwebsite_pay_received; ?></td>
                                    <form action="pay_received_details.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                        <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="booking_date" value="<?php echo $dbbooking_date; ?>">
                                        <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                        <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                        <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                        <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                        <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                        <input type="hidden" name="worker_username" value="<?php echo $dbworker_username; ?>">
                                        <input type="hidden" name="customer_username" value="<?php echo $dbcustomer_username; ?>">
                                        <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                        <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                        <input type="hidden" name="code" value="<?php echo $dbcode; ?>">
                                        <input type="hidden" name="code_verified" value="<?php echo $dbcode_verified; ?>">
                                        <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                        <input type="hidden" name="web_rate_percentage" value="<?php echo $dbweb_rate_percentage; ?>">
                                        <input type="hidden" name="transportation_charge" value="<?php echo $dbtransportation_charge; ?>">
                                        <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                        <input type="hidden" name="worker_cost" value="<?php echo $dbworker_cost; ?>">
                                        <input type="hidden" name="web_cost" value="<?php echo $dbweb_cost; ?>">
                                        <input type="hidden" name="total" value="<?php echo $dbtotal; ?>">
                                        <input type="hidden" name="duration" value="<?php echo $dbduration; ?>">
                                        <input type="hidden" name="level" value="<?php echo $dblevel; ?>">
                                        <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                        <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                        <input type="hidden" name="admin_card_no" value="<?php echo $dbadmin_card_no; ?>">
                                        <input type="hidden" name="user_card_no" value="<?php echo $dbuser_card_no; ?>">
                                        <input type="hidden" name="worker_pay_received" value="<?php echo $dbworker_pay_received; ?>">
                                        <input type="hidden" name="website_pay_received" value="<?php echo $dbwebsite_pay_received; ?>">
                                        <input type="hidden" name="actual_work_start_time" value="<?php echo $dbactual_work_start_time; ?>">
                                        <input type="hidden" name="service_finish_time" value="<?php echo $dbservice_finish_time; ?>">
                                        <input type="hidden" name="complain_registered" value="<?php echo $dbcomplain_registered; ?>">
                                        <input type="hidden" name="feedback" value="<?php echo $dbfeedback; ?>">
                                        <input type="hidden" name="c_name" value="<?php echo $dbc_name; ?>">
                                        <input type="hidden" name="c_email" value="<?php echo $dbc_email; ?>">
                                        <input type="hidden" name="c_phone" value="<?php echo $dbc_phone; ?>">
                                        <input type="hidden" name="w_name" value="<?php echo $dbw_name; ?>">
                                        <input type="hidden" name="w_email" value="<?php echo $dbw_email; ?>">
                                        <input type="hidden" name="w_phone" value="<?php echo $dbw_phone; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="worker_city" value="<?php echo $dbworker_city; ?>">
                                        <input type="hidden" name="worker_area" value="<?php echo $dbworker_area; ?>">
                                        <input type="hidden" name="worker_address" value="<?php echo $dbworker_address; ?>">
                                        <input type="hidden" name="worker_pin" value="<?php echo $dbworker_pin; ?>">
                                        <td class="col-sm-1"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                    </form>
                                </tr>
                                <?php
                                $i=$i+1;
                            }

                            ?>
                            </tbody>
                        </table><br><br>

                        <br><br><br>
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
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">No paid tuition service found in <?php echo $city; ?></h2>
                                <br><br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                                <br><br><br>
                            </center>
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
        }
        if ($category=='Photography')
        {
            @$q="SELECT * FROM photography_bookings where service_city='$city' and website_pay_received='Yes'";
            @$res = mysqli_query($a, $q);
            if ($res)
            {
                $rowcount=mysqli_num_rows($res);
                if ($rowcount!=0)
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

                    <section class="features tb bb" id="features" >
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Paid photography service in <?php echo $city; ?> are..</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Worker Name</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer Name</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">City</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Work Status</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Website Payment</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Paid?</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($res))
                            {
                                $dbid = $row['id'];
                                $dbservice = $row['service'];
                                $dbbooking_date = $row['booking_date'];
                                $dbbooking_request = $row['booking_request'];
                                $dbservice_city = $row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address= $row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbworker_username = $row['worker_username'];
                                $dbcustomer_username = $row['customer_username'];
                                $dbfrom_date = $row['from_date'];
                                $dbtime = $row['time'];
                                $dbcode = $row['code'];
                                $dbcode_verified = $row['code_verified'];
                                $dbworker_rate = $row['worker_rate'];
                                $dbweb_rate_percentage = $row['web_rate_percentage'];
                                $dbtransportation_charge = $row['transportation_charge'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost = $row['worker_cost'];
                                $dbweb_cost = $row['web_cost'];
                                $dbtotal = $row['total'];
                                $dbpay_method= $row['pay_method'];
                                $dbworker_card_no= $row['worker_card_no'];
                                $dbadmin_card_no= $row['admin_card_no'];
                                $dbuser_card_no= $row['user_card_no'];
                                $dbworker_pay_received= $row['worker_pay_received'];
                                $dbwebsite_pay_received= $row['website_pay_received'];
                                $dbactual_work_start_time= $row['actual_work_start_time'];
                                $dbservice_finish_time= $row['service_finish_time'];
                                $dbcomplain_registered= $row['complain_registered'];
                                $dbfeedback= $row['feedback'];
                                $q1="select * from user_details where username='$dbcustomer_username'";
                                $res1 = mysqli_query($a, $q1);
                                if ($res1)
                                {
                                    while ($row=mysqli_fetch_array($res1))
                                    {
                                        $dbc_name = $row['name'];
                                        $dbc_phone = $row['phone'];
                                        $dbc_email = $row['email'];
                                    }
                                }
                                $q2="select * from worker_details where username='$dbworker_username'";
                                $res2 = mysqli_query($a, $q2);
                                if ($res2)
                                {
                                    while ($row=mysqli_fetch_array($res2))
                                    {
                                        $dbw_name = $row['name'];
                                        $dbw_phone = $row['phone'];
                                        $dbw_email = $row['email'];
                                        $dbworker_city = $row['city'];
                                        $dbworker_area = $row['subarea'];
                                        $dbworker_address = $row['address'];
                                        $dbworker_pin = $row['pin'];
                                    }
                                }
                                ?>
                                <tr class="row" style="background-color: lavender;color: #117a8b">
                                    <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbw_name; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbc_name; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbservice_city; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbbooking_request; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbweb_cost; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbwebsite_pay_received; ?></td>
                                    <form action="pay_received_details.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                        <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="booking_date" value="<?php echo $dbbooking_date; ?>">
                                        <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                        <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                        <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                        <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                        <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                        <input type="hidden" name="worker_username" value="<?php echo $dbworker_username; ?>">
                                        <input type="hidden" name="customer_username" value="<?php echo $dbcustomer_username; ?>">
                                        <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                        <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                        <input type="hidden" name="code" value="<?php echo $dbcode; ?>">
                                        <input type="hidden" name="code_verified" value="<?php echo $dbcode_verified; ?>">
                                        <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                        <input type="hidden" name="web_rate_percentage" value="<?php echo $dbweb_rate_percentage; ?>">
                                        <input type="hidden" name="transportation_charge" value="<?php echo $dbtransportation_charge; ?>">
                                        <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                        <input type="hidden" name="worker_cost" value="<?php echo $dbworker_cost; ?>">
                                        <input type="hidden" name="web_cost" value="<?php echo $dbweb_cost; ?>">
                                        <input type="hidden" name="total" value="<?php echo $dbtotal; ?>">
                                        <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                        <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                        <input type="hidden" name="admin_card_no" value="<?php echo $dbadmin_card_no; ?>">
                                        <input type="hidden" name="user_card_no" value="<?php echo $dbuser_card_no; ?>">
                                        <input type="hidden" name="worker_pay_received" value="<?php echo $dbworker_pay_received; ?>">
                                        <input type="hidden" name="website_pay_received" value="<?php echo $dbwebsite_pay_received; ?>">
                                        <input type="hidden" name="actual_work_start_time" value="<?php echo $dbactual_work_start_time; ?>">
                                        <input type="hidden" name="service_finish_time" value="<?php echo $dbservice_finish_time; ?>">
                                        <input type="hidden" name="complain_registered" value="<?php echo $dbcomplain_registered; ?>">
                                        <input type="hidden" name="feedback" value="<?php echo $dbfeedback; ?>">
                                        <input type="hidden" name="c_name" value="<?php echo $dbc_name; ?>">
                                        <input type="hidden" name="c_email" value="<?php echo $dbc_email; ?>">
                                        <input type="hidden" name="c_phone" value="<?php echo $dbc_phone; ?>">
                                        <input type="hidden" name="w_name" value="<?php echo $dbw_name; ?>">
                                        <input type="hidden" name="w_email" value="<?php echo $dbw_email; ?>">
                                        <input type="hidden" name="w_phone" value="<?php echo $dbw_phone; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="worker_city" value="<?php echo $dbworker_city; ?>">
                                        <input type="hidden" name="worker_area" value="<?php echo $dbworker_area; ?>">
                                        <input type="hidden" name="worker_address" value="<?php echo $dbworker_address; ?>">
                                        <input type="hidden" name="worker_pin" value="<?php echo $dbworker_pin; ?>">
                                        <td class="col-sm-1"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                    </form>
                                </tr>
                                <?php
                                $i=$i+1;
                            }

                            ?>
                            </tbody>
                        </table><br><br>

                        <br><br><br>
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
                        <form action="bookings_next.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">No paid photography service found in <?php echo $city; ?></h2>
                                <br><br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                                <br><br><br>
                            </center>
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
        }
    }
    else
    {
        header("Location:bookings.php");
    }
}
?>




