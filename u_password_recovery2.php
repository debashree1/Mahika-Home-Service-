<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
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
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <body>
    <div class="container-fluid register">
        <br>
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="img/logo.png" alt=""/>
                <h2 style="font-family: Catamaran">Welcome!</h2>
                <br>
                <h2 style="font-family: Catamaran">Please enter your new password.</h2>
                <br>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br><br>
                        <h2 class="register-heading">Password Recover Step 2</h2>
                        <form action="u_password_recovery3.php" method="post" onsubmit="return myFunction()">
                            <div class="register-form">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="pass1" name="password" placeholder="Enter new password" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="pass2" placeholder="Re-enter password" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="submit" class="btnRegister"  value="Next -->"/>
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
?>