<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
}
else {
    $username=$_SESSION['username'];
    @$category=$_REQUEST['category'];
    @$basis=$_REQUEST['basis'];
    if ($basis=='Individual')
    {
        @$name=$_REQUEST["name"];
        @$email=$_REQUEST["email"];
        @$city=$_REQUEST["city"];
        @$phone=$_REQUEST["phone"];
        @$question=$_REQUEST["question"];
        @$answer=$_REQUEST["answer"];
        @$gender=$_REQUEST["gender"];
        @$age=$_REQUEST["age"];
        @$area=$_REQUEST["subarea"];
        @$address=$_REQUEST["address"];
        @$pin=$_REQUEST["pin"];
        $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
        @$q="UPDATE worker_details SET name='$name',email='$email',gender='$gender',age='$age',city='$city',phone='$phone',question='$question',answer='$answer',subarea='$area',address='$address',pin='$pin' where username='$username'";
        @$res = mysqli_query($a, $q);
        if($res)
        {
            header("Location:worker_personal.php");
        }
        else{
            echo "Error";
        }
    }
    else
    {
        @$name=$_REQUEST["name"];
        @$email=$_REQUEST["email"];
        @$city=$_REQUEST["city"];
        @$phone=$_REQUEST["phone"];
        @$password=$_REQUEST["password"];
        @$question=$_REQUEST["question"];
        @$answer=$_REQUEST["answer"];
        @$area=$_REQUEST["subarea"];
        @$address=$_REQUEST["address"];
        @$pin=$_REQUEST["pin"];
        $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
        @$q="UPDATE worker_details SET name='$name',email='$email',city='$city',phone='$phone',password='$password',question='$question',answer='$answer',subarea='$area',address='$address',pin='$pin' where username='$username'";
        @$res = mysqli_query($a, $q);
        if($res)
        {
            header("Location:worker_personal.php");
        }
        else{
            echo "Error";
        }
    }
}
?>