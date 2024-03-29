<?php
session_start();

require("../php/PasswordHash.php");
$hasher = new PasswordHash(8, false);

@$username=$_REQUEST["username"];
@$password=$_REQUEST["password"];
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
if ($_SESSION["username"]==true && $_SESSION["password"]==true) {
    $con=mysqli_connect("localhost","root","","mahika") or die("unable to connect");
    $query="select * from admin_login";
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
        if ($count == 1)
        {
            header("location:profile.php");
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
                <link rel="shortcut icon" href="../img/favicon.ico" />
                <!-- Bootstrap core CSS -->
                <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

                <!-- Custom fonts for this template -->
                <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.css">

                <!-- Plugin CSS -->
                <link rel="stylesheet" href="../device-mockups/device-mockups.min.css">

                <!-- Custom styles for this template -->
                <link href="../css/style.css" rel="stylesheet">
                <link href="../css/hover-min.css" rel="stylesheet">
            </head>

            <body id="page-top">

            <!-- Navigation -->
            <nav class="navbar fixed-top bg-info" id="mainNav">
                <div class="container">


                    <div class="col-12"><center><img class="img-rounded" src="../img/logo.png" />&nbsp;<b class="text-warning" style="letter-spacing: 2px;font-size: 25px;border-bottom: 2px solid gainsboro">Service Expert</b></center></div>


                </div>
            </nav>

            <section class="features" id="features" style="background:lavender">
                <div class="container">
                    <div style="text-align: center">
                        <h1 class="mb-5 text-info" style="font-family:Catamaran;font-size: 50px;margin-top: 150px">Oops! Incorrect username - password combination.
                            <br>Please Try again.</h1>
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
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            
            <script src="../js/new-age.min.js"></script>
            </body>
            </html>
            <?php
            session_destroy(); //destroy the session
            exit();
        }
    }
}
else {
    header("location:index.php");
}

?>