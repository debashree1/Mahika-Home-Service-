<?php
session_start();

require("php/PasswordHash.php");
$hasher = new PasswordHash(8, false);

@$username=$_REQUEST["username"];
@$password=$_REQUEST["password"];
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
if ($_SESSION["username"]==true && $_SESSION["password"]) {
    $con=mysqli_connect("localhost","root","","mahika") or die("unable to connect");
    $query="select * from worker_details";
    $result=mysqli_query($con,$query);
    $count=0;
    if($result) {
        while ($row=mysqli_fetch_array($result))
        {
            $dbusname=$row['username'];
            $dbpw=$row['password'];
            if ($username==$dbusname)
            {
                $check = $hasher->CheckPassword($password, $dbpw);
                if ($check)
                {
                    $count=$count + 1;
                }
            }

        }
        if ($count == 1) {
            $q="select * from worker_details where username='$username'";
            $res=mysqli_query($con,$q);
            if ($res) {
                while ($row=mysqli_fetch_array($res))
                {
                    $dbname=$row['name'];
                    $dbcategory=$row['category'];
                    $dbverification=$row['verification'];
                    $dbcard_no=$row['card_no'];
                    $dbcity=$row['city'];
                    if ($dbverification=='Pending')
                    {
                        ?>
                        <!DOCTYPE html>
                        <html>
                        <head>

                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                            <meta name="description" content="">
                            <meta name="author" content="">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <title>Mahika | Home Service</title>
                            <link rel="shortcut icon" href="img/favicon.ico" />
                            <!-- Bootstrap core CSS -->
                            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

                            <!-- Custom fonts for this template -->
                            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                            <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">

                            <!-- Plugin CSS -->
                            <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

                            <!-- Custom styles for this template -->
                            <link href="css/style.css" rel="stylesheet">
                            <link href="css/hover-min.css" rel="stylesheet">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


                        </head>

                        <body id="page-top">

                        <!-- Navigation -->
                        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-info" id="mainNav">
                            <div class="container">
                                <div class="navbar-header">
                                    <a class=" nav-link js-scroll-trigger" href="#top">
                                        <img class="img-rounded" src="img/logo.png" />
                                    </a>
                                </div>
                                &nbsp;
                                <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $dbname; ?></small></h2></a>
                                <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                    Menu
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarResponsive">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="w_logout.php">Log out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>


                        <section class="features" id="features" style="background:lavender">
                            <div class="container">
                                <div style="text-align: center">
                                    <center><h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 38px;margin-top: 80px;">Your verification is pending.
                                            Please visit the following Mahika Centre for document verification. If already visited, contact us through phone or mail.<br></h1>
                                        <h1 class="mb-5 text-primary" style="font-family:Catamaran;font-size: 25px;margin-top: 5px;">
                                            <?php
                                            @$qw="SELECT * FROM cities where city='$dbcity' ";
                                            @$res1 = mysqli_query($con, $qw);
                                            if ($res1)
                                            {
                                                while ($row=mysqli_fetch_array($res1))
                                                {
                                                    $dbcity=$row['city'];
                                                    $dbcentre=$row['centre'];
                                                    echo $dbcity;
                                                    echo " Branch: ";
                                                    echo $dbcentre;
                                                    echo "<br>Contact No : +91 9434508973";
                                                    echo "<br>Email ID : mahikaservice@gmail.com";
                                                }
                                            }
                                            ?>
                                        </h1>
                                    </center>
                                </div>
                        </section>
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
                        <!-- Bootstrap core JavaScript -->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Plugin JavaScript -->
                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                        
                        <script src="js/new-age.min.js"></script>
                        </body>
                        </html>
                        <?php
                    }
                    else if ($dbverification=='Confirmed')
                    {
                        if ($dbcard_no== NULL)
                        {
                            if ($dbcategory == 'Beauty' or $dbcategory == 'Repair' or $dbcategory=='Photography')
                            {
                                ?>
                                <!DOCTYPE html>
                                <html lang="en">

                                <head>

                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                    <meta name="description" content="">
                                    <meta name="author" content="">
                                    <title>Mahika | Home Service</title>
                                    <link rel="shortcut icon" href="img/favicon.ico" />
                                    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                                    <link rel="stylesheet" type="text/css" href="css/style.css">
                                    <script src="vendor/jquery/jquery.min.js"></script>
                                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                                <div class="container-fluid register">
                                    <div class="row">
                                        <div class="col-md-3 register-left">
                                            <img src="img/logo.png" alt=""/>
                                            <h1 style="font-family: Catamaran"><?php echo $dbname; ?></h1>
                                            <br>
                                            <h2 style="font-family: Catamaran">Category : <?php echo $dbcategory; ?></h2>
                                            <br>
                                            <h2 style="font-family: Catamaran">Please Provide Your Service Details</h2>
                                        </div>
                                        <div class="col-md-9 register-right">
                                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="contact.html">Help</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="w_logout.php">Log Out</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <br>
                                                    <h3 class="register-heading">Mahika Associate - Next Step Portal</h3>
                                                    <div class="register-form">
                                                        <form action="w_login_logic_card.php" method="post" onsubmit="return myFunction()">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service1" id="service1" required="required" class="form-control">
                                                                            <option value="" selected disabled>--Select Service1 *--</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate11" id="rate_service1" class="form-control" placeholder="Service1 Rate in Rs. *" value="" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service2" id="service2" class="form-control">
                                                                            <option value="">--Select Service2 (Optional)</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate21" id="rate_service2" class="form-control" placeholder="Service2 Rate in Rs." value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service3" id="service3" class="form-control">
                                                                            <option value="">--Select Service3 (Optional) </option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate31" id="rate_service3" class="form-control"  placeholder="Service3 Rate in Rs. " value=""/>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="name" value="<?php echo $dbname; ?>">
                                                                <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                                <input type="hidden" name="password" value="<?php echo $password; ?>">
                                                                <div class="col-lg-8"></div>
                                                                <div class="col-lg-4">
                                                                    <input type="submit" class="btnRegister"  value="Submit"/>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            }
                            if ($dbcategory == 'Maid')
                            {
                                ?>
                                <!DOCTYPE html>
                                <html lang="en">

                                <head>

                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                    <meta name="description" content="">
                                    <meta name="author" content="">
                                    <title>Mahika | Home Service</title>
                                    <link rel="shortcut icon" href="img/favicon.ico" />
                                    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                                    <link rel="stylesheet" type="text/css" href="css/style.css">
                                    <script src="vendor/jquery/jquery.min.js"></script>
                                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                                <div class="container-fluid register">
                                    <div class="row">
                                        <div class="col-md-3 register-left">
                                            <img src="img/logo.png" alt=""/>
                                            <h1 style="font-family: Catamaran"><?php echo $dbname; ?></h1>
                                            <br>
                                            <h2 style="font-family: Catamaran">Category : <?php echo $dbcategory; ?></h2>
                                            <br>
                                            <h2 style="font-family: Catamaran">Please Provide Your Service Details</h2><br>
                                        </div>
                                        <div class="col-md-9 register-right">
                                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="contact.html">Help</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="w_logout.php">Log Out</a>
                                                </li>
                                            </ul>
                                            <br>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <br>
                                                    <h3 class="register-heading">Mahika Associate - Next Step Portal</h3>
                                                    <div class="register-form">
                                                        <form action="w_login_logic_card.php" method="post" onsubmit="return myFunction()">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service1" id="service1" required="required" class="form-control">
                                                                            <option value="" selected disabled>--Select Service1 *--</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate11" id="rate_service1" class="form-control" placeholder="Service1 Rate / Day in Rs. *" value="" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service2" id="service2" class="form-control">
                                                                            <option value="">--Select Service2 (Optional)</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate21" id="rate_service2" class="form-control" placeholder="Service2 Rate / Day in Rs." value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service3" id="service3" class="form-control">
                                                                            <option value="">--Select Service3 (Optional) </option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate31" id="rate_service3" class="form-control"  placeholder="Service3 Rate / Day in Rs. " value=""/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12"><center><p><b>Note</b>: Work duration is generally 3Hours / Day.. For extra work hour, bonus of Rs.50/hour will be provided .</p>
                                                                    </center></div>
                                                                <input type="hidden" name="name" value="<?php echo $dbname; ?>">
                                                                <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                                <input type="hidden" name="password" value="<?php echo $password; ?>">
                                                                <div class="col-lg-8"></div>
                                                                <div class="col-lg-4">
                                                                    <input type="submit" class="btnRegister"  value="Submit"/>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            }
                            if ($dbcategory == 'Tuition')
                            {
                                ?>
                                <!DOCTYPE html>
                                <html lang="en">

                                <head>

                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                    <meta name="description" content="">
                                    <meta name="author" content="">
                                    <title>Mahika | Home Service</title>
                                    <link rel="shortcut icon" href="img/favicon.ico" />
                                    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                                    <link rel="stylesheet" type="text/css" href="css/style.css">
                                    <script src="vendor/jquery/jquery.min.js"></script>
                                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                                <div class="container-fluid register">
                                    <div class="row">
                                        <div class="col-md-3 register-left">
                                            <img src="img/logo.png" alt=""/>
                                            <h1 style="font-family: Catamaran"><?php echo $dbname; ?></h1>
                                            <br>
                                            <h2 style="font-family: Catamaran">Category : <?php echo $dbcategory; ?></h2>
                                            <br>
                                            <h2 style="font-family: Catamaran">Please Provide Your Service Details</h2><br>
                                        </div>
                                        <div class="col-md-9 register-right">
                                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="contact.html">Help</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="w_logout.php">Log Out</a>
                                                </li>
                                            </ul>
                                            <br>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <br>
                                                    <h3 class="register-heading">Mahika Associate - Next Step Portal</h3>
                                                    <div class="register-form">
                                                        <form action="w_login_logic_card.php" method="post" onsubmit="return myFunction()">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service1" id="service1" required="required" class="form-control">
                                                                            <option value="" selected disabled>--Select Service1 *--</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate11" id="rate_service1" class="form-control" placeholder="Service1 Rate / Month in Rs. *" value="" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service2" id="service2" class="form-control">
                                                                            <option value="">--Select Service2 (Optional)</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate21" id="rate_service2" class="form-control" placeholder="Service2 Rate / Month in Rs." value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <select name="service3" id="service3" class="form-control">
                                                                            <option value="">--Select Service3 (Optional) </option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate31" id="rate_service3" class="form-control"  placeholder="Service3 Rate / Month in Rs. " value=""/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12"><center><p><b>Note</b>: Work duration is generally 1Hour / Day. For extra work hour, bonus of Rs.50/hour will be provided .</p>
                                                                    </center></div>
                                                                <input type="hidden" name="name" value="<?php echo $dbname; ?>">
                                                                <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                                <input type="hidden" name="password" value="<?php echo $password; ?>">
                                                                <div class="col-lg-8"></div>
                                                                <div class="col-lg-4">
                                                                    <input type="submit" class="btnRegister"  value="Submit"/>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            }
                            if ($dbcategory == 'Packers & Movers')
                            {
                                ?>
                                <!DOCTYPE html>
                                <html lang="en">

                                <head>

                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                    <meta name="description" content="">
                                    <meta name="author" content="">
                                    <title>Mahika | Home Service</title>
                                    <link rel="shortcut icon" href="img/favicon.ico" />
                                    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                                    <link rel="stylesheet" type="text/css" href="css/style.css">
                                    <script src="vendor/jquery/jquery.min.js"></script>
                                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                                <div class="container-fluid register">
                                    <div class="row">
                                        <div class="col-md-2 register-left">
                                            <img src="img/logo.png" alt=""/>
                                            <h1 style="font-family: Catamaran"><?php echo $dbname; ?></h1>
                                            <br>
                                            <h2 style="font-family: Catamaran">Category : <?php echo $dbcategory; ?></h2>
                                            <br>
                                        </div>
                                        <div class="col-md-10 register-right">
                                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="contact.html">Help</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="w_logout.php">Log Out</a>
                                                </li>
                                            </ul>
                                            <br>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <br>
                                                    <h3 class="register-heading">Mahika Associate - Next Step Portal</h3>
                                                    <div class="register-form">
                                                        <form action="w_login_logic_card.php" method="post" onsubmit="return myFunction()">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <select name="service1" id="service1" required="required" class="form-control">
                                                                            <option value="" selected disabled>--Select Service1 *--</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate11" id="rate11" class="form-control" placeholder="Service1 Rate in Rs. within city" value="" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate12" id="rate12" class="form-control" placeholder="Service1 Rate in Rs. per 200km " value="" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <select name="service2" id="service2" class="form-control">
                                                                            <option value="">--Select Service2 (Optional)</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate21" id="rate21" class="form-control" placeholder="Service2 Rate in Rs. within city" value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate22" id="rate22" class="form-control" placeholder="Service2 Rate in Rs. per 200km" value="" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="name" value="<?php echo $dbname; ?>">
                                                                <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                                <input type="hidden" name="password" value="<?php echo $password; ?>">
                                                                <div class="col-lg-8"></div>
                                                                <div class="col-lg-4">
                                                                    <input type="submit" class="btnRegister"  value="Submit"/>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            }
                            if ($dbcategory == 'Renovation')
                            {
                                ?>
                                <!DOCTYPE html>
                                <html lang="en">

                                <head>

                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                    <meta name="description" content="">
                                    <meta name="author" content="">
                                    <title>Mahika | Home Service</title>
                                    <link rel="shortcut icon" href="img/favicon.ico" />
                                    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                                    <link rel="stylesheet" type="text/css" href="css/style.css">
                                    <script src="vendor/jquery/jquery.min.js"></script>
                                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                                <div class="container-fluid register">
                                    <div class="row">
                                        <div class="col-md-2 register-left">
                                            <img src="img/logo.png" alt=""/>
                                            <h1 style="font-family: Catamaran"><?php echo $dbname; ?></h1>
                                            <br>
                                            <h2 style="font-family: Catamaran">Category : <?php echo $dbcategory; ?></h2>
                                            <br>
                                        </div>
                                        <div class="col-md-10 register-right">
                                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="contact.html">Help</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="w_logout.php">Log Out</a>
                                                </li>
                                            </ul>
                                            <br>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <br>
                                                    <h3 class="register-heading">Mahika Associate - Next Step Portal</h3>
                                                    <div class="register-form">
                                                        <form action="w_login_logic_card.php" method="post" onsubmit="return myFunction()">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <select name="service1" id="service1" required="required" class="form-control">
                                                                            <option value="" selected disabled>--Select Service1 *--</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate11" id="rate11" class="form-control" placeholder="1BHK Rate in Rs." value="" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate12" id="rate12" class="form-control" placeholder="2BHK Rate in Rs." value="" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate13" id="rate13" class="form-control" placeholder="3BHK Rate in Rs." value="" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <select name="service2" id="service2" class="form-control">
                                                                            <option value="">--Select Service2--</option>
                                                                            <?php
                                                                            @$qw="SELECT service FROM service where category='$dbcategory' order by service";
                                                                            @$res1 = mysqli_query($con, $qw);
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
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate21" id="rate21" class="form-control" placeholder="1BHK Rate in Rs." value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate22" id="rate22" class="form-control" placeholder="2BHK Rate in Rs." value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <input type="number" name="rate23" id="rate23" class="form-control" placeholder="3BHK Rate in Rs." value="" />
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="name" value="<?php echo $dbname; ?>">
                                                                <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                                <input type="hidden" name="password" value="<?php echo $password; ?>">
                                                                <div class="col-lg-8"></div>
                                                                <div class="col-lg-4">
                                                                    <input type="submit" class="btnRegister"  value="Submit"/>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            }
                        }
                        else
                        {
                            $_SESSION['name']=$dbname;
                            header("location:worker_profile.php");
                        }
                    }
                    else
                    {
                        ?>
                        <!DOCTYPE html>
                        <html>
                        <head>

                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                            <meta name="description" content="">
                            <meta name="author" content="">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <title>Mahika | Home Service</title>
                            <link rel="shortcut icon" href="img/favicon.ico" />
                            <!-- Bootstrap core CSS -->
                            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

                            <!-- Custom fonts for this template -->
                            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                            <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">

                            <!-- Plugin CSS -->
                            <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

                            <!-- Custom styles for this template -->
                            <link href="css/style.css" rel="stylesheet">
                            <link href="css/hover-min.css" rel="stylesheet">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


                        </head>

                        <body id="page-top">

                        <!-- Navigation -->
                        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-info" id="mainNav">
                            <div class="container">
                                <div class="navbar-header">
                                    <a class=" nav-link js-scroll-trigger" href="#top">
                                        <img class="img-rounded" src="img/logo.png" />
                                    </a>
                                </div>
                                &nbsp;
                                <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $dbname; ?></small></h2></a>
                                <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                    Menu
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarResponsive">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="w_logout.php">Log out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>


                        <section class="features" id="features" style="background:lavender">
                            <div class="container">
                                <div style="text-align: center"><br>
                                    <center><h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 38px;margin-top: 80px;">We regret to inform you that you are not qualified to work as a Mahika Associate.<br></h1>
                                        <br><h1 style="font-family: 'Bradley Hand ITC'">Thank you..</h1><br><br>
                                    </center>
                                </div>
                        </section>
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
                        <!-- Bootstrap core JavaScript -->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Plugin JavaScript -->
                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                        
                        <script src="js/new-age.min.js"></script>
                        </body>
                        </html>
                        <?php
                    }
                }
            }
        }
        else {
            ?>
            <!DOCTYPE html>
            <html>
            <head>

                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Mahika | Home Service</title>
                <link rel="shortcut icon" href="img/favicon.ico" />
                <!-- Bootstrap core CSS -->
                <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom fonts for this template -->
                <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">

                <!-- Plugin CSS -->
                <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

                <!-- Custom styles for this template -->
                <link href="css/style.css" rel="stylesheet">
                <link href="css/hover-min.css" rel="stylesheet">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


            </head>

            <body id="page-top">

            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-info" id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="img/logo.png" />
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top"><h2><small style="font-family: Arial;border-bottom: 2px solid gainsboro">Service Expert</small></h2></a>
                    <button class="navbar-toggler navbar-toggler-right ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="logout.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="workerlogin.html">Work as professional</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="contact.html">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <section class="features" id="features" style="background:lavender">
                <div class="container">
                    <div style="text-align: center">
                        <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;margin-top: 150px">Oops! Incorrect username - password combination.
                            <br>Please Try again.</h1><br><br>
                    </div>
            </section>
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
            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            
            <script src="js/new-age.min.js"></script>
            </body>
            </html>
            <?php
            session_destroy(); //destroy the session
            exit();
        }
    }
}
else {
    header("location:workerlogin.html");
}

?>