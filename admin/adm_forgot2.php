<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:index.php");
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
    <nav class="navbar fixed-top bg-info" id="mainNav">
        <div class="container">


            <div class="col-12"><center><img class="img-rounded" src="../img/logo.png" />&nbsp;<b class="text-warning" style="letter-spacing: 2px;font-size: 25px;border-bottom: 2px solid gainsboro">Service Expert</b></center></div>


        </div>
    </nav>


    <section class="adm">
        <div class="adm-container">
            <div class="container">
                <div class="loginBox1">
                    <img src="../img/adm.png" class="user1">
                    <center><h3 class="text-white">Password Recovery Step 2</h3></center>
                    <br>
                    <form action="adm_forgot3.php" method="post" onsubmit="return myFunction()">
                        <p style="color:#f1b0b7">New password</p>
                        <input type="password" id="pass1" name="password" placeholder="Enter new password" required>
                        <p style="color: #f1b0b7">Re-enter password</p>
                        <input type="password" id="pass2" placeholder="Re-enter password" required>
                        <input type="submit" name="" value="Next">
                    </form>
                </div>
            </div></div>
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
}
?>
