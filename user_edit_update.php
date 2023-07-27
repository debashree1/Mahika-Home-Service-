<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:userlogin.php");
}
else {
    $username=$_SESSION['username'];
    @$name=$_REQUEST["name"];
    @$email=$_REQUEST["email"];
    @$city=$_REQUEST["city"];
    @$phone=$_REQUEST["phone"];
    @$question=$_REQUEST["question"];
    @$answer=$_REQUEST["answer"];
    @$gender=$_REQUEST["gender"];
    @$area=$_REQUEST["area"];
    @$address=$_REQUEST["address"];
    @$pin=$_REQUEST["pin"];
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="UPDATE user_details SET name='$name',email='$email',gender='$gender',city='$city',phone='$phone',question='$question',answer='$answer',area='$area',address='$address',pin='$pin' where username='$username'";
    @$res = mysqli_query($a, $q);
    if($res)
    {
        header("Location:user_personal.php");
    }
    else{
        echo "Error";
    }
}
?>