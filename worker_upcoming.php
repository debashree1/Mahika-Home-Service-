<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
}
else
{
    $username=$_SESSION['username'];
    $today=date('Y-m-d');
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT category FROM worker_details where username='$username'";
    @$res = mysqli_query($a, $q);
    if($res)
    {
        while ($row=mysqli_fetch_array($res))
        {
            $dbcategory = $row['category'];
        }
        if ($dbcategory=='Maid')
        {
            $query="SELECT * FROM maid_bookings where worker_username='$username' and booking_request='Pending' and from_date >= '$today' order by from_date";
            $result=mysqli_query($a,$query);
            if ($result)
            {
                $rowcount=mysqli_num_rows($result);
                if ($rowcount!=0)
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                    <section class="features tb bb" id="features" >
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <br><br>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Your upcoming maid work are...</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-2" style="text-align: center">Service</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Address</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">From</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Time</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Payment</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($result))
                            {
                                $dbservice = $row['service'];
                                $dbid=$row['id'];
                                $dbbooking_request=$row['booking_request'];
                                $dbbooking_date=$row['booking_date'];
                                $dbu_username=$row['customer_username'];
                                $dbservice_city=$row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address=$row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbfrom_date=$row['from_date'];
                                $dbdays=$row['days'];
                                $dbtime=$row['time'];
                                $dbduration = $row['duration'];
                                $dbworker_rate=$row['worker_rate'];
                                $dbweb_rate_percentage=$row['web_rate_percentage'];
                                $dbtransportation_charge_day=$row['transportation_charge_day'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost=$row['worker_cost'];
                                $dbweb_cost=$row['web_cost'];
                                $dbtotal=$row['total'];
                                $dbpay_method = $row['pay_method'];
                                $dbworker_card_no=$row['worker_card_no'];
                                @$q1="SELECT * FROM user_details where username='$dbu_username'";
                                @$result1 = mysqli_query($a, $q1);
                                if($result1)

                                {

                                    while ($row=mysqli_fetch_array($result1))
                                    {
                                        $dbu_name=$row['name'];
                                        $dbsub=$row['area'];
                                        $dbaddress=$row['address'];
                                        $dbpin=$row['pin'];
                                        $dbcity=$row['city'];
                                        $dbphone=$row['phone'];
                                        $dbemail=$row['email'];
                                        ?>
                                        <tr class="row" style="background-color: lavender;color: #117a8b">
                                            <td class="col-sm-2" style="text-align: center" scope="row" ><?php echo $dbservice; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbu_name; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbaddress." , ".$dbsub; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbfrom_date; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbtime; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo "Rs. ".$dbtotal; ?></td>
                                            <form action="worker_upcoming_maid_cost.php" method="post">
                                                <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                                <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                                <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                                <input type="hidden" name="u_username" value="<?php echo $dbu_username; ?>">
                                                <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                                <input type="hidden" name="days" value="<?php echo $dbdays; ?>">
                                                <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                                <input type="hidden" name="duration" value="<?php echo $dbduration; ?>">
                                                <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                                <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                                <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                                <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                                <input type="hidden" name="u_name" value="<?php echo $dbu_name; ?>">
                                                <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                                <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                                <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                                <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                                <input type="hidden" name="address" value="<?php echo $dbaddress; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                                <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                                <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                                <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                                <input type="hidden" name="transportation_charge_day" value="<?php echo $dbtransportation_charge_day; ?>">
                                                <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                                <td class="col-sm-2"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                            </form>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    echo "error";
                                }
                                $i=$i+1;
                            }
                            ?>
                            </tbody>
                        </table><br><br>
                        <br><br>
                        <br><br><br>
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
                else
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">Dear Mahika Associate, you don't have any upcoming work.</h2>
                                <br>
                                <br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
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

                    </html>
                    <!-- end document-->
                    <?php
                }
            }
        }
        if ($dbcategory=="Repair")
        {
            $query="SELECT * FROM repair_bookings where worker_username='$username' and booking_request='Pending' and from_date >= '$today' order by from_date";
            $result=mysqli_query($a,$query);
            if ($result)
            {
                $rowcount=mysqli_num_rows($result);
                if ($rowcount!=0)
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                    <section class="features tb bb" id="features" >
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <br><br>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Your upcoming repair work are...</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-2" style="text-align: center">Service</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Address</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">From</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Time</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Payment</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($result))
                            {
                                $dbservice = $row['service'];
                                $dbid=$row['id'];
                                $dbbooking_request=$row['booking_request'];
                                $dbbooking_date=$row['booking_date'];
                                $dbu_username=$row['customer_username'];
                                $dbservice_city=$row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address=$row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbfrom_date=$row['from_date'];
                                $dbtime=$row['time'];
                                $dbworker_rate=$row['worker_rate'];
                                $dbweb_rate_percentage=$row['web_rate_percentage'];
                                $dbtransportation_charge_day=$row['transportation_charge'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost=$row['worker_cost'];
                                $dbweb_cost=$row['web_cost'];
                                $dbtotal=$row['total'];
                                $dbpay_method = $row['pay_method'];
                                $dbworker_card_no=$row['worker_card_no'];
                                @$q1="SELECT * FROM user_details where username='$dbu_username'";
                                @$result1 = mysqli_query($a, $q1);
                                if($result1)

                                {

                                    while ($row=mysqli_fetch_array($result1))
                                    {
                                        $dbu_name=$row['name'];
                                        $dbsub=$row['area'];
                                        $dbaddress=$row['address'];
                                        $dbpin=$row['pin'];
                                        $dbcity=$row['city'];
                                        $dbphone=$row['phone'];
                                        $dbemail=$row['email'];
                                        ?>
                                        <tr class="row" style="background-color: lavender;color: #117a8b">
                                            <td class="col-sm-2" style="text-align: center" scope="row" ><?php echo $dbservice; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbu_name; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbaddress." , ".$dbsub; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbfrom_date; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbtime; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo "Rs. ".$dbtotal; ?></td>
                                            <form action="worker_upcoming_repair_cost.php" method="post">
                                                <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                                <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                                <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                                <input type="hidden" name="u_username" value="<?php echo $dbu_username; ?>">
                                                <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                                <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                                <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                                <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                                <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                                <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                                <input type="hidden" name="u_name" value="<?php echo $dbu_name; ?>">
                                                <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                                <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                                <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                                <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                                <input type="hidden" name="address" value="<?php echo $dbaddress; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                                <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                                <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                                <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                                <input type="hidden" name="transportation_charge_day" value="<?php echo $dbtransportation_charge_day; ?>">
                                                <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                                <td class="col-sm-2"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                            </form>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    echo "error";
                                }
                                $i=$i+1;
                            }
                            ?>
                            </tbody>
                        </table><br><br>
                        <br><br>
                        <br><br><br>
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
                else
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">Dear Mahika Associate, you don't have any upcoming work.</h2>
                                <br>
                                <br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
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

                    </html>
                    <!-- end document-->
                    <?php
                }
            }
        }
        if ($dbcategory=="Beauty")
        {
            $query="SELECT * FROM beauty_bookings where worker_username='$username' and booking_request='Pending' and from_date >= '$today' order by from_date";
            $result=mysqli_query($a,$query);
            if ($result)
            {
                $rowcount=mysqli_num_rows($result);
                if ($rowcount!=0)
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                    <section class="features tb bb" id="features" >
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <br><br>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Your upcoming beauty work are...</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-2" style="text-align: center">Service</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Address</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">From</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Time</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Payment</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($result))
                            {
                                $dbservice = $row['service'];
                                $dbid=$row['id'];
                                $dbbooking_request=$row['booking_request'];
                                $dbbooking_date=$row['booking_date'];
                                $dbu_username=$row['customer_username'];
                                $dbservice_city=$row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address=$row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbfrom_date=$row['from_date'];
                                $dbtime=$row['time'];
                                $dbworker_rate=$row['worker_rate'];
                                $dbweb_rate_percentage=$row['web_rate_percentage'];
                                $dbtransportation_charge_day=$row['transportation_charge'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost=$row['worker_cost'];
                                $dbweb_cost=$row['web_cost'];
                                $dbtotal=$row['total'];
                                $dbpay_method = $row['pay_method'];
                                $dbworker_card_no=$row['worker_card_no'];
                                @$q1="SELECT * FROM user_details where username='$dbu_username'";
                                @$result1 = mysqli_query($a, $q1);
                                if($result1)

                                {

                                    while ($row=mysqli_fetch_array($result1))
                                    {
                                        $dbu_name=$row['name'];
                                        $dbsub=$row['area'];
                                        $dbaddress=$row['address'];
                                        $dbpin=$row['pin'];
                                        $dbcity=$row['city'];
                                        $dbphone=$row['phone'];
                                        $dbemail=$row['email'];
                                        ?>
                                        <tr class="row" style="background-color: lavender;color: #117a8b">
                                            <td class="col-sm-2" style="text-align: center" scope="row" ><?php echo $dbservice; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbu_name; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbaddress." , ".$dbsub; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbfrom_date; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbtime; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo "Rs. ".$dbtotal; ?></td>
                                            <form action="worker_upcoming_beauty_cost.php" method="post">
                                                <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                                <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                                <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                                <input type="hidden" name="u_username" value="<?php echo $dbu_username; ?>">
                                                <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                                <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                                <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                                <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                                <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                                <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                                <input type="hidden" name="u_name" value="<?php echo $dbu_name; ?>">
                                                <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                                <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                                <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                                <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                                <input type="hidden" name="address" value="<?php echo $dbaddress; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                                <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                                <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                                <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                                <input type="hidden" name="transportation_charge_day" value="<?php echo $dbtransportation_charge_day; ?>">
                                                <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                                <td class="col-sm-2"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                            </form>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    echo "error";
                                }
                                $i=$i+1;
                            }
                            ?>
                            </tbody>
                        </table><br><br>
                        <br><br>
                        <br><br><br>
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
                else
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">Dear Mahika Associate, you don't have any upcoming work.</h2>
                                <br>
                                <br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
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

                    </html>
                    <!-- end document-->
                    <?php
                }
            }
        }
        if ($dbcategory=="Photography")
        {
            $query="SELECT * FROM photography_bookings where worker_username='$username' and booking_request='Pending' and from_date >= '$today' order by from_date";
            $result=mysqli_query($a,$query);
            if ($result)
            {
                $rowcount=mysqli_num_rows($result);
                if ($rowcount!=0)
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                    <section class="features tb bb" id="features" >
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <br><br>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Your upcoming photography work are...</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-2" style="text-align: center">Service</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Address</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">From</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Time</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Payment</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($result))
                            {
                                $dbservice = $row['service'];
                                $dbid=$row['id'];
                                $dbbooking_request=$row['booking_request'];
                                $dbbooking_date=$row['booking_date'];
                                $dbu_username=$row['customer_username'];
                                $dbservice_city=$row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address=$row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbfrom_date=$row['from_date'];
                                $dbtime=$row['time'];
                                $dbworker_rate=$row['worker_rate'];
                                $dbweb_rate_percentage=$row['web_rate_percentage'];
                                $dbtransportation_charge_day=$row['transportation_charge'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost=$row['worker_cost'];
                                $dbweb_cost=$row['web_cost'];
                                $dbtotal=$row['total'];
                                $dbpay_method = $row['pay_method'];
                                $dbworker_card_no=$row['worker_card_no'];
                                @$q1="SELECT * FROM user_details where username='$dbu_username'";
                                @$result1 = mysqli_query($a, $q1);
                                if($result1)

                                {

                                    while ($row=mysqli_fetch_array($result1))
                                    {
                                        $dbu_name=$row['name'];
                                        $dbsub=$row['area'];
                                        $dbaddress=$row['address'];
                                        $dbpin=$row['pin'];
                                        $dbcity=$row['city'];
                                        $dbphone=$row['phone'];
                                        $dbemail=$row['email'];
                                        ?>
                                        <tr class="row" style="background-color: lavender;color: #117a8b">
                                            <td class="col-sm-2" style="text-align: center" scope="row" ><?php echo $dbservice; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbu_name; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbaddress." , ".$dbsub; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbfrom_date; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbtime; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo "Rs. ".$dbtotal; ?></td>
                                            <form action="worker_upcoming_photo_cost.php" method="post">
                                                <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                                <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                                <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                                <input type="hidden" name="u_username" value="<?php echo $dbu_username; ?>">
                                                <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                                <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                                <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                                <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                                <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                                <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                                <input type="hidden" name="u_name" value="<?php echo $dbu_name; ?>">
                                                <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                                <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                                <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                                <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                                <input type="hidden" name="address" value="<?php echo $dbaddress; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                                <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                                <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                                <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                                <input type="hidden" name="transportation_charge_day" value="<?php echo $dbtransportation_charge_day; ?>">
                                                <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                                <td class="col-sm-2"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                            </form>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    echo "error";
                                }
                                $i=$i+1;
                            }
                            ?>
                            </tbody>
                        </table><br><br>
                        <br><br>
                        <br><br><br>
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
                else
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">Dear Mahika Associate, you don't have any upcoming work.</h2>
                                <br>
                                <br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
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

                    </html>
                    <!-- end document-->
                    <?php
                }
            }
        }
        if ($dbcategory=="Packers & Movers")
        {
            $query="SELECT * FROM movers_bookings where worker_username='$username' and booking_request='Pending' and from_date >= '$today' order by from_date";
            $result=mysqli_query($a,$query);
            if ($result)
            {
                $rowcount=mysqli_num_rows($result);
                if ($rowcount!=0)
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                    <section class="features tb bb" id="features" >
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <br><br>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Your upcoming packers & movers work are...</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-2" style="text-align: center">Service</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Shifting</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Date</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Time</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Payment</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($result))
                            {
                                $dbservice = $row['service'];
                                $dbid=$row['id'];
                                $dbbooking_request=$row['booking_request'];
                                $dbbooking_date=$row['booking_date'];
                                $dbu_username=$row['customer_username'];
                                $dbfrom_date=$row['from_date'];
                                $dbtime=$row['time'];
                                $dbworker_rate=$row['worker_rate'];
                                $dbweb_rate_percentage=$row['web_rate_percentage'];
                                $dborigin = $row['origin'];
                                $dbdestination = $row['destination'];
                                $dbworker_cost=$row['worker_cost'];
                                $dbweb_cost=$row['web_cost'];
                                $dbtotal=$row['total'];
                                $dbpay_method = $row['pay_method'];
                                $dbworker_card_no=$row['worker_card_no'];
                                @$q1="SELECT * FROM user_details where username='$dbu_username'";
                                @$result1 = mysqli_query($a, $q1);
                                if($result1)

                                {

                                    while ($row=mysqli_fetch_array($result1))
                                    {
                                        $dbu_name=$row['name'];
                                        $dbsub=$row['area'];
                                        $dbaddress=$row['address'];
                                        $dbpin=$row['pin'];
                                        $dbcity=$row['city'];
                                        $dbphone=$row['phone'];
                                        $dbemail=$row['email'];
                                        ?>
                                        <tr class="row" style="background-color: lavender;color: #117a8b">
                                            <td class="col-sm-2" style="text-align: center" scope="row" ><?php echo $dbservice; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbu_name; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dborigin." to ".$dbdestination; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbfrom_date; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbtime; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo "Rs. ".$dbtotal; ?></td>
                                            <form action="worker_upcoming_movers_cost.php" method="post">
                                                <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                                <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                                <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                                <input type="hidden" name="u_username" value="<?php echo $dbu_username; ?>">
                                                <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                                <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                                <input type="hidden" name="u_name" value="<?php echo $dbu_name; ?>">
                                                <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                                <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                                <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                                <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                                <input type="hidden" name="address" value="<?php echo $dbaddress; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                                <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                                <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                                <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                                <input type="hidden" name="origin" value="<?php echo $dborigin; ?>">
                                                <input type="hidden" name="destination" value="<?php echo $dbdestination; ?>">
                                                <td class="col-sm-2"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                            </form>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    echo "error";
                                }
                                $i=$i+1;
                            }
                            ?>
                            </tbody>
                        </table><br><br>
                        <br><br>
                        <br><br><br>
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
                else
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">Dear Mahika Associate, you don't have any upcoming work.</h2>
                                <br>
                                <br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
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

                    </html>
                    <!-- end document-->
                    <?php
                }
            }
        }
        if ($dbcategory=="Tuition")
        {
            $query="SELECT * FROM tuition_bookings where worker_username='$username' and booking_request='Pending' and from_date >= '$today' order by from_date";
            $result=mysqli_query($a,$query);
            if ($result)
            {
                $rowcount=mysqli_num_rows($result);
                if ($rowcount != 0)
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                        <link
                            href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                            rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
                              media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                        <!-- Font special for pages-->
                        <link
                            href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
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
                         style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                         id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png"/>
                                </a>
                            </div>
                            &nbsp;
                            <a class="navbar-brand " href="#page-top">
                                <h2>
                                    <small
                                        style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small>
                                </h2>
                            </a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button"
                                    data-toggle="collapse"
                                    data-target="#navbarResponsive" aria-controls="navbarResponsive"
                                    aria-expanded="false"
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
                                        <a class="nav-link js-scroll-trigger hvr-glow "
                                           href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log
                                            Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <section class="features tb bb" id="features">
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <br><br>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Your upcoming tuition work
                                are...</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-2" style="text-align: center">Service</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Address</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">From</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Time</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Payment</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $dbservice = $row['service'];
                                $dbid = $row['id'];
                                $dblevel = $row['level'];
                                $dbbooking_request = $row['booking_request'];
                                $dbbooking_date = $row['booking_date'];
                                $dbu_username = $row['customer_username'];
                                $dbservice_city = $row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address = $row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbfrom_date = $row['from_date'];
                                $dbmonths = $row['months'];
                                $dbtime = $row['time'];
                                $dbduration = $row['duration'];
                                $dbworker_rate = $row['worker_rate'];
                                $dbweb_rate_percentage = $row['web_rate_percentage'];
                                $dbtransportation_charge_months = $row['transportation_charge_month'];
                                $dbtransport_included = $row['transport_included'];
                                $dbworker_cost = $row['worker_cost'];
                                $dbweb_cost = $row['web_cost'];
                                $dbtotal = $row['total'];
                                $dbpay_method = $row['pay_method'];
                                $dbworker_card_no = $row['worker_card_no'];
                                @$q1 = "SELECT * FROM user_details where username='$dbu_username'";
                                @$result1 = mysqli_query($a, $q1);
                                if ($result1) {

                                    while ($row = mysqli_fetch_array($result1)) {
                                        $dbu_name = $row['name'];
                                        $dbsub = $row['area'];
                                        $dbaddress = $row['address'];
                                        $dbpin = $row['pin'];
                                        $dbcity = $row['city'];
                                        $dbphone = $row['phone'];
                                        $dbemail = $row['email'];
                                        ?>
                                        <tr class="row" style="background-color: lavender;color: #117a8b">
                                            <td class="col-sm-2" style="text-align: center"
                                                scope="row"><?php echo $dbservice . " , " . $dblevel; ?></td>
                                            <td class="col-sm-2"
                                                style="text-align: center"><?php echo $dbu_name; ?></td>
                                            <td class="col-sm-2"
                                                style="text-align: center"><?php echo $dbaddress . " , " . $dbsub; ?></td>
                                            <td class="col-sm-1"
                                                style="text-align: center"><?php echo $dbfrom_date; ?></td>
                                            <td class="col-sm-1"
                                                style="text-align: center"><?php echo $dbtime; ?></td>
                                            <td class="col-sm-2"
                                                style="text-align: center"><?php echo "Rs. " . $dbtotal; ?></td>
                                            <form action="worker_upcoming_tuition_cost.php" method="post">
                                                <input type="hidden" name="service"
                                                       value="<?php echo $dbservice; ?>">
                                                <input type="hidden" name="booking_request"
                                                       value="<?php echo $dbbooking_request; ?>">
                                                <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                                <input type="hidden" name="u_username"
                                                       value="<?php echo $dbu_username; ?>">
                                                <input type="hidden" name="from_date"
                                                       value="<?php echo $dbfrom_date; ?>">
                                                <input type="hidden" name="months" value="<?php echo $dbmonths; ?>">
                                                <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                                <input type="hidden" name="duration"
                                                       value="<?php echo $dbduration; ?>">
                                                <input type="hidden" name="service_city"
                                                       value="<?php echo $dbservice_city; ?>">
                                                <input type="hidden" name="service_area"
                                                       value="<?php echo $dbservice_area; ?>">
                                                <input type="hidden" name="service_address"
                                                       value="<?php echo $dbservice_address; ?>">
                                                <input type="hidden" name="service_pin"
                                                       value="<?php echo $dbservice_pin; ?>">
                                                <input type="hidden" name="u_name" value="<?php echo $dbu_name; ?>">
                                                <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                                <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                                <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                                <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                                <input type="hidden" name="address"
                                                       value="<?php echo $dbaddress; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                                <input type="hidden" name="level" value="<?php echo $dblevel; ?>">
                                                <input type="hidden" name="pay_method"
                                                       value="<?php echo $dbpay_method; ?>">
                                                <input type="hidden" name="worker_card_no"
                                                       value="<?php echo $dbworker_card_no; ?>">
                                                <input type="hidden" name="worker_rate"
                                                       value="<?php echo $dbworker_rate; ?>">
                                                <input type="hidden" name="transportation_charge_months"
                                                       value="<?php echo $dbtransportation_charge_months; ?>">
                                                <input type="hidden" name="transport_included"
                                                       value="<?php echo $dbtransport_included; ?>">
                                                <td class="col-sm-2"><input style="font-size: 14px" class="btn-link"
                                                                            type="submit" value="Click here"></td>
                                            </form>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                } else {
                                    echo "error";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <br><br>
                        <br><br><br>
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
                    </html>
                    <?php
                } else {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                        <link
                            href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                            rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
                              media="all">
                        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                        <!-- Font special for pages-->
                        <link
                            href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
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
                         style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                         id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a class=" nav-link js-scroll-trigger" href="#top">
                                    <img class="img-rounded" src="img/logo.png"/>
                                </a>
                            </div>
                            &nbsp;
                            <a class="navbar-brand " href="#page-top">
                                <h2>
                                    <small
                                        style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small>
                                </h2>
                            </a>
                            <button class="navbar-toggler navbar-toggler-right ml-auto" type="button"
                                    data-toggle="collapse"
                                    data-target="#navbarResponsive" aria-controls="navbarResponsive"
                                    aria-expanded="false"
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
                                        <a class="nav-link js-scroll-trigger hvr-glow "
                                           href="worker_help.php">Help</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log
                                            Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <section class="features" id="features"
                             style="background: url(img/bg-pattern.png), -webkit-linear-gradient(left, #6f42c1, #e4606d);">
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">Dear Mahika Associate, you don't have
                                    any upcoming work.</h2>
                                <br>
                                <br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
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

                    </html>
                    <!-- end document-->
                    <?php
                }
            }

        }
        if ($dbcategory=="Renovation")

        {
            $query="SELECT * FROM renovation_bookings where worker_username='$username' and booking_request='Pending' and from_date >= '$today' order by from_date";
            $result=mysqli_query($a,$query);
            if ($result)
            {
                $rowcount=mysqli_num_rows($result);
                if ($rowcount!=0)
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                    <section class="features tb bb" id="features" >
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <br><br>
                        <center><h2 style="font-size: 35px;" class="mb-4 text-light">Your upcoming renovation work are...</h2>
                        </center>
                        <table class="container table table-striped">
                            <thead>
                            <tr class="bg-warning row">
                                <th scope="col" class="col-sm-2" style="text-align: center">Service</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Customer</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Address</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">From</th>
                                <th scope="col" class="col-sm-1" style="text-align: center">Time</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Payment</th>
                                <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            while ($row=mysqli_fetch_array($result))
                            {
                                $dbservice = $row['service'];
                                $dbid=$row['id'];
                                $dbbooking_request=$row['booking_request'];
                                $dbbooking_date=$row['booking_date'];
                                $dbu_username=$row['customer_username'];
                                $dbservice_city=$row['service_city'];
                                $dbservice_area = $row['service_area'];
                                $dbservice_address=$row['service_address'];
                                $dbservice_pin = $row['service_pin'];
                                $dbfrom_date=$row['from_date'];
                                $dbtime=$row['time'];
                                $dbworker_rate=$row['worker_rate'];
                                $dbweb_rate_percentage=$row['web_rate_percentage'];
                                $dbhouse_size = $row['house_size'];
                                $dbworker_cost=$row['worker_cost'];
                                $dbweb_cost=$row['web_cost'];
                                $dbtotal=$row['total'];
                                $dbpay_method = $row['pay_method'];
                                $dbworker_card_no=$row['worker_card_no'];
                                @$q1="SELECT * FROM user_details where username='$dbu_username'";
                                @$result1 = mysqli_query($a, $q1);
                                if($result1)

                                {

                                    while ($row=mysqli_fetch_array($result1))
                                    {
                                        $dbu_name=$row['name'];
                                        $dbsub=$row['area'];
                                        $dbaddress=$row['address'];
                                        $dbpin=$row['pin'];
                                        $dbcity=$row['city'];
                                        $dbphone=$row['phone'];
                                        $dbemail=$row['email'];
                                        ?>
                                        <tr class="row" style="background-color: lavender;color: #117a8b">
                                            <td class="col-sm-2" style="text-align: center" scope="row" ><?php echo $dbservice." , ".$dbhouse_size." Flat"; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbu_name; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo $dbaddress." , ".$dbsub; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbfrom_date; ?></td>
                                            <td class="col-sm-1" style="text-align: center"><?php echo $dbtime; ?></td>
                                            <td class="col-sm-2" style="text-align: center"><?php echo "Rs. ".$dbtotal; ?></td>
                                            <form action="worker_upcoming_renovation_cost.php" method="post">
                                                <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                                <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                                <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                                <input type="hidden" name="u_username" value="<?php echo $dbu_username; ?>">
                                                <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                                <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                                <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                                <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                                <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                                <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                                <input type="hidden" name="u_name" value="<?php echo $dbu_name; ?>">
                                                <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                                <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                                <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                                <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                                <input type="hidden" name="address" value="<?php echo $dbaddress; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                                <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                                <input type="hidden" name="worker_card_no" value="<?php echo $dbworker_card_no; ?>">
                                                <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                                <input type="hidden" name="house_size" value="<?php echo $dbhouse_size; ?>">
                                                <td class="col-sm-2"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                            </form>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    echo "error";
                                }
                                $i=$i+1;
                            }
                            ?>
                            </tbody>
                        </table><br><br>
                        <br><br>
                        <br><br><br>
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
                else
                {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <!-- Required meta tags-->
                        <meta charset="utf-8">
                        <meta http-equiv="refresh" content="15">
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
                        <form action="worker_service.php" method="post">
                            <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                        </form>
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: white;font-size: 40px">Dear Mahika Associate, you don't have any upcoming work.</h2>
                                <br>
                                <br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
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

                    </html>
                    <!-- end document-->
                    <?php
                }
            }
        }
    }
    else
    {
        header("Location:worker_profile.php");
    }
}
?>