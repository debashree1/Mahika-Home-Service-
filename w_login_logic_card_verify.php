<?php
session_start();
@$name=$_REQUEST["name"];
@$username=$_REQUEST["username"];
@$service1=$_REQUEST["service1"];
@$rate11=$_REQUEST["rate11"];
@$rate12=$_REQUEST["rate12"];
@$rate13=$_REQUEST["rate13"];
@$service2=$_REQUEST["service2"];
@$rate21=$_REQUEST["rate21"];
@$rate22=$_REQUEST["rate22"];
@$rate23=$_REQUEST["rate23"];
@$service3=$_REQUEST["service3"];
@$rate31=$_REQUEST["rate31"];
@$card_type=$_REQUEST["card_type"];
@$card_no=$_REQUEST["card_no"];
@$c_name=$_REQUEST["c_name"];
@$month=$_REQUEST["month"];
@$year=$_REQUEST["year"];
@$cvv=$_REQUEST["cvv"];
@$password=$_REQUEST['password'];
@$_SESSION['username'] = $username;
if ($_SESSION["username"]==true)
{
    @$a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="SELECT * FROM credit_card";
    @$res = mysqli_query($a, $q);
    $count=0;
    if($res)
    {
        while ($row=mysqli_fetch_array($res))
        {
            $dbcard_type=$row['card_type'];
            $dbcard_no=$row['card_no'];
            $dbc_name=$row['name'];
            $dbexp_month=$row['exp_month'];
            $dbexp_year=$row['exp_year'];
            $dbcvv=$row['cvv'];
            $dbb_day=$row['b_day'];
            if ($card_no==$dbcard_no && $card_type==$dbcard_type && $c_name==$dbc_name && $month==$dbexp_month && $year==$dbexp_year && $cvv==$dbcvv)
            {
                $count=$count + 1;
                break;
            }

        }
        if ($count == 0){
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
                        <h3 style="font-family: Catamaran">Credit card details will be used for future transactions and you can update it anytime.</h3>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Log Out</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br>
                                <h2 class="register-heading">Invalid Card Details. Please Enter a proper one.</h2>
                                <form action="w_login_logic_card_verify.php" method="post">
                                    <div class="register-form">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <select name="card_type" required="required" class="form-control">
                                                        <option value="" selected disabled>--Select Credit Card Option--</option>
                                                        <option value="VISA">VISA</option>
                                                        <option value="MasterCard">MasterCard</option>
                                                        <option value="Amex">Amex</option>
                                                        <option value="RuPay">RuPay</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="card_no" class="form-control" placeholder="Card No *" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="c_name" class="form-control" placeholder="Name on Card *" required />
                                                </div>
                                                <div class="form-group">
                                                    Expires on *&nbsp;
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <select name="month" required="required" class="form-control">
                                                                <option value="" selected disabled>--Select Month--</option>
                                                                <option>January</option>
                                                                <option>February</option>
                                                                <option>March</option>
                                                                <option>April</option>
                                                                <option>May</option>
                                                                <option>June</option>
                                                                <option>July</option>
                                                                <option>August</option>
                                                                <option>September</option>
                                                                <option>October</option>
                                                                <option>November</option>
                                                                <option>December</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <select name="year" required="required" class="form-control">
                                                                <option value="" selected disabled>--Select Year--</option>
                                                                <option>2018</option>
                                                                <option>2019</option>
                                                                <option>2020</option>
                                                                <option>2021</option>
                                                                <option>2022</option>
                                                                <option>2023</option>
                                                                <option>2024</option>
                                                                <option>2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input type="number" name="cvv" class="form-control" placeholder="Enter CVV *" value="" required="" />
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                                        <input type="hidden" name="password" value="<?php echo $password; ?>">
                                        <input type="hidden" name="service1" value="<?php echo $service1; ?>">
                                        <input type="hidden" name="rate11" value="<?php echo $rate11; ?>">
                                        <input type="hidden" name="rate12" value="<?php echo $rate12; ?>">
                                        <input type="hidden" name="rate13" value="<?php echo $rate13; ?>">
                                        <input type="hidden" name="service2" value="<?php echo $service2; ?>">
                                        <input type="hidden" name="rate21" value="<?php echo $rate21; ?>">
                                        <input type="hidden" name="rate22" value="<?php echo $rate22; ?>">
                                        <input type="hidden" name="rate23" value="<?php echo $rate23; ?>">
                                        <input type="hidden" name="service3" value="<?php echo $service3; ?>">
                                        <input type="hidden" name="rate31" value="<?php echo $rate31; ?>">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="submit" class="btnRegister"  value="Next >>"/>
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
                        <?php
                        echo "<h1>$name</h1>";
                        ?>
                        <br><br>
                        <h3 style="font-family: Catamaran">Give the security key to verify card holder.
                        </h3>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="w_logout.php">Log Out</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br>
                                <h2 class="register-heading">Verifying Card Holder</h2>
                                <form action="w_login_logic_card_verify_finish.php" method="post">
                                    <div class="register-form">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="What's the birth date of the card-holder? " readonly />
                                                </div>
                                                <div class="form-group">
                                                    <input type="date" name="ans" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                                        <input type="hidden" name="password" value="<?php echo $password; ?>">
                                        <input type="hidden" name="service1" value="<?php echo $service1; ?>">
                                        <input type="hidden" name="rate11" value="<?php echo $rate11; ?>">
                                        <input type="hidden" name="rate12" value="<?php echo $rate12; ?>">
                                        <input type="hidden" name="rate13" value="<?php echo $rate13; ?>">
                                        <input type="hidden" name="service2" value="<?php echo $service2; ?>">
                                        <input type="hidden" name="rate21" value="<?php echo $rate21; ?>">
                                        <input type="hidden" name="rate22" value="<?php echo $rate22; ?>">
                                        <input type="hidden" name="rate23" value="<?php echo $rate23; ?>">
                                        <input type="hidden" name="service3" value="<?php echo $service3; ?>">
                                        <input type="hidden" name="rate31" value="<?php echo $rate31; ?>">
                                        <input type="hidden" name="card_no" value="<?php echo $card_no; ?>">
                                        <input type="hidden" name="b_day" value="<?php echo $dbb_day; ?>">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="submit" class="btnRegister"  value="Finish Up"/>
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
    header("location:workerlogin.php");
}

?>