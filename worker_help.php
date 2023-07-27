<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
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
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- Icons font CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="css/hover-min.css" rel="stylesheet">


        <!-- Main CSS-->
        <link href="css/style.css" rel="stylesheet" media="all">
        <link href="css/main.css" rel="stylesheet" media="all">
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top"
         style="background:-webkit-gradient(linear, right top, left top, from(#1da1f2), to(#005f7f));" id="mainNav">
        <div class="container">
            <div class="navbar-header">
                <a class=" nav-link js-scroll-trigger" href="#top">
                    <img class="img-rounded" src="img/logo.png"/>
                </a>
            </div>
            &nbsp;
            <a class="navbar-brand " href="#page-top">
                <h2>
                    <small style="font-family: Arial;border-bottom: 2px solid gainsboro"><?php echo $_SESSION['name']; ?></small>
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
                        <a class="nav-link js-scroll-trigger hvr-glow" href="worker_profile.php">Associate-Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-glow " href="worker_service.php">Service-Record</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-glow " href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-glow " href="w_logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="info">

                        <h1 style="border-bottom: 2px solid beige;margin-top: 80px;font-family: Catamaran">Contact Info</h1>

                        <div class="info_title" style="font-family: Catamaran">Head Office</div>
                        <div class="text-justify" style="margin-bottom: 10px">
                            <br>
                            <b>Address</b>: Mahika Home Service Centre, Paltanbazar, Guwahati, Kamrup Metro, Assam, India, Pin 781008
                            <br>
                            <b>Phone</b>: +91 9434508973
                            <br>
                            <b>Email</b>: mahikaservice@gmail.com
                            <br><br>

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
                    </div>
                </div>
                <div class="col-lg-8 contact_form_col">

                    <h1 style="font-family: Catamaran;border-bottom: 2px solid beige;margin-top: 10px">Drop Your Queries Here</h1>

                    <div class="contact_form_container">
                        <form action="worker_cont_logic.php" method="post" class="contact_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="input_item" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="input_item" placeholder="Your E-mail" required="required">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="phone" class="input_item" placeholder="Your Phone" required="required">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="input_item" placeholder="Your Address" required="required">
                                </div>
                                <div class="col-md-12">
                                    <textarea id="contact_message" name="message" class="input_item contact_message" name="message" placeholder="Your Message" required="required" data-error="Please, write us a message."></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button id="contact_btn" type="submit" class="contact_button trans_200" value="Submit">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="features" id="features" style="background:lavender">
        <div class="container">
            <div style="text-align: center">
                <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;">Our Team Members</h1>
            </div>
            <div class="row">
                <div class="col-sm-12 my-auto">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4">

                                <div class="feature-item" style="border-top: 2px solid gray">
                                    <i><img class="img-thumbnail hvr-glow" src="img/md.png"></i>
                                    <h3 style="font-family: Catamaran;color: #3b5998;margin-top: 8px;">Debashree Debalaxmi</h3>
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

                            </div>
                            <div class="col-sm-4">

                                <div class="feature-item" style="border-top: 2px solid gray">
                                    <i><img class="img-thumbnail hvr-glow" src="img/mn.png"></i>
                                    <h3 style="font-family: Catamaran;color: #3b5998;margin-top: 8px;">Nirna moni Rajkhowa</h3>
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

                            </div>
                            <div class="col-sm-4">

                                <div class="feature-item" style="border-top: 2px solid gray">
                                    <i><img class="img-thumbnail hvr-glow" src="img/mr.jpeg"></i>
                                    <h3 style="font-family:Catamaran;color: #3b5998;margin-top: 8px;">Ritesh Kumar Pathak</h3>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    </html>
    <!-- end document-->
    <?php
}
?>