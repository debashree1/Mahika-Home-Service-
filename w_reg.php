
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
    <link rel="stylesheet" type="text/css" href="css/hover-min.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function myFunction() {
            var pass1 = document.getElementById("pass1").value;
            var pass2 = document.getElementById("pass2").value;
            var ok = true;
            if (pass1 !== pass2) {
                alert("Passwords Must Match!!! Please Re-enter Password");
                return false;
            }
        }
    </script>
  </head>
<body>
<div class="container-fluid register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="img/logo.png" alt=""/>
                        <h2 style="font-family: Catamaran">Welcome!</h2>
                        <br>
                        <h1 style="font-family: Catamaran">Expand your service business with Mahika!</h1>
                        <a href="workerlogin.html" style="text-decoration: none;"><input type="submit" name="" value="Login"/></a><br><br>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact Us</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br><br>
                                <h3 class="register-heading">Mahika Associate-Registration</h3>
                                <br>
                                <div class="register-form">
                                    <div class="row col-md-12">

                                            <div class="col-md-6">
                                               <center>
                                                   <a href="w_comp_reg.php" class="hvr-glow hvr"> <img class="img-thumbnail" src="img/mini_h.jpg">
                                                   </a>
                                               </center>
                                            </div>




                                            <div class="col-md-6">
                                                <center>
                                                    <a href="w_ind_reg.php" class="hvr-glow"> <img class="img-thumbnail" src="img/mini_individual.jpg">
                                                        </a>
                                                </center>
                                            </div>


                                    </div>
                                    </div>
                                </div>
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