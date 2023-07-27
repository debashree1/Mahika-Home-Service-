<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else {
    $username=$_SESSION['username'];
    @$pay_method="Card Payment";
    @$card_type=$_REQUEST['card_type'];
    @$card_no=$_REQUEST['card_no'];
    @$c_name=$_REQUEST['c_name'];
    @$month=$_REQUEST['month'];
    @$year=$_REQUEST['year'];
    @$cvv=$_REQUEST['cvv'];
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT * FROM credit_card";
    @$res = mysqli_query($a, $q);
    $count=0;
    if ($card_type!=null)
    {
        if($res)
        {
            while ($row=mysqli_fetch_array($res))
            {
                $dbcard_type=$row['card_type'];
                $dbcard_no=$row['card_no'];
                $dbc_name=$row['name'];
                $dbexp_month=$row['exp_month'];
                $dbexp_year=$row['exp_year'];
                $dbcvv=$row['cvv'];
                $dbb_day=$row['b_day'];
                if ($card_no==$dbcard_no && $card_type==$dbcard_type && $c_name==$dbc_name && $month==$dbexp_month && $year==$dbexp_year && $cvv==$dbcvv)
                {
                    $count=$count + 1;
                    break;
                }

            }
            if ($count == 0){
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
                    <form action="user_card.php" method="post">
                        <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                    </form>
                    <br>
                    <center><h3 style="font-size: 40px" class="text-light"><u>Invalid Card Details - Please add a valid card</u></h3></center><br>
                    <center>
                        <div class="col-md-9">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form action="user_card_edit_next2.php" method="post">
                                        <div class="register-form">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <select name="card_type" required="required" class="form-control">
                                                            <option value="" selected disabled>--Select Credit Card Option--</option>
                                                            <option value="VISA">VISA</option>
                                                            <option value="MasterCard">MasterCard</option>
                                                            <option value="Amex">Amex</option>
                                                            <option value="RuPay">RuPay</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <input type="number" name="card_no" minlength="16" maxlength="16" class="form-control" placeholder="Card No *" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <input type="text" name="c_name" class="form-control" placeholder="Name on Card *" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <select name="month" required="required" class="form-control">
                                                                        <option value="" selected disabled>--Expiry Month--</option>
                                                                        <option>January</option>
                                                                        <option>February</option>
                                                                        <option>March</option>
                                                                        <option>April</option>
                                                                        <option>May</option>
                                                                        <option>June</option>
                                                                        <option>July</option>
                                                                        <option>August</option>
                                                                        <option>September</option>
                                                                        <option>October</option>
                                                                        <option>November</option>
                                                                        <option>December</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <select name="year" required="required" class="form-control">
                                                                        <option value="" selected disabled>--Expiry Year--</option>
                                                                        <option>2018</option>
                                                                        <option>2019</option>
                                                                        <option>2020</option>
                                                                        <option>2021</option>
                                                                        <option>2022</option>
                                                                        <option>2023</option>
                                                                        <option>2024</option>
                                                                        <option>2025</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <input type="number" name="cvv" maxlength="3" class="form-control" placeholder="Enter CVV *" value="" required="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <input type="hidden" name="payment" value="<?php echo $pay_method; ?>">
                                                        <input type="submit" class="btnRegister"  value="Next >>"/>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </center>
                    <br>
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
                    <form action="user_card_edit_next.php" method="post">
                        <input type="hidden" name="payment" value="<?php echo $pay_method; ?>">
                        <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                    </form>
                    <br>
                    <center><h3 style="font-size: 40px" class="text-light"><u>Verifying Card- Holder</u></h3></center><br>
                    <center>
                        <div class="col-md-9">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form action="user_card_edit_next_finish.php" method="post">
                                        <div class="register-form">

                                            <center><h3 class="text-warning">What is the birth date of the card-holder?</h3></center>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <input type="date" name="ans" class="form-control"  required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <input type="hidden" name="payment" value="<?php echo $pay_method; ?>">
                                                        <input type="hidden" name="card_no" value="<?php echo $card_no; ?>">
                                                        <input type="hidden" name="bday" value="<?php echo $dbb_day; ?>">
                                                        <input type="submit" class="btnRegister"  value="Verify"/>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </center>
                    <br>
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
    }
    else
    {
        header("Location:user_card.php");
    }
}
?>