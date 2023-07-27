<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else
{
    $username=$_SESSION['username'];
    @$id=$_REQUEST['id'];
    @$booking_date=$_REQUEST['booking_date'];
    @$user_card_no=$_REQUEST['user_card_no'];
    @$basis=$_REQUEST['basis'];
    @$w_name=$_REQUEST['w_name'];
    @$w_username=$_REQUEST['w_username'];
    @$phone=$_REQUEST['phone'];
    @$level=$_REQUEST['level'];
    @$email=$_REQUEST['email'];
    @$address=$_REQUEST['address'];
    @$pin=$_REQUEST['pin'];
    @$city=$_REQUEST['city'];
    @$sub=$_REQUEST['sub'];
    @$age=$_REQUEST['age'];
    @$gender=$_REQUEST['gender'];
    @$doc=$_REQUEST['doc'];
    @$certified_level=$_REQUEST['certified_level'];
    @$experience=$_REQUEST['experience'];
    @$service_area=$_REQUEST['service_area'];
    @$service_address=$_REQUEST['service_address'];
    @$service_pin=$_REQUEST['service_pin'];
    @$service_city=$_REQUEST['service_city'];
    @$service=$_REQUEST['service'];
    @$from_date=$_REQUEST['from_date'];
    @$months=$_REQUEST['months'];
    @$time=$_REQUEST['time'];
    @$duration=$_REQUEST['duration'];
    @$worker_rate=$_REQUEST['worker_rate'];
    @$pay_method=$_REQUEST['pay_method'];
    @$transportation_charge_month=$_REQUEST['transportation_charge_month'];
    @$transport_included=$_REQUEST['transport_included'];
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$query="select booking_request from tuition_bookings where id='$id'";
    @$result = mysqli_query($a, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result))
        {
            $booking_request = $row['booking_request'];
        }
        if($phone!=null)
        {
            if ($booking_request=='Finished'){
                if ($service_area!=null)
                {
                    if ($transport_included=="Yes")
                    {
                        $transport_charge=450;
                    }
                    else
                    {
                        $transport_charge=0;
                    }
                    if ($duration!=1)
                    {
                        $x=$duration-1;
                        $extra_charge=50*$x;
                    }
                    else
                    {
                        $extra_charge=0;
                    }
                    $charge=$worker_rate*$months;
                    $transport=$transport_charge*$months;
                    $extra=$extra_charge*$months;
                    $worker_cost=$charge+$transport+$extra;
                    $web_cost=($worker_cost*7)/100;
                    $total=$worker_cost+$web_cost;
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
                        <form action="user_tuition_finished.php" method="post">
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
                                                        <img src="img/kk.png" class="user1">
                                                        <center><h3 class="text-white">Home Service Details</h3><br></center>
                                                        <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                        <p style="color: #f1b0b7;">Level : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $level; ?></b></p>
                                                        <p style="color: #f1b0b7;">Date from : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from_date; ?></b></p>
                                                        <p style="color: #f1b0b7;">No. of months : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $months; ?></b></p>
                                                        <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                        <p style="color: #f1b0b7;">Duration : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $duration." hour"; ?></b></p>
                                                        <p style="color: #f1b0b7;">Your-Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service_address." , ".$service_area." , ".$service_city." , ".$service_pin; ?></b></p>
                                                        <p style="color: #f1b0b7;">Booking date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_date; ?></b></p>
                                                    </div>
                                                </div><br>
                                            </div>
                                            <div class="col-md-4">

                                                <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                                    <div class="loginBox2">
                                                        <img src="img/teach.png" class="user1">
                                                        <center><h3 class="text-white">tuition Professional</h3><br></center>

                                                        <?php
                                                        if ($basis=="Company")
                                                        {
                                                            ?>
                                                            <p style="color: #f1b0b7;">Company : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                            <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$phone; ?></b></p>
                                                            <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $email; ?></b></p>
                                                            <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $address." , ".$sub ." , ".$pin." , ".$city; ?></b></p>
                                                            <p style="color: #f1b0b7;">Certification : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $doc; ?></b></p>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                            <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$phone; ?></b></p>
                                                            <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $email; ?></b></p>
                                                            <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $address." , ".$sub ." , ".$pin." , ".$city; ?></b></p>

                                                            <p style="color: #f1b0b7;">Gender : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $gender; ?></b></p>
                                                            <p style="color: #f1b0b7;">Age : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $age; ?></b></p>
                                                            <p style="color: #f1b0b7;">Education : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $certified_level; ?></b></p>
                                                            <?php
                                                        }
                                                        ?>
                                                        <p style="color: #f1b0b7;">Experience : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $experience." years"; ?></b></p>

                                                    </div>
                                                </div><br>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                                    <div class="loginBox2">
                                                        <img src="img/pay.png" class="user1">
                                                        <center><h3 class="text-white">Payment Info</h3><br></center>
                                                        <p style="color: #f1b0b7;">Status : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $booking_request; ?></b></p>
                                                        <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $pay_method; ?></b></p>
                                                        <?php
                                                        if ($pay_method=='Card Payment')
                                                        {
                                                            ?>
                                                            <p style="color: #f1b0b7;">Card No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $user_card_no." "; ?></b></p>
                                                            <?php
                                                        }
                                                        ?>
                                                        <p style="color: #f1b0b7;;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." / month"; ?></b></p>
                                                        <p style="color: #f1b0b7;">Charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$worker_rate." * ".$months." = Rs. ".$charge; ?></b></p>
                                                        <p style="color: #f1b0b7;">Transport : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$transport_charge." * ".$months." = Rs. ".$transport; ?></b></p>
                                                        <p style="color: #f1b0b7;">Extra time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$extra_charge." * ".$months." = Rs. ".$extra; ?></b></p>
                                                        <p style="color: #f1b0b7;border-bottom: 2px solid deeppink">Web cost : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                        <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p><br>
                                                        <form action="user_tuition_feedback.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                            <input class="btn" style="background-color: yellow;color: black" type="submit" name="" value="Give feedback?">
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <center style="color: lightgrey"><br>
                                            <h3>Note: If worker does not belong to your area, Rs.450/month will be charged as transportation fee.</h3>
                                            <h3>Again, max 1hour work does not cost you extra charge. For extra time work, Rs.50/hour will be charged.</h3>
                                        </center>
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

        }
        else
        {
            header("Location:user_tuition_finished.php");
        }
    }
}
?>




