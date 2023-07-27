<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else {
    $username=$_SESSION['username'];
    @$u_card_no=$_REQUEST['u_card_no'];
    @$address=$_REQUEST['address'];
    @$pin=$_REQUEST['pin'];
    @$city=$_REQUEST['city'];
    @$area=$_REQUEST['dbarea'];
    @$payment=$_REQUEST['payment'];
    @$category=$_REQUEST['category'];
    @$service=$_REQUEST['service'];
    @$from=$_REQUEST['from'];
    @$time=$_REQUEST['time'];
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT radius_5km FROM nearby where sub='$area'";
    @$res = mysqli_query($a, $q);
    if ($area!=null)
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
                <?php
                $count=0;
                while ($row=mysqli_fetch_array($res))
                {
                    $dbarea = $row['radius_5km'];
                    @$query="SELECT * FROM worker_details where category='$category' and subarea='$dbarea' and (service1='$service' or service2='$service' or service3='$service')";
                    @$result = mysqli_query($a, $query);
                    if($result)
                    {
                        $count=mysqli_num_rows($result);
                        if ($count==1)
                        {
                            break;
                        }
                    }
                }
                if ($count==1)
                {
                    ?><br><br>
                    <center><h2 style="font-size: 35px;" class="mb-4 text-light">The following <?php echo $service; ?> professionals are found within your 5km radius</h2>
                    </center>
                    <table class="container table table-striped">
                        <thead>
                        <tr class="bg-warning row">
                            <th scope="col" class="col-3">Name</th>
                            <th scope="col" class="col-2">Basis</th>
                            <th scope="col" class="col-2">Area</th>
                            <th scope="col" class="col-2">Rate</th>
                            <th scope="col" class="col-3" style="text-align: center">Proceed to book</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        @$b="SELECT radius_5km FROM nearby where sub='$area'";
                        @$res1 = mysqli_query($a, $b);
                        if($res1)
                        {
                            while ($row=mysqli_fetch_array($res1))
                            {

                                $dbarea=$row['radius_5km'];
                                @$query="SELECT * FROM worker_details where category='$category' and subarea='$dbarea' and (service1='$service' or service2='$service' or service3='$service')";
                                @$result = mysqli_query($a, $query);
                                if($result)
                                {

                                    while ($row=mysqli_fetch_array($result))
                                    {
                                        $dbname=$row['name'];
                                        $dbbasis=$row['basis'];
                                        $dbsub=$row['subarea'];
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
                                        $service2=$row['service2'];
                                        if ($service1==$service)
                                        {
                                            $dbrate=$row['rate11'];
                                        }
                                        elseif ($service2==$service)
                                        {
                                            $dbrate=$row['rate21'];
                                        }
                                        else
                                        {
                                            $dbrate=$row['rate31'];
                                        }
                                        ?>
                                        <tr class="row" style="background-color: lavender;color: #117a8b">
                                            <td class="col-3"><?php echo $dbname; ?></td>
                                            <td class="col-2"><?php echo $dbbasis; ?></td>
                                            <td class="col-2"><?php echo $dbsub; ?></td>
                                            <td class="col-2"><?php echo "Rs. ".$dbrate."/service"; ?></td>
                                            <form action="repair_cost.php" method="post">
                                                <input type="hidden" name="payment" value="<?php echo $payment; ?>">
                                                <input type="hidden" name="u_card_no" value="<?php echo $u_card_no; ?>">
                                                <input type="hidden" name="w_card_no" value="<?php echo $dbw_card_no; ?>">
                                                <input type="hidden" name="address" value="<?php echo $address; ?>">
                                                <input type="hidden" name="pin" value="<?php echo $pin; ?>">
                                                <input type="hidden" name="city" value="<?php echo $city; ?>">
                                                <input type="hidden" name="w_name" value="<?php echo $dbname; ?>">
                                                <input type="hidden" name="sub" value="<?php echo $dbsub; ?>">
                                                <input type="hidden" name="area" value="<?php echo $area; ?>">
                                                <input type="hidden" name="basis" value="<?php echo $dbbasis; ?>">
                                                <input type="hidden" name="w_username" value="<?php echo $dbusername; ?>">
                                                <input type="hidden" name="w_phone" value="<?php echo $dbphone; ?>">
                                                <input type="hidden" name="w_email" value="<?php echo $dbemail; ?>">
                                                <input type="hidden" name="w_address" value="<?php echo $dbaddress; ?>">
                                                <input type="hidden" name="w_pin" value="<?php echo $dbpin; ?>">
                                                <input type="hidden" name="w_city" value="<?php echo $city; ?>">
                                                <input type="hidden" name="w_age" value="<?php echo $dbage; ?>">
                                                <input type="hidden" name="w_gender" value="<?php echo $dbgender; ?>">
                                                <input type="hidden" name="certified_level" value="<?php echo $dbcertified_level; ?>">
                                                <input type="hidden" name="doc" value="<?php echo $dbdoc; ?>">
                                                <input type="hidden" name="experience" value="<?php echo $dbexperience; ?>">
                                                <input type="hidden" name="rate" value="<?php echo $dbrate; ?>">
                                                <input type="hidden" name="service" value="<?php echo $service; ?>">
                                                <input type="hidden" name="from" value="<?php echo $from; ?>">
                                                <input type="hidden" name="time" value="<?php echo $time; ?>">
                                                <td class="col-3"><input style="font-size: 14px" class="btn-link" type="submit" value="Click here"></td>
                                            </form></tr>
                                        <?php

                                    }
                                }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <br><br>
                    <form action="find_service2_repair.php" method="post">
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                        <input type="hidden" name="service" value="<?php echo $service; ?>">
                        <input type="hidden" name="from" value="<?php echo $from; ?>">
                        <input type="hidden" name="time" value="<?php echo $time; ?>">
                        <center><input type="submit" class="cont_button1 btn-info" value="<< Back to previous page"></center>
                    </form><br>
                    <center>
                        <h3><i class="fa fa-arrow-right text-white">100% verified professionals</i><br>
                            <i class="fa fa-arrow-right text-white">Affordable fixed prices</i><br>
                            <i class="fa fa-arrow-right text-white">At your doorstep</i></h3>
                    </center>
                    <?php
                }
                else
                {
                    ?>
                    <br><br><br><br><br><br>
                    <div><br>
                        <h1 style="font-size: 40px" class="mb-4 text-light">Oops.. No <?php echo $service; ?> professional found within your 5km radius</h1>
                        <center><h3 class="mb-4 text-light">Sorry for the inconvenience... We will surely increase man power in these areas soon.</h3>
                            <br><br><form action="find_service2_repair.php" method="post">
                                <input type="hidden" name="username" value="<?php echo $username; ?>">
                                <input type="hidden" name="category" value="<?php echo $category; ?>">
                                <input type="hidden" name="service" value="<?php echo $service; ?>">
                                <input type="hidden" name="from" value="<?php echo $from; ?>">
                                <input type="hidden" name="time" value="<?php echo $time; ?>">
                                <center><input type="submit" class="cont_button1 btn-info" value="<< Back to previous page"></center>
                            </form>
                        </center>
                    </div><br>
                    <?php
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
        header("Location:find_service_repair.php");
    }
}
?>