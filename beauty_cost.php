<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else
{
    $username=$_SESSION['username'];
    @$area=$_REQUEST['area'];
    @$u_card_no=$_REQUEST['u_card_no'];
    @$w_card_no=$_REQUEST['w_card_no'];
    @$address=$_REQUEST['address'];
    @$pin=$_REQUEST['pin'];
    @$city=$_REQUEST['city'];
    @$w_name=$_REQUEST['w_name'];
    @$sub=$_REQUEST['sub'];
    @$service=$_REQUEST['service'];
    @$from=$_REQUEST['from'];
    @$time=$_REQUEST['time'];
    @$rate=$_REQUEST['rate'];
    @$payment=$_REQUEST['payment'];
    @$basis=$_REQUEST['basis'];
    @$w_phone=$_REQUEST['w_phone'];
    @$w_email=$_REQUEST['w_email'];
    @$w_address=$_REQUEST['w_address'];
    @$w_pin=$_REQUEST['w_pin'];
    @$w_city=$_REQUEST['w_city'];
    @$w_age=$_REQUEST['w_age'];
    @$w_gender=$_REQUEST['w_gender'];
    @$w_doc=$_REQUEST['doc'];
    @$w_certified_level=$_REQUEST['certified_level'];
    @$w_experience=$_REQUEST['experience'];
    @$w_username=$_REQUEST['w_username'];
    if ($area!=null)
    {
        if ($area!=$sub)
        {
            $transport_charge=15;
            $transport_included="Yes";
        }
        else
        {
            $transport_charge=0;
            $transport_included="No";
        }
        $charge=$rate;
        $transport=$transport_charge;
        $worker_cost=$charge+$transport;
        $web_cost=($worker_cost*10)/100;
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
            <form action="find_service2_beauty.php" method="post">
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <input type="hidden" name="category" value="Beauty">
                <input type="hidden" name="service" value="<?php echo $service; ?>">
                <input type="hidden" name="from" value="<?php echo $from; ?>">
                <input type="hidden" name="time" value="<?php echo $time; ?>">
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
                                            <form action="find_service_beauty.php" method="post">
                                                <p style="color: #f1b0b7;">Service : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $service; ?></b></p>
                                                <p style="color: #f1b0b7;">Date : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $from; ?></b></p>
                                                <p style="color: #f1b0b7;">Work start time : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $time; ?></b></p>
                                                <p style="color: #f1b0b7;">Your-Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $address." , ".$area." , ".$city." , ".$pin; ?></b></p>
                                                <br><input class="btn" style="background-color: deeppink;color: white" type="submit" name="" value="Edit requirements">
                                            </form>
                                        </div>
                                    </div><br>
                                </div>
                                <div class="col-md-4">

                                    <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius: 10px;background: rgba(0,0,0,.6);">
                                        <div class="loginBox2">
                                            <img src="img/beauty.png" class="user1">
                                            <center><h3 class="text-white">Beauty Professional</h3><br></center>
                                            <form action="find_service.php" method="post">
                                                <?php
                                                if ($basis=="Company")
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Company : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                    <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                    <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                    <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_address." , ".$sub ." , ".$w_pin." , ".$w_city; ?></b></p>
                                                    <p style="color: #f1b0b7;">Certification : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_doc; ?></b></p>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <p style="color: #f1b0b7;">Name : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_name; ?></b></p>
                                                    <p style="color: #f1b0b7;">Phone No : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "+91 ".$w_phone; ?></b></p>
                                                    <p style="color: #f1b0b7;">Email : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_email; ?></b></p>
                                                    <p style="color: #f1b0b7;">Address : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_address." , ".$sub ." , ".$w_pin." , ".$w_city; ?></b></p>

                                                    <p style="color: #f1b0b7;">Gender : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_gender; ?></b></p>
                                                    <p style="color: #f1b0b7;">Age : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_age; ?></b></p>
                                                    <p style="color: #f1b0b7;">Education : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_certified_level; ?></b></p>
                                                    <?php
                                                }
                                                ?>
                                                <p style="color: #f1b0b7;">Experience : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $w_experience." years"; ?></b></p>
                                                <br>
                                                <p style="color: red;">Note : <b style="color: yellow;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'">Talk to the worker on the phone or meet personally. Book the worker and pay only after the worker joins.</b></p>

                                            </form>
                                        </div>
                                    </div><br>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-item" style="text-align:left;padding-left:15px;padding-right:15px;margin-top: 10px;border-radius:10px;background: rgba(0,0,0,.6);">
                                        <div class="loginBox2">
                                            <img src="img/pay.png" class="user1">
                                            <center><h3 class="text-white">Payment Info</h3><br></center>
                                            <form action="confirm_beauty.php" method="post">
                                                <p style="color: #f1b0b7;">Mode : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo $payment." "; ?></b><a class="small" href="user_card.php" style="color: dodgerblue;border-bottom: 1px solid dodgerblue">change</a></p>
                                                <p style="color: #f1b0b7;border-bottom: 2px solid deeppink">Rate : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif';"><?php echo "Rs. ".$rate." / service"; ?></b></p>
                                                <p style="color: #f1b0b7;">Labour charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$charge; ?></b></p>
                                                <p style="color: #f1b0b7;">Transportation charge : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$transport; ?></b></p>
                                                <p style="color: #f1b0b7;border-bottom: 2px solid deeppink">Web cost : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$web_cost; ?></b></p>
                                                <p style="color: lawngreen;">Total Payment : <b style="color: white;font-family: 'Muli', 'Helvetica', 'Arial', 'sans-serif'"><?php echo "Rs. ".$total; ?></b></p><br>
                                                <input type="hidden" name="payment" value="<?php echo $payment; ?>">
                                                <input type="hidden" name="u_card_no" value="<?php echo $u_card_no; ?>">
                                                <input type="hidden" name="w_card_no" value="<?php echo $w_card_no; ?>">
                                                <input type="hidden" name="area" value="<?php echo $area; ?>">
                                                <input type="hidden" name="address" value="<?php echo $address; ?>">
                                                <input type="hidden" name="w_username" value="<?php echo $w_username; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $pin; ?>">
                                                <input type="hidden" name="city" value="<?php echo $city; ?>">
                                                <input type="hidden" name="rate" value="<?php echo $rate; ?>">
                                                <input type="hidden" name="service" value="<?php echo $service; ?>">
                                                <input type="hidden" name="from" value="<?php echo $from; ?>">
                                                <input type="hidden" name="time" value="<?php echo $time; ?>">
                                                <input type="hidden" name="worker_cost" value="<?php echo $worker_cost; ?>">
                                                <input type="hidden" name="web_cost" value="<?php echo $web_cost; ?>">
                                                <input type="hidden" name="transport_included" value="<?php echo $transport_included; ?>">
                                                <input class="btn" style="background-color: deeppink;color: white" type="submit" name="" value="Confirm Booking">
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <center style="color: lightgrey"><br>
                                <h3>Note: If worker does not belong to your area, Rs.15/day will be charged as transportation fee.</h3>
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
    else
    {
        header("Location:find_service.php");
    }
}
?>



