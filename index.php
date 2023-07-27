<?php session_start();
if( (isset($_SESSION['username'])) && (isset($_SESSION['password'])) )
{
    $username= $_SESSION['username'];
    $password= $_SESSION['password'];
    $con=mysqli_connect("localhost","root","","mahika") or die("unable to connect");
    $query="select * from user_details where username='$username'";
    $result=mysqli_query($con,$query);
    $count=0;
    if($result)
    {
        while ($row=mysqli_fetch_array($result))
        {
            $dbusname=$row['username'];
            $dbpassword=$row['password'];
            if ($username==$dbusname && $dbpassword=$password)
            {
                $count=$count + 1;
            }

        }
        if ($count == 1)
        {
            header("Location:find_service.php");
        }
        else
        {
            $i=0;
            $q="select * from worker_details where username='$username'";
            $res=mysqli_query($con,$q);
            if ($res)
            {
                while ($row=mysqli_fetch_array($res))
                {
                    $dbusname=$row['username'];
                    $dbverification=$row['verification'];
                    $dbpassword=$row['password'];
                    $dbcard_no=$row['card_no'];
                    if ($username==$dbusname && $dbpassword=$password && $dbverification=='Confirmed' && $dbcard_no!=null)
                    {
                        $i=$i + 1;
                    }

                }
                if ($i == 1)
                {
                    header("Location:worker_profile.php");
                }
                else
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
                    </head>

                    <body id="page-top">

                    <!-- Navigation -->
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
                        <div class="container">
                            <div class="navbar-header">
                                <a href="#top">
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
                                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="#contact">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="userlogin.php">User Login/Sign Up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="workerlogin.html">Work as Professional</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="contact.html">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <header class="masthead">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-lg-7 my-auto">
                                    <div class="header-content mx-auto">
                                        <div style="text-align: center;">
                                            <h1 class="mb-5" style="font-family: Catamaran">Welcome to <b>MAHIKA </b><br>The Professional <br>Home Service Website <br> Specialized for Urban Areas of Assam</h1>
                                            <a href="#features" class="btn btn-outline btn-xl js-scroll-trigger"><b>Explore Our Services!</b></a>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-lg-5 my-auto">
                                    <div class="device-container">
                                        <div class="device-mockup ipad white">
                                            <div class="device">
                                                <div class="screen">
                                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                                    <img src="img/q.jpg" class="img-fluid" alt="Image">

                                                    <div class="overlay">
                                                        <div class="text"><img src="img/p.jpg" alt="Image" class="image"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <section class="features" id="features">
                        <div class="container">
                            <div style="text-align: center">
                                <h1 class="mb-5 text-dark" style="font-family: Catamaran">Get instant access to reliable and affordable services...</h1>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 my-auto">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-4 ">
                                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                                    <div class="feature-item">
                                                        <i><img src="img/maid.png"></i>
                                                        <h3 style="font-family: Catamaran">Maid Service</h3>
                                                        <p>Home maid, Cook, Gardener, Car Cleaner, Deep Cleaner</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 ">
                                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                                    <div class="feature-item">
                                                        <i><img src="img/repair1.png"></i>
                                                        <h3 style="font-family: Catamaran">Repair & Renovation</h3>
                                                        <p>Plumber, Electrician, Appliance Repairer, Carpenter, Interior Designer, Painter</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 ">
                                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                                    <div class="feature-item">
                                                        <i><img src="img/beauty.png"></i>
                                                        <h3 style="font-family: Catamaran">Beauty Service</h3>
                                                        <p>Hair Style, Cut, Straightening, Spa, Massage, Manicure, Pedicure, Make up</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 ">
                                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                                    <div class="feature-item">
                                                        <i><img src="img/teach.png"></i>
                                                        <h3 style="font-family: Catamaran">Home Tutor</h3>
                                                        <p>Tuition of All Subjects (class V to X) and Dancing, Singing, Art</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 ">
                                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                                    <div class="feature-item">
                                                        <i><img src="img/truck2.png"></i>
                                                        <h3 style="font-family: Catamaran">Packers & Movers</h3>
                                                        <p>Home Shifting, Corporate/Office Shifting, Furniture Shifting</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 ">
                                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                                    <div class="feature-item">
                                                        <i><img src="img/photo.png"></i>
                                                        <h3 style="font-family: Catamaran">Photographer</h3>
                                                        <p>Personal, Business, Wedding,  Festival Celebration Photography</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="contact" id="contact">
                        <div class="container">
                            <h2 class="text-white" style="font-family: Catamaran">What is Mahika?</h2>
                            <p class="text-justify" style="font-family: Catamaran;font-size: 19px;">
                                Mahika is growing as one of the important startups in Assam, India. We are a mobile marketplace for local services of the cities Guwahati, Silchar, Jorhat, Nagaon, Dibrugarh, Tezpur & Tinsukia. We help customers to find and book trusted and background verified professionals for all their service needs in their home areas. We are working tirelessly to make a difference in the lives of people by providing their required service at their doorsteps. We provide housekeeping services which consist of Plumbers, Electricians, Carpenters, Tutors, Beauticians and Photographers. Be it getting a plumbing job done, decorating your home or getting candid photos of your wedding clicked, we are a sure shot destination for your service needs.
                            </p>
                            <h3 class="text-white">Connect us at social media</h3>
                            <br>

                            <p><a
                                        href="https://www.facebook.com">
                                    <img height="47" width="47"
                                         src="img/face.png"></a>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <a
                                        href="https://twitter.com">
                                    <img height="47" width="47"
                                         src="img/twitter.png"></a>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <a
                                        href="https://in.linkedin.com">
                                    <img height="47" width="47"
                                         src="img/li.png"></a>



                            </p>

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

}
else {

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
    </head>

    <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <div class="navbar-header">
                <a href="#top">
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
                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="#contact">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="userlogin.php">User Login/Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="workerlogin.html">Work as Professional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">
                        <div style="text-align: center;">
                            <h1 class="mb-5" style="font-family: Catamaran">Welcome to <b>MAHIKA </b><br>The Professional <br>Home Service Website <br> Specialized for Urban Areas of Assam</h1>
                            <a href="#features" class="btn btn-outline btn-xl js-scroll-trigger"><b>Explore Our Services!</b></a>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-lg-5 my-auto">
                    <div class="device-container">
                        <div class="device-mockup ipad white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="img/q.jpg" class="img-fluid" alt="Image">

                                    <div class="overlay">
                                        <div class="text"><img src="img/p.jpg" alt="Image" class="image"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="features" id="features">
        <div class="container">
            <div style="text-align: center">
                <h1 class="mb-5 text-dark" style="font-family: Catamaran">Get instant access to reliable and affordable services...</h1>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 my-auto">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4 ">
                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                    <div class="feature-item">
                                        <i><img src="img/maid.png"></i>
                                        <h3 style="font-family: Catamaran">Maid Service</h3>
                                        <p>Home maid, Cook, Gardener, Car Cleaner, Deep Cleaner</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                    <div class="feature-item">
                                        <i><img src="img/repair1.png"></i>
                                        <h3 style="font-family: Catamaran">Repair & Renovation</h3>
                                        <p>Plumber, Electrician, Appliance Repairer, Carpenter, Interior Designer, Painter</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                    <div class="feature-item">
                                        <i><img src="img/beauty.png"></i>
                                        <h3 style="font-family: Catamaran">Beauty Service</h3>
                                        <p>Hair Style, Cut, Straightening, Spa, Massage, Manicure, Pedicure, Make up</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                    <div class="feature-item">
                                        <i><img src="img/teach.png"></i>
                                        <h3 style="font-family: Catamaran">Home Tutor</h3>
                                        <p>Tuition of All Subjects (class V to X) and Dancing, Singing, Art</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                    <div class="feature-item">
                                        <i><img src="img/truck2.png"></i>
                                        <h3 style="font-family: Catamaran">Packers & Movers</h3>
                                        <p>Home Shifting, Corporate/Office Shifting, Furniture Shifting</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <a href="userlogin.php" class="hvr-bounce-to-bottom">
                                    <div class="feature-item">
                                        <i><img src="img/photo.png"></i>
                                        <h3 style="font-family: Catamaran">Photographer</h3>
                                        <p>Personal, Business, Wedding,  Festival Celebration Photography</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="text-white" style="font-family: Catamaran">What is Mahika?</h2>
            <p class="text-justify" style="font-family: Catamaran;font-size: 19px;">
Mahika is growing as one of the important startups in Assam, India. We are a mobile marketplace for local services of the cities Guwahati, Silchar, Jorhat, Nagaon, Dibrugarh, Tezpur & Tinsukia. We help customers to find and book trusted and background verified professionals for all their service needs in their home areas. We are working tirelessly to make a difference in the lives of people by providing their required service at their doorsteps. We provide housekeeping services which consist of Plumbers, Electricians, Carpenters, Tutors, Beauticians and Photographers. Be it getting a plumbing job done, decorating your home or getting candid photos of your wedding clicked, we are a sure shot destination for your service needs.               
			   </p>
            <h3 class="text-white">Connect us at social media</h3>
            <br>

            <p><a
                        href="https://www.facebook.com">
                    <img height="47" width="47"
                         src="img/face.png"></a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <a
                        href="https://twitter.com">
                    <img height="47" width="47"
                         src="img/twitter.png"></a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <a
                        href="https://in.linkedin.com">
                    <img height="47" width="47"
                         src="img/li.png"></a>



            </p>

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
?>
