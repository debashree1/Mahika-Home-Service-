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
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/hover-min.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        
        <script src="js/new-age.min.js"></script>
        <script>
            function myFunction() {
                var pass1 = document.getElementById("pass1").value;
                var pass2 = document.getElementById("pass2").value;
                if (pass1 !== pass2) {
                    alert("Passwords must match!!! Please re-enter password");
                    return false;
                }
                if (pass1.length < 6)
                {
                    alert("Password should contain at least 6 characrters ");
                    return false;
                }
            }
        </script>
    </head>

    <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-info" id="mainNav">
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
                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="logout.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="contact.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger hvr-bounce-to-right" href="w_reg.php">Sign Up as Professional</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <div class="login-box">
                    <form action="w_password_recovery3.php" method="post" onsubmit="return myFunction()">
                        <center><h1>Password Recovery Step 2</h1></center>
                        <div class="textbox">
                            <i class="fa fa-lock"></i>
                            <input type="password" placeholder="Enter new password" name="password" id="pass1" required>
                        </div>
                        <div class="textbox">
                            <i class="fa fa-lock-open"></i>
                            <input type="password" placeholder="Re-enter password" id="pass2" required>
                        </div>
                        <br>
                        <center><input class="btn" type="submit" value="Recover Password"></center>
                    </form>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
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

    </body>

    </html>
    <?php
}
?>
