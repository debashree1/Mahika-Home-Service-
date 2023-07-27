<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else {

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
                        <a class="nav-link js-scroll-trigger hvr-glow " href="#">Find-Service</a>
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

    <div class="page-wrapper bg-img-1 p-t-165 p-b-100">
        <center>
            <h1 class="mb-4 text-light" style="margin-top: 6px;">Find Your Required Service</h1>
        </center>
        <div class="wrapper wrapper--w720">
            <div class="card card-3">
                <div class="card-body">
                    <ul class="tab-list">
                        <li class="tab-list__item active">
                            <a class="tab-list__link" href="#tab1" data-toggle="tab">Maid</a>
                        </li>
                        <li class="tab-list__item">
                            <a class="tab-list__link" href="find_service_repair.php">Repair</a>
                        </li>
                        <li class="tab-list__item">
                            <a class="tab-list__link" href="find_service_renovation.php">Renovation</a>
                        </li>
                        <li class="tab-list__item">
                            <a class="tab-list__link" href="find_service_beauty.php">Beauty</a>
                        </li>
                        <li class="tab-list__item">
                            <a class="tab-list__link" href="find_service_tuition.php">Tuition</a>
                        </li>
                        <li class="tab-list__item">
                            <a class="tab-list__link" href="find_service_movers.php">Movers</a>
                        </li>
                        <li class="tab-list__item">
                            <a class="tab-list__link" href="find_service_photo.php">Photography</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <form method="POST" action="find_service2_maid.php">
                                <div class="input-group">
                                    <label class="label">Select Maid Service:</label>
                                    <i class="zmdi zmdi-local-laundry-service input-group-symbol"></i>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="service" required="required" class="form-control">
                                            <option value="" selected disabled>--Select--</option>
                                            <option value="Cook">Cook</option>
                                            <option value="Home Maid">Home Maid</option>
                                            <option value="Gardener">Gardener</option>
                                            <option value="Car Cleaner">Car Cleaner</option>
                                            <option value="Deep Cleaner">Deep Cleaner</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <label class="label" style="margin-bottom: 10px;margin-top: 5px;">Select Date From</label>
                                            <input required class="input--style-1" name="from" placeholder="mm/dd/yyyy" id="txtdate" type="text">
                                            <i class="zmdi zmdi-calendar-alt input-group-symbol"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <label class="label">How Many Days</label>
                                            <input required class="input--style-1" style="text-transform: lowercase" placeholder="eg:  1 , 2 etc" name="days" type="number">
                                            <i class="zmdi zmdi-view-day input-group-symbol"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-space">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <label class="label" style="margin-bottom: 10px;margin-top: 6px;">Work Start Time</label>
                                            <input required class="input--style-1" name="time" type="time">
                                            <i class="zmdi zmdi-time input-group-symbol"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <label class="label">Work Duration:</label>
                                            <i class="zmdi zmdi-time-interval input-group-symbol"></i>
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select name="duration" required="required" class="form-control">
                                                    <option value="" selected disabled>--Select--</option>
                                                    <option value="3">Max 3 Hours /day -- No Extra Charge</option>
                                                    <option value="4">4 Hours /day -- With Extra Charge</option>
                                                    <option value="5">5 Hours /day -- With Extra Charge</option>
                                                    <option value="6">6 Hours /day -- With Extra Charge</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="category" value="Maid">
                                <button class="btn-submit" type="submit">search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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



