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
    if($res)
    {
        if ($basis=='Individual')
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
                        var age = document.getElementById("age").value;
                        if (age < 18) {
                            alert("Worker below 18 years old is not allowed");
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
                    $dbname = $row['name'];
                    $dbemail = $row['email'];
                    $dbgender = $row['gender'];
                    $dbcity = $row['city'];
                    $dbarea = $row['subarea'];
                    $dbphone = $row['phone'];
                    $dbpassword = $row['password'];
                    $dbquestion = $row['question'];
                    $dbanswer = $row['answer'];
                    $dbage = $row['age'];
                }
                ?><br>
                <center><h3 style="font-size: 40px" class="text-light"><u>Edit Personal Details</u></h3></center><br>
                <div class="container">
                    <div class="row">
                        <form action="worker_p_edit_next.php" method="post" onsubmit="return myFunction()">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Full Name :</b>
                                        <input type="text" name="name" class="form-control" value="<?php echo $dbname?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Email Id :</b>
                                        <input type="email" name="email" class="form-control" value="<?php echo $dbemail?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Phone No :</b>
                                        <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"  value="<?php echo $dbphone?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">City :</b>
                                        <select name="city" class="form-control">
                                            <option value="<?php echo $dbcity?>"  selected><?php echo $dbcity?></option>
                                            <option value="Guwahati">Guwahati</option>
                                            <option value="Silchar">Silchar</option>
                                            <option value="Dibrugarh">Dibrugarh</option>
                                            <option value="Jorhat">Jorhat</option>
                                            <option value="Nagaon">Nagaon</option>
                                            <option value="Tinsukia">Tinsukia</option>
                                            <option value="Tezpur">Tezpur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Security Question :</b>
                                        <select name="question" class="form-control">
                                            <option value="<?php echo $dbquestion?>" selected><?php echo $dbquestion?></option>
                                            <option value="Grandma Name">What is Your Grandma Name?</option>
                                            <option value="Old Phone Number">What is Your old Phone Number?</option>
                                            <option value="Pet Name">What is Your Pet Name?</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Security Answer :</b>
                                        <input type="text" name="answer" class="form-control" value="<?php echo $dbanswer?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Gender :</b>
                                        <select name="gender" class="form-control">
                                            <option value="<?php echo $dbgender?>" selected><?php echo $dbgender?></option>
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                            <option value="other">other</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Age :</b>
                                        <input type="text" minlength="2" maxlength="2" id="age" name="age" class="form-control" value="<?php echo $dbage?>" required/>
                                    </div>
                                </div>
								<div class="col-md-2"></div>
                                <div class="col-md-6">
                                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                    <input style="font-size: 14px;padding-bottom: 5px;padding-top: 5px" class="btnRegister" type="submit" value="Next >>">
                                </div>
                            </div>
                        </form>
                        <br>
                    </div><br>
                    <center><h3 class="text-light">To update your ID Proof Document & ID No., please mail to admin at :</h3><br>
                    <h4 class="text-light">Email: mahikaservice@gmail.com</h4></center>
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
                    $dbname = $row['name'];
                    $dbemail = $row['email'];
                    $dbcity = $row['city'];
                    $dbarea = $row['subarea'];
                    $dbphone = $row['phone'];
                    $dbquestion = $row['question'];
                    $dbanswer = $row['answer'];
                }
                ?><br>
                <center><h3 style="font-size: 40px" class="text-light"><u>Edit Company Details</u></h3></center><br>
                <div class="container">
                    <div class="row">
                        <form action="worker_p_edit_next.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Company Name :</b>
                                        <input type="text" name="name" class="form-control" value="<?php echo $dbname?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Email Id :</b>
                                        <input type="email" name="email" class="form-control" value="<?php echo $dbemail?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Phone No :</b>
                                        <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"  value="<?php echo $dbphone?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">City :</b>
                                        <select name="city" class="form-control">
                                            <option value="<?php echo $dbcity?>"  selected><?php echo $dbcity?></option>
                                            <option value="Guwahati">Guwahati</option>
                                            <option value="Silchar">Silchar</option>
                                            <option value="Dibrugarh">Dibrugarh</option>
                                            <option value="Jorhat">Jorhat</option>
                                            <option value="Nagaon">Nagaon</option>
                                            <option value="Tinsukia">Tinsukia</option>
                                            <option value="Tezpur">Tezpur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Security Question :</b>
                                        <select name="question" class="form-control">
                                            <option value="<?php echo $dbquestion?>" selected><?php echo $dbquestion?></option>
                                            <option value="Private Email of Company">What is Private Email of Company?</option>
                                            <option value="Company Private Motto">What is Company's Private Motto</option>
                                            <option value="Favourite Meal of CEO">What is Favourite Meal of CEO?</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b style="font-size: 20px" class="text-warning">Security Answer :</b>
                                        <input type="text" name="answer" class="form-control" value="<?php echo $dbanswer?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                    <input style="font-size: 14px;padding-bottom: 5px;padding-top: 5px" class="btnRegister" type="submit" value="Next >>">
                                </div>
                            </div>
                        </form>
                    </div>
                    <br><br><br>
                    <center><h3 class="text-light">To update ID License Document & ID No., please mail to admin at :</h3><br>
                        <h4 class="text-light">Email: mahikaservice@gmail.com</h4></center>
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