<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
}
else {
    $username=$_SESSION['username'];
    @$category=$_REQUEST['category'];
    @$basis=$_REQUEST['basis'];
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT * FROM worker_details where username='$username'";
    @$res = mysqli_query($a, $q);
    if ($category!=null)
    {
        if($res)
        {
            if ($basis=='Individual')
            {
                $name=$_REQUEST['name'];
                $email=$_REQUEST['email'];
                $phone=$_REQUEST['phone'];
                $city=$_REQUEST['city'];
                $age=$_REQUEST['age'];
                $gender=$_REQUEST['gender'];
                $question=$_REQUEST['question'];
                $answer=$_REQUEST['answer'];
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
                    <form action="worker_p_edit.php" method="post">
                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                        <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                        <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                    </form>

                    <?php
                    while ($row=mysqli_fetch_array($res))
                    {
                        $dbarea = $row['subarea'];
                        $dbaddress = $row['address'];
                        $dbpin = $row['pin'];
                    }
                    ?><br>
                    <center><h3 style="font-size: 40px" class="text-light"><u>Edit Home Address</u></h3>
                        <div class="col-md-9">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form action="worker_p_edit_next_update.php" method="post">
                                        <div class="register-form">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <b style="font-size: 20px" class="text-warning">Select Sub-Area :</b>
                                                        <select name="subarea" required="required" class="form-control">
                                                            <option value="" selected disabled>--Select Sub-Area--</option>
                                                            <?php
                                                            @$qw="SELECT sub FROM sub_area where city='$city' order by sub";
                                                            @$res1 = mysqli_query($a, $qw);
                                                            if ($res1)
                                                            {
                                                                while ($row=mysqli_fetch_array($res1))
                                                                {
                                                                    $dbsub=$row['sub'];
                                                                    ?>
                                                                    <option value="<?php echo $dbsub; ?>"><?php echo $dbsub; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <b style="font-size: 20px" class="text-warning">House No, Apartment Details :</b>
                                                        <input type="text" name="address" class="form-control" value="<?php echo $dbaddress ?>" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <b style="font-size: 20px" class="text-warning">Pin :</b>
                                                        <input type="number" name="pin" class="form-control" value="<?php echo $dbpin ?>" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                                            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                                            <input type="hidden" name="question" value="<?php echo $question; ?>">
                                            <input type="hidden" name="answer" value="<?php echo $answer; ?>">
                                            <input type="hidden" name="gender" value="<?php echo $gender; ?>">
                                            <input type="hidden" name="age" value="<?php echo $age; ?>">
                                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                                            <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <input type="submit" class="btnRegister"  value="Update"/>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div></center><br>
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
                @$name=$_REQUEST['name'];
                @$email=$_REQUEST['email'];
                @$phone=$_REQUEST['phone'];
                @$password=$_REQUEST['password'];
                @$city=$_REQUEST['city'];
                @$question=$_REQUEST['question'];
                @$answer=$_REQUEST['answer'];
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
                    <form action="worker_p_edit.php" method="post">
                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                        <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                        <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                    </form>

                    <?php
                    while ($row=mysqli_fetch_array($res))
                    {
                        $dbarea = $row['subarea'];
                        $dbaddress = $row['address'];
                        $dbpin = $row['pin'];
                    }
                    ?><br>
                    <center><h3 style="font-size: 40px" class="text-light"><u>Edit Company Address</u></h3>
                        <div class="col-md-9">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form action="worker_p_edit_next_update.php" method="post">
                                        <div class="register-form">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <b style="font-size: 20px" class="text-warning">Select Sub-Area :</b>
                                                        <select name="subarea" required="required" class="form-control">
                                                            <option value="" selected disabled>--Select Sub-Area--</option>
                                                            <?php
                                                            @$qw="SELECT sub FROM sub_area where city='$city' order by sub";
                                                            @$res1 = mysqli_query($a, $qw);
                                                            if ($res1)
                                                            {
                                                                while ($row=mysqli_fetch_array($res1))
                                                                {
                                                                    $dbsub=$row['sub'];
                                                                    ?>
                                                                    <option value="<?php echo $dbsub; ?>"><?php echo $dbsub; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <b style="font-size: 20px" class="text-warning">House No, Apartment Details :</b>
                                                        <input type="text" name="address" class="form-control" value="<?php echo $dbaddress ?>" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <b style="font-size: 20px" class="text-warning">Pin :</b>
                                                        <input type="number" name="pin" class="form-control" value="<?php echo $dbpin ?>" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                                            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                                            <input type="hidden" name="password" value="<?php echo $password; ?>">
                                            <input type="hidden" name="question" value="<?php echo $question; ?>">
                                            <input type="hidden" name="answer" value="<?php echo $answer; ?>">
                                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                                            <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <input type="submit" class="btnRegister"  value="Update"/>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div></center><br>
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
        header("Location:worker_personal.php");
    }
}
?>