<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
}
else {
    $username=$_SESSION['username'];
    @$category=$_SESSION['category'];
    @$basis=$_REQUEST['basis'];
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT * FROM worker_details where username='$username'";
    @$res = mysqli_query($a, $q);
    if($res)
    {
        if ($category == 'Beauty' or $category == 'Repair' or $category=='Photography')
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
                <script>
                    function myFunction() {
                        var service1 = document.getElementById("service1").value;
                        var service2 = document.getElementById("service2").value;
                        var rate_service2 = document.getElementById("rate_service2").value;
                        var service3 = document.getElementById("service3").value;
                        var rate_service3 = document.getElementById("rate_service3").value;

                        if (service1===service2 || service1===service3)
                        {
                            alert("Please select different categories for service2 and 3 or leave them as blank");
                            return false;
                        }
                        if (service2!== "" && service3!=="" && service2===service3)
                        {
                            alert("Please select different categories for service2 and 3 or leave them as blank");

                            return false;
                        }
                        if (service2=== "" && service3!=="")
                        {
                            alert("Please fill up service 2 fields at first before proceeding to service 3");

                            return false;
                        }
                        if (service2 !== "" && rate_service2=== "" ) {
                            alert("Please Provide Rate for Service2");
                            return false;
                        }
                        if (service2 === "" && rate_service2!== "" )
                        {
                            alert("Please Fill Up All the Fields for Service 2");
                            return false;
                        }
                        if (service3 !== "" && rate_service3=== "") {
                            alert("Please Provide Rate for Service3");
                            return false;
                        }
                        if (service3 === "" && rate_service3!== "")
                        {
                            alert("Please Fill Up All the Fields for Service 3");
                            return false;
                        }

                    }
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
                <form action="worker_personal.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>

                <?php
                while ($row=mysqli_fetch_array($res))
                {
                    $dbservice1 = $row['service1'];
                    $dbservice2 = $row['service2'];
                    $dbservice3 = $row['service3'];
                    $dbrate11 = $row['rate11'];
                    $dbrate21 = $row['rate21'];
                    $dbrate31 = $row['rate31'];
                }
                ?><br>
                <center><h3 style="font-size: 40px" class="text-light"><u>Edit Service Details</u></h3></center><br>
                <div class="container">
                    <div class="row">
                        <form action="worker_s_edit_next.php" method="post" onsubmit="return myFunction()">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 :</b>
                                        <select name="service1" id="service1" required="required" class="form-control">
                                            <option value="<?php echo $dbservice1; ?>" selected><?php echo $dbservice1; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 rate in Rs. :</b>
                                        <input type="number" name="rate11" class="form-control" value="<?php echo $dbrate11?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 (Optional) :</b>
                                        <select name="service2" id="service2" class="form-control">
                                            <option value=""></option>
                                            <option value="<?php echo $dbservice2; ?>" selected><?php echo $dbservice2; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 rate in Rs. :</b>
                                        <input type="number" name="rate21" id="rate_service2" class="form-control"  value="<?php echo $dbrate21?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service3 (Optional) :</b>
                                        <select name="service3" id="service3" class="form-control">
                                            <option value=""></option>
                                            <option value="<?php echo $dbservice3; ?>" selected><?php echo $dbservice3; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service3 rate in Rs. :</b>
                                        <input type="number" id="rate_service3" name="rate31" class="form-control" value="<?php echo $dbrate31?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                    <input style="font-size: 14px;padding-bottom: 5px;padding-top: 5px" class="btnRegister" type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                        <br>
                    </div><br>
                </div>
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
        if ($category == 'Maid')
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
                <script>
                    function myFunction() {
                        var service1 = document.getElementById("service1").value;
                        var service2 = document.getElementById("service2").value;
                        var rate_service2 = document.getElementById("rate_service2").value;
                        var service3 = document.getElementById("service3").value;
                        var rate_service3 = document.getElementById("rate_service3").value;

                        if (service1===service2 || service1===service3)
                        {
                            alert("Please select different categories for service2 and 3 or leave them as blank");
                            return false;
                        }
                        if (service2!== "" && service3!=="" && service2===service3)
                        {
                            alert("Please select different categories for service2 and 3 or leave them as blank");

                            return false;
                        }
                        if (service2=== "" && service3!=="")
                        {
                            alert("Please fill up service 2 fields at first before proceeding to service 3");

                            return false;
                        }
                        if (service2 !== "" && rate_service2=== "" ) {
                            alert("Please Provide Rate for Service2");
                            return false;
                        }
                        if (service2 === "" && rate_service2!== "" )
                        {
                            alert("Please Fill Up All the Fields for Service 2");
                            return false;
                        }
                        if (service3 !== "" && rate_service3=== "") {
                            alert("Please Provide Rate for Service3");
                            return false;
                        }
                        if (service3 === "" && rate_service3!== "")
                        {
                            alert("Please Fill Up All the Fields for Service 3");
                            return false;
                        }

                    }
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
                <form action="worker_personal.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>

                <?php
                while ($row=mysqli_fetch_array($res))
                {
                    $dbservice1 = $row['service1'];
                    $dbservice2 = $row['service2'];
                    $dbservice3 = $row['service3'];
                    $dbrate11 = $row['rate11'];
                    $dbrate21 = $row['rate21'];
                    $dbrate31 = $row['rate31'];
                }
                ?><br>
                <center><h3 style="font-size: 40px" class="text-light"><u>Edit Service Details</u></h3></center><br>
                <div class="container">
                    <div class="row">
                        <form action="worker_s_edit_next.php" method="post" onsubmit="return myFunction()">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 :</b>
                                        <select name="service1" id="service1" required="required" class="form-control">
                                            <option value="<?php echo $dbservice1; ?>" selected><?php echo $dbservice1; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 rate / day in Rs. :</b>
                                        <input type="number" name="rate11" class="form-control" value="<?php echo $dbrate11?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 (Optional) :</b>
                                        <select name="service2" id="service2" class="form-control">
                                            <option value=""></option>
                                            <option value="<?php echo $dbservice2; ?>" selected><?php echo $dbservice2; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 rate / day in Rs. :</b>
                                        <input type="number" name="rate21" id="rate_service2" class="form-control"  value="<?php echo $dbrate21?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service3 (Optional):</b>
                                        <select name="service3" id="service3" class="form-control">
                                            <option value=""></option>
                                            <option value="<?php echo $dbservice3; ?>" selected><?php echo $dbservice3; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service3 rate / day in Rs. :</b>
                                        <input type="number" id="rate_service3" name="rate31" class="form-control" value="<?php echo $dbrate31?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                    <input style="font-size: 14px;padding-bottom: 5px;padding-top: 5px" class="btnRegister" type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                        <br>
                    </div><br><center><h3 class="text-light">Note: Minimum work duration is 3Hours per Day. For extra work hour, bonus will be provided .</h3></center>
                </div>
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
        if ($category == 'Tuition')
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
                <script>
                    function myFunction() {
                        var service1 = document.getElementById("service1").value;
                        var service2 = document.getElementById("service2").value;
                        var rate_service2 = document.getElementById("rate_service2").value;
                        var service3 = document.getElementById("service3").value;
                        var rate_service3 = document.getElementById("rate_service3").value;

                        if (service1===service2 || service1===service3)
                        {
                            alert("Please select different categories for service2 and 3 or leave them as blank");
                            return false;
                        }
                        if (service2!== "" && service3!=="" && service2===service3)
                        {
                            alert("Please select different categories for service2 and 3 or leave them as blank");

                            return false;
                        }
                        if (service2=== "" && service3!=="")
                        {
                            alert("Please fill up service 2 fields at first before proceeding to service 3");

                            return false;
                        }
                        if (service2 !== "" && rate_service2=== "" ) {
                            alert("Please Provide Rate for Service2");
                            return false;
                        }
                        if (service2 === "" && rate_service2!== "" )
                        {
                            alert("Please Fill Up All the Fields for Service 2");
                            return false;
                        }
                        if (service3 !== "" && rate_service3=== "") {
                            alert("Please Provide Rate for Service3");
                            return false;
                        }
                        if (service3 === "" && rate_service3!== "")
                        {
                            alert("Please Fill Up All the Fields for Service 3");
                            return false;
                        }

                    }
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
                <form action="worker_personal.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>

                <?php
                while ($row=mysqli_fetch_array($res))
                {
                    $dbservice1 = $row['service1'];
                    $dbservice2 = $row['service2'];
                    $dbservice3 = $row['service3'];
                    $dbrate11 = $row['rate11'];
                    $dbrate21 = $row['rate21'];
                    $dbrate31 = $row['rate31'];
                }
                ?><br>
                <center><h3 style="font-size: 40px" class="text-light"><u>Edit Service Details</u></h3></center><br>
                <div class="container">
                    <div class="row">
                        <form action="worker_s_edit_next.php" method="post" onsubmit="return myFunction()">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 :</b>
                                        <select name="service1" id="service1" required="required" class="form-control">
                                            <option value="<?php echo $dbservice1; ?>" selected><?php echo $dbservice1; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 rate / month in Rs. :</b>
                                        <input type="number" name="rate11" class="form-control" value="<?php echo $dbrate11?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 (Optional) :</b>
                                        <select name="service2" id="service2" class="form-control">
                                            <option value=""></option>
                                            <option value="<?php echo $dbservice2; ?>" selected><?php echo $dbservice2; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 rate / month in Rs. :</b>
                                        <input type="number" name="rate21" id="rate_service2" class="form-control"  value="<?php echo $dbrate21?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service3 (Optional) :</b>
                                        <select name="service3" id="service3" class="form-control">
                                            <option value=""></option>
                                            <option value="<?php echo $dbservice3; ?>" selected><?php echo $dbservice3; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service3 rate / month in Rs. :</b>
                                        <input type="number" id="rate_service3" name="rate31" class="form-control" value="<?php echo $dbrate31?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                    <input style="font-size: 14px;padding-bottom: 5px;padding-top: 5px" class="btnRegister" type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                        <br>
                    </div><br><br><center><h3 class="text-light">Note: Minimum work duration is 1Hour / Day. For extra work hour, bonus will be provided .</h3></center>
                </div>
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
        if ($category == 'Renovation')
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
                <script>
                    function myFunction() {
                        var service1 = document.getElementById("service1").value;
                        var service2 = document.getElementById("service2").value;
                        var rate21 = document.getElementById("rate21").value;
                        var rate22 = document.getElementById("rate22").value;
                        var rate23 = document.getElementById("rate23").value;
                        if (service1===service2)
                        {
                            alert("Please select a different category for service2 or leave it as blank");
                            return false;
                        }
                        if (service2 !== "" && (rate21 === "" || rate22 === "" || rate23 === "" ) ) {
                            alert("Please provide all the rates for Service2");
                            return false;
                        }
                        if (service2 === "" && (rate21!== "" || rate22!== "" || rate23!== "") )
                        {
                            alert("Please Fill Up All the Fields for Service 2");
                            return false;
                        }

                    }
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
                <form action="worker_personal.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>

                <?php
                while ($row=mysqli_fetch_array($res))
                {
                    $dbservice1 = $row['service1'];
                    $dbservice2 = $row['service2'];
                    $dbrate11 = $row['rate11'];
                    $dbrate12 = $row['rate12'];
                    $dbrate13 = $row['rate13'];
                    $dbrate21 = $row['rate21'];
                    $dbrate22 = $row['rate22'];
                    $dbrate23 = $row['rate23'];
                }
                ?><br>
                <center><h3 style="font-size: 40px" class="text-light"><u>Edit Service Details</u></h3></center><br>
                <div class="container">
                    <div class="row">
                        <form action="worker_s_edit_next.php" method="post" onsubmit="return myFunction()">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 :</b>
                                        <select name="service1" id="service1" required="required" class="form-control">
                                            <option value="<?php echo $dbservice1; ?>" selected><?php echo $dbservice1; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 rate for 1BHK in Rs. :</b>
                                        <input type="number" name="rate11" class="form-control" value="<?php echo $dbrate11?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 rate for 2BHK in Rs. :</b>
                                        <input type="number" name="rate12" class="form-control" value="<?php echo $dbrate12?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 rate for 3BHK in Rs. :</b>
                                        <input type="number" name="rate13" class="form-control" value="<?php echo $dbrate13?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 (Optional) :</b>
                                        <select name="service2" id="service2" class="form-control">
                                            <option value=""></option>
                                            <option value="<?php echo $dbservice2; ?>" selected><?php echo $dbservice2; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 rate for 1BHK in Rs. :</b>
                                        <input type="number" name="rate21" id="rate21" class="form-control"  value="<?php echo $dbrate21?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 rate for 2BHK in Rs. :</b>
                                        <input type="number" name="rate22" id="rate22" class="form-control"  value="<?php echo $dbrate22?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 rate for 3BHK in Rs. :</b>
                                        <input type="number" name="rate23" id="rate23" class="form-control"  value="<?php echo $dbrate23?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                    <input style="font-size: 14px;padding-bottom: 5px;padding-top: 5px" class="btnRegister" type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                        <br>
                    </div><br>
                </div>
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
        if ($category == 'Packers & Movers')
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
                <script>
                    function myFunction() {
                        var service1 = document.getElementById("service1").value;
                        var service2 = document.getElementById("service2").value;
                        var rate21 = document.getElementById("rate21").value;
                        var rate22 = document.getElementById("rate22").value;
                        if (service1===service2)
                        {
                            alert("Please select a different category for service2 or leave it as blank");
                            return false;
                        }
                        if (service2 !== "" && (rate21 === "" || rate22 === "" ) ) {
                            alert("Please provide all the rates for Service2");
                            return false;
                        }
                        if (service2 === "" && (rate21!== "" || rate22!== "") )
                        {
                            alert("Please Fill Up All the Fields for Service 2");
                            return false;
                        }

                    }
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
                <form action="worker_personal.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>

                <?php
                while ($row=mysqli_fetch_array($res))
                {
                    $dbservice1 = $row['service1'];
                    $dbservice2 = $row['service2'];
                    $dbrate11 = $row['rate11'];
                    $dbrate12 = $row['rate12'];
                    $dbrate13 = $row['rate13'];
                    $dbrate21 = $row['rate21'];
                    $dbrate22 = $row['rate22'];
                    $dbrate23 = $row['rate23'];
                }
                ?><br>
                <center><h3 style="font-size: 40px" class="text-light"><u>Edit Service Details</u></h3></center><br>
                <div class="container">
                    <div class="row">
                        <form action="worker_s_edit_next.php" method="post" onsubmit="return myFunction()">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 :</b>
                                        <select name="service1" id="service1" required="required" class="form-control">
                                            <option value="<?php echo $dbservice1; ?>" selected><?php echo $dbservice1; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 rate in Rs. within city :</b>
                                        <input type="number" name="rate11" class="form-control" value="<?php echo $dbrate11?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service1 rate in Rs. per 200km :</b>
                                        <input type="number" name="rate12" class="form-control" value="<?php echo $dbrate12?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 (Optional) :</b>
                                        <select name="service2" id="service2" class="form-control">
                                            <option value=""></option>
                                            <option value="<?php echo $dbservice2; ?>" selected><?php echo $dbservice2; ?></option>
                                            <?php
                                            @$qw="SELECT service FROM service where category='$category' order by service";
                                            @$res1 = mysqli_query($a, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbservice=$row['service'];
                                                    ?>
                                                    <option value="<?php echo $dbservice; ?>"><?php echo $dbservice; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 rate in Rs. within city :</b>
                                        <input type="number" name="rate21" id="rate21" class="form-control"  value="<?php echo $dbrate21?>"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Service2 rate in Rs. per 200km :</b>
                                        <input type="number" name="rate22" id="rate22" class="form-control"  value="<?php echo $dbrate22?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                    <input style="font-size: 14px;padding-bottom: 5px;padding-top: 5px" class="btnRegister" type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                        <br>
                    </div><br>
                </div>
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
?>