<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else
{
    date_default_timezone_set("Asia/Kolkata");
    @$date=date('l jS \of F Y \a\t h:i:s A');
    @$username=$_SESSION['username'];
    @$u_card_no=$_REQUEST['u_card_no'];
    @$w_card_no=$_REQUEST['w_card_no'];
    @$w_username=$_REQUEST['w_username'];
    @$area=$_REQUEST['area'];
    @$address=$_REQUEST['address'];
    @$pin=$_REQUEST['pin'];
    @$city=$_REQUEST['city'];
    @$service=$_REQUEST['service'];
    @$from=$_REQUEST['from'];
    @$from=date("Y-m-d",strtotime($from));
    @$time=$_REQUEST['time'];
    @$rate=$_REQUEST['rate'];
    @$payment=$_REQUEST['payment'];
    @$worker_cost=$_REQUEST['worker_cost'];
    @$web_cost=$_REQUEST['web_cost'];
    @$total=$web_cost+$worker_cost;
    @$transport_included=$_REQUEST['transport_included'];
    if ($transport_included=='Yes')
    {
        $transport_charge=15;
    }
    else
    {
        $transport_charge=0;
    }
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT * FROM photography_bookings where customer_username='$username'";
    @$res = mysqli_query($a, $q);
    if ($w_username!=null)
    {
        $count=0;
        if($res)
        {
            while ($row=mysqli_fetch_array($res))
            {
                $dbusername=$row['customer_username'];
                $dbw_username=$row['worker_username'];
                $dbservice=$row['service'];
                $dbservice_city=$row['service_city'];
                $dbservice_area=$row['service_area'];
                $dbservice_address=$row['service_address'];
                $dbservice_pin=$row['service_pin'];
                $dbfrom=$row['from_date'];
                $dbtime=$row['time'];
                if ($username==$dbusername && $w_username==$dbw_username && $dbfrom==$from && $time==$dbtime && $dbservice==$service && $dbservice_city==$city && $dbservice_area==$area && $dbservice_address==$address && $pin==$dbservice_pin)
                {
                    $count=$count + 1;
                    break;
                }
            }
            if ($count == 1)
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
                    <div class="container">
                        <br><br><br><br><br>
                        <center><h2 style="color: white;font-size: 40px">Dear customer, you have already booked the service.</h2>
                            <br>
                            <h3 style="font-size: 26px;color: whitesmoke">Stay updated with your booking in <b class="btn" style="border-color: whitesmoke;color: whitesmoke">Record-Book <i class="fa fa-arrow-right"></i> Upcoming Services</b> in the above menu bar.</h3>
                            <br><br>
                            <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                            <br><br>
                            <center><form action="find_service.php" method="post">
                                    <center><input type="submit" class="cont_button1 btn-info btn" value="Continue searching more >>"></center>
                                </form>
                            </center><br>
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
            else
            {
                $query="insert into photography_bookings(customer_username ,transportation_charge , worker_username,   service  ,  service_city , service_area, service_address , service_pin, from_date  , time  , booking_date , worker_rate , transport_included, worker_cost, web_cost,pay_method,worker_card_no,user_card_no,total) values('$username','$transport_charge','$w_username','$service','$city','$area','$address','$pin','$from','$time','$date','$rate','$transport_included','$worker_cost','$web_cost','$payment','$w_card_no','$u_card_no','$total')";
                $result=mysqli_query($a,$query);
                if ($result)
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
                        <div class="container">
                            <br><br><br><br><br>
                            <center><h2 style="color: lawngreen;font-size: 40px">Congratulations! Your booking is confirmed.</h2>
                                <br>
                                <h3 style="font-size: 26px;color: whitesmoke">Stay updated with your booking in <b class="btn" style="border-color: whitesmoke;color: whitesmoke">Record-Book <i class="fa fa-arrow-right"></i> Upcoming Services</b> in the above menu bar.</h3>
                                <br><br>
                                <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                                <br><br>
                                <center><form action="find_service.php" method="post">
                                        <center><input type="submit" class="cont_button1 btn-info btn" value="Continue searching more >>"></center>
                                    </form>
                                </center><br>
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
                else
                {
                    echo "Error";
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
    else
    {
        header("Location:find_service.php");
    }


}
?>