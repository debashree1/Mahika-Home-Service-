
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
                    <br><br>
                    <h2 class="register-heading">Password Recovery Step 1</h2>
                    <form action="u_pass_recovery.php" method="post">
                        <div class="register-form">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Enter Username *" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <select name="question" required="required" class="form-control">
                                            <option value="" selected disabled>--Select Security Question--</option>
                                            <option value="Grandma Name">What is Your Grandma Name?</option>
                                            <option value="Old Phone Number">What is Your old Phone Number?</option>
                                            <option value="Pet Name">What is Your Pet Name?</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="answer" placeholder="Enter Security Answer" required />
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


