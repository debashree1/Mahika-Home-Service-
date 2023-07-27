<?php
session_start();

require("php/PasswordHash.php");
$hasher = new PasswordHash(8, false);

@$basis=$_REQUEST["basis"];
@$name=$_REQUEST["name"];
@$email=$_REQUEST["email"];
@$city=$_REQUEST["city"];
@$username=$_REQUEST["username"];
@$phone=$_REQUEST["phone"];
@$password=$_REQUEST["password"];
@$question=$_REQUEST["question"];
@$answer=$_REQUEST["answer"];
@$category=$_REQUEST["category"];
@$doc=$_REQUEST["doc"];
@$doc_no=$_REQUEST["doc_no"];
@$experience=$_REQUEST["experience"];

$hash = $hasher->HashPassword($password);
$password=$hash;

@$_SESSION['username'] = $username;
if ($_SESSION["username"]==true)
{
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT username FROM worker_details";
    @$res = mysqli_query($a, $q);
    $count=0;
    if($res)
    {
        while ($row=mysqli_fetch_array($res))
        {
            $dbusername=$row['username'];
            if ($username==$dbusername)
            {
                $count=$count + 1;
                break;
            }

        }
        if ($count == 1){
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
                                <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="userlogin.php">User Login/Sign Up</a>
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
                        <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;margin-top: 150px">Oops! Username already exists. Please try again with different username.
                            </h1>
                    </div>
                    <div class="row" style="height: 70px">
                        <div class="col-sm-12 my-auto">
                            <div class="container-fluid">
                                <div class="row">

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
        else{
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
            </head>
            <body>
            <div class="container-fluid register">
                <br>
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="img/logo.png" alt=""/>
                        <h2 style="font-family: Catamaran">Welcome</h2>
                        <?php
                        echo "<h1>$name</h1>";
                        ?>
                        <br><br>
                        <h3 style="font-family: Catamaran">Add your company address properly to locate at ease.</h3>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h2 class="register-heading">Company-Address</h2>
                                <form action="w_comp_reg_logic.php" method="post">
                                    <div class="register-form">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?php echo $city; ?>" re
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <select name="area" required="required" class="form-control">
                                                        <option value="" selected disabled>--Select Area--</option>
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
                                                    <input type="text" name="address" class="form-control" placeholder="Market Complex, Shop No. etc " required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="pin" class="form-control" placeholder="Pin " required />
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="basis" value="<?php echo $basis; ?>">
                                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                                        <input type="hidden" name="city" value="<?php echo $city; ?>">
                                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                                        <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                                        <input type="hidden" name="password" value="<?php echo $password; ?>">
                                        <input type="hidden" name="question" value="<?php echo $question; ?>">
                                        <input type="hidden" name="answer" value="<?php echo $answer; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <input type="hidden" name="doc" value="<?php echo $doc; ?>">
                                        <input type="hidden" name="doc_no" value="<?php echo $doc_no; ?>">
                                        <input type="hidden" name="experience" value="<?php echo $experience; ?>">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="submit" class="btnRegister"  value="Submit"/>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        echo "Sorry Error";
        session_destroy(); //destroy the session
        exit();
    }
}
else {
    header("location:w_reg.php");
}

?>