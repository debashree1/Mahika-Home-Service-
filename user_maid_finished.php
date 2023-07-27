<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else {
    $username=$_SESSION['username'];
    $today=date('Y-m-d');
    $category="Maid";
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT * FROM maid_bookings where customer_username='$username' and booking_request='Finished' order by from_date asc";
    @$res = mysqli_query($a, $q);
    if($res)
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
                <meta http-equiv="refresh" content="15">
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
            <section class="features tb bb" id="features" >
                <form action="user_finished.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <br><br>
                <center><h2 style="font-size: 35px;" class="mb-4 text-light">Your finished maid service are...</h2>
                </center>
                <table class="container table table-striped">
                    <thead>
                    <tr class="bg-warning row">
                        <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">Service</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">Professional</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">From</th>
                        <th scope="col" class="col-sm-1" style="text-align: center">Time</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">Status</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    while ($row=mysqli_fetch_array($res))
                    {
                        $dbservice = $row['service'];
                        $dbid=$row['id'];
                        $dbbooking_request=$row['booking_request'];
                        $dbbooking_date=$row['booking_date'];
                        $dbw_username=$row['worker_username'];
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
                        $dbuser_card_no=$row['user_card_no'];
                        @$query="SELECT * FROM worker_details where username='$dbw_username'";
                        @$result = mysqli_query($a, $query);
                        if($result)

                        {

                            while ($row=mysqli_fetch_array($result))
                            {
                                $dbw_name=$row['name'];
                                $dbbasis=$row['basis'];
                                $dbsub=$row['subarea'];
                                $dbaddress=$row['address'];
                                $dbpin=$row['pin'];
                                $dbcity=$row['city'];
                                $dbphone=$row['phone'];
                                $dbemail=$row['email'];
                                $dbage=$row['age'];
                                $dbgender=$row['gender'];
                                $dbexperience=$row['experience'];
                                $dbdoc=$row['doc'];
                                $dbcertified_level=$row['certified_level'];
                                ?>
                                <tr class="row" style="background-color: lavender;color: #117a8b">
                                    <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbservice; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbw_name; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbfrom_date; ?></td>
                                    <td class="col-sm-1" style="text-align: center"><?php echo $dbtime; ?></td>
                                    <td class="col-sm-2" style="text-align: center"><?php echo $dbbooking_request; ?></td>
                                    <form action="finished_maid_cost.php" method="post">
                                        <input type="hidden" name="service" value="<?php echo $dbservice; ?>">
                                        <input type="hidden" name="booking_request" value="<?php echo $dbbooking_request; ?>">
                                        <input type="hidden" name="booking_date" value="<?php echo $dbbooking_date; ?>">
                                        <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                        <input type="hidden" name="id" value="<?php echo $dbid; ?>">
                                        <input type="hidden" name="w_username" value="<?php echo $dbw_username; ?>">
                                        <input type="hidden" name="from_date" value="<?php echo $dbfrom_date; ?>">
                                        <input type="hidden" name="days" value="<?php echo $dbdays; ?>">
                                        <input type="hidden" name="time" value="<?php echo $dbtime; ?>">
                                        <input type="hidden" name="duration" value="<?php echo $dbduration; ?>">
                                        <input type="hidden" name="service_city" value="<?php echo $dbservice_city; ?>">
                                        <input type="hidden" name="service_area" value="<?php echo $dbservice_area; ?>">
                                        <input type="hidden" name="service_address" value="<?php echo $dbservice_address; ?>">
                                        <input type="hidden" name="service_pin" value="<?php echo $dbservice_pin; ?>">
                                        <input type="hidden" name="w_name" value="<?php echo $dbw_name; ?>">
                                        <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                        <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                        <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                        <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                        <input type="hidden" name="address" value="<?php echo $dbaddress; ?>">
                                        <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                        <input type="hidden" name="doc" value="<?php echo $dbdoc; ?>">
                                        <input type="hidden" name="experience" value="<?php echo $dbexperience; ?>">
                                        <input type="hidden" name="pay_method" value="<?php echo $dbpay_method; ?>">
                                        <input type="hidden" name="user_card_no" value="<?php echo $dbuser_card_no; ?>">
                                        <input type="hidden" name="worker_rate" value="<?php echo $dbworker_rate; ?>">
                                        <input type="hidden" name="transportation_charge_day" value="<?php echo $dbtransportation_charge_day; ?>">
                                        <input type="hidden" name="transport_included" value="<?php echo $dbtransport_included; ?>">
                                        <input type="hidden" name="age" value="<?php echo $dbage; ?>">
                                        <input type="hidden" name="gender" value="<?php echo $dbgender; ?>">
                                        <input type="hidden" name="certified_level" value="<?php echo $dbcertified_level; ?>">
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
                <form action="user_finished.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <div class="container">
                    <br><br><br><br><br>
                    <center><h2 style="color: white;font-size: 40px">Dear customer, you don't have any finished maid service.</h2>
                        <br>
                        <center><form action="find_service.php" method="post"><br>
                                <center><input type="submit" class="cont_button1 btn-info btn" value="Continue searching for service >>"></center>
                            </form>
                        </center><br><br>
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
    }
    else
    {
        header("Location:find_service.php");
    }
}
?>