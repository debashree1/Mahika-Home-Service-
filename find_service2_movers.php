<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else {
    $username=$_SESSION['username'];
    @$category=$_REQUEST['category'];
    @$service=$_REQUEST['service'];
    @$origin=$_REQUEST['origin'];
    @$destination=$_REQUEST['destination'];
    @$from=$_REQUEST['from'];
    @$time=$_REQUEST['time'];
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT * FROM user_details where username='$username'";
    @$res = mysqli_query($a, $q);
    if ($category!=null)
    {
        if($res)
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
                <form action="find_service_movers.php" method="post">
                    <input type="submit" class="cont_button2 btn-dark" value="<< Back">
                </form>

                <?php
                while ($row=mysqli_fetch_array($res))
                {
                    $payment=$row['pay_method'];
                    $dbarea = $row['area'];
                    $dbu_card_no=$row['card_no'];
                    @$query="SELECT * FROM worker_details where category='$category' and city='$origin' and (service1='$service' or service2='$service')";
                    @$result = mysqli_query($a, $query);
                    if($result)
                    {
                        $rowcount=mysqli_num_rows($result);

                        if ($rowcount!=0)
                        {
                            ?><br><br>
                            <center><h2 style="font-size: 35px;" class="mb-4 text-light">The following <?php echo $service; ?> professionals are found in <?php echo $origin; ?></h2>
                            </center>
                            <table class="container table table-striped">
                                <thead>
                                <tr class="bg-warning row">
                                    <th scope="col" class="col-1">#</th>
                                    <th scope="col" class="col-3">Name</th>
                                    <th scope="col" class="col-3">Basis</th>
                                    <th scope="col" class="col-3">Rate</th>
                                    <th scope="col" class="col-2" style="text-align: center">Proceed to book</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                while ($row=mysqli_fetch_array($result))
                                {
                                    $dbname=$row['name'];
                                    $dbbasis=$row['basis'];
                                    $dbsub=$row['subarea'];
                                    $dbaddress=$row['address'];
                                    $dbpin=$row['pin'];
                                    $dbcity=$row['city'];
                                    $dbusername=$row['username'];
                                    $dbphone=$row['phone'];
                                    $dbemail=$row['email'];
                                    $dbage=$row['age'];
                                    $dbgender=$row['gender'];
                                    $dbexperience=$row['experience'];
                                    $dbdoc=$row['doc'];
                                    $dbcertified_level=$row['certified_level'];
                                    $dbw_card_no=$row['card_no'];
                                    $service1=$row['service1'];
                                    if ($service1==$service)
                                    {
                                        if ($destination=='Within City')
                                        {
                                            $dbrate=$row['rate11'];
                                        }
                                        elseif ($destination=='100-200km')
                                        {
                                            $dbrate=$row['rate12'];
                                        }
                                        elseif ($destination=='200-400km')
                                        {
                                            $dbrate=$row['rate12']*2;
                                        }
                                        else
                                        {
                                            $dbrate=$row['rate12']*3;
                                        }
                                    }
                                    else
                                    {
                                        if ($destination=='Within City')
                                        {
                                            $dbrate=$row['rate21'];
                                        }
                                        elseif ($destination=='100-200km')
                                        {
                                            $dbrate=$row['rate22'];
                                        }
                                        elseif ($destination=='200-400km')
                                        {
                                            $dbrate=$row['rate22']*2;
                                        }
                                        else
                                        {
                                            $dbrate=$row['rate22']*3;
                                        }
                                    }
                                    ?>
                                    <tr class="row" style="background-color: lavender;color: #117a8b">
                                        <th class="col-1" scope="row" ><?php echo $i; ?></th>
                                        <td class="col-3"><?php echo $dbname; ?></td>
                                        <td class="col-3"><?php echo $dbbasis; ?></td>
                                        <td class="col-3"><?php echo "Rs. ".$dbrate." within ".$destination; ?></td>
                                        <form action="movers_cost.php" method="post">
                                            <input type="hidden" name="payment" value="<?php echo $payment; ?>">
                                            <input type="hidden" name="u_card_no" value="<?php echo $dbu_card_no; ?>">
                                            <input type="hidden" name="w_card_no" value="<?php echo $dbw_card_no; ?>">
                                            <input type="hidden" name="w_name" value="<?php echo $dbname; ?>">
                                            <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                            <input type="hidden" name="origin" value="<?php echo $origin; ?>">
                                            <input type="hidden" name="destination" value="<?php echo $destination; ?>">
                                            <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                            <input type="hidden" name="w_username" value="<?php echo $dbusername; ?>">
                                            <input type="hidden" name="w_phone" value="<?php echo $dbphone; ?>">
                                            <input type="hidden" name="w_email" value="<?php echo $dbemail; ?>">
                                            <input type="hidden" name="w_address" value="<?php echo $dbaddress; ?>">
                                            <input type="hidden" name="w_pin" value="<?php echo $dbpin; ?>">
                                            <input type="hidden" name="w_city" value="<?php echo $dbcity; ?>">
                                            <input type="hidden" name="w_age" value="<?php echo $dbage; ?>">
                                            <input type="hidden" name="w_gender" value="<?php echo $dbgender; ?>">
                                            <input type="hidden" name="certified_level" value="<?php echo $dbcertified_level; ?>">
                                            <input type="hidden" name="doc" value="<?php echo $dbdoc; ?>">
                                            <input type="hidden" name="experience" value="<?php echo $dbexperience; ?>">
                                            <input type="hidden" name="rate" value="<?php echo $dbrate; ?>">
                                            <input type="hidden" name="service" value="<?php echo $service; ?>">
                                            <input type="hidden" name="from" value="<?php echo $from; ?>">
                                            <input type="hidden" name="time" value="<?php echo $time; ?>">
                                            <td class="col-2"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                        </form>
                                    </tr>
                                    <?php
                                    $i=$i+1;
                                }
                                ?>
                                </tbody>
                            </table>
                            <br>
                            <center><br><br>
                                <h3><i class="fa fa-arrow-right text-white">100% verified professionals</i><br>
                                    <i class="fa fa-arrow-right text-white">Affordable fixed prices</i><br>
                                    <i class="fa fa-arrow-right text-white">At your doorstep</i></h3>
                            </center>
                            <?php
                        }

                        else
                        {
                            ?>
                            <br><br><br><br><br>
                            <div><br>
                                <h1 style="font-size: 40px" class="mb-4 text-light">Oops.. No <?php echo $service; ?> professional found in <?php echo $origin; ?></h1>
                                <center><h3 class="mb-4 text-light">Sorry for the inconvenience... We will surely increase man power in these areas soon.</h3>
                                </center><br><br><br>
                            </div>
                            <?php
                        }


                    }
                }
                ?><br>
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
    else
    {
        header("Location:find_service_movers.php");
    }
}
?>