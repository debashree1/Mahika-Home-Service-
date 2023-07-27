<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:index.php");
}
else {
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT * FROM worker_details where verification='Confirmed'";
    @$res = mysqli_query($a, $q);
    $username=$_SESSION['username'];
    if ($res)
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
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Mahika | Home Service</title>
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                                <a class="nav-link js-scroll-trigger hvr-glow" href="profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="workers.php">Workers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="customers.php">Customers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="bookings.php">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="queries.php">Queries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="features tb bb" id="features" >
                <form action="workers.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>
                <br><br>
                <center><h2 style="font-size: 35px;" class="mb-4 text-light">Workers with confirmed verification are...</h2>
                </center>
                <table class="container table table-striped">
                    <thead>
                    <tr class="bg-warning row">
                        <th scope="col" class="col-sm-1" style="text-align: center">#</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">Name</th>
                        <th scope="col" class="col-sm-1" style="text-align: center">Basis</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">Category</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">City</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">Area</th>
                        <th scope="col" class="col-sm-2" style="text-align: center">Explore Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    while ($row=mysqli_fetch_array($res))
                    {
                        $dbname = $row['name'];
                        $dbbasis = $row['basis'];
                        $dbdoc = $row['doc'];
                        $dbdoc_no = $row['doc_no'];
                        $dbage = $row['age'];
                        $dbcertified_level = $row['certified_level'];
                        $dbexperience = $row['experience'];
                        $dbcategory = $row['category'];
                        $dbemail = $row['email'];
                        $dbcity = $row['city'];
                        $dbarea = $row['subarea'];
                        $dbaddress= $row['address'];
                        $dbpin = $row['pin'];
                        $dbusername = $row['username'];
                        $dbphone = $row['phone'];
                        $dbquestion = $row['question'];
                        $dbgender = $row['gender'];
                        $dbservice1 = $row['service1'];
                        $dbservice2 = $row['service2'];
                        $dbservice3 = $row['service3'];
                        $dbrate11 = $row['rate11'];
                        $dbrate12 = $row['rate12'];
                        $dbrate13 = $row['rate13'];
                        $dbrate21 = $row['rate21'];
                        $dbrate22 = $row['rate22'];
                        $dbrate23 = $row['rate23'];
                        $dbrate31 = $row['rate31'];
                        ?>
                        <tr class="row" style="background-color: lavender;color: #117a8b">
                            <th class="col-sm-1" style="text-align: center" scope="row" ><?php echo $i; ?></th>
                            <td class="col-sm-2" style="text-align: center"><?php echo $dbname; ?></td>
                            <td class="col-sm-1" style="text-align: center"><?php echo $dbbasis; ?></td>
                            <td class="col-sm-2" style="text-align: center"><?php echo $dbcategory; ?></td>
                            <td class="col-sm-2" style="text-align: center"><?php echo $dbcity; ?></td>
                            <td class="col-sm-2" style="text-align: center"><?php echo $dbarea; ?></td>
                            <form action="confirmed_w_details.php" method="post">
                                <input type="hidden" name="name" value="<?php echo $dbname; ?>">
                                <input type="hidden" name="age" value="<?php echo $dbage; ?>">
                                <input type="hidden" name="category" value="<?php echo $dbcategory; ?>">
                                <input type="hidden" name="doc" value="<?php echo $dbdoc; ?>">
                                <input type="hidden" name="doc_no" value="<?php echo $dbdoc_no; ?>">
                                <input type="hidden" name="experience" value="<?php echo $dbexperience; ?>">
                                <input type="hidden" name="certified_level" value="<?php echo $dbcertified_level; ?>">
                                <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                <input type="hidden" name="email" value="<?php echo $dbemail; ?>">
                                <input type="hidden" name="city" value="<?php echo $dbcity; ?>">
                                <input type="hidden" name="area" value="<?php echo $dbarea; ?>">
                                <input type="hidden" name="address" value="<?php echo $dbaddress; ?>">
                                <input type="hidden" name="pin" value="<?php echo $dbpin; ?>">
                                <input type="hidden" name="dbusername" value="<?php echo $dbusername; ?>">
                                <input type="hidden" name="phone" value="<?php echo $dbphone; ?>">
                                <input type="hidden" name="question" value="<?php echo $dbquestion; ?>">
                                <input type="hidden" name="gender" value="<?php echo $dbgender; ?>">
                                <input type="hidden" name="service1" value="<?php echo $dbservice1; ?>">
                                <input type="hidden" name="service2" value="<?php echo $dbservice2; ?>">
                                <input type="hidden" name="service3" value="<?php echo $dbservice3; ?>">
                                <input type="hidden" name="rate11" value="<?php echo $dbrate11; ?>">
                                <input type="hidden" name="rate12" value="<?php echo $dbrate12; ?>">
                                <input type="hidden" name="rate13" value="<?php echo $dbrate13; ?>">
                                <input type="hidden" name="rate21" value="<?php echo $dbrate21; ?>">
                                <input type="hidden" name="rate22" value="<?php echo $dbrate22; ?>">
                                <input type="hidden" name="rate23" value="<?php echo $dbrate23; ?>">
                                <input type="hidden" name="rate31" value="<?php echo $dbrate31; ?>">
                                <td class="col-sm-2"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                            </form>
                        </tr>
                        <?php
                        $i=$i+1;
                    }

                    ?>
                    </tbody>
                </table><br><br>

                <br><br><br>
            </section>

            <!-- Jquery JS-->
            <script src="../vendor/jquery1/jquery.min.js"></script>
            <!-- Vendor JS-->
            <script src="../vendor/select2/select2.min.js"></script>
            <script src="../vendor/jquery-validate/jquery.validate.min.js"></script>
            <script src="../vendor/bootstrap-wizard/bootstrap.min.js"></script>
            <script src="../vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
            <script src="../vendor/datepicker/moment.min.js"></script>
            <script src="../vendor/datepicker/daterangepicker.js"></script>
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            
            <script src="../js/new-age.min.js"></script>

            <!-- Main JS-->
            <script src="../js/global.js"></script>
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
                <link rel="shortcut icon" href="../img/favicon.ico"/>
                <!-- Icons font CSS-->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
                      rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
                <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

                <!-- Font special for pages-->
                <link
                    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">

                <!-- Vendor CSS-->
                <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
                <link href="../css/hover-min.css" rel="stylesheet">


                <!-- Main CSS-->
                <link href="../css/style.css" rel="stylesheet" media="all">
                <link href="../css/main.css" rel="stylesheet" media="all">
            </head>

            <body>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top"
                 style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));"
                 id="mainNav">
                <div class="container">
                    <div class="navbar-header">
                        <a class=" nav-link js-scroll-trigger" href="#top">
                            <img class="img-rounded" src="../img/logo.png"/>
                        </a>
                    </div>
                    &nbsp;
                    <a class="navbar-brand " href="#page-top">
                        <h2>
                            <small style="font-family: Arial;border-bottom: 2px solid gainsboro">Admin Panel</small>
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
                                <a class="nav-link js-scroll-trigger hvr-glow" href="profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="workers.php">Workers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="customers.php">Customers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="bookings.php">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="queries.php">Queries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger hvr-glow " href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="features" id="features" style="background: url(../img/bg-pattern.png), -webkit-linear-gradient(left, #6f42c1, #e4606d);">
                <div class="container">
                    <br><br><br><br><br><br><br>
                    <center><h2 style="color: white;font-size: 40px">Mahika doesn't have any confirmed worker.</h2>
                        <br><br><br>
                        <h2 style="font-family: 'Brush Script MT'">Thank You...</h2>
                        <br><br><br>
                    </center>
                </div>
            </section>

            <!-- Jquery JS-->
            <script src="../vendor/jquery1/jquery.min.js"></script>
            <!-- Vendor JS-->
            <script src="../vendor/select2/select2.min.js"></script>
            <script src="../vendor/jquery-validate/jquery.validate.min.js"></script>
            <script src="../vendor/bootstrap-wizard/bootstrap.min.js"></script>
            <script src="../vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
            <script src="../vendor/datepicker/moment.min.js"></script>
            <script src="../vendor/datepicker/daterangepicker.js"></script>
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            
            <script src="../js/new-age.min.js"></script>

            <!-- Main JS-->
            <script src="../js/global.js"></script>
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
        echo "error";
    }
}
?>




