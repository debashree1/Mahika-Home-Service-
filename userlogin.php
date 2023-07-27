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
                        <h2 style="font-family: Catamaran">Welcome!</h2>
                        <br>
                        <h2 style="font-family: Catamaran">Enjoy our Home Service at Reasonable Cost!</h2>
                        <a href="u_reg.php" style="text-decoration: none;"><input type="submit" name="" value="Register"/></a><br/>
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
                                <br>
                                <h2 class="register-heading">User-Login</h2>

                                    <div class="register-form">
                                        <form action="u_login_logic.php" method="post">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-control" placeholder="Username *" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" type="password" placeholder="Password *" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="submit" class="btnRegister"  value="Login"/>
                                                </div>

                                            </div>
                                        </div>
                                </form>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <a href="u_forgot.php"><input type="submit" class="btnforgot"  value="Forgot Password?"/></a>
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