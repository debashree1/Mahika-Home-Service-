
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
            var age = document.getElementById("age").value;
            if (age < 18) {
                alert("Worker below 18 years old is not allowed");
                return false;
            }
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
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="img/logo.png" alt=""/>
            <h2 style="font-family: Catamaran">Welcome!</h2>
            <br><br>
            <h2 style="font-family: Catamaran">Worker age should be at least 18 years old.</h2>
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
                    <br>
                    <h3 class="register-heading">Mahika Associate - Individual Registration</h3>
                    <div class="register-form">
                        <form action="w_ind_reg_next.php" method="post" onsubmit="return myFunction()">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name *" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Your Phone *" value="" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username *" value="" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="pass1" class="form-control" placeholder="Password *" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" id="pass2" name="pass2" class="form-control"  placeholder="Confirm Password *" value="" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="question" required="required" class="form-control">
                                            <option value="" selected disabled>--Select Security Question--</option>
                                            <option value="Grandma Name">What is Your Grandma Name?</option>
                                            <option value="Old Phone Number">What is Your old Phone Number?</option>
                                            <option value="Pet Name">What is Your Pet Name?</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="answer" class="form-control" placeholder="Enter Your Answer *" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="city" required="required" class="form-control">
                                            <option value="" selected disabled>--Select City--</option>
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
                                        <center><div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="male" required>
                                                    <span> Male </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="female" required>
                                                    <span>Female </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="other" required>
                                                    <span>Other </span>
                                                </label>
                                            </div></center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" minlength="2" maxlength="2" id="age" name="age" class="form-control" placeholder="Your Age *" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="category" required="required" class="form-control">
                                            <option value="" selected disabled>--Select Work Category--</option>
                                            <option value="Maid">Maid -- (Maid / Gardener / Cook / Car Cleaner)</option>
                                            <option value="Repair">Repair -- (Plumber / Electrician / Appliance Repairer)</option>
                                            <option value="Renovation">Renovation -- (Architect / Interior Designer / Painter)</option>
                                            <option value="Beauty">Beauty -- (Spa / Salon / Massage / Style / Hair Cut)</option>
                                            <option value="Tuition">Tuition -- (Subjects V to X / Art / Dancing / Singing)</option>
                                            <option value="Packers & Movers">Packers & Movers -- (Home / Office Shifting )</option>
                                            <option value="Photography">Photographer -- (Personal / Business / Wedding / Festival)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="doc" required="required" class="form-control">
                                            <option value="" selected disabled>--Select ID Document--</option>
                                            <option value="PAN card">PAN card</option>
                                            <option value="Voter ID">Voter ID</option>
                                            <option value="Aadhaar card">Aadhaar card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="doc_no" class="form-control" placeholder="Document No *" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="experience" class="form-control" placeholder="Experience years *" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="certified_level" class="form-control" placeholder="Enter your education level, eg: B.A. in English" value="" required/>
                                    </div>
                                </div>
                                <input type="hidden" name="basis" value="Individual">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <input type="submit" class="btnRegister"  value="Submit"/>
                                </div>
                            </div>
                        </form>
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